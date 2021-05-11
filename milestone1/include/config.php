<?php

session_start();
//Database credentials
$db = connect();
//Display error if failed to connect
if ($db->connect_errno) {
    printf("Connect failed: %s\n", $db->connect_error);
    exit();
}

function redirect($url) { //redirect function
    if (!headers_sent()) {
        header('Location: ' . $url);
        exit;
    } else {
        echo '<script type="text/javascript">';
        echo 'window.location.href="' . $url . '";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url=' . $url . '" />';
        echo '</noscript>';
        exit;
    }
}

function isLogin() { //check if user is login
    if (isset($_SESSION['sid'])) {
        switch ($_SESSION['user_role']) {
            case 'admin':
                $str = './admin';
                redirect($str);
                break;

            case 'user':
                $str = './user';
                redirect($str);
                break;
        }
    }
}

function check($val) { //check user authentication
    if (!isset($_SESSION['sid'])) {
        $str = '../main.php?s=fl';
        redirect($str);
    } else {
        if ($val == 1) { //admin checking
            switch ($_SESSION['user_role']) {

                case 'user':
                    $str = '../user';
                    redirect($str);
                    break;
            }
        } else if ($val == 2) { //user checking
            switch ($_SESSION['user_role']) {

                case 'admin':
                    $str = '../admin';
                    redirect($str);
                    break;
            }
        } else if ($val == 3) { //accountant checking
            switch ($_SESSION['user_role']) {

                case 'admin':
                    $str = '../admin';
                    redirect($str);
                    break;

                case 'user':
                    $str = '../user';
                    redirect($str);
                    break;
            }
        }
    }
}

function logout() {
    session_destroy();
    $str = '../main.php?s=t';
    redirect($str);
}

function connect() {
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'rbac';
    return new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
}

?>