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
    <title>Add Tutors | Ace Training</title>

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
    ?>
    <div class="container">
      <div id="regForm">
        <?php
      		include ("adminCheck.php");
      	?>
      	<h2>Add Tutors</h2>
      	<p>This page allows you to authorise tutors.</p>
      	<?php
          if (!isset($_POST['userID']))
          {
            if (!isset($_POST['forename']))
            {
              showForm();
            }
            else
            {
							addUserToDatabase();
							$tutorID = getTutorID();
            }
          }
          else
          {
            enrolTutor();
          }
        ?>
      </div>
      <script src="js/checkRegistration.js"></script>
    </div>
    <?php
      include("footer.php");
    ?>
  </body>
</html>
<?php
	function showForm()
	{
		echo ("
			<form name='register' method='post' action='adminAddTutor.php'>
				Forename <br />
				<input type='text' name='forename' /> <br />
				Surname <br />
				<input type='text' name='surname' /> <br />
				Email Address <br />
				<input type='text' name='email' /> <br />
				<input type='submit' onclick='submit' />
			</form>
		");
	}

	function addUserToDatabase()
	{
		$fn = $_POST['forename'];
		$sn = $_POST['surname'];
		$em = $_POST['email'];

		$sql = "UPDATE user SET authorised = 1 WHERE userEmail = '$em'";

		doSQL($sql);
	}

	function getTutorID()
	{
		$em = $_POST['email'];
		$sql = "SELECT userID FROM user WHERE userEmail = '$em'";
		$record = mysqli_fetch_array(doSQL($sql));
		$tutorID = $record['userID'];
		return $tutorID;
	}

	function enrolTutor()
	{
		$tutorID = $_POST['userID'];

		$sql = "UPDATE user SET authorised = 1 WHERE userID = '$tutorID'";
		doSQL($sql);
	}

	function doSQL($sql)
	{
		$conn = mysqli_connect("localhost","root","root","aceDatabase");
		echo ("<p>SQL QUERY: <pre>" . $sql . "</pre></p>");
		if (mysqli_query($conn, $sql))
		{
			echo ("<p style='color: green'>SUCCESS</p>");
			return true;
		}
		else
		{
			echo ("<p style='color: red'>FAIL: ");
			echo (mysqli_error($conn) . "</p>");
			return false;
		}
	}
?>
