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

  <!-- eMarket icon display on tabs -->
  <link rel="icon" href="https://cdn2.f-cdn.com/contestentries/317040/16994186/56718d3705da2_thumb900.jpg">
  
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

  <!-- DISQUS Comments Plugin -->
  <?php if (isset($disqus_page_identifier)): ?>
  <script>
  /**
  *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
  *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
  
  var disqus_config = function () {
    // Replace PAGE_URL with your page's canonical URL variable
    this.page.url = "<?= $disqus_page_url ?>";
    // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    this.page.identifier =  "<?= $disqus_page_identifier ?>";
  };

  (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://emarket-1.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
  })();
  </script>
  <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
  <?php endif ?>


  <!-- OneSignal API for push notifications -->
  <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async='async'></script>
  <script>
    var OneSignal = window.OneSignal || [];
    OneSignal.push(["init", {
      appId: "7908bb18-7add-4c58-8335-a5b9a0bfce6e",
      autoRegister: true, /* Set to true to automatically prompt visitors */
      httpPermissionRequest: {
        enable: true
      },
      notifyButton: {
          enable: true, /* Set to false to hide */
          position: "bottom-left"
      },
      persistNotification: false // Automatically dismiss the notification after ~20 seconds in Chrome Deskop v47+
    }]);
  </script>

  <!-- SendBird API for chatting features -->
  <script src="js/SendBird.min.js"></script>
  <?php if (isset($_SESSION["id"])): ?>
  <script src="js/web-widget/build/widget.SendBird.js"></script>
  <script>
  $(document).ready(function() {
    var appId = 'CF416554-17B6-411A-8E03-13C9E9BA062E';
    
    sbWidget.startWithConnect(appId, "<?= $_SESSION["id"] ?>", "<?= $_SESSION["user_name"] ?>", function() {});
  });
    
  </script>
  <?php endif ?>


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!-- [if lt IE 9]> -->
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <!-- [endif] -->
    </head>
    <body id="top">
      <nav>
        <div class="container"> 

          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class=" glyphicon glyphicon-align-justify"></span></button>
            <a class="navbar-brand" href="index.php">e-Market</a> </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
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
                  <li><a href="#" class="dropdown-toggle" class="text-capitalize" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span> <?=$_SESSION["user_name"]?> <span class="caret"></span> </a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="manage_items.php">Manage Content</a> </li>
                      <li><a href="update_profile.php" id="update_profile">Update Profile</a> </li>
                    </ul>
                  </li>
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