<?php include 'include/config.php'; ?>

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
            <form class="form-signin" method="post" action="include/registerproc.php">
                <h3>Register for new Account</h3>

                <label for="inputEmail" class="sr-only">Email</label>
                <input type="email" id="email" name ="email" class="form-control mb-2" placeholder="Email" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="password" name ="pass" class="form-control" placeholder="Password" required>
                <label for="inputPassword" class="sr-only">Confirm Password</label>
                <input type="password" id="password" name ="confirmPassword" class="form-control" placeholder="Confirm Password" required>
                <label for="inputPassword" class="sr-only">Name</label>
                <input type="text" id="name" name ="name" class="form-control" placeholder="Name" required>
                <button class="btn btn-md btn-success btn-block" type="submit" name="submit">Register</button>
            </form>


        </div> <!-- /container -->
    </body>

    <script src="js/jquery.min.js" ></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <?php
    if (isset($_GET['s'])) {
        $s = $_GET['s'];
        switch ($s) {
            case 'passwordMismatched':
                echo '<script type="text/javascript" language="javascript">
          swal("Failed", "Password Not matched", "error");</script>';
                break;
            case 'emailOccupied':
                echo '<script type="text/javascript" language="javascript">
          swal("Failed", "Email already occupied", "error");</script>';
                break;
            case 'success':
                echo '<script type="text/javascript" language="javascript">
          swal("Success", "Register successfully.", "success");</script>';
                break;

            case 'error':
                echo '<script type="text/javascript" language="javascript">
          swal("Failed", "Sorry, there are some error while registerin, please try again", "error");</script>';
                break;
            default:
        }
    }
    ?>
</html>
