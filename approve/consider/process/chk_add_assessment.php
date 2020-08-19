<?php session_start();
	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
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



	//$tdata = $score1 . ',' . $score2 . ',' . $score3 . ',' . $score4 . ',' . $score5 . ',' . $score6 . ',' . $score7 . ',' . $score8 . ',' . $score9 . ',' . $score10 . ',' . $scoret1 . ',' . $scoret2 . ',' . $scoret3 . ',' . $scoret4 . ',' . $ratcom . ',' . $reqid . ',' . $empid . ',' .  $apv  ;

	//echo "{$tdata}";

	$sql = " INSERT INTO `intrayon_credityc`.`tblassessment` ( ";
	$sql .= " `asm_crd2id` , ";
	$sql .= " `asm_useid` , ";
	$sql .= " `asm_useappid` , ";
	$sql .= " `asm_score1` , ";
	$sql .= " `asm_score2` , ";
	$sql .= " `asm_score3` , ";
	$sql .= " `asm_score4` , ";
	$sql .= " `asm_score5` , ";
	$sql .= " `asm_score6` , ";
	$sql .= " `asm_score7` , ";
	$sql .= " `asm_score8` , ";
	$sql .= " `asm_score9` , ";
	$sql .= " `asm_score10` , ";
	$sql .= " `asm_score_total1` , ";
	$sql .= " `asm_score_total2` , ";
	$sql .= " `asm_score_total3` , ";
	$sql .= " `asm_score_total4` , ";
	$sql .= " `asm_monstart` , ";
	$sql .= " `asm_comment` , ";
	$sql .= " `asm_dateasm` , ";
	$sql .= " `asm_createby` , ";
	$sql .= " `asm_createtime` , ";
	$sql .= " `asm_updateby` , ";
	$sql .= " `asm_updatetime`  ";
	$sql .= " ) ";
  $sql .= " VALUES ( ";
  $sql .= " '$reqid','$useid','$apv','$score1','$score2','$score3','$score4','$score5','$score6','$score7','$score8','$score9','$score10',";
  $sql .= " '$scoret1','$scoret2','$scoret3','$scoret4',NULL,'$ratcom',NOW(),'".$_SESSION['use_user']."',NOW(),'".$_SESSION['use_user']."',NOW()";
  $sql .= " ); ";

	$result = mysql_query($sql) or die(mysql_error());

  /*if ($apv == 4) {
    $sqlu = " UPDATE `tblcreditopen2`";
    $sqlu .= " SET crd2_assesmentapp1 = '1' , ";
    $sqlu .= " crd2_updateby = '".$_SESSION['use_user']."' , ";
    $sqlu .= " crd2_updatetime = NOW() ";
    $sqlu .= " WHERE  crd2_id = '$reqid' ;";
  }else*/if ($apv == 5) {
    $sqlu = " UPDATE `tblcreditopen2`";
    $sqlu .= " SET crd2_assesmentapp = '1' , ";
    $sqlu .= " crd2_updateby = '".$_SESSION['use_user']."' , ";
    $sqlu .= " crd2_updatetime = NOW() ";
    $sqlu .= " WHERE  crd2_id = '$reqid' ;";
  }else {
    # code...
  }
  $resultu = mysql_query($sqlu) or die(mysql_error());

	echo "Y";

	mysql_close($c);
?>
