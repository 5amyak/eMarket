<?php
// configuration
require("../includes/helpers.php");

//connecting to database
$conn = connect();

// query database for user
$query = "SELECT * FROM items WHERE UPPER(title) LIKE UPPER('%" .$_POST["query"]. "%')";
$result = mysqli_query($conn, $query);

//html of items for display
$item_html = generate_item_html($result);

if (!empty($item_html))
	display($item_html);
else
	apologize("No item found");
?>