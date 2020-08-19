<?php include "connect_mysql.php";

$sql1 = " CREATE TABLE IF NOT EXISTS `intrayon_credityc`.`tbltypeuser` ( ";
$sql1 .= " `tuse_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับ' , ";
$sql1 .= " `tuse_nameth` VARCHAR( 200 ) NOT NULL COMMENT 'ประเภทภาษาไทย' , ";
$sql1 .= " `tuse_nameen` VARCHAR( 200 ) NOT NULL COMMENT 'ประเภทภาษาอังกฤษ' , ";
$sql1 .= " `tuse_createby` VARCHAR( 100 ) NOT NULL COMMENT 'สร้างโดย' , ";
$sql1 .= " `tuse_createtime` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
$sql1 .= " `tuse_updateby` VARCHAR( 100 ) NOT NULL COMMENT 'แก้ไขโดย' , ";
$sql1 .= " `tuse_updatetime` DATETIME NOT NULL COMMENT 'วันที่แก้ไข' , ";
$sql1 .= " `tuse_status` TINYINT( 1 ) NOT NULL DEFAULT '1' COMMENT 'สถานะ 1.ใช้งานปกติ' , ";
$sql1 .= " INDEX(tuse_nameth, tuse_status) ";
$sql1 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COMMENT='ตารางประเภทผู้ใช้งาน' COLLATE utf8_general_ci ";
$create_tb1 = mysql_query($sql1) or die(mysql_error());


$sql2 = " CREATE TABLE IF NOT EXISTS `intrayon_credityc`.`tbltypeapprove` ( ";
$sql2 .= " `tapp_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับผู้อนุมัติ' , ";
$sql2 .= " `tapp_tuseid` INT NOT NULL COMMENT 'ID ประเภทผู้ใช้งาน' , ";
$sql2 .= " `tapp_name` VARCHAR( 200 ) NOT NULL COMMENT 'ประเภทผู้อนุมัติ' , ";
$sql2 .= " `tapp_createby` VARCHAR( 100 ) NOT NULL COMMENT 'สร้างโดย' , ";
$sql2 .= " `tapp_createtime` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
$sql2 .= " `tapp_updateby` VARCHAR( 100 ) NOT NULL COMMENT 'แก้ไขโดย' , ";
$sql2 .= " `tapp_updatetime` DATETIME NOT NULL COMMENT 'วันที่แก้ไข' , ";
$sql2 .= " `tapp_status` TINYINT( 1 ) NOT NULL DEFAULT '1' COMMENT 'สถานะ 1.ใช้งานปกติ' , ";
$sql2 .= " INDEX(tapp_name, tapp_status) ";
$sql2 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT='ตารางประเภทผู้อนุมัติ'";

 $create_tb2 = mysql_query($sql2) or die(mysql_error());


$sql3 = " CREATE TABLE IF NOT EXISTS `intrayon_credityc`.`tbltypeopen` ( ";
$sql3 .= " `open_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับ' , ";
$sql3 .= " `open_name` VARCHAR( 200 ) NOT NULL COMMENT 'ประเภทการเปิด' , ";
$sql3 .= " `open_createby` VARCHAR( 100 ) NOT NULL COMMENT 'สร้างโดย' , ";
$sql3 .= " `open_createtime` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
$sql3 .= " `open_updateby` VARCHAR( 100 ) NOT NULL COMMENT 'แก้ไขโดย' , ";
$sql3 .= " `open_updatetime` DATETIME NOT NULL COMMENT 'แก้ไขวันที่' , ";
$sql3 .= " `open_status` TINYINT( 1 ) NOT NULL DEFAULT '1' COMMENT 'สถานะ 1.ใช้งานปกติ' , ";
$sql3 .= " INDEX(open_name, open_status) ";
$sql3 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT='ตารางประเภทการขอเปิด'";

 $create_tb3 = mysql_query($sql3) or die(mysql_error());


$sql4 = " CREATE TABLE IF NOT EXISTS `intrayon_credityc`.`tbltypeconstruct` ( ";
$sql4 .= " `cont_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับ' , ";
$sql4 .= " `cont_name` VARCHAR( 200 ) NOT NULL COMMENT 'ประเภทการก่อสร้าง' , ";
$sql4 .= " `cont_createby` VARCHAR( 100 ) NOT NULL COMMENT 'สร้างโดย' , ";
$sql4 .= " `cont_createtime` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
$sql4 .= " `cont_updateby` VARCHAR( 100 ) NOT NULL COMMENT 'แก้ไขโดย' , ";
$sql4 .= " `cont_updatetime` DATETIME NOT NULL COMMENT 'วันที่แก้ไข' , ";
$sql4 .= " `cont_status` TINYINT( 1 ) NOT NULL DEFAULT '1' COMMENT 'สถานะ 1.ใช้งานปกติ' , ";
$sql4 .= " INDEX(cont_name, cont_status) ";
$sql4 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT='ตารางประเภทการก่อสร้าง'";

 $create_tb4 = mysql_query($sql4) or die(mysql_error());



