<?php include "header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $pass = $_POST["pass"];

    require "connection.php";

    $sql = "SELECT * from 'tbl_user' WHERE email = '$email' AND password = sha1($pass)";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
// output data of each row
        while ($row = mysqli_fetch_assoc($result)) {

            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["first_name"] = $row["first_name"];
            $_SESSION["last_name"] = $row["last_name"];

            header("location: homepage.php");
        }
    } else {
        echo "0 results";
    }
}
?>

<div class="container">
	<h1>Login</h1>
	<form action="login.php" method="post">

		E-mail:<br>
        <input type="text" name="email"> <br> 
        <br>
		Password:<br>
        <input type="text" name="pass"> <br>
        <br>
		<input type="submit" value="Login" name="login"><br>
	</form>

</div>
<?php include "footer.php";?>