<?php include "../../../Connections/connect_mysql.php";
        $sqlidcard2 = 'SELECT * FROM tblcustomer WHERE cus_idcard2 = "'.$_POST['pro'].'"';
        $resultidcard2 = mysql_query($sqlidcard2) or die(mysql_error());
        while ($rowidcard2 = mysql_fetch_array($resultidcard2)) {
        $idcard2id = $rowidcard2['cus_idcard2'];
          if ($idcard2id != ''){
            echo 1;
          }else {
            echo 0;
          }
} ?>
