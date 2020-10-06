<?php
	if (session_status() == 0)
	{
		session_start();
	}
?>
<footer id="mainFoot">
	<h3>Where will you go next?</h3>
	<ul class="regLogIO">
		<?php
			logInOut();
		?>
	</ul>
	<ul class="policies">
		<li><a href="termsOfService.php">Terms of Service</a></li>
		<li><a href="privacyPolicy.php">Privacy Policy</a></li>
	</ul>
	<?php
		echo ("<p>Copyright &copy; Ace Training Ltd, 1992-" . date("Y") . ". All rights reserved.</p>");
	?>
</footer>
