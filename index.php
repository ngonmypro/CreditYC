<?php session_start();

	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
	//ตรวจสอบการ Login
 	include "Connections/create_new_db.php";
	include "Connections/create_new_tb.php";
  	include "Connections/insert_admim.php";
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<!--<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">-->
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Approve Credit System (ACS)</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />



    <!-- ajax && function javascript -->
    <script src="ajax/function.js"></script>
    <!--<script src="ajax/ajax_framework.js"></script>-->

    <!-- Bootstrap -->
 		<link rel="stylesheet" href="dist/css/bootstrap.min.css">
  	<!--<script src="dist/js/jquery.min.js"></script>-->
    <script src="media/js/jquery-1.12.4.js"></script>
  	<script src="dist/js/bootstrap.min.js"></script>
		<!-- lobibox
		<link rel="stylesheet" href="vendors/lobibox/dist/css/Lobibox.min.css"/>-->

		<!-- font -->
		<link rel="stylesheet" href="dist/fontawesome-free-5.0.8/svg-with-js/css/fa-svg-with-js.css">
		<script src="dist/fontawesome-free-5.0.8/svg-with-js/js/fontawesome-all.min.js"></script>

    <!-- Lobi Panel -->
  	<link rel="stylesheet" href="dist/css/lobipanel.min.css" />
  	<link rel="stylesheet" href="dist/css/jquery-ui.min.css" />

    <!-- lobibox
    <script src="vendors/lobibox/dist/js/Lobibox.min.js"></script>
    <!-- If you do not need both (messageboxes and notifications) you can inclue only one of them
    <script src="vendors/lobibox/dist/js/messageboxes.min.js"></script>-->
  	<script src="dist/js/lobipanel.min.js"></script>
  	<script src="dist/js/jquery-ui.min.js"></script>

     <!-- include bootstrap dialog -->
	<link href="dist/css/bootstrap-dialog.min.css" rel="stylesheet">
	<script src="dist/js/bootstrap-dialog.min.js"></script>

    <!-- WebPage StyleSheet ------------------------------------------------------------------------------->
    <!--<link href="../assets/css/paper-dashboard.css" rel="stylesheet"/>-->
    <!--<script src="../assets/js/paper-dashboard.js"></script>-->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/themify-icons.css" rel="stylesheet"> <!-- รูป icon เพิ่มเติม -->
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>
    <script src="assets/js/bootstrap-notify.js"></script>
    <!-- End WebPage StyleSheet ------------------------------------------------------------------------------->

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 	<!--<link rel="stylesheet" href="/resources/demos/style.css">-->
 	<script src="dist/jquery/jquery-1.12.4.js"></script>
 	<script src="dist/jquery/jquery-ui.js"></script>

	<link rel="stylesheet" type="text/css" href="datatableexport/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="datatableexport/buttons.dataTables.min.css">

	<script src="datatableexport/jquery.dataTables.min.js"></script>
	<script src="datatableexport/dataTables.buttons.min.js"></script>
	<script src="datatableexport/buttons.flash.min.js"></script>
	<script src="datatableexport/jszip.min.js"></script>
	<script src="datatableexport/pdfmake.min.js"></script>
	<script src="datatableexport/vfs_fonts.js"></script>
	<script src="datatableexport/buttons.html5.min.js"></script>
	<script src="datatableexport/buttons.print.min.js"></script>
	<script src="datatableexport/dataTables.fixedHeader.min.js"></script>
	<script src="datatableexport/buttons.colVis.min.js"></script>
	<script src="datatableexport/dataTables.select.min.js"></script>



  <style>
  	.navbar-default .navbar-nav > li > a:hover,
	.navbar-default .navbar-nav > li > a:focus {
    	color: #8a0e0b;
		background-color:#FFDFBF;
	}
  	.navbar-default .navbar-nav > .active > a,
	.navbar-default .navbar-nav > .active > a:hover,
	.navbar-default .navbar-nav > .active > a:focus {
    	color: #8a0e0b;
    	background-color:#FFDFBF;
	}
	.bootstrap-dialog .modal-header.bootstrap-dialog-draggable {
         cursor: move; /* set cursor */
    }
	.card {
  		border-radius: 6px;
  		/*box-shadow: 0 2px 2px rgba(204, 197, 185, 0.5);*/
  		background-color: #FFFFFF;
  		color: #252422;
  		margin-bottom: 20px;
  		position: relative;
  		z-index: 1;
	}
	.card .content {
    	padding: 15px 15px 10px 15px;
	}
  </style>
