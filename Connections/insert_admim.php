<?php include "connect_mysql.php";

$sql_s1 = "SELECT * FROM tbluser";
$result_s1 = mysql_query($sql_s1) or die(mysql_error());
if (mysql_num_rows($result_s1)==0){ //ถ้ายังไม่มี admin ในระบบ
$sql1 = " INSERT INTO `intrayon_credityc`.`tbluser` ( ";
$sql1 .= " `use_id` , ";
$sql1 .= " `use_code` , ";
$sql1 .= " `use_titid` , ";
$sql1 .= " `use_name` , ";
$sql1 .= " `use_lname` , ";
$sql1 .= " `use_user` , ";
$sql1 .= " `use_pass` , ";
$sql1 .= " `use_branid` , ";
$sql1 .= " `use_comid` , ";
$sql1 .= " `use_tuseid` , ";
$sql1 .= " `use_appid` ,  ";
$sql1 .= " `use_signature` ,  ";
$sql1 .= " `use_createby` ,  ";
$sql1 .= " `ues_createtime` ,  ";
$sql1 .= " `use_updateby` ,  ";
$sql1 .= " `use_updatetime`   ";
$sql1 .= " ) ";
$sql1 .= " VALUES ( ";
$sql1 .= " NULL , 'Y222505', '1', 'Admini', 'strator', 'admin', '".base64_encode('admin1234')."', '1', NULL, '1', '1', NULL, 'admin', NOW(),'admin', NOW()";
$sql1 .= " ); ";
$result1 = mysql_query($sql1) or die(mysql_error());
}

$sql_s2 = "SELECT * FROM tbltitle";
$result_s2 = mysql_query($sql_s2) or die(mysql_error());
if (mysql_num_rows($result_s2)==0){ //ถ้ายังไม่มี admin ในระบบ
$sql2 = " INSERT INTO `intrayon_credityc`.`tbltitle` ( ";
$sql2 .= " `tit_id` , ";
$sql2 .= " `tit_name` , ";
$sql2 .= " `tit_createby` , ";
$sql2 .= " `tit_createtime` , ";
$sql2 .= " `tit_updateby` , ";
$sql2 .= " `tit_updatetime` ";
$sql2 .= " ) ";
$sql2 .= " VALUES ( ";
$sql2 .= " NULL , 'นาย', 'admin', NOW(),'admin', NOW()";
$sql2 .= " ) , ( ";
$sql2 .= " NULL , 'นาง', 'admin', NOW(),'admin', NOW()";
$sql2 .= " ) , ( ";
$sql2 .= " NULL , 'นางสาว', 'admin', NOW(),'admin', NOW()";
$sql2 .= " ); ";
$result2 = mysql_query($sql2) or die(mysql_error());
}

$sql_s3 = "SELECT * FROM tbltypeuser";
$result_s3 = mysql_query($sql_s3) or die(mysql_error());
if (mysql_num_rows($result_s3)==0){ //ถ้ายังไม่มี admin ในระบบ
$sql3 = " INSERT INTO `intrayon_credityc`.`tbltypeuser` ( ";
$sql3 .= " `tuse_id` , ";
$sql3 .= " `tuse_nameth` , ";
$sql3 .= " `tuse_nameen` , ";
$sql3 .= " `tuse_createby` , ";
$sql3 .= " `tuse_createtime` , ";
$sql3 .= " `tuse_updateby` , ";
$sql3 .= " `tuse_updatetime` ";
$sql3 .= " ) ";
$sql3 .= " VALUES ( ";
$sql3 .= " NULL , 'ผู้ดูแลระบบ (PM)', 'AdminPM', 'admin', NOW(),'admin', NOW()";
$sql3 .= " ) , ( ";
$sql3 .= " NULL , 'ผู้ดูแลระบบ (บช.ลน)', 'AdminAR', 'admin', NOW(),'admin', NOW()";
$sql3 .= " ) , ( ";
$sql3 .= " NULL , 'ผู้เสนอขออนุมัติ', 'Requester', 'admin', NOW(),'admin', NOW()";
$sql3 .= " ) , ( ";
$sql3 .= " NULL , 'ผู้อนุมัติ', 'Approver', 'admin', NOW(),'admin', NOW()";
$sql3 .= " ); ";
$result3 = mysql_query($sql3) or die(mysql_error());
}

