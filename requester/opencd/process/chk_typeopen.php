<?php include "../../../Connections/connect_mysql.php";
        $sqlopen = 'SELECT * FROM tbltypeopen WHERE open_id = "'.$_POST['pro'].'"';
        $resultopen = mysql_query($sqlopen) or die(mysql_error());
        while ($rowopen = mysql_fetch_array($resultopen)) {
        $openid = $rowopen['open_id'];
          if ($openid == 6){
            echo 1;
          }else {
            echo 0;
          }
} ?>
