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
        <h1>Register to a Course</h1>
        <?php
          if (isset($_POST['forename']))
          {
            addTutorToDatabase();
          }
          else
          {
            showForm();
          }
        ?>
      </div>
      <script src="js/checkRegistration.js"></script>
    </div>
  </body>
</html>
<?php
  function showForm()
  {
    echo ("
      <form name='register' method='post' action='register.php'>
        National Insurance Number <br />
        <input type='text' name='nINumber' /> <br />

        Office Address <br />
        <input type='text' name='offAddLine1' /> <br />
        <input type='text' name='offAddLine2' /> <br />
        <input type='text' name='offTown' /> <br />
        <input type='text' name='offCounty' /> <br />

        Office Postcode <br />
        <input type='text' name='offPostcode' /> <br />

        <input type='checkbox' value='policies' />
        I have read and agreed to the <a href='termsOfService.php'>Terms of Service</a> and
        <a href='privacyPolicy.php'>Privacy Policy</a> of Ace Training.
      </form>
    ");
  }

  function addTutorToDatabase()
  {
    $ni = $_POST['nINumber'];
    $o1 = $_POST['offAddLine1'];
    $o2 = $_POST['offAddLine2'];
    $ot = $_POST['offTown'];
    $oc = $_POST['offCounty'];
    $op = $_POST['offPostcode'];

    $conn = mysqli_connect("localhost","root","root","aceTraining");
		$sql = "INSERT INTO tutor(tutorNINumber, tutorOfficeAddressL1, tutorOfficeAddressL2,
      tutorOfficeTown, tutorOfficeCounty, tutorOfficePostcode, tutorAuthorised)
		        VALUES('$ni', '$o1', '$o2', '$ot', '$oc', '$op', 0)";
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
