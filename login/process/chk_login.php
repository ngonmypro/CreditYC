<?php	session_start();

	$userName = $_POST['userName'];
	$userPassword = $_POST['userPassword'];

	//echo "{$userName},{$userPassword}";

	include "../../Connections/connect_mysql.php";

	$sql = " SELECT *  FROM `tbluser` WHERE `use_user` LIKE '{$userName}' AND `use_pass` LIKE '".base64_encode($userPassword)."' AND use_status=1  ";
	//$sql = $sql . " AND `emp_statuslogin` = '0' ";
$result = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)==0){
	echo "N";
	//echo "username หรือ password ไม่ถูกต้อง";
}else{
	$member = mysql_fetch_array($result);

	$_SESSION['use_id'] = $member['use_id'];
	$_SESSION['use_user'] = $member['use_user'];
	$_SESSION['use_name'] = $member['use_name'];
	$_SESSION['use_lname'] = $member['use_lname'];
	$_SESSION['use_branid'] = $member['use_branid'];
	$_SESSION['use_tuseid'] = $member['use_tuseid'];
	$_SESSION['use_appid'] = $member['use_appid'];

	if($_SESSION['use_tuseid']=='1'){	//admin programmer
		echo "A1";
	}else	if($_SESSION['use_tuseid']=='2'){	//admin บช.ลน
		echo "A2";
	}else	if($_SESSION['use_tuseid']=='3'){	//พนง.ขายเครดิต
		echo "R1";
	}else{	// อนุมัติ
		if($_SESSION['use_appid']=='4'){	//อนุมัติระดับ 1 ผจก. ฝ่ายขายเครดิต
			echo "AP1";
		}else if($_SESSION['use_appid']=='5'){ //อนุมัติระดับ 2 ผจก. ฝ่าย บช.ลน
			echo "AP2";
		}else if($_SESSION['use_appid']=='6'){	//อนุมัติระดับ 3 ผอ.ฝ่ายการเงิน การลงทุน
			echo "AP3";
		}else if($_SESSION['use_appid']=='7'){	//อนุมัติระดับ 4 กรรมการผู้จัดการ
			echo "AP4";
		}else {
			echo "N";
		}
	}
}
	mysql_close($c); //close connection

?>
