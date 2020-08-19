<?php 
 session_start();
 date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
 include "Connections/connect_mysql.php";

 $crd2id = $_GET['crd2id'];
 ?>
 <script src="ajax/function.js"></script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>css print report table continue</title>
<style type="text/css">
* {
    margin:0;
    padding:0;
    font-family:Arial, "times New Roman", tahoma;
    font-size:12px;
}
html {
    font-family:Arial, "times New Roman", tahoma;
    font-size:12px;
    color:#000000;
}
body {
    font-family:Arial, "times New Roman", tahoma;
    font-size:12px;
    padding:0;
    margin:0;
    color:#000000;
	background: rgb(204,204,204);
}

page[size="A4"] { /* กำหนด style กระดาษบนหน้า webpage */
  background: white;
  width: 21cm;
  height: 29.7cm;
  display: block;
  margin: 0 auto;
  margin-bottom: 0cm;
  /*box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);*/
  padding-left:0.5cm;
}

page[size="A2"] {
  background: white;
  width: 21cm;
  height: 16cm;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
  padding-left:0.5cm;
}

.headTitle {
    font-size:12px;
    font-weight:bold;
    text-transform:uppercase;
}
.headerTitle01 {
    border:1px solid #333333;
    border-left:2px solid #000;
    border-bottom-width:2px;
    border-top-width:2px;
    font-size:11px;
}
.headerTitle01_r {
    border:1px solid #333333;
    border-left:2px solid #000;
    border-right:2px solid #000;
    border-bottom-width:2px;
    border-top-width:2px;
    font-size:11px;
}
/* สำหรับช่องกรอกข้อมูล  */
.box_data1 {
    font-family:Arial, "times New Roman", tahoma;
    height:18px;
    border:0px dotted #333333;
    border-bottom-width:1px;
}
/* กำหนดเส้นบรรทัดซ้าย  และด้านล่าง */
.left_bottom {
    border-left:2px solid #000;
    border-bottom:1px solid #000;
}
/* กำหนดเส้นบรรทัดซ้าย ขวา และด้านล่าง */
.left_right_bottom {
    border-left:2px solid #000;
    border-bottom:1px solid #000;
    border-right:2px solid #000;
}
/* สร้างช่องสี่เหลี่ยมสำหรับเช็คเลือก */
.chk_box {
    display:block;
    width:10px;
    height:10px;
    overflow:hidden;
    border:1px solid #000;
}
/* สร้างปุ่มพิมพ์ */
.btn_print {
	text-align:center;
	width:2cm;
	height:1cm;
}
/* css ส่วนสำหรับการแบ่งหน้าข้อมูลสำหรับการพิมพ์ */
@media all
{
    .page-break { display:none; }
    .page-break-no{ display:none; }
}

@media print
{

    .page-break { /* ขึ้นหน้าใหม่ แบบหน้า ถัดไป */
		display:block;
		height:1px;
		page-break-before:always;
	}
    .page-break-no{ /* ขึ้นหน้าใหม่ แบบหน้า หน้าแรก */
	 	display:block;
		height:1px;
		page-break-after:avoid;
	}

	@page { /* จัดการเกี่ยวกับหน้ากระดาษ */
		margin: 0;
		size: 21cm 29.7cm;
		margin-bottom: 0.5;
		margin-top: 0;
		background: white;
	}

  #button{ display:none; }
}
</style>
<script type="text/javascript">
function back() {
      window.location.href = "index.php";
  }
