<?php 
	session_start();

	$docid = $_GET['idfile'];
	$crd2id = $_GET['crd2idfile'];
	//$docname = $_GET['name'];
	
	//echo "{$docid},{$crd2id},{$docname}";

	include "../../../Connections/connect_mysql.php";
?>
<script type="text/javascript">
	$('#show_file').load('requester/opencd/data/show_file.php?docid=<?=$docid?>&crd2id=<?=$crd2id?>');
</script>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
</head>
<body>
<div class="content">
	<div class="container-fluid">
		<?php if ($_SESSION['use_appid'] == 1  || $_SESSION['use_appid'] == 5) {?>
<div class="row">
<form>
	<div class="col-md-12">
    	<div id="fgup1" class="form-group">
        <form class="form-inline">
      		<?
				//ค้นหาชื่อเอกสาร
				$sql_sql_docname = " select * from tbldocument where doc_id={$docid} ";
				$result_sql_docname = mysql_query($sql_sql_docname) or die(mysql_error());
				$record_sql_docname=mysql_fetch_array($result_sql_docname);
					$docname = $record_sql_docname['doc_name'];
			?>  	
    		<label>เลือกไฟล์เอกสาร :<b style="color:#36F;"><?=$docname?></b></label>
      </form>
      <form id="frm" class="form-inline">
    		<input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
          <small id="smtup1" class="form-text text-muted" style="color:#F30;"></small>
          <button type="button"  id="Uploadfilebtn" class="btn btn-info form-control" onClick="upattf('<?=$docid?>','<?=$crd2id?>');"><i class='ti-upload'></i> Upload File</button>
      </form>
        </div>
    </div>
</form>
</div><hr>
<?php } ?>

<div id="show_file"></div>

</div>
</div>


</body>
</html>

<?
	mysql_close($c); //close connection
?>
