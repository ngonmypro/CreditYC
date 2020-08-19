<?php session_start();
	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
	include "../../../Connections/connect_mysql.php";

	$reqid_rating = $_GET['reqid'];
	$apv_rating = $_GET['apv'];

  $sqls = " SELECT * FROM tblcreditopen2 WHERE crd2_id = '$reqid_rating' ";
	$results = mysql_query($sqls) or die(mysql_error());
	if($results){
		if(mysql_num_rows($results)>0){
			$records=mysql_fetch_array($results);
        $cus = $records['crd2_cusid'];
        $use = $records['crd2_useid'];
		$sellname4 = $records['crd2_sellname'];
        $sqls1 = " SELECT * FROM tblcustomer, tbluser WHERE cus_id = '$cus' AND use_id = '$use'";
      	$results1 = mysql_query($sqls1) or die(mysql_error());
        $records1=mysql_fetch_array($results1);
          $tit = $records1['cus_titid'];
          $cusname = $records1['cus_name'];
          $cuslname = $records1['cus_lname'];
          $rca_id_rat = $records1['cus_code'];
          $open = $records1['cus_openid'];
          $openoth = $records1['cus_openoth'];
		  $cus_company = $records1['cus_company']; //ชื่อกิจการ
          $branid = $records1['use_branid'];
          $usename = $records1['use_name'];
          $uselname = $records1['use_lname'];
            $sqls2 = " SELECT * FROM tbltypeopen, tbltitle, tblbrand WHERE open_id = '$open' AND tit_id = '$tit' AND bran_id = '$branid'";
            $results2 = mysql_query($sqls2) or die(mysql_error());
            $records2=mysql_fetch_array($results2);
              $rca_business_prefix_rat = $records2['open_name'];
			  $type_busin = $records2['open_name'];
              $titname = $records2['tit_name'];
              $branname = $records2['bran_name'];
		}
	}

	$sqlrating = " SELECT * FROM tblassessment WHERE asm_crd2id = '$reqid_rating' AND asm_useappid = '$apv_rating' ";
	$resultrating = mysql_query($sqlrating) or die(mysql_error());
	if($resultrating){
		if(mysql_num_rows($resultrating)>0){
			$hdtrating = '0';
			$recordrating=mysql_fetch_array($resultrating);
			$crat_id_rating = $recordrating['asm_id'];
			$score1_rating = $recordrating['asm_score1'];
			$score2_rating = $recordrating['asm_score2'];
			$score3_rating = $recordrating['asm_score3'];
			$score4_rating = $recordrating['asm_score4'];
			$score5_rating = $recordrating['asm_score5'];
			$score6_rating = $recordrating['asm_score6'];
			$score7_rating = $recordrating['asm_score7'];
			$score8_rating = $recordrating['asm_score8'];
			$score9_rating = $recordrating['asm_score9'];
			$score10_rating = $recordrating['asm_score10'];
			$scoret1_rating = $recordrating['asm_score_total1'];
			$scoret2_rating = $recordrating['asm_score_total2'];
			$scoret3_rating = $recordrating['asm_score_total3'];
			$scoret4_rating = $recordrating['asm_score_total4'];
      $moneystart = $recordrating['asm_monstart'];
			$crat_comment_rating = $recordrating['asm_comment'];
			$modification_time_rating_date = displaydate($recordrating['asm_dateasm']);
			$date = date_create($recordrating['asm_dateasm']);
			$modification_time_comm_time = date_format($date,'G:ia');
		}else{
			$hdtrating = '1';
		}
	}else{
		$hdtrating = '2';
	}

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style>

	.notes {
    background-image: -webkit-linear-gradient(left, white 10px, transparent 10px), -webkit-linear-gradient(right, white 10px, transparent 10px), -webkit-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
    background-image: -moz-linear-gradient(left, white 10px, transparent 10px), -moz-linear-gradient(right, white 10px, transparent 10px), -moz-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
    background-image: -ms-linear-gradient(left, white 10px, transparent 10px), -ms-linear-gradient(right, white 10px, transparent 10px), -ms-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
    background-image: -o-linear-gradient(left, white 10px, transparent 10px), -o-linear-gradient(right, white 10px, transparent 10px), -o-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
    background-image: linear-gradient(left, white 10px, transparent 10px), linear-gradient(right, white 10px, transparent 10px), linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
    background-size: 100% 100%, 100% 100%, 100% 31px;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    line-height: 31px;
    font-family: Arial, Helvetica, Sans-serif;
    padding: 8px;
}

