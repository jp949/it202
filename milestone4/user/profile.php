<?php
include 'include/header.php';
include_once '../include/functions.php';
?>

<h3>Profile</h3>

<form class="form-signin col-md-6" method="post" action="#">

    <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Make profile private</label>
  </div>
    <br/>
    <br/>
    
    <button class="btn btn-md btn-success btn-block" type="submit" name="submit">Update Profile</button>
</form>

<?php include 'include/footer.php' ?>       