<?php session_start();
	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
	include "../../../Connections/connect_mysql.php";

	$emp_id_r = $_SESSION['emp_id'];
	$crd2_id = $_GET['crd2id'];

	$sql = " SELECT * FROM tblcreditopen2 WHERE crd2_id ={$crd2_id} ";
	$result = mysql_query($sql) or die(mysql_error());
	if($result){
		if(mysql_num_rows($result)>0){
			$record=mysql_fetch_array($result);
			$rca_business_prefix = $record['crd2_crd1id'];
			$rca_business_name = $record['crd2_cusid'];
      			$record['crd2_useid'];
      			$record['crd2_comment'];
      			$record['crd2_assesment'];
			$sellname3 = $record['crd2_sellname'];	
			$status_apv1 = $record['crd2_app1'];
			$status_apv2 = $record['crd2_app2'];
			$status_apv3 = $record['crd2_app3'];
			$status_apv4 = $record['crd2_app4'];
		}
	}

?>
<!DOCTYPE html PUBLIC>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<script>
	$('#pnapp1').lobiPanel({
		sortable: true,
		reload: false,
    	close: false,
		expand: false,
		unpin: false,
    	editTitle: false,
		//minimize: true
		//state: 'collapsed'
	});
	$('#pnapp2').lobiPanel({
		sortable: true,
		reload: false,
    	close: false,
		expand: false,
		unpin: false,
    	editTitle: false,
		//minimize: true
		//state: 'collapsed'
	});
	$('#pnapp3').lobiPanel({
		sortable: true,
		reload: false,
    	close: false,
		expand: false,
		unpin: false,
    	editTitle: false,
		//minimize: true
		//state: 'collapsed'
	});
	$('#pnapp4').lobiPanel({
		sortable: true,
		reload: false,
    	close: false,
		expand: false,
		unpin: false,
    	editTitle: false,
		//minimize: true
		//state: 'collapsed'
	});


/*function showratting1(reqid,apv,posit,res){
	//alert(reqid + ',' + apv + ',' + posit);
	var w = 950;
	var h = 750;
	var left = (screen.width/2)-(w/2);
  	var top = 50; //(screen.height/2)-(h/2);
	if($('#pnratting1').is(':hidden')){
		$('#pnratting1').show();
		$('#pnratting1').removeClass('panel panel-warning');
		$('#pnratting1').removeClass('panel panel-success');
		$('#pnratting1').removeClass('panel panel-danger');
		if(res=='0'){
			$('#pnratting1').addClass('panel panel-warning');
		}else if(res=='1'){
			$('#pnratting1').addClass('panel panel-success');
		}else if(res=='2'){
			$('#pnratting1').addClass('panel panel-danger');
		}
		$('#httratting1').html(' แบบประเมินความเสี่ยง ' + posit);
		$('#apnratting1').load("requester/opencd/data/show_ratting.php?reqid=" + reqid + "&apv=" + apv);
		var instrating = $('#pnratting1').data('lobiPanel');
		instrating.unpin();
		instrating.setSize(w, h);
		instrating.setPosition(left, top);
	}
}*/
function showratting2(reqid,apv,posit,res){
	//alert(reqid + ',' + apv + ',' + posit);
	var w = 950;
	var h = 750;
	var left = (screen.width/2)-(w/2);
  	var top = 50; //(screen.height/2)-(h/2);
	if($('#pnratting2').is(':hidden')){
		$('#pnratting2').show();
		$('#pnratting2').removeClass('panel panel-warning');
		$('#pnratting2').removeClass('panel panel-success');
		$('#pnratting2').removeClass('panel panel-danger');
		if(res=='0'){
			$('#pnratting2').addClass('panel panel-warning');
		}else if(res=='1'){
			$('#pnratting2').addClass('panel panel-success');
		}else if(res=='2'){
			$('#pnratting2').addClass('panel panel-danger');
		}
		$('#httratting2').html(' แบบประเมินความเสี่ยง ' + posit);
		$('#apnratting2').load("requester/opencd/data/show_ratting.php?reqid=" + reqid + "&apv=" + apv);
		var instrating = $('#pnratting2').data('lobiPanel');
		instrating.unpin();
		instrating.setSize(w, h);
		instrating.setPosition(left, top);
	}
}

