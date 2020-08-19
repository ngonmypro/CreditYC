<?php session_start();
	$userID = intval($_GET['userID']);
	//$userlogin = $_SESSION['emp_begin_name'] . "" . $_SESSION['emp_firstname'] . "  " . $_SESSION['emp_lastname'];

	include "../../../Connections/connect_mysql.php";

	$sql = " SELECT * FROM tbluser WHERE use_id={$userID}";
	$result = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($result)==0){
		//
	}else{
		$rsemp = mysql_fetch_array($result);
		$use_signature_sh = $rsemp['use_signature'];
		$use_firstname_sh = $rsemp['use_name'];
		$use_lastname_sh = $rsemp['use_lname'];
    $tit = $rsemp['use_titid'];
    $sql2 = " SELECT * FROM tbltitle WHERE tit_id={$tit}";
   	$result2 = mysql_query($sql2) or die(mysql_error());
    $rsemp2 = mysql_fetch_array($result2);
    $use_begin_name_sh = $rsemp2['tit_name'];
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
</head>

<body>
<div class="content">
	<div class="container-fluid">
    	<div class="row">
        	<div class="col-md-12">
            	<div id="fgs1" class="form-group">
                	<label>รูปภาพลายเซนต์ : <font color="#3399FF"><? echo " {$use_begin_name_sh} {$use_firstname_sh} {$use_lastname_sh}"; ?></font></label>
                    <p style="text-align:center;"><img id="image_sig" src="uploads/<?=$use_signature_sh?>" width="200px" height="200px"></p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<?php
	mysql_close($c); //close connection
?>
