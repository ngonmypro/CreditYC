<?
	session_start();

	$userUploadId = intval($_GET['userUpload']);

	include "../../../Connections/connect_mysql.php";

	$sql = " SELECT * FROM tbluser where use_id={$userUploadId}";
	$result = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($result)==0){

	}else{
		$rsemp = mysql_fetch_array($result);
		$use_firstname_up = $rsemp['use_name'];
		$use_lastname_up = $rsemp['use_lname'];
    $tit = $rsemp['use_titid'];
    $sql2 = " SELECT * FROM tbltitle WHERE tit_id={$tit}";
   	$result2 = mysql_query($sql2) or die(mysql_error());
    $rsemp2 = mysql_fetch_array($result2);
    $use_begin_name_up = $rsemp2['tit_name'];
	}

	//$userupsig =  $use_begin_name_up & " " & $use_firstname_up & " " & $use_lastname_up;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
</head>
<body>
<div class="content">
	<div class="container-fluid">
<div class="row">
<form  id="frm">
	<div class="col-md-12">
    	<div id="fgup1" class="form-group">
    		<label>เลือกรูปภาพ ลายเซนต์ :<div style="color:#36F;"><? echo " ของ {$use_begin_name_up} {$use_firstname_up} {$use_lastname_up}"; ?></div></label><br>
    		<input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
            <small id="smtup1" class="form-text text-muted" style="color:#F30;"></small>
      </div>
    </div>
</form>
</div>
<div class="row">
	<p style="text-align:center;"><img id="image" src=""></p>
</div>

<iframe name="ifrm" id="ifrm" style="display:none;"></iframe>

</div>
</div>


</body>
</html>

<?
	mysql_close($c); //close connection
?>
