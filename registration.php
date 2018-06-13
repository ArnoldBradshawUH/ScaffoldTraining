
<?php include "header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$first_name = $_POST["first_name"];
	$last_name = $_POST["last_name"];
	$contact = $_POST["contact"];
	$address = $_POST["address"];
	$email = $_POST["email"];
	$pass = $_POST["pass"];
	require "connection.php";
	$sql = "INSERT INTO `tbl_user` (`user_id`, `first_name`, `last_name`, `contact`, `address`, `email`, `password`) VALUES (NULL, '$first_name', '$last_name', '$contact', '$address', '$email', sha1('$pass'));";

	if (mysqli_query($conn, $sql)) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
?>
<H1> Registration</H1>
<div class="container">

	<form action="registration.php" method="post">
		First Name <br>
		<input type="text" name="first_name"> <br>
		Last Name <br>
		<input type="text" name="last_name"> <br>
		Contact <br>
		<input type="text" name="contact"> <br>
		Address <br>
		<input type="text" name="address"> <br>
		Email <br>
		<input type="text" name="email"> <br>
		Password <br>
		<input type="text" name="pass"> <br>
		<br>
		<input type="submit" name="Submit">
	</form>
</div>
<?php include "footer.php"; ?>