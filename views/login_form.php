<?php if (!isset($_SESSION["id"])): ?>
  <form class="form-horizontal">
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
        <button type="button" class="btn btn-primary" id="login_btn">Login</button>
      </div>
    </div>
  </form>
<?php else: ?>
  <div class="container">
    <h1>Sorry!</h1>
    <h3>You must be logged out to log in.</h3>
  </div>
<?php endif ?>