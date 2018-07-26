<?php include "../includes/header.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

	$first_name = $_POST["first_name"];
	$last_name = $_POST["last_name"];
	$streetAddress = $_POST["streetAddress"];
	$city = $_POST["city"];
	$phone_home = $_POST["phone_home"];
	$phone_mobile = $_POST["phone_mobile"];
	$phone_work = $_POST["phone_work"];
	$email = $_POST["email"];
	$pass = $_POST["pass"];
	$screenName = $_POST["screenName"];

	require "../scripts/db-connect.php";

	$sql = "INSERT INTO `User` (`UserID`, `FirstName`, `LastName`, `StreetAddress`, `City`, `PhoneH`, `PhoneM`, `PhoneW`, `Sex`, `UserType`, `Email`, `Picture`, `Pass`, `ScreenName`) VALUES (NULL, '$first_name', '$last_name', '$streetAddress', '$city', '$phone_home', '$phone_mobile', '$phone_work', '', '', '$email', '', sha1('$pass'), '$screenName');";

	if (mysqli_query($conn, $sql)) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);

}

?>

	<div class="container">


	<h1> Registration </h1>

		<form action="registration.php" method="post">

		First Name <br>
		<input type="text" name="first_name"><br>

		Last Name <br>
		<input type="text" name="last_name"><br>

		Street Address <br>
		<input type="text" name="address"><br>

		City <br>
		<input type="text" name="city"><br>

		Phone (H) <br>
		<input type="text" name="phone_home"><br>

		Phone (M) <br>
		<input type="text" name="phone_mobile"><br>

		Phone (W) <br>
		<input type="text" name="phone_work"><br>

		Email <br>
		<input type="text" name="email"><br>

		Password <br>
		<input type="text" name="pass"><br>

		Username <br>
		<input type="text" name="screenName"><br>

		<br>
		<input type="submit" name="Register">

		</form>

	</div>

<?php include "../includes/footer.php";?>