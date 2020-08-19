<?php include "../../../Connections/connect_mysql.php";?>
  <option value="0"> # ตำบล # </option>
  <?php $sqldistrict = "SELECT * FROM district WHERE AMPHUR_ID = '".$_POST['pro']."' AND DISTRICT_NAME NOT LIKE '%*%'";
        $resultdistrict = mysql_query($sqldistrict) or die(mysql_error());
        while ($rowdistrict = mysql_fetch_array($resultdistrict)) { ?>
  <option value="<?php echo $rowdistrict['DISTRICT_ID']; ?>" ><?php echo $rowdistrict['DISTRICT_NAME']; ?></option>
  <?php } ?>
