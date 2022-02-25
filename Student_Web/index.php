<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="Files/Styles/homePage_style.css">
	<title>Student Web | Home</title>
</head>
<body>

	<div id="home-container">

		<div id="welcome-text">Student Web</div>

		<div id="home-page-bttns-container">
			<a href="Files/PHP_files/login_secretariat.php" id="secretariat-href">Secretariat</a>	
			<a href="Files/PHP_files/login_student.php" id="student-href">Student</a>	
		</div>

	</div>

	<?php 
		session_start();
		
		/*
		if user (admin/ student) pressed logout bttn, they will be redirected to index.php?loggedOut=true
		in this case we will destroy the session

		if user modifies the value of logged out with anything else he will be redirected to page_not_found.php
		*/

		if(isset($_GET['loggedOut']))
			if($_GET['loggedOut']=='true')
				session_destroy();
			else
				header("Location: Files/PHP_Files/page_not_found.php");

	?>
	

</body>
</html>