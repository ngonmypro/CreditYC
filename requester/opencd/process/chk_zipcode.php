<?php include "../../../Connections/connect_mysql.php";?>
  <option value="0"> # รหัสไปรษณีย์ # </option>
  <?php $sqlzipcode = 'SELECT * FROM zipcode WHERE DISTRICT_ID = "'.$_POST['pro'].'"';
        $resultzipcode = mysql_query($sqlzipcode) or die(mysql_error());
        while ($rowzipcode = mysql_fetch_array($resultzipcode)) { ?>
  <option value="<?php echo $rowzipcode['ZIPCODE_ID']; ?>" ><?php echo $rowzipcode['ZIPCODE']; ?></option>
  <?php } ?>
