<!DOCTYPE html>
<html>
<head>
	<title>GUI Trabajo Comunal</title>
</head>

<body>

		<header></header>
		
		<h1>Registrar Trabajo Comunal</h1><br>
		<form id="form" method="post" action="../business/trabajoComunalAction.php">

			Nombre Trabajo Comunal:<br>
			<textarea required name="nombre" id="nombre" placeholder="Ingrese el nombre"></textarea> <br>
			Descripcion Trabajo Comunal:<br>
			<textarea required name="descripcion" id="descripcion" placeholder="Ingrese la descripcion"></textarea><br>
			Actividades Trabajo Comunal:<br>
			<textarea required name="actividades" id="actividades" placeholder="Ingrese las actividades"></textarea><br>
			Requisitos Trabajo Comunal:<br>
			<textarea required name="requisitos" id="requisitos" placeholder="Ingrese los requisitos"></textarea><br>
			Direccion Trabajo Comunal:<br>
			<textarea required name="direccion" id="direccion" placeholder="Ingrese la direccion"></textarea><br>

			<input type="submit" value="Guardar" name="guardarTrabajoComunal" id="guardarTrabajoComunal"/><br><br>
		</form>

		<h2>Trabajos Comunales</h2>
	
		<table border="1">
			<tr>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Actividades</th>
				<th>Requisitos</th>
				<th>Direccion</th>
				<th>Opcion 1</th>
				<th>Opcion 2</th>
			</tr>
			
			<?php
				include '../business/trabajoComunalBusiness.php';

            	$trabajoComunalB = new TrabajoComunalBusiness();
            	$todosTrabajosComunales= $trabajoComunalB->mostrarTodosTrabajosComunal();

            	foreach($todosTrabajosComunales as $trabajoComunal){

            		echo '<form method="post" enctype="multipart/form-data" action="../business/trabajoComunalAction.php">';
                	echo '<input type="hidden" name="idTrabajoComunal" id="idTrabajoComunal" value="' . $trabajoComunal->getIdTrabajoComunal().'">';
                	echo '<tr>';
                	echo '<td><input type="text" name="nombreTrabajoComunal" id="nombreTrabajoComunal" value="'.$trabajoComunal->getNombreTrabajoComunal().'"/></td>';
                	echo '<td><input type="text" name="descripcionTrabajoComunal" id="descripcionTrabajoComunal" value="'.$trabajoComunal->getDescripcionTrabajoComunal().'"/></td>';
                	echo '<td><input type="text" name="actividadesTrabajoComunal" id="actividadesTrabajoComunal" value="'.$trabajoComunal->getActividadesTrabajoComunal().'"/></td>';
                	echo '<td><input type="text" name="requisitosTrabajoComunal" id="requisitosTrabajoComunal" value="'.$trabajoComunal->getRequisitosTrabajoComunal().'"/></td>';
                	echo '<td><input type="text" name="direccionTrabajoComunal" id="direccionTrabajoComunal" value="'.$trabajoComunal->getDireccionTrabajoComunal().'"/></td>';
              
                	echo '<td><input type="submit" value="Actualizar" name="update" id="update"/></td>';
               		echo '<td><input type="submit" value="Eliminar" name="delete" id="delete"/></td>';
             
                	echo '</tr>';
                	echo '</form>';


            	}

            
          ?>
			
		</table>

</body>
</html>