<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@700&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="../../style.css">
	<link rel="stylesheet" type="text/css" href="../Styles/panel_style.css">
	<link rel="stylesheet" type="text/css" href="../Styles/grades_panel_style.css">

	<title>Student Web | Student Page</title>
</head>
<body>

	<?php
		session_start();
	?>

	<?php

		/// if the admin didn't log in and access this page by modifying url parameters, they will be redirected to Page Not Found

		if(!isset($_SESSION['studentName']))
			header("Location: page_not_found.php")
	?>


	<div class="panel-container">

		<header>
			<div class="greetings">
				<h1>Salut, 
					<?php echo $_SESSION['studentName'] . '!'; ?>
				</h1><br>
				<h3>Ce faci astazi?</h3>
			</div>
			<div class="login_details">
				<span>Ultima accesare: </span>&nbsp;
				<span class="login_time"><?php echo $_SESSION['loginTime']; ?></span>
			</div>
		</header>

		<div id="work-panel">
			<ul>
				<a href="?verifica-note=true" class="active"><li>Notele mele</li></a>
				<a href="../../index.php?loggedOut=true"><li><i class="fas fa-sign-out-alt"></i></li></a>
			</ul>

			<div id="panel-container">
				<?php

				//If student clicks on Notele Mele he will be redirected to panel_student.php?verifica-note=true
				if(isset($_GET['verifica-note']))

					// if value of verifica-note is true we require grades panel page
					if($_GET['verifica-note']=='true'){
						require '../../Includes/student_check_grades.php';
					}

					// if student modifies value of verifica-note ---> Page Not Found
					else
						header("Location: page_not_found.php");

				// If user (student) didn't click on Notele Mele, it means he's still on grades checking page (redirected there since he pressed Log In Bttn). In this case we still need to display grades panel page

				else
					require '../../Includes/student_check_grades.php';
 
				?>
			</div>

		</div>

	</div>

	<script type="text/javascript" src="../JS_Files/change_panel.js"></script>
</body>
</html>