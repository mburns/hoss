<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
<head>
<title>Suggest Project</title>
<link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
<body class="section3">



<div id="wrap">

<div id="skip">
<a href="#maincontent">Skip to Main Content</a>
</div>

<!--top of page navigation!-->
<ul id="navigation">
	<li><button class="one"   type="button"  onclick="window.location='download.html'">Find Software</button></li>
	<li><button class="two"   type="button" onclick="window.location='searchproject.html'">Search Projects</button></li>
	<li><button class="three" type="button" onclick="window.location='suggestproject.html'">Suggest Project</button></li>
	<li><button class="five"  type="button" onclick="window.location='contribute.html'">Contribute</button></li>
	<li><button class="four"  type="button" onclick="window.location='moreinfo.html'">More Information</button></li>
</ul>




<div id="title1">
Suggest Project
<hr/>

<div id="pfont">
<p>Use the following form to suggest your project.</p>

<p>Please note, before submitting your project check the <a href="download.html"> Find software page </a> and <a href="searchproject.html">Search Project page </a>to make sure that your project
is not currently developed or submitted.</p>

<p> If you find your project on the Search Project and Find Software pages, please do not submit it again.
Instead, use the <a href="http://sourceforge.net/tracker/?atid=1408957&group_id=336263&func=browse">Feature Tracker </a>to request a feature for the existing projects. </p> 
</div>

<form action="" method="POST" id="suggestable">
<fieldset>
<Legend><b>Contact Information</b></legend>
<table><tr>
<td>Full name: </td><td><input name="fullname" type="text" size="50" value="<?php echo $_POST['fullname'] ?>"/></td></tr>
<tr><td>Email Address: </td><td><input name="email" type="text" size="50" value="<?php echo $_POST['email'] ?>"/></td></tr>
<tr><td>Organization: </td><td><input name="organization" type="text" size="50" value="<?php echo $_POST['organization'] ?>"/></td></tr>
<tr><td>Address: </td><td><input name="address" type="text" size="50" value="<?php echo $_POST['address'] ?>"/></td></tr>
<tr><td>City: </td><td><input name="city" type="text" size="50"/ value="<?php echo $_POST['city'] ?>" /></td></tr>
<tr><td>State: </td><td><input name="state" type="text" size="50" value="<?php echo $_POST['state'] ?>" /></td></tr>
<tr><td>Zip Code: </td><td><input name="zip" type="text" size="50" value="<?php echo $_POST['zip'] ?>" /></td></tr>
</table>
</fieldset>
<br>
<br>
<fieldset>
<legend><b>Project Information</b></legend>
<table>
<tr><td>Project Name: </td><td id="noborder"><input name="projectname" type="text" size="50" value="<?php echo $_POST['projectname'] ?>" /></td></tr>
<tr><td>Project Description: </td><td><textarea rows="12" cols="39" name="description" value="<?php echo $_POST['description'] ?>" /> </textarea></td></tr>
</fieldset>
</table>
<input type="submit" name="submit" value="Suggest Your Project" />
</form>

<!--end of title!-->
</div>

<?php

$servername = 'oniddb.cws.oregonstate.edu';
$username   = 'sharifpa-db';
$password	= 'mnsQcoylLEHnTbpb';
$dbname		= 'sharifpa-db';

$con	    = mysql_connect($servername,$username,$password)
	or die  ('Error connecting to database server');

	
mysql_select_db($dbname, $con)
	or die  ('Error selecting the database');


$fullname=$_POST['fullname'];
$email=$_POST['email'];
$organization=$_POST['organization'];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$zip=$_POST['zip'];
$projectname=$_POST['projectname'];
$projectdescription=$_POST['description'];


if(isset($_POST['submit'])){
	if (empty($fullname) && empty($email) && empty($organization) && empty($address) && empty($city) && empty($state) && empty($zip) && empty($projectname) && $projectdescription==0){
			?>
			<script type="text/javascript">
			alert("All the fields are required.");	
			</script>
			<?php
		}
	elseif (empty($fullname)){
			?>
			<script type="text/javascript">
			alert("full name field is required.");	
			</script>
			<?php
		}
	elseif (empty($email)){
			?>
			<script type="text/javascript">
			alert("email field is required.");	
			</script>
			<?php
		}
	elseif (empty($organization)){
			?>
			<script type="text/javascript">
			alert("organization field is required.");	
			</script>
			<?php
		}
	elseif (empty($address)){
			?>
			<script type="text/javascript">
			alert("address field is required.");	
			</script>
			<?php
		}
	elseif (empty($state)){
			?>
			<script type="text/javascript">
			alert("state field is required.");	
			</script>
			<?php
		}
	elseif (empty($city)){
			?>
			<script type="text/javascript">
			alert("city fields is required.");	
			</script>
			<?php
		}
	elseif (empty($zip)){
			?>
			<script type="text/javascript">
			alert("zip field is required.");	
			</script>
			<?php
		}
	elseif (empty($projectname)){
			?>
			<script type="text/javascript">
			alert("project name field is required.");	
			</script>
			<?php
		}
	elseif($projectdescription == 0){
		?>
		<script type="text/javascript">
		alert("project description filed is required.")
		</script>
		<?php
		}
		else{
		$query= "INSERT INTO Suggest_Project (fullname, email, organization, address, city, stateA, zip, projectName, projectDescription) VALUES ('$fullname', '$email', '$organization', '$address', '$city', '$state', '$zip', '$projectname', '$projectdescription' )";
		$result=mysql_query($query);
		if($result){
		?>
		<script type="text/javascript">
		alert("Thanks for suggesting your project.")
		</script>
		<?php
	}
}
}
?>

<!-- vertical navigation bar!--->
<ul id="hnavigation">
<li><button class="one1"   id="buttontextalign" type="button" onclick="window.location='download.html'"> Find Software</button>
<li><button class="two2"   id="buttontextalign" type="button" onclick="window.location='searchproject.html'">Search Projects</button></li>
<li><button class="three3" id="buttontextalign" type="button" onclick="window.location='suggestproject.html'">Suggest Project</button></li> </li>
</ul>
<!--end of wrap!-->
</div>

</body>
</html>