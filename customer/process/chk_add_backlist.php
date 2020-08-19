<?php session_start();
 date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
 include "../../Connections/connect_mysql.php";

 $cusid = $_POST['cusid'];

 $sql = " UPDATE tblcustomer ";
 $sql .= " SET cus_backlist = 'B' , ";
 $sql .= " cus_updateby = '".$_SESSION['use_user']."' , ";
 $sql .= " cus_updatetime = NOW() ";
 $sql .= " WHERE cus_id = '$cusid'";

 $result = mysql_query($sql) or die(mysql_error());

 echo "Y";

mysql_close($c); //close connection
 ?>
