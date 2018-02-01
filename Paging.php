<?php include './db.php';?>
<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
<?php
	$results_per_page = 10;
	$sql='SELECT * FROM Registration_Form';
	$result = mysqli_query($con, $sql);
	$number_of_results = mysqli_num_rows($result);
// determine number of total pages available
$number_of_pages = ceil($number_of_results/$results_per_page);
// determine which page number visitor is currently on
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}
// determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page-1)*$results_per_page;
// retrieve selected results from database and display them on page
$sql='SELECT * FROM Registration_Form LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result)) {
  echo $row['ID'] . '<br>' . $row['First_Name'] . ' <br> ' . $row['Last_Name']. '<br>' . '-------------------------' . '<br>';
}
for ($page=1;$page<=$number_of_pages;$page++) {
  echo '<a href="PaginationMySQL.php?page=' . $page . '">' . $page . '</a> ';
}




?>
</body>
</html>