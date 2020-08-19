<?php session_start();
	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
	include "../../../Connections/connect_mysql.php";

	$reqid = $_POST['reqid'];
	$useid = $_POST['empid'];
	$apv = $_POST['apv'];
	$carelr = getreult($_POST['carel']);
	$carel = $_POST['carel'];
	$carelcomment = $_POST['carelcomment'];
	$user_login = $_SESSION['use_user'];

	//echo " {$reqid}, {$useid}, {$apv}, {$carelr}, {$carel}, {$carelcomment}, {$user_login}";
	//echo $data =  $reqid . ',' . $useid . ',' . $apv . ',' . $carelr . ',' . $carel . ',' . $carelcomment;

 $sql = " INSERT INTO tblapprove (	app_id, app_date, app_crd2id, app_useid, app_useappid, 	app_result, app_comment, app_monlimit, app_monday, app_proother, app_createby, app_createtime, app_updateby, app_updatetime, app_status  )";
  $sql .= " VALUES ( NULL, NOW(), {$reqid}, {$useid}, {$apv}, '{$carel}', '{$carelcomment}', NULL, NULL, NULL, '{$user_login}', NOW(), '{$user_login}', NOW(), 1)";
 

  $result = mysql_query($sql) or die(mysql_error());

      if ($apv == 4) {
		  
        $sqlu = " UPDATE `tblcreditopen2`";
        $sqlu .= " SET crd2_app1 = '{$carelr}' , ";
        $sqlu .= " crd2_updateby = '{$user_login}' , ";
        $sqlu .= " crd2_updatetime = NOW() ";
        $sqlu .= " WHERE  crd2_id = {$reqid} ;";

		$resultu = mysql_query($sqlu) or die(mysql_error());
		echo "Y1";
		
      }elseif ($apv == 5) {
		  
        $sqlu = " UPDATE `tblcreditopen2`";
        $sqlu .= " SET crd2_app2 = '{$carelr}' , ";
        $sqlu .= " crd2_updateby = '{$user_login}' , ";
        $sqlu .= " crd2_updatetime = NOW() ";
        $sqlu .= " WHERE  crd2_id = {$reqid} ;";

		$resultu = mysql_query($sqlu) or die(mysql_error());
		echo "Y2";
		
      }else {
        // code...
      }


function getreult($x){
	if($x=='ยังไม่ประเมิน'){
		$dr = '0';
	}elseif($x=='ผ่าน'){
		$dr = '1';
	}elseif($x=='ไม่ผ่าน'){
		$dr = '2';
	}
	$getreult=$dr;
	return $getreult;
}
	mysql_close($c);
?>
