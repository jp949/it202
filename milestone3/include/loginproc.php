<?php

include './functions.php';
// Retrieve username and password from database according to user's input
$email = mysqli_real_escape_string($db, $_POST['email']);
$password = mysqli_real_escape_string($db, $_POST['pass']);
$encrypted_mypassword = md5($password);
$sql = "SELECT * FROM user WHERE (email = '$email') and (password = '$encrypted_mypassword')";
$login = mysqli_query($db, $sql);
$count = mysqli_num_rows($login);

if ($count != "") {
    while ($row = mysqli_fetch_assoc($login)) {
        $_SESSION['sid'] = $row['id']; //staff id
        $sid = $row['id'];
        $_SESSION['user_role'] = $row['user_role'];
        $_SESSION['name'] = $row['name'];
        $role = $row['user_role'];
    }

    if ($role == 1) {
        $str = '../admin';
        redirect($str);
    } else if ($role == 2) {
        $str = '../user';
        redirect($str);
    }
} else {
    $str = '../main.php?s=lf';
    redirect($str);
}
?>