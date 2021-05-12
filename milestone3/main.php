<?php include 'include/functions.php';//check(1);?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Simple Banking</title>

    <script src="js/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/sweetalert.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
    <style>
    body {
    padding-top: 8rem;
    padding-bottom: 5rem;
    }
    </style>
  </head>

  <body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="index.php">Simple Banking</a>
      
    </nav>
    <div class="container">
    
      <form class="form-signin" method="post" action="include/loginproc.php">
      
      <label for="inputEmail" class="sr-only">Email</label>
      <input type="email" id="email" name ="email" class="form-control mb-2" placeholder="Email" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="password" name ="pass" class="form-control" placeholder="Password" required>
      <button class="btn btn-md btn-primary btn-block" type="submit" name="submit">Login</button>
        <a class="btn btn-md btn-success btn-block" href="register.php" >Register</a>
      </form>
        

    </div> <!-- /container -->
  </body>

  <script src="js/jquery.min.js" ></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <?php
  if(isset($_GET['s'])){
      $s = $_GET['s'];
      switch ($s){
          case 'lot':
          echo  '<script type="text/javascript" language="javascript">
          swal("Success", "Successufully Logout", "success");</script>';
          break;
          case 'lt':
          echo  '<script type="text/javascript" language="javascript">
          swal("Success", "Login Successful", "success");</script>';
          break;
          case 'lf':
          echo  '<script type="text/javascript" language="javascript">
          swal("Failed", "Email and password are incorrect. please try again.", "error");</script>';
          break;
          
          case 'fl':
          echo  '<script type="text/javascript" language="javascript">
          swal("Failed", "Sorry, you need to log in first", "error");</script>';
          break;
          default:
          }
    }
    ?>
</html>
