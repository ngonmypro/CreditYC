<?php include "../../../Connections/connect_mysql.php";
        $sqlopen = 'SELECT * FROM tbltypepayment WHERE pay_id = "'.$_POST['pro'].'"';
        $resultopen = mysql_query($sqlopen) or die(mysql_error());
        while ($rowopen = mysql_fetch_array($resultopen)) {
        $openid = $rowopen['pay_id'];
          if ($openid == 4){
            echo 1;
          }else {
            echo 0;
          }
} ?>
