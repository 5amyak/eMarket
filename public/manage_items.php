<?php
	// configuration
	require("../includes/helpers.php"); 

	// if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        $item_html = "";

		//connecting to database
		$conn = connect();

		// query database for user
		$query = "SELECT * FROM items WHERE user_id='".$_SESSION["id"]."'";
		$result = mysqli_query($conn, $query);

		//html of items for display
		$item_html = generate_item_html($result);

		// returning html
		if (!empty($item_html))
			display($item_html);
		else
			apologize("No item found");
	}

	// else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {

    }

?>