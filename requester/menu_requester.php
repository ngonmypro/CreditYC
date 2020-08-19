<?php  session_start();
  include "../Connections/connect_mysql.php";
  mysql_query("set names utf8");
  $usernameth = $_SESSION['use_name'];
  $userlnameth = $_SESSION['use_lname'];
      if ($_SESSION['use_tuseid'] == '3') {
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>
<!--
	<ul class="nav navbar-nav">
    	<li class="active"><a href="#"><i class="glyphicon glyphicon-home"></i> Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
    </ul>
    -->
    <ul class="nav navbar-nav navbar-right">
    	<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="ti-user"></i> <?=$usernameth?> <?=$userlnameth?><span class="caret"></span></a>
         	<ul class="dropdown-menu">
         		<li style="text-align:right;"><a href="javascript:logout();"><i class="glyphicon glyphicon-log-out"></i> LogOut</a></li>
         	</ul>
        </li>
    </ul>
</body>
</html>
<?php } ?>
