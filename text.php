<?php
/**
 * Created by PhpStorm.
 * User: said
 * Date: 2019-01-07
 * Time: 00:40
 */

include('includes/db-connect.php');
$sql = "SELECT * FROM training ";
$training_data = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($training_data);

while ($row = mysqli_fetch_assoc($training_data)) {
    echo "Training Title" . $row['train_title'] . "<br>";
}