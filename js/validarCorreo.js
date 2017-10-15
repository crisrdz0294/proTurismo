function validarCorreo(){
document.getElementById('emailResponsable').addEventListener('input', function() {
campo = event.target;
valido = document.getElementById('emailOK');

emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
    if (emailRegex.test(campo.value)) {
      valido.innerText = "válido";
    } else {
      valido.innerText = "incorrecto";


    }
});
}

function caracteres(){
var input = document.getElementById('cedulaResponsable');
if(input.value.length < 9) {
alert('Escribe minimo 9 carácteres.');
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

function validarCorreoEmpresa(){
document.getElementById('emailEmpresa').addEventListener('input', function() {
campo = event.target;
valido = document.getElementById('emailOK');

emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
    if (emailRegex.test(campo.value)) {
      valido.innerText = "válido";
    } else {
      valido.innerText = "incorrecto";


    }
});
}
