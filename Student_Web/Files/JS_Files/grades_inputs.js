

chk1 = document.getElementById("nota1");
grade1 = document.getElementById("nota_1");

chk2 = document.getElementById("nota2");
grade2 = document.getElementById("nota_2");


if(window.location.href.includes("adauga-note=true")){
	chk1.addEventListener("click", check1);
	chk2.addEventListener("click", check2);
}

function check1(){
	if(chk1.checked)
		grade1.style.display = "block";
	else
		grade1.style.display = "none";
}

function check2(){
	if(chk2.checked)
		grade2.style.display = "block";
	else
		grade2.style.display = "none";
}
