<?php include './db.php';?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> 
</head>
<body>
	<table class="table table-striped table-bordered ">
        <thead>
            <th>ID</th>
            <th>First_Name</th>
            <th>Last_Name</th>
            <th>Date_Of_Birth</th>
            <th>Mobile_No</th>
            <th>Email_ID</th>
        </thead>
<tbody>
	<a href="products1.php">Products</a>

<?php
	if($_SESSION['uname'])
	{
	$uname=$_SESSION['uname'];
    $sql = "SELECT * FROM Registration_Form where User_Name='{$uname}'";
    $result = $conn->query($sql);
	if($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{
			$db_id    = $row['ID'];
 	        $db_fname = $row['First_Name'];
          	$db_lname = $row['Last_Name'];
            $db_dob   = $row['Date_Of_Birth'];
            $db_mobile= $row['Mobile_No'];
            $db_email = $row['Email_ID'];

            echo "<tr>";
            echo "<td>$db_id</td>";
            echo "<td>$db_fname</td>";
            echo "<td>$db_lname</td>";
            echo "<td>$db_dob</td>";
            echo "<td>$db_mobile</td>";
            echo "<td>$db_email</td>";
            echo "</tr>";
            echo "<a style='float:right;' href='Logout.php' class='btn btn-info'>Logout</a>";
            //echo "<a style='float:left;' href='Login_Page.php' class='btn btn-info'>Back</a>";
        }
        echo "<a style='float:left;' class='btn btn-info'>{$_SESSION['uname']}</a>";
    }
}
else
{
	header('location:Login_Page.php');
}
?>
</tbody>
</table>
</body>
</html>