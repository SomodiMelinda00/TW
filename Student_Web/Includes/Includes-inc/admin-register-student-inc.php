<?php

	function checkCNP($x){

		if(!(is_numeric($x)))
		//if CNP cnotains other values than digits
			return false;

		// if CNP's length is different than 13
		else if(strlen($x)!==13)
			return false;

		// if first digit different than 1,2,5 or 6
		else if($x[0]!= 1 and $x[0]!= 2 and $x[0]!= 5 and $x[0]!= 6)
			return false;

		// if MM > 13 or MM == 00 --> invalid month
		else if(($x[3].$x[4] == '00') or ((int)($x[3].$x[4])>12))
			return false;

		// if DD > 31 or DD == 00 --> invalid day
		else if(($x[5].$x[6] == '00') or ((int)($x[5].$x[6])>31))
			return false;

		// if MM > 48 or MM == 00 --> invalid county (Prefix judet inexistent)
		else if(($x[7].$x[8] == '00') or ((int)($x[7].$x[8])>48))
			return false;

		// if NNN = 000 (intre 001 - 999)
		else if($x[9].$x[10].$x[11] == '000')
			return false;
		else
			return true;
	}


	if(isset($_POST['inscrie-student'])){
		if(empty($_POST['year']) or empty($_POST['faculty']) or empty($_POST['specialization']))
			echo 'You must set a value for every field!';
		else if(!checkCNP($_POST['personalID']))
			echo "Invalid CNP!";
		else {

			require '../database.php';

			$firstName = $_POST['firstname'];
			$lastName = $_POST['lastname'];
			$email = $_POST['email'];
			$CNP = $_POST['personalID'];
			$year = $_POST['year'];
			$faculty = $_POST['faculty'];
			$specialization = $_POST['specialization'];

			// Will check if CNP already exist in DB to prevent errors

			$sql = "SELECT * FROM students WHERE CNP = ?";
			$stmt = mysqli_stmt_init($connection);

			if(!mysqli_stmt_prepare($stmt, $sql))
				echo "SQL Error!";
			else {

				mysqli_stmt_bind_param($stmt, "s", $CNP);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$rowCount = mysqli_stmt_num_rows($stmt);

				if($rowCount > 0)
					echo "Student already in Database!";
				else {

					//If CNP not in DB -> Student Not in DB -> Putem insera valorile 

					$sql = "INSERT INTO students (nume, prenume, email, CNP, an_studii, facultate, specializare) VALUES (?,?,?,?,?,?,?)";
					$stmt = mysqli_stmt_init($connection);

					if(!mysqli_stmt_prepare($stmt, $sql))
						echo '12';
					else {
						mysqli_stmt_bind_param($stmt, "sssssss", $firstName, $lastName, $email, $CNP, $year, $faculty, $specialization);
						mysqli_stmt_execute($stmt);

						header("Location: ../../Files/PHP_Files/panel_secretariat.php?inscrie-student=true&student_registered=success");
						echo 1;

					}
				}

			}

		}
	}
	else{
		echo "Access Forbidden!";
		exit();
	}


?>