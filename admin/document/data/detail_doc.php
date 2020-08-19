<?php session_start();
	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
	include "../../../Connections/connect_mysql.php"; ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style>
	td.highlight {
        font-weight: bold;
        color: blue;
    }
	.toolbar {
		text-align:center;
    	/*float:left;*/
	}

</style>
<script type="text/javascript">
$("#d2").load("admin/document/data/show_doc.php");
$('#pn2').lobiPanel({
			sortable: true,
			reload: false,
    		close: false,
			unpin: false,
			expand: false,
    		editTitle: false,
		});

$('#pn1').hide();
if($('#pn2').is(':hidden')) {
			$('#pn2').show();
			$('#pn1').hide();
			$('#li1').removeClass("active");
			$('#li2').addClass("active");
			loadshowdoctb();
    }
	
	
$(document).ready(function(){

	$('#doc_name').blur(function() {
		if($('#doc_name').val().length==0){
			$('#doc_name').addClass('has-error');
			$('#smt_doc_name').html('ชื่อเอกสาร ต้องไม่เป็นค่าว่าง!');
			$('#doc_name').focus();		
		}else{
			$('#doc_name').removeClass('has-error');
			$('#doc_name').addClass('has-success');
			$('#smt_doc_name').html('');	
		}
	});	
	
	$('#doc_type').blur(function() {
		if($('#doc_type').val()==0){
			$('#doc_type').addClass('has-error');
			$('#smt_doc_type').html('ประเภทเอกสาร ต้องไม่เป็นค่าว่าง!');
			$('#doc_type').focus();		
		}else{
			$('#doc_type').removeClass('has-error');
			$('#doc_type').addClass('has-success');
			$('#smt_doc_type').html('');	
		}
	});		
	
});

</script>
</head>

<body>
	<div class="content">
    	<div class="container-fluid">
            <!-- row2 -->
            <div class="row">
            	<div class="col-md-12">
                	<div id="pn2" class="panel panel-primary">
                    	<div class="panel-heading"><i class="ti-files"></i> เอกสารประกอบการพิจารณา (Document)</div>
                        <div class="panel-body">
                        	<div class="row">
                            	<div class="col-md-12">
                            			<div class="row">
                                        	<div class="col-md-12">
                                            	<div class="form-inline">
                                        		<div class="form-group">
                                                	<label>ชื่อเอกสาร : </label>
                                                    <input type="text" style="width:500px;" class="form-control border-input" id="doc_name" placeholder="Document Name" />
                                                    <small id="smt_doc_name" class="form-text text-muted" style="color:#F30;"></small>
                                                  
                                                	<label>ประเภทเอกสาร : </label>
														<select class="form-control" id="doc_type">
															<option value="0"> # เลือกประเภทเอกสาร # </option>
														<?php $sqldoc = 'SELECT * FROM tbldoctype';
															$resultdoc = mysql_query($sqldoc) or die(mysql_error());
															while ($rowdoc = mysql_fetch_array($resultdoc)) { ?>
															<option value="<?php echo $rowdoc['dty_id']; ?>" ><?php echo $rowdoc['dty_name']; ?></option>
														<?php } ?>
													</select>
                                                    <small id="smt_doc_type" class="form-text text-muted" style="color:#F30;"></small>
                                                    
                                                    <button class="btn btn-primary" onClick="javascript:adddoc();"><i class="ti-save"></i> เพิ่ม</button>
                                                </div>
                                                </div><!--form-inline-->
                                            </div><!--col-->
                                  </div><!--row-->
                            	</div><!--col-->
                            </div><!--row-->
                            <hr>
                            <div class="row">
                            	<div class="col-md-12">
                                	<div id="d2"></div>
                              </div>
                            </div><!--row-->
                        </div>
                        <div class="panel-footer"></div>
                    </div><!--pn2-->
                </div><!-- col2-->
            </div><!--row2-->
     	</div>
    </div>

</body>
</html>
