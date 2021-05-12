<?php
include './functions.php';

$accountId = $_POST["accountId"];
$depositAmount= $_POST["amount"];


if(!checkBalance(1, $depositAmount)){
     $str = '../user/deposit.php?s=lessBalance';
    redirect($str);
    exit();
}

$db = connect();
transaction(1, $accountId, $depositAmount, "transfer", '');

$str = '../user/deposit.php?s=success';
redirect($str);
?>