<?php
// configuration
require("../includes/helpers.php"); 

$item_html = "";

//connecting to database
$conn = connect();

// query database for user
$query = "SELECT * FROM items WHERE category='".$_GET["category"]."'";
$result = mysqli_query($conn, $query);

//html of items for display
$item_html = generate_item_html($result);

// returning html
if (!empty($item_html))
	display($item_html);
else
	apologize("No item found");
?>