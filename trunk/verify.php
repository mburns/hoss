<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
<head>
<title>HFOSS Enablement--Verify</title>
<link rel="stylesheet" type="text/css" href="main.css" />
</style>
</head>
<body>
<body bgcolor="#CCCCCC">

<div id="wrap">

<?php
include("navigation.php");
?>


<div id="title">
	<!-- skip to main content!-->
	<a name="maincontent" id="maincontent"></a>
	<center><br>Congratulations! You have successfully activated your account.<br><br>
	<a href="index.php"><image src="images/mainpagebutton.png"></a></center>
	</div>
</body>
</html>

<?php
include("mysqlconnection.php");

	
##User isn't registering, check verify code and change activation code to null, status to activated on success

$queryString = $_SERVER['QUERY_STRING'];

$query = "SELECT * FROM users"; 

$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){

if ($queryString == $row["activationkey"]){

    $sql="UPDATE users SET activationkey = '', status='Activated' WHERE (id = $row[id])";
      if (!mysql_query($sql)){
			die('Error: ' . mysql_error());
		}
			
	}

  }

