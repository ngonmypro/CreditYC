<?php session_start();
	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย

	include "../../../Connections/connect_mysql.php";

	//รับค่าจาก ajax javascript
	$useriddel = $_POST["useriddel"];
	$usertyuse = $_POST["usertuse"];
	if($usertyuse!='ผู้ดูแลระบบ (PM)'){
		$sql_d = " DELETE FROM tbluser where use_id = {$useriddel} ";
		//$sql_d = " UPDATE tbluser SET use_status=0 WHERE use_id = {$useriddel} ";
		$result_d = mysql_query($sql_d) or die(mysql_error());
		$data =$result_d; //ถ้าประมวลผลสำเร็จ $result_d = 1
	}else{
		$data = 2; //เป็น Admin
	}

	echo $data;// how to return all the html in post.php? or return $data part?

mysql_close($c);
?>
