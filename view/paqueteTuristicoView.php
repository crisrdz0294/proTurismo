<!DOCTYPE html>
<html>
<head>
	<title></title>
<script src="../js/jquery-3.2.1.js"></script>
  <script src="../js/jsPaqueteTuristico.js"></script>
	
</head>
<body>

	<h3>Registrar Paquete Turistico</h3>

	<form method="post" action="../business/paqueteTuristicoBusinessAction.php">

		Nombre: <br>
		<input type="text" name="nombre" placeholder="Ingrese el nombre"><br>
		Descripcion: <br>
		<input type="text" name="descripcion" placeholder="Ingrese la descripcion"><br>
		Cantidad Personas: <br>
		<input type="number" name="cantidadpersonas" placeholder="Ingrese la cantidad de personas"><br><br>
    Itinerario: <br>
    <textarea required name="itinerario" id="itinerario" cols="30" rows="5" placeholder="Describa el itinerario del paquete"></textarea><br><br>

		<input type="submit" name="guardarPaquete" value="Guardar">

	</form>

	<h4>Paquetes Turisticos</h4>

	 <table border="1">
        <tr>
            <th>Nombre </th>
            <th>Descripcion</th>
            <th>Cantidad Personas</th>
            <th>Itinerario</th>
            <th>Precio Total</th>
            <th>Precio Descuento(10%)</th>
            <th>Opcion 1</th>
            <th>Opcion 2</th>
            <th>Opcion 3</th>
        </tr>

	<?php
		
			include '../business/paqueteTuristicoBusiness.php';
			$paqueteTuristicoBusiness = new paqueteTuristicoBusiness();
       		$todosPaquetes = $paqueteTuristicoBusiness->mostrarTodosPaqueteTuristico();

       		foreach ($todosPaquetes as $paqueteTuristico) {
                echo '<form method="post" enctype="multipart/form-data" action="../business/paqueteTuristicoBusinessAction.php">';
                	echo '<input type="hidden" name="idpaquete" id="idpaquete" value="' . $paqueteTuristico->getIdPaqueteTuristico() .'">';
                	echo '<tr>';

               		echo '<td><input type="text" name="nombre" id="nombre" value="' . $paqueteTuristico->getNombrePaqueteTuristico() . '"/></td>';

               
                	echo '<td><textarea  name="descripcion" id="descripcion">'.$paqueteTuristico->getDescripcionPaqueteTuristico().'</textarea></td>';

                    echo '<td><input type="number" name="cantidadpersonas" id="cantidadpersonas" value="' . $paqueteTuristico->getCantidadPersonasPaqueteTuristico() . '"/></td>';

                  echo '<td><textarea  name="itinerario" id="itinerario">'.$paqueteTuristico->getItinerarioPaqueteTuristico().'</textarea></td>';

                 	echo '<td><input type="number" name="precio" id="precio" value="' . $paqueteTuristico->getPrecioPaqueteTuristico() . '"/></td>';
                  echo '<td><input type="number" name="precio" id="precio" value="' . $paqueteTuristico->getPrecioPaqueteTuristico() . '"/></td>';
                
                	echo '<td><input type="submit" value="Actualizar" name="update" id="update"/></td>';
                  echo "<td><input type=\"button\" value=\"Agregar actividades\" onclick=\"cargarPagina('../view/mostrarActividadesView.php?idpaquete=".$paqueteTuristico->getIdPaqueteTuristico()."')\"/></td>";
                   echo '</form>';
                  echo "<td><input type=\"button\" value=\"Agregar Servicios\" onclick=\"cargarPagina('../view/mostrarServicios.php?idpaquete=".$paqueteTuristico->getIdPaqueteTuristico()."')\"/></td>";
                  
                 echo '</tr>';
               
              

            }
       	

	?>

	</table>

  <div id="divActividades">

    
  </div>
</body>
</html>