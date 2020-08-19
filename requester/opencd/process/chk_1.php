<?php include "../../../Connections/connect_mysql.php";
        $sqlidcard1 = 'SELECT * FROM tblcustomer WHERE cus_idcard1 = "'.$_POST['pro'].'"';
        $resultidcard1 = mysql_query($sqlidcard1) or die(mysql_error());
        while ($rowidcard1 = mysql_fetch_array($resultidcard1)) {
        $idcard1id = $rowidcard1['cus_idcard1'];
          if ($idcard1id != ''){
            echo 1;
          }else {
            echo 0;
          }
} ?>
