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
    <title>Show Resources | Ace Training</title>

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
      		include ("tutorCheck.php");
					include ("studentCheck.php");
      	?>
				<h2>Use Resources</h2>
				<?php
					$conn = mysqli_connect("localhost","root","root","aceDatabase");
					$sql = "SELECT * FROM resource";
					$result = mysqli_query($conn,$sql);

					while ($record = mysqli_fetch_array($result))
					{
						echo ($record['name'] . "<br />" );
					}
				?>
			</div>
		</div>
		<?php
			include("footer.php");
		?>
	</body>
</html>
