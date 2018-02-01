<?php include './db.php';?>
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
            <th></th>
        </thead>
<tbody>
<?php
		if($_SESSION['ID'])
		{
		$results_per_page = 5;
		$sql='SELECT * FROM Registration_Form';
		$result = mysqli_query($conn, $sql);
		$number_of_results = mysqli_num_rows($result);
		$number_of_pages = ceil($number_of_results/$results_per_page);
		if (!isset($_GET['page'])) 
		{
 			$page = 1;
		} 
		else 
		{
 			$page = $_GET['page'];
		}
		$this_page_first_result = ($page-1)*$results_per_page;
         $sql = "SELECT ID, First_Name, Last_Name FROM Registration_Form LIMIT ".$this_page_first_result.",".$results_per_page;
        $result = $conn->query($sql);
		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) 
			{
            	$db_id             = $row['ID'];
            	$db_fname     	   = $row['First_Name'];
            	$db_lname          = $row['Last_Name'];
            	echo "<tr>";
            	echo "<td>$db_id</td>";
            	echo "<td>$db_fname</td>";
            	echo "<td>$db_lname</td>";
            	echo "<td><a href='Admin_View.php?id=$db_id' class='btn btn-info'>View</a></td>";
            	echo "</tr>";
            }
            echo "<a style='float:left;' class='btn btn-info'>{$_SESSION['uname']}</a>";
          echo "<a style='float:right;' href='Logout.php' class='btn btn-info'>Logout</a>";
         
        }
          ?>
        </tbody>
        </table>
       <?php
        for ($page=1;$page<=$number_of_pages;$page++) 
        {
  			 
  			  echo '<a class="btn btn-info" href="Admin_Data.php?page=' . $page . '">' . $page . '</a>';
		}
		//echo "<a style='float:right;' href='Logout.php' class='btn btn-info'>Logout</a>";
        //echo "<a style='float:left;' href='Login_Page.php' class='btn btn-info'>Back</a>";
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