<?php  session_start();
include "../Connections/connect_mysql.php";
mysql_query("set names utf8");
$usernameth = $_SESSION['use_name'];
$userlnameth = $_SESSION['use_lname'];
    if ($_SESSION['use_tuseid'] == '1' || $_SESSION['use_tuseid'] == '2') {
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

    <ul class="nav navbar-nav navbar-right">
    	<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="ti-user"></i> <?=$usernameth?> <?=$userlnameth?> <span class="caret"></span></a>
         	<ul class="dropdown-menu">
         		<li style="text-align:right;"><a href="javascript:;" onClick="javascript:adminmain();"><i class="ti-user"></i> User </a></li>
            <li style="text-align:right;"><a href="javascript:;" onClick="javascript:customer();"><i class="glyphicon glyphicon-user"></i> Customer/Blacklist </a></li>
            <li style="text-align:right;"><a href="javascript:;" onClick="javascript:admindoc();"><i class="ti-files"></i> Manage Document </a></li>
            <li style="text-align:right;"><a href="javascript:;" onClick="javascript:brand();"><i class="fa fa-sitemap"></i> Manage Branch </a></li>
            <li style="text-align:right;"><a href="javascript:;" onClick="javascript:gread();"><i class="fas fa-sort-alpha-down"></i> Manage Grade </a></li>
            <?php if ($_SESSION['use_tuseid']=='1') { ?>
            <li style="text-align:right;"><a href="javascript:;" onClick="javascript:adminrequestermain();"><i class="fas fa-clipboard"></i> Requester</a></li>
            <li style="text-align:right;"><a href="javascript:;" onClick="javascript:adminconsidermain1();"><i class="fas fa-clipboard-check"></i> Approve1</a></li>
            <li style="text-align:right;"><a href="javascript:;" onClick="javascript:adminconsidermain2();"><i class="fas fa-clipboard-check"></i> Approve2</a></li>
            <li style="text-align:right;"><a href="javascript:;" onClick="javascript:adminapprovemain1();"><i class="fas fa-clipboard-check"></i> Approve3</a></li>
            <li style="text-align:right;"><a href="javascript:;" onClick="javascript:adminapprovemain2();"><i class="fas fa-clipboard-check"></i> Approve4</a></li>
            <?php } ?>
            <li style="text-align:right;"><a href="javascript:;" onClick="javascript:logout();"><i class="glyphicon glyphicon-log-out"></i> LogOut</a></li>
          </ul>
        </li>
    </ul>
</body>
</html>
<?php } ?>
