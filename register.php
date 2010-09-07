<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- This page is used for user registration. 
Author:Ahmad Sharifpour
!-->
<html>
<head>
<title>HFOSS Enablement--Registeration</title>
<link rel="stylesheet" type="text/css" href="main.css" />
</style>
</head>
<body bgcolor="#CCCCCC">
<!-- page wrapper !-->
<div id="wrap1">
<!-- HFOSS Enablement Logo !-->
<div id="logo">
<a href="index.php" title="Homepage"><image src="logo.jpg"></image></a>
</div>


<div id="skip">
<a href="#maincontent">Skip to Main Content</a>
</div>

<!-- horizontal menu !-->
<ul id="navigation">
	<li><button class="one"   type="button" onclick="window.location='findsoftware.html'" title="Find Software">Find Software</button></li>
	<li><button class="two"   type="button" onclick="window.location='searchproject.php'" title="Search Projects">Search Projects</button></li>
	<li><button class="three" type="button" onclick="window.location='suggestproject.php'" title="Suggest a Project">Suggest a Project</button></li>
	<li><button class="five"  type="button" onclick="window.location='contribute.html'" title="Contribute">Contribute</button></li>
	<li><button class="four"  type="button" onclick="window.location='moreinfo.html'" title="More Information">More Information</button></li>
</ul>

<!-- main content of the page !-->
<div id="registermaincontent" >
	<!-- skip to main content!-->
	<a name="maincontent" id="maincontent"></a>
	<h2>Registeration</h2>
	<hr>
	<font id="fontsize">The Fields marked with * are required.</font>
	<br><br>

<form action="" method="post">
<fieldset id="size">
<legend id="center">Account Information</legend><br>
		<b>Username:<font color="red">*</font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="username" type="text" size="50" /><br/></b><br>
		 <b>Password:<font color="red">*</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 <input type="password" name="password" size="50" /></b>
		 <br><br>
</fieldset>
<br/><br>


<fieldset>
<legend id="center"> Personal Information</legend><br>
		 <b>Full name:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 <input name="fullname" type="text" size="50" /><br>
		 <font id="fontsize">Specify your first and last name.</font><br>
         <b>E-mail Address:</b><font color="red">*
		 </font><input type="text" name="email" size="50" /><br>
		 <font id="fontsize">Enter a valid email address. Your account activation code will be send to this email address.<br>
</fieldset>
<input type="hidden" name="form_submitted" value="1"/> 
<br><!--<input type="submit" name="submit" value="Create New Account" />!-->
<input type="image" src="buttons/createacountbutton.png" value="submit" name="submit" id="submit" style="float:right;">
</form>
</div>

<!-- end of page wrapper !-->
</div>
<?php
include("mysqlconnection.php");



if ($_POST['form_submitted'] == '1') {

		$activationKey =  mt_rand() . mt_rand() . mt_rand();
		$username = mysql_real_escape_string($_POST[username]);
		$password = mysql_real_escape_string($_POST[password]);
		$email = mysql_real_escape_string($_POST[email]);
		$fullname = mysql_real_escape_string($_POST[fullname]);
		
		
	if (isset($_POST["submit"])){
	
	//if user does not enter any information
		if(empty($username) && empty($password) && empty($email)){
			?>
			<script type="text/javascript">
			alert("Username, Password, and Email Address fileds are required.");	
			</script>
			<?php
			}
		//if user does not enter passowrd and email
		elseif(empty($password) && empty($email)){
			?>
			<script type="text/javascript">
			alert("Password and Email Address fields are required.");
			</script>
			<?php
			}
			//if user does not enter username and email
		elseif(empty($username) && empty($email)){
			?>
			<script type="text/javascript">
			alert("Username and Email Address fields are required.");
			</script>
			<?php
			}
		//if user does not enter username and password
		elseif(empty($username) && empty($password)){
			?>
			<script type="text/javascript">
			alert("Username and Password fields are required.");
			</script>
			<?php
			}
		
		elseif(empty($username)){
			?>
			<script type="text/javascript">
			alert("Username is required.");	
			</script>
			<?php
			}
		elseif(empty($password)){
			?>
			<script type="text/javascript">
			alert("Password is required.");	
			</script>
			<?php
			}
		elseif(empty($email)){
			?>
			<script type="text/javascript">
			alert("Email Address is reuired.");	
			</script>
			<?php
			}
	
		$duplicate0= mysql_query("select username from users where username= '".$username."'");
		if(mysql_num_rows($duplicate0) > 0){
			?>
			<script type="text/javascript">
			alert("The USERNAME you have specified has already been taken. Please choose a different username.");
			</script>
			<?php
			exit();
			}
			
		$duplicate= mysql_query("select email from users where email= '".$email."'");
		if(mysql_num_rows($duplicate) > 0){
			?>
			<script type="text/javascript">
			alert("The EMAIL ADDRESS you have specified has already been taken. Please choose a different email adress.");
			</script>
			<?php
			exit();
			}
			
		if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){ 
			?>
			<script type="text/javascript">
			alert("Invalid Email Address.");
			</script>
			<?php
			unset($email);
			exit();
			}
	
		//$password=md5($pssword);
		
		// insert data into database

		$sql="INSERT INTO users (username, password, email, fullname, activationkey, status) VALUES ('$username', '$password', '$email', '$fullname', '$activationKey', 'verify')";

		if (!mysql_query($sql)){
			die('Error: ' . mysql_error());
		}
		
			?>
			<script type="text/javascript">
			alert("An email has been sent to your email address with an activation key. Please check your mail to complete registration.");
			</script>
			<?php

		//Send activation Email

		$to      = $_POST[email];

		$subject = " Hfossenablement.com Registration";

		$message = "Welcome to our website!\r\rYou, or someone using your email address, has completed registration at Hfossenablement.com. You can complete registration by clicking the following link:\rhttp://web.engr.orst.edu/~sharifpa/HOSS/verify.php?$activationKey
		\r\rIf this is an error, ignore this email and you will be removed from our mailing list.\r\rRegards,\ Hfossenablement.com Team";

		$headers = 'From: noreply@ Hfossenablement.com' . "\r\n" .

		'Reply-To: noreply@ hfossenablement.com' . "\r\n" .

		'X-Mailer: PHP/' . phpversion();
		mail($to, $subject, $message, $headers);

	} 
}
?>

</body>
</html>




