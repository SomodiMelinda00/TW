let showBtn = document.getElementById("show-bttn");
let passField = document.getElementById("password-field");


function showPass(){
	if(passField.type == 'password')
		passField.type = 'text';
	else
		passField.type = 'password';
}

if(showBtn)
	showBtn.addEventListener("click",showPass);