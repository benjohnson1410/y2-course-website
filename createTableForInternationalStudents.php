<?php
	$conn = mysqli_connect("localhost","root","root","aceDatabase");
	$sql = "CREATE TABLE internationalStudent (
		userID             INT NOT NULL AUTO_INCREMENT,
    userCountry        VARCHAR(50) NOT NULL,
    userVisaExpiryDate DATE NOT NULL,
    userPassportNum    INT(9) NOT NULL,

		CONSTRAINT internationalStudentID FOREIGN KEY (userID) REFERENCES user(userID)
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
