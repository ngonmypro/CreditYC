<?php  session_start(); ?>

<!DOCTYPE html>
<html>
<head>
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
$('#a2').load('admin/user/data/show_user.php');
$('#pn1').lobiPanel({
			sortable: true,
			reload: false,
    		close: false,
			unpin: false,
			expand: false,
    		editTitle: false,

		});

		$('#pn2').hide();
		if($('#pn1').is(':hidden')) {
			$('#pn2').hide();
			$('#pn1').show();
			$('#li2').removeClass("active");
			$('#li1').addClass("active");
		}

	$(document).ready(function(){
		$('#pn1').lobiPanel({
			sortable: true,
			reload: false,
    		close: false,
			unpin: false,
			expand: false,
    		editTitle: false,
		});

});

function intervalFunc() {
	RefreshAdminUse();
}

//setInterval(intervalFunc, 1200000);

</script>
</head>
<body>
	<div class="content">
    	<div class="container-fluid">
        	<div class="row">
            	<div class="col-md-12">
                    <div id="pn1" class="panel panel-primary">
                    	<div id="pnh1" class="panel-heading"> <i class="ti-user"></i> รายการผู้ใช้งานระบบ (User Detail) </div>
  												<div class="panel-body">
															<div id="a2"></div>
                            </div>
                        <div class="panel-footer" style="text-align:right;">
                        	<!--Panel Footer OpenAdminAddForm();-->
  											<div class="btn-group" role="group" aria-label="menufooter1">

    <button type="button" id="" class="btn btn-success" onClick="add_user();"><i class="glyphicon glyphicon-plus"></i> เพิ่มผู้ใช้งาน</button>
  	<!--<button type="button" id="AdminbtnEdit" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i> แก้ไขข้อมูล</button>
    <button type="button" id="AdminbtnDel" class="btn btn-danger"><i class="ti-trash"></i> ลบผู้ใช้งาน</button>-->
  											</div>
                            <!---------------->
                            <div id="ra1"></div>
                        </div><!--Panel Footer-->
					</div><!-- pn1 -->
                </div><!-- Column -->
            </div><!-- row -->
     	</div>
    </div>

</body>
</html>