.notes:focus {
    outline: none;
}

</style>
</head>

<body>
<? if($hdtrating == '0'){ ?>
<div class="row">
	<div class="col-md-12">
    	<div class="form-group">
        	วันที่ : <b style="color:#03F;"><?=$modification_time_rating_date?></b>    เวลา : <b style="color:#03F;"><?=$modification_time_comm_time?></b>
        </div>
    </div>
</div>
<div class="row" style="padding-top:10px;">
	<div class="col-md-7">
    <?php if($open != 6) {?>
    	รหัสลูกค้า/ประเภทขอเปิด :  <span style="color:#00C;"><strong><?=$rca_id_rat?> / <?=$rca_business_prefix_rat?></strong></span>
    <?php }else { ?>
      รหัสลูกค้า/ประเภทขอเปิด :  <span style="color:#00C;"><strong><?=$rca_id_rat?> / <?=$rca_business_prefix_rat?> <?=$openoth?></strong></span>
    <?php } ?>
    </div>
    <div class="col-md-5">
    	เขตการขาย : <span style="color:#00C;"><strong><?=$branname?></strong></span>
    </div>
</div>
<div class="row" style="padding-top:10px;">
	<div class="col-md-7">
    	ชื่อลูกค้า : <span style="color:#00C;"><strong><?=$type_busin?> <?=$cus_company?> <?#$titname?><?#$cusname?> <?#$cuslname?></strong></span>
    </div>
    <div class="col-md-5">
    	ชื่อผู้ดูแล(Sales) : <span style="color:#00C;"><strong><?=$sellname4?></strong></span>
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
                <input type="text" disabled <? if($hdtrating=='0'){ ?> value="<?=$score1_rating?>" <? }else{ ?> value="0" <? } ?> onFocus="javascript:this.select();" class="form-control border-input" placeholder="0" id="score1" style="width:60px; text-align:center;">
                <small id="smtr1" class="form-text text-muted" style="color:#F30;"></small>
                </td>
            </tr>
            <tr>
        		<td></td>
            	<td style="font-size:13px;">2.สำเนาหนังสือรับรองบริษัท/หจก./บมจ. อายุไม่เกิน 1 เดือน <em>(ครบถ้วน,ประเภทธุรกิจ,ผู้ถือหุ้น,กรรมการ)</em></td>
            	<td style="text-align:center;">10</td>
            	<td style="text-align:center;">5</td>
            	<td style="text-align:center;"><input type="text" disabled <? if($hdtrating=='0'){ ?> value="<?=$score2_rating?>" <? }else{ ?> value="0" <? } ?> onFocus="javascript:this.select();"  class="form-control border-input" placeholder="0" id="score2" style="width:60px; text-align:center;">
                <small id="smtr2" class="form-text text-muted" style="color:#F30;"></small>
                </td>
            </tr>
            <tr>
        		<td></td>
            	<td style="font-size:13px;">3.ใบ ภ.พ.20/ใบทะเบียนพาณิชย์/ภาพถ่ายร้านค้า,ธุรกิจ,หน้างาน <em>(ครบถ้วน,น่าเชื่อถือ)</em></td>
            	<td style="text-align:center;">10</td>
            	<td style="text-align:center;">5</td>
            	<td style="text-align:center;"><input type="text" disabled <? if($hdtrating=='0'){ ?> value="<?=$score3_rating?>" <? }else{ ?> value="0" <? } ?> onFocus="javascript:this.select();" class="form-control border-input" placeholder="0" id="score3" style="width:60px; text-align:center;">
                <small id="smtr3" class="form-text text-muted" style="color:#F30;"></small>
                </td>
            </tr>
            <tr>
        		<td></td>
            	<td style="font-size:13px;">4.งบกำไรขาดทุน <em>(สัดส่วนเพิ่มกำไร,รายได้,ค่าใช้จ่าย)</em></td>
            	<td style="text-align:center;">10</td>
            	<td style="text-align:center;">5</td>
            	<td style="text-align:center;"><input type="text" disabled <? if($hdtrating=='0'){ ?> value="<?=$score4_rating?>" <? }else{ ?> value="0" <? } ?> onFocus="javascript:this.select();" class="form-control border-input" placeholder="0" id="score4" placeholder="0" style="width:60px; text-align:center;">
                <small id="smtr4" class="form-text text-muted" style="color:#F30;"></small>
                </td>
            </tr>
            <tr>
        		<td></td>
            	<td style="font-size:13px;">5.เลขที่บัญชีและธนาคารที่ลูกค้าใช้ในการทำธุรกิจ <em>(การหมุนเวียนของเงินสด)</em></td>
            	<td style="text-align:center;">10</td>
            	<td style="text-align:center;">5</td>
            	<td style="text-align:center;"><input type="text" disabled <? if($hdtrating=='0'){ ?> value="<?=$score5_rating?>" <? }else{ ?> value="0" <? } ?> onFocus="javascript:this.select();" class="form-control border-input" placeholder="0" id="score5" placeholder="0" style="width:60px; text-align:center;">
                <small id="smtr5" class="form-text text-muted" style="color:#F30;"></small>
                </td>
            </tr>
            <tr style="border-bottom:2pt solid black; border-top:2pt solid black; background-color:#FC9;">
        		<td colspan="2" style="font-size:12px;"><strong><em>เกณฑ์การให้คะแนน Cirteria//ความสามารถในการชำระหนี้ของลูกค้า สภาพคล่องทาองการเงิน,ความมั่นคงของธุรกิจ</em></strong></td>
            	<td style="text-align:center;"><strong>50</strong></td>
            	<td style="text-align:center;"><strong>25</strong></td>
            	<td style="text-align:center;">
                	<input type="text" disabled id="scoret1"  <? if($hdtrating=='0'){ ?> value="<?=$scoret1_rating?>" <? }else{ ?> value="0" <? } ?> onFocus="javascript:this.select();" class="form-control border-input" placeholder="0" style="width:60px; text-align:center;  font-weight:bold; background-color:#FC9;">
                </td>
            </tr>
            <tr>
        		<td><strong style="color:#930;">2.Capital</strong></td>
            	<td style="font-size:13px;">1.งบแสดงฐานะการเงิน/อัตราส่วนทางการเงิน<em>(ดูข้อมูลได้จากhttp://www.dbd.go.th)</em></td>
            	<td style="text-align:center;">10</td>
            	<td style="text-align:center;">5</td>
            	<td style="text-align:center;"><input id="score6" disabled <? if($hdtrating=='0'){ ?> value="<?=$score6_rating?>" <? }else{ ?> value="0" <? } ?> onFocus="javascript:this.select();" class="form-control border-input" placeholder="0" type="text" style="width:60px; text-align:center;">
                <small id="smtr6" class="form-text text-muted" style="color:#F30;"></small>
                </td>
            </tr>
            <tr>
        		<td></td>
            	<td style="font-size:13px;">2.ทุนจดทะเบียน</td>
            	<td style="text-align:center;">10</td>
            	<td style="text-align:center;">5</td>
            	<td style="text-align:center;"><input id="score7" disabled <? if($hdtrating=='0'){ ?> value="<?=$score7_rating?>" <? }else{ ?> value="0" <? } ?> onFocus="javascript:this.select();" class="form-control border-input" placeholder="0" type="text" style="width:60px; text-align:center;">
                <small id="smtr7" class="form-text text-muted" style="color:#F30;"></small>
                </td>
            </tr>
            <tr>
        		<td></td>
            	<td style="font-size:13px;">3.Bank Statement ย้อนหลัง 6 เดือน<em>(การหมุนเวียนของเงินสด,รายได้,ค่าใช้จ่ายในระบบบัญชี)</em></td>
            	<td style="text-align:center;">10</td>
            	<td style="text-align:center;">5</td>
            	<td style="text-align:center;"><input id="score8" disabled <? if($hdtrating=='0'){ ?> value="<?=$score8_rating?>" <? }else{ ?> value="0" <? } ?> onFocus="javascript:this.select();" class="form-control border-input" placeholder="0" type="text" style="width:60px; text-align:center;">
                <small id="smtr8" class="form-text text-muted" style="color:#F30;"></small>
                </td>
            </tr>
            <tr style="border-bottom:2pt solid black; border-top:2pt solid black; background-color:#FC9;">
        		<td colspan="2" style="font-size:12px;"><strong><em>เกณฑ์การใช้คะแนน Criteria// ประเมินจากสินทรัพย์,เงินทุน,ค่าเฉลี่ยของการบริหารสินทรัพย์/หนี้สิ้น</em></strong></td>
            	<td style="text-align:center;"><strong>30</strong></td>
            	<td style="text-align:center;"><strong>15</strong></td>
            	<td style="text-align:center;">
                <input type="text" disabled id="scoret2" <? if($hdtrating=='0'){ ?> value="<?=$scoret2_rating?>" <? }else{ ?> value="0" <? } ?> onFocus="javascript:this.select();" class="form-control border-input" placeholder="0" style="width:60px; text-align:center;  font-weight:bold; background-color:#FC9;">

                </td>
            </tr>
            <tr>
        		<td><strong style="color:#930;">3.Collateral</strong></td>
            	<td style="font-size:13px;">1.หนังสือค้ำประกันจากธนาคาร BG/LG <em>(ตามเกณฑ์วงเงินที่ให้เครดิต)</em></td>
            	<td style="text-align:center;">10</td>
            	<td style="text-align:center;">5</td>
            	<td style="text-align:center;"><input id="score9" disabled onFocus="javascript:this.select();" <? if($hdtrating=='0'){ ?> value="<?=$score9_rating?>" <? }else{ ?> value="0" <? } ?> class="form-control border-input" placeholder="0" type="text" style="width:60px; text-align:center;">
                <small id="smtr9" class="form-text text-muted" style="color:#F30;"></small>
                </td>
            </tr>
            <tr>
        		<td></td>
            	<td style="font-size:13px;">2.หลักทรัพย์อื่นๆ ที่มีค้ำประกัน<em>(เช็คจ่ายล่วงหน้า,เงินสด,ทรัพย์สินอื่นๆ)</em></td>
            	<td style="text-align:center;">10</td>
            	<td style="text-align:center;">5</td>
            	<td style="text-align:center;"><input id="score10" disabled onFocus="javascript:this.select();" <? if($hdtrating=='0'){ ?> value="<?=$score10_rating?>" <? }else{ ?> value="0" <? } ?> class="form-control border-input" placeholder="0" type="text" style="width:60px; text-align:center;">
                <small id="smtr10" class="form-text text-muted" style="color:#F30;"></small>
                </td>
            </tr>
            <tr  style="border-bottom:2pt solid black; border-top:2pt solid black; background-color:#FC9;">
        		<td colspan="2" style="font-size:12px;"><strong><em>เกณฑ์การให้คะแนน Criteria// หนังสือค้ำประกัน (Letter of Guarantee-L/G) // สัดส่วนของหลักทรัพย์ค้ำประกัน</em></strong></td>
            	<td style="text-align:center;"><strong>20</strong></td>
            	<td style="text-align:center;"><strong>10</strong></td>
            	<td style="text-align:center;"><input id="scoret3" onFocus="javascript:this.select();" <? if($hdtrating=='0'){ ?> value="<?=$scoret3_rating?>" <? }else{ ?> value="0" <? } ?> class="form-control border-input" placeholder="0" type="text" disabled style="width:60px; text-align:center;  font-weight:bold; background-color:#FC9;"></td>
            </tr>
            <tr style="border-bottom:2pt solid black; background-color:#F96;">
        		<td colspan="2" style="text-align:right;"><strong>รวมทั้งสิ้น</strong></td>
            	<td style="text-align:center;"><strong>100</strong></td>
            	<td style="text-align:center;"><strong>50</strong></td>
            	<td style="text-align:center;"><input id="scoret4" onFocus="javascript:this.select();" <? if($hdtrating=='0'){ ?> value="<?=$scoret4_rating?>" <? }else{ ?> value="0" <? } ?> class="form-control border-input" placeholder="0" type="text" disabled style="width:60px; text-align:center; font-weight:bold; background-color:#F96;"></td>
            </tr>

        </tbody>
    </table>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
    	<div class="form-group">
        	<label>สรุปผลการประเมิน</label>
            <textarea class="form-control border-input notes" onFocus="javascript:this.select();" class="form-control border-input" placeholder="Summary rating" id="rating_comment" rows="5" ><? if($hdtrating=='0'){ ?> <?=$crat_comment_rating?> <? }else{ ?>  <? } ?></textarea>
        </div>
    </div>
</div>


</div>
<?php }elseif($hdtrating == '1'){ ?>
<div class="row">
	<div class="col-md-12">
    	<div class="form-group">
        	<label>ยังไม่มีข้อมูล แบบประเมินความเสี่ยง</label>
        </div>
    </div>
</div>
<?php } ?>

</body>

</html>
<?php
// --- แสดงวันที่แบบไทย --- //
function  displaydate($x){

	$date_m=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");

	$date_array=explode("-",$x);
	$y=$date_array[0]+543;
	$m=$date_array[1]-1;
	$d=substr($date_array[2], 0, 2);

	$m=$date_m[$m];

	$displaydate="$d $m $y";
	return $displaydate;
}

	mysql_close($c); //close connection
?>
