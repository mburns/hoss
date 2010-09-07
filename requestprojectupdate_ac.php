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

<?php
include("navigation.php");
?>

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
	echo "<a href=\"requestproject.php\"> <image src=\"images/requestprojectlink.png\"</a>";
	echo "</center>";
	}
//if user is not logged in as administrator	
}elseif(($_SESSION['username'] != 'Admin') && ($_SESSION['password'] != 'hfossadmin')){
echo "<font color=\"red\"><center><b>";
echo "You need to be logged in as adminstrator to access this page. <br>";
echo "<a href=\"login.php\"><image src=\"loginpagelink\"> </a>";

}
}
