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
            addIntUserToDatabase();
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
      <form name='register' method='post' action='registerIntUser.php'>
        Visa Expiry Date <br />
        <input type='date' id='visaExpiryDate' name='visaExpires' /> <br />

        Passport Number <br />
        <input type='text' id='passportNum' name='passportNum' /> <br />

        <button class='submit' type='submit' name='submit'>
          <i class='material-icons'>navigate_next</i>
        </button>
        <label>Next</label>
        <button class='clear' type='reset' name='clear'>
          <i class='material-icons'>clear</i>
        </button>
        <label>Clear</label>
      </form>
    ");
  }

  function addIntUserToDatabase()
  {
    $ve = $_POST['visaExpires'];
    $pn = $_POST['passportNum'];

    $conn = mysqli_connect("localhost","root","root","aceDatabase") or die (mysql_error());
		$sql = "INSERT INTO internationalUser(userVisaExpiryDate, userPassportNum)
		        VALUES($ve, $pn)";
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
