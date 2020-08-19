<?php
	session_start();
	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
  include "../../../Connections/connect_mysql.php";

	$use_id_r = $_SESSION['use_id'];
	$reqid_d = $_GET['reqid'];

	$sqls = " SELECT * FROM tblcreditopen2 WHERE crd2_id = '$reqid_d'";
	$results = mysql_query($sqls) or die(mysql_error());
	if($results){
		if(mysql_num_rows($results)>0){
			$records=mysql_fetch_array($results);
			$rca_id_rat = $records['crd2_id'];
      		$cus_id = $records['crd2_cusid'];
      		$saleid = $records['crd2_useid'];
			$sellname2 = $records['crd2_sellname'];
      $sql2 = "SELECT * FROM tblcustomer, tbluser WHERE cus_id = '$cus_id' AND use_id = '$saleid'";
            $result2 = mysql_query($sql2) or die(mysql_error());
            while($record2 = mysql_fetch_array($result2)){
              $cuscode = $record2['cus_code'];
              $cus_openoth = $record2['cus_openoth']; //ประเภทกิจการอื่นๆ
              $cus_company = $record2['cus_company']; //ชื่อกิจการ
              $cusopen = $record2['cus_openid'];
							$tit = $record2['cus_titid'];
							$cusname = $record2['cus_name'];
							$cuslname = $record2['cus_lname'];

              $bran = $record2['use_branid'];
							$salename = $record2['use_name'];
							$salelname = $record2['use_lname'];
        $sql3 = "SELECT * FROM tbltypeopen, tblbrand, tbltitle WHERE open_id = '$cusopen' AND bran_id = '$bran' AND tit_id = '$tit'";
        $result3 = mysql_query($sql3) or die(mysql_error());
        while($record3 = mysql_fetch_array($result3)){
          $type_busin = $record3['open_name'];
          $branname = $record3['bran_name'];
					$titname = $record3['tit_name'];
        }
      }
		}
	}

	$sqlrat = " SELECT * FROM tblassessment WHERE asm_crd2id = '$reqid_d' and asm_useid = '".$_SESSION['use_id']."' ";
	$resultrat = mysql_query($sqlrat) or die(mysql_error());
	if($resultrat){
		if(mysql_num_rows($resultrat)>0){
			$hdt = '0';
			$recordrat=mysql_fetch_array($resultrat);
			$crat_id = $recordrat['asm_id'];
			$score1 = $recordrat['asm_score1'];
			$score2 = $recordrat['asm_score2'];
			$score3 = $recordrat['asm_score3'];
			$score4 = $recordrat['asm_score4'];
			$score5 = $recordrat['asm_score5'];
			$score6 = $recordrat['asm_score6'];
			$score7 = $recordrat['asm_score7'];
			$score8 = $recordrat['asm_score8'];
			$score9 = $recordrat['asm_score9'];
			$score10 = $recordrat['asm_score10'];
			$scoret1 = $recordrat['asm_score_total1'];
			$scoret2 = $recordrat['asm_score_total2'];
			$scoret3 = $recordrat['asm_score_total3'];
			$scoret4 = $recordrat['asm_score_total4'];
			$moneystart = $recordrat['asm_monstart'];
			$crat_comment = $recordrat['asm_comment'];
		}else{
			$hdt = '1';
		}
	}else{
		$hdt = '2';
	}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title></title>
 <!-- include bootstrap dialog
	<link href="dist/css/bootstrap-dialog.min.css" rel="stylesheet">
	<script src="dist/js/bootstrap-dialog.min.js"></script> -->
