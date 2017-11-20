<!DOCTYPE html>
<html>
<head>

	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Turismo Rural</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<script src="../js/validarCorreo.js" type="text/javascript"></script>
	<script src="../js/jquery-3.2.1.js" type="text/javascript"></script>
<script src="../js/jquery.maskedinput.js" type="text/javascript"></script>

<?php 
	session_start();

  	
     if(isset($_SESSION['administrador'])){

     }else{
     	header("Location: ../index.php");
     }

 ?>
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
}
function validarCorreoEmpresaTabla(input,cont){

campo = input.value;
name="correo";
name=name.concat(cont);
valido = document.getElementById(name);

emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    //Se muestra un texto a modo de ejemplo, luego va a ser un icono

    if (emailRegex.test(campo)) {
      valido.innerText = "valido";
    } else {
      valido.innerText = "incorrecto";


    }
}
function dejarPasar2(button,contador){

	var name="cedulaOk2";
	var email="correo";
	var telefono="telefonoOk";
	var link="linktabla";

	name=name.concat(contador);
	email=email.concat(contador);
	telefono=telefono.concat(contador);
  link=link.concat(contador);

	validoCedula2=document.getElementById(name).innerHTML;
	validoCorreo2=document.getElementById(email).innerHTML;
	validarTelefono2=document.getElementById(telefono).innerHTML;
	validarLink=document.getElementById(link).innerHTML;
console.log(button);
if(validoCorreo2=="valido"&&validoCedula2=="valido"&&validarTelefono2=="valido"&&validarLink=="valido"){
	button.type="submit";
			alert("exito");
}else{

	button.type="button";
	alert("error");
}


}

function validarLinkTabla(input , cont){

campo = input.value;
vin="linktabla";
vin=vin.concat(cont);
valido = document.getElementById(vin);


emailRegex =  /^[a-z0-9\.-]+\.[a-z]{2,4}/gi;
    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
    if (emailRegex.test(campo)) {
      valido.innerText = "valido";
    } else {
      valido.innerText = "incorrecto";
    }

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
function validarTelefono(input,contador){
var campo=input.value;
var name="telefonoOk";
name=name.concat(contador);
var valido = document.getElementById(name);
var emailRegex = "(+506) ";
var signo="-"


    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
    if (campo.indexOf(emailRegex)>-1&&campo.indexOf(signo)>-1&&campo.length==17) {
      valido.innerText = "valido";

    } else {
      valido.innerText = "incorrecto";



    }

}
function validarCedulaJuridica(input,cont){

var campo = input.value;
var valor="cedulaOk2";
valor=valor.concat(cont);

var valido = document.getElementById(valor);
var cedularegex=/[0-9]{1}\-[0-9]{3}\-[0-9]{6}/;

//var emailRegex = /(www)+\.[a-z0-9\.-]+\.[a-z]{2,4}/gi;
    //Se muestra un texto a modo de ejemplo, luego va a ser un icono


    if (cedularegex.test(campo)) {
      valido.innerText = "valido";
      //document.form1.guardarSitio.disabled=false;
    } else {
      valido.innerText = "incorrecto";
//document.form1.guardarSitio.disabled=true;

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
    <input type="email" id="emailEmpresa" name="emailEmpresa" onkeyup="validarCorreoEmpresa();dejarPasar();" placeholder="example@example.com"  required /> <span id="emailOK"></span>
    <br>
		<br>
  Pagina Web:
    <input type="text" id="paginaEmpresa" name="paginaEmpresa" onkeyup="validarLink();dejarPasar();"  required placeholder="www.example.com"/> <span id="emailOK2"></span>
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
						  <th>CEDULA JURIDICA</th>
            <th>Actulizar</th>
            <th>Eliminar</th>
        </tr>

      <?php

            $todosEmpresa= $empresaBusiness->mostrarEmpresas();
						$todosSitios=$empresaBusiness->mostrarSitios();
						$todosEncargados=$empresaBusiness->mostrarTodosResponsables();
						 $cont=1;
            foreach ($todosEmpresa as $empresa) {

            	 echo '<form method="post" enctype="multipart/form-data" action="../business/empresaAction.php">';
      	 		echo '<input type="hidden" name="idEmpresa" id="idEmpresa" value="' . $empresa->getIdEmpresa().'"/>';
                echo '<tr>';

                echo '<td>
                        <input type="text" name="nombreEmpresa" id="nombreEmpresa" value="'.$empresa->getNombreEmpresa().'"/>
                        </td>';
												$telefono=$empresa->getContactoTelefonicoEmpresa();
											$pre= substr($telefono,0,5);
											 $pre1= substr($telefono,5,9);
											$number="(+506) ".$pre."-".$pre1;
											 $empresa->setContactoTelefonicoEmpresa($number);
												echo '<td>

				                        <input type="text" name="telefonoEmpresa" id="telefonoEmpresa" onkeyup="validarTelefono(this,'.$cont.')"
																 value="'.$empresa->getContactoTelefonicoEmpresa().'"/>
																 <span id="telefonoOk'.$cont.'">valido</span>
				                        </td>';


												echo '<td>
								                  <input type="email" name="emailEmpresa" id="emailEmpresa" onkeyup="validarCorreoEmpresaTabla(this,'.$cont.')" value="'.$empresa->getEmailEmpresa().'"/>
																	<span id="correo'.$cont.'">valido</span>
								                  </td>';
												echo '<td>
																						<input type="text" name="paginaEmpresa" id="paginaEmpresa" value="'.$empresa->getSitioWebEmpresa(). '" onkeyup="validarLinkTabla(this,'.$cont.')"/><span id="linktabla'.$cont.'">valido</span>
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

																			$cedu=$empresa->getCedulaJuridicaEmpresa();
																	 $pre= substr($cedu,0,1);
																		$pre1= substr($cedu,1,3);
																		$pre2=substr($cedu,4,8);
																	 $number=$pre."-".$pre1."-".$pre2;
																		$empresa->setCedulaJuridicaEmpresa($number);



																			echo '</select>';
																			echo '</td>';
																			echo '<td>
																													<input type="text" name="cedulaJuridicaEmpresa" id="cedulaJuridicaEmpresa" value="'.$empresa->getCedulaJuridicaEmpresa().'" onkeyup="validarCedulaJuridica(this,'.$cont.')" maxlength=12/><span id="cedulaOk2'.$cont.'" >valido</span>
																													</td>';

																			 echo '<td><input type="button" value="Actualizar" id="update" name="update" onclick="dejarPasar2(this,'.$cont.')"/ ></td>';
																	 		echo '<td><input type="submit" value="Eliminar" name="delete" /></td>';

                                       $cont++;




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
