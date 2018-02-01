<?php session_start();
$servername = "localhost";
$username = "root";
$password = "admin@123";
$dbname   = "Students_db";
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 
else
{
	//echo "connected successfully";
}
?>