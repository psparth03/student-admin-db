<?php include './db.php';?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="p1.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<h1 class="header">Products</h1>
	<!-- <div class="pa"></div> -->
	<div class="container"> <?php

// 		if(isset($_POST['upload']))
// 		{	 
// 			print_r($_POST);	
// 			 $name = $_FILES["file"]["name"];
			
// 			 $target_dir = "../Students/images/";
// 			 $target_file = $target_dir . basename($_FILES["file"]["name"]);
// 			 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// 			 $extensions_arr = array("jpg","jpeg","png","gif");
// 			 if(in_array($imageFileType,$extensions_arr) )
// 			 {
// 				  $query = "INSERT into IMAGE(image) values('".$name."')";
// 				  $result=mysqli_query($conn,$query);
// 				  move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
// 				  //echo "string";
// 	 		 }
// 	 		 // else
// 	 		 // {
// 	 		 // 	echo "error";
// 	 		 // }
 
		echo "<ul class='product-list'>";
		
		$query="SELECT * from IMAGE";
		$result=mysqli_query($conn,$query);
		while($row=mysqli_fetch_assoc($result))
		{
			$pid = $row['id'];
			$img=$row['image'];
			echo "<li>";
			echo "<a href='info.php?pid=$pid'><img src='/cropimages/$img'></a>";
			echo"<br>";
		}
		echo "</li>";
		echo "</ul>";
//} 
	?></div>
	<h6 class="footer">products</h6>
<form method="post" action="Upload.php" enctype="multipart/form-data" >
  <input type='file' name='file'>
  <input type='submit' value='Upload' name='upload'>
  <input type="text" name="content" placeholder="Description of ur img here">

</form>

</body>
</html>