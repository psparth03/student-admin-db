<?php include './db.php';?>
<?php include './function_resize.php';?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title></title>
</head>
<body><!-- 
	<form action="edit.php">
		<input type="submit" name="edit" value="Edit">
	</form> -->
	
	
	<div class="col-sm-6">
	<?php
		if(isset($_GET['pid']))
		{
			$pid=$_GET['pid'];
			$query="SELECT * from IMAGE where id=$pid";
			$result=mysqli_query($conn,$query);
			while($row=mysqli_fetch_assoc($result))
			{
				$pid = $row['id'];
				$img=$row['image'];
				//echo "$pid";
				echo "<img src='/displayimages/$img'>";
			}

		}
		echo "<a href='edit.php?pid=$pid'>Edit</a>";
	?>
</div>
<div class="col-sm-6">
	<?php
		if(isset($_GET['pid']))
		{
			$pid=$_GET['pid'];
			$content=$_GET['content'];
			$query="SELECT content from IMAGE where id=$pid";
			$result=mysqli_query($conn,$query);
			while($row=mysqli_fetch_assoc($result))
			{
				$pid = $row['id'];
				$img=$row['image'];
				$content=$row['content'];
				//echo "$pid";
				echo "$content";
			}

		}
	?>
	





</div>
</body>

</html>