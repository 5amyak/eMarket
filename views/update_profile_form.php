<?php if (isset($_SESSION["id"])): ?>
  <form action="update_profile.php" method="post" class="form-horizontal">
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="clg">College:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="clg" name="clg" placeholder="Enter College">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="city">City:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="city" name="city" placeholder="Enter City">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="tel">Contact Info:</label>
      <div class="col-sm-8">
        <input type="tel" class="form-control" id="tel" name="tel" placeholder="Enter Telephone no.">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-8">
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter correct email address">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Gender:</label>
      <div class="col-sm-8">
        <label class="radio-inline"><input type="radio" name="gender" value="Male">Male</label>
        <label class="radio-inline"><input type="radio" name="gender" value="Female">Female</label>
        <label class="radio-inline text-danger" id="gender_error"></label>
      </div>
    </div>
    <div class="form-group"> 
      <div class="col-sm-offset-2 col-sm-8">
        <button type="submit" class="btn btn-primary" id="update_btn">Update</button>
      </div>
    </div>
  </form>
<?php else: ?>
  <div class="container">
    <h1>Sorry!</h1>
    <h3>You must be logged in to update profile.</h3>
  </div>
<?php endif ?>