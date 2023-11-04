<?php
$sname= "localhost";
$uname= "root";
$password = "root";
$db_name = "nursing_home_db";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
    echo "Connection failed!";
}