function validarCorreo(){
document.getElementById('emailResponsable').addEventListener('input', function() {
campo = event.target;
valido = document.getElementById('emailOK');

emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
    if (emailRegex.test(campo.value)) {
      valido.innerText = "valido";
    } else {
      valido.innerText = "incorrecto";


    }
});
}

function caracteres(){
var input = document.getElementById('cedulaResponsable');
valido = document.getElementById('cedulaok');
if(input.value.length < 9) {
valido.innerText="tamano minimo 9 caracteres";
}else{
  valido.innerText="correcto";
}
}


function validarLink(){
document.getElementById('paginaEmpresa').addEventListener('input', function() {
campo = event.target;
valido = document.getElementById('emailOK2');

emailRegex = /^(http|https|ftp|wwww)\:\/\/[a-z0-9\.-]+\.[a-z]{2,4}/gi;
    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
    if (emailRegex.test(campo.value)) {
      valido.innerText = "válido";
    } else {
      valido.innerText = "incorrecto";


    }
});
}
function validarLinkSitio(input,cont){
document.getElementById('sitioweb').addEventListener('input', function() {
campo = event.target;
valido = document.getElementById('linkOk');

emailRegex = /^(www)+\.[a-z0-9\.-]+\.[a-z]{2,4}/gi;
    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
    if (emailRegex.test(campo.value)) {
      valido.innerText = "valido";
      document.form1.guardarSitio.disabled=false;
    } else {
      valido.innerText = "incorrecto";
document.form1.guardarSitio.disabled=true;

    }
});
}

function validarCorreoEmpresa(){
document.getElementById('emailEmpresa').addEventListener('input', function() {
campo = event.target;
valido = document.getElementById('emailOK');

emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
    if (emailRegex.test(campo.value)) {
      valido.innerText = "valido";
    } else {
      valido.innerText = "incorrecto";


    }
});
}
function dejarPasar(){
  validoCedula=document.getElementById('cedulaok').value;
  validoCorreo=document.getElementById('emailOK');
if(validoCorreo.text=="valido"&&validoCedula.text=="valido"){
          document.getElementById('registrarse').disabled=false;
}else{
    document.getElementById('registrarse').disabled=true;
}

}
