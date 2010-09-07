<?php
session_start();
//if user is logged in as adminstrator, display the page
if (isset($_SESSION['username']) && isset($_SESSION['password'])){
	if(($_SESSION['username'] == 'Admin') && ($_SESSION['password'] == 'hfossadmin')){

?>

<html>
<head>
<title>HFOSS Enablement--Request Project Update</title>
<link rel="stylesheet" type="text/css" href="main.css" />
</style>
</head>
<body bgcolor="#CCCCCC">

<div id="wrap1">

<div id="logo">
<a href="index.php" title="Homepage"><image src="logo.jpg"></image></a>
</div>

<div id="skip">
<a href="#maincontent">Skip to Main Content</a>
</div>


<ul id="navigation">
	<li><button class="one"   type="button" onclick="window.location='findsoftware.html'" title="Find Software">Find Software</button></li>
	<li><button class="two"   type="button" onclick="window.location='searchproject.php'" title="Search Projects">Search Projects</button></li>
	<li><button class="three" type="button" onclick="window.location='suggestproject.php'" title="Suggest a Project">Suggest a Project</button></li>
	<li><button class="five"  type="button" onclick="window.location='contribute.html'" title="Contribute">Contribute</button></li>
	<li><button class="four"  type="button" onclick="window.location='moreinfo.html'" title="More Information">More Information</button></li>
	
</ul>


<div id="requestprojectcontent">
<!-- skip to main content!-->
<a name="maincontent" id="maincontent"></a>
<?php
include("mysqlconnection.php");


$projectName        = $_POST['projectName'];
$projectDescription = $_POST['projectDescription'];
$status             = $_POST['status'];
$id					= $_POST['id'];

//update the database 
$sql = "UPDATE Suggest_Project SET projectName='$projectName', projectDescription='$projectDescription', status='$status' WHERE SPID='$id'";
$result = mysql_query($sql);
header('Location: requestprojectupdate.php');
if($result){
	echo "<center>";
	echo "You have successfully updated the database.";
	echo "<br><br>";
	echo "<a href=\"requestproject.php\"> <image src=\"requestprojectlink.png\"</a>";
	echo "</center>";
	}
//if user is not logged in as administrator	
}elseif(($_SESSION['username'] != 'Admin') && ($_SESSION['password'] != 'hfossadmin')){
echo "<font color=\"red\"><center><b>";
echo "You need to be logged in as adminstrator to access this page. <br>";
echo "<a href=\"login.php\"><image src=\"loginpagelink\"> </a>";

}
}
