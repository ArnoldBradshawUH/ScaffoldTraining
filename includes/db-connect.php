<?php
/**
 * Created by PhpStorm.
 * User: said
 * Date: 2018-12-20
 * Time: 04:09
 */


$serverName = "localhost";
$dbUserName = "root";
$dbPassword = "root";
$dbName = "STCTraining";

// Create connection
$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";