function showappdetail1(reqid,apv,posit,res){
	//alert(reqid + ',' + apv + ',' + posit + ',' + res);
	var w = 550;
	var h = 450;
	var left = (screen.width/2)-(w/2);
  	var top = 50; //(screen.height/2)-(h/2);
	if($('#pnappdetail1').is(':hidden')){
		$('#pnappdetail1').show();
		$('#pnappdetail1').removeClass('panel panel-warning');
		$('#pnappdetail1').removeClass('panel panel-success');
		$('#pnappdetail1').removeClass('panel panel-danger');
		if(res=='0'){
			$('#pnappdetail1').addClass('panel panel-warning');
		}else if(res=='1'){
			$('#pnappdetail1').addClass('panel panel-success');
		}else if(res=='2'){
			$('#pnappdetail1').addClass('panel panel-danger');
		}
		$('#httappdetail1').html(' รายละเอียดการอนุมัติ ' + posit);
		$('#apnappdetail1').load("requester/opencd/data/show_detail.php?reqid=" + reqid + "&apv=" + apv);
		var instappdetail = $('#pnappdetail1').data('lobiPanel');
		instappdetail.unpin();
		instappdetail.setSize(w, h);
		instappdetail.setPosition(left, top);
	}
}
function showappdetail2(reqid,apv,posit,res){
	//alert(reqid + ',' + apv + ',' + posit + ',' + res);
	var w = 550;
	var h = 450;
	var left = (screen.width/2)-(w/2);
  	var top = 50; //(screen.height/2)-(h/2);
	if($('#pnappdetail2').is(':hidden')){
		$('#pnappdetail2').show();
		$('#pnappdetail2').removeClass('panel panel-warning');
		$('#pnappdetail2').removeClass('panel panel-success');
		$('#pnappdetail2').removeClass('panel panel-danger');
		if(res=='0'){
			$('#pnappdetail2').addClass('panel panel-warning');
		}else if(res=='1'){
			$('#pnappdetail2').addClass('panel panel-success');
		}else if(res=='2'){
			$('#pnappdetail2').addClass('panel panel-danger');
		}
		$('#httappdetail2').html(' รายละเอียดการอนุมัติ ' + posit);
		$('#apnappdetail2').load("requester/opencd/data/show_detail.php?reqid=" + reqid + "&apv=" + apv);
		var instappdetail = $('#pnappdetail2').data('lobiPanel');
		instappdetail.unpin();
		instappdetail.setSize(w, h);
		instappdetail.setPosition(left, top);
	}
}

