<?php
	if (session_status() === PHP_SESSION_NONE)
	{
		session_start();
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<!-- PAGE TITLE AND META TAGS -->
		<title>Tutor Homepage | Ace Training</title>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="author" content="Ace Training">
		<meta name="theme-color" content="#1976D2">

		<!-- FAVICON -->
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
		<link rel="icon" href="img/favicon.ico" type="image/x-icon">

		<!-- INCLUDING CSS AND JAVASCRIPT DOCUMENTS -->
		<link rel="stylesheet" type="text/css" href="css/style.css">

		<!--
			Links to fonts. Montserrat will be used for headings, Maven Pro for link and
			buttons and Roboto for other text.
		-->
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Maven+Pro" rel="stylesheet">

		<!-- CUSTOM FONTS - USED FOR ICONS -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
		<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	</head>

	<body>
		<?php
			include ("header.php");
			include ("tutorCheck.php");
		?>

		<div class="container">
			<section id="tutorHome">
				<h1>Your Options</h1>
				<ul>
					<li><a href='tutorShowUsers.php'>Show Users</a></li>
					<li><a href='tutorNewCourse.php'>Add New Course</a></li>
					<li><a href='tutorUploadRes.php'>Upload a Resource</a></li>
					<li><a href='tutorAuthoStud.php'>Authorise Students</a></li>
					<li><a href='tutorAddStud.php'>Add Students</a></li>
				</ul>
			</section>
		</div>

		<?php
			include ("footer.php");
		?>
	</body>
</html>
