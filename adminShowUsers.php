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
    <title>Show Users | Ace Training</title>

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
      	<h2>Show Users</h2>
      	<p>This page allows you to see a list of every user on the system.</p>
        <?php
      		$conn = mysqli_connect("localhost", "root", "root", "aceDatabase") or die (mysql_error());
      		$sql = "SELECT * FROM USER";
      		echo ("<p>SQL QUERY: <pre>" . $sql . "</pre></p>");

      		if ($resource = mysqli_query($conn,$sql))
      		{
      			echo ("<p style='color:green'>SUCCESS</p>");
      			display($resource);
      		}
      		else
      		{
      			echo ("<p style='color:red'>FAIL: ");
      			echo (mysqli_error($conn) . "</p>");
      		}

      		function display($resource)
      		{
            echo ("<table class='userTable'>
              <tr>
                <th>ID Number</th>
                <th>Forename</th>
                <th>Surname</th>
                <th>Email Address</th>
                <th>User Type</th>
              </tr>
            ");
      			while ($currentLine = mysqli_fetch_array($resource))
      			{
              echo ("<tr>");
      				echo ("<td>" . $currentLine['userID'] . "</td>");
      				echo ("<td>" . $currentLine['userForename'] . "</td>");
      				echo ("<td>" . $currentLine['userSurname'] . "</td>");
      				echo ("<td>" . $currentLine['userEmail'] . "</td>");
              echo ("<td>" . $currentLine['userType'] . "</td>");
              echo ("</tr>");
      			}
            echo ("</table>");
      		}
      	?>
      </div>
    </div>
    <?php
      include("footer.php");
    ?>
  </body>
</html>
