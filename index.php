
<?php
	session_start();

	$page = htmlentities($_GET['page']);
	$pages = scandir('pages');
	if(!empty($page)&& in_array($_GET['page'], $pages)){
		$content = 'pages/'.$_GET['page'];
	} else{
		header("Location:index.php?page=home.php");
	}

?>


<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/main-style.css"/>
	
	</head>
		<body>
			<div id="content">
				<?php include ($content)?>
			</div>
		</body>
</html>	