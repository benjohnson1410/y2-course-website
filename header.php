<?php
	if (session_status() == 0)
	{
		session_start();
	}
?>
<header id="mainHead">
	<div id="headContain">
		<a href="index.php" class="aceLogo">
			<img src="img/whiteLogo.png" alt="Ace Training" class="logo" draggable="false" />
			<h1 id="logoText">Ace Training</h1>
		</a>
		<nav class="headNav">
			<label for="showNav" class="material-icons">more_vert</label>
			<input type="checkbox" id="showNav" />
			<ul class="mainNav">
				<li><a href="#about">About</a></li>
				<li class="dropDown">
						<a href="#courses">Courses</a>
						<ul id="dropDownMenu" class="dropDownContent">
							<li><a href="courses.php#sectionD">Databases</a></li>
							<li><a href="courses.php#ectionN">Networks</a></li>
							<li><a href="courses.php#sectionS">Software</a></li>
							<li><a href="courses.php#sectionW">Websites</a></li>
						</ul>
				</li>
				<li><a href="#contact">Contact</a></li>
				<?php
					selectMenu();
					logInOut();
				?>
			</ul>
		</nav>
	</div>
</header>

<?php
	function logInOut()
	{
		if (!isset($_SESSION['userType']))
		{
			// The following list items will be displayed if the user
			// is not logged in.
			echo ("
				<li><a href='register.php'>Register</a></li>
				<li><a href='login.php'>Login</a></li>
			");
		}
		else
		{
			// This list item will be displayed if the user is logged in.
			echo ("<li><a href='logout.php'>Logout</a></li>");
		}
	}

	function selectMenu()
	{
		if (isset($_SESSION['userType']))
		{
			if ($_SESSION['userType'] == 'admin')
			{
				adminMenu();
			}
			else if ($_SESSION['userType'] == 'tutor')
			{
				tutorMenu();
			}
			else if ($_SESSION['userType'] == 'student')
			{
				studentMenu();
			}
		}
	}

	function adminMenu()
	{
		echo ("
			<li><a href='adminHome.php'>Options</a>
				<ul class='adminDropDown'>
					<li><a href='adminShowUsers.php'>Show Users</a></li>
					<li><a href='adminAddTutor.php'>Add Tutors</a></li>
				</ul>
			</li>
		");
	}

	function tutorMenu()
	{
		echo ("
			<li><a href='tutorHome.php'>Options</a>
				<ul class='tutorDropDown'>
					<li><a href='tutorShowUsers.php'>Show Users</a></li>
					<li><a href='tutorNewCourse.php'>Add New Course</a></li>
					<li><a href='tutorUploadRes.php'>Upload a Resource</a></li>
					<li><a href='tutorAuthoStud.php'>Authorise Students</a></li>
					<li><a href='tutorAddStud.php'>Add Students</a></li>
				</ul>
			</li>
		");
	}

	function studentMenu()
	{
		echo ("
			<li><a href='studentHome.php'>Options</a>
				<ul class='studentDropDown'>
					<li><a href='studentEnrolCourse.php'>Enrol on Course</a></li>
				</ul>
			</li>
		");
	}
?>
