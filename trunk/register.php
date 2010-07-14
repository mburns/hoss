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

<form action="verify.php" method="post">
<fieldset id="size">
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
</div>

</body>
</html>




