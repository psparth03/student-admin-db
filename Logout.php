<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
session_start();
unset($_SESSION['username']);
session_destroy();

header("Location: Registration_Form.php");
exit;
?>
</body>
</html>