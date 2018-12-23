<?php
/**
 * Created by PhpStorm.
 * User: said
 * Date: 2018-12-20
 * Time: 03:54
 */

//  Include page Header
include_once('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>STC Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="login-page">
    <br>
    <h2>Please Login</h2>
    <!-- Form Code Here-->
    <form action="includes/login.inc.php" name="login-page" method="post">
        <div class="container">
            <label><b>E-mail</b></label>
            <input type="text" placeholder="Enter E-Mail" name="userEmail">
            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="userPwd">
            <button type="submit" name="login-submit">Login</button>
            <label>
                <input type="checkbox" checked="checked" name="remember-me"> Remember me
            </label>
        </div>
        <div class="container">
            <button type="submit" name="cancel-submit" class="cancelbtn">Cancel</button>
            <span class="psw">Forgot <a href="reset-password.php">Password?</a></span>
            <span class="register">Don't have an Account <a href='register.php'>Register?</a></span>
        </div>
    </form>
</div>
</body>
<footer>
    <?php
    include('footer.php');
    ?>
</footer>
</html>