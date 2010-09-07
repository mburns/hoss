<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['password'])){
	if(($_SESSION['username'] == 'Admin') && ($_SESSION['password'] == 'hfossadmin')){
?>
<html>
<head>
<title>HFOSS Enablement--Request project</title>
<link rel="stylesheet" type="text/css" href="main.css" />
</style>
</head>
<body bgcolor="#CCCCCC">

<div id="wrap1">

<?php
include("navigation.php");
?>

<div id="title">
	<!-- skip to main content!-->
	<a name="maincontent" id="maincontent"></a>
	 Request Project
</div>

<div id="requestprojectcontent">
<hr>
</br>
The followings are the suggested projects. To update or edit a project, click on edit.
<?php echo $login; ?>

<?php
include("mysqlconnection.php");

$query  ="select * from Suggest_Project";
$result = mysql_query($query);

echo "<br>";
echo "<table id=\"requestprojecttable\">";
echo "<tr><TH>Project Name</TH>";
echo "<TH>Project Description</TH>";
echo "<TH>Status</TH>";
echo "<TH>Edit</TH></tr>";

while ($row = mysql_fetch_array($result)){
	echo "<tr><td width=\"150px\">";
	echo $row['projectName'];
	echo "</td><td>";
	echo $row['projectDescription'];
	echo "</td><td>";
	echo $row['status'];
	echo "</td><td>";
	?> <a href="requestprojectupdate.php?SPID=<?php echo $row['SPID']; ?>">edit</a>
	
	<?php
	echo "</td></tr>";
	}
echo "</table>";

}
elseif(($_SESSION['username'] != 'Admin') && ($_SESSION['password'] != 'hfossadmin')){
echo "<font color=\"red\"><center><b>";
echo "You need to be logged in as adminstrator to access this page. <br>";
echo "<a href=\"login.php\"><image src=\"images\loginpagelink.png\"> </a>";
}
}



?>

</div>
</div>
</body>
</html>

