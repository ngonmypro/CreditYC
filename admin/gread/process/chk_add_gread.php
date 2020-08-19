<?php  session_start();
	include "../../../Connections/connect_mysql.php";

$sql = 'INSERT INTO tblgread (gread_name, gread_createby, gread_createtime, gread_updateby, gread_updatetime) VALUES ("'.$_POST['gread_name'].'", "'.$_SESSION['use_user'].'", NOW(), "'.$_SESSION['use_user'].'", NOW())';
$result = mysql_query($sql) or die(mysql_error());

echo "Y";
mysql_close($c);

    ?>
