<?php
include('login.php'); // Includes Login Script
$messagelogin=$_SESSION['messagelogin'];
$messageforgot=$_SESSION['messageforgot'];
if(isset($_SESSION['login_user'])){
header("Location: admin.php");
}
?>
<html>
<head>
    <title>MWMCVB</title>
    <meta name="robots" content="noindex, nofollow" />
       
<link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="js/showhide.js"></script>
	
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  <script src="https://ui.jquery.com/latest/ui/effects.core.js"></script>
  <script src="https://ui.jquery.com/latest/ui/effects.slide.js"></script>
 	<script src="js/setup.js"></script>
</head> 
   
<body> 
<div id="main">
<div id="login">
<h2>Admin Login</h2>
<hr/>
<span><?php echo $messagelogin; ?></span>
<form action="login.php" method="post">
<input type="text" name="username" id="username" placeholder="E-mail" required/><br /><br />
<input type="password" name="password" id="password" placeholder="Password" required/><br/>
<input type="submit" value=" Login " name="submit"/><br />

		  <p id="one">Forgot Password?<a href="#" id="setup" class="setup">Setup Here</a></p>

		</form>	
	 </div>
	 
	 <!-- Create div second for Setup password Form-->
	 <div id="Create">
	   <h2>Forgot Password</h2>
<hr/>
<span style="padding-left:120px;"><?php echo $messageforgot;?></span>
<form action="setuppassword.php" method="post">
<input type="username" name="username" id="username" placeholder="Enter your E-mail" onkeyup="showHint(this.value)" required/><br />
<input type="name" name="Fname" id="Fname" placeholder="First Name" required />&nbsp;&nbsp;&nbsp;&nbsp;
<input type="name" name="Lname" id="Lname" placeholder="Last Name" required/><br /><br />
<input type="username" name="Security" id="Security" placeholder="Your Security Question will post here" required/><br />
<input type="answer" name="Answer" id="Answer" placeholder="Please answer here" required /> <br/><br/>
<input placeholder="Date of Birth Eg. MM/DD/YYYY" name="bday" class="bday" type="bday" onfocus="(this.type='date')"  id="bday"><br/><br/>
<input type="password" name="newpassword" id="newpassword" placeholder="Enter the New Password" required/><br/>
<input type="submit" id="setuppassword" value=" Setup Password " name="submit"/><br />
		  <p id="two" >If you know the Password? <a href="#" id="signin" class="signin">Login Here</a></p>
		</form>  
	 </div>
	 
  </div> 
  
</body>
</html>