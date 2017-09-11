<!DOCTYPE html>
<html>
<head>

	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Turismo Rural</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php
include '../business/empresaBusiness.php';
$empresaBusiness = new EmpresaBusiness();
$mostrarSitiosTuristicos=$empresaBusiness->mostrarSitios();
$mostrarResponsables=$empresaBusiness->mostrarTodosResponsables();
 ?>
</head>
<body>

  <h1>Registrar Empresa</h1>
  <br>
<form id="form" method="post" action="../business/empresaAction.php">
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
    <input type="email" id="emailEmpresa" name="emailEmpresa" required /><br>
    <br>
  Pagina Web:
    <input type="text" id="paginaEmpresa" name="paginaEmpresa"  /><br>
    <br>
Sitio Turistico:<br>
<?php
echo '
<select id="idSitioTuristico" name="idSitioTuristico">';


			foreach ($mostrarSitiosTuristicos as $sitioTuristico){

			echo '<option value="'.$sitioTuristico->getIdSitio().'">'.$sitioTuristico->getNombreComercial().'</option>;';

			 }


echo ' </select><br><br>';
?>
   <br>

   <input type="submit" value="Guardar" name="guardarEmpresa" id="guardarEmpresa"/><br><br>
</form>

<h2>EMPRESAS</h2>

 <table border="1">
        <tr>
            <th> NOMBRE</th>

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
                        <input type="text" name="nombreEmpresa" id="nombreEmpresa" value="' . $empresa->getNombreEmpresa().'"/>
                        </td>';
												echo '<td>
				                        <input type="text" name="telefonoEmpresa" id="telefonoEmpresa" value="' . $empresa->getContactoTelefonicoEmpresa().'"/>
				                        </td>';

												echo '<td>
								                  <input type="email" name="emailEmpresa" id="emailEmpresa" value="' . $empresa->getEmailEmpresa().'"/>
								                  </td>';
												echo '<td>
																						<input type="text" name="paginaEmpresa" id="paginaEmpresa" value="' . $empresa->getSitioWebEmpresa().'"/>
																						</td>';

																				echo '<td>
																				<select id="idSitioTuristico" name="idSitioTuristico">';


																							foreach ($todosSitios as $sitioTuristico){

																							echo '<option value="'.$sitioTuristico->getIdSitio().'">'.$sitioTuristico->getNombreComercial().'</option>;';

																							 }


																				echo ' </select><br><br>';

																				echo '<td>
	 																		 <select id="idEncargado" name="idEncargado">';


	 																					 foreach ($todosEncargados as $responsable){

	 																					 echo '<option value="'.$responsable->getIdResponsable().'">'.$responsable->getNombreResponsable().'</option>;';

	 																						}


	 																		 echo ' </select><br><br></td>';

																			 echo '<td><input type="submit" value="Actualizar" name="update"/></td>';
																	 		echo '<td><input type="submit" value="Eliminar" name="delete" /></td>';






																			    echo'   <br>
		 					 				                        </td>';
            }


      ?>

</body>
</html>