<script>
var scoretotal1 = 0;
var scoretotal2 = 0;
var scoretotal3 = 0;
var scoretotal4 = 0;
var a = '0';
	$('#score1').on('keypress', function (e) {
         if(e.which === 13){
			 if($('#score1').val()>10){
			 	$('#smtr1').html('ป้อนตัวเลขได้ไม่เกิน 10');
				$('#score1').focus();
				$('#score1').select();
			 }else{
				 $('#smtr1').html('');
				scoretotal1 = Number($('#score1').val()) + Number($('#score2').val()) + Number($('#score3').val()) + Number($('#score4').val()) + Number($('#score5').val());
				scoretotal4 = Number($('#score1').val()) + Number($('#score2').val()) + Number($('#score3').val()) + Number($('#score4').val()) + Number($('#score5').val()) + Number($('#score6').val()) + Number($('#score7').val()) + Number($('#score8').val()) + Number($('#score9').val()) + Number($('#score10').val());
				$('#scoret4').val(scoretotal4);
				$('#scoret1').val(scoretotal1);
				$('#score2').focus();
			 }
         }
   });
   $( "#score1" ).blur(function() {
  		if($('#score1').val()>10){
				$('#smtr1').html('ป้อนตัวเลขได้ไม่เกิน 10');
				$('#score1').focus();
				$('#score1').select();
			 }else{
				 $('#smtr1').html('');
				scoretotal1 = Number($('#score1').val()) + Number($('#score2').val()) + Number($('#score3').val()) + Number($('#score4').val()) + Number($('#score5').val());
				scoretotal4 = Number($('#score1').val()) + Number($('#score2').val()) + Number($('#score3').val()) + Number($('#score4').val()) + Number($('#score5').val()) + Number($('#score6').val()) + Number($('#score7').val()) + Number($('#score8').val()) + Number($('#score9').val()) + Number($('#score10').val());
				$('#scoret4').val(scoretotal4);
				$('#scoret1').val(scoretotal1);

			 }
	});
	$('#score2').on('keypress', function (e) {
         if(e.which === 13){
			if($('#score2').val()>10){
				$('#smtr2').html('ป้อนตัวเลขได้ไม่เกิน 10');
				$('#score2').focus();
				$('#score2').select();
			 }else{
				 $('#smtr2').html('');
				scoretotal1 = Number($('#score1').val()) + Number($('#score2').val()) + Number($('#score3').val()) + Number($('#score4').val()) + Number($('#score5').val());
				scoretotal4 = Number($('#score1').val()) + Number($('#score2').val()) + Number($('#score3').val()) + Number($('#score4').val()) + Number($('#score5').val()) + Number($('#score6').val()) + Number($('#score7').val()) + Number($('#score8').val()) + Number($('#score9').val()) + Number($('#score10').val());
				$('#scoret4').val(scoretotal4);
				$('#scoret1').val(scoretotal1);
				$('#score3').focus();
			 }
		 }
	});
	$( "#score2" ).blur(function() {
		if($('#score2').val()>10){
				$('#smtr2').html('ป้อนตัวเลขได้ไม่เกิน 10');
				$('#score2').focus();
				$('#score2').select();
			 }else{
				 $('#smtr2').html('');
				scoretotal1 = Number($('#score1').val()) + Number($('#score2').val()) + Number($('#score3').val()) + Number($('#score4').val()) + Number($('#score5').val());
				scoretotal4 = Number($('#score1').val()) + Number($('#score2').val()) + Number($('#score3').val()) + Number($('#score4').val()) + Number($('#score5').val()) + Number($('#score6').val()) + Number($('#score7').val()) + Number($('#score8').val()) + Number($('#score9').val()) + Number($('#score10').val());
				$('#scoret4').val(scoretotal4);
				$('#scoret1').val(scoretotal1);

			 }
	});
	$('#score3').on('keypress', function (e) {
         if(e.which === 13){
			if($('#score3').val()>10){
			 	$('#smtr3').html('ป้อนตัวเลขได้ไม่เกิน 10');
				$('#score3').focus();
				$('#score3').select();
			 }else{
				 $('#smtr3').html('');
				 scoretotal1 = Number($('#score1').val()) + Number($('#score2').val()) + Number($('#score3').val()) + Number($('#score4').val()) + Number($('#score5').val());
				 scoretotal4 = Number($('#score1').val()) + Number($('#score2').val()) + Number($('#score3').val()) + Number($('#score4').val()) + Number($('#score5').val()) + Number($('#score6').val()) + Number($('#score7').val()) + Number($('#score8').val()) + Number($('#score9').val()) + Number($('#score10').val());
				$('#scoret4').val(scoretotal4);
				$('#scoret1').val(scoretotal1);
				$('#score4').focus();
			 }
		 }
	});
	$( "#score3" ).blur(function() {
		if($('#score3').val()>10){
			 	$('#smtr3').html('ป้อนตัวเลขได้ไม่เกิน 10');
				$('#score3').focus();
				$('#score3').select();
			 }else{
				 $('#smtr3').html('');
				 scoretotal1 = Number($('#score1').val()) + Number($('#score2').val()) + Number($('#score3').val()) + Number($('#score4').val()) + Number($('#score5').val());
				 scoretotal4 = Number($('#score1').val()) + Number($('#score2').val()) + Number($('#score3').val()) + Number($('#score4').val()) + Number($('#score5').val()) + Number($('#score6').val()) + Number($('#score7').val()) + Number($('#score8').val()) + Number($('#score9').val()) + Number($('#score10').val());
				$('#scoret4').val(scoretotal4);
				$('#scoret1').val(scoretotal1);
			 }
	});
	$('#score4').on('keypress', function (e) {
         if(e.which === 13){
			if($('#smtr4').val()>10){
			 	$('#txterr').html('ป้อนตัวเลขได้ไม่เกิน 10');
				$('#score4').focus();
				$('#score4').select();
			 }else{
				 $('#smtr4').html('');
				 scoretotal1 = Number($('#score1').val()) + Number($('#score2').val()) + Number($('#score3').val()) + Number($('#score4').val()) + Number($('#score5').val());
				 scoretotal4 = Number($('#score1').val()) + Number($('#score2').val()) + Number($('#score3').val()) + Number($('#score4').val()) + Number($('#score5').val()) + Number($('#score6').val()) + Number($('#score7').val()) + Number($('#score8').val()) + Number($('#score9').val()) + Number($('#score10').val());
				$('#scoret4').val(scoretotal4);
				$('#scoret1').val(scoretotal1);
				$('#score5').focus();
			 }
		 }
	});
	$( "#score4" ).blur(function() {
		if($('#score4').val()>10){
			 	$('#smtr4').html('ป้อนตัวเลขได้ไม่เกิน 10');
				$('#score4').focus();
				$('#score4').select();
			 }else{
				 $('#smtr4').html('');
				 scoretotal1 = Number($('#score1').val()) + Number($('#score2').val()) + Number($('#score3').val()) + Number($('#score4').val()) + Number($('#score5').val());
				 scoretotal4 = Number($('#score1').val()) + Number($('#score2').val()) + Number($('#score3').val()) + Number($('#score4').val()) + Number($('#score5').val()) + Number($('#score6').val()) + Number($('#score7').val()) + Number($('#score8').val()) + Number($('#score9').val()) + Number($('#score10').val());
				$('#scoret4').val(scoretotal4);
				$('#scoret1').val(scoretotal1);

			 }
	});
	$('#score5').on('keypress', function (e) {
         if(e.which === 13){
			if($('#smtr5').val()>10){
			 	$('#txterr').html('ป้อนตัวเลขได้ไม่เกิน 10');
				$('#score5').focus();
				$('#score5').select();
			 }else{
			 	$('#smtr5').html('');
			 	 scoretotal1 = Number($('#score1').val()) + Number($('#score2').val()) + Number($('#score3').val()) + Number($('#score4').val()) + Number($('#score5').val());
				 scoretotal4 = Number($('#score1').val()) + Number($('#score2').val()) + Number($('#score3').val()) + Number($('#score4').val()) + Number($('#score5').val()) + Number($('#score6').val()) + Number($('#score7').val()) + Number($('#score8').val()) + Number($('#score9').val()) + Number($('#score10').val());
				$('#scoret4').val(scoretotal4);
				$('#scoret1').val(scoretotal1);
				$('#score6').focus();
			 }
		 }
	});
	$( "#score5" ).blur(function() {
		if($('#score5').val()>10){
			 	$('#smtr5').html('ป้อนตัวเลขได้ไม่เกิน 10');
				$('#score5').focus();
				$('#score5').select();
			 }else{
			 	$('#smtr5').html('');
			 	 scoretotal1 = Number($('#score1').val()) + Number($('#score2').val()) + Number($('#score3').val()) + Number($('#score4').val()) + Number($('#score5').val());
				 scoretotal4 = Number($('#score1').val()) + Number($('#score2').val()) + Number($('#score3').val()) + Number($('#score4').val()) + Number($('#score5').val()) + Number($('#score6').val()) + Number($('#score7').val()) + Number($('#score8').val()) + Number($('#score9').val()) + Number($('#score10').val());
				$('#scoret4').val(scoretotal4);
				$('#scoret1').val(scoretotal1);

			 }
	});
	$('#score6').on('keypress', function (e) {
         if(e.which === 13){
			if($('#score6').val()>10){
			 	$('#smtr6').html('ป้อนตัวเลขได้ไม่เกิน 10');
				$('#score6').focus();
				$('#score6').select();
			 }else{
			 	$('#smtr6').html('');
			 	 scoretotal2 = Number($('#score6').val()) + Number($('#score7').val()) + Number($('#score8').val());
				 scoretotal4 = Number($('#score1').val()) + Number($('#score2').val()) + Number($('#score3').val()) + Number($('#score4').val()) + Number($('#score5').val()) + Number($('#score6').val()) + Number($('#score7').val()) + Number($('#score8').val()) + Number($('#score9').val()) + Number($('#score10').val());
				$('#scoret4').val(scoretotal4);
				$('#scoret2').val(scoretotal2);
				$('#score7').focus();
			 }
		 }
	});
	$( "#score6" ).blur(function() {
		if($('#score6').val()>10){
			 	$('#smtr6').html('ป้อนตัวเลขได้ไม่เกิน 10');
				$('#score6').focus();
				$('#score6').select();
			 }else{
			 	$('#smtr6').html('');
			 	 scoretotal2 = Number($('#score6').val()) + Number($('#score7').val()) + Number($('#score8').val());
				 scoretotal4 = Number($('#score1').val()) + Number($('#score2').val()) + Number($('#score3').val()) + Number($('#score4').val()) + Number($('#score5').val()) + Number($('#score6').val()) + Number($('#score7').val()) + Number($('#score8').val()) + Number($('#score9').val()) + Number($('#score10').val());
				$('#scoret4').val(scoretotal4);
				$('#scoret2').val(scoretotal2);

			 }
	});
	$('#score7').on('keypress', function (e) {
         if(e.which === 13){
			if($('#score7').val()>10){
			 	$('#smtr7').html('ป้อนตัวเลขได้ไม่เกิน 10');
				$('#score7').focus();
				$('#score7').select();
			 }else{
			 	$('#smtr7').html('');
			 	 scoretotal2 = Number($('#score6').val()) + Number($('#score7').val()) + Number($('#score8').val());
				 scoretotal4 = Number($('#score1').val()) + Number($('#score2').val()) + Number($('#score3').val()) + Number($('#score4').val()) + Number($('#score5').val()) + Number($('#score6').val()) + Number($('#score7').val()) + Number($('#score8').val()) + Number($('#score9').val()) + Number($('#score10').val());
				$('#scoret4').val(scoretotal4);
				$('#scoret2').val(scoretotal2);
				$('#score8').focus();
			 }
		 }
	});
	$( "#score7" ).blur(function() {
		if($('#score7').val()>10){
			 	$('#smtr7').html('ป้อนตัวเลขได้ไม่เกิน 10');
				$('#score7').focus();
				$('#score7').select();
			 }else{
			 	$('#smtr7').html('');
			 	 scoretotal2 = Number($('#score6').val()) + Number($('#score7').val()) + Number($('#score8').val());
				 scoretotal4 = Number($('#score1').val()) + Number($('#score2').val()) + Number($('#score3').val()) + Number($('#score4').val()) + Number($('#score5').val()) + Number($('#score6').val()) + Number($('#score7').val()) + Number($('#score8').val()) + Number($('#score9').val()) + Number($('#score10').val());
				$('#scoret4').val(scoretotal4);
				$('#scoret2').val(scoretotal2);

			 }
	});
	$('#score8').on('keypress', function (e) {
         if(e.which === 13){
			if($('#score8').val()>10){
			 	$('#smtr8').html('ป้อนตัวเลขได้ไม่เกิน 10');
				$('#score8').focus();
				$('#score8').select();
			 }else{
			 	$('#smtr8').html('');
			 	 scoretotal2 = Number($('#score6').val()) + Number($('#score7').val()) + Number($('#score8').val());
				 scoretotal4 = Number($('#score1').val()) + Number($('#score2').val()) + Number($('#score3').val()) + Number($('#score4').val()) + Number($('#score5').val()) + Number($('#score6').val()) + Number($('#score7').val()) + Number($('#score8').val()) + Number($('#score9').val()) + Number($('#score10').val());
				$('#scoret4').val(scoretotal4);
				$('#scoret2').val(scoretotal2);
				$('#score9').focus();
			 }
		 }
	});
	$( "#score8" ).blur(function() {
		if($('#score8').val()>10){
			 	$('#smtr8').html('ป้อนตัวเลขได้ไม่เกิน 10');
				$('#score8').focus();
				$('#score8').select();
			 }else{
			 	$('#smtr8').html('');
			 	 scoretotal2 = Number($('#score6').val()) + Number($('#score7').val()) + Number($('#score8').val());
				scoretotal4 = Number($('#score1').val()) + Number($('#score2').val()) + Number($('#score3').val()) + Number($('#score4').val()) + Number($('#score5').val()) + Number($('#score6').val()) + Number($('#score7').val()) + Number($('#score8').val()) + Number($('#score9').val()) + Number($('#score10').val());
				$('#scoret4').val(scoretotal4);
				$('#scoret2').val(scoretotal2);

			 }
	});
	$('#score9').on('keypress', function (e) {
         if(e.which === 13){
			if($('#score9').val()>10){
			 	$('#smtr9').html('ป้อนตัวเลขได้ไม่เกิน 10');
				$('#score9').focus();
				$('#score9').select();
			 }else{
			 	$('#smtr9').html('');
			 	scoretotal3 = Number($('#score9').val()) + Number($('#score10').val());
				scoretotal4 = Number($('#score1').val()) + Number($('#score2').val()) + Number($('#score3').val()) + Number($('#score4').val()) + Number($('#score5').val()) + Number($('#score6').val()) + Number($('#score7').val()) + Number($('#score8').val()) + Number($('#score9').val()) + Number($('#score10').val());
				$('#scoret4').val(scoretotal4);
				$('#scoret3').val(scoretotal3);
				$('#score10').focus();
			 }
		 }
	});
	$( "#score9" ).blur(function() {
		if($('#score9').val()>10){
			 	$('#smtr9').html('ป้อนตัวเลขได้ไม่เกิน 10');
				$('#score9').focus();
				$('#score9').select();
			 }else{
				 $('#smtr9').html('');
			 	scoretotal3 = Number($('#score9').val()) + Number($('#score10').val());
				scoretotal4 = Number($('#score1').val()) + Number($('#score2').val()) + Number($('#score3').val()) + Number($('#score4').val()) + Number($('#score5').val()) + Number($('#score6').val()) + Number($('#score7').val()) + Number($('#score8').val()) + Number($('#score9').val()) + Number($('#score10').val());
				$('#scoret4').val(scoretotal4);
				$('#scoret3').val(scoretotal3);

			 }
	});
	$('#score10').on('keypress', function (e) {
         if(e.which === 13){
			if($('#score10').val()>10){
			 	$('#smtr10').html('ป้อนตัวเลขได้ไม่เกิน 10');
				$('#score10').focus();
				$('#score10').select();
			 }else{
			 	$('#smtr10').html('');
			 	scoretotal3 = Number($('#score9').val()) + Number($('#score10').val());
				scoretotal4 = Number($('#score1').val()) + Number($('#score2').val()) + Number($('#score3').val()) + Number($('#score4').val()) + Number($('#score5').val()) + Number($('#score6').val()) + Number($('#score7').val()) + Number($('#score8').val()) + Number($('#score9').val()) + Number($('#score10').val());
				$('#scoret4').val(scoretotal4);
				$('#scoret3').val(scoretotal3);
			 }
		 }
	});
	$( "#score10" ).blur(function() {
		if($('#score10').val()>10){
			 	$('#smtr10').html('ป้อนตัวเลขได้ไม่เกิน 10');
				$('#score10').focus();
				$('#score10').select();
			 }else{
			 	$('#smtr10').html('');
			 	scoretotal3 = Number($('#score9').val()) + Number($('#score10').val());
				scoretotal4 = Number($('#score1').val()) + Number($('#score2').val()) + Number($('#score3').val()) + Number($('#score4').val()) + Number($('#score5').val()) + Number($('#score6').val()) + Number($('#score7').val()) + Number($('#score8').val()) + Number($('#score9').val()) + Number($('#score10').val());
				$('#scoret4').val(scoretotal4);
				$('#scoret3').val(scoretotal3);
			 }
	});

