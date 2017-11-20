<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Turismo Rural</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <script src="../js/jquery-3.2.1.js"></script>
  <style>
	.centrar
	{
		position: absolute;
		/*nos posicionamos en el centro del navegador*/
		top:25%;
		left:45%;
		/*determinamos una anchura*/
		width:450px;
		/*indicamos que el margen izquierdo, es la mitad de la anchura*/
		margin-left:-200px;
		/*determinamos una altura*/
		height:570px;
		/*indicamos que el margen superior, es la mitad de la altura*/
		margin-top:-150px;
		border:1px solid #808080;
		padding:5px;
	}
	</style>
  <script>

  function caracteres(){
  var input = document.getElementById('cedulaResponsable');
  valido = document.getElementById('cedulaok');
  if(input.value.length < 9) {
  valido.innerText="tamano minimo 9 caracteres";
  }else{
    valido.innerText="valido";
  }
  }
  function caracteres2(input,contador){
  var input = input.value;
  name="cedulaok2";
  name=name.concat(contador);
  valido = document.getElementById(name);
  if(input.length < 9) {
  valido.innerText="tamano minimo 9 caracteres";
  }else{
    valido.innerText="valido";
  }
  }
  function validarCorreo(input){

  campo = input.value;
  valido = document.getElementById('emailOK');
   console.log(campo);
  var emailRegex = /^[a-zA-Z0-9_\-\.~]{2,}@[a-zA-Z0-9_\-\.~]{2,}\.[a-zA-Z]{2,4}$/;
      //Se muestra un texto a modo de ejemplo, luego va a ser un icono
      if (emailRegex.test(campo.value)) {
        valido.innerText = "valido";
      } else {
        valido.innerText = "incorrecto";


      }

  }



  function dejarPasar(){
  	validoCedula=document.getElementById('cedulaok').innerHTML;
  	validoCorreo=document.getElementById('emailOK').innerHTML;
    validoPAss=document.getElementById('passValid').innerHTML;
  	console.log(validoCedula);
  	console.log(validoCorreo);
    console.log(passValid);
  if(validoCorreo=="valido"&&validoCedula=="valido"&&validoPass=="valido"){
  					document.form1.RegistrarUsuario.disabled=false;
  }else{

  			document.form1.RegistrarUsuario.disabled=true;
  }
  }

  function validarPassword(){
      var input1 = document.getElementById('password1').value;
        var input2 = document.getElementById('password2').value;
  var valido = document.getElementById('passValid');

    var password= /^[a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ0-9!@#\$%\^&\*\?_~\/]{4,20}$/i;

  console.log(input1);
  console.log(input2);
        if(input1==input2&& password.test(input2)){
          valido.innerText = "valido";
        }else{
          valido.innerText = "Las contraseñas son diferentes";
        }
  }

  function dejarPasar2(button ,contador){

  	var name="cedulaok2";
  	var email="emailOK2";
  	var telefono="telefonoOk";

  	name=name.concat(contador);
  	email=email.concat(contador);
  	telefono=telefono.concat(contador);

  	validoCedula2=document.getElementById(name).innerHTML;
  	validoCorreo2=document.getElementById(email).innerHTML;
  	validarTelefono2=document.getElementById(telefono).innerHTML;
  	if(validoCorreo2=="valido"&&validoCedula2=="valido"&&validarTelefono2=="valido"){
  button.type="submit";
  		alert("exito");

  	}else{
  		button.type="button";
  		alert("error");
  		}


  }

  jQuery(document).ready(function(){

   $("#telefonoResponsable").mask("(+506) 9999-9999")



  });
  </script>
</head>

<body>

<div class="centrar">
  <h1> Bienvenido al registro de usuarios </h1>


  <form id="form1" name="form1" method="post" action="../business/responsableBusinessAction.php">
            Cedula:
            <input required type="text" name="cedulaResponsable" id="cedulaResponsable" maxlength="20" onblur="caracteres()"/><span id="cedulaok"></span>
            <br>
            <br>
            <br>
            Nombre:
            <input required type="text" name="nombreResponsable" id="nombreResponsable"    maxlength="15"/>
            <br>
            <br>
            <br>
            Primer Apellido:
          <input required type="text" name="primerApellidoResponsable" id="primerApellidoResponsable"  maxlength="15" />
            <br>
            <br>
            <br>
            Segundo Apellido:
        <input required type="text" name="segundoApellidoResponsable" id="segundoApellidoResponsable"  maxlength="15" />
            <br>
            <br>
            <br>
            Telefono:
            <input required type="text" name="telefonoResponsable" id="telefonoResponsable"  size="15" maxlength="15" />


            <br>
            <br>
            <br>
            Email:
            <input required type="Email" name="emailResponsable" id="emailResponsable"  /> <span id="emailOK"></span>
            <br>
            <br>
            <br>

            Contraseña: <input type="password" id="password1">
            <br>
            <br>
            Confirmar contraseña: <input type="password" id="password2" onkeyup="validarPassword()"><span id="passValid"></span>
            <br>
            <br>

            <input type="submit" value="Guardar" name="RegistrarUsuario" id="RegistrarUsuario" /><br><br>

</form>

</div>


</body>







</html>
