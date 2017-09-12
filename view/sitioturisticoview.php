<?php
	require('../data/data2.php');
	$query="SELECT * from tbprovincia";
	$resultado=$mysqli->query($query);
 ?>
<html>
	<head>

		<script src="../js/jquery-3.2.1.js" type="text/javascript"></script>

		<script language="javascript">
			$(document).ready(function(){
				$("#provincia").change(function () {
 
					$('#distrito').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#provincia option:selected").each(function () {
						idprovincia = $(this).val();
						$.post("../data/getCantones.php", { idprovincia: idprovincia }, function(data){
							$("#canton").html(data);
						});            
					});
				})
			});

			$(document).ready(function(){
				$("#canton").change(function () {
					$("#canton option:selected").each(function () {
						idcanton = $(this).val();
						$.post("../data/getDistritos.php", { idcanton: idcanton }, function(data){
							$("#distrito").html(data);
						});            
					});
				})
			});
		</script>
	</head>
	<body>

	<h1>Ingresar Sitio Turistico</h1>

	<form method="POST" action="../business/sitioTuristicoBusinessAction.php">
	
		Nombre comercial:<br>
		<input type="text" name="nombrecomercial" placeholder="Ingrese el nombre del sitio"><br><br>
		Numero de telefono del sitio:<br>
		<input type="number" name="telefono" placeholder="Ingrese el numero de telefono del sitio"><br><br>
		Provincia del sitio:<br>
		<select id="provincia" name="provincia">
			<option value="0" selected disabled="true">Seleccione una provincia</option> 
			<?php
				while ($fila=$resultado->fetch_assoc()) { ?>   
				
					<option value="<?php echo $fila['idprovincia'] ?>" ><?php echo $fila['nombreprovincia'] ?></option>

				<?php 
				}
				?>     		
		</select><br><br>
		Canton del sitio:<br>
		<select id="canton" name="canton"></select><br><br>
		Distrito del sitio:<br>
		<select id="distrito" name="distrito"></select><br><br>
		Direccion Exacta del sitio:<br>
		<textarea name="direccion" placeholder="Ingrese la direccion exacta del sitio"></textarea><br><br>
		Sitio web:<br>
		<input type="text" name="sitioweb" placeholder="Ingrese el sitio web"><br><br>
		  <input type="submit" value="Guardar" name="guardarSitio" /><br><br>
	

	</form>

	<h2>Sitios Turisticos</h2>
	<table border="1">
		
		<tr>
			<th>Nombre del sitio</th>
			<th>Telefono</th>
			<th>Direccion Exacta</th>
			<th>Sitio Web</th>
			<th>Opcion 1</th>
			<th>Opcion 2</th>
		</tr>	

		<?php 

			include '../business/sitioTuristicoBusiness.php';
			$sitioTuristicoBusiness= new SitioTuristicoBusiness();
			$todosSitiosTuristicos=$sitioTuristicoBusiness->mostrarTodosSitiosTuristicos();

			foreach($todosSitiosTuristicos as $sitioturistico){

				 echo '<form method="post" enctype="multipart/form-data" action="../business/sitioTuristicoBusinessAction.php">';
                    echo '<input type="hidden" name="idsitio" value="' . $sitioturistico->getIdSitio().'">';

                    echo '<td><input type="text" name="nombrecomercial" value="' .$sitioturistico->getNombreComercial().'"/></td>';
                    
                    echo '<td><input type="number" name="telefono" value="' . $sitioturistico->getTelefonoSitio().'"/></td>';

                     echo '<td><input type="text" name="direccion" value="' .$sitioturistico->getDireccionExacta().'"/></td>';
                     echo '<td><input type="text" name="nombreresponsable" value="' .$sitioturistico->getSitioWeb().'"/></td>';
                    echo '<td><input type="submit" value="Actualizar" name="update" id="update"/></td>';
                    echo '<td><input type="submit" value="Eliminar" name="delete" id="delete"/></td>';

                    echo '</tr>';
                    echo '</form>';
			}
		?>

	</table>
	

	</body>
</html>