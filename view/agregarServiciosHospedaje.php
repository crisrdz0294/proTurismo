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
	$listaHospedaje=$mostrarServicios->obtenerServiciosHospedajeAgregados($idpaquete);

	if(empty($listaHospedaje)){     ?>
   
		<h3>No existen servicios de hospedaje en el sistema</h3>
        <?php }else{ ?>

    	<h3>Servicios Hospedaje</h3>
    	<table border="1">
          <tr>
            <th>Tipo Cama</th>
            <th>Cantidad Camas </th>
            <th>Cantidad Cuartos</th>
            <th>Cantidad Personas</th>
            <th>Precio Hospedaje</th>
            <th>Opcion 1</th>
        </tr>
        <?php
        	foreach ($listaHospedaje as $servicio) {

        		echo '<tr>';

        		echo '<td><input type="text" name="cantidadcamas" readonly value="'.$servicio->getCamaHabitacion().'"/></td>';
        		echo '<td><input type="number" name="cantidadcamas" readonly value="'.$servicio->getCantidadCamasHabitacion().'"/></td>';
        		 echo '<td><input type="number" name="cantidadCuartos" value="'.$servicio->getCantidadCuartosHabitacion().'"/></td>';
        		 echo '<td><input type="number" name="cantidadpersonas" value="'.$servicio->getCantidadPersonasHabitacion().'"/></td>';

        		 echo '<td><input type="text" name="precio" id="precio" value= "'."₡".number_format($servicio->getPrecioServicioHabitacion(),2,'.',' ').'"/></td>';

                 if($servicio->getEstadoAgregado()==0){
                        echo "<td><input type=\"button\" id=\"botonAgregarDescartar\" value=\"Agregar\" onclick=\"agregarServicioHospedaje(".$idpaquete.",'".$servicio->getIdHabitacion()."','".$servicio->getPrecioServicioHabitacion()."'), cargarPaginaHospedaje()\"/></td>";
                    }else{
                        echo "<td><input type=\"button\" id=\"botonAgregarDescartar\" value=\"Descartar\" onclick=\"descartarServicioHospedaje('".$servicio->getIdHabitacion()."','".$idpaquete."','".$servicio->getPrecioServicioHabitacion()."'), cargarPaginaHospedaje()\"/></td>";
                    }

        		  echo '</tr>';
        	}
        ?>
        <script>

          function cargarPaginaHospedaje(){
            var idPaqueteJs = <?php echo $idpaquete; ?>;
			$("#contenedorServicios").load("../view/agregarServiciosHospedaje.php",{idpaquete:idPaqueteJs});
          }
		</script>
</body>
<?php 
        } 

       ?>
</html>