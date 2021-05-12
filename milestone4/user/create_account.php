<?php 
    include 'include/header.php';
    include_once '../include/functions.php';
?>

<form class="form-signin" method="post" action="../include/newaccountproc.php">
    <h3>Create New Account </h3>
    
    <label for="inputEmail" class="sr-only">Account Type</label>

    <select class="form-control mb-2" name = "accountType">
        <option value="saving">Saving</option>
        <option value="checking">Checking</option>
    </select>
    
    <br/><br/>
    <button class="btn btn-md btn-success btn-block" type="submit" name="submit">Create new account</button>
</form>
    
      <?php
    if (isset($_GET['s'])) {
        $s = $_GET['s'];
        switch ($s) {
             case 'lessBalance':
                echo '<script type="text/javascript" language="javascript">
          swal("Failed", "There is not so much balance in the world accout", "error");</script>';
                break;
            case 'error':
                echo '<script type="text/javascript" language="javascript">
          swal("Failed", "Sorry, some error while creating the account, please try again", "error");</script>';
                break;
            case 'success':
                echo '<script type="text/javascript" language="javascript">
          swal("Success", "Account Created Successfully.", "success");</script>';
                break;
            default:
        }
    }
    ?>
<?php include 'include/footer.php' ?>   