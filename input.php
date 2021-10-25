<?php
require_once('dbhelp.php');
$ip_name = $ip_platforms = $ip_price = $ip_saleprice = '';
if(!empty($_POST)){
	
	$ip_id ='';
	if(isset($_POST['name'])){
		$ip_name = $_POST['name'];
	}
	if(isset($_POST['platforms'])){
		$ip_platforms = $_POST['platforms'];
	}
	if(isset($_POST['price'])){
		$ip_price = $_POST['price'];
	}
	if(isset($_POST['saleprice'])){
		$ip_saleprice = $_POST['saleprice'];
	}
	if(isset($_POST['id'])){
		$ip_id = $_POST['id'];
	}
	
	$ip_name = str_replace('\'', '\\\'', $ip_name);
	$ip_platforms     = str_replace('\'', '\\\'', $ip_platforms);
	$ip_price  = str_replace('\'', '\\\'', $ip_price);
	$ip_saleprice= str_replace('\'', '\\\'', $ip_saleprice);
	$ip_id       = str_replace('\'', '\\\'', $ip_id);

	if ($ip_id != '') {
		//update
		$sql = "update product set name = '$ip_name',platforms = '$ip_platforms',price = '$ip_price',saleprice = '$ip_saleprice' where id = " .$ip_id;
	} else {
		//insert
		$sql ="insert into product(name, platforms, price, saleprice) value('$ip_name','$ip_platforms','$ip_price','$ip_saleprice')";
	}
	
	
	//round('price',2);
	execute($sql);
	header('Location:index.php');
	die();
}
$id = '';
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = 'select * from product where id = '.$id;
	$productlist = executeResult($sql);
	if ($productlist != null && count($productlist)>0) {
	 	$pro 			= $productlist[0];
	 	$ip_name 		= $pro['name'];
	 	$ip_platforms 	= $pro['platforms'];
	 	$ip_price 		= $pro['price'];
	 	$ip_saleprice 	= $pro['saleprice'];
	 }
	 else{
	 	$id ='';
	 }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Add Product</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="name">Name:</label>
					  <input type="number" name="id" value="<?=$id?>" style="display: none;">
					  <input required="true" type="text" class="form-control" id="name" name="name" value="<?=$ip_name?>" >
					</div>
					<div class="form-group">
					  <label for="platforms">Platforms:</label>
					  <input type="text" class="form-control" id="platforms" name="platforms" value="<?=$ip_platforms?>">
					</div>
					<div class="form-group">
					  <label for="price">Price:</label>
					  <input type="float" class="form-control" id="price" name="price" value="<?=$ip_price?>" >
					</div>
					<div class="form-group">
					  <label for="saleprice">Sale Price:</label>
					  <input type="float" class="form-control" id="saleprice" name="saleprice" value="<?=$ip_saleprice?>" >
					</div>
					<button class="btn btn-success">Add</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>