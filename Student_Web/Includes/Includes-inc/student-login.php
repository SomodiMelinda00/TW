<?php
	
	if(isset($_POST['login'])){
		require '../database.php';

		$email = $_POST['email'];
		$password = $_POST['password'];


		$sql = "SELECT * FROM students WHERE email = ?";
		$stmt = mysqli_stmt_init($connection);

		if(!mysqli_stmt_prepare($stmt, $sql)){
			echo "SQL Error!";
			exit();
		} else {

				mysqli_stmt_bind_param($stmt, "s", $email);
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);

				//Check if Student Email Exists in DB

				if($row = mysqli_fetch_assoc($result)){

					// Check if: parola introdusa == ultimele 4 cifre de la CNP

					$passCheck = $password == ($row['CNP'][9].$row['CNP'][10].$row['CNP'][11].$row['CNP'][12]);

					if($passCheck == false){
						echo "Wrong password!";
						exit();
					} elseif($passCheck == true) {

						session_start();

						$_SESSION['studentID'] = $row['ID'];
						$_SESSION['studentName'] = $row['nume'];
						$_SESSION['studentEmail'] = $row['email'];

						date_default_timezone_set('Europe/Bucharest');
						$_SESSION['loginTime'] = date('d-m-Y H:i:s ', time());
						
						header("Location: ../../Files/PHP_Files/panel_student.php");

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

		}

	else{
		echo "Access Forbidden!";
		exit();
	}


?>