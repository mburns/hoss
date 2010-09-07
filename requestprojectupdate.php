<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['password'])){
	if(($_SESSION['username'] == 'Admin') && ($_SESSION['password'] == 'hfossadmin')){
?>

<html>
<head>
<title>HFOSS Request project Update</title>
<link rel="stylesheet" type="text/css" href="main.css" />
<script type='text/javascript'>

function formValidator(){
	// Make quick references to fields
	var projectName = document.getElementById('projectName');
	var projectDescription = document.getElementById('projectDescription');
	var status = document.getElementById('status');
	
	// Check each input in the order that it appears in the form!
	if(notEmpty(projectName, "Please enter project name")){
		if(notEmpty(projectDescription, "Please enter project description")){
			if(notEmpty(status, "Please enter status")){ 
				return true;
			}
		}
	}
	
	return false;
	
}

//function for checking empty fields 
function notEmpty(elem, helperMsg){
	if(elem.value.length == 0){
		alert(helperMsg);
		elem.focus(); // set the focus to this input
		return false;
	}
	return true;
}
</script>
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

<div id="title">
	<!-- skip to main content!-->
	<a name="maincontent" id="maincontent"></a>
	 Request Project Update
	
</div>

<div id="requestprojectcontent">
<hr>
<?php
include("mysqlconnection.php");
	
$SPID = $_GET['SPID'];

//get the values from the database and insert them in the form.
$sql="SELECT SPID, projectName, projectDescription, status FROM Suggest_Project WHERE SPID='$SPID'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);

?>
<!--form to hod the values obtained from database !-->
<form action="requestprojectupdate_ac.php" method="post" onsubmit='return formValidator()'>
<table><tr><td>
Project Name:</td>
<td><input name="projectName" id="projectName" class="requestprojectupdatecellcolor" type="text"  value="<?php echo $row['projectName']; ?>"><br></td></tr>
<tr><td>Project Description:</td>
<td><textarea rows="12" cols="39" class="requestprojectupdatecellcolor" name="projectDescription" id="projectDescription"> <?php echo $row['projectDescription']; ?></textarea><br></td></tr>
<tr><td>Status:</td>
<td><input name="status" type="text" class="requestprojectupdatecellcolor" id="status" value="<?php echo $row['status']; ?>" size="15"></td></tr>
<input name="id" type="hidden" id="id" value="<?php echo $row['SPID']; ?>">
<tr><td></td><td><!--<input type="submit" name="Submit" value="Submit">!-->
<input type="image" src="buttons/submitbutton.png" value="submit" name="submit" id="submit" style="float:right;">
</td></tr>
</form>
</table>
<?php
}elseif(($_SESSION['username'] != 'Admin') && ($_SESSION['password'] != 'hfossadmin')){
echo "<font color=\"red\"><center><b>";
echo "You need to be logged in as adminstrator to access this page. <br>";
echo "<a href=\"login.php\"><image src=\"loginpagelink\"> </a>";

}
}
?>


