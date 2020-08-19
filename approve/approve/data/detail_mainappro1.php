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
$('#a2').load('approve/approve/data/show_appro1.php');
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

function HidePanel(pnno){
		$(pnno).hide();
	}

	function intervalFunc() {
		//RefreshAppro1();
	}
	
	function refreshpage(){
		$("#a2").html("<img src='images/load.gif' height='40' width='40' /> <br> Loading...");
		$("#a2").load("approve/approve/data/show_appro1.php");	
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
                    	<div id="pnh1" class="panel-heading"> <i class="ti-comment-alt"></i> รายการขออนุมัติเครดิต (Credit Approval List) ผู้อำนวยการฝ่ายการเงิน</div>
  												<div class="panel-body">
															<div id="a2"></div>
                            </div>
                        <div class="panel-footer" style="text-align:right;">
                          <button type="button" id="RefreshReq" class="btn btn-info" onClick="refreshpage();"><i class="ti-reload"></i> Refresh</button>
													<button type="button" id="" class="btn btn-success" onClick="customer();"><i class="glyphicon glyphicon-user"></i> ลูกค้า</button>
													<!--Panel Footer OpenAdminAddForm();-->
  											<!--<div class="btn-group" role="group" aria-label="menufooter1">
                          <button type="button" id="AddReq" class="btn btn-success" onClick="add_opencd();"><i class="glyphicon glyphicon-plus"></i> เพิ่มรายการ</button>
  									      <button type="button" id="EditReq" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i> แก้ไขรายการ</button>
                          <button type="button" id="DelReq" class="btn btn-danger"><i class="ti-trash"></i> ลบรายการ</button>
  											</div>-->
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
