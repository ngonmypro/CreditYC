<?php session_start();
	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
	include "../../../Connections/connect_mysql.php";
	$branid_d = $_POST["branid"];

	$sql = " delete from tblbrand where bran_id = '$branid_d' ";
	$result = mysql_query($sql) or die(mysql_error());
	if($result){
		if(mysql_affected_rows()>0){
			$data = 0;
		}else{
			$data = 1;
		}
	}else{
		$data =1;
	}
	echo $data;

mysql_close($c);
?>
