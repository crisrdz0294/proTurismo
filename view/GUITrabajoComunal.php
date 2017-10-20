<!DOCTYPE html>
<html>
<head>
	<title>GUI Trabajo Comunal</title>
  <script src="../js/jquery-3.2.1.js"></script>
	<?php
		include '../business/sitioTuristicoBusiness.php';

         $sitioBusiness=new SitioTuristicoBusiness();
         $listaSitios= $sitioBusiness->mostrarTodosSitiosTuristicos();
          if(empty($listaSitios)){
            echo "<h3>No se pueden crear trabajos comunales porque no hay sitios turisticos ingresados en el sistema</h3>";
          ?>
          <br><a href="../view/sitioturisticoview.php">Crear Sitio Turistico</a>
          <?php  
          }else{
	?>
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
			 Sitio Turistico:<br>

                    <select id="sitioturistico" name="sitioturistico">
                     
                        <?php
                          foreach ($listaSitios as $sitio){
                        ?>
                          <option value="<?php echo $sitio->getIdSitio();?>"><?php echo $sitio->getNombreComercial();?></option>;
                        <?php 
                           } 
                        ?>
                      
                     </select><br><br>

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
				<th>Sitio Turistico</th>
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

                	echo '<td><select name="idsitio" id="idsitio"> '?>
                        <?php
                          foreach ($listaSitios as $sitio){
                        ?>
                          <?php
                            if($sitio->getIdSitio()==$trabajoComunal->getIdSitioTrabajoComunal()){  ?>

                               <option selected value="<?php echo $sitio->getIdSitio();?>"><?php echo $sitio->getNombreComercial();?></option>;
                              <?php }else{?>

                                 <option value="<?php echo $sitio->getIdSitio();?>"><?php echo $sitio->getNombreComercial();?></option>;
                              <?php  } ?>
                          
                         
                        <?php 
                           } 
                        ?>
                <?php  

                echo '</select>';
                echo '</td>'; 
              
                	echo '<td><input type="submit" value="Actualizar" name="update" id="update"/></td>';
               		echo '<td><input type="submit" value="Eliminar" name="delete" id="delete"/></td>';
             
                	echo '</tr>';
                	echo '</form>';


            	}

            
          ?>
			
		</table>





     <?php
                   
           if (isset($_GET['error']))
              {
                          if ($_GET['error'] == "dbError") 
                          {
                              echo '<script language="javascript">alert("Error al procesar la transacción");</script>';
                          }
                          else if($_GET['error'] == "emptyField")
                          {
                             echo '<script language="javascript">alert("Error al procesar la transacción hay campos vacios");</script>'; 
                          
                          }
                          else if($_GET['error'] == "error")
                          {
                              echo '<script language="javascript">alert("Error: Error al procesar la transacción No se ingresaron datos");</script>'; 
                          }
                      }
                      else if (isset($_GET['sucess'])) 
                      {
                          echo '<script language="javascript">alert("Transacción Realizada");</script>'; 
                      }
    ?>







</body>
<?php  
  }
?>
</html>