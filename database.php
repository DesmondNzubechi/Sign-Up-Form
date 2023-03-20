<?php


$serverName = 'Localhost';
$username = 'root';
$password  = '';
$dbname = 'Nzubechukwu';
$conn = mysqli_connect($serverName, $username, $password, $dbname);
if (!$conn) {
    die('Connection Failed' . mysqli_connect_error());
} else {
 
}