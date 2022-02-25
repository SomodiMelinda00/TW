<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@700&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="../../style.css">
	<link rel="stylesheet" type="text/css" href="../Styles/panel_style.css">

	<title>Student Web | Admin Page</title>
</head>
<body>

	<?php
		session_start();

		// if the admin didn't log in and accessed this page by modifying url parameters, they will be redirected to Page Not Found

		if(!$_SESSION['adminName'])
			header('Location:page_not_found.php');
	?>

	<div class="panel-container">

		<header>
			<div class="greetings">

				<h1>Salut, 
					<?php echo $_SESSION['adminName'] . '!'; ?> 
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
				<a href="?adauga-note=true" class="active"><li>Adauga Note</li></a>
				<a href="?inscrie-student=true"><li>Inscrie Student</li></a>
				<a href="?setari-admin=true"><li>Setari Admin</li></a>
				<a href="../../index.php?loggedOut=true"><li><i class="fas fa-sign-out-alt"></i></li></a>
			</ul>

			<div id="panel-container">
				<?php

				//by using different parameters from the URL we determine the panel of work for admin and redirect/require different files; if values of parameters are modified by user, we redirect to Page Not Found


				//Adauga Note

				if(isset($_GET['adauga-note']))

					//IF value set to true

					if($_GET['adauga-note']=='true'){
						require '../../Includes/admin_add_grades.php';
					}

					//IF value modified by user into something else
					else
						header("Location: page_not_found.php");


				//Inscrie Student

				else if(isset($_GET['inscrie-student']))
					if($_GET['inscrie-student']=='true')
						require '../../Includes/admin_register_student.php';
					else
						require '../../Includes/page_not_found.php';

				// Setari Admin - Needed Different Resources For Different Secondary Parameters Depending On The Settings User Wants To Make

				else if(isset($_GET['setari-admin']))
					if($_GET['setari-admin']=='true'){

						// Change admin name -> redirects to panel_secretariat.php??setari-admin=true&admin-name-change=true

						if(isset($_GET['admin-name-change']))

							//IF admin-name-change IS true we require name change panel
							if($_GET['admin-name-change']=='true')
								require '../../Includes/admin_settings_change_name.php';
							// IF admin modified value of admin-name-change we redirect to Page Not Found
							else
								header("Location: page_not_found.php");

						// AS ABOVE BUT FOR Email

						else if(isset($_GET['admin-email-change']))
							if($_GET['admin-email-change']=='true')
								require '../../Includes/admin_settings_change_email.php';
							else
								header("Location: page_not_found.php");

						// AS ABOVE BUT FOR Password


						else if(isset($_GET['admin-password-change']))
							if($_GET['admin-password-change']=='true')
								require '../../Includes/admin_settings_change_password.php';
							else
								header("Location: page_not_found.php");

						else
							require '../../Includes/admin_settings.php';

					}
					else
						header("Location: page_not_found.php");

				else if(isset($_GET['check-identity']))
					if($_GET['check-identity']=='true')
						require '../../Includes/check_identity.php';
					else
						header("Location: page_not_found.php");

				else
					require '../../Includes/admin_add_grades.php';
 
				?>
			</div>

		</div>

	</div>

	<script type="text/javascript" src="../JS_Files/change_panel.js"></script>
	<script type="text/javascript" src="../JS_Files/grades_inputs.js"></script>
	<script src="../JS_Files/show-password.js"></script>
	<script>

		// prevents form resubmission

	    if ( window.history.replaceState ) {
	        window.history.replaceState( null, null, window.location.href );
	    }
	</script>
</body>
</html>