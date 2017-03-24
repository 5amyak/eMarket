<?php
// configuration
require("../includes/helpers.php"); 

$item_html = "";

//connecting to database
$conn = mysqli_connect("localhost", "root", "", "e-market_project");
if (!$conn) {
	exit("Connection failed: " . mysqli_connect_error());
}

// query database for user
$query = "SELECT * FROM items";
$result = mysqli_query($conn, $query);
// creating html for display
while($row = mysqli_fetch_assoc($result)) {
	if (isset($_SESSION["id"]) && $row["user_id"] == $_SESSION["id"])
		continue;
	$item_html = $item_html . "<div class=\"row\"> <div class=\"col-xs-12 col-md-12 col-sm-12 col-lg-12\">
	<div class=\"thumbnail clearfix\">";
	$item_html = $item_html . "<img src=\"". $row["img_path"] ."\" alt=\"Thumbnail Image 1\"
	class=\"img-responsive pull-left\" style=\"height: 200px;  width: 375px;\"> <div class=\"caption text-center\">";
	$item_html = $item_html . "<h2 class=\"text-uppercase\">". $row["title"] ."</h2> <h3 class=\"lead\"><em>₹". $row["price"] ."</em></h3> <p class=\"text-muted\">". $row["description"] ."</p>";
	$item_html = $item_html . "<p><a href=\"about_seller.php?user_id=". $row["user_id"] ."\"><span class=\"glyphicon glyphicon-phone\" aria-hidden=\"true\"></span> Contact Seller</a> </p> </div>
		</div> </div> </div>";
}
// returning html
if (!empty($item_html))
	echo $item_html;
else
	echo "No item found";
?>