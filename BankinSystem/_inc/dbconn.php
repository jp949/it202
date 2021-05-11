<?php

$serverName="localhost";
$dbusername="root";
$dbpassword="";
$dbname="simple_bank";
$port="3306";
mysqli_connect($serverName,$dbusername,$dbpassword, $dbname, $port)/* or die('the website is down for maintainance')*/;


function connect() {
    return mysqli_connect($host, $user, $password, $database, $port, $socket);
}

function mysql_query($query){
    
}
?>