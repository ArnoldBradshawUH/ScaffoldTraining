<?php
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "ScaffoldTraining";
// Create connection string...
$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
// Check connection code...
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
echo "Connected Successfully";
