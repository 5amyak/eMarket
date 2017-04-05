<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php if (isset($title)): ?>
  <title>eMarket: <?= htmlspecialchars($title) ?></title>
<?php else: ?>
  <title>eMarket</title>
<?php endif ?>

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.css">

<!-- My CSS -->
<link rel="stylesheet" type="./css" href="./css/mystyle.css">

<!-- jQuery library -->
<script src="js/jquery-1.11.2.min.js"></script> 

<!-- Latest compiled JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- My JavaScript -->
<script src="js/eMarket.js" type="text/JavaScript"></script>


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="top">
<nav>
  <div class="container"> 
    
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="index.php">e-Market</a> </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"> </li>
        <li><a href="sell.php">Sell Item</a> </li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Category <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="category.php?category=Electronic">Electronic</a> </li>
            <li><a href="category.php?category=Clothing">Clothing</a> </li>
            <li><a href="category.php?category=Stationary">Stationary</a> </li>
            <li><a href="category.php?category=Sports">Sports</a> </li>
            <li><a href="category.php?category=Furniture">Furniture</a> </li>
            <li><a href="category.php?category=Vehicle">Vehicle</a> </li>
            <li class="divider"></li>
            <li><a href="category.php?category=Miscellaneous">Miscellaneous</a> </li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php if (!isset($_SESSION["id"])): ?>
        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <?php else: ?>
        <li><p class="text-capitalize">Welcome,<br> <?=$_SESSION["user_name"]?></p></li>
      <?php endif ?>
      
      <?php if (isset($_SESSION["id"])): ?>
        <li><a href="logout.php" id="logout"><span class="glyphicon glyphicon-log-out"></span> LogOut</a></li>
      <?php else: ?>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> LogIn</a></li>
      <?php endif ?>
    </ul>
      <form action="search.php" method="post" class="navbar-form" role="search" id="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search" name="query">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid --> 
</nav>
<hr>