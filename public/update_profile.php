<?php

// configuration
require("../includes/helpers.php");

// if user reached page via GET (as by clicking a link or via redirect)
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    // else render form
    render("update_profile_form.php", ["title" => "Update Profile"]);
}

// else if user reached page via POST (as by submitting a form via POST)
else if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    //trim input
    $_POST["name"] = trim($_POST["name"]);
    $_POST["clg"] = trim($_POST["clg"]);
    $_POST["city"] = strtolower(trim($_POST["city"]));
    $_POST["email"] = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    //connecting to database
    $conn = connect();

    // query database for user
    $query = "SELECT * FROM users WHERE user_id='".$_SESSION["id"]."'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // if we found user, update fields
    if ($result) {
        // validate submission
        if (empty($_POST["name"]))
        {
            $_POST["name"] = $row["name"];
        }
        if (empty($_POST["clg"]))
        {
            $_POST["clg"] = $row["college"];
        }
        if (empty($_POST["city"]))
        {
            $_POST["city"] = $row["city"];
        }
        if (empty($_POST["tel"]))
        {
            $_POST["tel"] = $row["contact"];
        }
        if (!ctype_digit($_POST["tel"])) 
        {
            apologize("You must provide correct contact info.");
        }
        if (empty($_POST["email"]))
        {
            $_POST["email"] = $row["email"];
        }
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
        {
            apologize("You must provide correct email address.");
        }
        if (empty($_POST["gender"]))
        {
            $_POST["gender"] = $row["gender"];
        }
    }

    
    
    // insert user into database
    $sql = "UPDATE users SET name='".$_POST["name"]."', college='".$_POST["clg"]."', city='".$_POST["city"]."', contact='".$_POST["tel"]."', email='".$_POST["email"]."', gender='".$_POST["gender"]."' WHERE user_id='".$_SESSION["id"]."'";

    if (!mysqli_query($conn, $sql)) {
        apologize("Error: E-mail registered, Could not update." . mysqli_error($conn));
    }
    
    // redirect to home page
    header("Location: index.php");

}
?>