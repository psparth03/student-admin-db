<?php include './db.php';
include './function_resize.php';?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
		<input type='file' name='file'>
		<input type='submit' value='Upload' name='upload'>
	</form>
<?php
	$pid=$_GET['pid'];
	$query="SELECT * from IMAGE where id=$pid";
	$result=mysqli_query($conn,$query);
	while($row=mysqli_fetch_assoc($result))
	{
		$id = $row['id'];
		$img=$row['image'];
		//$content=$row['content'];
		echo "<img src='/displayimages/$img'>";
		echo $content;
	}
	if(isset($_POST['upload']))
	{	
		$img = $_FILES["file"]["name"];
		//$content=$_POST('content');
		$target_dir = "../Students/images/";
		$target_file = $target_dir . basename($_FILES["file"]["name"]);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$extensions_arr = array("jpg","jpeg","png","gif");
		if(in_array($imageFileType,$extensions_arr))
		{

			$query="UPDATE IMAGE SET image='{$img}' where id= $pid";
			$result=mysqli_query($conn,$query);

			move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$img);

			resize("../Students/images/".$img,"../Students/cropimages/".$img,100);
			resize("../Students/images/".$img,"../Students/displayimages/".$img,550);		
		}
	} 
	else
	{
		echo "error";
	}
	header("local:info.php");
?>
</body>
</html>