<?php include './db.php';?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="p1.css">
</head>
<body>
	<h1 class="header">Productsss</h1>
	
	<div class="pa">This div element has a top padding of 50px, a right padding of 30px, a bottom padding of 50px, and a left padding of 80px.</div>
	<input type="file" name="file_upload">
	<h6 class="footer">products</h6>
	

<form method="post" action="products.php" enctype='multipart/form-data'>
  <input type='file' name='file' />
  <input type='submit' value='Save name' name='but_upload'>

</form>
 <?php
		if(isset($_POST['file_upload']))
		{
			 $name = $_FILES['file']['name'];
			 echo $name;exit;
			 $target_dir = "Students/";
			 $target_file = $target_dir . basename($_FILES["file"]["name"]);
			 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			 $extensions_arr = array("jpg","jpeg","png","gif");
			 if( in_array($imageFileType,$extensions_arr) )
			 {
				  $query = "insert into image(name) values('".$name."')";
				  mysqli_query($conn,$query);
				  move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
	 		 }
 
		}
	?>
</body>
</html>