<script type="text/javascript">
	$(document).ready(function(){
		$('#pncomment1').lobiPanel({
			sortable: true,
			reload: false,
				close: false,
			expand: false,
			unpin: false,
				editTitle: false,
			//minimize:false
		});
		$('#pncomment2').lobiPanel({
			sortable: true,
			reload: false,
				close: false,
			expand: false,
			unpin: false,
				editTitle: false,
			//minimize:false
		});
		$('#pncomment3').lobiPanel({
			sortable: true,
			reload: false,
				close: false,
			expand: false,
			unpin: false,
				editTitle: false,
			//minimize:false
		});
		$('#pncomment4').lobiPanel({
			sortable: true,
			reload: false,
				close: false,
			expand: false,
			unpin: false,
				editTitle: false,
			//minimize:false
		});
		$('#pnratting1').lobiPanel({
			sortable: true,
			reload: false,
				close: false,
			expand: false,
			unpin: false,
				editTitle: false,
			//minimize:false
		});
		$('#pnratting2').lobiPanel({
			sortable: true,
			reload: false,
				close: false,
			expand: false,
			unpin: false,
				editTitle: false,
			//minimize:false
		});
		$('#pnappdetail1').lobiPanel({
			sortable: true,
			reload: false,
				close: false,
			expand: false,
			unpin: false,
				editTitle: false,
			//minimize:false
		});
		$('#pnappdetail2').lobiPanel({
			sortable: true,
			reload: false,
				close: false,
			expand: false,
			unpin: false,
				editTitle: false,
			//minimize:false
		});
		$('#pncomment1').hide();
		$('#pncomment2').hide();
		$('#pncomment3').hide();
		$('#pncomment4').hide();
		$('#pnratting1').hide();
		$('#pnratting2').hide();
		$('#pnappdetail1').hide();
		$('#pnappdetail2').hide();
	});
</script>
</head>
<body onLoad="javascript:showscreen();loadData();">
<div class="wrapper">
    <div style="width:100%;">

        <nav class="navbar navbar-default"  style="background-color: #e3f2fd;" >
            <div class="container-fluid">
                <div class="navbar-header" onMouseOver="javascript:Chgtxt();" onMouseOut="javascript:Retrntxt();">
                    <!--<button type="button" class="navbar-toggle">-->
                     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">
                    	<div id="logo1">
                        <font color="#FF6600"><i class="ti-check-box"></i></font>
                        <font color="#0099FF">Approve Credit System (<font color="#FF6600">ACS</font>)</font>
                      </div>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar"></div> <!-- เมนู -->
            </div>
        </nav>

		<div style="padding-left:20px; padding-right:20px;">
			<div class="" id="a1"></div>
		</div>
        <!-- แสดงข้อมูล -->

	<footer class="panel-footer" style="position:fixed; bottom:0px;right:0px; height:30px; width:100%; padding-bottom:30px;">
            <div class="container-fluid">
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, Create <font color="#FF3300"><i class="glyphicon glyphicon-heart-empty"></i></font>  by <a href="index.php">Yonghouse IT Team.</a>
                </div>
            </div>
  </footer>

    </div>
</div>

