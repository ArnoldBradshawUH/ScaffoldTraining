<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ScaffoldTraining";

// Create connection with database
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection string
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

?>