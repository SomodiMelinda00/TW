<br><br>
<h2>Mai jos poti observa notele tale din acest semestru.</h2>
<br><br>


<table>
	<thead>
		<th>Disciplina</th>
		<th>Nota 1</th>
		<th>Nota 2</th>
		<th>Media</th>
	</thead>
	<tbody>
		<?php 

			// Media notelor (daca exista ambele); daca nu exista doua note se afiseaza -

			function med($x, $y){
				if($x == 0 or $y ==0)
					return '-';
				else return ceil(($x+$y)/2);

			}

			require 'database.php';

			$ID = $_SESSION['studentID'];

			$sql = "SELECT * FROM grades WHERE ID = ?";
			$stmt = mysqli_stmt_init($connection);

			if(!mysqli_stmt_prepare($stmt, $sql)){
				echo "SQL Error!";
			} else {

					mysqli_stmt_bind_param($stmt, "s", $ID);
					mysqli_stmt_execute($stmt);
					$result = mysqli_stmt_get_result($stmt);

					// gets all rows with grades for a student id (passed from session)

					while($row = mysqli_fetch_assoc($result)){

							//won't show '0' grades (not updated ones) -> will replace them with "-"

							if($row['nota1']==0) $g1 = '-';
								else $g1 = $row['nota1'];

							if($row['nota2']==0) $g2 = '-';
								else $g2 = $row['nota2'];

							echo "
							<tr>
								<td class='subject'>$row[materie]</td>
								<td class='grade1'>$g1</td>
								<td class='grade2'>$g2</td>

								<td class='average'>" . med($row['nota1'], $row['nota2']) . "</td>
							</tr>


							";
					}

			}
		 ?>
		
	</tbody>
</table>
<br><br>