<?php
	
	include_once 'data.php';
	include '../domain/serviciotransporte.php';
	
	class ServicioTransporteData{

		public function ServicioTransporteData(){}

		public function insertarServicioTransporte($serviciotransporte){

			$con = new Data();
			$conexion = $con->conect();
			

    		$origen=$serviciotransporte->getOrigenServicioTransporte();
    		$destino=$serviciotransporte->getDestinoServicioTransporte();
    		$kilometros=$serviciotransporte->getKilometrosServicioTransporte();
   			$tipoCarretera=$serviciotransporte->getTipoCarreteraServicioTransporte();
    		$tipoVehiculo=$serviciotransporte->getTipoVehiculoServicioTransporte();
    		$precio=$serviciotransporte->getPrecioServicioTransporte();
    		$cantidadPersonas=$serviciotransporte->getCantidadPersonasServicioTransporte();




			$consultaUltimoId ="SELECT MAX(idserviciotransporte) AS idserviciotransporte FROM tbserviciotrasporte";
			$maximoId=mysqli_query($conexion,$consultaUltimoId);
			$idSiguiente=1;

			if ($row = mysqli_fetch_row($maximoId)) {
            	$idSiguiente = trim($row[0]) + 1;
        	}

        	$consultaInsertar="INSERT INTO tbserviciotrasporte VALUES (
        	
        	".$idSiguiente.",
        	'".$origen."',
        	'".$destino."',
       		".$kilometros.",
        	'".$tipoCarretera."',
       	 	'".$tipoVehiculo."',
        	".$precio.",        	
        	".$cantidadPersonas."
        	
        	);";


            $result = mysqli_query($conexion, $consultaInsertar);
        	mysqli_close($conexion);
        	return $result;
		}











		public function mostrarTodosServicioTransporte(){

			$con = new Data();
			$conexion = $con->conect();
			$consultaMostrar = "SELECT * FROM tbserviciotrasporte;";
			$result = mysqli_query($conexion, $consultaMostrar);
			mysqli_close($conexion);

        	$servicioDeTransporte = [];
        	while ($row = mysqli_fetch_array($result)) {
            	$temporalServicioTransporte = new ServicioTransporte(

            		$row['idserviciotransporte'], 
          			$row['origen'], 
    				$row['destino'],  
    				$row['kilometros'], 
   					$row['tipocarretera'], 
    				$row['tipovehiculo'], 
    				$row['precio'], 
    				$row['cantidadpersonas']
    			);

            	array_push($servicioDeTransporte, $temporalServicioTransporte);
        	}
        	return $servicioDeTransporte;
		}








		public function actualizarServicioTransporte($serviciotransporte){
			$con = new Data();
			$conexion = $con->conect();

			$consultaActualizar = "UPDATE tbserviciotrasporte SET 
    		
          	origen = '".$serviciotransporte->getOrigenServicioTransporte()."',
    		destino = '".$serviciotransporte->getDestinoServicioTransporte(). "',
    		kilometros = ".$serviciotransporte->getKilometrosServicioTransporte().",
   			tipocarretera = '".$serviciotransporte->getTipoCarreteraServicioTransporte()."',
    		tipovehiculo = '".$serviciotransporte->getTipoVehiculoServicioTransporte()."',
    		precio = ".$serviciotransporte->getPrecioServicioTransporte().",
    		cantidadpersonas = ".$serviciotransporte->getCantidadPersonasServicioTransporte()." 		
            WHERE idserviciotransporte =" . $serviciotransporte->getIdServicioTransporte() . ";";


            $result = mysqli_query($conexion,$consultaActualizar);
        	mysqli_close($conexion);

        	return $result;
		}










		public function eliminarServicioTransporte($idserviciotransporte)
		{
			$con = new Data();
			$conexion = $con->conect();

			$consultaEliminar="DELETE FROM tbserviciotrasporte WHERE idserviciotransporte=".$idserviciotransporte.";";

			$result=mysqli_query($conexion,$consultaEliminar);
			mysqli_close($conexion);

        	return $result;
		}

	}
  ?>
