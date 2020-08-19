<?php session_start();
date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
include "../../../Connections/connect_mysql.php";

#วันที่ขอเปิด
  $date_open = $_POST['open_date_n'];

#ลูกค้า
  //เพิ่มวันที่
  $cus_code = $_POST['customer_code_n'];  //รหัสลูกค้า
  $cus_tit = $_POST['cus_tit_n']; //คำนำหน้าชื่อ
  $cus_name = $_POST['cus_name_n']; //ชื่อ
  $cus_lname = $_POST['cus_lname_n']; //นามสกุล
  $cus_idcard = $_POST['cus_idcard_n']; //รหัสบัตรประชาชน
  $cus_position = $_POST['cus_position_n']; //ตำแหน่ง
  $cus_department = $_POST['cus_department_n']; //แผนก/ฝ่าย
  $open_type = $_POST['open_type_n'];  //ประเภทกิจการ
  $open_other = $_POST['open_other_n']; //ประเภทกิจการอื่นๆ
  $open_businame = $_POST['open_businame_n'];  //ชื่อบริษัท
  $open_busiloca = $_POST['open_busiloca_n']; //ที่อยู่
  $open_busiswine = $_POST['open_busiswine_n']; //หมู่
  $open_busiroad = $_POST['open_busiroad_n'];  //ถนน
  $open_busialley = $_POST['open_busialley_n']; //ตรอก/ซอย
  $open_busidistrict = $_POST['open_busidistrict_n'];  //ตำบล
  $open_busiamphur = $_POST['open_busiamphur_n'];  //อำเภอ
  $open_busiprovin = $_POST['open_busiprovin_n'];  //จังหวัด
  $open_busizipcode = $_POST['open_busizipcode_n']; //รหัสไปรษณีย์
  $open_phone = $_POST['open_phone_n']; //เบอร์โทรศัพท์
  $open_fax = $_POST['open_fax_n']; //เบอร์แฟกซ์
  $open_phonecus = $_POST['cus_phonecus'];
  $open_email = $_POST['cus_email'];
  $open_line = $_POST['cus_line'];
  $open_fac = $_POST['cus_fac'];
  $tit1 = $_POST['tit1'];
  $name1 = $_POST['name1'];
  $lname1 = $_POST['lname1'];
  $idcard1 = $_POST['idcard1'];
  $position1 = $_POST['position1'];

  $tit2 = $_POST['tit2'];
  $name2 = $_POST['name2'];
  $lname2 = $_POST['lname2'];
  $idcard2 = $_POST['idcard2'];
  $position2 = $_POST['position2'];

  $tit3 = $_POST['tit3'];
  $name3 = $_POST['name3'];
  $lname3 = $_POST['lname3'];
  $idcard3 = $_POST['idcard3'];
  $position3 = $_POST['position3'];

  $consideration = $_POST['consideration'];
  $sale_branch_cus = $_POST['sale_branch_cus'];
  $sale_name_cus = $_POST['sale_name_cus'];

#ขอเปิดหน้าที่ 1
  //เพิ่มวันที่, IDลูกค้า
  $open_typeproject = $_POST['open_typeproject_n']; //วัตถุประสงค์
  $open_nameproject = $_POST['open_nameproject_n']; //ชื่อโครงการ
  $open_locaproject = $_POST['open_locaproject_n']; //ที่ตั้ง
  $open_dateproject = $_POST['open_dateproject_n']; //ระยะเวลาสัญญา
  $open_dateprostart = $_POST['open_dateprostart_n']; //วันที่เริ่ม
  $open_dateproend = $_POST['open_dateproend_n']; //วันที่สิ้นสุด
  $open_promon = $_POST['open_promon_n']; //มูลค่าโครงการ
  $proget_start = $_POST['proget_start_n']; //เริ่มใช้สินค้า
  $project_type = $_POST['project_type_n']; //ประเภทงานก่อสร้าง
  $project_other = $_POST['project_other_n']; //โครงการอื่นๆ
  $project_averagebuy = $_POST['project_averagebuy_n']; //ซื้อเฉลี่ย/เดือน
  $project_buytotal = $_POST['project_buytotal_n']; //รวม/ปี
  $delivery = $_POST['delivery_n']; //สถานที่ส่งสินค้า
  $pay_type = $_POST['pay_type_n']; //การชำระเงิน
  $pay_other = $_POST['pay_other_n']; //การชำระค่าสินค้าทางอื่นๆ
  $pay_deadline = $_POST['pay_deadline_n']; //กำหนดชำระเงินเครดิต
  $pay_locabill = $_POST['pay_locabill_n']; //สถานที่วางบิล
  $billing = $_POST['billing_n']; //ระเบียบการวางบิล
  $billing_other = $_POST['billing_other_n']; //วางบิลเงื่อนไขอื่นๆ
  $contacted_open = $_POST['contacted_open_n']; //ร้านค้าที่เคยติดต่อ
  $product_open = $_POST['product_open_n']; //สินค้า
  $product_mon = $_POST['product_mon_n']; //วงเงิน
  $product_credit = $_POST['product_credit_n']; //เครดิต
  $bank_open = $_POST['bank_open_n']; //ธนาคารที่ติดต่อ
  $bankbran_open = $_POST['bankbran_open_n']; //สาขา
  $booknum_open = $_POST['booknum_open_n']; //เลขบัญชี

