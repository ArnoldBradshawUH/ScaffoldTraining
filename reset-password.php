<?php
/**
 * Created by PhpStorm.
 * User: said
 * Date: 2018-12-20
 * Time: 05:14
 * Source of  code - mmtuts on YouTube
 */

// This is a form that will be setup to reset your password
include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="STC Company" content="We are about Scaffold Training">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password</title>
    <link rel="stylesheet" href="css/main-style.css">
</head>
<body>
<div class="main-page">
    <br>
    <h1>Reset Your Password</h1>
    <p>An email will be sent to you with instructions on how to reset your password.
        Please enter your email address below that is associated with your account.</p>
    <form action="reset-request.php" method="post">
        <input type="text" name="email" placeholder="Enter your e-mail...">
        <button type="submit" name="reset-request-submit">Reset</button>
    </form>
    <?php
    if (isset($_GET['reset'])) {
        if ($_GET['reset'] == "success") {
            echo '<p class = "signupsuccess"> Check your email account for the reset link!</p>';
        }
    }
    ?>
</div>
</body>
<footer>
    <?php
    include('footer.php');
    ?>
</footer>
</html>
