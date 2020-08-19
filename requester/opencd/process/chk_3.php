<?php include "../../../Connections/connect_mysql.php";
        $sqlidcard3 = 'SELECT * FROM tblcustomer WHERE cus_idcard3 = "'.$_POST['pro'].'"';
        $resultidcard3 = mysql_query($sqlidcard3) or die(mysql_error());
        while ($rowidcard3 = mysql_fetch_array($resultidcard3)) {
        $idcard3id = $rowidcard3['cus_idcard3'];
          if ($idcard3id != ''){
            echo 1;
          }else {
            echo 0;
          }
} ?>
