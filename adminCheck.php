<?php
	if (session_status() === PHP_SESSION_NONE)
	{
		session_start();
	}
	if (!isset($_SESSION['userType']) or $_SESSION['userType'] != "admin")
	{
		echo ("<p style-'color:red'>You are not authorised to view this page<p>");
		return false;
		die();
	}
	else
	{
		return true;
	}
?>
