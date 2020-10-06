<?php
	$conn = mysqli_connect("localhost","root","root","aceDatabase");
	$sql = "CREATE TABLE tutor (
		tutorID              INT NOT NULL,
		tutorNINumber        VARCHAR(12) NOT NULL UNIQUE,
		tutorOfficeAddressL1 VARCHAR(35) NOT NULL,
		tutorOfficeAddressL2 VARCHAR(35) NOT NULL,
		tutorOfficeTown      VARCHAR(35) NOT NULL,
		tutorOfficeCounty    VARCHAR(35) NOT NULL,
		tutorOfficePostcode  VARCHAR(15) NOT NULL UNIQUE,
		agreedToRights       BOOLEAN NOT NULL,
		tutorAuthorised      BOOLEAN NOT NULL,

		CONSTRAINT tutorID FOREIGN KEY (tutorID) REFERENCES user(userID)
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
