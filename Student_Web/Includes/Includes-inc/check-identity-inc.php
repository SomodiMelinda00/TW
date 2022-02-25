<!-- Layout Confirmare Identitate -->

<br><br><h2 class="settings-txt">Introdu urmatoarele date pentru a confirma modificarea:</h2><br><br>

<form method="POST" action="?check-identity=true&confirm=true">
	   <div class="input-field">
        <input type="text" id="email" name="confirmation-email" required>
        <label>Email-ul Curent:</label>
      </div>
      <div class="input-field">
        <input type="password" id="password" name="confirmation-password" required>
        <label>Parola Curenta:</label>
      </div>
	<button name="confirm">Confirma</button>
</form>
