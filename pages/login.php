<?php include "../includes/header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$email = $_POST["email"];
	$pass = $_POST["pass"];

	require "../scripts/db-connect.php";

	$sql = "SELECT * FROM Student WHERE Email='$email' AND Pass = sha1('$pass')";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while ($row = mysqli_fetch_assoc($result)) {

			$_SESSION["UserID"] = $row["UserID"];
			$_SESSION["FirstName"] = $row["FirstName"];
			$_SESSION["LastName"] = $row["LastName"];

			header("location:../index.php");

		}
	} else {
		echo "0 results";
	}

}
?>

	<div class="container">

		<h1> Login </h1>


		<form action="login.php" method="post" accept-charset="utf-8">

			Email <br>
			<input type="text" name="email"> <br>
			Password <br>
			<input type="password" name="pass">
			<br>
			<input type="Submit" name="Login In">
			<br>

		</form>

	</div>

<?php include "../includes/footer.php";?>