function validaModulo(modulo) {
	var regexp= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	var email=modulo.email.value;

	if (modulo.username.value == "") {
		alert("Devi inserire un username");
		modulo.username.focus();
		return false;
	}

	if (modulo.email.value == "") {
		alert("Devi inserire un'email");
		modulo.email.focus();
		return false;
	}

	if (regexp.test(email)==false)
		{

			 alert("L'indirizzo email che hai inserito non e' valido");
			 modulo.email.focus();

			 return false;
		 }


	if (modulo.password.value == "") {
		alert("Devi inserire un password");
		modulo.password.focus();
		return false;
	}

	if (modulo.password_conf.value == "") {
		alert("Devi inserire la conferma della password");
		modulo.password_conf.focus();
		return false;
	}

	var a=false;
	if(modulo.password_conf.value != modulo.password.value) {
		alert("Le due password non corrispondono");
		modulo.password.focus();
		modulo.password.select();
		return false;
	}

	return true
}
