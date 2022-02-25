<?php

if(isset($_POST['login'])){

	require '../database.php';

	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM admins WHERE email = ?";
	$stmt = mysqli_stmt_init($connection);

	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo "SQL Error!";
		exit();
	} else {

		mysqli_stmt_bind_param($stmt, "s", $email);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		// Check if admin email in DB


		if($row = mysqli_fetch_assoc($result)){

			if (password_verify($password, $row['parola'])){
				$passCheck = true;
			}
			else
				$passCheck = false;
			//$passCheck = $password == $row['parola'];


			// Check if Password match with DB Pass
			if($passCheck == false){
				echo "Wrong password!";
				exit();
			} elseif($passCheck == true) {

				// No Check For 2fA

				session_start();

				$_SESSION['adminId'] = $row['ID'];
				$_SESSION['adminName'] = $row['nume'];
				$_SESSION['adminEmail'] = $row['email'];

				date_default_timezone_set('Europe/Bucharest');
				$_SESSION['loginTime'] = date('d-m-Y H:i:s ', time());
				
				header("Location: ../../Files/PHP_Files/panel_secretariat.php");

				exit();

			} else {
				echo "Wrong password!";
				exit();
			}

		} else {
			echo "No User Found!";
			exit();
		}

	}
	

} else{

	echo "Access Forbidden!";
	exit();

}
