<?php

	// IF Clicked Adauga Nota:
	
	if(isset($_POST['add-grade'])){

		// Check if ID (of Student)
		if(is_numeric($_POST['studentID']))
			if($_POST['grade1'] or $_POST['grade2'])
				{

					require '../database.php';

					$ID = $_POST['studentID'];
					$faculty = $_POST['faculty'];
					$year = $_POST['year'];
					$specialization = $_POST['specialization'];

					// Check For Student in students table by using ID

					$sql = "SELECT * FROM students WHERE ID = ?";
					$stmt = mysqli_stmt_init($connection);


					// if couldn't connect to DB 
					if(!mysqli_stmt_prepare($stmt, $sql)){
						echo "SQL Error!";
					} else {
						mysqli_stmt_bind_param($stmt, "s", $ID);
						mysqli_stmt_execute($stmt);
						$result = mysqli_stmt_get_result($stmt);

						$row = mysqli_fetch_assoc($result);

						// IF found student in students table

						//echo $row;

						if($row) {

							// check if selected "Facultate", "An Studii" and "Specializare" match with values in DB

							if($row['facultate'] == $faculty and $row['an_studii'] == $year and $row['specializare'] == $specialization){

									$subject = $_POST['subject'];
									$grade1 = $_POST['grade1'];
									$grade2 = $_POST['grade2'];

									// Check if there are already other records for "Materie" for searched Student

									$sql_chk = "SELECT * FROM grades WHERE ID=? AND materie = ?";

									if(!mysqli_stmt_prepare($stmt, $sql_chk))
										echo "SQL Error!";
									else {

										mysqli_stmt_bind_param($stmt, "ss", $ID, $subject);
										mysqli_stmt_execute($stmt);
										$result_chk = mysqli_stmt_get_result($stmt);

										$row_chk = mysqli_fetch_assoc($result_chk);

										// If Found Other records, it means another grade is already there so we'll need to update the row with one grade (or maybe even two if the recorded one was initially wrong)

										if($row_chk){

											if($grade1){

												$sql_update = "UPDATE grades SET nota1=" . $grade1 . " WHERE ID=" . $ID . " AND materie='" . $subject . "'";

												echo $sql_update;

												$stmt = mysqli_stmt_init($connection);

												if(!mysqli_stmt_prepare($stmt, $sql_update))
												    echo "SQL Error!";
												else {
												        if(mysqli_query($connection, $sql_update)){
												          
												          header("Location: ../../Files/PHP_Files/panel_secretariat.php?adauga-note=true&added-grade=success");
												        } else
												          echo "There was an error! We couldn't set the grade.";

												}
											}  

											if($grade2){

												$sql_update = "UPDATE grades SET nota2=" . $grade2 . " WHERE ID=" . $ID . " AND materie='" . $subject . "'";

												$stmt = mysqli_stmt_init($connection);

												if(!mysqli_stmt_prepare($stmt, $sql_update))
												    echo "SQL Error!";
												else {
												        if(mysqli_query($connection, $sql_update)){
												          
												          header("Location: ../../Files/PHP_Files/panel_secretariat.php?adauga-note=true&added-grade=success");
												        } else
												          echo "There was an error! We couldn't set the grade.";

												}
											}

										} else { // No records for "Materie" for Student --> Needs Inserting the row with grades and subject ("Materie")

											$sql_set = "INSERT INTO grades (ID, materie, nota1, nota2) VALUES (?,?,?,?)";

											if(!mysqli_stmt_prepare($stmt, $sql_set))
											    echo "SQL Error!";
											else {
											    mysqli_stmt_bind_param($stmt, "ssss", $ID, $subject, $grade1, $grade2);
											    mysqli_stmt_execute($stmt);

											    header("Location: ../../Files/PHP_Files/panel_secretariat.php?adauga-note=true&added-grade=success");

											}  
										}

									}


							} else 
								echo "Succes!";

						} else 
							echo "Success!";
					}

				}
			else
				echo "Select at least one grade!";
		else
			echo "Invalid Student ID!";
	}
	else
		echo 'Access Forbidden!';

	
?>