$sql5 = " CREATE TABLE IF NOT EXISTS `intrayon_credityc`.`tbltypepayment` ( ";
$sql5 .= " `pay_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับ' , ";
$sql5 .= " `pay_name` VARCHAR( 100 ) NOT NULL COMMENT 'ประเภทการจ่ายเงิน' , ";
$sql5 .= " `pay_createby` VARCHAR( 100 ) NOT NULL COMMENT 'สร้างโดย' , ";
$sql5 .= " `pay_createtime` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
$sql5 .= " `pay_updateby` VARCHAR( 100 ) NOT NULL COMMENT 'แก้ไขโดย' , ";
$sql5 .= " `pay_updatetime` DATETIME NOT NULL COMMENT 'วันที่แก้ไข' , ";
$sql5 .= " `pay_status` TINYINT( 1 ) NOT NULL DEFAULT '1' COMMENT 'สถานะ 1.ใช้งานปกติ' , ";
$sql5 .= " INDEX(pay_name, pay_status) ";
$sql5 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT='ตารางประเภทการจ่ายเงิน'";

 $create_tb5 = mysql_query($sql5) or die(mysql_error());


$sql6 = " CREATE TABLE IF NOT EXISTS `intrayon_credityc`.`tblcreditopen1` ( ";
$sql6 .= " `crd1_id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับ' , ";
$sql6 .= " `crd1_cusid` INT( 11 ) NOT NULL COMMENT 'ลำดับลูกค้า' , ";
$sql6 .= " `crd1_dateopen` DATE DEFAULT NULL COMMENT 'วันที่ทำเรื่อง' , ";
$sql6 .= " `crd1_objec` VARCHAR( 10 ) DEFAULT NULL COMMENT 'วัตถุประสงค์นำไปใช้' , ";
$sql6 .= " `crd1_projectname` VARCHAR( 200 ) DEFAULT NULL COMMENT 'ชื่อโครงการ' , ";
$sql6 .= " `crd1_construction` TEXT COMMENT 'ที่ตั้งโครงการ' , ";
$sql6 .= " `crd1_promise` INT( 11 ) DEFAULT NULL COMMENT 'จำนวนวันก่อสร้าง' , ";
$sql6 .= " `crd1_startproject` DATE DEFAULT NULL COMMENT 'วันที่เริ่มต้น' , ";
$sql6 .= " `crd1_endproject` DATE DEFAULT NULL COMMENT 'วันที่สิ้นสุด' , ";
$sql6 .= " `crd1_consvalue` INT( 11 ) DEFAULT NULL COMMENT 'มูลค่าโครงการ' , ";
$sql6 .= " `crd1_startproduct` DATE DEFAULT NULL COMMENT 'เริ่มใช้สินค้า' , ";
$sql6 .= " `crd1_projecttype` INT( 11 ) DEFAULT NULL COMMENT 'ประเภทโครงการ' , ";
$sql6 .= " `crd1_projectoth` TEXT COMMENT 'โครงการ อื่นๆ' , ";
$sql6 .= " `crd1_buildingm` INT( 11 ) DEFAULT NULL COMMENT 'การซื้อเฉลี่ย/เดือน' , ";
$sql6 .= " `crd1_buildingy` INT( 11 ) DEFAULT NULL COMMENT 'การซื้อรวม/ปี' , ";
$sql6 .= " `crd1_transpose` VARCHAR( 50 ) DEFAULT NULL COMMENT 'สถานที่จัดส่ง' , ";
$sql6 .= " `crd1_payment` INT( 11 ) DEFAULT NULL COMMENT 'การชำระสินค้า' , ";
$sql6 .= " `crd1_paymentoth` TEXT COMMENT 'การชำระสินค้าทาง อื่นๆ' , ";
$sql6 .= " `crd1_setpayment` INT( 11 ) DEFAULT NULL COMMENT 'กำหนดวันชำระเงิน' , ";
$sql6 .= " `crd1_billingloc` TEXT COMMENT 'สถานที่วางบิล' , ";
$sql6 .= " `crd1_formalbil` VARCHAR( 50 ) DEFAULT NULL COMMENT 'ระเบียบการวางบิล' , ";
$sql6 .= " `crd1_foemalbiloth` TEXT COMMENT 'ระเบียบการวางบิล อื่นๆ' , ";
$sql6 .= " `crd1_shopcontaot` TEXT COMMENT 'ร้านค้าที่เคยติดต่อ' , ";
$sql6 .= " `crd1_product` TEXT COMMENT 'สินค้า' , ";
$sql6 .= " `crd1_limit` INT( 11 ) DEFAULT NULL COMMENT 'วงเงินเครดิต' , ";
$sql6 .= " `crd1_crdday` INT( 11 ) DEFAULT NULL COMMENT 'วันจ่ายเครดิต' , ";
$sql6 .= " `crd1_bank` VARCHAR( 200 ) DEFAULT NULL COMMENT 'ธนาคาร' , ";
$sql6 .= " `crd1_branbank` VARCHAR( 200 ) DEFAULT NULL COMMENT 'สาขาธนาคาร' , ";
$sql6 .= " `crd1_accountbank` VARCHAR( 200 ) DEFAULT NULL COMMENT 'เลขที่บัญชี' , ";
$sql6 .= " `crd1_createby` VARCHAR( 100 ) DEFAULT NULL COMMENT 'สร้างโดย' , ";
$sql6 .= " `crd1_createtime` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
$sql6 .= " `crd1_updateby` VARCHAR( 100 ) DEFAULT NULL COMMENT 'แก้ไขโดย' , ";
$sql6 .= " `crd1_updatetime` DATETIME NOT NULL COMMENT 'วันที่แก้ไข' , ";
$sql6 .= " `crd1_status` TINYINT( 1 ) DEFAULT '1' COMMENT 'สถานะ 1.ใช้งานปกติ' , ";
$sql6 .= " INDEX(crd1_objec, crd1_projectname, crd1_projecttype, crd1_status) ";
$sql6 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT='ขอเปิดเครดิต1'";

	$create_tb6 = mysql_query($sql6) or die(mysql_error());


