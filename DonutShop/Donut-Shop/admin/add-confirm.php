<?php

	// import the databse
	include("db-admin.php");

	// get the inputs from the form
	$name = $_POST["name"];
	$desc = $_POST["desc"];
	$price = $_POST["price"];


	$donut = R::dispense("products");
	$donut["name"] = $name;
	$donut["product_desc"] = $desc;
	$donut["price"] = $price;

	R::store($donut);

	// Note: R::store creates a NEW row in the table.
	// After it creates the row, it will RETURN the "id" of the new row.
	// If you want to do something with that id, you should use this code instead:
	// 								$id = R::store($donut);


?>
<!DOCTYPE html5>
<html>
<head>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
	<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	<style type="text/css">
		.mdl-grid {
			max-width:1024px;
			margin-top:40px;
		}

		h1 {
			font-size:36px;
		}
		h2 {
			font-size:30px;
		}
	</style>

</head>
<body>

	<div class="mdl-grid">
	  <div class="mdl-cell mdl-cell--12-col">
		<p> Put some messages here? </p>

		<a href="show-products.php" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
			< Go Back
		</a>
	  </div>
	</div>

</body>
</html>
