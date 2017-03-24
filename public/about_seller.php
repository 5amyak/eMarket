<?php
// configuration
require("../includes/helpers.php"); 

$user_html = "";

//connecting to database
$conn = connect();

// query database for user
$query = "SELECT * FROM users WHERE user_id='" .$_GET["user_id"]. "'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// if user is found
if($result) {
	$user_html = $user_html . "<div class=\"row\"> <div class=\"col-xs-12 col-md-12 col-sm-12 col-lg-12\">";
	$user_html = $user_html . "<div class=\"text-center\">";
	$user_html = $user_html . "<h2 class=\"text-uppercase\">". $row["name"] ."</h2>";
	$user_html = $user_html . "<p class=\"lead text-capitalize\"><em>". $row["college"] .", ". $row["city"] . "</em></p>";
	$user_html = $user_html . "<p class=\"text-muted\"><span class=\"glyphicon glyphicon-phone\" aria-hidden=\"true\"></span>  ". $row["contact"] ."</p>";
	$user_html = $user_html . "<p class=\"text-success\"><span class=\"glyphicon glyphicon-envelope\" aria-hidden=\"true\"></span> ".  $row["email"] ."</p> </div> </div> </div>";
}
// returning html
if (!empty($user_html))
	display($user_html);
else
	apologize("No item found");
?>