$sql_s4 = "SELECT * FROM tbltypeapprove";
$result_s4 = mysql_query($sql_s4) or die(mysql_error());
if (mysql_num_rows($result_s4)==0){ //ถ้ายังไม่มี admin ในระบบ
$sql4 = " INSERT INTO `intrayon_credityc`.`tbltypeapprove` ( ";
$sql4 .= " `tapp_id` , ";
$sql4 .= " `tapp_tuseid` , ";
$sql4 .= " `tapp_name` , ";
$sql4 .= " `tapp_createby` , ";
$sql4 .= " `tapp_createtime` , ";
$sql4 .= " `tapp_updateby` , ";
$sql4 .= " `tapp_updatetime` , ";
$sql4 .= " `tapp_status` ";
$sql4 .= " ) ";
$sql4 .= " VALUES ( ";
$sql4 .= " NULL , '1', 'ไม่มีสิทธิ์อนุมัติ', 'admin', NOW(),'admin', NOW(),1";
$sql4 .= " ) , ( ";
//$sql4 .= " NULL , '2', 'ไม่มีสิทธิ์อนุมัติ', 'admin', NOW(),'admin', NOW()";
//$sql4 .= " ) , (  ";
//$sql4 .= " NULL , '3', 'ไม่มีสิทธิ์อนุมัติ', 'admin', NOW(),'admin', NOW()";
//$sql4 .= " ) , (  ";
$sql4 .= " NULL , '4', 'ผู้พิจารณา 1 (ผู้จัดการฝ่ายขาย)', 'admin', NOW(),'admin', NOW(),4 ";
$sql4 .= " ) , (  ";
$sql4 .= " NULL , '4', 'ผู้พิจารณา 2 (ผู้จัดการฝ่ายสินเชื่อ/บัญชีลูกหนี้)', 'admin', NOW(),'admin', NOW(),5 ";
$sql4 .= " ) , (  ";
$sql4 .= " NULL , '4', 'ผู้อนุมัติ 1 (ผู้จัดการฝ่ายการเงิน)', 'admin', NOW(),'admin', NOW(),6 ";
$sql4 .= " ) , (  ";
$sql4 .= " NULL , '4', 'ผู้อนุมัติ 2 (กรรมการผู้จัดการ)', 'admin', NOW(),'admin', NOW(),7 ";
$sql4 .= " ); ";
$result4 = mysql_query($sql4) or die(mysql_error());
}

$sql_s5 = "SELECT * FROM tblbrand";
$result_s5 = mysql_query($sql_s5) or die(mysql_error());
if (mysql_num_rows($result_s5)==0){ //ถ้ายังไม่มี admin ในระบบ
$sql5 = " INSERT INTO `intrayon_credityc`.`tblbrand` ( ";
$sql5 .= " `bran_id` , ";
$sql5 .= " `bran_name` , ";
$sql5 .= " `bran_names` , ";
$sql5 .= " `bran_createby` , ";
$sql5 .= " `bran_createtime` , ";
$sql5 .= " `bran_updateby` , ";
$sql5 .= " `bran_updatetime` ";
$sql5 .= " ) ";
$sql5 .= " VALUES ( ";
$sql5 .= " NULL , 'สาขาวังสารภี', 'Y3', 'admin', NOW(),'admin', NOW()";
$sql5 .= " ) , ( ";
$sql5 .= " NULL , 'สาขาสำนักงานใหญ่', 'Y5', 'admin', NOW(),'admin', NOW()";
$sql5 .= " ); ";
$result5 = mysql_query($sql5) or die(mysql_error());
}

$sql_s6 = "SELECT * FROM tbltypeopen";
$result_s6 = mysql_query($sql_s6) or die(mysql_error());
if (mysql_num_rows($result_s6)==0){ //ถ้ายังไม่มี admin ในระบบ
$sql6 = " INSERT INTO `intrayon_credityc`.`tbltypeopen` ( ";
$sql6 .= " `open_id` , ";
$sql6 .= " `open_name` , ";
$sql6 .= " `open_createby` , ";
$sql6 .= " `open_createtime` , ";
$sql6 .= " `open_updateby` , ";
$sql6 .= " `open_updatetime` ";
$sql6 .= " ) ";
$sql6 .= " VALUES ( ";
$sql6 .= " NULL , 'บริษัท', 'admin', NOW(),'admin', NOW()";
$sql6 .= " ) , ( ";
$sql6 .= " NULL , 'ห้างหุ้นส่วนจำกัด', 'admin', NOW(),'admin', NOW()";
$sql6 .= " ) , (  ";
$sql6 .= " NULL , 'ร้านค้า', 'admin', NOW(),'admin', NOW()";
$sql6 .= " ) , (  ";
$sql6 .= " NULL , 'บุคคลธรรมดา', 'admin', NOW(),'admin', NOW()";
$sql6 .= " ) , (  ";
$sql6 .= " NULL , 'หน่วยราชการ', 'admin', NOW(),'admin', NOW()";
$sql6 .= " ) , (  ";
$sql6 .= " NULL , 'อื่นๆ', 'admin', NOW(),'admin', NOW()";
$sql6 .= " ); ";
$result6 = mysql_query($sql6) or die(mysql_error());
}

