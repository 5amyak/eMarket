<?php if (isset($_SESSION["id"])): ?>
  <form action="sell.php" method="post" class="form-horizontal" enctype="multipart/form-data">
    <div class="form-group">
      <label class="control-label col-sm-2" for="title">Item Title:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Catchy Title">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="details">Item Description:</label>
      <div class="col-sm-8">
        <textarea class="form-control" id="details" rows="3" name="details" placeholder="Enter about Item  "></textarea>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="ctgry">Category:</label>
      <div class="col-sm-8"> 
        <select class="form-control" id="ctgry" name="ctgry">
          <option value="Electronic">Electronic</option>
          <option value="Clothing">Clothing</option>
          <option value="Stationary">Stationary</option>
          <option value="Sports">Sports</option>
          <option value="Furniture">Furniture</option>
          <option value="Vehicle">Vehicle</option>
          <option value="Miscellaneous">Miscellaneous</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="price">Price:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price (in ₹)">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="item_img">Upload Image:</label>
      <div class="col-sm-8">
        <input type="file" class="form-control" name="item_img" id="item_img" accept="image/*">
      </div>
    </div>
    <div class="form-group"> 
      <div class="col-sm-offset-2 col-sm-8">
        <button type="submit" class="btn btn-primary">Sell</button>
      </div>
    </div>
  </form>
<?php else: ?>
  <h1>Sorry!</h1>
  <h3>You must be logged in to sell item.</h3>
<?php endif ?>