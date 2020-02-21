<?php
	// LOGIC => getting all the products from the db
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpassword = "";
	$dbname = "store";

	$conn = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
?>
<?php
	// UI BOBAGEM => importing the html for the header
	include("header.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Checkout</title>
    <link href="css/bulma.min.css" rel="stylesheet" type="text/css">
    <style type="text/css">
      #subtotal, #taxes, #total {
        color:#3273dc;
      }
      #total {
        font-weight:bold;
      }
      #discount {
        color: #FF3860
      }

      #error {

      }
      #discountRow {

      }

      #checkoutDetails {

      }
    </style>

  </head>
  <body>

    <button onClick="getProductsFromServer()"> Go! </button> <br>
    <section class="section">
      <div class="container">
        <h1 class="title">Checkout</h1>
        <h2 class="subtitle">
          Review your items below.
        </h2>

        <h2 class="subtitle" id="errorMessages"></h2>

        <h3> <a href="index.html"> <-- Go Back </a> </h3>
      </div>
    </section>

    <section class="section" id="checkoutDetails">
      <div class="container">


        <!-- THE CHECKOUT / PRICING TABLE IS HERE -->
        <table class="table is-fullwidth">
          <thead>
            <tr>
              <th>
                Item
              </th>
              <th>
                Quantity
              </th>
              <th>
                Price
              </th>
            </tr>
          </thead>
          <tbody>
            <!-- snap bag row -->
            <tr id="snapBag" class="hidden">
              <td>
                The Snap Bag
              </td>
              <td class="quantity">
              </td>
              <td class="itemTotal">
                $
              </td>
            </tr>
            <!-- weekend bag row -->
            <tr id="weekendBag" class="hidden">
              <td>
                The Weekend Bag
              </td>
              <td class="quantity">
              </td>
              <td class="itemTotal">
                $
              </td>
            </tr>


            <!-- subtotal row -->
            <tr class="totals">
              <td>
              </td>
              <td>
                <span class="has-text-weight-semi-bold">Subtotal</span>
              </td>
              <td id="subtotal">
                $
              </td>
            </tr>

            <!-- discount -->
            <tr class="totals" id="discountRow">
              <td>
              </td>
              <td>
                <span class="has-text-weight-semi-bold">Discount</span>
              </td>
              <td id="discount">
                - $
              </td>
            </tr>

            <!-- taxes -->
            <tr class="totals">
              <td>
              </td>
              <td>
                <span class="has-text-weight-semi-bold">Taxes</span>
              </td>
              <td id="taxes">
                $
              </td>
            </tr>

            <!-- total -->
            <tr class="totals">
              <td>
              </td>
              <td>
                <span class="has-text-weight-bold">Total</span>
              </td>
              <td id="total">
                $
              </td>
            </tr>
          </tbody>
        </table>


        <!-- COUPON CODE BOX IS HERE -->
            <!-- have a coupon? -->
            <div class="box">
              <div class="field">
                <label class="label">Have a coupon?</label>
                <div class="control">
                  <input class="input is-info" type="text" placeholder="Enter coupon code here" id="couponCode">
                </div>
                <p id="error" class="is-size-7">
                  <!-- Put your error message here -->
                </p>
              </div>
              <div class="field">
                <div class="control">
                  <button class="button is-info is-outlined" id="btnCoupon">Apply Coupon</button>
                </div>
              </div>
            </div>




      </div><!-- container -->
    </section>

    <script type="text/javascript">
      // use ajax to get data from server

      var cartItems = localStorage.getItem("products");

      if (cartItems == null) {
        // cart is empty

        // hide the checkout details and show an error message
        document.getElementById("checkoutDetails").style.display = "none";
        document.getElementById("errorMessages").innerHTML += "Your cart is empty.";

        return;
      }
      else {
        // there are things in the car


        var cartItems = localStorage.getItem("products");

        // get data from server & populate the cart page
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);

            // populate the cart
            var products = JSON.parse(this.responseText);
            for (var i = 0; i < products.length; i++) {
                  
            }

          }
        };
        xhttp.open("GET", "../api/products.php", true);
        xhttp.send();
      }





      /*
      function getProductsFromServer() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);


            // populate the cart
            items = JSON.parse(this.responseText);
            for (var i = 0; i < items.length; i++) {

            }

          }
        };
        xhttp.open("GET", "../api/products.php", true);
        xhttp.send();
      }
      */
    </script>


  </body>
</html>
