let queryParameter = window.location.href.split("?")[1];


if(queryParameter){
	if(queryParameter.includes("&"))
		queryParameter = queryParameter.split("&")[0];
} else 
	queryParameter = '';


let menu_bttns = document.querySelectorAll("#work-panel ul a");


switch(queryParameter){
	case 'adauga-note=true':{
		for(let i = 0; i < menu_bttns.length; i++)
			menu_bttns[i].classList.remove("active");
		menu_bttns[0].classList.add("active");
	} 
	break;

	case 'inscrie-student=true':{
		for(let i = 0; i < menu_bttns.length; i++)
			menu_bttns[i].classList.remove("active");
		menu_bttns[1].classList.add("active");
	}
	break;

	case 'setari-admin=true':{
		for(let i = 0; i < menu_bttns.length; i++)
			menu_bttns[i].classList.remove("active");
		menu_bttns[2].classList.add("active");
	}
	break;

	case 'check-identity=true':{
		for(let i = 0; i < menu_bttns.length; i++)
			menu_bttns[i].classList.remove("active");
		menu_bttns[2].classList.add("active");
	}
	break;

	default:{
		for(let i = 0; i < menu_bttns.length; i++)
			menu_bttns[i].classList.remove("active");
		menu_bttns[0].classList.add("active");
		
	}

}