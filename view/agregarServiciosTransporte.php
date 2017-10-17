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
		$listaTransportes=$mostrarServicios->obtenerServiciosTransporteAgregados($idpaquete);

		if(empty($listaTransportes)){?>
			<h3>No existen servicios de transporte creados en el sistema</h3>
		<?php
			}else{
		?>

		<h3>Servicios Transporte</h3>
		<table border="1">
          <tr>
            <th>Origen</th>
            <th>Destino</th>
            <th>Tipo Vehiculo</th>
            <th>Cantidad Personas</th>
            <th>PrecioTransporte</th>
            <th>Opcion 1</th>
        </tr>

        <?php
        	foreach($listaTransportes as $servicio){
        		echo '<tr>';

        		echo '<td><input type="text" readonly name="origen" value="' . $servicio->getOrigenServicioTransporte() . '"/></td>';
        		echo '<td><input type="text" readonly name="destino" value="' . $servicio->getDestinoServicioTransporte() . '"/></td>';
        		echo '<td><input type="text" readonly name ="tipoVehiculo" value="' . $servicio->getTipoVehiculoServicioTransporte() . '"/></td>';
        		  echo '<td><input type="number" readonly name="cantidadPersonasServicioTransporte" id="cantidadPersonasServicioTransporte" value="' . $servicio->getCantidadPersonasServicioTransporte() . '"/></td>';

        		echo '<td><input type="text" readonly name="precioServicioTransporte" id="precioServicioTransporte"  value="'."₡".number_format($servicio->getPrecioServicioTransporte(),2,'.',' ').'"/></td>';

        		  if($servicio->getEstadoAgregado()==0){
                        echo "<td><input type=\"button\" id=\"botonAgregarDescartar\" value=\"Agregar\" onclick=\"agregarServicioTransporte(".$idpaquete.",'".$servicio->getIdServicioTransporte()."','".$servicio->getPrecioServicioTransporte()."'), cargarPaginaTransporte()\"/></td>";
                    }else{
                        echo "<td><input type=\"button\" id=\"botonAgregarDescartar\" value=\"Descartar\" onclick=\"descartarServicioTransporte('".$servicio->getIdServicioTransporte()."','".$idpaquete."','".$servicio->getPrecioServicioTransporte()."'), cargarPaginaTransporte()\"/></td>";
                    }


        		echo '</tr>';
        	}
        ?>

        <script>

          function cargarPaginaTransporte(){
            var idPaqueteJs = <?php echo $idpaquete; ?>;
			$("#contenedorServicios").load("../view/agregarServiciosTransporte.php",{idpaquete:idPaqueteJs});
          }
		</script>
 
</body>
<?php 
        } 

       ?>
</html>