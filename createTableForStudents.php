<?php
	$conn = mysqli_connect("localhost","root","root","aceDatabase");
	$sql = "CREATE TABLE student (
		studentID         INT NOT NULL,
		agreedToRights BOOLEAN NOT NULL,
    studentAuthorised BOOLEAN NOT NULL,

		CONSTRAINT studentID FOREIGN KEY (studentID) REFERENCES user(userID)
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
