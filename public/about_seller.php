<?php
// configuration
require("../includes/helpers.php"); 

// html containing info about seller
$seller_html = "";
$values = [];

//connecting to database
$conn = connect();

// query database for user
$query = "SELECT * FROM users WHERE user_id='" .$_GET["user_id"]. "'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
// for correct display of comments
$values["disqus_page_identifier"] = $_GET["item_id"];
$values["disqus_page_url"] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";;

// if user is found
if($result) {
	$seller_html = $seller_html . "<div class=\"row\">
		<div class=\"col-xs-12 col-md-12 col-sm-12 col-lg-12\">";
	$seller_html = $seller_html . "<div class=\"text-center\">";
	$seller_html = $seller_html . "<h2 class=\"text-uppercase\">". $row["name"] ."</h2>";
	$seller_html = $seller_html . "<p class=\"lead text-capitalize\"><em>".
		$row["college"] .", ". $row["city"] . "</em></p>";
	$seller_html = $seller_html . "<p class=\"text-muted\"><span class=\"glyphicon glyphicon-phone\" aria-hidden=\"true\"></span>  ". $row["contact"] ."</p>";
	$seller_html = $seller_html . "<p class=\"text-success\"><span class=\"glyphicon glyphicon-envelope\" aria-hidden=\"true\"></span> ".  $row["email"] ."</p> </div> </div> </div> <hr> <div id=\"disqus_thread\"></div>";
}
$values["page_html"] = $seller_html;

// returning html
if (!empty($seller_html))
	disp_with_comments($values);
else
	apologize("No item found");
?>