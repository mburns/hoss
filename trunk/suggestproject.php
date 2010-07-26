<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
<head>
<title>Suggest Project</title>
<link rel="stylesheet" type="text/css" href="main.css" />

<script type='text/javascript'>

function formValidator(){
	// Make quick references to our fields
	var fullname = document.getElementById('fullname');
	var email = document.getElementById('email');
	var organization = document.getElementById('organization');
	var address = document.getElementById('address');
	var city = document.getElementById('city');
	var state = document.getElementById('state');
	var zip = document.getElementById('zip');
	var projectname = document.getElementById('projectname');
	var description = document.getElementById('description');
	var checknumber = document.getElementById('checknumber');
	
	// Check each input in the order that it appears in the form!
	if(notEmpty(fullname, "Please enter your full name")){
		if(emailValidator(email, "Please enter a valid email address")){
			if(notEmpty(organization, "Please enter your organization")){
				if(notEmpty(address, "Please enter your address")){
					if(notEmpty(city, "Please enter city")){
						if(madeSelection(state, "Please Choose a State")){
							if(notEmpty(zip, "Please enter zip")){
								if(notEmpty(projectname, "Please enter project name")){
									if(notEmpty(description, "Please enter project description")){
										if(numberMatch(checknumber, "The number does not match. Please try again")){ 
											return true;
										}
									}
								}
							}
						}	
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

function textareamax(elem, helperMsg){
	if(elem.value.length > 10){
		alert(helperMsg);
		elem.focus();
		return false;
	}
	return true;
}

//function for state validation
function madeSelection(elem, helperMsg){
	if(elem.value == "Please Choose"){
		alert(helperMsg);
		elem.focus();
		return false;
	}else{
		return true;
	}
}


function numberMatch(elem, helperMsg){
	if (elem.value != "2896"){
		alert(helperMsg);
		elem.focus();
		return false;
	}else{
		return true;
	}
}

//email validation
function emailValidator(elem, helperMsg){
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if(elem.value.match(emailExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}
</script>
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

<form action="" method="POST" id="suggestable" onsubmit='return formValidator()'>
<fieldset>
<Legend><b>Contact Information</b></legend>
<table><tr>
<td>Full name: </td><td><input name="fullname" id="fullname" type="text" size="50" /></td></tr>
<tr><td>Email Address: </td><td><input name="email" id="email" type="text" size="50" /></td></tr>
<tr><td>Organization: </td><td><input name="organization" id="organization" type="text" size="50" /></td></tr>
<tr><td>Address: </td><td><input name="address" id="address" type="text" size="50" /></td></tr>
<tr><td>City: </td><td><input name="city" id="city" type="text" size="50" /></td></tr>
<tr><td>State: </td><td><SELECT class='txtbox' NAME="state" id="state"> 
<OPTION>Please Choose</OPTION>
<OPTION VALUE="AK">Alaska</OPTION>
<OPTION VALUE="AL">Alabama</OPTION>
<OPTION VALUE="AR">Arkansas</OPTION>
<OPTION VALUE="AZ">Arizona</OPTION>
<OPTION VALUE="CA">California</OPTION>
<OPTION VALUE="CO">Colorado</OPTION>
<OPTION VALUE="CT">Connecticut</OPTION>

<OPTION VALUE="DC">Washington D.C.</OPTION>
<OPTION VALUE="DE">Delaware</OPTION>
<OPTION VALUE="FL">Florida</OPTION>
<OPTION VALUE="GA">Georgia</OPTION>
<OPTION VALUE="HI">Hawaii</OPTION>
<OPTION VALUE="IA">Iowa</OPTION>
<OPTION VALUE="ID">Idaho</OPTION>
<OPTION VALUE="IL">Illinois</OPTION>
<OPTION VALUE="IN">Indiana</OPTION>

<OPTION VALUE="KS">Kansas</OPTION>
<OPTION VALUE="KY">Kentucky</OPTION>
<OPTION VALUE="LA">Louisiana</OPTION>
<OPTION VALUE="MA">Massachusetts</OPTION>
<OPTION VALUE="MD">Maryland</OPTION>
<OPTION VALUE="ME">Maine</OPTION>
<OPTION VALUE="MI">Michigan</OPTION>
<OPTION VALUE="MN">Minnesota</OPTION>
<OPTION VALUE="MO">Missouri</OPTION>

<OPTION VALUE="MS">Mississippi</OPTION>
<OPTION VALUE="MT">Montana</OPTION>
<OPTION VALUE="NC">North Carolina</OPTION>
<OPTION VALUE="ND">North Dakota</OPTION>
<OPTION VALUE="NE">Nebraska</OPTION>
<OPTION VALUE="NH">New Hampshire</OPTION>
<OPTION VALUE="NJ">New Jersey</OPTION>
<OPTION VALUE="NM">New Mexico</OPTION>
<OPTION VALUE="NV">Nevada</OPTION>

<OPTION VALUE="NY">New York</OPTION>
<OPTION VALUE="OH">Ohio</OPTION>
<OPTION VALUE="OK">Oklahoma</OPTION>
<OPTION VALUE="OR">Oregon</OPTION>
<OPTION VALUE="PA">Pennsylvania</OPTION>
<OPTION VALUE="RI">Rhode Island</OPTION>
<OPTION VALUE="SC">South Carolina</OPTION>
<OPTION VALUE="SD">South Dakota</OPTION>
<OPTION VALUE="TN">Tennessee</OPTION>

<OPTION VALUE="TX">Texas</OPTION>
<OPTION VALUE="UT">Utah</OPTION>
<OPTION VALUE="VT">Vermont</OPTION>
<OPTION VALUE="VA">Virginia</OPTION>
<OPTION VALUE="WA">Washington</OPTION>
<OPTION VALUE="WI">Wisconsin</OPTION>
<OPTION VALUE="WV">West Virginia</OPTION>
<OPTION VALUE="WY">Wyoming</OPTION>
<OPTION VALUE="--">-----------------------</OPTION>

<OPTION VALUE="AB">Alberta</OPTION>
<OPTION VALUE="BC">British Columbia</OPTION>
<OPTION VALUE="MB">Manitoba</OPTION>
<OPTION VALUE="NB">New Brunswick</OPTION>
<OPTION VALUE="NF">Newfoundland</OPTION>
<OPTION VALUE="NT">Northwest Territories</OPTION>
<OPTION VALUE="NS">Nova Scotia</OPTION>
<OPTION VALUE="ON">Ontario</OPTION>
<OPTION VALUE="PEI">Prince Edward Island</OPTION>

<OPTION VALUE="QC">Quebec</OPTION>
<OPTION VALUE="SK">Saskatchewan</OPTION>
<OPTION VALUE="YT">Yukon</OPTION>
<OPTION VALUE="--">-----------------------</OPTION>
<OPTION VALUE="Other">Other</OPTION>
</SELECT></td></tr>
<tr><td>Zip Code: </td><td><input name="zip" id="zip" type="text" size="50" /></td></tr>
</table>
</fieldset>
<br>
<fieldset>
<legend><b>Project Information</b></legend>
<table>
<tr><td>Project Name: </td><td id="noborder"><input name="projectname" id="projectname" type="text" size="50" /></td></tr>
<tr><td>Project Description: </td><td><textarea rows="12" cols="39" name="description" id="description" /> </textarea></td></tr>
</table>
</fieldset>
<br>
<fieldset>
Type This Number:&nbsp;<input name="checknumber" id="checknumber" type="text" size="15">
<image src="feedbackcheck.gif">
</fieldset>
<br><input type="submit" name="submit" value="Suggest Your Project" />


</form>

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
$checknumber=$_POST['checknumber'];

if(isset($_POST['submit'])){
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
?>

<!--end of title!-->
</div>



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