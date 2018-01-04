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
* Sends Notification
*/
function sendNotification($OneSignaluserID='', $proxy='', $userpass=''){
	$content = array(
		"en" => 'English Message'
	);

	$fields = array(
		'app_id' => "7908bb18-7add-4c58-8335-a5b9a0bfce6e",
		'include_player_ids' => array($OneSignaluserID),
		"template_id" => '7b11eff4-8a77-4633-9622-7b62112deb96',
		// 'data' => array("foo" => "bar"),
		'priority' => 10,
		// Uncomment to use content field to define message
		// 'contents' => $content
	);

	$fields = json_encode($fields);
	// Uncomment to debug
	// console_log("\nJSON sent with fields:\n");
	// console_log($fields);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_PROXY, $proxy);
	curl_setopt($ch, CURLOPT_PROXYUSERPWD, $userpass);
	curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
		'Authorization: Basic MTdlNDg0ZjgtMmMyOS00YWZlLWJkZjYtNDcxMWQ0YjJkZmJh'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_HEADER, FALSE);
	curl_setopt($ch, CURLOPT_POST, TRUE);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

	$response = curl_exec($ch);
	curl_close($ch);

	return $response;
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
* Displays html to user
*/
function disp_with_comments($values = [])
{
	$content = $values["page_html"];
	$content = "<div class=\"container\">$content</div>";
	$values["content"] = $content;

	render("disp_html.php", $values);
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
		$item_html = $item_html . "<img src=\"". $row["img_path"] ."\" alt=\"Thumbnail Image 1\" class=\"img-responsive pull-left\" style=\"height: 200px;  width: 375px;\"> <div class=\"caption text-center\">";
		$item_html = $item_html . "<h2 class=\"text-uppercase\">". $row["title"] ."</h2> <h3 class=\"lead\"><em>₹". $row["price"] ."</em></h3> <p class=\"text-muted\">". $row["description"] ."</p>";
		$item_html = $item_html . "<p><a href=\"about_seller.php?user_id=". $row["user_id"] ."&item_id=". $row["item_id"] ."\"><span class=\"glyphicon glyphicon-phone\" aria-hidden=\"true\"></span> Contact Seller</a> </p> </div> </div> </div> </div>";
	}
	return $item_html;
}

/**
* Debugging PHP
*/
function console_log( $data ){
	echo '<script>';
	echo 'console.log('. json_encode( $data ) .')';
	echo '</script>';
}

/*
* mailing using php mailer
*/
?>