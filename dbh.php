<?php
$serverName = "localhost:3307";
$dbUsername = "admin2";
$dbPassword = "1234";
$dbName = "fashion";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("connection unsucsess! :" . mysqli_connect_error());
}