<div class="row">
		<div class="col-md-12">
				<div id="pncomment1" >
						<div id="pnhcomment1" class="panel-heading"><i class="ti-comments"></i><font id="httcomment1"> ความคิดเห็น</font><i class="glyphicon glyphicon-remove btn" onClick="HidePanel('#pncomment1');" style="float:right;" onMouseOver="changeCursor(this,'pointer');"></i></div>
							<div class="panel-body">
								<div id="apncomment1"></div>
							</div>
							<div class="panel-footer" style="text-align:right;">
								<div class="btn-group" role="group" aria-label="menufootercomment">
										<button type="button" id="Closefrmcomment1" class="btn btn-secondary" onClick="HidePanel('#pncomment1');"><i class='glyphicon glyphicon-share'></i> Close</button>
									</div>
							</div>
					</div>
			</div>
	</div><!-- row -->
	<div class="row">
			<div class="col-md-12">
					<div id="pncomment2" >
							<div id="pnhcomment2" class="panel-heading"><i class="ti-comments"></i><font id="httcomment2"> ความคิดเห็น</font><i class="glyphicon glyphicon-remove btn" onClick="HidePanel('#pncomment2');" style="float:right;" onMouseOver="changeCursor(this,'pointer');"></i></div>
								<div class="panel-body">
									<div id="apncomment2"></div>
								</div>
								<div class="panel-footer" style="text-align:right;">
									<div class="btn-group" role="group" aria-label="menufootercomment">
											<button type="button" id="Closefrmcomment2" class="btn btn-secondary" onClick="HidePanel('#pncomment2');"><i class='glyphicon glyphicon-share'></i> Close</button>
										</div>
								</div>
						</div>
				</div>
		</div><!-- row -->
		<div class="row">
				<div class="col-md-12">
						<div id="pncomment3" >
								<div id="pnhcomment3" class="panel-heading"><i class="ti-comments"></i><font id="httcomment3"> ความคิดเห็น</font><i class="glyphicon glyphicon-remove btn" onClick="HidePanel('#pncomment3');" style="float:right;" onMouseOver="changeCursor(this,'pointer');"></i></div>
									<div class="panel-body">
										<div id="apncomment3"></div>
									</div>
									<div class="panel-footer" style="text-align:right;">
										<div class="btn-group" role="group" aria-label="menufootercomment">
												<button type="button" id="Closefrmcomment3" class="btn btn-secondary" onClick="HidePanel('#pncomment3');"><i class='glyphicon glyphicon-share'></i> Close</button>
											</div>
									</div>
							</div>
					</div>
			</div><!-- row -->
			<div class="row">
					<div class="col-md-12">
							<div id="pncomment4" >
									<div id="pnhcomment4" class="panel-heading"><i class="ti-comments"></i><font id="httcomment4"> ความคิดเห็น</font><i class="glyphicon glyphicon-remove btn" onClick="HidePanel('#pncomment4');" style="float:right;" onMouseOver="changeCursor(this,'pointer');"></i></div>
										<div class="panel-body">
											<div id="apncomment4"></div>
										</div>
										<div class="panel-footer" style="text-align:right;">
											<div class="btn-group" role="group" aria-label="menufootercomment">
													<button type="button" id="Closefrmcomment4" class="btn btn-secondary" onClick="HidePanel('#pncomment4');"><i class='glyphicon glyphicon-share'></i> Close</button>
												</div>
										</div>
								</div>
						</div>
				</div><!-- row -->

	 <!--<div class="row">
		<div class="col-md-12">
				<div id="pnratting1" >
						<div id="pnhratting1" class="panel-heading"><i class="ti-comments"></i><font id="httratting1"> ความคิดเห็น</font><i class="glyphicon glyphicon-remove btn" onClick="HidePanel('#pnratting1');" style="float:right;" onMouseOver="changeCursor(this,'pointer');"></i></div>
							<div class="panel-body">
								<div id="apnratting1"></div>
							</div>
							<div class="panel-footer" style="text-align:right;">
								<div class="btn-group" role="group" aria-label="menufooterratting">
										<button type="button" id="Closefrmratting1" class="btn btn-secondary" onClick="HidePanel('#pnratting1');"><i class='glyphicon glyphicon-share'></i> Close</button>
									</div>
							</div>
					</div>
			</div>
	</div><! row -->
	<div class="row">
	 <div class="col-md-12">
			 <div id="pnratting2" >
					 <div id="pnhratting2" class="panel-heading"><i class="ti-comments"></i><font id="httratting2"> ความคิดเห็น</font><i class="glyphicon glyphicon-remove btn" onClick="HidePanel('#pnratting2');" style="float:right;" onMouseOver="changeCursor(this,'pointer');"></i></div>
						 <div class="panel-body">
							 <div id="apnratting2"></div>
						 </div>
						 <div class="panel-footer" style="text-align:right;">
							 <div class="btn-group" role="group" aria-label="menufooterratting">
									 <button type="button" id="Closefrmratting2" class="btn btn-secondary" onClick="HidePanel('#pnratting2');"><i class='glyphicon glyphicon-share'></i> Close</button>
								 </div>
						 </div>
				 </div>
		 </div>
 </div><!-- row -->

	<div class="row">
		<div class="col-md-12">
				<div id="pnappdetail1" >
						<div id="pnhappdetail1" class="panel-heading"><i class="ti-comments"></i><font id="httappdetail1"> ความคิดเห็น test</font><i class="glyphicon glyphicon-remove btn" onClick="HidePanel('#pnappdetail1');" style="float:right;" onMouseOver="changeCursor(this,'pointer');"></i></div>
							<div class="panel-body">
								<div id="apnappdetail1"></div>
							</div>
							<div class="panel-footer" style="text-align:right;">
								<div class="btn-group" role="group" aria-label="menufooterappdetail">
									<button type="button" id="Closefrmappdetail1" class="btn btn-secondary" onClick="HidePanel('#pnappdetail1');"><i class='glyphicon glyphicon-share'></i> Close</button>
								</div>
							</div>
					</div>
			</div>
	</div><!-- row -->
	<div class="row">
		<div class="col-md-12">
				<div id="pnappdetail2" >
						<div id="pnhappdetail2" class="panel-heading"><i class="ti-comments"></i><font id="httappdetail2"> ความคิดเห็น test</font><i class="glyphicon glyphicon-remove btn" onClick="HidePanel('#pnappdetail2');" style="float:right;" onMouseOver="changeCursor(this,'pointer');"></i></div>
							<div class="panel-body">
								<div id="apnappdetail2"></div>
							</div>
							<div class="panel-footer" style="text-align:right;">
								<div class="btn-group" role="group" aria-label="menufooterappdetail">
										<button type="button" id="Closefrmappdetail2" class="btn btn-secondary" onClick="HidePanel('#pnappdetail2');"><i class='glyphicon glyphicon-share'></i> Close</button>
									</div>
							</div>
					</div>
			</div>
	</div><!-- row -->