$sql7 = " CREATE TABLE IF NOT EXISTS `intrayon_credityc`.`tblcustomer` ( ";
$sql7 .= " `cus_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับ' , ";
$sql7 .= " `cus_code` varchar(100) default NULL COMMENT 'รหัสลูกค้า' , ";
$sql7 .= " `cus_dateopen` DATETIME default NULL COMMENT 'วันที่ขอเปิด' , ";
$sql7 .= " `cus_titid` int(1) NOT NULL COMMENT 'คำนำหน้าชื่อ' , ";
$sql7 .= " `cus_name` varchar(300) NOT NULL COMMENT 'ชื่อ' , ";
$sql7 .= " `cus_lname` varchar(300) NOT NULL COMMENT 'นามสกุล' , ";
$sql7 .= " `cus_idcard` varchar(50) default NULL COMMENT 'รหัสบัตร ปชช/พาสปอท' , ";
$sql7 .= " `cus_position` varchar(200) default NULL COMMENT 'ตำแหน่งลูกค้า' , ";
$sql7 .= " `cus_department` varchar(200) default NULL COMMENT 'แผนก/ฝ่าย' , ";
$sql7 .= " `cus_openid` int(11) default NULL COMMENT 'ประเภทขอเปิด' , ";
$sql7 .= " `cus_openoth` text COMMENT 'หมายเหตุ อื่นๆ' , ";
$sql7 .= " `cus_company` VARCHAR(300) NULL DEFAULT NULL COMMENT 'ชื่อบริษัท/คนขอเปิด' , ";
$sql7 .= " `cus_addno` VARCHAR(100) NULL DEFAULT NULL COMMENT 'ที่อยู่' , ";
$sql7 .= " `cus_mno` VARCHAR(100) NULL DEFAULT NULL COMMENT 'หมู่' , ";
$sql7 .= " `cus_roadname` VARCHAR(100) NULL DEFAULT NULL COMMENT 'ถนน' , ";
$sql7 .= " `cus_alleyname` VARCHAR(200) NULL DEFAULT NULL COMMENT 'ตรอก/ซอย' , ";
$sql7 .= " `cus_districtid` INT(5) NULL DEFAULT NULL COMMENT 'ตำบล/แขวง' , ";
$sql7 .= " `cus_amphurid` INT(5) NULL DEFAULT NULL COMMENT 'อำเภอ' , ";
$sql7 .= " `cus_provinceid` INT(5) NULL DEFAULT NULL COMMENT 'จังหวัด' , ";
$sql7 .= " `cus_zipcodeid` INT(5) NULL DEFAULT NULL COMMENT 'รหัสไปรษณีย์' , ";
$sql7 .= " `cus_phoneno` VARCHAR(50) NULL DEFAULT NULL COMMENT 'เบอร์โทรศัพท์' , ";
$sql7 .= " `cus_faxno` VARCHAR(50) NULL DEFAULT NULL COMMENT 'เบอร์แฟกซ์' , ";
$sql7 .= " `cus_phonecus` VARCHAR(50) NULL DEFAULT NULL COMMENT 'เบอร์โทรผู้ขอติดต่อ' , ";
$sql7 .= " `cus_email` VARCHAR( 150 ) NULL DEFAULT NULL COMMENT 'อีเมล์' , ";
$sql7 .= " `cus_line` VARCHAR( 100 )  NULL DEFAULT NULL COMMENT 'ไลน์' , ";
$sql7 .= " `cus_face` VARCHAR( 100 ) NULL DEFAULT NULL COMMENT 'เฟสบุ๊ค'  , ";
$sql7 .= " `cus_tit1` INT(1) NULL DEFAULT NULL COMMENT 'คำนำหน้าชื่อคนที่1' , ";
$sql7 .= " `cus_name1` VARCHAR(300) NULL DEFAULT NULL COMMENT 'ชื่อคนที่1'  , ";
$sql7 .= " `cus_lname1` VARCHAR(300) NULL DEFAULT NULL COMMENT 'นามสกุลคนที่1' , ";
$sql7 .= " `cus_idcard1` VARCHAR(50) NULL DEFAULT NULL COMMENT 'รหัวบัตรประชาชนคนที่1' , ";
$sql7 .= " `cus_position1` VARCHAR(200) NULL DEFAULT NULL COMMENT 'ตำแหน่งคนที่1' , ";
$sql7 .= " `cus_tit2` INT(1) NULL DEFAULT NULL COMMENT 'คำนำหน้าชื่อคนที่2' , ";
$sql7 .= " `cus_name2` VARCHAR(300) NULL DEFAULT NULL COMMENT 'ชื่อคนที่2'  , ";
$sql7 .= " `cus_lname2` VARCHAR(300) NULL DEFAULT NULL COMMENT 'นามสกุลคนที่2' , ";
$sql7 .= " `cus_idcard2` VARCHAR(50) NULL DEFAULT NULL COMMENT 'รหัวบัตรประชาชนคนที่2' , ";
$sql7 .= " `cus_position2` VARCHAR(200) NULL DEFAULT NULL COMMENT 'ตำแหน่งคนที่2' , ";
$sql7 .= " `cus_tit3` INT(1) NULL DEFAULT NULL COMMENT 'คำนำหน้าชื่อคนที่3' , ";
$sql7 .= " `cus_name3` VARCHAR(300) NULL DEFAULT NULL COMMENT 'ชื่อคนที่3'  , ";
$sql7 .= " `cus_lname3` VARCHAR(300) NULL DEFAULT NULL COMMENT 'นามสกุลคนที่3' , ";
$sql7 .= " `cus_idcard3` VARCHAR(50) NULL DEFAULT NULL COMMENT 'รหัวบัตรประชาชนคนที่3' , ";
$sql7 .= " `cus_position3` VARCHAR(200) NULL DEFAULT NULL COMMENT 'ตำแหน่งคนที่3' , ";
$sql7 .= " `cus_backlist` varchar(1) NOT NULL default 'A' COMMENT 'สถานะ backlist' , ";
$sql7 .= " `cus_createby` varchar(100) NOT NULL COMMENT 'สร้างโดย' , ";
$sql7 .= " `cus_createtime` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
$sql7 .= " `cus_updateby` varchar(100) NOT NULL COMMENT 'แก้ไขโดย' , ";
$sql7 .= " `cus_updatetime` DATETIME NOT NULL COMMENT 'วันที่แก้ไข' , ";
$sql7 .= " `cus_greadid` int(11) default NULL COMMENT 'สถานะเกรดลูกค้า' , ";
$sql7 .= " `cus_status` tinyint(1) NOT NULL default '1' COMMENT 'สถานะ 1.ปกติ' , ";
$sql7 .= " INDEX(cus_code, cus_name, cus_lname, cus_idcard, cus_phoneno, cus_faxno, cus_greadid) ";
$sql7 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT='ตารางลูกค้า'";

	$create_tb7 = mysql_query($sql7) or die(mysql_error());