function closedlg(){
	dlgints.close();
}

function closedlg2(){
	a = '0';
	dlgalert.close();
}

function alertBDialog5(a){
	/*-- open dialog --*/
	 dlgalert.setMessage($('<div></div>').html("คะแนนต้องใส่ไม่เกิน 10."));
	 if(a=='0'){
	 	dlgalert.open();
	 }
}

</script>
</head>

<body>
<!--<div class="row">
	<div class="col-md-12">
  		<label><input type="checkbox" value="1" checked> ครั้งแรก</label>
  	</div>
</div>-->
<div class="row" style="padding-top:10px;">
	<div class="col-md-7">
    	รหัสลูกค้า/ประเภทลูกค้า :  <span style="color:#00C;"><strong><?=$cuscode?> /<?=$type_busin?>  </strong></span><!--<?php //if ($cusopen != 6) {
        //echo $type_busin." ".$cus_company; }else { echo $cus_openoth." ".$cus_company; } ?> -->
    </div>
    <div class="col-md-5">
    	เขตการขาย : <span style="color:#00C;"><strong><?=$branname?></strong></span>
    </div>
</div>
<div class="row" style="padding-top:10px;">
	<div class="col-md-7">
    	ชื่อลูกค้า : <span style="color:#00C;"><strong><?=$type_busin?> <?=$cus_company?><?#$titname?><?#$cusname?> <?#$cuslname?></strong></span>
    </div>
    <div class="col-md-5">
    	ชื่อผู้ดูแล(Sales) : <span style="color:#00C;"><strong><?=$sellname2?></strong></span> <!--<?$salename?> <?$salelname?>-->
    </div>
