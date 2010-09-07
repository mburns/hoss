<?php
session_start();
//get the software name. Used to add the software name to the Software_review softwareName column.
$softwarename = $_SESSION['softwarename'];
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	header("Location: login.php");
		}
$username=$_SESSION['username'];
?>
<?php
include("mysqlconnection.php");

	
$reviewsummary=$_POST['reviewsummary'];
$myreview=$_POST['myreview'];
$pros=$_POST['pros'];
$cons=$_POST['cons'];
$recommended=$_POST['recommended'];

//get the id of logged in user and put it in the Software_Review table 
$query1 = "select id from users where username = '$username'";
$result1 = mysql_query($query1);
$row = mysql_fetch_array($result1);
$user_id = $row['id'];


if(isset($_POST['submit'])){
	
	$query ="insert into Software_Review (summary, review, pros, cons, recommended, datesubmitted, users_id, softwareName) values ('$reviewsummary', '$myreview', '$pros', '$cons', '$recommended', CURDATE(), '$user_id', '$softwarename')";
	
	$result=mysql_query($query);
		if($result){
		if(isset($_SESSION['url'])){ 
		$url = $_SESSION['url']; // holds url for last page visited.
		}
		header("Location: http://web.engr.orst.edu/$url"); // perform correct redirect.
		?>
		<script type="text/javascript">
		alert("Thanks for submitting your review.")
		</script>
		<?php
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>HFOSS Enablement--Review Submission</title>
<link rel="stylesheet" type="text/css" href="main.css" />
<script type='text/javascript'>

function formValidator(){
	// Make quick references to our fields
	var reviewsummary = document.getElementById('reviewsummary');
	var myreview = document.getElementById('myreview');
	var pros = document.getElementById('pros');
	var cons = document.getElementById('cons');
	var recommended = document.getElementById('recommended');
	
	
	// Check each input in the order that it appears in the form!
	if(notEmpty(reviewsummary, "Please enter review summary")){
		if(notEmpty(myreview, "Please enter your review")){
			if(notEmpty(pros, "Please enter your what like about this software")){
				if(notEmpty(cons, "Please enter what you don't like about this software")){
					if(madeSelection(recommended, "Please choose whether you recommend this software to friend")){
						return true;
					}
									
				}
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

function madeSelection(elem, helperMsg){
	if(elem.value == "Please Choose"){
		alert(helperMsg);
		elem.focus();
		return false;
	}else{
		return true;
	}
}

</script>
</style>
</head>
<body>
<body bgcolor="#CCCCCC">

<div id="wrap">

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

<div id="title4">
	<!-- skip to main content!-->
	<a name="maincontent" id="maincontent"></a>
<h2>Review Submission</h2>	
<form action="" method="post" onsubmit='return formValidator()'>
<table>
<tr><td>
Review Summary<font color="red">*</font>
<div id="downloadtablep">(Summarize your review in one line. Example: Great software for hearing impaired)</div>
</td></tr>
<tr><td>
<input type="text" size="51" name="reviewsummary" id="reviewsummary"></input>
</td></tr>
<tr><td>
<br>
My Review<font color="red">*</font>
<div id="downloadtablep">(Your detailed review.)</div>

</td></tr>
<tr><td>
<TEXTAREA rows="12" cols="40" name="myreview" id="myreview"></textarea>
</td></tr>
<tr><td>
<br>
What do you like about this software<font color="red">*</font>
</td></tr>
<tr><td>
<input type="text" size="51" name="pros" id="pros"></input>
</td></tr>
<tr><td>
<br>
What you don't like about this software<font color="red">*</font>
</td></tr>
<tr><td>
<input type="text" size="51" name="cons" id="cons"></input>
</td></tr>
<tr><td>
<br>
Do you recommend this software to your friend?<font color="red">*</font>
</td></tr>
<tr><td>
<SELECT class='txtbox' NAME="recommended" id="recommended"> 
<OPTION>Please Choose</OPTION>
<OPTION VALUE="yes">Yes</OPTION>
<OPTION VALUE="no">No</OPTION>
</SELECT>
</td></tr>
<tr><td>
<br/>
<input type="submit" value="Submit Your Review" name="submit">
</td></tr>
</table>
</form>

