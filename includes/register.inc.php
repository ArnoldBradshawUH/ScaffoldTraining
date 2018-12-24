<?php
/**
 * Created by PhpStorm.
 * User: said
 * Date: 2018-12-23
 * Time: 02:15
 */

if (isset($_POST['register-submit'])) {
    require('db-connect.php');
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['emailAddress'];
    $companyName = $_POST['companyName'];
    $businessPhone = $_POST['businessPhone'];
    $mobilePhone = $_POST['mobilePhone'];
    $userPassword = $_POST['userPassword'];
    $verifyPassword = $_POST['verifyPassword'];

    if (empty($firstName) || empty($lastName) || empty($email) || empty($companyName) || empty($mobilePhone)
        || empty($userPassword) || empty($verifyPassword)) {
        header("Location: ../register.php?error=emptyfields");
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../register.php?error=invalidemail&emailAddress=" . $email);
        exit();
    } elseif ($userPassword !== $verifyPassword) {
        header("Location: ../register.php?error=invalidpassword&email=" . $email . "&firstName=" . $firstName .
            "&lastName=" . $lastName);
        exit();
    } else {
        $sql = "SELECT email_address FROM users WHERE email_address=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../register.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, 's', $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../register.php?error=usertaken&email" . $email);
                exit();
            } else {
                $sql = "INSERT INTO users (first_name, last_name, email_address, company_name, phone_business,
            phone_mobile, user_password) VALUES (?,?,?,?,?,?,?);";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../register.php?error=sqlerror");
                    exit();
                } else {
                    $hashedPwd = password_hash($userPassword, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, 'sssssss', $firstName, $lastName, $email,
                        $companyName, $businessPhone, $mobilePhone, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../register.php?signup=success");
                    exit();
                }
            }
        }

    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../index.php");
}