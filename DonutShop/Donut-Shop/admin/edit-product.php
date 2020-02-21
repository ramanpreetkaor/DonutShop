<?php

	// 1. import the databse connection
	include("db-admin.php");

	// SINGLE PAGE

	// 	1. separate out your post & get request
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		//	2. write code for GET request
		echo "<h1> I GOT GET REQUEST! </h1>";

		$id = $_GET["id"];

		// 3.  MAKE a SQL QUERY
		$product = R::load("products",$id);

	}
	else if ($_SERVER["REQUEST_METHOD"] == "POST") {

		// 	3. write code for POST request
		echo "<h1> I GOT POST REQUEST! </h1>";

		// get the data from the form
		$id = $_POST["product_id"];
		$name = $_POST["name"];
		$desc = $_POST["desc"];
		$price = $_POST["price"];

		// 3.  MAKE a SQL QUERY

		// get the item from the database
		$product = R::load("products",$id);

		if ($product["id"] == 0) {
			// could not find the product in the database,
			// so show an errors
			echo "This product is not in the database.";
			die();
		}

		// update it
		$product["name"] = $name;
		$product["product_desc"] = $desc;
		$product["price"] = $price;

		// save your changes
		R::store($product);

		// redirect person back to previous screen
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
	  	<h1> Edit Product </h1>
		<h2> Edit your product info below: </h2>

		<!-- form -->
		<!-- @TODO: Update your form action/method here -->
		<form action="edit-product.php" method="POST">
			<input name="product_id"
					value="<?php echo $id; ?>"
					hidden=true
			>


			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<!-- @TODO: update NAME and ID! -->
				<input 	name="name"
						class="mdl-textfield__input"
						type="text"
						id="sample3"
						value="<?php echo $product["name"]; ?>">


				<label class="mdl-textfield__label" for="sample3">Product Name</label>
			</div>
			<br>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<!-- @TODO: update NAME and ID! -->
				<input	name="desc"
						class="mdl-textfield__input"
						type="text"
						id="sample3"
						value="<?php echo $product["product_desc"]; ?>">

				<label class="mdl-textfield__label" for="sample3">Description</label>
			</div>
			<br>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<!-- @TODO: update NAME and ID! -->
				<input 	name="price"
						class="mdl-textfield__input"
						type="text"
						pattern="-?[0-9]*(\.[0-9]+)?"
						id="sample2"
						value="<?php echo $product["price"]; ?>"
						>
				<label class="mdl-textfield__label" for="sample2">Price</label>
				<span class="mdl-textfield__error">Input is not a number!</span>
			</div>
			<br>

		  <!-- @TODO: Update the link  -->
		  <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
			Update
		  </button>
		</form>

		<br>

		<a href="show-products.php" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
			< Go Back
		</a>
	  </div>
	</div>

</body>
</html>
