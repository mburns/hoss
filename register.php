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
	Registration
</div>

<div id="registermaincontent" > 

<form action="" method="post">
<fieldset id="size">
<legend id="center">Account Information</legend><br>
		<b>Username:<font color="red">*</font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="username" type="text" size="50"value="<?php echo $_POST['username'] ?>" /><br/></b><br>
		 <b>Password:<font color="red">*</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 <input type="password" name="password" size="50" /></b>
		 <br><br>
</fieldset>
<br/><br>


<fieldset>
<legend id="center"> Personal Information</legend><br>
		 <b>Full name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 <input name="fullname" type="text" size="50" value="<?php echo $_POST['fullname'] ?>"/><br/><br>
         <b>E-mail Address:<font color="red">*
		 </font><input type="text" name="email" size="50" value="<?php echo $_POST['email'] ?>"/><br><br>
</fieldset>
<input type="hidden" name="form_submitted" value="1"/> 
<br><input type="submit" name="submit" value="Create New Account" />
</form>
</div>

<!-- end of main Content Wrapper !-->
</div>
<?php

$servername = 'oniddb.cws.oregonstate.edu';
$username   = 'sharifpa-db';
$password	= 'mnsQcoylLEHnTbpb';
$dbname		= 'sharifpa-db';

$con	    = mysql_connect($servername,$username,$password)
	or die  ("Error connecting to database server");

	
mysql_select_db($dbname, $con)
	or die  ("Error selecting the database");


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
	
		$password=md5($pssword);
		##User is registering, insert data until we can activate it


		$sql="INSERT INTO users (username, password, email, fullname, activationkey, status) VALUES ('$username', '$password', '$email', '$fullname', '$activationKey', 'verify')";

		if (!mysql_query($sql)){
			die('Error: ' . mysql_error());
		}
		
			?>
			<script type="text/javascript">
			alert("An email has been sent to your email address with an activation key. Please check your mail to complete registration.");
			</script>
			<?php
		//echo "An email has been sent to $_POST[email] with an activation key. Please check your mail to complete registration.";

		##Send activation Email

		$to      = $_POST[email];

		$subject = " YOURWEBSITE.com Registration";

		$message = "Welcome to our website!\r\rYou, or someone using your email address, has completed registration at YOURWEBSITE.com. You can complete registration by clicking the following link:\rhttp://web.engr.orst.edu/~sharifpa/HOSS/verify.php?$activationKey
		\r\rIf this is an error, ignore this email and you will be removed from our mailing list.\r\rRegards,\ YOURWEBSITE.com Team";

		$headers = 'From: noreply@ YOURWEBSITE.com' . "\r\n" .

		'Reply-To: noreply@ YOURWEBSITE.com' . "\r\n" .

		'X-Mailer: PHP/' . phpversion();

		mail($to, $subject, $message, $headers);

	} 
}
/*
else {

##User isn't registering, check verify code and change activation code to null, status to activated on success

$queryString = $_SERVER['QUERY_STRING'];

$query = "SELECT * FROM users"; 

$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){

if ($queryString == $row["activationkey"]){
		?>
			<script type="text/javascript">
			alert("Congratulations! You have successfully activated your account.");	
			</script>
			<?php
       $sql="UPDATE users SET activationkey = '', status='Activated' WHERE (id = $row[id])";
	
       if (!mysql_query($sql)){
			die('Error: ' . mysql_error());
		}
			
	}

  }

}
*/
?>




</body>
</html>




