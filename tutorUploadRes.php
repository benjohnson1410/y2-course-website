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
    <title>Upload Resources | Ace Training</title>

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
				<h2>Upload Resources</h2>
				<?php
					if (isset($_POST['name']))
					{
						uploadFile();
					}
					else
					{
						showForm();
					}
				?>
			</div>
		</div>
		<?php
			include("footer.php");
		?>
	</body>
</html>
<?php
	function showForm()
	{
		echo("
			<form class='upload' action='tutorUploadRes.php' method='post' enctype='multipart-form-data'>
				<label for='fileName'>Resource Name</label> <br />
				<input type='text' name='name' id='fileName'> <br />

				<label for='dateFrom'>Available From (optional)</label> <br />
				<input type='date' name='availableFrom' id='dateFrom'> <br />

				<label for='dateTo'>Available Until (optional)</label> <br />
				<input type='date' name='availableTo' id='dateTo'> <br />

				<label for='file'>Choose Resource</label> <br />
				<input type='file' name='file' id='file'> <br />

				<button type='submit' name='submit'>Upload</button>
			</form>
		");
	}

	function uploadFile()
	{
		if ($_FILES["file"]["error"] > 0)
		{
			echo "Error: " . $_FILES["file"]["error"] . "<br />";
		}
		else
		{
			move_uploaded_file($_FILES["file"]["tmp_name"],
			"uploads/" . $_FILES["file"]["name"]);
			echo "Uploaded to " . "uploads/" . $_FILES["file"]["name"];
		}

		$conn = mysqli_connect ("localhost","root","root","aceDatabase");
		$name = $_POST['name'];
		$df = $_POST['availableFrom'];
		$dt = $_POST['availableTo'];
		$file = $_FILES["file"]["name"];
		$ow = $_SESSION['userID'];

		$sql = "INSERT INTO resource (name, dateFrom, dateTo, ownerID) VALUES ('$name', '$df', '$dt', '$ow')";

		mysqli_query ($conn,$sql) or die (mysqli_error($conn));
	}
?>
