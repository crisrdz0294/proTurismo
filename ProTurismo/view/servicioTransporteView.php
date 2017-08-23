<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php
		include '../business/servicioTransporteBusiness.php';
	?>
</head>
<body>

 		<header> 
        </header>

         <h1>Registrar Transporte</h1><br>
        	<form id="form" method="post" action="../business/servicioTransporteBusinessAction.php">
                    Precio:
                    <input required type="number" name="precioServicioTransporte" id="precioServicioTransporte" /><br>
                    <br>
                    Lugar de Salida:<br>
                    <textarea required name="lugarSalida" id="lugarSalida" cols="30" rows="5" placeholder="Describa el lugar de salida"></textarea><br>
                    <br>
                    <br>
                    Cantidad de Personas:
                    <select required name="cantidadPersonas" id="cantidadPersonas">  							
   							        <option selected value="1">10 - 12</option>
   							        <option value="2"> 13 - 19</option>
   							        <option value="3"> 20 - 25</option>
   							        <option value="4"> 30 - 50</option>
  						      </select>
                    <br>
                        <br>
                        <br>
                    
                    <input type="submit" value="Guardar" name="guardarServicioTransporte" id="guardarServicioTransporte"/><br><br>

    		</form>
        
        <h2>Transportes</h2>
    		<table border="1">
    			
    			<tr>
    				<th>Precio </th>
            		<th>LugarSalida</th>
            		<th>CantidadPersonas</th>
            		<th>Opcion 1</th>
            		<th>Opcion 2</th>
    			</tr>

    			<?php
    				     $serviciotransporteBusiness = new ServicioTransporteBusiness();
           			 $todosServiciotransporte = $serviciotransporteBusiness->mostrarTodosServicioTransporte();
             		foreach ($todosServiciotransporte as $servicioTransporte) {
                		echo '<form method="post" enctype="multipart/form-data" action="../business/servicioTransporteBusinessAction.php">';
                		echo '<input type="hidden" name="idServicioTransporte" id="idServicioTransporte" value="' . $servicioTransporte->getIdServicioTransporte() .'">';
                		echo '<tr>';

                		echo '<td><input type="number" name="precioServicioTransporte" id="precioServicioTransporte" value="' . $servicioTransporte->getPrecioServicioTransporte() . '"/></td>';

                		echo '<td><input type="text" name="lugarSalida" id="lugarSalida" value="' . $servicioTransporte->getLugarSalidaServicioTransporte() . '"/></td>';

                		if($servicioTransporte->getCantidadPersonasServicioTransporte()==0){
                       		echo '<td> <select name="cantidadPersonas" id="cantidadPersonas">
                         			<option selected value="0">10 - 12</option>
                           			<option value="1"> 13 - 19</option>
                            		<option value="2"> 20 - 25</option>
                            		<option value="3"> 30 - 50</option>
                      				 </select> 
                       			</td>';
                		}else if($servicioTransporte->getCantidadPersonasServicioTransporte()==1){
                       		echo '<td> <select name="cantidadPersonas" id="cantidadPersonas">
                         			<option value="0">10 - 12</option>
                            		<option selected value="1"> 13 - 19</option>
                            		<option value="2"> 20 - 25</option>
                            		<option value="3"> 30 - 50</option>
                       			</select> 
                       		</td>';
                		}else if($servicioTransporte->getCantidadPersonasServicioTransporte()==2){
                       			echo '<td> <select name="cantidadPersonas" id="cantidadPersonas">
                         				<option value="0">10 - 12</option>
                            			<option value="1"> 13 - 19</option>
                            			<option selected value="2"> 20 - 25</option>
                            			<option value="3"> 30 - 50</option>
                       				</select> 
                       			</td>';
                		}else if($servicioTransporte->getCantidadPersonasServicioTransporte()==3){
                       			echo '<td> <select name="cantidadPersonas" id="cantidadPersonas">
                         				 <option value="0">10 - 12</option>
                            			<option value="1"> 13 - 19</option>
                            			<option value="2"> 20 - 25</option>
                            			<option selected value="3"> 30 - 50</option>
                       				</select> 
                       			</td>';
                		}
                


                		echo '<td><input type="submit" value="Actualizar" name="update" id="update"/></td>';
                		echo '<td><input type="submit" value="Eliminar" name="delete" id="delete"/></td>';
             
                		echo '</tr>';
                		echo '</form>';
            		}
    			?>
    		</table>

</body>
</html>