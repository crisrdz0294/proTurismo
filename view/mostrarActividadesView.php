<!DOCTYPE html>
<html>
<head>
	<title></title>

<?php
        include '../business/paqueteTuristicoBusiness.php';
?>
	
</head>
<body>



	
    <br>
	<table border="1">
		
		  <tr>
            <th>Nombre </th>
            <th>Descripcion </th>
            <th>Opcion 1</th>
        </tr>

        <?php	
            $paqueteBusiness=new paqueteTuristicoBusiness();
            $idPaquete = $_GET['idpaquete'];
			include '../business/paqueteActividadBusiness.php';
			$paqueteActividadBusiness=new PaqueteActividadBusiness();
            $nombrePaquete=$paqueteBusiness->obtenerNombrePaquete($idPaquete);

            for($j=0;$j<count($nombrePaquete);$j++){
                $temporalNombre=$nombrePaquete[$j];
                echo "Nombre del paquete turistico:  ".$temporalNombre['nombrepaquete']."";

            }
        ?><br>
        
        <h4>Lista de Actividades</h4>
        <?php
           
			$listaActividades=$paqueteActividadBusiness->obtenerActividadesAgregadas($idPaquete);
            

        	foreach ($listaActividades as $actividad) {
                	echo '<tr>';

               		echo '<td><input readonly type="text" name="nombreActividad" id="nombreActividad" value="' . $actividad->getNombreActividad() . '"/></td>';
                	echo '<td><input readonly type="text" name="descripcionActividad" id="descripcionActividad" value="' . $actividad->getDescripcionActividad() . '"/></td>';
                    
                	if($actividad->getEstadoAgregado()==0){
                        echo "<td><input type=\"button\" id=\"botonAgregarDescartar\" value=\"Agregar\" onclick=\"agregarActividad(".$idPaquete.",'".$actividad->getIdActividad()."'), cargarPagina('../view/mostrarActividadesView.php?idpaquete=".$idPaquete."')\"/></td>";
                		
                	}else {
                         echo "<td><input type=\"button\" id=\"botonAgregarDescartar\" value=\"Descartar\" onclick=\"descartarActividad('".$actividad->getIdActividad()."','".$idPaquete."'), cargarPagina('../view/mostrarActividadesView.php?idpaquete=".$idPaquete."')\"/></td>";
                	}
                
                	
               		

                echo '</tr>';
               

            }
        ?>

	</table>

</body>
</html>