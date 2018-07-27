<?php include "includes/header.php";

if (isset($_SESSION["UserID"])) {

	echo "Welcome " . $_SESSION["FirstName"] . " " . $_SESSION["LastName"];
}

?>

<!DOCTYPE html>

<html>
	<head>

		<link rel="stylesheet" type="text/css" href="css/main-style.css">

	</head>
	<body>


			<h1> Homepage </h1>
		</div>

	</body>
</html>

<?php include "includes/footer.php";?>