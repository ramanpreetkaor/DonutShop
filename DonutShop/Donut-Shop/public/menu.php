<?php
	// LOGIC => getting all the products from the db
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpassword = "";
	$dbname = "store";

	$conn = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);

	$query = "SELECT * from products";

	$results = mysqli_query($conn, $query);

	print_r($results);
?>
<?php
	// UI BOBAGEM => importing the html for the header
	include("header.php");
?>
    <!-- BACKPACKS and BAGS -->
    <section class="section">
      <div class="container">
        <h1 class="title has-text-centered">Menu</h1>
        <h2 class="subtitle has-text-centered">
          A selection of awesome donuts!
        </h2>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <!-- @TODO:  put your products in here -->
				<?php

					// count how many rows you have
					// if row is a multiple of 3, then show a new column
					$rows = $results->num_rows;


					//2. stick that html into a  WHILE loop
					$count = 0;
					while( $product = mysqli_fetch_assoc($results) ) {

						if ($count % 3 == 0) {
							echo '<div class="columns">';
						}
						echo '<div class="column">';
							echo '<img src="'.$product["image"].'" class="product-image"> <br>';
							echo '<p>' . $product["name"] . '</p>';
							echo '<p>' . $product["product_desc"] . '</p>';
							echo '<p>$' . $product["price"] . '</p>';
							echo '<p style="margin-top:20px">';
						?>
							<button class="button is-info is-outlined addToCart"
											data-id="<?php echo $product["id"]?>"
											data-name="<?php echo $product["name"]?>"
											data-price="<?php echo $product["price"]?>">
								Add To Cart
							</button>
						<?php
							echo '</p>';
						echo '</div>';

						$count = $count + 1;

						if ($count %3 == 0) {
							echo '</div>'; // end columnS
						}
					}
				?>
      </div>
    </section>
		<script type="text/javascript">
			var cart = [];

			var buttons = document.getElementsByClassName("addToCart");
			for (var i=0; i < buttons.length; i++) {
				buttons[i].addEventListener("click", addToCart);
			}
			function addToCart() {
				console.log(this.dataset);

				// cart logic
				var id = this.dataset.id;

				var items = localStorage.getItem("products");

				if (items == null) {
					items = [];
					var dict = {
						"id":id,
						"quantity" : 1
					}
					items.push(dict);
					localStorage.setItem("products", JSON.stringify(items));

					return true;
				}


				items = JSON.parse(items);
				console.log(items);

				for (var i = 0; i < items.length; i++) {
					var prod = items[i];

					if (prod["id"] == id.toString()) {
						var quantity = parseInt(prod["quantity"]);
						quantity = quantity + 1;
						prod["quantity"] = quantity;

						console.log("items updated:");
						console.log(items);

						localStorage.setItem("products", JSON.stringify(items));

						return true;

					}

				}

				// we went through the entire loop
				// and couldnt' find the item, so this means create a new one
				var dict = {
					"id":id,
					"quantity" : 1
				}
				items.push(dict);
				localStorage.setItem("products", JSON.stringify(items));

			}


    </script>
  </body>
</html>

<?php
	// be a good citizen and close out your database connection here

?>
