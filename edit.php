<?php include './db.php';
include './function_resize.php';?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<!-- this is to display an image -->
	<form  method="post" enctype="multipart/form-data">
		<input type='file' name='file'>
		<input type='submit' value='Upload' name='upload'>
	</form>
	<div class="col-sm-6">
	<?php
		$pid=$_GET['pid'];
		$query="SELECT image from IMAGE where id=$pid";
		$result=mysqli_query($conn,$query);

		while ($row = mysqli_fetch_assoc($result))
		{
		    $id = $row['id'];
			$img=$row['image'];
			echo "<img src='/displayimages/$img'>";
		}

		if (isset($_POST['upload']))
		{	
			$img = $_FILES["file"]["name"];
			$target_dir = "../Students/images/";
			$target_file = $target_dir . basename($_FILES["file"]["name"]);
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			$extensions_arr = array("jpg","jpeg","png","gif");

			if (in_array($imageFileType,$extensions_arr))
			{
				move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$img);

				$query="UPDATE IMAGE SET image='{$img}' where id= $pid";
				$result=mysqli_query($conn,$query);

				resize("../Students/images/".$img,"../Students/cropimages/".$img,100);
				resize("../Students/images/".$img,"../Students/displayimages/".$img,550);	
			} 

			else
			{
				echo "error";
				//header("Location: edit.php");
			}
		} 
		// header("Location: info.php");
	?>

	<!-- Submit button -->
	<form method="post">
	<input type="submit" name="Submit" value="Submit">
	</form>

	<!-- Content here -->
	<?php
	if (isset($_POST['Submit']))
	{
		header("Location:products1.php");
	}
	?>
</div>
<form action="" method="post" enctype="multipart/form-data">
		<input type='textbox' name='content' placeholder="edit your new content here">
		<input type='submit' value='edit' name='submit'>
	</form>
	<div class="col-sm-6">
<?php

	$pid = $_GET['pid'];
	$query = "SELECT content from IMAGE where id=$pid";
	$result = mysqli_query($conn,$query);

	while ($row=mysqli_fetch_assoc($result))
	{
		$id1 = $row['id'];
		$content=$row['content'];
		echo "<label> your content is : </label> &nbsp";
		echo $content;
	}

	if (isset($_POST['content']))
	{
		$content=$_POST['content'];
		$query="UPDATE IMAGE SET content='{$content}' where id= $pid";
		$result=mysqli_query($conn,$query);
		echo "$content";
		//header("Location: info.php?pid=".$pid);
	}

	else
	{
		echo "error";
		//header("Location: info.php?pid=".$pid);
	}
?> 
</div>
</body>
</html>