function showcomment1(reqid,apv,posit,res){
	//alert(reqid + ',' + apv +  ',' + posit);
	var w = 600;
	var h = 450;
	var left = (screen.width/2)-(w/2);
  	var top = 50; //(screen.height/2)-(h/2);
	var classn = $('#pncomment1').attr('class');
	if($('#pncomment1').is(':hidden')){
		$('#pncomment1').show();
		$('#pncomment1').removeClass('panel panel-warning');
		$('#pncomment1').removeClass('panel panel-success');
		$('#pncomment1').removeClass('panel panel-danger');
		if(res=='0'){
			$('#pncomment1').addClass('panel panel-warning');
		}else if(res=='1'){
			$('#pncomment1').addClass('panel panel-success');
		}else if(res=='2'){
			$('#pncomment1').addClass('panel panel-danger');
		}
		$('#httcomment1').html(' ความคิดเห็น ' + posit);
		$('#apncomment1').load("requester/opencd/data/show_comment.php?reqid=" + reqid + "&apv=" + apv);
		var instrating = $('#pncomment1').data('lobiPanel');
		instrating.unpin();
		instrating.setSize(w, h);
		instrating.setPosition(left, top);
	}
}
function showcomment2(reqid,apv,posit,res){
	//alert(reqid + ',' + apv +  ',' + posit);
	var w = 600;
	var h = 450;
	var left = (screen.width/2)-(w/2);
  	var top = 50; //(screen.height/2)-(h/2);
	var classn = $('#pncomment2').attr('class');
	if($('#pncomment2').is(':hidden')){
		$('#pncomment2').show();
		$('#pncomment2').removeClass('panel panel-warning');
		$('#pncomment2').removeClass('panel panel-success');
		$('#pncomment2').removeClass('panel panel-danger');
		if(res=='0'){
			$('#pncomment2').addClass('panel panel-warning');
		}else if(res=='1'){
			$('#pncomment2').addClass('panel panel-success');
		}else if(res=='2'){
			$('#pncomment2').addClass('panel panel-danger');
		}
		$('#httcomment2').html(' ความคิดเห็น ' + posit);
		$('#apncomment2').load("requester/opencd/data/show_comment.php?reqid=" + reqid + "&apv=" + apv);
		var instrating = $('#pncomment2').data('lobiPanel');
		instrating.unpin();
		instrating.setSize(w, h);
		instrating.setPosition(left, top);
	}
}
function showcomment3(reqid,apv,posit,res){
	//alert(reqid + ',' + apv +  ',' + posit);
	var w = 600;
	var h = 450;
	var left = (screen.width/2)-(w/2);
  	var top = 50; //(screen.height/2)-(h/2);
	var classn = $('#pncomment3').attr('class');
	if($('#pncomment3').is(':hidden')){
		$('#pncomment3').show();
		$('#pncomment3').removeClass('panel panel-warning');
		$('#pncomment3').removeClass('panel panel-success');
		$('#pncomment3').removeClass('panel panel-danger');
		if(res=='0'){
			$('#pncomment3').addClass('panel panel-warning');
		}else if(res=='1'){
			$('#pncomment3').addClass('panel panel-success');
		}else if(res=='2'){
			$('#pncomment3').addClass('panel panel-danger');
		}
		$('#httcomment3').html(' ความคิดเห็น ' + posit);
		$('#apncomment3').load("requester/opencd/data/show_comment.php?reqid=" + reqid + "&apv=" + apv);
		var instrating = $('#pncomment3').data('lobiPanel');
		instrating.unpin();
		instrating.setSize(w, h);
		instrating.setPosition(left, top);
	}
}
function showcomment4(reqid,apv,posit,res){
	//alert(reqid + ',' + apv +  ',' + posit);
	var w = 600;
	var h = 450;
	var left = (screen.width/2)-(w/2);
  	var top = 50; //(screen.height/2)-(h/2);
	var classn = $('#pncomment4').attr('class');
	if($('#pncomment4').is(':hidden')){
		$('#pncomment4').show();
		$('#pncomment4').removeClass('panel panel-warning');
		$('#pncomment4').removeClass('panel panel-success');
		$('#pncomment4').removeClass('panel panel-danger');
		if(res=='0'){
			$('#pncomment4').addClass('panel panel-warning');
		}else if(res=='1'){
			$('#pncomment4').addClass('panel panel-success');
		}else if(res=='2'){
			$('#pncomment4').addClass('panel panel-danger');
		}
		$('#httcomment4').html(' ความคิดเห็น ' + posit);
		$('#apncomment4').load("requester/opencd/data/show_comment.php?reqid=" + reqid + "&apv=" + apv);
		var instrating = $('#pncomment4').data('lobiPanel');
		instrating.unpin();
		instrating.setSize(w, h);
		instrating.setPosition(left, top);
	}
}
</script>
</head>

