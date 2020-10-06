<?php
	$conn = mysqli_connect("localhost","root","root","aceDatabase");
	$sql = "CREATE TABLE nextOfKin (
		userID          INT NOT NULL AUTO_INCREMENT,
		nokForename     VARCHAR(35) NOT NULL,
		nokSurname      VARCHAR(35) NOT NULL UNIQUE,
		nokRelationship VARCHAR(35) NOT NULL,
		nokDaytimeTel   VARCHAR(15) NOT NULL,
		nokEveningTel   VARCHAR(15),
		nokMobile       VARCHAR(15) NOT NULL,

		CONSTRAINT nextOfKinTo FOREIGN KEY (userID) REFERENCES user(userID)
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
