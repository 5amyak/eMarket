<?php

// enable sessions
session_start();

/**
* Renders view, passing in values.
*/
function render($view, $values = [])
{
    // if view exists, render it
	if (file_exists("../views/{$view}"))
	{
		// extract variables into local scope
		extract($values);
		
        // render view (between header and footer)
		require("../views/header.php");
		require("../views/{$view}");
		require("../views/footer.php");
		exit;
	}

    // else err
	else
		trigger_error("Invalid view: {$view}", E_USER_ERROR);
}

/**
* Apologizes to user with message.
*/
function apologize($content)
{
	$content = "<div class=\"container\"><h1>Sorry!</h1> <h3>$content</h3> </div>";
	render("disp_html.php", ["content" => $content]);
}

/**
* Displays html to user
*/
function display($content)
{
	$content = "<div class=\"container\">$content</div>";
	render("disp_html.php", ["content" => $content]);
}

/**
* Displays home to user
*/
function home()
{
	$content = "<h2 class=\"text-center\">FEATURED PRODUCTS</h2> <hr><div class=\"container\" id=\"item\">";
	render("disp_html.php", ["content" => $content]);
}

/**
* Connects to database
*/
function connect()
{
	$conn = mysqli_connect("localhost", "root", "", "e-market_project");
	if (!$conn) {
		exit("Connection failed: " . mysqli_connect_error());
	}
	return $conn;
}

/**
* Generate Item's HTML
*/
function generate_item_html($result)
{
	// creating html for display
	$item_html = "";
	while($row = mysqli_fetch_assoc($result)) {
		$item_html = $item_html . "<div class=\"row\"> <div class=\"col-xs-12 col-md-12 col-sm-12 col-lg-12\">
		<div class=\"thumbnail clearfix\">";
			$item_html = $item_html . "<img src=\"". $row["img_path"] ."\" alt=\"Thumbnail Image 1\"
			class=\"img-responsive pull-left\" style=\"height: 200px;  width: 375px;\"> <div class=\"caption text-center\">";
			$item_html = $item_html . "<h2 class=\"text-uppercase\">". $row["title"] ."</h2> <h3 class=\"lead\"><em>₹". $row["price"] ."</em></h3> <p class=\"text-muted\">". $row["description"] ."</p>";
			$item_html = $item_html . "<p><a href=\"about_seller.php?user_id=". $row["user_id"] ."\"><span class=\"glyphicon glyphicon-phone\" aria-hidden=\"true\"></span> Contact Seller</a> </p> </div>
		</div> </div> </div>";
	}
	return $item_html;
}

?>