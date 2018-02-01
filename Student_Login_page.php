<?php
session_start();
if(isset($_POST['submit']))
{
 $name=$_POST['uname'];
 $pwd=md5($_POST['pwd']);

 echo $pwd . '<br>';

 //if($name!=''&&$pwd!='')
 //{
      $query=mysqli_query($conn, "SELECT * FROM Registration_Form WHERE User_Name = '{$name}' ");
   
    while($res=mysqli_fetch_assoc($query))
    {
      $db_password = $res['Password'];
      $db_username = $res['User_Name'];
    } 
   
   if($name === $db_username && $pwd === $db_password)
   {
    $_SESSION['uname']=$name;
    $_SESSION['pwd']=$pwd;
    header("Location:". 'Student_Data.php');
   }
   else
   {
    echo'You entered username or password is incorrect';
   }  
   

    
   
 }
 // else
 // {
 //  echo'Enter both username and password';
 // }

?>