<?php
// configuration
require("../includes/helpers.php"); 

$item_html = "<h2 class=\"text-center\">FEATURED PRODUCTS</h2> <hr><div class=\"container\" id=\"item\"></div>";

//connecting to database
$conn = connect();

// query database for user
if(isset($_SESSION["id"]))
	$query = "SELECT * FROM items WHERE user_id != ". $_SESSION["id"] ."";
else
	$query = "SELECT * FROM items";
$result = mysqli_query($conn, $query);

//html of items for display
$item_html = $item_html . generate_item_html($result);

// returning html
if (!empty($item_html))
	display($item_html);
else
	apologize("No item found");
?>