$sql_s7 = "SELECT * FROM tbltypeconstruct";
$result_s7 = mysql_query($sql_s7) or die(mysql_error());
if (mysql_num_rows($result_s7)==0){ //ถ้ายังไม่มี admin ในระบบ
$sql7 = " INSERT INTO `intrayon_credityc`.`tbltypeconstruct` ( ";
$sql7 .= " `cont_id` , ";
$sql7 .= " `cont_name` , ";
$sql7 .= " `cont_createby` , ";
$sql7 .= " `cont_createtime` , ";
$sql7 .= " `cont_updateby` , ";
$sql7 .= " `cont_updatetime` ";
$sql7 .= " ) ";
$sql7 .= " VALUES ( ";
$sql7 .= " NULL , 'บ้านพักส่วนตัว', 'admin', NOW(),'admin', NOW()";
$sql7 .= " ) , ( ";
$sql7 .= " NULL , 'บ้านจัดสรร', 'admin', NOW(),'admin', NOW()";
$sql7 .= " ) , ( ";
$sql7 .= " NULL , 'โรงงาน', 'admin', NOW(),'admin', NOW()";
$sql7 .= " ) , ( ";
$sql7 .= " NULL , 'โรงแรม', 'admin', NOW(),'admin', NOW()";
$sql7 .= " ) , ( ";
$sql7 .= " NULL , 'รีสอร์ท', 'admin', NOW(),'admin', NOW()";
$sql7 .= " ) , ( ";
$sql7 .= " NULL , 'อาคารพาณิชย์', 'admin', NOW(),'admin', NOW()";
$sql7 .= " ) , ( ";
$sql7 .= " NULL , 'โรงเรียน', 'admin', NOW(),'admin', NOW()";
$sql7 .= " ) , ( ";
$sql7 .= " NULL , 'อื่น ๆ', 'admin', NOW(),'admin', NOW()";
$sql7 .= " ); ";
$result7 = mysql_query($sql7) or die(mysql_error());
}

$sql_s8 = "SELECT * FROM tbltypepayment";
$result_s8 = mysql_query($sql_s8) or die(mysql_error());
if (mysql_num_rows($result_s8)==0){ //ถ้ายังไม่มี admin ในระบบ
$sql8 = " INSERT INTO `intrayon_credityc`.`tbltypepayment` ( ";
$sql8 .= " `pay_id` , ";
$sql8 .= " `pay_name` , ";
$sql8 .= " `pay_createby` , ";
$sql8 .= " `pay_createtime` , ";
$sql8 .= " `pay_updateby` , ";
$sql8 .= " `pay_updatetime` ";
$sql8 .= " ) ";
$sql8 .= " VALUES ( ";
$sql8 .= " NULL , 'เช็ค', 'admin', NOW(),'admin', NOW()";
$sql8 .= " ) , ( ";
$sql8 .= " NULL , 'บัตรเครดิต', 'admin', NOW(),'admin', NOW()";
$sql8 .= " ) , ( ";
$sql8 .= " NULL , 'โอนเข้าบัญชี', 'admin', NOW(),'admin', NOW()";
$sql8 .= " ) , ( ";
$sql8 .= " NULL , 'อื่น ๆ', 'admin', NOW(),'admin', NOW()";
$sql8 .= " ); ";
$result8 = mysql_query($sql8) or die(mysql_error());
}

$sql_s9 = "SELECT * FROM tbldoctype";
$result_s9 = mysql_query($sql_s9) or die(mysql_error());
if (mysql_num_rows($result_s9)==0){ //ถ้ายังไม่มี admin ในระบบ
	$sql9 = " INSERT INTO `intrayon_credityc`.`tbldoctype`  ";
	$sql9 .= " (`dty_id`, `dty_name`, `dty_createby`, `dty_createtime`, `dty_updateby`, `dty_updatetime`, `dty_status` ) ";
	$sql9 .= " VALUES ";
	$sql9 .= " (NULL, 'เอกสารแบบฟอร์มหลัก', 'admin', NOW(), 'admin', NOW(), '1'), ";
	$sql9 .= " (NULL, 'เอกสารหลักฐานของลูกหนี้ ประกอบการพิจารณา', 'admin', NOW(), 'admin', NOW(), '1'); ";
	$result9 = mysql_query($sql9) or die(mysql_error());
}

$sql_s10 = "SELECT * FROM tblconsideration";
$result_s10 = mysql_query($sql_s10) or die(mysql_error());
if (mysql_num_rows($result_s10)==0){ //ถ้ายังไม่มี admin ในระบบ
	$sql10 = " INSERT INTO `intrayon_credityc`.`tblconsideration`  ";
	$sql10 .= " ( `consi_id`, `consi_name`, `consi_createby`, `consi_createtime`, `consi_updateby`, `consi_updatetime`, `consi_status` ) ";
	$sql10 .= " VALUES ";
	$sql10 .= " (NULL, 'เขตกาญจนบุรี', 'admin', NOW(), 'admin', NOW(), '1'), ";
	$sql10 .= " (NULL, 'เขตนครปฐม', 'admin', NOW(), 'admin', NOW(), '1'), ";
	$sql10 .= " (NULL, 'เขตบางเลน', 'admin', NOW(), 'admin', NOW(), '1'), ";
	$sql10 .= " (NULL, 'เขตชลบุรี', 'admin', NOW(), 'admin', NOW(), '1'); ";
	$result10 = mysql_query($sql10) or die(mysql_error());
}


mysql_close($c);
?>
