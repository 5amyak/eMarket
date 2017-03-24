<?php
// configuration
require("../includes/helpers.php"); 

$item_html = "";

//connecting to database
$conn = connect();

// query database for user
if(isset($_SESSION["id"]))
	$query = "SELECT * FROM items WHERE user_id != ". $_SESSION["id"] ."";
else
	$query = "SELECT * FROM items";
$result = mysqli_query($conn, $query);

//html of items for display
$item_html = generate_item_html($result);

// returning html
if (!empty($item_html))
	echo $item_html;
else
	echo "No item found";
?>