function validaLog(modulo) {

if (modulo.email.value == "") {
  alert("Devi inserire un'email");
  modulo.email.focus();
  return false;
}

if (modulo.password.value == "") {
  alert("Devi inserire una password");
  modulo.password.focus();
  return false;
}
return true;
}
