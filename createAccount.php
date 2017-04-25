<?php
include('createadmin.php');
$message= $_SESSION['message'];
?>
<html>
<head>
    <title>MWMCVB</title>
    <meta name="robots" content="noindex, nofollow" />
       
<link rel="stylesheet" type="text/css" href="css/createadmin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		
		<script type="text/javascript">
</script>
</head> 
   
<body> 
<div id="main">
	 <!-- Create div second for Setup password Form-->
	 <div id="Create">
	   <h2>Create Account (Sign UP)</h2>
<hr/>
<span style="padding-left:120px;"><?php echo $message;?></span>
<form action="createadmin.php" method="post">
	
<input type="name" name="Fname" id="Fname" placeholder="First Name" required />&nbsp;&nbsp;&nbsp;&nbsp;
<input type="name" name="Lname" id="Lname" placeholder="Last Name" required/><br /><br />
<input type="username" name="username" id="username" placeholder="Enter your E-mail"required/><br />
<input type="password" name="password" id="password" placeholder="Enter the Password" required/><br/>
<select type="question" name="Security" id="Security"  required>
	 <option value="">Please Select the Security Question</option>
	  <option value="What is your mothers maiden name?">What is your mother's maiden name?</option>
	  <option value="In what city were you born?">In what city were you born?</option>
	  <option value= "What is your favorite movie?">What is your favorite movie?</option>
	  <option value="In what year was your father born?">In what year was your father born?</option>
	  <option value="What was the name of your primary school?">What was the name of your primary school?</option>
</select><br />
<input type="username" name="Answer" id="Answer" placeholder="Please answer here" required /> <br/><br/>
<input placeholder="Date of Birth Eg. MM/DD/YYYY" name="bday" class="bday"  onfocus="(this.type='date')" type="bday" id="bday"><br/><br/>

<input type="submit"  value="Create Account" name="submit"/><br />
		  <p id="two" >Alerady have an account ? <a href="index.php">Login Here</a></p>
		</form>  
	 </div>
	 
  </div> 
  
</body>
</html>