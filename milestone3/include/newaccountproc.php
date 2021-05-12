<?php
include './functions.php';

$userId = $_SESSION['sid'];
$accountNumber = getMaxAccountNumber();
$worldAccount = getAccountById();

if($worldAccount->balance < 5){
     $str = '../user/create_account.php?s=lessBalance';
    redirect($str);
    exit();
}

$db = connect();
$sql = "INSERT INTO account
(account_number, user_id, balance, account_type, created, modified) VALUES('{$accountNumber}', {$userId}, 0, 'checking', CURRENT_TIMESTAMP, now());";
$inserted = mysqli_query($db, $sql);
$insertedId = mysqli_insert_id($db);
transaction(1, $insertedId, 5, "transfer", '');

if ($inserted) {
    $str = '../user/create_account.php?s=success';
    redirect($str);
} else {
    $str = '../user/create_account.php?s=error';
    redirect($str);
}
?>