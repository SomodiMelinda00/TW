<!-- Layout Admin: Change Pass -->


<br><br><h2 class="settings-txt">Introdu urmatoarele informatii pentru a modifica parola:</h2><br><br>

<form method="POST" action="?check-identity=true&admin-password-change=true">
	<div class="input-field">
        <input type="password" id="password" name="new-admin-pass" required>
        <label>Noua Parola:</label>
      </div>
      <div class="input-field">
        <input type="password" id="confirm_password" name="confirmed-new-admin-pass" required>
        <label>Confirma Noua Parola:</label>
      </div>
	<button>Schimba Parola</button>
</form>
