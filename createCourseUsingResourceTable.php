<?php
	$conn = mysqli_connect("localhost","root","root","aceDatabase");
	$sql = "CREATE TABLE courseUsingResource (
			resourceID    INT NOT NULL,
      courseID      INT NOT NULL,

			FOREIGN KEY (resourceID) REFERENCES resource(resourceID)
			ON UPDATE CASCADE ON DELETE RESTRICT,
			FOREIGN KEY (courseID) REFERENCES course(courseID)
			ON UPDATE CASCADE ON DELETE RESTRICT
		)";
	echo ("<p>SQL QUERY: <pre>" . $sql . "</pre></p>");
	if (mysqli_query($conn,$sql))
	{
		echo ("<p style='color:green'>SUCCESS</p>");
	}
	else
	{
		echo ("<p style='color:red'>FAIL: ");
		echo (mysqli_error($conn) . "</p>");
	}
?>
