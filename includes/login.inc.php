<?php
/**
 * Created by PhpStorm.
 * User: said
 * Date: 2018-12-20
 * Time: 05:13
 */


if (isset($_POST['login-submit'])) {
    require('db-connect.php');
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPwd'];

    if (empty($userEmail) || empty($userPassword)) {
        header("Location: ../login.php?error=emptyfields&userEmail=" . $userEmail);
        exit();
    } else {
        $sql = "SELECT * FROM users where email_address=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../login.php?sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, 's', $userEmail);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($userPassword, $row['user_password']);
                if ($pwdCheck == false) {
                    header("Location: ../login.php?error=wrongpwd");
                    exit();
                } elseif ($pwdCheck == true) {
                    session_start();
                    $_SESSION['userID'] = $row['user_id'];
                    $_SESSION['userEmail'] = $row['email_address'];
                    header("Location: ../index.php?login=success");
                } else {
                    header("Location: ../login.php?error=wrongpwd");
                    exit();
                }
            } else {
                header("Location: ../login.php?error=nouser");
                exit();
            }
        }
    }

} else {
    header("Location: ../index.php");
    exit();
}