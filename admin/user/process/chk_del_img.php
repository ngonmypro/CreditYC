<?php session_start();

 date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย

 include "../../../Connections/connect_mysql.php";

 $userID = $_GET["userID"];
 $data = 1;

 $sql1 = " SELECT * FROM tbluser WHERE use_id={$userID}";
	$result1 = mysql_query($sql1) or die(mysql_error());
	if(mysql_num_rows($result1)==0){
		//
	}else{
		$rsemp1 = mysql_fetch_array($result1);
		$emp_signature_sh = $rsemp1['use_signature'];
		$emp_firstname_sh = $rsemp1['use_name'];
		$emp_lastname_sh = $rsemp1['use_lname'];
    $tit = $rsemp1['use_titid'];
    $sql2 = " SELECT * FROM tbltitle WHERE tit_id={$tit}";
   	$result2 = mysql_query($sql2) or die(mysql_error());
    $rsemp2 = mysql_fetch_array($result2);
    $emp_begin_name_sh = $rsemp['tit_name'];
	}

	 unlink("../../../uploads/" . $emp_signature_sh);

 //--- update data in table employee_tb
    $sql = " UPDATE  `intrayon_credityc`.`tbluser` SET  ";
    $sql .= "`use_signature` =  '', ";
		$sql .= "`use_updateby` ='{$_SESSION['use_user']}', ";
		$sql .= "`use_updatetime` = NOW() ";
		$sql .= " WHERE `tbluser`.`use_id` ={$userID} LIMIT 1 ;";
		$result = mysql_query($sql) or die(mysql_error());
		if($result){
			if(mysql_affected_rows()>0){
				$data = 0;
			}else{
				$data = 1;
			}
		}else{
			$data = 1;
		}

		echo "{$data}";
?>

<?
	mysql_close($c); //close connection
?>