#ขอเปิดหน้าที่ 5
              //เพิ่มวันที่, IDลูกค้า, IDพนักงาน, IDขอเปิดหน้าแรก
  $sale_comment = $_POST['sale_comment_n']; //คอมเม้น

  $sql1 = "INSERT INTO `intrayon_credityc`.`tblcustomer` ( ";
  $sql1 .= " `cus_code` , ";
  $sql1 .= " `cus_dateopen` , ";
  $sql1 .= " `cus_titid` , ";
  $sql1 .= " `cus_name` , ";
  $sql1 .= " `cus_lname` , ";
  $sql1 .= " `cus_idcard` , ";
  $sql1 .= " `cus_position` , ";
  $sql1 .= " `cus_department` , ";
  $sql1 .= " `cus_openid` , ";
  $sql1 .= " `cus_openoth` , ";
  $sql1 .= " `cus_company` , ";
  $sql1 .= " `cus_addno` , ";
  $sql1 .= " `cus_mno` , ";
  $sql1 .= " `cus_roadname` , ";
  $sql1 .= " `cus_alleyname` , ";
  $sql1 .= " `cus_districtid` , ";
  $sql1 .= " `cus_amphurid` , ";
  $sql1 .= " `cus_provinceid` , ";
  $sql1 .= " `cus_zipcodeid` , ";
  $sql1 .= " `cus_phoneno` , ";
  $sql1 .= " `cus_faxno` , ";
  $sql1 .= " `cus_phonecus` , ";
  $sql1 .= " `cus_email` , ";
  $sql1 .= " `cus_line` , ";
  $sql1 .= " `cus_face` , ";
  $sql1 .= " `cus_tit1` , ";
  $sql1 .= " `cus_name1` , ";
  $sql1 .= " `cus_lname1` , ";
  $sql1 .= " `cus_idcard1` , ";
  $sql1 .= " `cus_position1` , ";
  $sql1 .= " `cus_tit2` , ";
  $sql1 .= " `cus_name2` , ";
  $sql1 .= " `cus_lname2` , ";
  $sql1 .= " `cus_idcard2` , ";
  $sql1 .= " `cus_position2` , ";
  $sql1 .= " `cus_tit3` , ";
  $sql1 .= " `cus_name3` , ";
  $sql1 .= " `cus_lname3` , ";
  $sql1 .= " `cus_idcard3` , ";
  $sql1 .= " `cus_position3` , ";
  $sql1 .= " `cus_createby` , ";
  $sql1 .= " `cus_createtime` , ";
  $sql1 .= " `cus_updateby` , ";
  $sql1 .= " `cus_updatetime`  ";
  $sql1 .= " ) ";
  $sql1 .= " VALUES ( ";
  $sql1 .= " '$cus_code', '$date_open', '$cus_tit', '$cus_name', '$cus_lname', '$cus_idcard', '$cus_position', '$cus_department', '$open_type', '$open_other', '$open_businame', '$open_busiloca', '$open_busiswine',";
  $sql1 .= " '$open_busiroad', '$open_busialley', '$open_busidistrict', '$open_busiamphur', '$open_busiprovin', '$open_busizipcode', '$open_phone', '$open_fax', '$open_phonecus', '$open_email', '$open_line', '$open_fac',";
  $sql1 .= " '$tit1', '$name1', '$lname1', '$idcard1', '$position1', '$tit2', '$name2', '$lname2', '$idcard2', '$position2', '$tit3', '$name3', '$lname3', '$idcard3', '$position3', '".$_SESSION['use_user']."', NOW(), '".$_SESSION['use_user']."', NOW() ";
  $sql1 .= " ); ";

  $result1 = mysql_query($sql1) or die(mysql_error());

  $sqlsh1 = "SELECT * FROM tblcustomer WHERE cus_name = '$cus_name' AND cus_lname = '$cus_lname' AND cus_idcard = '$cus_idcard' AND cus_phoneno = '$open_phone' AND cus_dateopen = '$date_open'";
  $resultsh1 = mysql_query($sqlsh1) or die(mysql_error());
  while ($rowsh1 = mysql_fetch_array($resultsh1)) {
    $cus_id = $rowsh1['cus_id'];

    $sql2 = "INSERT INTO `intrayon_credityc`.`tblcreditopen1` (";
    $sql2 .= " `crd1_cusid` , ";
    $sql2 .= " `crd1_dateopen` , ";
    $sql2 .= " `crd1_objec` , ";
    $sql2 .= " `crd1_projectname` , ";
    $sql2 .= " `crd1_construction` , ";
    $sql2 .= " `crd1_promise` , ";
    $sql2 .= " `crd1_startproject` , ";
    $sql2 .= " `crd1_endproject` , ";
    $sql2 .= " `crd1_consvalue` , ";
    $sql2 .= " `crd1_startproduct` , ";
    $sql2 .= " `crd1_projecttype` , ";
    $sql2 .= " `crd1_projectoth` , ";
    $sql2 .= " `crd1_buildingm` , ";
    $sql2 .= " `crd1_buildingy` , ";
    $sql2 .= " `crd1_transpose` , ";
    $sql2 .= " `crd1_payment` , ";
    $sql2 .= " `crd1_paymentoth` , ";
    $sql2 .= " `crd1_setpayment` , ";
    $sql2 .= " `crd1_billingloc` , ";
    $sql2 .= " `crd1_formalbil` , ";
    $sql2 .= " `crd1_foemalbiloth` , ";
    $sql2 .= " `crd1_shopcontaot` , ";
    $sql2 .= " `crd1_product` , ";
    $sql2 .= " `crd1_limit` , ";
    $sql2 .= " `crd1_crdday` , ";
    $sql2 .= " `crd1_bank` , ";
    $sql2 .= " `crd1_branbank` , ";
    $sql2 .= " `crd1_accountbank` , ";
    $sql2 .= " `crd1_createby` , ";
    $sql2 .= " `crd1_createtime` , ";
    $sql2 .= " `crd1_updateby` , ";
    $sql2 .= " `crd1_updatetime`  ";
    $sql2 .= " ) ";
    $sql2 .= " VALUES ( ";
    $sql2 .= " '$cus_id', '$date_open', '$open_typeproject', '$open_nameproject', '$open_locaproject', '$open_dateproject', '$open_dateprostart', '$open_dateproend', '$open_promon', '$proget_start', '$project_type',";
    $sql2 .= "'$project_other', '$project_averagebuy', '$project_buytotal', '$delivery', '$pay_type', '$pay_other', '$pay_deadline', '$pay_locabill', '$billing', '$billing_other', '$contacted_open', '$product_open', '$product_mon',";
    $sql2 .= "'$product_credit', '$bank_open', '$bankbran_open', '$booknum_open', '".$_SESSION['use_user']."', NOW(), '".$_SESSION['use_user']."', NOW()";
    $sql2 .= " ); ";

    $result2 = mysql_query($sql2) or die(mysql_error());

    $sqlsh2 = "SELECT * FROM tblcreditopen1 WHERE crd1_cusid = '$cus_id'";
    $resultsh2 = mysql_query($sqlsh2) or die(mysql_error());
    while ($rowsh2 = mysql_fetch_array($resultsh2)) {
      $crd1_idi = $rowsh2['crd1_id'];

      $sql3 = "INSERT INTO `intrayon_credityc`.`tblcreditopen2` (";
      $sql3 .= " `crd2_crd1id` , ";
      $sql3 .= " `crd2_dateopen` , ";
      $sql3 .= " `crd2_cusid` , ";
      $sql3 .= " `crd2_useid` , ";
      $sql3 .= " `crd2_consi_id` ,";
      $sql3 .= " `crd2_sellname` ,";
      $sql3 .= " `crd2_sellbranid` ,";
      $sql3 .= " `crd2_comment` , ";
      $sql3 .= " `crd2_createby` , ";
      $sql3 .= " `crd2_createtime` , ";
      $sql3 .= " `crd2_updateby` , ";
      $sql3 .= " `crd2_updatetime` ";
      $sql3 .= " ) ";
      $sql3 .= " VALUES ( ";
      $sql3 .= " '$crd1_idi', '$date_open', '$cus_id' , '".$_SESSION['use_id']."', '$consideration', '$sale_name_cus', '$sale_branch_cus', '$sale_comment', '".$_SESSION['use_user']."', NOW(), '".$_SESSION['use_user']."', NOW()";
      $sql3 .= " ); ";

      $result3 = mysql_query($sql3) or die(mysql_error());

      echo "Y";
    }
  }

mysql_close($c);
 ?>
