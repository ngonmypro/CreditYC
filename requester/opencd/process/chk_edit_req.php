<?php session_start();
date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
  include "../../../Connections/connect_mysql.php";

$crd2 = $_POST['reid'];

$sqlsh1 = "SELECT * FROM tblcreditopen2 WHERE crd2_id = '$crd2'";
$resultsh1 = mysql_query($sqlsh1) or die(mysql_error());
$row1=mysql_fetch_array($resultsh1);
  $crd1id = $row1['crd2_crd1id'];
  $cusid = $row1['crd2_cusid'];
  $useid = $row1['crd2_useid'];


#วันที่ขอเปิด
  $date_open = $_POST['open_date_e'];

#ลูกค้า
  //เพิ่มวันที่
  $cus_code = $_POST['customer_code_e'];  //รหัสลูกค้า
  $cus_tit = $_POST['cus_tit_e']; //คำนำหน้าชื่อ
  $cus_name = $_POST['cus_name_e']; //ชื่อ
  $cus_lname = $_POST['cus_lname_e']; //นามสกุล
  $cus_idcard = $_POST['cus_idcard_e']; //รหัสบัตรประชาชน
  $cus_position = $_POST['cus_position_e']; //ตำแหน่ง
  $cus_department = $_POST['cus_department_e']; //แผนก/ฝ่าย
  $open_type = $_POST['open_type_e'];  //ประเภทกิจการ
  $open_other = $_POST['open_other_e']; //ประเภทกิจการอื่นๆ
  $open_businame = $_POST['open_businame_e'];  //ชื่อบริษัท
  $open_busiloca = $_POST['open_busiloca_e']; //ที่อยู่
  $open_busiswine = $_POST['open_busiswine_e']; //หมู่
  $open_busiroad = $_POST['open_busiroad_e'];  //ถนน
  $open_busialley = $_POST['open_busialley_e']; //ตรอก/ซอย
  $open_busidistrict = $_POST['open_busidistrict_e'];  //ตำบล
  $open_busiamphur = $_POST['open_busiamphur_e'];  //อำเภอ
  $open_busiprovin = $_POST['open_busiprovin_e'];  //จังหวัด
  $open_busizipcode = $_POST['open_busizipcode_e']; //รหัสไปรษณีย์
  $open_phone = $_POST['open_phone_e']; //เบอร์โทรศัพท์
  $open_fax = $_POST['open_fax_e']; //เบอร์แฟกซ์
  $cus_phonecus = $_POST['cus_phonecus'];
  $cus_email = $_POST['cus_email'];
  $cus_line = $_POST['cus_line'];
  $cus_face = $_POST['cus_face'];
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

#ขอเปิดหน้าที่ 1
  //เพิ่มวันที่, IDลูกค้า
  $open_typeproject = $_POST['open_typeproject_e']; //วัตถุประสงค์
  $open_nameproject = $_POST['open_nameproject_e']; //ชื่อโครงการ
  $open_locaproject = $_POST['open_locaproject_e']; //ที่ตั้ง
  $open_dateproject = $_POST['open_dateproject_e']; //ระยะเวลาสัญญา
  $open_dateprostart = $_POST['open_dateprostart_e']; //วันที่เริ่ม
  $open_dateproend = $_POST['open_dateproend_e']; //วันที่สิ้นสุด
  $open_promon = $_POST['open_promon_e']; //มูลค่าโครงการ
  $proget_start = $_POST['proget_start_e']; //เริ่มใช้สินค้า
  $project_type = $_POST['project_type_e']; //ประเภทงานก่อสร้าง
  $project_other = $_POST['project_other_e']; //โครงการอื่นๆ
  $project_averagebuy = $_POST['project_averagebuy_e']; //ซื้อเฉลี่ย/เดือน
  $project_buytotal = $_POST['project_buytotal_e']; //รวม/ปี
  $delivery = $_POST['delivery_e']; //สถานที่ส่งสินค้า
  $pay_type = $_POST['pay_type_e']; //การชำระเงิน
  $pay_other = $_POST['pay_other_e']; //การชำระค่าสินค้าทางอื่นๆ
  $pay_deadline = $_POST['pay_deadline_e']; //กำหนดชำระเงินเครดิต
  $pay_locabill = $_POST['pay_locabill_e']; //สถานที่วางบิล
  $billing = $_POST['billing_e']; //ระเบียบการวางบิล
  $billing_other = $_POST['billing_other_e']; //วางบิลเงื่อนไขอื่นๆ
  $contacted_open = $_POST['contacted_open_e']; //ร้านค้าที่เคยติดต่อ
  $product_open = $_POST['product_open_e']; //สินค้า
  $product_mon = $_POST['product_mon_e']; //วงเงิน
  $product_credit = $_POST['product_credit_e']; //เครดิต
  $bank_open = $_POST['bank_open_e']; //ธนาคารที่ติดต่อ
  $bankbran_open = $_POST['bankbran_open_e']; //สาขา
  $booknum_open = $_POST['booknum_open_e']; //เลขบัญชี