</div>
<div id="txterr" style="color:#F00; font-size:9px;"></div>
<div class="row" style="padding-top:10px;">
	<div class="col-md-12">
	<table class="table table-responsive table-hover table-bordered" style="width:100%;">
    	<thead style="background-color:#F96;">
        	<tr>
        		<th style="text-align:center;">ลำดับ</th>
            	<th style="text-align:center;">ปัจจัยที่มีผลต่อความเสี่ยงในสินเชื่อ</th>
            	<th style="text-align:center;">น้ำหนัก<br>(คะแนนเต็ม)</th>
            	<th style="text-align:center;">ตัดคะแนน<br>Cut-off point</th>
            	<th style="text-align:center;">คะแนนที่ได้รับ</th>
            </tr>
        </thead>
        <tbody>
        	<tr>
        		<td><b style="color:#930;">1.Capacity</b></td>
            	<td style="font-size:13px;">1.สำเนาบัตรประชาชนและสำเนาทะเบียนบ้านของผู้มีอำนาจ<em>(ความครบถ้วน)</em></td>
            	<td style="text-align:center;">10</td>
            	<td style="text-align:center;">5</td>
            	<td style="text-align:center;">
                <input type="text" <?php if($hdt=='0'){ ?> value="<?=$score1?>" <?php }else{ ?> value="0" <?php } ?> onFocus="javascript:this.select();" class="form-control border-input" placeholder="0" id="score1" style="width:60px; text-align:center;">
                <small id="smtr1" class="form-text text-muted" style="color:#F30;"></small>
                </td>
            </tr>
            <tr>
        		<td></td>
            	<td style="font-size:13px;">2.สำเนาหนังสือรับรองบริษัท/หจก./บมจ. อายุไม่เกิน 1 เดือน <em>(ครบถ้วน,ประเภทธุรกิจ,ผู้ถือหุ้น,กรรมการ)</em></td>
            	<td style="text-align:center;">10</td>
            	<td style="text-align:center;">5</td>
            	<td style="text-align:center;"><input type="text" <?php if($hdt=='0'){ ?> value="<?=$score2?>" <?php }else{ ?> value="0" <?php } ?> onFocus="javascript:this.select();"  class="form-control border-input" placeholder="0" id="score2" style="width:60px; text-align:center;">
                <small id="smtr2" class="form-text text-muted" style="color:#F30;"></small>
                </td>
            </tr>
            <tr>
        		<td></td>
            	<td style="font-size:13px;">3.ใบ ภ.พ.20/ใบทะเบียนพาณิชย์/ภาพถ่ายร้านค้า,ธุรกิจ,หน้างาน <em>(ครบถ้วน,น่าเชื่อถือ)</em></td>
            	<td style="text-align:center;">10</td>
            	<td style="text-align:center;">5</td>
            	<td style="text-align:center;"><input type="text" <?php if($hdt=='0'){ ?> value="<?=$score3?>" <?php }else{ ?> value="0" <?php } ?> onFocus="javascript:this.select();" class="form-control border-input" placeholder="0" id="score3" style="width:60px; text-align:center;">
                <small id="smtr3" class="form-text text-muted" style="color:#F30;"></small>
                </td>
            </tr>
            <tr>
        		<td></td>
            	<td style="font-size:13px;">4.งบกำไรขาดทุน <em>(สัดส่วนเพิ่มกำไร,รายได้,ค่าใช้จ่าย)</em></td>
            	<td style="text-align:center;">10</td>
            	<td style="text-align:center;">5</td>
            	<td style="text-align:center;"><input type="text" <?php if($hdt=='0'){ ?> value="<?=$score4?>" <?php }else{ ?> value="0" <?php } ?> onFocus="javascript:this.select();" class="form-control border-input" placeholder="0" id="score4" placeholder="0" style="width:60px; text-align:center;">
                <small id="smtr4" class="form-text text-muted" style="color:#F30;"></small>
                </td>
            </tr>
            <tr>
        		<td></td>
            	<td style="font-size:13px;">5.เลขที่บัญชีและธนาคารที่ลูกค้าใช้ในการทำธุรกิจ <em>(การหมุนเวียนของเงินสด)</em></td>
            	<td style="text-align:center;">10</td>
            	<td style="text-align:center;">5</td>
            	<td style="text-align:center;"><input type="text" <?php if($hdt=='0'){ ?> value="<?=$score5?>" <?php }else{ ?> value="0" <?php } ?> onFocus="javascript:this.select();" class="form-control border-input" placeholder="0" id="score5" placeholder="0" style="width:60px; text-align:center;">
                <small id="smtr5" class="form-text text-muted" style="color:#F30;"></small>
                </td>
            </tr>
            <tr style="border-bottom:2pt solid black; border-top:2pt solid black; background-color:#FC9;">
        		<td colspan="2" style="font-size:12px;"><strong><em>เกณฑ์การให้คะแนน Cirteria//ความสามารถในการชำระหนี้ของลูกค้า สภาพคล่องทาองการเงิน,ความมั่นคงของธุรกิจ</em></strong></td>
            	<td style="text-align:center;"><strong>50</strong></td>
            	<td style="text-align:center;"><strong>25</strong></td>
            	<td style="text-align:center;">
                	<input type="text" disabled id="scoret1" <?php if($hdt=='0'){ ?> value="<?=$scoret1?>" <?php }else{ ?> value="0" <?php } ?> onFocus="javascript:this.select();" class="form-control border-input" placeholder="0" style="width:60px; text-align:center;  font-weight:bold; background-color:#FC9;">
                </td>
            </tr>
            <tr>
        		<td><strong style="color:#930;">2.Capital</strong></td>
            	<td style="font-size:13px;">1.งบแสดงฐานะการเงิน/อัตราส่วนทางการเงิน<em>(ดูข้อมูลได้จากhttp://www.dbd.go.th)</em></td>
            	<td style="text-align:center;">10</td>
            	<td style="text-align:center;">5</td>
            	<td style="text-align:center;"><input id="score6" <?php if($hdt=='0'){ ?> value="<?=$score6?>" <?php }else{ ?> value="0" <?php } ?> onFocus="javascript:this.select();" class="form-control border-input" placeholder="0" type="text" style="width:60px; text-align:center;">
                <small id="smtr6" class="form-text text-muted" style="color:#F30;"></small>
                </td>
            </tr>
            <tr>
        		<td></td>
            	<td style="font-size:13px;">2.ทุนจดทะเบียน</td>
            	<td style="text-align:center;">10</td>
            	<td style="text-align:center;">5</td>
            	<td style="text-align:center;"><input id="score7" <?php if($hdt=='0'){ ?> value="<?=$score7?>" <?php }else{ ?> value="0" <?php } ?> onFocus="javascript:this.select();" class="form-control border-input" placeholder="0" type="text" style="width:60px; text-align:center;">
                <small id="smtr7" class="form-text text-muted" style="color:#F30;"></small>
                </td>
            </tr>
            <tr>
        		<td></td>
            	<td style="font-size:13px;">3.Bank Statement ย้อนหลัง 6 เดือน<em>(การหมุนเวียนของเงินสด,รายได้,ค่าใช้จ่ายในระบบบัญชี)</em></td>
            	<td style="text-align:center;">10</td>
            	<td style="text-align:center;">5</td>
            	<td style="text-align:center;"><input id="score8" <?php if($hdt=='0'){ ?> value="<?=$score8?>" <?php }else{ ?> value="0" <?php } ?> onFocus="javascript:this.select();" class="form-control border-input" placeholder="0" type="text" style="width:60px; text-align:center;">
                <small id="smtr8" class="form-text text-muted" style="color:#F30;"></small>
                </td>
            </tr>
            <tr style="border-bottom:2pt solid black; border-top:2pt solid black; background-color:#FC9;">
        		<td colspan="2" style="font-size:12px;"><strong><em>เกณฑ์การใช้คะแนน Criteria// ประเมินจากสินทรัพย์,เงินทุน,ค่าเฉลี่ยของการบริหารสินทรัพย์/หนี้สิ้น</em></strong></td>
            	<td style="text-align:center;"><strong>30</strong></td>
            	<td style="text-align:center;"><strong>15</strong></td>
            	<td style="text-align:center;">
                <input type="text" disabled id="scoret2" <?php if($hdt=='0'){ ?> value="<?=$scoret2?>" <?php }else{ ?> value="0" <?php } ?> onFocus="javascript:this.select();" class="form-control border-input" placeholder="0" style="width:60px; text-align:center;  font-weight:bold; background-color:#FC9;">

                </td>
            </tr>
            <tr>
        		<td><strong style="color:#930;">3.Collateral</strong></td>
            	<td style="font-size:13px;">1.หนังสือค้ำประกันจากธนาคาร BG/LG <em>(ตามเกณฑ์วงเงินที่ให้เครดิต)</em></td>
            	<td style="text-align:center;">10</td>
            	<td style="text-align:center;">5</td>
            	<td style="text-align:center;"><input id="score9" onFocus="javascript:this.select();" <?php if($hdt=='0'){ ?> value="<?=$score9?>" <?php }else{ ?> value="0" <?php } ?> class="form-control border-input" placeholder="0" type="text" style="width:60px; text-align:center;">
                <small id="smtr9" class="form-text text-muted" style="color:#F30;"></small>
                </td>
            </tr>
            <tr>
        		<td></td>
            	<td style="font-size:13px;">2.หลักทรัพย์อื่นๆ ที่มีค้ำประกัน<em>(เช็คจ่ายล่วงหน้า,เงินสด,ทรัพย์สินอื่นๆ)</em></td>
            	<td style="text-align:center;">10</td>
            	<td style="text-align:center;">5</td>
            	<td style="text-align:center;"><input id="score10" onFocus="javascript:this.select();" <?php if($hdt=='0'){ ?> value="<?=$score10?>" <?php }else{ ?> value="0" <?php } ?> class="form-control border-input" placeholder="0" type="text" style="width:60px; text-align:center;">
                <small id="smtr10" class="form-text text-muted" style="color:#F30;"></small>
                </td>
            </tr>
            <tr  style="border-bottom:2pt solid black; border-top:2pt solid black; background-color:#FC9;">
        		<td colspan="2" style="font-size:12px;"><strong><em>เกณฑ์การให้คะแนน Criteria// หนังสือค้ำประกัน (Letter of Guarantee-L/G) // สัดส่วนของหลักทรัพย์ค้ำประกัน</em></strong></td>
            	<td style="text-align:center;"><strong>20</strong></td>
            	<td style="text-align:center;"><strong>10</strong></td>
            	<td style="text-align:center;"><input id="scoret3" onFocus="javascript:this.select();" <?php if($hdt=='0'){ ?> value="<?=$scoret3?>" <?php }else{ ?> value="0" <?php } ?> class="form-control border-input" placeholder="0" type="text" disabled style="width:60px; text-align:center;  font-weight:bold; background-color:#FC9;"></td>
            </tr>
            <tr style="border-bottom:2pt solid black; background-color:#F96;">
        		<td colspan="2" style="text-align:right;"><strong>รวมทั้งสิ้น</strong></td>
            	<td style="text-align:center;"><strong>100</strong></td>
            	<td style="text-align:center;"><strong>50</strong></td>
            	<td style="text-align:center;"><input id="scoret4" onFocus="javascript:this.select();" <?php if($hdt=='0'){ ?> value="<?=$scoret4?>" <?php }else{ ?> value="0" <?php } ?> class="form-control border-input" placeholder="0" type="text" disabled style="width:60px; text-align:center; font-weight:bold; background-color:#F96;"></td>
            </tr>

        </tbody>
    </table>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
    	<div class="form-group">
        	<label>สรุปผลการประเมิน</label>
            <textarea class="form-control border-input notes" onFocus="javascript:this.select();" class="form-control border-input" placeholder="Summary rating" id="rating_comment" rows="5" ><?=$crat_comment?></textarea>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
    	<div class="form-group" style="text-align:right;">
				<?php if ($cusopen != 6) { ?>
        	<button type="button" class="btn btn-info" onFocus="javascript:this.select();" class="form-control border-input" id="btnsaveratting"<?php if($hdt=='0'){ ?>onClick="updaterat('<?=$rca_id_rat?>','<?=$_SESSION['use_id']?>','<?=$_SESSION['use_appid']?>','<?=$crat_id?>','<?=$type_busin?> <?=$cus_company?>');"
          <?php }else{ ?> onClick="saverat('<?=$rca_id_rat?>','<?=$_SESSION['use_id']?>','<?=$_SESSION['use_appid']?>','<?=$type_busin?> <?=$cus_company?>');" <?php } ?> ><i class="ti-save"></i> บันทึกแบบประเมิน</button>
				<?php } else { ?>
					<button type="button" class="btn btn-info" onFocus="javascript:this.select();" class="form-control border-input" id="btnsaveratting"<?php if($hdt=='0'){ ?>onClick="updaterat('<?=$rca_id_rat?>','<?=$_SESSION['use_id']?>','<?=$_SESSION['use_appid']?>','<?=$crat_id?>','<?=$cus_openoth?> <?=$cus_company?>');"
          <?php }else{ ?> onClick="saverat('<?=$rca_id_rat?>','<?=$_SESSION['use_id']?>','<?=$_SESSION['use_appid']?>','<?=$cus_openoth?> <?=$cus_company?>');" <?php } ?> ><i class="ti-save"></i> บันทึกแบบประเมิน</button>
				<?php } ?>
        </div>
    </div>
</div>

</div>
</body>
</html>
<?php
	mysql_close($c); //close connection
?>
