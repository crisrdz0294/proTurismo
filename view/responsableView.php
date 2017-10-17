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

function dejarPasar(){
	validoCedula=document.getElementById('cedulaok').innerHTML;
	validoCorreo=document.getElementById('emailOK').innerHTML;
if(validoCorreo=="valido"&&validoCedula=="valido"){
					document.form.guardarResponsable.disabled=false;
}else{

			document.form.guardarResponsable.disabled=true;
}
}


jQuery(function($){

 $("#telefonoResponsable").mask("(+506) 9999-9999")



});
</script>

</head>
<body>

 		<header>
        </header>

         <h1>Registrar Responsable</h1><br>
        	<form id="form" name="form" method="post" action="../business/responsableBusinessAction.php">
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
                    <input required type="Email" name="emailResponsable" id="emailResponsable" onblur="validarCorreo();dejarPasar();" /> <span id="emailOK"></span>
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
        foreach ($todosResponsable as $responsable)
            {

                echo '<form method="post" enctype="multipart/form-data" action="../business/responsableBusinessAction.php" id="form2" name="form2">';



                echo '<input type="hidden" name="idResponsable" id="idResponsable" value="' . $responsable->getIdResponsable() .'">';


                echo '<td><input type="text" name="cedulaResponsable" id="cedulaResponsable" value="' . $responsable->getCedulaResponsable() . '" onblur="caracteres()"/><span id="cedulaok"></span></td>';

                echo '<td><input type="text" name="nombreResponsable" id="nombreResponsable" value="' . $responsable->getNombreResponsable() . '"/></td>';

                echo '<td><input type="text" name="primerapellidoResponsable" id="primerapellidoResponsable" value="' . $responsable->getPrimirapellidoResponsable() . '"/></td>';

                echo '<td><input type="text" name="segundoapellidoResponsable" id="segundoapellidoResponsable" value="' . $responsable->getSegundoapellidoResponsable() . '"/></td>';

                echo '<td><input type="text" name="telefonoResponsable" id="telefonoResponsable" value="' . $responsable->getTelefonoResponsable() . '"/></td>';
								$telefono=$responsable->getTelefonoResponsable();
								?>
								<script type="text/javascript" language="javascript">
								var numero="<?php echo $telefono; ?>";
								var primero= "(+506) "+numero.substring(1,5);
								var segundo= "-"+numero.substring(5,9);
								var nuevo=primero+segundo;
								console.log(nuevo);
								document.form2.telefonoResponsable.setAttribute('value',nuevo);
								</script>
								<?php

                 echo '<td><input type="Email" name="emailResponsable" id="emailResponsable" value="' . $responsable->getEmailResponsable() . '" onblur="validarCorreo()"/> <span id="emailOK"></span></td>';




                echo '<td><input type="submit" value="Actualizar" name="update" id="update"/></td>';
                echo '<td><input type="submit" value="Eliminar" name="delete" id="delete"/></td>';

                echo '</tr>';


                echo '</form>';
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
