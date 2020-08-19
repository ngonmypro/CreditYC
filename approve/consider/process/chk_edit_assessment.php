<?php session_start();
	date_default_timezone_set('Asia/Bangkok');
	include "../../../Connections/connect_mysql.php";

	$score1 = $_POST['score1'];
	$score2 = $_POST['score2'];
	$score3 = $_POST['score3'];
	$score4 = $_POST['score4'];
	$score5 = $_POST['score5'];
	$score6 = $_POST['score6'];
	$score7 = $_POST['score7'];
	$score8 = $_POST['score8'];
	$score9 = $_POST['score9'];
	$score10 = $_POST['score10'];
	$scoret1 = $_POST['scoret1'];
	$scoret2 = $_POST['scoret2'];
	$scoret3 = $_POST['scoret3'];
	$scoret4 = $_POST['scoret4'];
	$ratcom = $_POST['ratcom'];
	$reqid = $_POST['reqid'];
	$useid = $_POST['empid'];
	$apv = $_POST['apv'];
	$cratid = $_POST['cratid'];

	$sql = " UPDATE tblassessment SET ";
  $sql .= " `asm_score1` = '$score1' , ";
  $sql .= " `asm_score2` = '$score2' , ";
  $sql .= " `asm_score3` = '$score3' , ";
  $sql .= " `asm_score4` = '$score4' , ";
  $sql .= " `asm_score5` = '$score5' , ";
  $sql .= " `asm_score6` = '$score6' , ";
  $sql .= " `asm_score7` = '$score7' , ";
  $sql .= " `asm_score8` = '$score8' , ";
  $sql .= " `asm_score9` = '$score9' , ";
  $sql .= " `asm_score10` = '$score10' , ";
  $sql .= " `asm_score_total1` = '$scoret1' , ";
  $sql .= " `asm_score_total2` = '$scoret2' , ";
  $sql .= " `asm_score_total3` = '$scoret3' , ";
  $sql .= " `asm_score_total4` = '$scoret4' , ";
  $sql .= " `asm_comment` = '$ratcom' , ";
  $sql .= " `asm_updateby` = '".$_SESSION['use_user']."' , ";
  $sql .= " `asm_updatetime` = NOW() ";
  $sql .= " WHERE  asm_crd2id = '$reqid' and asm_useid = '$useid' and asm_id = '$cratid' and asm_useappid = '$apv' ";

	$result = mysql_query($sql) or die(mysql_error());

  echo "Y";

	mysql_close($c);
?>
