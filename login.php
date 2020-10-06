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
    <title>Login | Ace Training</title>

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
      <div id="loginForm">
        <?php
          if (!isset($_POST['email']))
          {
            showLogin();
          }
          else
          {
            doLogin();
          }
        ?>
      </div>
    </div>
		<?php
			include ("footer.php");
		?>
  </body>
</html>
<?php
	function showLogin()
	{
		echo ("
			<form name='login' method='post' action='login.php'>
        Email <br />
        <input type='text' name='email' /><br />

        Password <br />
        <input type='password' name='password' /><br />

				<input type='submit' name='submit' /><br />
			</form>
		");
	}

	function doLogin()
	{
		$em = $_POST['email'];
		$pw = $_POST['password'];
		$conn = mysqli_connect("localhost", "root", "root", "aceDatabase") or die (mysql_error());
		$sql = "SELECT userID, userType FROM user
		        WHERE userEmail = '$em' AND userPassword = '$pw'";

		if ($resource = mysqli_query($conn,$sql))
		{
			echo ("<p style='color:green'>SUCCESS</p>");
			checkLogin($resource);
		}
		else
		{
			echo ("<p style='color:red'>FAIL: ");
			echo (mysql_error($conn) . "</p>");
		}
	}

	function checkLogin($resource)
	{
		if (mysqli_num_rows($resource) == 1)
		{
			$row = mysqli_fetch_array($resource);
			$_SESSION['userType'] = $row['userType'];
			$_SESSION['userID'] = $row['userID'];
			echo ("<p style='color:green'>LOGIN SUCCESS</p>");
			showLinkToUserPage();
		}
		else
		{
			echo ("<p style='color:red'>LOGIN FAIL: ");
		}
	}

	function showLinkToUserPage()
	{
		if ($_SESSION['userType'] == 'tutor')
		{
			echo("<a href='tutorHome.php'>Click here for tutor home page</a>");
		}
		else if ($_SESSION['userType'] == 'student')
		{
			echo("<a href='studentHome.php'>Click here for student home page</a>");
		}
		else if ($_SESSION['userType'] == 'admin')
		{
			echo("<a href='adminHome.php'>Click here for administrator home page</a>");
		}
		else
		{
			echo("a href='login.php'>Something went wrong... Retry Login</a>");
		}
	}
?>