<body>
	<div class="row">
    	<div class="col-md-6">
        	<div id="pnapp1" class="panel <?php if($status_apv1=='0'){ ?>panel-warning <?php }elseif($status_apv1=='1'){ ?> panel-success <?php }elseif($status_apv1=='2'){ ?> panel-danger <?php }else{ ?> panel-info <?php } ?>">
            	<?php
					
					$sql_appresult1 = " select * from tblapprove where app_crd2id = {$crd2_id} and app_useappid = 4 ";
					$result_appresult1 = mysql_query($sql_appresult1) or die(mysql_error());
					$record_appresult1=mysql_fetch_array($result_appresult1);
						$app_useid_appresult1 = $record_appresult1['app_useid'];
					
					if($app_useid_appresult1){
					$sqlapp1 = " SELECT * FROM tbluser WHERE use_id={$app_useid_appresult1} ";
					$resultapp1 = mysql_query($sqlapp1) or die(mysql_error());
					if($resultapp1){
						if(mysql_num_rows($resultapp1)>0){
							$recordapp1=mysql_fetch_array($resultapp1);
							$titid1 = $recordapp1['use_titid'];
							$use_name1 = $recordapp1['use_name'];
							$use_lname1 = $recordapp1['use_lname'];
							$use_appid1 = $recordapp1['use_appid'];

							$sqlapp11 = " SELECT * FROM tbltitle, tbltypeapprove WHERE tit_id = '$titid1' AND tapp_status = '$use_appid1'";
							$resultapp11 = mysql_query($sqlapp11) or die(mysql_error());
							$recordapp11=mysql_fetch_array($resultapp11);
								$tit_name1 = $recordapp11['tit_name'];
								$app_name1 = $recordapp11['tapp_name'];
						}
					}
					}else{ //ถ้ายังไม่มีคนประเมิน
							$app_name1 = "ผู้จัดการฝ่ายขาย";
							$tit_name1 = "";
							$use_name1 = "";
							$use_lname1 = "";
					}
				?>
            	<div id="pnhapp1" class="panel-heading"><img src="images/checker1.png" width="32" height="32"><font id="httapp2"> (พิจารณา 1) > <?=$app_name1?> </font><p><B style="color:#930; padding-left:35px; font-size:12px;"><?php echo "{$tit_name1}{$use_name1}  {$use_lname1}"; ?></B></p></div>
                <div class="panel-body">
                	<div id="apnapp1">
                    <?php if($status_apv1=='0'){ ?>
                    	<img src="images/pencil-list-done-checkmark-todo-exam-icon.svg" width="64" height="64">
                        <b style="font-size:16px;">อยู่ระหว่างการพิจารณา</b>
                    <?php }elseif($status_apv1=='1'){ ?>
                    	<img src="images/chek1.png" width="64" height="64">
                        <b style="font-size:16px;">ผ่านการประเมิน</b>
                    <?php }elseif($status_apv1=='2'){ ?>
                    	<img src="images/false.png" width="64" height="64">
                        <b style="font-size:16px;">ไม่ผ่านการประเมิน</b>
                    <?php }else{ ?>
                    	<img src="images/doccheck1.png" width="64" height="64">
                        <b style="font-size:16px;">ประเมินไม่ได้</b>
                    <?php } ?>
                    </div>
                </div>
                 <div class="panel-footer" style="text-align:right;">
                 	<?php if($status_apv1=='0'){ ?>

					<?php }elseif($status_apv1=='1'){ ?>
					<!--<button type="button" id="btnc1" class="btn btn-secondary" onClick="showratting1('<?#=$crd2_id?>','<?#=$use_appid1?>','<?#=$app_name1?>','<?#=$status_apv1?>');"><i class='glyphicon glyphicon-share'></i> แบบประเมินความเสี่ยง</button>-->
                 	<button type="button" id="btnc1" class="btn btn-secondary" onClick="showcomment1('<?=$crd2_id?>','<?=$use_appid1?>','<?=$app_name1?>','<?=$status_apv1?>');"><i class='glyphicon glyphicon-share'></i> ความคิดเห็น</button>
								<?php }elseif($status_apv1=='2'){ ?>
					<!--<button type="button" id="btnc1" class="btn btn-secondary" onClick="showratting1('<?#=$crd2_id?>','<?#=$use_appid1?>','<?#=$app_name1?>','<?#=$status_apv1?>');"><i class='glyphicon glyphicon-share'></i> แบบประเมินความเสี่ยง</button>-->
                 	<button type="button" id="btnc1" class="btn btn-secondary" onClick="showcomment1('<?=$crd2_id?>','<?=$use_appid1?>','<?=$app_name1?>','<?=$status_apv1?>');"><i class='glyphicon glyphicon-share'></i> ความคิดเห็น</button>
								<?php }else{ ?>
					<button type="button" id="btnc1" class="btn btn-secondary" onClick="showcomment1('<?=$crd2_id?>','<?=$use_appid1?>','<?=$app_name1?>','<?=$status_apv1?>');"><i class='glyphicon glyphicon-share'></i> ความคิดเห็น</button>
				<?php } ?>

                 </div>
            </div><!-- pn -->
        </div><!-- col -->
        <div class="col-md-6">
        	<div id="pnapp2" class="panel <?php if($status_apv2=='0'){ ?>panel-warning <?php }elseif($status_apv2=='1'){ ?> panel-success <?php }elseif($status_apv2=='2'){ ?> panel-danger <?php }else{ ?> panel-info <?php } ?>">
            	<?
					$sql_appresult2 = " select * from tblapprove where app_crd2id = {$crd2_id} and app_useappid = 5 ";
					$result_appresult2 = mysql_query($sql_appresult2) or die(mysql_error());
					$record_appresult2=mysql_fetch_array($result_appresult2);
						$app_useid_appresult2 = $record_appresult2['app_useid'];
						
					if($app_useid_appresult2){
							
					$sqlapp2 = " SELECT * FROM tbluser WHERE use_id={$app_useid_appresult2} ";
					$resultapp2 = mysql_query($sqlapp2) or die(mysql_error());
					if($resultapp2){
						if(mysql_num_rows($resultapp2)>0){
							$recordapp2=mysql_fetch_array($resultapp2);
							$titid2 = $recordapp2['use_titid'];
							$use_name2 = $recordapp2['use_name'];
							$use_lname2 = $recordapp2['use_lname'];
							$use_appid2 = $recordapp2['use_appid'];

							$sqlapp21 = " SELECT * FROM tbltitle, tbltypeapprove WHERE tit_id = '$titid2' AND tapp_status = '$use_appid2'";
							$resultapp21 = mysql_query($sqlapp21) or die(mysql_error());
							$recordapp21=mysql_fetch_array($resultapp21);
								$tit_name2 = $recordapp21['tit_name'];
								$app_name2 = $recordapp21['tapp_name'];
						}
					}
					
					}else{
						$app_name2 = "ผู้จัดการฝ่ายสินเชื่อ/บัญชีลูกหนี้";
						$tit_name2 = "";
						$use_name2 = "";
						$use_lname2 = "";	
					}
				?>
            	<div id="pnhapp2" class="panel-heading"><img src="images/checker1.png" width="32" height="32"><font id="httapp2"> (พิจารณา 2) > <?=$app_name2?> </font><p><B style="color:#930; padding-left:35px; font-size:12px;"><?php echo "{$tit_name2}{$use_name2}  {$use_lname2}"; ?></B></p></div>
                <div class="panel-body">
                	<div id="apnapp2">
                    <?php if($status_apv2=='0'){ ?>
                    	<img src="images/pencil-list-done-checkmark-todo-exam-icon.svg" width="64" height="64">
                        <b style="font-size:16px;">อยู่ระหว่างการพิจารณา</b>
                    <?php }elseif($status_apv2=='1'){ ?>
                    	<img src="images/chek1.png" width="64" height="64">
                        <b style="font-size:16px;">ผ่านการประเมิน</b>
                    <?php }elseif($status_apv2=='2'){ ?>
                    	<img src="images/false.png" width="64" height="64">
                        <b style="font-size:16px;">ไม่ผ่านการประเมิน</b>
                    <?php }else{ ?>
                    	<img src="images/doccheck1.png" width="64" height="64">
                        <b style="font-size:16px;">ประเมินไม่ได้</b>
                    <?php } ?>

                    </div>
                </div>
                 <div class="panel-footer" style="text-align:right;">
                 	<?php if($status_apv2=='0'){ ?>

									<?php }elseif($status_apv2=='1'){ ?>
					<button type="button" id="btnc1" class="btn btn-secondary" onClick="showratting2('<?=$crd2_id?>','<?=$use_appid2?>','<?=$app_name2?>','<?=$status_apv2?>');"><i class='glyphicon glyphicon-share'></i> แบบประเมินความเสี่ยง</button>
                 	<button type="button" id="btnc1" class="btn btn-secondary" onClick="showcomment2('<?=$crd2_id?>','<?=$use_appid2?>','<?=$app_name2?>','<?=$status_apv2?>');"><i class='glyphicon glyphicon-share'></i> ความคิดเห็น</button>
								<?php }elseif($status_apv2=='2'){ ?>
					<button type="button" id="btnc1" class="btn btn-secondary" onClick="showratting2('<?=$crd2_id?>','<?=$use_appid2?>','<?=$app_name2?>','<?=$status_apv2?>');"><i class='glyphicon glyphicon-share'></i> แบบประเมินความเสี่ยง</button>
                 	<button type="button" id="btnc1" class="btn btn-secondary" onClick="showcomment2('<?=$crd2_id?>','<?=$use_appid2?>','<?=$app_name2?>','<?=$status_apv2?>');"><i class='glyphicon glyphicon-share'></i> ความคิดเห็น</button>
								<?php }else{ ?>
                 	<button type="button" id="btnc1" class="btn btn-secondary" onClick="showcomment2('<?=$crd2_id?>','<?=$use_appid2?>','<?=$app_name2?>','<?=$status_apv2?>');"><i class='glyphicon glyphicon-share'></i> ความคิดเห็น</button>
								<?php } ?>

                 </div>
            </div><!-- pn -->
        </div><!-- col -->
    </div><!--row-->
    <div class="row">
    	<div class="col-md-6">
        	<div id="pnapp3" class="panel <?php if($status_apv3=='0'){ ?>panel-warning <?php }elseif($status_apv3=='1'){ ?> panel-success <?php }elseif($status_apv3=='2'){ ?> panel-danger <?php }else{ ?> panel-info <?php } ?>">
            	<?php
					$sql_appresult3 = " select * from tblapprove where app_crd2id = {$crd2_id} and app_useappid = 6 ";
					$result_appresult3 = mysql_query($sql_appresult3) or die(mysql_error());
					$record_appresult3=mysql_fetch_array($result_appresult3);
						$app_useid_appresult3 = $record_appresult3['app_useid'];
				
					if($app_useid_appresult3){
					
					$sqlapp3 = " SELECT * FROM tbluser WHERE use_id={$app_useid_appresult3} ";
					$resultapp3 = mysql_query($sqlapp3) or die(mysql_error());
					if($resultapp3){
						if(mysql_num_rows($resultapp3)>0){
							$recordapp3=mysql_fetch_array($resultapp3);
							$titid3 = $recordapp3['use_titid'];
							$use_name3 = $recordapp3['use_name'];
							$use_lname3 = $recordapp3['use_lname'];
							$use_appid3 = $recordapp3['use_appid'];

							$sqlapp31 = " SELECT * FROM tbltitle, tbltypeapprove WHERE tit_id = '$titid3' AND tapp_status = '$use_appid3'";
							$resultapp31 = mysql_query($sqlapp31) or die(mysql_error());
							$recordapp31=mysql_fetch_array($resultapp31);
								$tit_name3 = $recordapp31['tit_name'];
								$app_name3 = $recordapp31['tapp_name'];
						}
					}
					
					}else{
						$app_name3 = "ผู้อำนวยการฝ่ายการเงิน/การลงทุน";
						$tit_name3 = "";
						$use_name3 = "";
						$use_lname3 = "";
					}
				?>
            	<div id="pnhapp3" class="panel-heading"><img src="images/checker1.png" width="32" height="32"><font id="httapp3"> (อนุมัติ 1) > <?=$app_name3?></font><p><B style="color:#930; padding-left:35px; font-size:12px;"><?php echo "{$tit_name3}{$use_name3}  {$use_lname3}"; ?></B></p></div>
                <div class="panel-body">
                	<div id="apnapp3">
                    <?php if($status_apv3=='0'){ ?>
                    	<img src="images/pencil-list-done-checkmark-todo-exam-icon.svg" width="64" height="64">
                        <b style="font-size:16px;">อยู่ระหว่างการพิจารณา</b>
                    <?php }elseif($status_apv3=='1'){ ?>
                    	<img src="images/chek1.png" width="64" height="64">
                        <b style="font-size:16px;">อนุมัติ</b>
                    <?php }elseif($status_apv3=='2'){ ?>
                    	<img src="images/false.png" width="64" height="64">
                        <b style="font-size:16px;">ไม่อนุมัติ</b>
                    <?php }else{ ?>
                    	<img src="images/doccheck1.png" width="64" height="64">
                        <b style="font-size:16px;">ประเมินไม่ได้</b>
                    <?php } ?>

                    </div>
                </div>
                 <div class="panel-footer" style="text-align:right;">
                 	<?php if($status_apv3=='0'){ ?>

									<?php }elseif($status_apv3=='1'){ ?>
					<button type="button" id="btnc1" class="btn btn-secondary" onClick="showappdetail1('<?=$crd2_id?>','<?=$use_appid3?>','<?=$app_name3?>','<?=$status_apv3?>');"><i class='glyphicon glyphicon-share'></i> รายละเอียดการอนุมัติ</button>
                 	<button type="button" id="btnc1" class="btn btn-secondary" onClick="showcomment3('<?=$crd2_id?>','<?=$use_appid3?>','<?=$app_name3?>','<?=$status_apv3?>');"><i class='glyphicon glyphicon-share'></i> ความคิดเห็น</button>
								<?php }elseif($status_apv3=='2'){ ?>
					<button type="button" id="btnc1" class="btn btn-secondary" onClick="showcomment3('<?=$crd2_id?>','<?=$use_appid3?>','<?=$app_name3?>','<?=$status_apv3?>');"><i class='glyphicon glyphicon-share'></i> ความคิดเห็น</button>
				<?php }else{ ?>
					<button type="button" id="btnc1" class="btn btn-secondary" onClick="showcomment3('<?=$crd2_id?>','<?=$use_appid3?>','<?=$app_name3?>','<?=$status_apv3?>');"><i class='glyphicon glyphicon-share'></i> ความคิดเห็น</button>
				<?php } ?>

                 </div>
            </div><!-- pn -->
        </div><!-- col -->
        <div class="col-md-6">
        	<div id="pnapp4" class="panel <?php if($status_apv4=='0'){ ?>panel-warning <?php }elseif($status_apv4=='1'){ ?> panel-success <?php }elseif($status_apv4=='2'){ ?> panel-danger <?php }else{ ?> panel-info <?php } ?>">
            	<?php
					$sql_appresult4 = " select * from tblapprove where app_crd2id = {$crd2_id} and app_useappid = 7 ";
					$result_appresult4 = mysql_query($sql_appresult4) or die(mysql_error());
					$record_appresult4=mysql_fetch_array($result_appresult4);
						$app_useid_appresult4 = $record_appresult4['app_useid'];
				
					if($app_useid_appresult4){
					
					$sqlapp4 = " SELECT * FROM tbluser WHERE use_id={$app_useid_appresult4} ";
					$resultapp4 = mysql_query($sqlapp4) or die(mysql_error());
					if($resultapp4){
						if(mysql_num_rows($resultapp4)>0){
							$recordapp4=mysql_fetch_array($resultapp4);
							$titid4 = $recordapp4['use_titid'];
							$use_name4 = $recordapp4['use_name'];
							$use_lname4 = $recordapp4['use_lname'];
							$use_appid4 = $recordapp4['use_appid'];

							$sqlapp41 = " SELECT * FROM tbltitle, tbltypeapprove WHERE tit_id = '$titid4' AND tapp_status = '$use_appid4'";
							$resultapp41 = mysql_query($sqlapp41) or die(mysql_error());
							$recordapp41=mysql_fetch_array($resultapp41);
								$tit_name4 = $recordapp41['tit_name'];
								$app_name4 = $recordapp41['tapp_name'];
						}
					}
					
					}else{
						$app_name4 = "กรรมการผู้จัดการฝ่ายบัญชี/การเงิน";
						$tit_name4 = "";
						$use_name4 = "";
						$use_lname4 = "";
					}
				?>
            	<div id="pnhapp4" class="panel-heading"><img src="images/checker1.png" width="32" height="32"><font id="httapp4"> (อนุมัติ 2) > <?=$app_name4?></font><p><B style="color:#930; padding-left:35px; font-size:12px;"><?php echo "{$tit_name4}{$use_name4}  {$use_lname4}"; ?></B></p></div>
                <div class="panel-body">
                	<div id="apnapp4">
                    <?php if($status_apv4=='0'){ ?>
                    	<img src="images/pencil-list-done-checkmark-todo-exam-icon.svg" width="64" height="64">
                        <b style="font-size:16px;">อยู่ระหว่างการพิจารณา</b>
                    <?php }elseif($status_apv4=='1'){ ?>
                    	<img src="images/chek1.png" width="64" height="64">
                        <b style="font-size:16px;">อนุมัติ</b>
                    <?php }elseif($status_apv4=='2'){ ?>
                    	<img src="images/false.png" width="64" height="64">
                        <b style="font-size:16px;">ไม่อนุมัติ</b>
                    <?php }else{ ?>
                    	<img src="images/doccheck1.png" width="64" height="64">
                        <b style="font-size:16px;">ประเมินไม่ได้</b>
                    <?php } ?>

                    </div>
                </div>
                 <div class="panel-footer" style="text-align:right;">
                 	<?php if($status_apv4=='0'){ ?>

									<?php }elseif($status_apv4=='1'){ ?>
					<button type="button" id="btnc1" class="btn btn-secondary" onClick="showappdetail2('<?=$crd2_id?>','<?=$use_appid4?>','<?=$app_name4?>','<?=$status_apv4?>');"><i class='glyphicon glyphicon-share'></i> รายละเอียดการอนุมัติ</button>
                 	<button type="button" id="btnc1" class="btn btn-secondary" onClick="showcomment4('<?=$crd2_id?>','<?=$use_appid4?>','<?=$app_name4?>','<?=$status_apv4?>');"><i class='glyphicon glyphicon-share'></i> ความคิดเห็น</button>
								<?php }elseif($status_apv4=='2'){ ?>
					<button type="button" id="btnc1" class="btn btn-secondary" onClick="showcomment4('<?=$crd2_id?>','<?=$use_appid4?>','<?=$app_name4?>','<?=$status_apv4?>');"><i class='glyphicon glyphicon-share'></i> ความคิดเห็น</button>
				<?php }else{ ?>
					<button type="button" id="btnc1" class="btn btn-secondary" onClick="showcomment4('<?=$crd2_id?>','<?=$use_appid4?>','<?=$app_name4?>','<?=$status_apv4?>');"><i class='glyphicon glyphicon-share'></i> ความคิดเห็น</button>
				<?php } ?>

                 </div>
            </div><!-- pn -->
        </div><!-- col -->
    </div><!--row-->
</body>
</html>
<?php
	mysql_close($c); //close connection
?>
