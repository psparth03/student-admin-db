<?php include './db.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration_Page</title>
</head>
<body background="rf.jpg">
	<br><h1 style="text-align: center;">Registration Page</h1><br>
	<form style="text-align:center;"  method="POST" action="registration_data.php">
	   <p>First Name: &nbsp; <input type="text" name="fname" align="center" ><br><br></p>
	   <p>Last Name: &nbsp;  <input type="text" name="lname" align="center" ><br><br></p>
	   <p>Email ID:   &nbsp; &nbsp;      <input type="text" name="email" align="center"><br><br>
       <p>Date of Birth: &nbsp; <input type="Date" name="dob"><br><br></p>
       <p>Mobile No: &nbsp;    <input type="text" name="mobile_no"><br><br></p>
       <p>Username:   &nbsp;     <input type="text" name="uname"><br><br></p>
       <p>Password:    &nbsp;    <input type="Password" name="pwd"><br><br></p>
       <input type="submit" name="submit" value="submit" id="submit"><br></p>
       <br>Already an user? <a href="Login_Page.php">Login</a>
   </form>
</body>
</html>