<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
session_start();
//holds the name of the software. Used to add it to the database.
$_SESSION['softwarename'] = Speak4Me;
$username=$_SESSION['username'];
//store the link visited into a session variable so that users gets redirected to this page after login
$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
?>
<html>
<head>
<title>HFOSS Enablement--Speak4Me</title>
<link rel="stylesheet" type="text/css" href="main.css" />
<script> 
//expand/collapse download guide
var myvar;
function menuinit() {
        document.getElementById('ma1').style.display = 'none';
		document.getElementById('pma1').src = 'plus.png';
}
function menuexpand (i) {
        menuinit();
        if (myvar == i) {
		document.getElementById('p' + i).src = 'plus.png';
		document.getElementById(i).style.display = 'none';
		myvar = '';
	}
        else {
		document.getElementById('p' + i).src = 'minus.png';
		document.getElementById(i).style.display = 'block';
		myvar = i;
	}
}
</script> 
</head>
<body class="" onload="menuinit();">


<!--page wrapper!-->
<div id="softwarepagewrapper">

<div id="logo">
<a href="index.php" title="Homepage"><image src="logo.jpg"></image></a>
</div>

<div id="skip">
<a href="#maincontent">Skip to Main Content</a>
</div>

<!--top of page navigation!-->
<ul id="navigation">
	<li><button class="one"   type="button" onclick="window.location='findsoftware.html'" title="Find Software">Find Software</button></li>
	<li><button class="two"   type="button" onclick="window.location='searchproject.php'" title="Search Projects">Search Projects</button></li>
	<li><button class="three" type="button" onclick="window.location='suggestproject.php'" title="Suggest a Project">Suggest a Project</button></li>
	<li><button class="five"  type="button" onclick="window.location='contribute.html'" title="Contribute">Contribute</button></li>
	<li><button class="four"  type="button" onclick="window.location='moreinfo.html'" title="More Information">More Information</button></li>
</ul>


<div id="title2">
<a name="maincontent" id="maincontent"></a>
<br>Speak4Me 
<hr color="green">
<a href=""><image src="download.png" style="border:none"></a>
<a href="">Download Now</a>
<br>
<div id="pfont" >
<a href="#" class="span" onclick="menuexpand('ma1');return false;">Download Guide <img id="pma1" src="" alt="" style="border:none"></a> 
<div id="ma1"> 
Step1.
<br>Step2.
<br>Step3.
</div> 
<!--end of pfont!-->
</div>

<br>
<br>
<p id="fontsize1">Software Description</p>
<hr color="green">
<small>
<p id="fontsize2">
Speak4Me is an application to help mentally and hearing impaired individuals with everyday life. 
The application allows the user to either type a custom message or select from a general set. 
The application then will speak the message out loud. The second phase of the application allows 
the recipient to either repeat the question once more or allow the recipient to speak into the phone 
and scribe the voice to text.
</p>
<br>
<p id="fontsize1">User Reviews</p>
<hr color="green">
<?php
if (isset($_SESSION['username']) && isset($_SESSION['password'])){
?>
<a href="reviewsubmission.php"><image src="buttons/writeReview.png"></image></a>
<?php
}else{
	echo "<div id='fontsize2'>";
	echo "Please login to write a review. <a href='login.php'>Login</a>";
	echo "</div>";
	}
?>

<br>
<?php
include("mysqlconnection.php");

	
$query = "select summary, review, pros, cons, recommended, users_id, id, username from Software_Review, users where softwareName='Speak4Me' AND users_id = id";
$result = mysql_query($query);


while ($row = mysql_fetch_array($result)){

	echo "<div id='fontsize'>";
	echo "<b>Submitted By: </b>";
	echo $row['username'];
	echo "<br>";
	echo "<b>Review Summary: </b>";
	echo $row['summary'];
	echo "<br>";
	echo "<b>Review: </b>";
	echo $row['review'];
	echo "<br>";
	echo "<b>What do you like about the software? </b>";
	echo $row['pros'];
	echo "<br>";
	echo "<b>what you don't like about the software? </b>";
	echo $row['cons'];
	echo "<br>";
	echo "<b>Do you recommend this softwar to friend? </b>";
	echo $row['recommended'];
	echo "</div>";
	echo "<hr>";
	}
?>

<!--End of title2!-->
</div>

<!-- quick specifications on the left side!-->
<div id="quickspec">
<div id="specificationtitle">Specifications</div>
<b>Supported Phone(s):</b> Android<hr>
<b>Category:</b> Hearing & mentally Impaired<hr>
<b>Date Added:</b><hr>
<b>File Size:</b>
<!--end of quickspec"!-->
</div>


<!--End of wrap!-->
</div>
</body>
</html>