<!-- Layout Admin: Adauga Note -->

<form method="POST" action="../../Includes/Includes-inc/admin-add-grades-inc.php">
	
      <div class="input-field">
        <input type="text" id="id-student" name="studentID" required>
        <label>ID Student:</label>
      </div>

      <select id="faculty" style="height:50px; width:100%; margin: 5px 0px 20px 0px;" name="faculty" required>
        <option value="Facultatea de Arte si Design">Facultatea de Arte si Design</option>
        <option value="Facultatea de Chimie,Biologie si Geografie">Facultatea de Chimie,Biologie si Geografie</option>
        <option value="Facultatea de Drept">Facultatea de Drept</option>
        <option value="Facultatea de Economie si de Administrare a Afacerilor">Facultatea de Economie și de Administrare a Afacerilor</option>
        <option value="Facultatea de Educatie Fizica si Sport">Facultatea de Educație Fizică și Sport</option>
        <option value="Facultatea de Fizica">Facultatea de Fizică</option>
        <option value="Facultatea de Litere, Istorie si Teologie">Facultatea de Litere, Istorie și Teologie</option>
        <option value="Facultatea de Matematică si Informatica">Facultatea de Matematică și Informatică</option>
        <option value="Facultatea de Muzică si Teatru">Facultatea de Muzică și Teatru</option>
        <option value="Facultatea de Sociologie si Psihologie">Facultatea de Sociologie și Psihologie</option>
        <option value="Facultatea de Stiinte Politice, Filosofie si Stiinte ale Comunicarii">Facultatea de Științe Politice, Filosofie și Științe ale Comunicării</option>
      </select>

      <!-- Select year -->

      <select id="year" style="height:50px; width:100%; margin: 5px 0px 20px 0px;" name="year" required>
        <option value="" selected>Alege Anul:</option>
        <option value="1">I</option>
        <option value="2">II</option>
        <option value="3">III</option>
        <option value="4">IV</option>
      </select>

      <!-- Select specialization -->
      <select id="specialization" style="height:50px; width:100%; margin: 5px 0px 20px 0px;" name="specialization" required>
      	<option value="" selected>Alege Specializarea:</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
      </select>

     <!-- Select faculty -->
      

      <select id="subject" style="height:50px; width:100%; margin: 5px 0px 20px 0px;" name="subject" required>
        <option value="" selected>Materia:</option>
        <option value="Materia A">Materia A</option>
        <option value="Materia B">Materia B</option>
        <option value="Materia C">Materia C</option>
        <option value="Materia D">Materia D</option>
        <option value="Materia E">Materia E</option>
        <option value="Materia F">Materia F</option>
      </select>

      <fieldset>
        <legend>Alege Notele Pe Care Le Vei Introduce:</legend>
        <div>
          <input type="checkbox" id="nota1" name="nota1" value="nota1">
          <label for="nota1" class="nota">Nota 1</label>
        </div>
        <div>
          <input type="checkbox" id="nota2" name="nota2" value="nota2">
          <label for="nota2" class="nota">Nota 2</label>
        </div>
      </fieldset>

     <select id="nota_1" style="height:50px; width:100%; margin: 5px 0px 20px 0px;" name="grade1">
        <option value="" selected>Nota 1:</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
      </select>

      <select id="nota_2" style="height:50px; width:100%; margin: 5px 0px 20px 0px;" name="grade2">
        <option value="" selected>Nota 2:</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
      </select>

      <button name="add-grade">Adauga Nota</button>

   
</form>