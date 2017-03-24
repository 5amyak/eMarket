<?php

    // configuration
    require("../includes/helpers.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("sell_form.php", ["title" => "Sell"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $_POST["title"] = trim($_POST["title"]);
        $_POST["details"] = trim($_POST["details"]);
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["item_img"]["name"]);
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        
        // validate submission
        if (empty($_POST["title"]))
        {
            apologize("You must provide Item title.");
        }
        else if (empty($_POST["details"]))
        {
            apologize("You must provide Item description.");
        }
        else if (!isset($_POST["price"]) || !ctype_digit($_POST["price"]))
        {
            apologize("You must provide integral price.");
        }
        //validate file uploads
        if (is_uploaded_file($_FILES["item_img"]['tmp_name'])) {
            // Check if file already exists
            if (file_exists($target_file)) {
                apologize("File already exists.");
            }
            // Check file size
            else if ($_FILES["item_img"]["size"] > 5000000) {
                apologize("File is too large.");
            }
            // Check file extension
            else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" &&
                $imageFileType != "gif" ) {
                apologize("Only JPG, JPEG, PNG & GIF files are allowed.");
            }
            // Upload file to server
            else {
                if (!move_uploaded_file($_FILES["item_img"]["tmp_name"], $target_file)) {
                     apologize("There was an error uploading your file.");
                }
            }
        }
        else {
            $target_file="uploads/no-image16x9.jpg";
        }

        //connecting to database
        $conn = mysqli_connect("localhost", "root", "", "e-market_project");
        if (!$conn) {
            exit("Connection failed: " . mysqli_connect_error());
        }
        // insert item into database
        $sql = "INSERT INTO items (user_id, title, description, category, price, img_path)
        VALUES ('".$_SESSION["id"]."', '".$_POST["title"]."', '".$_POST["details"]."', '".$_POST["ctgry"]."', '".$_POST["price"]."', '".$target_file."')";

        if (!mysqli_query($conn, $sql)) {
            apologize("Error: SQL " . mysqli_error($conn));
        }

        // redirect to home page
        header("Location: index.php");
    }

?>
