<!DOCTYPE html>
<html>
<head>

	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Turismo Rural</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<script src="../js/validarCorreo.js" type="text/javascript"></script>
	<script src="../js/jquery-3.2.1.js" type="text/javascript"></script>
<script src="../js/jquery.maskedinput.js" type="text/javascript"></script>
<script>
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
function validarLink(){
document.getElementById('paginaEmpresa').addEventListener('input', function() {
campo = event.target;
valido = document.getElementById('emailOK2');

emailRegex = /^[a-z0-9\.-]+\.[a-z]{2,4}/gi;
    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
    if (emailRegex.test(campo.value)) {
      valido.innerText = "valido";
    } else {
      valido.innerText = "incorrecto";


    }
});
}
function dejarPasar(){
	validoCedula=document.getElementById('emailOK2').innerHTML;
	validoCorreo=document.getElementById('emailOK').innerHTML;
if(validoCorreo=="valido"&&validoCedula=="valido"){
					document.form.guardarEmpresa.disabled=false;
}else{

			document.form.guardarEmpresa.disabled=true;
}
function validarCorreoEmpresaTabla(){
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
function validarLinkTabla(){
document.getElementById('paginaEmpresa').addEventListener('input', function() {
campo = event.target;
valido = document.getElementById('linktabla');

emailRegex = /^[a-z0-9\.-]+\.[a-z]{2,4}/gi;
    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
    if (emailRegex.test(campo.value)) {
      valido.innerText = "valido";
    } else {
      valido.innerText = "incorrecto";
    }
});
}
function dejarPasarTabla(){
	validoCedula=document.getElementById('emailOK2').innerHTML;
	validoCorreo=document.getElementById('emailOK').innerHTML;
if(validoCorreo=="valido"&&validoCedula=="valido"){
					document.form.guardarEmpresa.disabled=false;
}else{

			document.form.guardarEmpresa.disabled=true;
}



}
jQuery(function($){

 $("#telefonoEmpresa").mask("(+506) 9999-9999")


 $("#cedulaJuridicaEmpresa").mask("9-999-999999");


});
</script>
  <?php
  include '../business/empresaBusiness.php';
  $empresaBusiness = new EmpresaBusiness();
  $mostrarSitiosTuristicos=$empresaBusiness->mostrarSitios();
  $mostrarResponsables=$empresaBusiness->obtenerResponsablesDisponibles();

    if(empty($mostrarResponsables) && empty($mostrarSitiosTuristicos)){
                    echo "<h3>No se pueden crear microempresas porque no hay responsables y sitios turisticos en el sistema</h3>";
                    ?>
                    <br><a href="../index.php">Menu Principal</a>
                <?php
                    }else if(empty($mostrarResponsables)){
                        echo "<h3>No se pueden crear microempresas porque no hay responsables ingresados en el sistema</h3?>";?>
                      <br><br><a href="../view/responsableView.php">Crear Responsables</a>
                      <?php } else if(empty($mostrarSitiosTuristicos)){
                         echo "<h3>No se pueden crear microempresas porque no hay sitios turisticos en el sistema</h3>";?>
                         <br><a href="../view/sitioturisticoview.php">Crear Sitios Turisticos</a>
                         <?php }else {

 ?>
</head>
<body>

  <h1>Registrar Empresa</h1>
  <br>
<form id="form" name="form" method="post" action="../business/empresaAction.php">
 Encargado de la empresa:
 <?php
 echo '
 <select id="idEncargado" name="idEncargado">';


			 foreach ($mostrarResponsables as $Responsable){

			 echo '<option value="'.$Responsable->getIdResponsable().'">'.$Responsable->getNombreResponsable().'</option>;';

				}


 echo ' </select><br><br>';
?>
<br>
  Nombre de la empresa:
  <input type="text" id="nombreEmpresa" name="nombreEmpresa" required /><br>
<br>
  Telefono:
  <input type="text" id="telefonoEmpresa" name="telefonoEmpresa" required /><br>
  <br>
  Email:
    <input type="email" id="emailEmpresa" name="emailEmpresa" onfocusout="validarCorreoEmpresa();dejarPasar();" placeholder="example@example.com"  required /> <span id="emailOK"></span>
    <br>
		<br>
  Pagina Web:
    <input type="text" id="paginaEmpresa" name="paginaEmpresa" onfocusout="validarLink();dejarPasar();"  required placeholder="www.example.com"/> <span id="emailOK2"></span>
    <br>
		<br>
Sitio Turistico:
<?php
echo '
<select id="idSitioTuristico" name="idSitioTuristico">';


			foreach ($mostrarSitiosTuristicos as $sitioTuristico){

			echo '<option value="'.$sitioTuristico->getIdSitio().'">'.$sitioTuristico->getNombreComercial().'</option>;';

			 }


echo ' </select><br><br>';
?>
   <br>
	 Cedula Juridica:
     <input type="text" id="cedulaJuridicaEmpresa" name="cedulaJuridicaEmpresa" placeholder="1-234-567890" onfocusout="dejarPasar()" /><br>
     <br>

   <input type="submit" value="Guardar" name="guardarEmpresa" id="guardarEmpresa" disabled="true"/><br><br>
</form>

<h2>EMPRESAS</h2>

 <table border="1">
        <tr>
            <th>NOMBRE</th>
            <th>CONTACTO</th>
            <th>EMAIL</th>
            <th>SITIO WEB</th>
            <th>SITIO TURISTICO</th>
            <th>ENCARGADO</th>
            <th>Actulizar</th>
            <th>Eliminar</th>
        </tr>

      <?php

            $todosEmpresa= $empresaBusiness->mostrarEmpresas();
						$todosSitios=$empresaBusiness->mostrarSitios();
						$todosEncargados=$empresaBusiness->mostrarTodosResponsables();
            foreach ($todosEmpresa as $empresa) {

            	 echo '<form method="post" enctype="multipart/form-data" action="../business/empresaAction.php">';
      	 		echo '<input type="hidden" name="idEmpresa" id="idEmpresa" value="' . $empresa->getIdEmpresa().'"/>';
                echo '<tr>';

                echo '<td>
                        <input type="text" name="nombreEmpresa" id="nombreEmpresa" value="'.$empresa->getNombreEmpresa().'"/>
                        </td>';
												echo '<td>
				                        <input type="text" name="telefonoEmpresa" id="telefonoEmpresa" value="'.$empresa->getContactoTelefonicoEmpresa().'"/>
				                        </td>';

												echo '<td>
								                  <input type="email" name="emailEmpresa" id="emailEmpresa" value="'.$empresa->getEmailEmpresa().'"/>
								                  </td>';
												echo '<td>
																						<input type="text" name="paginaEmpresa" id="paginaEmpresa" value="'.$empresa->getSitioWebEmpresa(). '" onfocusout="validarLinkTabla()"/><span id="linktabla"></span>
																						</td>';

																				echo '<td>
																				<select id="idSitioTuristico" name="idSitioTuristico">';


																							foreach ($todosSitios as $sitioTuristico){

																							echo '<option value="'.$sitioTuristico->getIdSitio().'">'.$sitioTuristico->getNombreComercial().'</option>;';

																							 }


																				echo ' </select><br><br>';


																			 echo '<td><select name="idEncargado" id="idEncargado"> '?>



																								<?php
																										$listaRes=$empresaBusiness->obtenerResponsablesDisponiblesMasActual($empresa->getIdResponsableEmpresa());

																								foreach ($listaRes as $Responsable){
																							?>
																								<?php
																									if($Responsable->getIdResponsable()==$empresa->getIdResponsableEmpresa()){  ?>
																										 <option selected value="<?php echo $Responsable->getIdResponsable();?>"><?php echo $Responsable->getNombreResponsable();?></option>;
																										<?php }else{?>

																											 <option value="<?php echo $Responsable->getIdResponsable();?>"><?php echo $Responsable->getNombreResponsable();?></option>;
																										<?php  } ?>


																							<?php
																								 }
																							?>
																			<?php





																			echo '</select>';
																			echo '</td>';
																			echo '<td>
																													<input type="text" name="cedulaJuridicaEmpresa" id="cedulaJuridicaEmpresa" value="'.$empresa->getCedulaJuridicaEmpresa().'"/>
																													</td>';

																			 echo '<td><input type="submit" value="Actualizar" name="update"/></td>';
																	 		echo '<td><input type="submit" value="Eliminar" name="delete" /></td>';






																			    echo'   <br>
		 					 				                        </td>';
            }


      ?>
</table>

<?php
							 if (isset($_GET['error'])) {
									 if ($_GET['error'] == "dbError") {
											 echo '<script language="javascript">alert("Error al procesar la transacción");</script>';
									 }else if($_GET['error'] == "numberFormat"){
										 echo '<script language="javascript">alert("Error: La empresa presanta un error no numerico");</script>';

									 }else if($_GET['error'] == "emptyField"){
										 echo '<script language="javascript">alert("Error: empresa presenta espacios nulos");</script>';
									 }

								}else if (isset($_GET['success'])) {
									 echo '<script language="javascript">alert("Transacción Realizada");</script>';
							 }
							 ?>

</body>

<?php
  }
?>
</html>
