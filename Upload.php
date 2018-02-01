<?php

	include './db.php';
	include './function_resize.php';

	if(isset($_POST['upload']))
	{	
		$name = $_FILES["file"]["name"];
		$content=$_POST['content'];
		$target_dir = "../Students/images/";
		$target_file = $target_dir . basename($_FILES["file"]["name"]);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$extensions_arr = array("jpg","jpeg","png","gif");
		if(in_array($imageFileType,$extensions_arr) )
		{
			$query = "INSERT into IMAGE(image,content) values('".$name."', '".$content."')";
			$result=mysqli_query($conn,$query);
			move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
			resize("../Students/images/".$name,"../Students/cropimages/".$name,100);
			resize("../Students/images/".$name,"../Students/displayimages/".$name,550);
		}
	} 

	header("Location: products1.php");
?>