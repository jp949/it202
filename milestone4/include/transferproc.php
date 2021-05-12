<?php
include './functions.php';

$accountId = $_POST["accountId"];
$depositAmount= $_POST["amount"];

if(!checkBalance($accountId, $depositAmount)){
     $str = '../user/transfer.php?s=lessBalance';
    redirect($str);
    exit();
}

$db = connect();
transaction($accountId, 1, $depositAmount, "transfer", '');
$str = '../user/transfer.php?s=success';
redirect($str);
?>