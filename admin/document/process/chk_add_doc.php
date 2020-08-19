<?php  session_start();
	include "../../../Connections/connect_mysql.php";
  
$sql = 'INSERT INTO tbldocument (doc_name, doc_type, doc_createby, doc_createtime, doc_updateby, doc_updatetime) VALUES ("'.$_POST['doc_name'].'", "'.$_POST['doc_type'].'", "'.$_SESSION['use_user'].'", NOW(), "'.$_SESSION['use_user'].'", NOW())';
$result = mysql_query($sql) or die(mysql_error());

echo "Y";
mysql_close($c);

    ?>
