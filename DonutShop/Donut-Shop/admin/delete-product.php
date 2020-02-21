<?php

	// 1. import the databse connection
	include("db-admin.php");

	// 	1. separate out your post & get request
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		//	2. write code for GET request
		echo "<h1> I GOT GET REQUEST! </h1>";

		$id = $_GET["id"];

		// load the product from the databsae
		$product = R::load("products", $id);

	}
	else if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// 	3. write code for POST request
		echo "<h1> I GOT POST REQUEST! </h1>";

		// get the data from the form
		$id = $_POST["product_id"];

		// get the row from the database
		$product = R::load("products", $id);
		// delete it
		R::trash( $product );

		// go back to previous page
		header("Location: show-products.php");
	}

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
	  	<h1> Delete Product </h1>
		<h2> Are you sure you want to delete? </h2>

		<h3> Name: <?php echo $product["name"] ?> </h3>
		<h3> Description: <?php echo $product["product_desc"] ?> </h3>
		<h3> Price: <?php echo $product["price"] ?> </h3>

		<!-- form -->
		<!-- @TODO: Update your form action/method here -->
		<form action="delete-product.php" method="POST">
			<input
				name="product_id"
				value="<?php echo $id; ?>"
				hidden=true
			>

		  <!-- @TODO: Update the link  -->
		  <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
			Yes
		  </button>
		</form>

		<br>

		<a href="show-products.php" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
			No
		</a>
	  </div>
	</div>

</body>
</html>
