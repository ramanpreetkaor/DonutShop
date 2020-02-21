<?php

	// LOGIC => getting all the products from the db
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpassword = "";
	$dbname = "store";

	$conn = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);

	$query = "SELECT * from locations";

	$results = mysqli_query($conn, $query);

	$items = array();
	while( $product = mysqli_fetch_assoc($results) ) {
		array_push($items, $product);
	}


	// send it back as json
	header("Content-Type: application/json");

	$json = json_encode($items);
	if ($json === false) {
		// sometimes you get an error when converting
		// your data to json format
		$errMsg = array("error"=>json_last_error_msg());
		$json = json_encode($errMsg);
    // Set HTTP response status code to: 500 - Internal Server Error
    http_response_code(500);
	}
	echo $json;
?>
