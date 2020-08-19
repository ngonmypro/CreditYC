<?php  session_start();
	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย

	include "../../../Connections/connect_mysql.php";



		$use_title_e = $_POST['use_title_e'];
		$use_firstname_e = $_POST['use_firstname_e'];
		$use_lastname_e = $_POST['use_lastname_e'];
		$use_bran_e = $_POST['use_bran_e'];
		$use_numcode_e = $_POST['use_numcode_e'];
		$use_username_e = $_POST['use_username_e'];
		$use_password_e = base64_encode($_POST['use_password_e']);
		$use_typeuse_e = $_POST['use_typeuse_e'];
    $use_approver_e = $_POST['use_approver_e'];
    $usereditid = $_POST['usereditid'];

//	$data = 1;

//	echo $data;


	$sql = " UPDATE tbluser ";
	$sql .= " SET use_code =  '{$use_numcode_e}', ";
	$sql .= " use_titid = '{$use_title_e}', ";
	$sql .= " use_name =  '{$use_firstname_e}', ";
	$sql .= " use_lname = '{$use_lastname_e}', ";
	$sql .= " use_user = '{$use_username_e}', ";
	$sql .= " use_pass = '$use_password_e', ";
	$sql .= " use_branid = '{$use_bran_e}', ";
	$sql .= " use_tuseid = '{$use_typeuse_e}', ";
  $sql .= " use_appid = '{$use_approver_e}', ";
  //$sql .= " use_signature = '{}', ";
	$sql .= " use_updateby	= '{$_SESSION['use_user']}', ";
	$sql .= " use_updatetime = NOW() ";
	$sql .= " WHERE  use_id = {$usereditid} ;";
	//$sql .= " LIMIT 1 ; ";
	$result = mysql_query($sql) or die(mysql_error());
	if($result){
		$data =$result; //ถ้าประมวลผลสำเร็จ $result_d = 1
	}else{
		$data =0;
	}

	echo $data;

?>
<?php
	mysql_close($c);
?>
