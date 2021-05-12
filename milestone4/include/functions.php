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

function isUserWithEmailAlreadyExist($email) {
    $db = connect();
    $sql = "SELECT count(*) as `c` FROM user where email like '{$email}'";
    $result = mysqli_query($db, $sql);
    $count = $result->fetch_object()->c;
    return $count > 0;
}

function getMaxAccountNumber() {
    $db = connect();
    $sql = "select concat(max(account_number),1) as max from account a";
    $result = mysqli_query($db, $sql);
    return $result->fetch_object()->max;
}

function getAccountById($id = 1) {
    $db = connect();
    $sql = "select * from account a  where id = {$id};";
    $result = mysqli_query($db, $sql);
    return $result->fetch_object();
}

function checkBalance($srcAccountId, $amount) {
    $db = connect();
    $sql = "select * from account a  where id = {$srcAccountId};";
    $result = mysqli_query($db, $sql);
    $bbb = $result->fetch_object()->balance;
    return $amount <= $bbb;
}


function getMaxTransactionNumber() {
    $db = connect();
    $sql = "select ifnull(max(transaction_number),0)+1 as number from bank_transaction bt";
    $result = mysqli_query($db, $sql);
    return $result->fetch_object()->number;
}


function transaction($srcAccountId, $destinationAccountId, $amount, $transcationType, $memo) {
    $srcAccount = getAccountById($srcAccountId);
    
    $transcationNumber = getMaxTransactionNumber();
    
    $balance = $srcAccount->balance - $amount;

    $db = connect();

    $sql = "INSERT INTO bank_transaction
    (src_account_id, destination_account_id, balance_change, expected_total, transaction_type, created, memo, transaction_number, type)
    VALUES({$srcAccountId}, {$destinationAccountId}, {$amount},{$balance}, '{$transcationType}', CURRENT_TIMESTAMP, '{$memo}', {$transcationNumber}, 'credit');";
    $result = mysqli_query($db, $sql);

    $destinationAccount = getAccountById($destinationAccountId);
    $balance = $destinationAccount->balance + $amount;

    $sql = "INSERT INTO bank_transaction
    (src_account_id, destination_account_id, balance_change, expected_total, transaction_type, created, memo, transaction_number, type)
    VALUES({$destinationAccountId}, {$srcAccountId}, {$amount},{$balance}, '{$transcationType}', CURRENT_TIMESTAMP, '{$memo}',{$transcationNumber}, 'debit');";
    $result = mysqli_query($db, $sql);

    $sql = "update account set balance = balance - {$amount} where id = {$srcAccountId};";
    $result = mysqli_query($db, $sql);

    $sql = "update account set balance = balance + {$amount} where id = {$destinationAccountId};";
    $result = mysqli_query($db, $sql);
}

function getUserAccounts($userId) {
    $db = connect();
    $sql = "select * from account a2 where user_id = {$userId}";
    $result = mysqli_query($db, $sql);
    $rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}
