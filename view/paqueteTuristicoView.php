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
		Precio: <br>
		<input type="number" name="precio" placeholder="Ingrese el precio"><br><br>

		<input type="submit" name="guardarPaquete" value="Guardar">

	</form>

	<h4>Paquetes Turisticos</h4>

	 <table border="1">
        <tr>
            <th>Nombre </th>
            <th>Descripcion </th>
            <th>Precio</th>
            <th>Opcion 1</th>
            <th>Opcion 2</th>
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

                 	echo '<td><input type="number" name="precio" id="precio" value="' . $paqueteTuristico->getPrecioPaqueteTuristico() . '"/></td>';
                
                	echo '<td><input type="submit" value="Actualizar" name="update" id="update"/></td>';
                  echo "<td><input type=\"button\" value=\"Agregar actividades\" onclick=\"cargarPagina('../view/mostrarActividadesView.php?idpaquete=".$paqueteTuristico->getIdPaqueteTuristico()."')\"/></td>";
                   echo '</form>';

                  
                 echo '</tr>';
               
              

            }
       	

	?>

	</table>

  <div id="divActividades">
    
  </div>
</body>
</html>