$sql8 = " CREATE TABLE IF NOT EXISTS `intrayon_credityc`.`tbltitle` ( ";
$sql8 .= " `tit_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับ' , ";
$sql8 .= " `tit_name` VARCHAR( 300 ) NOT NULL COMMENT 'ชื่อคำนำหน้า' , ";
$sql8 .= " `tit_createby` VARCHAR( 100 ) NOT NULL COMMENT 'สร้างโดย' , ";
$sql8 .= " `tit_createtime` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
$sql8 .= " `tit_updateby` VARCHAR( 100 ) NOT NULL COMMENT 'แก้ไขโดย' , ";
$sql8 .= " `tit_updatetime` DATETIME NOT NULL COMMENT 'วันที่แก้ไข' , ";
$sql8 .= " `tit_status` TINYINT( 1 ) NOT NULL DEFAULT '1' COMMENT 'สถานะ 1.ใช้งานปกติ' , ";
$sql8 .= " INDEX(tit_name) ";
$sql8 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT='ตารางคำนำหน้าชื่อ'";

 $create_tb8 = mysql_query($sql8) or die(mysql_error());

$sql9 = " CREATE TABLE IF NOT EXISTS `intrayon_credityc`.`tbluser` ( ";
$sql9 .= " `use_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับ' , ";
$sql9 .= " `use_code` VARCHAR( 20 ) NOT NULL COMMENT  'รหัสพนักงาน' , ";
$sql9 .= " `use_titid` int(11) NOT NULL COMMENT 'คำนำหน้าชื่อ' , ";
$sql9 .= " `use_name` varchar(200) NOT NULL COMMENT 'ชื่อ' , ";
$sql9 .= " `use_lname` varchar(200) NOT NULL COMMENT 'นามสกุล' , ";
$sql9 .= " `use_user` varchar(50) NOT NULL COMMENT 'user' , ";
$sql9 .= " `use_pass` varchar(50) NOT NULL COMMENT 'รหัสผ่าน' , ";
$sql9 .= " `use_branid` int(11) NOT NULL COMMENT 'สาขา' , ";
$sql9 .= " `use_comid` int(11) NULL COMMENT 'บริษัท' , ";
$sql9 .= " `use_tuseid` int(11) NOT NULL COMMENT 'ประเภทผู้ใช้งาน' , ";
$sql9 .= " `use_appid` int(11) NOT NULL COMMENT 'ประเภทการอนุมัติ' , ";
$sql9 .= " `use_signature` text NULL COMMENT 'ลายเซ็น' , ";
$sql9 .= " `use_createby` varchar(100) NOT NULL COMMENT 'สร้างโดย' , ";
$sql9 .= " `ues_createtime` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
$sql9 .= " `use_updateby` varchar(100) NOT NULL COMMENT 'แก้ไขโดย' , ";
$sql9 .= " `use_updatetime` DATETIME NOT NULL COMMENT 'วันที่แก้ไข' , ";
$sql9 .= " `use_status_pass` tinyint(1) NOT NULL default '0' COMMENT 'สถานะเปลี่ยนรหัสผ่านครั้งแรก' , ";
$sql9 .= " `use_status` tinyint(1) NOT NULL default '1' COMMENT 'สถานะ 1.ใช้งานปกติ' , ";
$sql9 .= " INDEX(use_name, use_lname, use_user, use_branid, use_comid, use_tuseid, use_appid) ";
$sql9 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT='ตารางผู้ใช้งาน'";

 $create_tb9 = mysql_query($sql9) or die(mysql_error());

