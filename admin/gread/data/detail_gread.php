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
$("#a2").load("admin/gread/data/show_gread.php");
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
                    	<div class="panel-heading"><i class="fas fa-sort-alpha-down"></i> เกรดลูกค้า (Gread)</div>
                        <div class="panel-body">
                        	<div class="row">
                            	<div class="col-md-12">
                            			<div class="row">
                                        	<div class="col-md-12">
                                            	<div class="form-inline">
                                        		<div class="form-group">
                                                	<label>เกรดลูกค้า : </label>
                                                    <input type="text" style="width:350px;" class="form-control border-input" id="gread_name" placeholder="Gread Customer" />
                                                    <small class="form-text text-muted" style="color:#F30;"></small>
                                                    <button class="btn btn-primary" onClick="javascript:addgread();"><i class="ti-save"></i> เพิ่ม</button>
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
