<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@700&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="../../style.css">
	<link rel="stylesheet" type="text/css" href="../Styles/login_style.css">
	<title>Student Web | Login - Secretariat</title>
</head>
<body>


	<div id="admin-login-container">
		<div class="login-panel">

		    <header>Admin Login</header>

		    <form method="POST" action="../../Includes/Includes-inc/admin_login.php?adauga-note=true">

		      	<div class="input-field email-field">
			        <input type="email" name="email" required>
			        <label>Email</label>
		      	</div>

		      	<div class="input-field pass-field">
			        <input class="pswrd" type="password" name="password" required id="password-field">
			        <span class="show" id="show-bttn">SHOW</span>
			        <label>Parola</label>
		      	</div>

		      	<div class="input-field security-field">
		          	<input type="text" name="security_code" required>
		          	<label>Cod De Securitate</label>
		      	</div>

		      <button name="login">Login</button>
		    </form>

		</div>
	</div>

<script src="../JS_Files/show-password.js"></script>


</body>
</html>