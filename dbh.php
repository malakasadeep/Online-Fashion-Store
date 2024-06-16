<?php
$serverName="localhost:3307";
$dbUsername="admin2";
$dbPassword="1234";
$dbName="fashion";

$conn=mysqli_connect($serverName,$dbUsername,$dbPassword,$dbName);

if(!$conn){
    die("connection faild :".mysqli_connect_error());
}