</script>
</head>
      <?php  
	  
	    $sql = " SELECT * FROM tblcreditopen2 WHERE crd2_id = '$crd2id'";
        $result = mysql_query($sql) or die(mysql_error());
        while($record = mysql_fetch_array($result)){
            $date = displaydate($record['crd2_dateopen']);
            $commentreq = $record['crd2_comment'];
              $record['crd2_cusid'];
              $record['crd2_useid'];
              $app1 = $record['crd2_app1'];
              $app2 = $record['crd2_app2'];
              $app3 = $record['crd2_app3'];
              $app4 = $record['crd2_app4'];

              $sqlcus = " SELECT * FROM tblcustomer WHERE cus_id = '".$record['crd2_cusid']."'";
              $resultcus = mysql_query($sqlcus) or die(mysql_error());
              while($recordcus = mysql_fetch_array($resultcus)){
                $cusopenoth = $recordcus['cus_openoth'];
                $companyname = $recordcus['cus_company'];
                $cusname = $recordcus['cus_name'];
                $cuslname = $recordcus['cus_lname'];
                $posicus = $recordcus['cus_position'];
                $departcus = $recordcus['cus_department'];
                $phone = $recordcus['cus_phoneno'];

                  $cusopenid = $recordcus['cus_openid'];
                  $titid = $recordcus['cus_titid'];

                  $sqlreq = "SELECT * FROM tbluser WHERE use_id = '".$record['crd2_useid']."' AND use_tuseid = '3'";
                  $resultreq = mysql_query($sqlreq) or die(mysql_error());
                  while($recordreq = mysql_fetch_array($resultreq)){
                    $reqname = $recordreq['use_name'];
                    $reqlname = $recordreq['use_lname'];
                    $reqbran = $recordreq['use_branid'];
                    $titid = $recordreq['use_titid'];
                    $reqsigna = $recordreq['use_signature'];
                  }

                    $sqlapp1 = "SELECT * FROM tblapprove WHERE app_crd2id = '$crd2id' AND app_useappid = '4'";
                    $resultapp1 = mysql_query($sqlapp1) or die(mysql_error());
                    while($recordapp1 = mysql_fetch_array($resultapp1)){
                      $app1useid = $recordapp1['app_useid'];
                      $app1comment = $recordapp1['app_comment'];

                      $sqlapp1se = "SELECT * FROM tbluser WHERE use_id = '$app1useid'";
                      $resultapp1se = mysql_query($sqlapp1se) or die(mysql_error());
                      while($recordapp1se = mysql_fetch_array($resultapp1se)){
                      $app1signa = $recordapp1se['use_signature'];
                    }}

                    $sqlapp2 = "SELECT * FROM tblapprove WHERE app_crd2id = '$crd2id' AND app_useappid = '5'";
                    $resultapp2 = mysql_query($sqlapp2) or die(mysql_error());
                    while($recordapp2 = mysql_fetch_array($resultapp2)){
                      $app2useid = $recordapp2['app_useid'];
                      $app2comment = $recordapp2['app_comment'];

                      $sqlapp2se = "SELECT * FROM tbluser WHERE use_id = '$app2useid'";
                      $resultapp2se = mysql_query($sqlapp2se) or die(mysql_error());
                      while($recordapp2se = mysql_fetch_array($resultapp2se)){
                      $app2signa = $recordapp2se['use_signature'];
                    }}

                    $sqlapp3 = "SELECT * FROM tblapprove WHERE app_crd2id = '$crd2id' AND app_useappid = '6'";
                    $resultapp3 = mysql_query($sqlapp3) or die(mysql_error());
                    while($recordapp3 = mysql_fetch_array($resultapp3)){
                      $app3useid = $recordapp3['app_useid'];
                      $app3result = $recordapp3['app_result'];
                      $app3comment = $recordapp3['app_comment'];
                      $app3monlimit = $recordapp3['app_monlimit'];
                      $app3monday = $recordapp3['app_monday'];
                      $app3prooth = $recordapp3['app_proother'];


                      $sqlapp3se = "SELECT * FROM tbluser WHERE use_id = '$app3useid'";
                      $resultapp3se = mysql_query($sqlapp3se) or die(mysql_error());
                      while($recordapp3se = mysql_fetch_array($resultapp3se)){
                      $app3signa = $recordapp3se['use_signature'];
                    }}

                    $sqlapp4 = "SELECT * FROM tblapprove WHERE app_crd2id = '$crd2id' AND app_useappid = '7'";
                    $resultapp4 = mysql_query($sqlapp4) or die(mysql_error());
                    while($recordapp4 = mysql_fetch_array($resultapp4)){
                      $app4useid = $recordapp4['app_useid'];
                      $app4result = $recordapp4['app_result'];
                      $app4comment = $recordapp4['app_comment'];
                      $app4monlimit = number_format($recordapp4['app_monlimit'] , 2);
                      $app4monday = $recordapp4['app_monday'];
                      $app4prooth = $recordapp4['app_proother'];


                      $sqlapp4se = "SELECT * FROM tbluser WHERE use_id = '$app4useid'";
                      $resultapp4se = mysql_query($sqlapp4se) or die(mysql_error());
                      while($recordapp4se = mysql_fetch_array($resultapp4se)){
                      $app4signa = $recordapp4se['use_signature'];
                    }}

                  $sqlse = " SELECT * FROM tbltitle, tbltypeopen, tblbrand WHERE tit_id = '$titid' AND open_id = '$cusopenid' AND bran_id = '$reqbran'";
                  $resultse = mysql_query($sqlse) or die(mysql_error());
                  while($recordse = mysql_fetch_array($resultse)){
                    $titname = $recordse['tit_name'];
                    $openname = $recordse['open_name'];
                    $branname = $recordse['bran_name'];


       ?>
<body>
<div style="text-align:left">
  <input class="btn_print" type="button" name="button" id="button" value="Print" onClick="print();">
  <input class="btn_print" type="button" name="button" id="button" value="ย้อนกลับ" onClick="back();">
</div>
<page size="A4">
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr><br><br>
    <td align="center"> - 5 - </td>
  </tr>
    <td align="left"><table width="750" border="0" align="left" cellpadding="0" cellspacing="0"><br><br>
        <tr>
          <td><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><u>สำหรับพนักงานและบริษัทฯกรอกข้อมูล</u></b></h3></td>
          <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วันที่ <input name="textfield" type="text" class="box_data1" id="" style="text-align:left;width:100px;" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$date?>" disabled> </td>
        </tr>
    </table></td>
    <tr>
      <td align="left"><table width="750" border="0" align="left" cellpadding="0" cellspacing="0"><br>
          <tr>
            <?php if ($cusopenid != 6) { ?>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ชื่อกิจการ <input name="textfield" type="text" class="box_data1" id="" style="text-align:left;width:680px;" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$openname?> <?=$companyname?>" disabled></td>
            <?php } else { ?>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ชื่อกิจการ <input name="textfield" type="text" class="box_data1" id="" style="text-align:left;width:680px;" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$cusopenoth?> <?=$companyname?>" disabled></td>
            <?php } ?>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td align="left"><table width="750" border="0" align="left" cellpadding="0" cellspacing="0"><br>
          <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ชื่อ-สกุล ผู้ติดต่อ <input name="textfield" type="text" class="box_data1" id="" style="text-align:left;width:400px;" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$titname?><?=$cusname?> <?=$cuslname?>" disabled></td>
            <td> ตำแหน่ง <input name="textfield" type="text" class="box_data1" id="" style="text-align:left;width:200px;" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$posicus?>" disabled></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td align="left"><table width="750" border="0" align="left" cellpadding="0" cellspacing="0"><br>
          <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;แผนก / ฝ่าย <input name="textfield" type="text" class="box_data1" id="" style="text-align:left;width:350px;" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$departcus?>" disabled></td>
            <td> โทรศัพท์ <input name="textfield" type="text" class="box_data1" id="" style="text-align:left;width:265px;" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$phone?>" disabled></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td align="left"><table width="750" border="0" align="left" cellpadding="0" cellspacing="0"><br>
          <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ชื่อ-สกุล พนักงานขาย <input name="textfield" type="text" class="box_data1" id="" style="text-align:left;width:320px;" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$reqname?> <?=$reqlname?>" disabled></td>
            <td> สาขา <input name="textfield" type="text" class="box_data1" id="" style="text-align:left;width:265px;" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$branname?>" disabled></td>
          </tr>
      </table></td>
    </tr>
      <tr>
        <td align="left"><table width="750" border="0" align="left" cellpadding="0" cellspacing="0"><br>
            <tr>
              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ความเห็นของผู้แทนขาย</td>
            </tr>
        </table></td>
      </tr>
    <tr>
      <td align="left"><table width="750" border="0" align="left" cellpadding="0" cellspacing="0"><br>
          <tr>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea name="name" rows="3" cols="119"  cellpadding="0" cellspacing="0" id="" style="resize:none; border:none;" disabled>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$commentreq?></textarea>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td align="left"><table width="750" border="0" align="left" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลงชื่อ
              &nbsp;&nbsp;<img id="image_sig" src="uploads/<?=$reqsigna?>" width="120px" height="60px">&nbsp;&nbsp;ผู้แทนขาย</td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td align="left"><table width="750" border="0" align="left" cellpadding="0" cellspacing="0"><br>
          <tr>
            <td align="center" disabled>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <?=$titname?><?=$reqname?> <?=$reqlname?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;) </td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td align="left"><table width="750" border="0" align="left" cellpadding="0" cellspacing="0"><br>
          <tr>
            <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ผู้เสนอขออนุมัติ </td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td align="left"><table width="750" border="0" align="left" cellpadding="0" cellspacing="0">
          <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></b></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td align="left"><table width="750" border="0" align="left" cellpadding="0" cellspacing="0">
          <tr>
            <td><h1 style="font-size:15px">&nbsp;&nbsp;&nbsp;&nbsp;<u style="font-size:20px">ผู้พิจารณา</u> (1)</h1></td>
            <td align="left"><h1 style="font-size:15px">&nbsp;&nbsp;&nbsp;&nbsp;<u style="font-size:20px">ผู้พิจารณา</u> (2)</h1></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td align="left"><table width="750" border="0" align="left" cellpadding="0" cellspacing="0"><br>
          <tr>
            <td><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เสนอความเห็น</p></td>
            <td align="left"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เสนอความเห็น</p></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td align="left"><table width="750" border="0" align="left" cellpadding="0" cellspacing="0"><br>
          <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea name="name" rows="3" cols="55"  cellpadding="0" cellspacing="0" id="" style="resize:none; border:none;" disabled>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$app1comment?></textarea></td>
            <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea name="name" rows="3" cols="55"  cellpadding="0" cellspacing="0" id="" style="resize:none; border:none;" disabled>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$app2comment?></textarea></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td align="center"><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center">&nbsp;&nbsp;ลงชื่อ &nbsp;
                <?php if ($app1 != 0) { ?>
              <img id="image_sig" src="uploads/<?=$app1signa?>" width="120px" height="60px">
          <?php } else { ?>
            <input name="textfield" type="text" class="box_data1" id="" style="text-align:left;width:100px;" disabled><?php }?></td>
            <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลงชื่อ &nbsp;
              <?php if ($app2 != '0') { ?>
              <img id="image_sig" src="uploads/<?=$app2signa?>" width="120px" height="60px"><?php } else { ?>
              <input name="textfield" type="text" class="box_data1" id="" style="text-align:left;width:100px;" disabled>
            <?php }?></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td align="left"><table width="750" border="0" align="left" cellpadding="0" cellspacing="0"><br>
          <tr>
            <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ผู้จัดการ / ผู้ช่วยผู้จัดการ (ฝ่ายขาย)</td>
            <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ผจก.ฝ่ายบัญชีลูกหนี้ / หัวหน้าฝ่ายสินเชื่อ</td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td align="left"><table width="750" border="0" align="left" cellpadding="0" cellspacing="0">
          <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></b></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td align="left"><table width="750" border="0" align="left" cellpadding="0" cellspacing="0"><br>
          <tr>
            <td><h1 style="font-size:15px">&nbsp;&nbsp;&nbsp;&nbsp;<u style="font-size:20px">ผู้อนุมัติ</u> (1)</h1></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td align="left"><table width="750" border="0" align="left" cellpadding="0" cellspacing="0"><br>
          <tr>
            <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ผลการอนุมัติ <input name="textfield" type="text" class="box_data1" id="" style="text-align:left;width:200px;" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$app3result?>" disabled></td>
            <td align="left">เนื่องจาก <input name="textfield" type="text" class="box_data1" id="" style="text-align:left;width:200px;" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$app3comment?>" disabled></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td align="left"><table width="750" border="0" align="left" cellpadding="0" cellspacing="0"><br>
          <tr>
            <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เงื่อนไขการชำระเงินเครดิต <input name="textfield" type="text" class="box_data1" id="" style="text-align:left;width:118px;" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$app3monday?>" disabled> วัน</td>
          </tr>
          <tr>
            <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วงเงิน <input name="textfield" type="text" class="box_data1" id="" style="text-align:left;width:214px;" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$app3monlimit?>" disabled>บาท</td>
            <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <?php if ($app3 != 0) { ?>
              <img id="image_sig" src="uploads/<?=$app3signa?>" width="120px" height="60px"><?php }else { ?>
                <input name="textfield" type="text" class="box_data1" id="" style="text-align:left;width:100px;" disabled>
              <?php } ?></td>
          </tr>
          <tr>
            <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เงื่อนไข เพิ่มเติม</td>
            <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ผู้อำนวยการฝ่ายการเงิน และการลงทุน</td>
          </tr>
          <tr>
            <td><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea name="name" rows="3" cols="42"  cellpadding="0" cellspacing="0" id="" style="resize:none; border:none;" disabled>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$app3prooth?></textarea></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td align="left"><table width="750" border="0" align="left" cellpadding="0" cellspacing="0">
          <tr>
            <td><h1 style="font-size:15px">&nbsp;&nbsp;&nbsp;&nbsp;<u style="font-size:20px">ผู้อนุมัติ</u> (2)</h1></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td align="left"><table width="750" border="0" align="left" cellpadding="0" cellspacing="0"><br>
          <tr>
            <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ผลการอนุมัติ <b><input name="textfield" type="text" class="box_data1" id="" style="text-align:left;width:200px;font-size:14px;" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$app4result?>" disabled></b></td>
            <td align="left">เนื่องจาก <input name="textfield" type="text" class="box_data1" id="" style="text-align:left;width:200px;" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$app4comment?>" disabled></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td align="left"><table width="750" border="0" align="left" cellpadding="0" cellspacing="0"><br>
          <tr>
            <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เงื่อนไขการชำระเงินเครดิต <input name="textfield" type="text" class="box_data1" id="" style="text-align:left;width:118px;" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$app4monday?>" disabled> วัน</td>
          </tr>
          <tr>
            <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วงเงิน <input name="textfield" type="text" class="box_data1" id="" style="text-align:left;width:214px;" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$app4monlimit?>" disabled>บาท</td>
            <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <?php if ($app4 != 0) { ?>
              <img id="image_sig" src="uploads/<?=$app4signa?>" width="120px" height="60px"><?php } else { ?>
                <input name="textfield" type="text" class="box_data1" id="" style="text-align:left;width:100px;" disabled>
              <?php } ?></td>
          </tr>
          <tr>
            <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เงื่อนไข เพิ่มเติม</td>
            <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ผู้อำนวยการฝ่ายการเงิน และการลงทุน</td>
          </tr>
          <tr>
            <td><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea name="name" rows="3" cols="42"  cellpadding="0" cellspacing="0" id="" style="resize:none; border:none;" disabled>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$app4prooth?></textarea></td>
          </tr>
      </table></td>
    </tr>
</table>
</page>
</body>
</html>
<?php
}}} //}} //ปิดลูป

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

 mysql_close($c); ?>
