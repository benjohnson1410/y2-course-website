<?php
	$conn = mysqli_connect("localhost","root","root","aceDatabase");
	$sql = "CREATE TABLE user (
		userID               INT NOT NULL AUTO_INCREMENT,
		userForename         VARCHAR(50) NOT NULL,
		userSurname          VARCHAR(50) NOT NULL,
		userGender           VARCHAR(1) NOT NULL,
		userAddressL1        VARCHAR(35) NOT NULL,
		userAddressL2        VARCHAR(35),
		userTown             VARCHAR(35),
		userCounty           VARCHAR(35) NOT NULL,
		userPostcode         VARCHAR(15) NOT NULL,
		userCountry          VARCHAR(2) NOT NULL,
		userVisaExpiryDate   DATE,
    userPassportNum      VARCHAR(9),
		userPhone            VARCHAR(15) NOT NULL,
		userDateOfBirth      DATE NOT NULL,
		userEmail            VARCHAR(50) NOT NULL,
		userPassword         VARCHAR(50) NOT NULL,
		userRegDate          DATE NOT NULL,
		userType             VARCHAR(8) NOT NULL,
		userActive           BOOLEAN NOT NULL,
		nokForename          VARCHAR(35),
		nokSurname           VARCHAR(35),
		nokRelationship      VARCHAR(35),
		nokDaytimeTel        VARCHAR(15),
		nokEveningTel        VARCHAR(15),
		nokMobile            VARCHAR(15),
		tutorNINumber        VARCHAR(12),
		tutorOfficeAddressL1 VARCHAR(35),
		tutorOfficeAddressL2 VARCHAR(35),
		tutorOfficeTown      VARCHAR(35),
		tutorOfficeCounty    VARCHAR(35),
		tutorOfficePostcode  VARCHAR(15),
		agreedToRights       BOOLEAN NOT NULL,
		authorised           BOOLEAN,

		PRIMARY KEY (userID)
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
