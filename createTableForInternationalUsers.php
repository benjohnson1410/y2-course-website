<?php
	$conn = mysqli_connect("localhost","root","root","aceDatabase");
	$sql = "CREATE TABLE internationalUser (
		userID             INT NOT NULL AUTO_INCREMENT,
    userVisaExpiryDate DATE NOT NULL,
    userPassportNum    VARCHAR(9) NOT NULL,

		CONSTRAINT internationalUserID FOREIGN KEY (userID) REFERENCES user(userID)
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
