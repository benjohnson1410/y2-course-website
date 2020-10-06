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
    <title>Use Resources | Ace Training</title>

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
				<h2>Use Resources</h2>
				<?php
					if (!isset($_POST['courseID']))
					{
						if (isset($_POST['resourceID']))
						{
							showCourses();
						}
						else
						{
							showResources();
						}
					}
					else
					{
						doResourceForCourse();
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
	function showResources()
	{
		$conn = mysqli_connect("localhost","root","root","aceDatabase");
		$sql = "SELECT * from resource WHERE ownerID = '$_SESSION[userID]'";
		$result = mysqli_query($conn,$sql);
		echo ("<form id='useResources' name='useResources' method='post'
		       action='tutorUseResource.php'>
					 <select name='resourceID'>");

		while ($record = mysqli_fetch_array($result))
		   {
		   echo ("<option value='$record[resourceID]'>" . $record['resourceName'] . "</option>");
			}

		echo ("</select>
		<input type='submit' name='button' id='button' value='Submit' />
		</form>");
	}

	function showCourses()
	{
		$conn = mysqli_connect("localhost","root","root","aceDatabase");
		$sql = "SELECT * FROM course";
		$result = mysqli_query($conn,$sql);
		$courses = "";

		while ($record = mysqli_fetch_array($result))
		   {
		   $courses .= "<br /><input type='checkbox' name='courseID[]'
		                value='$record[courseID]'  />" . $record['courseName'];
		   }

		echo ("Please select the courses you want to share the resource to: ");
		echo ("<form name='form1' method='post' action='tutorUseResource.php' >");
		echo ("<input type='hidden' value='$_POST[resourceID]' name='resourceId' />");
		echo ($courses);
		echo ("<br /><input type='submit' name='button' id='button' value='Submit' />");
		echo ("</form>");echo ("</form>");
	}

	function doResourceForCourse()
	{
		$conn = mysqli_connect("localhost","root","root","aceDatabase");
		$rID = $_POST['resourceID'];
		foreach ($_POST['courseID'] as $cID)
	  {
	  	$sql = "INSERT INTO courseUsingResource (resourceID,
							courseID) VALUES ('$rID','$cId')";

		  if (mysqli_query($conn,$sql))
			{
				echo ("You have shared the resource with the course identified with this number: " . $cId);
		  }
	 	}
	}
?>
