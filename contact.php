<section id="contact">
	<div id="contactBody">
		<h1>Contact Us</h1>
		<form class="contact">
			<h2>Email Us</h2>
			<!-- CONTACT FORM -->
			<?php
				include ("contactProcess.php")
			?>

			<label>Forename: </label><br />
			<fieldset>
				<input class="name" id="forename" type="text" name="forename" required placeholder="Enter your first name here..." />
			</fieldset>

			<label>Surname: </label><br />
			<fieldset>
				<input class="name" id="surname" type="text" name="name" required placeholder="Enter your surname here..." />
			</fieldset>

			<label>Email: </label><br />
			<fieldset>
				<input class="email" id="email" type="text" name="email" required placeholder="Enter your email address here..." />
			</fieldset>

			<label>Confirm Email: </label><br />
			<fieldset>
				<input class="email" id="cEmail" type="text" name="confirm" required placeholder="Confirm your email address here..." />
			</fieldset>

			<label>Subject: </label><br />
			<fieldset>
				<input class="subject" id="emSubject" type="text" name="subject" required placeholder="Enter your subject here..." />
			</fieldset>

			<label>Comment: </label><br />
			<fieldset>
				<textarea id="comment" class="comment" name="comment" required placeholder="Enter your message here..."></textarea>
			</fieldset>

			<fieldset>
				<button id="submit" type="submit" name="submit">
					<i class="material-icons">done</i>
				</button>
				<label for="submit">Submit</label>
				<button id="clear" type="reset" name="clear">
					<i class="material-icons">clear</i>
				</button>
				<label for="clear">Clear</label>
			</fieldset>
		</form>
		<!-- OTHER METHODS OF CONTACT -->
		<div id="other">
			<h2>Locations</h2>
			<div id="map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2378.5206616032337!2d-2.934254084779209!3d53.4055139779797!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487b21b04e599177%3A0x3829dcaa7e2e2666!2sWavertree+Technology+Park!5e0!3m2!1sen!2suk!4v1519844649791" width="100%" height="200" style="border:0" allowfullscreen></iframe>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2374.677545437721!2d-2.2515804945630253!3d53.474222714885805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487bb1e892818b33%3A0x735027dfe3286d6!2s4+Whitworth+St+W%2C+Manchester+M1+5WY!5e0!3m2!1sen!2suk!4v1519844573840" width="100%" height="200" style="border:0" allowfullscreen></iframe>
			</div>
			<div class="location ho">
				<h3>Head Office</h3>
				<p>Unit 6A<br />Wavertree Technology Park<br />Liverpool<br />Merseyside<br />L13 1EJ</p>
			</div>
			<div class="location tc">
				<h3>Training Centre</h3>
				<p>4A Whitworth St<br />Manchester<br />M1 3QW</p>
			</div>

			<div class="other">
				<p><strong>Phone:</strong> 0151 291 3000</p>
				<p><strong>Fax:</strong> 151 291 2127</p>
				<p><strong>Email:</strong> info@ace.com</p>
			</div>
		</div>
	</div>
</section>

<!--
	CREDITS:
	Background image (embedded through CSS): Photo by Negative Space from Pexels
	https://www.pexels.com/photo/marketing-office-working-business-33999/
-->
