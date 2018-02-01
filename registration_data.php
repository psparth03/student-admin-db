<?php 
include './db.php';
if (isset($_POST["submit"]))
{
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $email = $_POST["email"];
  $dob    = $_POST["dob"];
  $mobile_no = $_POST["mobile_no"];
  $Username = $_POST["uname"];
  $Password = md5($_POST["pwd"]);
}
else
{
  $fname =  "";
  $lname = "";
  $email = "";
  $dob = "";
  $mobile_no = "";
  $Username = "";
  $Password = "";
}
if($email == "" || empty($email) || is_null($email))
{
	echo "Data is empty";
	exit;	
}

else if(strlen($fname)<5)
{
	echo "first name mst be > 5 characters";
}
else
{
	$sql=("INSERT INTO Registration_Form
		(First_Name,Last_Name,Date_Of_Birth,Mobile_No,Email_ID,User_Name,Password) VALUES('{$fname}','{$lname}','{$dob}','{$mobile_no}','{$email}','{$Username}','{$Password}')");
	$query = mysqli_query($conn, $sql);
	header("Location: Registration_Form.php");
}
?>