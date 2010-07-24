<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
<head>
<title>Register</title>
<link rel="stylesheet" type="text/css" href="main.css" />
</style>
</head>
<body>
<!--<body bgcolor="#505050">!-->
<body bgcolor="#CCCCCC">

<div id="wrap">


<div id="skip">
<a href="#registermaincontent">Skip to Main Content</a>
</div>


<ul id="navigation">
	<li><button class="one"   type="button"  onclick="window.location='download.html'">Find Software</button></li>
	<li><button class="two"   type="button" onclick="window.location=''">Search Project</button></li>
	<li><button class="three" type="button" onclick="window.location=''">Suggest Project</button></li>
	<li><button class="five"  type="button" onclick="window.location='contribute.html'">Contribute</button></li>
	<li><button class="four"  type="button" onclick="window.location=''">More Information</button></li>
	
</ul>

<div id="title">
	<center><br>Congratulations! You have successfully activated your account.<br><br>
	<a href="index.html"> Go to main page</a></center>
</div>
</body>
</html>

<?php

$servername = 'oniddb.cws.oregonstate.edu';
$username   = 'sharifpa-db';
$password	= 'mnsQcoylLEHnTbpb';
$dbname		= 'sharifpa-db';

$con	    = mysql_connect($servername,$username,$password)
	or die  ("Error connecting to database server");

	
mysql_select_db($dbname, $con)
	or die  ("Error selecting the database");
	
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

