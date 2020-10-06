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
    <title>Enrol onto Course | Ace Training</title>

		<!-- FAVICON -->
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
		<link rel="icon" href="img/favicon.ico" type="image/x-icon">

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
        <h1>Register to a Course</h1>
				<p>This page allows you to register to courses provided by Ace Training.</p>
				<p><strong>NOTE: You cannot select more than three courses.</strong></p>
        <?php
          include ("studentCheck.php");
          if (isset($_POST['course']))
          {
          	addEnrolmentToDatabase();
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
    $conn = mysqli_connect('localhost', 'root', 'root', 'aceDatabase') or die(mysql_error());
		$sql = "SELECT courseID, courseName, courseFee FROM course";
		if (!$resource = mysqli_query($conn,$sql))
		{
			echo ("<p style='color:red'>FAIL: ");
			echo (mysqli_error($conn) . "</p>");
		}

		echo ("<form name='enrol' method='post' action='studentEnrolCourse.php'>");

		// Display all courses on the page using a while loop.
		while($currentCourse = mysqli_fetch_array($resource))
		{
			echo ("
				<input type='checkbox' name='course[]' value='$currentCourse[courseID]' /> $currentCourse[courseName], Cost: £$currentCourse[courseFee] <br />");
		}

		echo("
				<input type='submit' onclick='submit' />
			</form>
		");
  }

  function addEnrolmentToDatabase()
  {
    $course = $_POST['course'];
		$userID = $_SESSION['userID'];
		$today = date("Y-m-d");

		$conn = mysqli_connect("localhost","root","root","aceDatabase");

		// For each course enrolled to by a student, add to the studentTaking database.
		foreach ($course as $currentCourse)
		{
			$sql = "INSERT INTO studentTaking(courseID, studentID, dateRegistered, authorised)
			        VALUES('$currentCourse', '$userID', '$today', 0)";
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
  }
?>
