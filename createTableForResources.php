<?php
	$conn = mysqli_connect("localhost","root","root","aceDatabase");
	$sql = "CREATE TABLE resource (
			resourceID    INT NOT NULL AUTO_INCREMENT,
      resourceName  VARCHAR(50) NOT NULL,
			dateFrom      DATE,
			dateTo        DATE,
      ownerID       INT NOT NULL,

      PRIMARY KEY (resourceID),
      FOREIGN KEY (ownerID) REFERENCES user(userID)
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
