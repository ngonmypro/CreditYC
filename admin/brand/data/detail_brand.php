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
$("#a2").load("admin/brand/data/show_brand.php");
$('#pn2').lobiPanel({
			sortable: true,
			reload: false,
    		close: false,
			unpin: false,
			expand: false,
    		editTitle: false,
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
                    	<div class="panel-heading"><i class="fa fa-sitemap"></i> สาขา (Branch)</div>
                        <div class="panel-body">
                        	<div class="row">
                            	<div class="col-md-12">
                            			<div class="row">
                                        	<div class="col-md-12">
                                            	<div class="form-inline">
                                        		<div class="form-group">
                                                	<label>ชื่อเต็มสาขา : </label>
                                                    <input type="text" style="width:350px;" class="form-control border-input" id="brand_name" placeholder="Branch Name" />
                                                    <small class="form-text text-muted" style="color:#F30;"></small>
													<label>ชื่อย่อสาขา : </label>
	                                                <input type="text" style="width:150px;" class="form-control border-input" id="brand_names" placeholder="Branch Name" />
	                                                <small class="form-text text-muted" style="color:#F30;"></small>
                                                    <label>เขตการพิจารณา :</label>
                                                    <select id="cons1" class="form-control">
                                                    	<option value="0">-- เลือกเขตการพิจารณา --</option>


														<?
															include "../../../Connections/connect_mysql.php";

															$sql_cons = " select * from tblconsideration order by consi_id ";
															$result_cons = mysql_query($sql_cons) or die(mysql_error());
															while($record_cons=mysql_fetch_array($result_cons)){
																	$consi_id_cons = $record_cons['consi_id'];
																	$consi_name_cons = $record_cons['consi_name'];
														?>
															<option value="<?=$consi_id_cons?>"><?=$consi_name_cons?></option>
                                  <?
															}//while

															mysql_close($c);
														?>
                                                    </select>

                                                    <button class="btn btn-primary" onClick="javascript:addbrand();"><i class="ti-save"></i> เพิ่ม</button>
                                                </div>
                                                </div><!--form-inline-->
                                            </div><!--col-->
                                  </div><!--row-->
                            	</div><!--col-->
                            </div><!--row-->
                            <hr>
                            <div class="row">
                            	<div class="col-md-12">
                                	<div id="a2"></div>
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
