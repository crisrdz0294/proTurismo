<!DOCTYPE html>
<html>
<head>
  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>GUI Trabajo Comunal</title>
  <script src="../js/jquery-3.2.1.js"></script>
  <?php 
  session_start();

    
     if(isset($_SESSION['administrador'])){

     }else{
      header("Location: ../index.php");
     }

 ?>
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
      <input type="text" name="nombre" placeholder="Ingrese el nombre" required><br>
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

                	echo '<td>
                  <textarea required name="descripcionTrabajoComunal" id="descripcionTrabajoComunal" placeholder="Ingrese la descripcion">'.$trabajoComunal->getDescripcionTrabajoComunal().'</textarea>
                  </td>';

                  echo '<td>
                  <textarea required name="actividadesTrabajoComunal" id="actividadesTrabajoComunal" placeholder="Ingrese las actividades">'.$trabajoComunal->getActividadesTrabajoComunal().'</textarea>
                  </td>';

                   echo '<td>
                  <textarea required name="requisitosTrabajoComunal" id="requisitosTrabajoComunal" placeholder="Ingrese los requisitos">'.$trabajoComunal->getRequisitosTrabajoComunal().'</textarea>
                  </td>';

                    echo '<td>
                  <textarea required name="direccionTrabajoComunal" id="direccionTrabajoComunal" placeholder="Ingrese la direccion">'.$trabajoComunal->getDireccionTrabajoComunal().'</textarea>
                  </td>';

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