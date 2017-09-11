<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php
		include '../business/servicioTransporteBusiness.php';
    
     $serviciotransporteBusiness = new ServicioTransporteBusiness();
      $todosServiciotransporte = $serviciotransporteBusiness->mostrarTodosServicioTransporte();

      $listaSitios = $serviciotransporteBusiness->mostrarTodosSitiosTuristicos();
	?>
</head>
<body>

 		<header> 
        </header>

         <h1>Registrar Transporte</h1><br>
        	<form id="form" method="post" action="../business/servicioTransporteBusinessAction.php">               
                    Origen:<br>
                    <textarea required name="origenServicioTransporte" id="origenServicioTransporte" cols="30" rows="5" placeholder="Describa el lugar de salida"></textarea>
                    <br>
                    <br>
                    <br>
                    Destino:<br>
                    <textarea required name="destinoServicioTransporte" id="destinoServicioTransporte" cols="30" rows="5" placeholder="Describa el lugar de salida"></textarea>
                    <br>
                    <br>
                    <br>
                    Kilometros:
                    <input required type="number" name="KilometrosServicioTransporte" id="KilometrosServicioTransporte" /><label>km</label>
                    <br>
                    <br>
                    <br>
                    Tipos de Carretera:
                    <input type="checkbox" name="tipoCarreteraServicioTransporte1" id="tipoCarreteraServicioTransporte1" value="Asfalto">Asfalto&emsp;
                    <input type="checkbox" name="tipoCarreteraServicioTransporte2" id="tipoCarreteraServicioTransporte2" value="Calle de Piedra">Calle de Piedra&emsp;
                    <input type="checkbox" name="tipoCarreteraServicioTransporte3" id="tipoCarreteraServicioTransporte3" value="Calle de Tierra">Calle de Tierra&emsp;
                    <input type="checkbox" name="tipoCarreteraServicioTransporte4" id="tipoCarreteraServicioTransporte4" value="Acuatica">Acuatica&emsp;
                    <input type="checkbox" name="tipoCarreteraServicioTransporte5" id="tipoCarreteraServicioTransporte5" value="Via Ferrea">Via Ferrea&emsp;
                    <input type="checkbox" name="tipoCarreteraServicioTransporte6" id="tipoCarreteraServicioTransporte6" value="Aerea">Aerea
                    <br>
                    <br>
                    <br>
                    Tipo de Vehiculo:
                    <select name="tipoVehiculoServicioTransporte" id="tipoVehiculoServicioTransporte">                
                          <option selected value="Bus">Bus</option>
                          <option value="Buseta">Buseta</option>
                          <option value="Bote">Bote</option>
                          <option value="Tren">Tren</option>
                          <option value="Avion">Avion</option>
                    </select>
                    <br>
                    <br>
                    <br>
                    Precio:
                    <label>$<input required type="number" name="precioServicioTransporte" id="precioServicioTransporte" /></label>
                    <br>
                    <br>
                    <br>
                    Cantidad de Personas:
                    <input required type="number" name="cantidadPersonasServicioTransporte" id="cantidadPersonasServicioTransporte" /><br>
                    <br>
                    <br>
                    <br>
                    Sitio Turistico:
                     <select id="sitioturistico" name="sitioturistico">
                    <?php
                        foreach ($listaSitios as $SitioTuristico){
                    ?>
                    <option value="<?php echo $SitioTuristico->getIdSitio();?>"><?php echo $SitioTuristico->getNombreComercial();?></option>;
                    <?php 
                    } 
                    ?>                      
                    </select>
                    <br>
                    <br>
                    <br>
                    
                    <input type="submit" value="Guardar" name="guardarServicioTransporte" id="guardarServicioTransporte"/><br><br>

    		</form>
        
        <h2>Transportes</h2>
    		<table border="1">
    			<tr>
    				
            	<th>Origen</th>
            	<th>Destino</th>
            	<th>Kilometros</th>
            	<th>tipoCarretera</th>
              <th>tipoVehiculo</th>
              <th>Precio</th>
              <th>CantidadPersonas</th>
              <th>Sitio Turistico</th>
              <th>Opcion 1</th>
              <th>Opcion 2</th>
    			</tr>

          <?php
                   
                    foreach ($todosServiciotransporte as $servicioTransporte) 
                    {
                        

        echo '<form method="post" enctype="multipart/form-data" action="../business/servicioTransporteBusinessAction.php">';



                    echo '<input type="hidden" name="idServicioTransporte" id="idServicioTransporte" value="' . $servicioTransporte->getIdServicioTransporte() .'">';


                    echo '<td><input type="text" name="origenServicioTransporte" id="origenServicioTransporte" value="' . $servicioTransporte->getOrigenServicioTransporte() . '"/></td>';
                    
                    echo '<td><input type="text" name="destinoServicioTransporte" id="destinoServicioTransporte" value="' . $servicioTransporte->getDestinoServicioTransporte() . '"/></td>';
                    
                    echo '<td><input type="number" name="KilometrosServicioTransporte" id="KilometrosServicioTransporte" value="' . $servicioTransporte->getKilometrosServicioTransporte() . '"/></td>';
                   

                echo '<td><input type="text" name="tipoCarreteraServicioTransporte" id="tipoCarreteraServicioTransporte" value="' .$servicioTransporte->getTipoCarreteraServicioTransporte().'"/></td>';




                if($servicioTransporte->getTipoVehiculoServicioTransporte()=="Bus")
                {
                  echo '<td>
                    <select required name="tipoVehiculoServicioTransporte" id="tipoVehiculoServicioTransporte">                
                          <option selected value="Bus">Bus</option>
                          <option value="Buseta">Buseta</option>
                          <option value="Bote">Bote</option>
                          <option value="Tren">Tren</option>
                          <option value="Avion">Avion</option>
                        </select>
                    </td>';
                }
                else if($servicioTransporte->getTipoVehiculoServicioTransporte()=="Buseta")
                {
                  echo '<td>
                    <select required name="tipoVehiculoServicioTransporte" id="tipoVehiculoServicioTransporte">                
                          <option value="Bus">Bus</option>
                          <option selected value="Buseta">Buseta</option>
                          <option value="Bote">Bote</option>
                          <option value="Tren">Tren</option>
                          <option value="Avion">Avion</option>
                        </select>
                    </td>';
                }
                else if($servicioTransporte->getTipoVehiculoServicioTransporte()=="Bote")
                {
                  echo '<td>
                    <select required name="tipoVehiculoServicioTransporte" id="tipoVehiculoServicioTransporte">                
                          <option value="Bus">Bus</option>
                          <option value="Buseta">Buseta</option>
                          <option selected value="Bote">Bote</option>
                          <option value="Tren">Tren</option>
                          <option value="Avion">Avion</option>
                        </select>
                    </td>';
                }
                else if($servicioTransporte->getTipoVehiculoServicioTransporte()=="Tren")
                {
                  echo '<td>
                      <select required name="tipoVehiculoServicioTransporte" id="tipoVehiculoServicioTransporte">                
                          <option value="Bus">Bus</option>
                          <option value="Buseta">Buseta</option>
                          <option value="Bote">Bote</option>
                          <option selected value="Tren">Tren</option>
                          <option value="Avion">Avion</option>
                        </select>
                    </td>';
                }
                else
                {
                  echo '<td>
                      <select required name="tipoVehiculoServicioTransporte" id="tipoVehiculoServicioTransporte">                
                          <option value="Bus">Bus</option>
                          <option value="Buseta">Buseta</option>
                          <option value="Bote">Bote</option>
                          <option value="Tren">Tren</option>
                          <option selected value="Avion">Avion</option>
                        </select>
                    </td>';
                }
 







                    echo '<td><input type="number" name="precioServicioTransporte" id="precioServicioTransporte" value="' . $servicioTransporte->getPrecioServicioTransporte() . '"/></td>';
                   
                    echo '<td><input type="number" name="cantidadPersonasServicioTransporte" id="cantidadPersonasServicioTransporte" value="' . $servicioTransporte->getCantidadPersonasServicioTransporte() . '"/></td>';



                    echo '</select>';
                echo '</td>'; 

                 echo '<td><select name="idsitio" id="idsitio"> '?>
                        <?php
                          foreach ($listaSitios as $sitio){
                        ?>
                          <?php
                            if($sitio->getIdSitio() == $servicioTransporte->getSitioTuristico()){  ?>

                               <option selected value="<?php echo $sitio->getIdSitio();?>"><?php echo $sitio->getNombreComercial();?></option>;
                              <?php }else{?>

                                 <option value="<?php echo $sitio->getIdSitio();?>"><?php echo $sitio->getNombreComercial();?></option>;
                              <?php  } ?>
                          
                         
                        <?php 
                           } 
                        ?>
                <?php  



                        echo '<td><input type="submit" value="Actualizar" name="update" id="update"/></td>';
                        echo '<td><input type="submit" value="Eliminar" name="delete" id="delete"/></td>';
             
                        echo '</tr>';
                        echo '</form>';
                    }
                ?>




    			
    		</table>

</body>
</html>


