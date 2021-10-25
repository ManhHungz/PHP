<?php
require_once('dbhelp.php');
?>
<?php

	$sql = 'select * from product';
	$number_of_rows = 1;
	$result = mysqli_query($conn,$sql);
	$number_of_result = mysqli_num_rows($result);

	$number_of_pages = ceil($number_of_result/$number_of_rows);

	if(isset($_GET['page'])){
	    $page = 1;
	}
	else{
	    $page = $_GET['page'];
	}

	$currentpage = ($page - 1)*$number_of_rows;

	$sql = 'select * from product limit '.$currentpage.','.$number_of_rows;

	while ($row < mysqli_fetch_array($result)) {
	    echo $row['id'].''.$row['name'].''.$row['platforms'].''.$row['price'].''.$row['saleprice'].'</br>';
	}

?>