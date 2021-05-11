<?php

include_once './config.php';

function isUserWithEmailAlreadyExist($email) {
    $db = connect();
    $sql = "SELECT count(*) as `c` FROM user where email like '{$email}'";
    $result = mysqli_query($db, $sql);
    $count = $result->fetch_object()->c;
    return $count > 0;
}


function getMaxAccountNumber(){
    $db = connect();
    $sql = "select concat(max(account_number),1) as max from account a";
    $result = mysqli_query($db, $sql);
    return $result->fetch_object()->max;
}


function getAccountById($id=1){
    $db = connect();
    $sql = "select * from account a  where id = {$id};";
    $result = mysqli_query($db, $sql);
    return $result->fetch_object();
}

function checkBalance($srcAccountId, $amount)
{
    $db = connect();
    $sql = "select * from account a  where id = {$srcAccountId};";
    $result = mysqli_query($db, $sql);
    $bbb = $result->fetch_object()->balance;
    return $amount <= $bbb;
}

function transaction($srcAccountId, $destinationAccountId, $amount, $transcationType, $memo)
{
    $srcAccount= getAccountById($srcAccountId);
    $balance = $srcAccount->balance - $amount;
            
    $db = connect();
    
    $sql = "INSERT INTO bank_transaction
    (src_account_id, destination_account_id, balance_change, expected_total, transaction_type, created, memo)
    VALUES({$srcAccountId}, {$destinationAccountId}, {$amount},{$balance}, '{$transcationType}', CURRENT_TIMESTAMP, '{$memo}');";
    $result = mysqli_query($db, $sql);
    
    $destinationAccount = getAccountById($destinationAccountId);
    $balance = $destinationAccount->balance + $amount;
    
    $sql = "INSERT INTO bank_transaction
    (src_account_id, destination_account_id, balance_change, expected_total, transaction_type, created, memo)
    VALUES({$destinationAccountId}, {$srcAccountId}, {$amount},{$balance}, '{$transcationType}', CURRENT_TIMESTAMP, '{$memo}');";
    $result = mysqli_query($db, $sql);
    
    $sql = "update account set balance = balance - {$amount} where id = {$srcAccountId};";
    $result = mysqli_query($db, $sql);
    
    $sql = "update account set balance = balance + {$amount} where id = {$destinationAccountId};";
    $result = mysqli_query($db, $sql);
    
}

function getUserAccounts($userId) {
    $db = connect();
    $sql = "select * from account a2 where user_id = {$userId}";
    $login = mysqli_query($db, $sql);
    return mysqli_fetch_assoc($login);
}
