<?php include './db.php';?>
<!DOCTYPE html>
<html lang="en">
<head> 
  <title>Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
    <h1 style="text-align: center;">Login Page</h1>   
    <div class="col-sm-6">
<form method = "POST" action="" style="text-align: center;">
    <br><br><br><label><h3>Student Login</h3></label>
    <br><br><br><p>Username:   &nbsp;     <input type="text" name="uname" required><br><br></p>
    <p>Password:     &nbsp;    <input type="password" name="pwd" required=""><br><br></p>
       &nbsp; &nbsp; &nbsp;<input type="submit" name="submit" value="submit"><br></p>
</form>
<?php
  if(isset($_POST['submit'])) 
  {
    $name=$_POST['uname'];
    $pwd=md5($_POST['pwd']);
    $query=mysqli_query($conn, "SELECT * FROM Registration_Form WHERE User_Name = '{$name}'");
    while($res=mysqli_fetch_assoc($query))
    {
      $db_password = $res['Password'];
      $db_username = $res['User_Name'];
    } 
    if($name === $db_username && $pwd === $db_password)
    {
        $_SESSION['pwd']=$pwd;
        $_SESSION['uname']=$name;
        header("Location:". 'Student_Data.php');
    }
    else
    {
      echo'You entered username or password is incorrect';
    }    
  }
?>
</div>
<div class="col-sm-6">
<form method="post" action="" style="text-align: center;">
  <br><br><br><label><h3>Admin Login</h3></label>
  <br><br><br><p>Username:   &nbsp;     <input type="text" name="uname" required><br><br></p>
  <p>Password:     &nbsp;    <input type="password" name="pwd" required=""><br><br></p>
  <label>ID</label><input type="text" name="ID"> &nbsp;&nbsp; &nbsp;<input type="submit" name="admin_submit" value="admin_submit"> 
</form>
<?php
  if(isset($_POST['admin_submit']))
  {
    $name=$_POST['uname'];
    $pwd=md5($_POST['pwd']);
    $id=$_POST['ID'];
    $query=mysqli_query($conn, "SELECT * FROM Registration_Form WHERE User_Name = '{$name}' ");
    while($res=mysqli_fetch_assoc($query))
    {
      $db_password = $res['Password'];
      $db_username = $res['User_Name'];
      $db_id=$res['ID'];
    } 
    if($name === $db_username && $pwd === $db_password && $id===$db_id)
    {
      $_SESSION['uname']=$name;
      $_SESSION['pwd']=$pwd;
      $_SESSION['ID']=$id;
      header("Location:". 'Admin_Data.php');
      exit;
    }
    else
    {
      echo'You entered username or password is incorrect';
    }  
  }
?>
</div>
</div>
</body>
</html>