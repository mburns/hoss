<!-- This is the registration page. !-->

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


<div id="navigation">
	<button type="button" class="MenuButton" onclick="window.location='download.html'">Find Software</button>
	<button type="button" class="MenuButton">Search Project</button>
	<button type="button" class="MenuButton">Suggest Project</button>
	<button type="button" class="MenuButton">More Information</button>
	<button type="button" class="MenuButton">Contribute</button>
</div>

<div id="registermaincontent" > 

<form action="" method="post">
<fieldset>
<legend id="center">Account Information</legend><br>
		<b>Username:<font color="red">*</font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="username" type="text" size="50"/><br/></b><br>
		 <b>Password:<font color="red">*</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="password" size="50"/></b>
		 <br><br>
</fieldset>
<br/><br>


<fieldset>
<legend id="center"> Personal Information</legend><br>
		 <b>Fullname:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 <input name="fullname" type="text" size="50"/><br/><br>
         <b>E-mail Address:<font color="red">*</font><input type="text" name="email" size="50"/><br><br>
</fieldset>
<input type="hidden" name="form_submitted" value="1"/> 
<br><input type="submit" name="submit" value="Create New Account" />

</form>
</div>
<!-- end of main Content Wrapper !-->
</div>

</body>
</html>

<?php
$servername = 'oniddb.cws.oregonstate.edu';
$username   = 'sharifpa-db';
$password	= 'mnsQcoylLEHnTbpb';
$dbname		= 'sharifpa-db';

$con	    = mysql_connect($servername,$username,$password)
	or die  ("Error connecting to database server");

	
mysql_select_db($dbname, $con)
	or die  ("Error selecting the database");

	
$username=$_POST["username"];
$password=$_POST["password"];
$fullname=$_POST["fullname"];
$email=$_POST["email"];	


	
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
	
	//if user fills in all the required information, then insert data into database.
	elseif(!empty($username)&& !empty($password) && !empty($email)){
		
		$checkuser = mysql_query ("select Username from login where Username = '$username'");
		$username_exist = mysql_num_rows($checkuser);
		//if username already exists in database. 
		if ($username_exist > 0) {
		?>
		<script type="text/javascript">
		alert("The username has already been taken. Please enter a different username.");	
		</script>
		<?php		
		unset($username);
		exit();
		}
		
		$checkemail = mysql_query ("select Email from login where Email = '$email'");
		$email_exist = mysql_num_rows($checkemail);
		//if email already exists in database. 
		if ($email_exist > 0) {
			?>
			<script type="text/javascript">
			alert("The e-mail address already exists in the database. Please enter another e-mail address.");	
			</script>
			<?php
			unset($email);
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
		//insert the data into database table. 
		$query = "insert into login (Username, Password, Fullname, Email)
	    values('$username', '$password', '$fullname', '$email')";
		$result = mysql_query($query);
		
		if($result){
		?>
		<script type="text/javascript">
		alert("Your Account was created successfully.");	
		</script>
		<?php

		}
	}
		

	
}
?>

