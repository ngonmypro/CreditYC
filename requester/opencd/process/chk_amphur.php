<?php include "../../../Connections/connect_mysql.php";?>
  <option value="0"> # อำเภอ # </option>
  <?php $sqlamphur = "SELECT * FROM amphur WHERE PROVINCE_ID = '".$_POST['pro']."' AND AMPHUR_NAME NOT LIKE '%*%'";
        $resultamphur = mysql_query($sqlamphur) or die(mysql_error());
        while ($rowamphur = mysql_fetch_array($resultamphur)) { ?>
  <option value="<?php echo $rowamphur['AMPHUR_ID']; ?>" ><?php echo $rowamphur['AMPHUR_NAME']; ?></option>
  <?php } ?>
