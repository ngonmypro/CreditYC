<?php include "../../../Connections/connect_mysql.php";
        $sqlopen = 'SELECT * FROM tbltypeconstruct WHERE cont_id = "'.$_POST['pro'].'"';
        $resultopen = mysql_query($sqlopen) or die(mysql_error());
        while ($rowopen = mysql_fetch_array($resultopen)) {
        $openid = $rowopen['cont_id'];
          if ($openid == 8){
            echo 1;
          }else {
            echo 0;
          }
} ?>
