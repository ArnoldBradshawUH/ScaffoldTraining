<?php
/**
 * Created by PhpStorm.
 * User: said
 * Date: 2019-01-10
 * Time: 21:41
 * Coded by A. Bradshaw
 */

include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="STC Company" content="We are about Scaffold Training">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Profile</title>
    <link rel="stylesheet" href="css/main-style.css">
</head>
<body>
<div class="main-page">
    <div class="content-wrap">
        <br>
        <h1>My Profile</h1><br>
        <p>User ID: <?php echo $_SESSION['userID'];?></p>
        <p>Email: <?php echo $_SESSION['userEmail'];?></p>
    </div>
</div>
</body>
<footer>
    <?php
    include('footer.php');
    ?>
</footer>
</html>