#ขอเปิดหน้าที่ 5
              //เพิ่มวันที่, IDลูกค้า, IDพนักงาน, IDขอเปิดหน้าแรก
  $sale_comment = $_POST['sale_comment_e']; //คอมเม้น
  $considerationE = $_POST['considerationE'];
  $sale_name_cusE = $_POST['sale_name_cusE'];
  $sale_branch_cusE = $_POST['sale_branch_cusE'];


  $sql1 = " UPDATE tblcustomer ";
  $sql1 .= " SET cus_code = '{$cus_code}' , ";
  $sql1 .= " cus_dateopen = '{$date_open}' , ";
  $sql1 .= " cus_titid  = '{$cus_tit}' , ";
  $sql1 .= " cus_name  = '{$cus_name}' , ";
  $sql1 .= " cus_lname  = '{$cus_lname}' , ";
  $sql1 .= " cus_idcard  = '{$cus_idcard}' , ";
  $sql1 .= " cus_position  = '{$cus_position}' , ";
  $sql1 .= " cus_department  = '{$cus_department}' , ";
  $sql1 .= " cus_openid  = '{$open_type}' , ";
  $sql1 .= " cus_openoth  = '{$open_other}' , ";
  $sql1 .= " cus_company  = '{$open_businame}' , ";
  $sql1 .= " cus_addno  = '{$open_busiloca}' , ";
  $sql1 .= " cus_mno  = '{$open_busiswine}' , ";
  $sql1 .= " cus_roadname  = '{$open_busiroad}' , ";
  $sql1 .= " cus_alleyname  = '{$open_busialley}' , ";
  $sql1 .= " cus_districtid  = '{$open_busidistrict}' , ";
  $sql1 .= " cus_amphurid  = '{$open_busiamphur}' , ";
  $sql1 .= " cus_provinceid  = '{$open_busiprovin}' , ";
  $sql1 .= " cus_zipcodeid  = '{$open_busizipcode}' , ";
  $sql1 .= " cus_phoneno  = '{$open_phone}' , ";
  $sql1 .= " cus_faxno  = '{$open_fax}' , ";
  $sql1 .= " cus_phonecus  = '{$cus_phonecus}' , ";
  $sql1 .= " cus_email  = '{$cus_email}' , ";
  $sql1 .= " cus_line  = '{$cus_line}' , ";
  $sql1 .= " cus_face  = '{$cus_face}' , ";
  $sql1 .= " cus_tit1  = '{$tit1}' , ";
  $sql1 .= " cus_name1  = '{$name1}' , ";
  $sql1 .= " cus_lname1  = '{$lname1}' , ";
  $sql1 .= " cus_idcard1  = '{$idcard1}' , ";
  $sql1 .= " cus_position1  = '{$position1}' , ";
  $sql1 .= " cus_tit2  = '{$tit2}' , ";
  $sql1 .= " cus_name2  = '{$name2}' , ";
  $sql1 .= " cus_lname2  = '{$lname2}' , ";
  $sql1 .= " cus_idcard2  = '{$idcard2}' , ";
  $sql1 .= " cus_position2  = '{$position2}' , ";
  $sql1 .= " cus_tit3  = '{$tit3}' , ";
  $sql1 .= " cus_name3  = '{$name3}' , ";
  $sql1 .= " cus_lname3  = '{$lname3}' , ";
  $sql1 .= " cus_idcard3  = '{$idcard3}' , ";
  $sql1 .= " cus_position3  = '{$position3}' , ";
  $sql1 .= " cus_updateby  = '{$_SESSION['use_user']}' , ";
  $sql1 .= " cus_updatetime  = NOW() ";
  $sql1 .= " WHERE  cus_id = '$cusid' ;";

  $result1 = mysql_query($sql1) or die(mysql_error());


    $sql2 = " UPDATE tblcreditopen1 ";
    $sql2 .= " SET crd1_cusid = '{$cusid}' , ";
    $sql2 .= " crd1_dateopen = '{$date_open}' , ";
    $sql2 .= " crd1_objec = '{$open_typeproject}' , ";
    $sql2 .= " crd1_projectname = '{$open_nameproject}' , ";
    $sql2 .= " crd1_construction = '{$open_locaproject}' , ";
    $sql2 .= " crd1_promise = '{$open_dateproject}' , ";
    $sql2 .= " crd1_startproject = '{$open_dateprostart}' , ";
    $sql2 .= " crd1_endproject = '{$open_dateproend}' , ";
    $sql2 .= " crd1_consvalue = '{$open_promon}' , ";
    $sql2 .= " crd1_startproduct = '{$proget_start}' , ";
    $sql2 .= " crd1_projecttype = '{$project_type}' , ";
    $sql2 .= " crd1_projectoth = '{$project_other}' , ";
    $sql2 .= " crd1_buildingm = '{$project_averagebuy}' , ";
    $sql2 .= " crd1_buildingy = '{$project_buytotal}' , ";
    $sql2 .= " crd1_transpose = '{$delivery}' , ";
    $sql2 .= " crd1_payment = '{$pay_type}' , ";
    $sql2 .= " crd1_paymentoth = '{$pay_other}' , ";
    $sql2 .= " crd1_setpayment = '{$pay_deadline}' , ";
    $sql2 .= " crd1_billingloc = '{$pay_locabill}' , ";
    $sql2 .= " crd1_formalbil = '{$billing}' , ";
    $sql2 .= " crd1_foemalbiloth = '{$billing_other}' , ";
    $sql2 .= " crd1_shopcontaot = '{$contacted_open}' , ";
    $sql2 .= " crd1_product = '{$product_open}' , ";
    $sql2 .= " crd1_limit = '{$product_mon}' , ";
    $sql2 .= " crd1_crdday = '{$product_credit}' , ";
    $sql2 .= " crd1_bank = '{$bank_open}' , ";
    $sql2 .= " crd1_branbank = '{$bankbran_open}' , ";
    $sql2 .= " crd1_accountbank = '{$booknum_open}' , ";
    $sql2 .= " crd1_updateby = '{$_SESSION['use_user']}' , ";
    $sql2 .= " crd1_updatetime = NOW() ";
    $sql2 .= " WHERE  crd1_id = '$crd1id' ;";

    $result2 = mysql_query($sql2) or die(mysql_error());


      $sql3 = " UPDATE tblcreditopen2 ";
      $sql3 .= " SET crd2_crd1id = '{$crd1id}' , ";
      $sql3 .= " crd2_dateopen = '{$date_open}' , ";
      $sql3 .= " crd2_cusid = '{$cusid}' , ";
      $sql3 .= " crd2_useid = '{$useid}' , ";
      $sql3 .= " crd2_consi_id = '{$considerationE}' , ";
      $sql3 .= " crd2_sellname = '{$sale_name_cusE}' , ";
      $sql3 .= " crd2_sellbranid = '{$sale_branch_cusE}' , ";
      $sql3 .= " crd2_comment = '{$sale_comment}' , ";
      $sql3 .= " crd2_updateby = '{$_SESSION['use_user']}' , ";
      $sql3 .= " crd2_updatetime = NOW() ";
      $sql3 .= " WHERE  crd2_id = '$crd2' ;";

      $result3 = mysql_query($sql3) or die(mysql_error());

      echo "Y";


mysql_close($c);
 ?>
