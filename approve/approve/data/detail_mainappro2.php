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
$('#a2').load('approve/approve/data/show_appro2.php');
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
		//RefreshAppro2();
	}
	
function referchpage(){
	$("#a2").html("<img src='images/load.gif' height='40' width='40' /> <br> Loading...");
	$('#a2').load('approve/approve/data/show_appro2.php');	
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
                    	<div id="pnh1" class="panel-heading"> <i class="ti-comment-alt"></i> รายการขออนุมัติเครดิต (Credit Approval List) กรรมการผู้จัดการ</div>
  												<div class="panel-body">
															<div id="a2"></div>
                            </div>
                        <div class="panel-footer" style="text-align:right;">
                          <button type="button" id="RefreshReq" class="btn btn-info" onClick="referchpage();"><i class="ti-reload"></i> Refresh</button>
						<button type="button" id="" class="btn btn-success" onClick="customer();"><i class="glyphicon glyphicon-user"></i> ลูกค้า</button>
													<!--Panel Footer OpenAdminAddForm();-->
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
