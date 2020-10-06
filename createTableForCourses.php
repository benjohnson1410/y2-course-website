<?php
	$conn = mysqli_connect("localhost","root","root","aceDatabase");
	$sql = "CREATE TABLE course (
			courseID    INT NOT NULL AUTO_INCREMENT,
      courseName  VARCHAR(50) NOT NULL,
			courseFee   DECIMAL(5,2) NOT NULL,
      courseOwner INT NOT NULL,

      PRIMARY KEY (courseID),
      FOREIGN KEY (courseOwner) REFERENCES user(userID)
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
