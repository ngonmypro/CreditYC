<?php session_start(); ?>

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
$('#cus1').load('customer/data/show_customer.php');

$('#pn1').lobiPanel({
			sortable: true,
			reload: false,
    		close: false,
			unpin: false,
			expand: false,
    		editTitle: false,
		});

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

</script>
</head>
<body>
	<div class="content">
    	<div class="container-fluid">
        	<div class="row">
            	<div class="col-md-12">
                    <div id="pn1" class="panel panel-primary">
                    	<div id="pnh1" class="panel-heading"> <i class="ti-user"></i> ลูกค้าเครดิต (Credit Customer)</div>
  												<div class="panel-body">
															<div id="cus1"></div>
                            </div>
                        <div class="panel-footer" style="text-align:right;">
                          <?php if ($_SESSION['use_tuseid'] == 3) {?>
													<button type="button" id="" class="btn btn-warning" onClick="requestermain();"><i class="glyphicon glyphicon-edit"></i> รายการขออนุมัติเครดิต</button>
												<?php } else if ($_SESSION['use_tuseid'] == 4){
														if ($_SESSION['use_appid'] == 4) { ?>
													<button type="button" id="" class="btn btn-warning" onClick="considermain1();"><i class="glyphicon glyphicon-edit"></i> รายการขออนุมัติเครดิต</button>
												<?php	} else if ($_SESSION['use_appid'] == 5) { ?>
                          <button type="button" id="" class="btn btn-warning" onClick="considermain2();"><i class="glyphicon glyphicon-edit"></i> รายการขออนุมัติเครดิต</button>
												<?php } elseif ($_SESSION['use_appid'] == 6) { ?>
													<button type="button" id="" class="btn btn-warning" onClick="approvemain1();"><i class="glyphicon glyphicon-edit"></i> รายการขออนุมัติเครดิต</button>
												<?php }elseif ($_SESSION['use_appid'] == 7) {?>
													<button type="button" id="" class="btn btn-warning" onClick="approvemain2();"><i class="glyphicon glyphicon-edit"></i> รายการขออนุมัติเครดิต</button>
												<?php }} else {} ?>
                        </div><!--Panel Footer-->
					</div><!-- pn1 -->
                </div><!-- Column -->
            </div><!-- row -->
     	</div>
    </div>

</body>
</html>
