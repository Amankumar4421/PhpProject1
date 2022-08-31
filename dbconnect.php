<?php

$server = "localhost:3307";
$user = "root";
$pass = "";
$db = "d1";
$link = mysqli_connect($server, $user, $pass, $db);
if (!$link) {
    die("Error" . mysqli_connect_error());
}