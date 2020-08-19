<?php include "../../../Connections/connect_mysql.php";?>
<option value="0"># ประเภทผู้อนุมัติ #</option>
  <?php 
  	if($_POST['pro'] != 4){
  		$sqlapp = 'SELECT * FROM tbltypeapprove WHERE tapp_tuseid = "1" ';
	}else{
		$sqlapp = 'SELECT * FROM tbltypeapprove WHERE tapp_tuseid = "4" ';
	}
    $resultapp = mysql_query($sqlapp) or die(mysql_error());
    while ($rowapp = mysql_fetch_array($resultapp)) { ?>
  		<option value="<?php echo $rowapp['tapp_id']; ?>" >
		<?php echo $rowapp['tapp_name']; ?></option>
  <?php } ?>
