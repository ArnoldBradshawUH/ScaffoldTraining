<?php include "header.php";

if (isset($_SESSION["user_id"])) {
    echo "Welcome" . $_SESSION["first_name"];
}
?>

<h1>Home Page</h1>

<?php include "footer.php"?>