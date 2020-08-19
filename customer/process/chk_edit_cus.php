<?php session_start();
 date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
 include "../../Connections/connect_mysql.php";

 $idcus = $_POST['idcus'];
 $code = $_POST['cus_numcodeE'];
 $tit = $_POST['cus_titleE'];
 $name = $_POST['cus_firstnameE'];
 $lname = $_POST['cus_lastnameE'];
 $card = $_POST['cus_idcardE'];
 $phone = $_POST['cus_phoneE'];
 $gread = $_POST['cus_greadE'];

 $sql = " UPDATE tblcustomer ";
 $sql .= " SET cus_code = '$code' , ";
 $sql .= " cus_titid = '$tit' , ";
 $sql .= " cus_name = '$name' , ";
 $sql .= " cus_lname = '$lname' , ";
 $sql .= " cus_idcard = '$card' , ";
 $sql .= " cus_phoneno = '$phone' , ";
 $sql .= " cus_updateby = '".$_SESSION['use_user']."' , ";
 $sql .= " cus_updatetime = NOW() , ";
 $sql .= " cus_greadid = '$gread' ";
 $sql .= " WHERE cus_id = '$idcus'";

 $result = mysql_query($sql) or die(mysql_error());


 echo "Y";
 mysql_close($c); //close connection
 ?>