$sql10 = " CREATE TABLE IF NOT EXISTS `intrayon_credityc`.`tblcreditopen2` ( ";
$sql10 .= " `crd2_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับ' , ";
$sql10 .= " `crd2_crd1id` INT( 11 ) NOT NULL COMMENT 'ลำดับการขอเปิด 1' , ";
$sql10 .= " `crd2_dateopen` date NOT NULL COMMENT 'วันที่ขอเปิด' , ";
$sql10 .= " `crd2_cusid` int(11) NOT NULL COMMENT 'ลำดับลูกค้า' , ";
$sql10 .= " `crd2_useid` int(11) NOT NULL COMMENT 'ลำดับพนักงานขาย' , ";
$sql10 .= " `crd2_consi_id` INT( 11 ) NULL COMMENT  'ID เขตการพิจารณา' , ";
$sql10 .= " `crd2_sellname` VARCHAR( 255 ) NULL COMMENT  'ชื่อเซลผู้ดูแล' , ";
$sql10 .= " `crd2_sellbranid` INT NULL COMMENT  'สาขาเซล' , ";
$sql10 .= " `crd2_comment` text NULL COMMENT 'คอมเม้นเพิ่ม' , ";
$sql10 .= " `crd2_assesmentapp` tinyint(1) NULL default '0' COMMENT '0.ยังไม่ประเมิน' , ";
$sql10 .= " `crd2_app1` tinyint(1) NULL default '0' COMMENT 'อนุมัติคนที่ 1 0.รออนุมัติ 1.อนุมัติ 2.ไม่อนุมัติ' , ";
$sql10 .= " `crd2_app2` tinyint(1) NULL default '0' COMMENT 'อนุมัติคนที่ 2 0.รออนุมัติ 1.อนุมัติ 2.ไม่อนุมัติ' , ";
$sql10 .= " `crd2_app3` tinyint(1) NULL default '0' COMMENT 'อนุมัติคนที่ 3 0.รออนุมัติ 1.อนุมัติ 2.ไม่อนุมัติ' , ";
$sql10 .= " `crd2_app4` tinyint(1) NULL default '0' COMMENT 'อนุมัติคนที่ 4 0.รออนุมัติ 1.อนุมัติ 2.ไม่อนุมัติ' , ";
$sql10 .= " `crd2_createby` varchar(100) NOT NULL COMMENT 'สร้างโดย' , ";
$sql10 .= " `crd2_createtime` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
$sql10 .= " `crd2_updateby` varchar(100) NOT NULL COMMENT 'แก้ไขโดย' , ";
$sql10 .= " `crd2_updatetime` DATETIME NOT NULL COMMENT 'วันที่แก้ไข' , ";
$sql10 .= " `crd2_status` tinyint(1) NOT NULL default '0' COMMENT 'สถานะ 0.รออนุมัติ 1.อนุมัติ 2.ไม่อนุมัติ' , ";
$sql10 .= " INDEX(crd2_crd1id, crd2_cusid, crd2_useid) ";
$sql10 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT='ขอเปิดเครดิต2'";

 $create_tb10 = mysql_query($sql10) or die(mysql_error());

