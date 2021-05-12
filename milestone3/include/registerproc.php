<?php

include './functions.php';

// Retrieve username and password from database according to user's input
$email = mysqli_real_escape_string($db, $_POST['email']);
$password = mysqli_real_escape_string($db, $_POST['pass']);
$confirmPassword = mysqli_real_escape_string($db, $_POST['confirmPassword']);
$name = mysqli_real_escape_string($db, $_POST['name']);

if ($password != $confirmPassword) {
    $str = '../register.php?s=passwordMismatched';
    redirect($str);
    exit();
} else if (isUserWithEmailAlreadyExist($email)) {
    $str = '../register.php?s=emailOccupied';
    redirect($str);
    exit();
}
$encrypted_mypassword = md5($password);

$db = connect();
$sql = "INSERT into `user` (email, password, name, user_role) VALUES('{$email}', '{$encrypted_mypassword}', '{$name}', 2);";
$inserted = mysqli_query($db, $sql);

if ($inserted) {
    $str = '../register.php?s=success';
    redirect($str);
} else {
    $str = '../register.php?s=error';
    redirect($str);
}
?>