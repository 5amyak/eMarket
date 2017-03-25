<?php

// configuration
require("../includes/helpers.php"); 

// if user reached page via GET (as by clicking a link or via redirect)
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    // else render form
    render("login_form.php", ["title" => "LogIn"]);
}

// else if user reached page via POST (as by submitting a form via POST)
else if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $_POST["email"] = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    // validate submission
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
    {
        exit("You must provide correct email address.");
    }
    else if (empty($_POST["pwd"]))
    {
        exit("You must provide your password.");
    }

    //connecting to database
    $conn = connect();

    $_POST["email"] = mysqli_real_escape_string($conn, $_POST["email"]);
        // query database for user
    $query = "SELECT user_id, name, password FROM users WHERE email='".$_POST["email"]."'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // if we found user, check password
    if ($result)
    {
        // compare hash of user's input against hash that's in database
        if (password_verify($_POST["pwd"], $row["password"]))
        {
            // remember that user's now logged in by storing user's ID and name in session
            $_SESSION["id"] = $row["user_id"];
            $_SESSION["user_name"] = $row["name"];
            exit("");
        }
    }

    // else exit
    exit("Invalid email and/or password.");
}
?>
