<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php
		include '../business/responsableBusiness.php';


	?>
	<script src="../js/validarCorreo.js" type="text/javascript"></script>
	<script src="../js/jquery-3.2.1.js" type="text/javascript"></script>
<script src="../js/jquery.maskedinput.js" type="text/javascript"></script>
<script src="../js/jquery.validate.min.js" type="text/javascript"></script>
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
function validarCorreo2(input, contador){
var name="emailOK2";
var campo = input.value;
var valid=name.concat(contador);
console.log(valid);
var valido =document.getElementById(valid);


var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
    if (emailRegex.test(campo)) {
      valido.innerText = "valido";
    } else {
      valido.innerText = "incorrecto";


    }

}

function validarTelefono(input,contador){
var campo=input.value;
var name="telefonoOk";
name=name.concat(contador);
var valido = document.getElementById(name);
var emailRegex = "(+506)";
var signo="-"
console.log(campo);

    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
    if (campo.indexOf(emailRegex)>-1&&campo.indexOf(signo)>-1&&campo.length==16) {
      valido.innerText = "valido";
			console.log("si");
    } else {
      valido.innerText = "incorrecto";
			console.log("no valido");


    }

}


function dejarPasar(){
	validoCedula=document.getElementById('cedulaok').innerHTML;
	validoCorreo=document.getElementById('emailOK').innerHTML;
	console.log(validoCedula);
	console.log(validoCorreo);
if(validoCorreo=="valido"&&validoCedula=="valido"){
					document.form1.guardarResponsable.disabled=false;
}else{

			document.form1.guardarResponsable.disabled=true;
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

 		<header>
        </header>

         <h1>Registrar Responsable</h1><br>
        	<form id="form1" name="form1" method="post" action="../business/responsableBusinessAction.php">
                    Cedula:
                    <input required type="text" name="cedulaResponsable" id="cedulaResponsable" maxlength="20" onblur="caracteres()"/><span id="cedulaok"></span>
                    <br>
                    <br>
                    <br>
                    Nombre:
                    <input required type="text" name="nombreResponsable" id="nombreResponsable"  onblur="dejarPasar()"   maxlength="15"/>
                    <br>
                    <br>
                    <br>
                    Primer Apellido:
                  <input required type="text" name="primerApellidoResponsable" id="primerApellidoResponsable"  onblur="dejarPasar()"   maxlength="15" />
                    <br>
                    <br>
                    <br>
                    Segundo Apellido:
                <input required type="text" name="segundoApellidoResponsable" id="segundoApellidoResponsable"  onblur="dejarPasar()"   maxlength="15" />
                    <br>
                    <br>
                    <br>
                    Telefono:
                    <input required type="text" name="telefonoResponsable" id="telefonoResponsable"  onblur="dejarPasar()" size="15" maxlength="15" />


                    <br>
                    <br>
                    <br>
                    Email:
                    <input required type="Email" name="emailResponsable" id="emailResponsable" onkeyup="validarCorreo();dejarPasar();" /> <span id="emailOK"></span>
                    <br>
                    <br>
                    <br>

                    <input type="submit" value="Guardar" name="guardarResponsable" id="guardarResponsable" disabled="true" /><br><br>

    		</form>

        <h2>Responsable</h2>
    		<table border="1">
    		<tr>
            	<th>Cedula</th>
                <th>Nombre</th>
                <th>PrimerApellido</th>
                <th>SegundoApellido</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Opcion 1</th>
                <th>Opcion 2</th>
    		</tr>

    <?php

         $sesponsableBusiness = new ResponsableBusiness();
         $todosResponsable = $sesponsableBusiness->mostrarTodosResponsable();
				 $contador=1;
        foreach ($todosResponsable as $responsable)
            {

                echo '<form method="post" enctype="multipart/form-data" action="../business/responsableBusinessAction.php" id="form2" name="form2">';

                echo '<input type="hidden" name="idResponsable" id="idResponsable" value="' . $responsable->getIdResponsable() .'">';


                echo '<td><input type="text" name="cedulaResponsable" id="cedulaResponsable" value="' . $responsable->getCedulaResponsable() . '" onkeyup="caracteres2(this,'.$contador.')"/><span id="cedulaok2'.$contador.'"></span></td>';

                echo '<td><input type="text" name="nombreResponsable" id="nombreResponsable" value="' . $responsable->getNombreResponsable() . '"/></td>';

                echo '<td><input type="text" name="primerapellidoResponsable" id="primerapellidoResponsable" value="' . $responsable->getPrimirapellidoResponsable() . '"/></td>';

                echo '<td><input type="text" name="segundoapellidoResponsable"  id="segundoapellidoResponsable" value="' . $responsable->getSegundoapellidoResponsable() . '"/></td>';
                   $telefono=$responsable->getTelefonoResponsable();
								  $pre= substr($telefono,0,5);
									 $pre1= substr($telefono,5,7);
									$number="(+506)".$pre."-".$pre1;
                  $responsable->setTelefonoResponsable($number);


                echo '<td><input type="text" name="telefonoResponsable" id="telefonoResponsable"  onkeyup="validarTelefono(this,'.$contador.')" value="'.$responsable->getTelefonoResponsable().'" maxlength="16" placeholder="(+506) 1234-5678" /><span id="telefonoOk'.$contador.'" name="telefonoOk'.$contador.'"></span></td>';

                 echo '<td><input type="Email" name="emailResponsable" id="emailResponsable" value="' . $responsable->getEmailResponsable() .'" onkeyup="validarCorreo2(this,'.$contador.')"/> <span id="emailOK2'.$contador.'"></span></td>';

                echo '<td><input type="button" value="Actualizar" name="update" id="update" onclick="dejarPasar2(this,'.$contador.')" /></td>';
                echo '<td><input type="submit" value="Eliminar" name="delete" id="delete"/></td>';

                echo '</tr>';


                echo '</form>';
								$contador++;
            }
          ?>







    		</table>
				<?php
											 if (isset($_GET['error'])) {
													 if ($_GET['error'] == "dbError") {
															 echo '<script language="javascript">alert("Error al procesar la transacción");</script>';
													 }else if($_GET['error'] == "numberFormat"){
														 echo '<script language="javascript">alert("Error: El responsable presenta un error no numerico");</script>';

													 }else if($_GET['error'] == "emptyField"){
														 echo '<script language="javascript">alert("Error: El responsable presenta espacios nulos");</script>';
													 }

												}else if (isset($_GET['success'])) {
													 echo '<script language="javascript">alert("Transacción Realizada");</script>';
											 }
											 ?>

</body>
</html>
