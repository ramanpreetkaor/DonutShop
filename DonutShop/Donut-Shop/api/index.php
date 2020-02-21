<?php
// Grabs the URI and breaks it apart in case we have querystring stuff
$request_uri = explode("?", $_SERVER["REQUEST_URI"], 2);

// comment out these lines to get the 404 working
// var_dump($request_uri);
// var_dump($request_uri[0]);

// Route it up!
switch ($request_uri[0]) {
    // Home page
    case "/donut-shop/api/products":
        require "products.php";
        break;
    // About page
    case "/donut-shop/api/locations":
        require "locations.php";
        break;
    // Everything else
    default:
        header("HTTP/1.0 404 Not Found");
        //require "";
        break;
}
