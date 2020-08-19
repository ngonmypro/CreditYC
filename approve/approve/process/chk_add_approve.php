<?php session_start();
	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
	include "../../../Connections/connect_mysql.php";

	$reqid = $_POST['reqid'];
	$useid = $_POST['empid'];
	$apv = $_POST['apv'];
	$carelr = getreult($_POST['carel']);
	$carel = $_POST['carel'];
	$carelcomment = $_POST['carelcomment'];
  $monlimit = intval($_POST['apvamnt']);
  $limitday = intval($_POST['apvday']);
  $other = $_POST['apvother'];

	//echo $data =  $reqid . ',' . $useid . ',' . $apv . ',' . $carelr . ',' . $carel . ',' . $carelcomment . ',' . $monlimit  . ',' . $limitday . ',' . $other;

  $sql = " INSERT INTO `intrayon_credityc`.`tblapprove` ( ";
  $sql .= " `app_date` , ";
  $sql .= " `app_crd2id` , ";
  $sql .= " `app_useid` , ";
  $sql .= " `app_useappid` , ";
  $sql .= " `app_result` , ";
  $sql .= " `app_comment` , ";
  $sql .= " `app_monlimit` , ";
  $sql .= " `app_monday` , ";
  $sql .= " `app_proother` , ";
  $sql .= " `app_createby` , ";
  $sql .= " `app_createtime` , ";
  $sql .= " `app_updateby` , ";
  $sql .= " `app_updatetime`  ";
  $sql .= " ) ";
  $sql .= " VALUES ( ";
  $sql .= " NOW(),'$reqid','$useid','$apv','$carel','$carelcomment','$monlimit','$limitday','$other','".$_SESSION['use_user']."',NOW(),'".$_SESSION['use_user']."',NOW()";
  $sql .= " ); ";

  $result = mysql_query($sql) or die(mysql_error());

      if ($apv == 6) {
        $sqlu = " UPDATE `tblcreditopen2`";
        $sqlu .= " SET crd2_app3 = '$carelr' , ";
        $sqlu .= " crd2_updateby = '".$_SESSION['use_user']."' , ";
        $sqlu .= " crd2_updatetime = NOW() ";
        $sqlu .= " WHERE  crd2_id = '$reqid' ;";

				$resultu = mysql_query($sqlu) or die(mysql_error());
				echo "Y1";
      }elseif ($apv == 7) {
        $sqlu = " UPDATE `tblcreditopen2`";
        $sqlu .= " SET crd2_app4 = '$carelr' , ";
        $sqlu .= " crd2_updateby = '".$_SESSION['use_user']."' , ";
        $sqlu .= " crd2_updatetime = NOW() , ";
				$sqlu .= " crd2_status = '$carelr' ";
        $sqlu .= " WHERE  crd2_id = '$reqid' ;";

				$resultu = mysql_query($sqlu) or die(mysql_error());
				echo "Y2";
      }else {
        # code...
      }


function getreult($x){
	if($x=='ยังไม่ประเมิน'){
		$dr = '0';
	}elseif($x=='อนุมัติ'){
		$dr = '1';
	}elseif($x=='ไม่อนุมัติ'){
		$dr = '2';
	}
	$getreult=$dr;
	return $getreult;
}
	mysql_close($c);
?>