$sql11 = " CREATE TABLE IF NOT EXISTS `intrayon_credityc`.`tblbrand` ( ";
$sql11 .= " `bran_id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับ' , ";
$sql11 .= " `bran_name` VARCHAR( 100 ) NOT NULL COMMENT 'ชื่อสาขา' , ";
$sql11 .= " `bran_names` VARCHAR( 100 ) NOT NULL COMMENT 'ชื่อย่อสาขา' , ";
$sql11 .= " `bran_createby` VARCHAR( 100 ) NOT NULL COMMENT 'สร้างโดย' , ";
$sql11 .= " `bran_createtime` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
$sql11 .= " `bran_updateby` VARCHAR( 100 ) NOT NULL COMMENT 'แก้ไขโดย' , ";
$sql11 .= " `bran_updatetime` DATETIME NOT NULL COMMENT 'วันที่แก้ไข' , ";
$sql11 .= " `bran_status` TINYINT( 1 ) NOT NULL DEFAULT '1' COMMENT 'สถานะ 1. ปกติ' , ";
$sql11 .= " INDEX(bran_name, bran_names) ";
$sql11 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT='ตารางสาขา'";

 $create_tb11 = mysql_query($sql11) or die(mysql_error());

$sql12 = " CREATE TABLE IF NOT EXISTS `intrayon_credityc`.`tblassessment` ( ";
$sql12 .= " `asm_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับ' , ";
$sql12 .= " `asm_crd2id` int(11) NOT NULL COMMENT 'ลำดับการขอวงเงิน' , ";
$sql12 .= " `asm_useid` int(11) NOT NULL COMMENT 'ID ผู้ใช้งาน' , ";
$sql12 .= " `asm_useappid` int(11) NOT NULL COMMENT 'ประเภทผู้ประเมิน' , ";
$sql12 .= " `asm_score1` int(11) default NULL COMMENT 'ข้อ1' , ";
$sql12 .= " `asm_score2` int(11) default NULL COMMENT 'ข้อ2' , ";
$sql12 .= " `asm_score3` int(11) default NULL COMMENT 'ข้อ3' , ";
$sql12 .= " `asm_score4` int(11) default NULL COMMENT 'ข้อ4' , ";
$sql12 .= " `asm_score5` int(11) default NULL COMMENT 'ข้อ5' , ";
$sql12 .= " `asm_score6` int(11) default NULL COMMENT 'ข้อ6' , ";
$sql12 .= " `asm_score7` int(11) default NULL COMMENT 'ข้อ7' , ";
$sql12 .= " `asm_score8` int(11) default NULL COMMENT 'ข้อ8' , ";
$sql12 .= " `asm_score9` int(11) default NULL COMMENT 'ข้อ9' , ";
$sql12 .= " `asm_score10` int(11) default NULL COMMENT 'ข้อ10' , ";
$sql12 .= " `asm_score_total1` int(11) default NULL COMMENT 'สรุป 1-5' , ";
$sql12 .= " `asm_score_total2` int(11) default NULL COMMENT 'สรุป 6-8' , ";
$sql12 .= " `asm_score_total3` int(11) default NULL COMMENT 'สรุป 9-10' , ";
$sql12 .= " `asm_score_total4` int(11) default NULL COMMENT 'รวมยอดสรุป' , ";
$sql12 .= " `asm_monstart` double default NULL COMMENT 'เงินเริ่มต้น' , ";
$sql12 .= " `asm_comment` text default NULL COMMENT 'ความคิดเห็น' , ";
$sql12 .= " `asm_dateasm` datetime NOT NULL COMMENT 'วันที่ประเมิน' , ";
$sql12 .= " `asm_createby` varchar(100) NOT NULL COMMENT 'สร้างโดย' , ";
$sql12 .= " `asm_createtime` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
$sql12 .= " `asm_updateby` varchar(100) NOT NULL COMMENT 'แก้ไขโดย' , ";
$sql12 .= " `asm_updatetime` DATETIME NOT NULL COMMENT 'วันที่แก้ไข' , ";
$sql12 .= " `asm_status` tinyint(1) NOT NULL default '0' COMMENT 'สถานะประเมิน 0.ยังไม่ประเมิน' , ";
$sql12 .= " INDEX(asm_crd2id, asm_useid, asm_score_total1, asm_score_total2, asm_score_total3, asm_score_total4, asm_monstart) ";
$sql12 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT='ตารางแบบประเมิน'";

	$create_tb12 = mysql_query($sql12) or die(mysql_error());


 $sql13 = " CREATE TABLE IF NOT EXISTS `intrayon_credityc`.`tblapprove` ( ";
 $sql13 .= " `app_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับ' , ";
 $sql13 .= " `app_date` datetime NOT NULL COMMENT 'วันที่อนุมัติ' , ";
 $sql13 .= " `app_crd2id` int(11) NOT NULL COMMENT 'ID การขอเปิด' , ";
 $sql13 .= " `app_useid` int(11) NOT NULL COMMENT 'ID ผู้อนุมัติ' , ";
 $sql13 .= " `app_useappid` int(11) NOT NULL COMMENT 'ระดับการอนุมัติ' , ";
 $sql13 .= " `app_result` varchar(50) NOT NULL COMMENT 'ผลการอนุมัติ' , ";
 $sql13 .= " `app_comment` text COMMENT 'ความคิดเห็น' , ";
 $sql13 .= " `app_monlimit` double default NULL COMMENT 'วงเงินสูงสุด' , ";
 $sql13 .= " `app_monday` int(11) default NULL COMMENT 'จำนวนวันที่ต้องจ่าย' , ";
 $sql13 .= " `app_proother` text COMMENT 'เงื่อนไขอื่นๆ' , ";
 $sql13 .= " `app_createby` varchar(100) NOT NULL COMMENT 'สร้างโดย' , ";
 $sql13 .= " `app_createtime` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
 $sql13 .= " `app_updateby` varchar(100) NOT NULL COMMENT 'แก้ไขโดย' , ";
 $sql13 .= " `app_updatetime` DATETIME NOT NULL COMMENT 'วันที่แก้ไข' , ";
 $sql13 .= " `app_status` tinyint(1) NOT NULL default '1' COMMENT 'สถานะ 1. ปกติ' , ";
 $sql13 .= " INDEX(app_crd2id, app_useid, app_useappid, app_result, app_monlimit, app_monday) ";
 $sql13 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT='ตารางอนุมัติ'";

  $create_tb13 = mysql_query($sql13) or die(mysql_error());

 $sql14 = " CREATE TABLE IF NOT EXISTS `intrayon_credityc`.`tbldocument` ( ";
 $sql14 .= " `doc_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับ' , ";
 $sql14 .= " `doc_name` text NOT NULL COMMENT 'ชื่อเอกสาร' , ";
 $sql14 .= " `doc_type` int(11) NOT NULL COMMENT 'ประเภทเอกสาร' , ";
 $sql14 .= " `doc_createby` varchar(100) NOT NULL COMMENT 'สร้างโดย' , ";
 $sql14 .= " `doc_createtime` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
 $sql14 .= " `doc_updateby` varchar(100) NOT NULL COMMENT 'แก้ไขโดย' , ";
 $sql14 .= " `doc_updatetime` DATETIME NOT NULL COMMENT 'วันที่แก้ไข' , ";
 $sql14 .= " `doc_status` tinyint(1) NOT NULL default '1' COMMENT 'สถานะ 1.ปกติ' , ";
 $sql14 .= " INDEX(doc_type) ";
 $sql14 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT='เอกสารที่ต้องแนบ'";

 	$create_tb14 = mysql_query($sql14) or die(mysql_error());

  $sql15 = " CREATE TABLE IF NOT EXISTS `intrayon_credityc`.`tblfile` ( ";
  $sql15 .= " `file_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับ' , ";
  $sql15 .= " `file_crd2id` int(11) NOT NULL COMMENT 'ลำดับการขอเปิด' , ";
  $sql15 .= " `file_docid` int(11) NOT NULL COMMENT 'ลำดับเอกสาร' , ";
  $sql15 .= " `file_name` text NULL COMMENT 'ชื่อไฟล์' , ";
  $sql15 .= " `file_datestart` DATETIME default NULL COMMENT 'วันที่เอกสารเริ่มใช้งาน' , ";
  $sql15 .= " `file_dateend` DATETIME default NULL COMMENT 'วันที่เอกสารหมดอายุ' , ";
  $sql15 .= " `file_createby` varchar(100) NOT NULL COMMENT 'สร้างโดย' , ";
  $sql15 .= " `file_createtime` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
  $sql15 .= " `file_updateby` varchar(100) NOT NULL COMMENT 'แก้ไขโดย' , ";
  $sql15 .= " `file_updatetime` DATETIME NOT NULL COMMENT 'วันที่แก้ไข' , ";
  $sql15 .= " `file_status` tinyint(1) NOT NULL default '1' COMMENT 'สถานะเอกสาร 1.เอกสารใหม่ 0.เก่า' , ";
  $sql15 .= " INDEX(file_crd2id, file_docid) ";
  $sql15 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT='อัพไฟล์เอกสาร'";

  	$create_tb15 = mysql_query($sql15) or die(mysql_error());

    $sql16 = " CREATE TABLE IF NOT EXISTS `intrayon_credityc`.`tblgread` ( ";
    $sql16 .= " `gread_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT  'ลำดับ' , ";
    $sql16 .= " `gread_name` VARCHAR( 100 ) NOT NULL COMMENT  'ชื่ระดับเกรด' , ";
    $sql16 .= " `gread_createby` VARCHAR( 100 ) NOT NULL COMMENT  'สร้างโดย' , ";
    $sql16 .= " `gread_createtime` DATETIME NOT NULL COMMENT  'วันที่สร้าง' , ";
    $sql16 .= " `gread_updateby` VARCHAR( 100 ) NOT NULL COMMENT  'แก้ไขโดย' , ";
    $sql16 .= " `gread_updatetime` DATETIME NOT NULL COMMENT  'วันที่แก้ไข' , ";
    $sql16 .= " `gread_status` TINYINT( 1 ) NOT NULL COMMENT  'สถานะ' , ";
    $sql16 .= " INDEX(gread_id, gread_name) ";
    $sql16 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT='ตารางเกรดลูกค้า'";

    	$create_tb16 = mysql_query($sql16) or die(mysql_error());

      $sql17 = " CREATE TABLE IF NOT EXISTS `intrayon_credityc`.`tbldoctype` ( ";
      $sql17 .= " `dty_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT  'ID ประเภทเอกสาร', ";
      $sql17 .= " `dty_name` VARCHAR( 150 ) NOT NULL COMMENT  'ประเภทเอกสาร', ";
      $sql17 .= " `dty_createby` VARCHAR( 100 ) NOT NULL COMMENT  'สร้างโดย', ";
      $sql17 .= " `dty_createtime` DATETIME NOT NULL COMMENT  'วันที่สร้าง', ";
      $sql17 .= " `dty_updateby` VARCHAR( 100 ) NOT NULL COMMENT  'แก้ไขโดย', ";
      $sql17 .= " `dty_updatetime` DATETIME NOT NULL COMMENT  'วันที่แก้ไข', ";
      $sql17 .= " `dty_status` TINYINT( 1 ) NOT NULL DEFAULT  '1' COMMENT  'สถานะ' , ";
      $sql17 .= " INDEX(dty_id, dty_name) ";
      $sql17 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT='ตารางประเภทเอกสาร'";

        $create_tb17 = mysql_query($sql17) or die(mysql_error());

    $sql18 = " CREATE TABLE IF NOT EXISTS `intrayon_credityc`.`tblconsideration` ( ";
    $sql18 .= " `consi_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT  'ID เขตการพิจารณา', ";
    $sql18 .= " `consi_name` VARCHAR( 150 ) NOT NULL COMMENT  'ชื่อเขตการพิจารณา' , ";
    $sql18 .= " `consi_createby` VARCHAR( 100 ) NOT NULL COMMENT  'สร้างโดย' , ";
    $sql18 .= " `consi_createtime` DATETIME NOT NULL COMMENT  'วันที่สร้าง' , ";
    $sql18 .= " `consi_updateby` VARCHAR( 100 ) NOT NULL COMMENT  'แก้ไขโดย' , ";
    $sql18 .= " `consi_updatetime` DATETIME NOT NULL COMMENT  'วันที่แก้ไข' , ";
    $sql18 .= " `consi_status` TINYINT( 1 ) NOT NULL DEFAULT  '1' COMMENT  'สถานะ' , ";
    $sql18 .= " INDEX(consi_id, consi_name) ";
    $sql18 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT='ตารางเขตการพิจารณา'";

      $create_tb18 = mysql_query($sql18) or die(mysql_error());

mysql_close($c);
?>
