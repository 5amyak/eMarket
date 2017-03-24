<?php if (!isset($_SESSION["id"])): ?>
<form action="login.php" method="post" class="form-horizontal">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-8">
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
    <div class="col-sm-8"> 
      <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-8">
      <button type="submit" class="btn btn-primary">Login</button>
    </div>
  </div>
</form>
<?php else: ?>
  <h1>Sorry!</h1>
  <h3>You must be logged out.</h3>
<?php endif ?>