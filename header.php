<?php
/**
 * Created by PhpStorm.
 * User: said
 * Date: 2018-12-20
 * Time: 03:47
 */

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="STC Company" content="We are about Scaffold Training">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/header.css">
    <link rel="icon" href="images/stc-logo.png">
    <script type="text/javascript" src="js/drop-menus.js"></script>
</head>
<body>
<div class="navbar" id="main-navbar">
    <div class="dropdown">
        <button class="dropbtn" onclick="window.location.href='index.php'">Home</button>
    </div>
    <div class="dropdown">
        <button class="dropbtn">Products</button>
        <div class="dropdown-content">
            <a href="tagging-systems.php">Tagging Systems</a>
            <a href="scaffold-tools.php">Scaffold Tools</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">Services</button>
        <div class="dropdown-content">
            <a href="scaffold-training.php">CITB Scaffold Training</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">Technical</button>
        <div class="dropdown-content">
            <a href="scaffold-calculator.php">Scaffold Calculator</a>
            <a href="useful-links.php">Useful Links</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn" onclick="window.location.href='profile.php'">About</button>
        <div class="dropdown-content">
            <a href="user-profile.php">User Profile</a>
        </div>
    </div>
    <div class="topnav-right">
        <div class="dropdown">
            <?php if (isset($_SESSION['userID'])): ?>
                Welcome <?php echo $_SESSION['first_name'] ?>
                <button class="dropbtn" onclick="window.location.href='includes/logout.inc.php'">Logout</button>
            <?php else: ?>
                <button class="dropbtn" onclick="window.location.href='login.php'">Register/Login</button>
            <?php endif; ?>
        </div>
        <?php echo $_SESSION['first_name'] ?>
    </div>
</div>
<script type="text/javascript" src="js/nav-bar-sticky.js"></script>
</body>
</html>