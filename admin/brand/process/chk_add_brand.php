<?php  session_start();
	include "../../../Connections/connect_mysql.php";

$sql = 'INSERT INTO tblbrand (bran_name, bran_names, bran_createby, bran_createtime, bran_updateby, bran_updatetime, bran_status) VALUES ("'.$_POST['brand_name'].'", "'.$_POST['brand_names'].'", "'.$_SESSION['use_user'].'", NOW(), "'.$_SESSION['use_user'].'", NOW(),' . $_POST['cons1'] . ')';
$result = mysql_query($sql) or die(mysql_error());

echo "Y";
mysql_close($c);

    ?>
