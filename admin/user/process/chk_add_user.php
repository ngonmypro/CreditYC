<?php  session_start();
	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย

	include "../../../Connections/connect_mysql.php";



		$use_title_n = $_POST['use_title_n'];
		$use_firstname_n = $_POST['use_firstname_n'];
		$use_lastname_n = $_POST['use_lastname_n'];
		$use_bran_n = $_POST['use_bran_n'];
		$use_numcode_n = $_POST['use_numcode_n'];
		$use_username_n = $_POST['use_username_n'];
		$use_password_n = $_POST['use_password_n'];
		$use_typeuse_n = $_POST['use_typeuse_n'];
    	$use_approver_n = $_POST['use_approver_n'];

		$dataall = "". $use_title_n . "," . $use_firstname_n . "," . $use_lastname_n . "," . $use_bran_n . "," . $use_numcode_n . ",";
		$dataall = $dataall . $use_username_n . "," . $use_password_n . "," . $use_typeuse_n . "," . $use_approver_n;
    //echo "{$use_numcode_n}";
	//echo $dataall;
		//ค้นหาประเภทผุ้อนุมัติที่ถูกต้อง
		$sql_tap = " select * from tbltypeapprove where tapp_id ={$use_approver_n} ";
		$result_tap = mysql_query($sql_tap) or die(mysql_error());
		$record_tap = mysql_fetch_array($result_tap);
			$tapp_status_tap = $record_tap['tapp_status'];

		//--- insert user ---
		$sql_s = "SELECT * FROM tbluser where use_user='{$use_username_n}' or use_code='{$use_numcode_n}' and use_status=1 ";
		$result_s = mysql_query($sql_s) or die(mysql_error());
		if (mysql_num_rows($result_s)==0){ //ถ้ายังไม่มี admin ในระบบ
			$sql = " INSERT INTO `db_credit_yc`.`tbluser` ( ";
      $sql .= " `use_id` , ";
      $sql .= " `use_code` , ";
      $sql .= " `use_titid` , ";
      $sql .= " `use_name` , ";
      $sql .= " `use_lname` , ";
      $sql .= " `use_user` , ";
      $sql .= " `use_pass` , ";
      $sql .= " `use_branid` , ";
      $sql .= " `use_comid` , ";
      $sql .= " `use_tuseid` , ";
      $sql .= " `use_appid` ,  ";
      $sql .= " `use_signature` ,  ";
      $sql .= " `use_createby` ,  ";
      $sql .= " `ues_createtime` ,  ";
      $sql .= " `use_updateby` ,  ";
      $sql .= " `use_updatetime`   ";
			$sql .= " ) ";
			$sql .= " VALUES ( ";
			$sql .= " NULL ,  '{$use_numcode_n}', '{$use_title_n}', '{$use_firstname_n}', '{$use_lastname_n}', '{$use_username_n}', '".base64_encode($use_password_n)."', '{$use_bran_n}', NULL, '{$use_typeuse_n}', '{$tapp_status_tap}', NULL, '{$_SESSION['use_user']}' , NOW(),'{$_SESSION['use_user']}', NOW() ";
			$sql .= " ); ";
			$result = mysql_query($sql) or die(mysql_error());

			$data = 0; //result success

		}else{

			$data = 1; //result not success

    }

		//echo $data; // send result return ajax


	mysql_close($c);

?>
