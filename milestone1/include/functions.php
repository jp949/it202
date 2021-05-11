<?php

include_once './config.php';

function isUserWithEmailAlreadyExist($email) {
    $db = connect();
    $sql = "SELECT count(*) as `c` FROM user where email like '{$email}'";
    $result = mysqli_query($db, $sql);
    $count = $result->fetch_object()->c;
    return $count > 0;
}
