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
    <title>Authorise Students | Ace Training</title>

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
      		include ("tutorCheck.php");
      	?>
      	<h2>Authorise Students</h2>
      	<p>This page allows you to authorise students onto your course(s).</p>
      	<?php
      		if (!isset($POST['studentID']))
      		{
      			if (!isset($_POST['courseID']))
      			{
      				getCourses();
      			}
      			else
      			{
      				getStudentTakingCourse();
      			}
      		}
      		else
          {
      			enrolStudent();
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
  function getCourses()
  {
    $userID = $_SESSION['userID'];
    $sql = "SELECT courseID, courseName FROM course WHERE courseOwner = $userID";

    if ($resource = doSQL($sql))
    {
      showCourses($resource);
    }
  }

  function showCourses($resource)
  {
    echo("
      <form name='showCourses' method='post' action='tutorAuthoStud.php'>
        <select name='courseID' required autofocus>
    ");

    while ($currentLine = mysqli_fetch_array($resource))
    {
      echo("<option value='$currentLine[courseID]'>$currentLine[courseName]</option>");
    }

    echo("
        </select>
        <input type='submit' onclick='submit' />
      </form>
    ");
  }

  function getStudentTakingCourse()
  {
    $courseID = $_POST['courseID'];
    $sql = "SELECT studentID FROM studentTaking WHERE courseID = $courseID AND authorised = 0";

    if ($resource = doSQL($sql))
    {
      getStudentDetails($resource);
    }
  }

  function getStudentDetails($resource)
  {
    $sql = "SELECT userID, userForename, userSurname FROM user WHERE ";

    while ($currentLine = mysqli_fetch_array($resource))
    {
			$sql .= "userID = '$currentLine[studentID]' OR ";
    }
    $sql = rtrim($sql," OR ");
    if ($resource = doSQL($sql))
    {
      showStudents($resource);
    }
  }

  function showStudents($resource)
  {
    $courseID = $_POST['courseID'];
    echo ("<form name='showStudents' method='post' action='tutorAuthoStud.php'>");
    echo ("<input type='hidden' name='courseID' value='$courseID' />");

    while ($currentLine = mysqli_fetch_array($resource))
    {
      echo ("<input type='checkbox' name='studentID[]' value='$currentLine[userID]' />");
      echo ($currentLine['userForename'] . ' ' . $currentLine['userSurname'] . '<br />');
    }

    echo ("<br /><input type='submit' onclick='submit' />
    </form>");
  }

  function enrolStudent()
  {
    $courseID = $_POST['courseID'];

    foreach ($_POST['studentID'] as $userID)
    {
      $sql = "UPDATE studentTaking SET authorised - 1 WHERE studentID = $userID AND courseID = $courseID";
      doSQL($sql);
    }
  }

  function doSQL($sql)
  {
    echo ("<p>SQL QUERY: <pre>" . $sql . "</pre></p>");
    $conn = mysqli_connect("localhost", "root", "root", "aceDatabase") or die (mysql_error());

    if ($resource = mysqli_query($conn,$sql))
    {
      echo ("<p style='color:green'>SUCCESS</p>");
      return $resource;
    }
    else
    {
      echo ("<p style='color:red'>FAIL: ");
      echo (mysqli_error($conn) . "</p>");
      return false;
    }
  }
?>
