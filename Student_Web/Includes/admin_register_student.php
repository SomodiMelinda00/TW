<!-- Layout Admin: Inscrie Student -->

<form method="POST" action="../../Includes/Includes-inc/admin-register-student-inc.php">

      <div class="input-field">
        <input type="text" id="lastname" name="lastname" required>
        <label>Nume:</label>
      </div>

      <div class="input-field">
        <input type="text" id="firstname" name="firstname" required>
        <label>Prenume:</label>
      </div>

      <div class="input-field">
        <input class="text" type="email" id="email" name="email" required>
        <label>E-mail:</label>
      </div>

      <div class="input-field">
        <input type="text" id="personalID" name="personalID" required>
        <label>CNP:</label>
      </div>

      <!-- Select year -->

      <select id="year" name="year" style="height:50px; width:100%; margin: 5px 0px 20px 0px;" required>
        <option value="" selected>Alege Anul:</option>
        <option value="1">I</option>
        <option value="2">II</option>
        <option value="3">III</option>
        <option value="4">IV</option>
      </select>

     <!-- Select faculty -->
      
      <select id="faculty" name="faculty" style="height:50px; width:100%; margin: 5px 0px 20px 0px;" required>
        <option value="" selected>Alege Facultatea:</option>
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

      <!-- Select specialization -->
      <select id="specialization" name="specialization" style="height:50px; width:100%; margin: 5px 0px 20px 0px;" required>
      	<option value="" selected>Alege Specializarea:</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
      </select>

      <button name="inscrie-student">Inscrie Student</button>

   
</form>