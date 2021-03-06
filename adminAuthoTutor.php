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
    <title>Register | Ace Training</title>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/register.css">

    <!--
			Links to fonts. Montserrat will be used for headings, Maven Pro for link and
			buttons and Roboto for other text.
		-->
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Maven+Pro" rel="stylesheet">
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
      	<h2>Authorise Students</h2>
      	<p>This page allows you to authorise students onto your course(s).</p>
        <?php
          include ("tutorCheck.php");

          if (!isset($_POST['courseID']) AND !isset($_POST['studentID']))
          {
            if (!isset($_POST['forename']))
            {
              showForm();
            }
            else
            {
              addUserToDatabase();
              $studentID = getStudentID();
              $resource = getCourses();
              showCourses($resource, $studentID);
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
      include ("footer.php");
    ?>
  </body>
</html>
<?php
  function showForm()
  {
    echo ("
      <form name='register' method='post' action='tutorAddStud.php'>
        Forename         <input type='text' name='forename' /> <br />
        Surname          <input type='text' name='surname' /> <br />
        Email Address    <input type='text' name='email' /> <br />
        <input type='submit' onclick='submit' />
      </form>
    ");
  }

  function addUserToDatabase()
  {
    $fn = $_POST['forename'];
    $sn = $_POST['surname'];
    $em = $_POST['email'];

    $sql = "INSERT INTO user(userForename, userSurname, userEmail, userPassword, userType, userActive)
            VALUES('$fn', '$sn', '$em', '$em', 'student', 1)";

    doSQL($sql);
  }

  function getTutorID()
  {
    $em = $_POST['email'];
    $sql = "SELECT userID FROM user WHERE userEmail = '$em' AND userType = tutor";
    $record = mysqli_fetch_array(doSQL($sql));
    $studentID = $record['userID'];
    return $studentID;
  }

  function showCourses($resource, $studentID)
  {
    echo ("<form name='showCourses' method='post' action='tutorAddStud.php'>");

    while ($currentLine = mysqli_fetch_array($resource))
    {
      echo ("<input type='checkbox' name='courseID[]' value='$currentLine[courseID]' />");
      echo ($currentLine['courseName'] . '<br />');
    }

    echo ("<br />
        <input type='hidden' name='studentID' value='$studentID' />
        <input type='submit' onclick='submit' />
      </form>
    ");
  }

  function enrolStudent()
  {
    $course = $_POST['courseID'];
    $studentID = $_POST['studentID'];
    $today = date("Ymd");

    foreach ($course as $currentCourse)
    {
      $sql = "INSERT INTO studentTaking (courseID, userID, dateRegistered, authorised)
              VALUES ('$currentCourse', '$studentID', '$today', 1)";
      doSQL($sql);
    }
  }

  function doSQL($sql)
  {
    $conn = mysqli_connect("localhost","root","root","aceDatabase") or die(mysql_error());
    echo ("<p>SQL QUERY: <pre>" . $sql . "</pre></p>");
    if ($resource = mysqli_query($conn, $sql))
    {
      echo ("<p style='color: green'>SUCCESS</p>");
      return $resource;
    }
    else
    {
      echo ("<p style='color: red'>FAIL: ");
      echo (mysqli_error($conn) . "</p>");
      return false;
    }
  }
?>
