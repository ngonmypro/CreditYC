<?php session_start();
	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
	include "../../../Connections/connect_mysql.php";
	$doc_name = $_POST['doc_name'];
	$doc_type = $_POST['doc_type'];
	$docid_c = $_POST["docid"];

  $sql = " UPDATE tbldocument ";
  $sql .= " SET doc_name = '{$doc_name}' , ";
	$sql .= " doc_type = '{$doc_type}' , ";
  $sql .= " doc_updateby = '".$_SESSION['use_user']."' , ";
  $sql .= " doc_updatetime = NOW() ";
  $sql .= " WHERE doc_id = '$docid_c'";
  $result = mysql_query($sql) or die(mysql_error());

  echo "Y";
   ?>
