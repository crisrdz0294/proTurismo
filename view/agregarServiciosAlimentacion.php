<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>


<style type="text/css">
	#contenedorServicios{
		margin-left: 20%;
        margin-top: -8.7%;
	}
</style>
<body>
	<div id="contenedorServicios"></div>

        <?php
        	$idpaquete=$_POST["idpaquete"];

           	include '../business/mostrarServiciosBusiness.php';
			$mostrarServicios = new MostrarServiciosBusiness();
			$listaAlimentacion=$mostrarServicios->obtenerServiciosAlimentacionAgregados($idpaquete);

			if(empty($listaAlimentacion)){
			?>
			<h3>No existen servicios de alimentacion en el sistema</h3>
			<?php
			}else{?>
    <h3>Servicios Alimentacion</h3>

		<table border="1">
          <tr>
            <th>Tiempos</th>
            <th>Descripcion </th>
            <th>Precio</th>
            <th>Opcion 1</th>
        </tr>
        <?php
        	foreach ($listaAlimentacion as $servicio) {
                	echo '<tr>';

               		echo '<td><input readonly type="text" name="tiempos" id="tiempos" value="' . $servicio->getTiempoComidasServicioAlimentacion() . '"/></td>';
               		echo '<td><input readonly type="text" name="descripcion" id="descripcion" value="' . $servicio->getDescripcionAlimentacionServicioAlimentacion() . '"/></td>';
               		
                  echo '<td><input type="text" readonly name="precio" id="precio" onkeyup="format(this)" value= "'."₡".$servicio->getPrecioServicioAlimentacion().'"/></td>';

               		if($servicio->getEstadoAgregado()==0){
               			echo "<td><input type=\"button\" id=\"botonAgregarDescartar\" value=\"Agregar\" onclick=\"agregarServicioAlimentacion(".$idpaquete.",'".$servicio->getIdServicioAlimentacion()."','".$servicio->getPrecioServicioAlimentacion()."'), cargarPaginaAlimentacion()\"/></td>";
               		}else{
               			echo "<td><input type=\"button\" id=\"botonAgregarDescartar\" value=\"Descartar\" onclick=\"descartarServicioAlimentacion('".$servicio->getIdServicioAlimentacion()."','".$idpaquete."','".$servicio->getPrecioServicioAlimentacion()."'), cargarPaginaAlimentacion()\"/></td>";
               		}

                echo '</tr>';
               

            }
        ?>
			
			<script>

            	function cargarPaginaAlimentacion()
            	{
            		var idPaqueteJs = <?php echo $idpaquete; ?>;

             		$("#contenedorServicios").load("../view/agregarServiciosAlimentacion.php",{idpaquete:idPaqueteJs});
            	}

            	
		</script>
        </body>
        <?php 
        } 

       ?>
</html>