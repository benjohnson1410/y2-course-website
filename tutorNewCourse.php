<?php
	if (session_status() === PHP_SESSION_NONE)
	{
		session_start();
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Course | Ace Training</title>

		<!-- FAVICON -->
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
		<link rel="icon" href="img/favicon.ico" type="image/x-icon">

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
  </head>
  <body>
    <?php
      include ("header.php");
    ?>
    <div class="container">
      <div id="regForm">
        <?php
      		include ("tutorCheck.php");
      		if (isset($_POST['courseName']))
      		{
      			addCourseToDatabase();
      		}
      		else
      		{
      			showForm();
      		}
      	?>
      </div>
      <script src="js/checkRegistration.js"></script>
    </div>
    <?php
      include ("footer.php");
    ?>
  </body>
</html>
<?php
  function showForm()
	{
		echo ("
			<form name='Add Course' method='post' action='tutorNewCourse.php'>
				Course Name <br />
				<input type='text' name='courseName' /> <br />

				Course Fee (£) <br />
				<input type='text' name='courseFee' /> <br />

				<input type='submit' onclick='submit' />
		");
	}

	function addCourseToDatabase()
	{
		$cn = $_POST['courseName'];
		$cf = $_POST['courseFee'];
		$ow = $_SESSION['userID'];

		$conn = mysqli_connect("localhost","root","root","aceDatabase") or die (mysql_error());
		$sql = "INSERT INTO course(courseName, courseFee, courseOwner) VALUES('$cn', '$cf', '$ow')";
		echo ("<p>SQL QUERY: <pre>" . $sql . "</pre></p>");
		if (mysqli_query($conn, $sql))
		{
			echo ("<p style='color: green'>SUCCESS</p>");
		}
		else
		{
			echo ("<p style='color: red'>FAIL: ");
			echo (mysqli_error($conn) . "</p>");
		}
	}
?>
