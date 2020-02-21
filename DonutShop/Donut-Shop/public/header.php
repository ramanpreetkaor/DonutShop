<?php

// header.php

// copy and paste all your common html code in here
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Donut Shop!</title>
    <link href="index.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link href="css/bulma.min.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <style type="text/css">
      nav {
        margin-top:40px;
      }
      img.logo {
        width:100px;
      }
      img.product-image {
        height:290px;
      }
    </style>
  </head>
  <body>

    <!-- MENU -->
    <nav class="level">
      <p class="level-item has-text-centered">
        <a href="about.php" class="link is-info">About Us</a>
      </p>
      <p class="level-item has-text-centered">
        <a href="locations.php" class="link is-info">Locations</a>
      </p>
      <p class="level-item has-text-centered">
        <a href="index.php">
    	     <img src="images/logo-donut.png" class="logo">
         </a>
      </p>
      <p class="level-item has-text-centered">
        <a href="menu.php" class="link is-info">Menu</a>
      </p>
      <p class="level-item has-text-centered">
        <a href="cart.php" class="button is-danger is-outlined">
          <i class="fas fa-shopping-cart"></i>
          <span id="cartAmt"></span>
        </a>
      </p>
    </nav>
