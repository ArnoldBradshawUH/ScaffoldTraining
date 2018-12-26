<?php
/**
 * Created by PhpStorm.
 * User: said
 * Date: 2018-12-23
 * Time: 02:41
 * Thank You
 */

session_start();
include('header.php');
if (!isset($_POST['confirm-training']) == true) {
    header("Location: index.php");
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="STC Company" content="We are about Scaffold Training">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thank You</title>
    <link rel="stylesheet" href="css/main-style.css">
</head>
<body>
<div class="main-page">
    <div class="content-wrap">
        <br>
        <h2>Thank you for registering your training course with STC Limited</h2><br>
        <p>You will receive an email shortly confirming your training and all the details. Please remember to walk with
            Full PPE on the days of the training or as advised by the Instructor.</p><br>
        <p>Again, thank you for choosing STC Limited for your training needs. We hope your stay with us will
            be an enjoyable one.</p><br>
        <p>Remember STC is more than just training. We also do the following: -</p><br>
        <ul>
            <li>Sale of Scaffold Tools</li>
            <li>Scaffold Tools</li>
            <li>Tagging Systems</li>
            <li>Tool tethers</li>
        </ul>
    </div>
</div>
</body>
<footer>
    <?php
    }
    ?>
    <?php include('footer.php'); ?>
</footer>
</html>
