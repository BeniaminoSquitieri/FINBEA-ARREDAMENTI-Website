function validaCommento(nomeModulo) {

	if (nomeModulo.commento.value == "") {
		alert("Devi inserire un commento nell'area di testo!");
		nomeModulo.commento.focus();
		return false;
	}
	return true
}
