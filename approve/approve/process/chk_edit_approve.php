<?php session_start();
	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
	include "../../../Connections/connect_mysql.php";


  $reqid_ur = $_POST['reqid'];//
	$useid_ur = $_POST['empid'];//
	$apv_ur = $_POST['apv'];
	$appid_ur = $_POST['carlid'];
	$carelr_ur = getreult($_POST['carel']);
	$carel_ur = $_POST['carel'];
	$carelcomment_ur = $_POST['carelcomment'];
	$monlimit_ur= intval($_POST['apvamnt']);
	$limitday_ur = intval($_POST['apvday']);
	$other_ur = $_POST['apvother'];

	//echo "{$reqid_ur}, {$useid_ur}, {$apv_ur}, {$carlid_ur}, {$carelr_ur2} , {$carel_ur}, {$carelcomment_ur} ";


	$sql = " UPDATE tblapprove SET ";
	$sql .= " app_result = '$carel_ur' , ";
	$sql .= " app_comment = '$carelcomment_ur' , ";
  $sql .= " app_monlimit = '$monlimit_ur' , ";
  $sql .= " app_monday = '$limitday_ur' , ";
  $sql .= " app_proother = '$other_ur' , ";
	$sql .= " app_updateby = '".$_SESSION['use_user']."' , ";
	$sql .= " app_updatetime = NOW() ";
	$sql .= " WHERE app_crd2id = '$reqid_ur' and app_useid = '$useid_ur' and app_id = '$appid_ur' and app_useappid = '$apv_ur' ";
	$sql .= " limit 1 ; ";
	$result = mysql_query($sql) or die(mysql_error());

  if ($apv_ur == 6) {
    $sqlu = " UPDATE `tblcreditopen2`";
    $sqlu .= " SET crd2_app3 = '$carelr_ur' , ";
    $sqlu .= " crd2_updateby = '".$_SESSION['use_user']."' , ";
    $sqlu .= " crd2_updatetime = NOW() ";
    $sqlu .= " WHERE  crd2_id = '$reqid_ur' ;";

    $resultu = mysql_query($sqlu) or die(mysql_error());
    echo "Y1";
  }elseif ($apv_ur == 7) {
    $sqlu = " UPDATE `tblcreditopen2`";
    $sqlu .= " SET crd2_app4 = '$carelr_ur' , ";
    $sqlu .= " crd2_updateby = '".$_SESSION['use_user']."' , ";
    $sqlu .= " crd2_updatetime = NOW() , ";
    $sqlu .= " crd2_status = '$carelr_ur' ";
    $sqlu .= " WHERE  crd2_id = '$reqid_ur' ;";

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
	mysql_close($c); //close connection
?>