</body>
</html>
<?php
if($_SESSION['use_tuseid']=='1'){	//admin programmer
	echo "<script> adminmain(); </script>";
}else	if($_SESSION['use_tuseid']=='2'){	//admin บช.ลน
	echo "<script> adminmain(); </script>";
}else	if($_SESSION['use_tuseid']=='3'){	//พนง.ขายเครดิต
	echo "<script> requestermain(); </script>";
}else	if($_SESSION['use_tuseid']=='4'){	// อนุมัติ
		if($_SESSION['use_appid'] == '4'){	//อนุมัติระดับ 1 ผจก. ฝ่ายขายเครดิต
			echo "<script> considermain1(); </script>";
		}else if($_SESSION['use_appid']=='5'){ //อนุมัติระดับ 2 ผจก. ฝ่าย บช.ลน
			echo "<script> considermain2(); </script>";
		}else if($_SESSION['use_appid']=='6'){	//อนุมัติระดับ 3 ผอ.ฝ่ายการเงิน การลงทุน
			echo "<script> approvemain1(); </script>";
		}else if($_SESSION['use_appid']=='7'){	//อนุมัติระดับ 4 กรรมการผู้จัดการ
			echo "<script> approvemain2(); </script>";
		}
}else{
		echo "<script> loadLoginPage(); </script>";
}
 ?>
