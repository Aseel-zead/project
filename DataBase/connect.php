<?php
$serverName = 'localhost';
$serverUser = 'root';
$serverPass = '';
$DataBase = 'register';
$con = mysqli_connect($serverName, $serverUser, $serverPass, $DataBase);

// if (!$con->connect_errno) {
//     echo 'Done ';
// } else {
//     die('Erorr  !! ' . mysqli_connect_error());
// }