<?php session_start();
	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย

	include "../../../Connections/connect_mysql.php";

  $crd2 = $_POST['crd2iddel'];

  $sqlsh1 = "SELECT * FROM tblcreditopen2 WHERE crd2_id = '$crd2'";
  $resultsh1 = mysql_query($sqlsh1) or die(mysql_error());
  $row1=mysql_fetch_array($resultsh1);
    $crd1id = $row1['crd2_crd1id'];
    $cusid = $row1['crd2_cusid'];

		$sql_d1 = " DELETE FROM tblcustomer where cus_id = '$cusid'";
    $result_d1 = mysql_query($sql_d1) or die(mysql_error());

    $sql_d2 = " DELETE FROM tblcreditopen1 where crd1_id = '$crd1id'";
    $result_d2 = mysql_query($sql_d2) or die(mysql_error());

    $sql_d3 = " DELETE FROM tblcreditopen2 where crd2_id = '$crd2'";
    $result_d3 = mysql_query($sql_d3) or die(mysql_error());

	echo "Y";

mysql_close($c);
?>
