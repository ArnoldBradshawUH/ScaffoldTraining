<?php
/**
 * Created by PhpStorm.
 * User: said
 * Date: 2018-12-20
 * Time: 03:54
 */
session_start();
// remove all session variables
session_unset();
// destroy the session
session_destroy();
header('Location: ../index.php');
exit();