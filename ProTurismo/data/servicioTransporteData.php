<?php
	
	include_once 'data.php';
	include '../domain/serviciotransporte.php';
	
	class ServicioTransporteData{

		public function ServicioTransporteData(){}

		public function insertarServicioTransporte($serviciotransporte){

			$con = new Data();
			$conexion = $con->conect();
			
   			$precio =$serviciotransporte->getPrecioServicioTransporte();
    		$lugarSalida =$serviciotransporte->getLugarSalidaServicioTransporte();
    		$cantidadPersonas =$serviciotransporte->getCantidadPersonasServicioTransporte();


			$consultaUltimoId ="SELECT MAX(idserviciotransporte) AS idserviciotransporte FROM tbserviciotransporte";
			$maximoId=mysqli_query($conexion,$consultaUltimoId);
			$idSiguiente=1;

			if ($row = mysqli_fetch_row($maximoId)) {
            	$idSiguiente = trim($row[0]) + 1;
        	}

        	$consultaInsertar="INSERT INTO tbserviciotransporte VALUES (".$idSiguiente.",".$precio.",'".$lugarSalida."','".$cantidadPersonas."');";

            $result = mysqli_query($conexion, $consultaInsertar);
        	mysqli_close($conexion);
        	return $result;
		}


		public function mostrarTodosServicioTransporte(){

			$con = new Data();
			$conexion = $con->conect();
			$consultaMostrar = "SELECT * FROM tbserviciotransporte;";
			$result = mysqli_query($conexion, $consultaMostrar);
			mysqli_close($conexion);

        	$servicioDeTransporte = [];
        	while ($row = mysqli_fetch_array($result)) {
            	$temporalServicioTransporte = new ServicioTransporte($row['idserviciotransporte'], $row['precioserviciotransporte'], $row['lugarsalidaserviciotransporte'], $row['cantidadpersonasserviciotransporte']);
            	array_push($servicioDeTransporte, $temporalServicioTransporte);
        	}
        	return $servicioDeTransporte;
		}



		public function actualizarServicioTransporte($serviciotransporte){
			$con = new Data();
			$conexion = $con->conect();

			$consultaActualizar = "UPDATE tbserviciotransporte SET 
		    
		    precioserviciotransporte = ".$serviciotransporte->getPrecioServicioTransporte(). ",
    		lugarsalidaserviciotransporte = '" .$serviciotransporte->getLugarSalidaServicioTransporte(). "',
    		cantidadpersonasserviciotransporte = '" .$serviciotransporte->getCantidadPersonasServicioTransporte(). "' WHERE idserviciotransporte =" . $serviciotransporte->getIdServicioTransporte() . ";";

            $result = mysqli_query($conexion, $consultaActualizar);
        	mysqli_close($conexion);

        	return $result;
		}



		public function eliminarServicioTransporte($idserviciotransporte){
			$con = new Data();
			$conexion = $con->conect();

			$consultaEliminar="DELETE FROM tbserviciotransporte WHERE idserviciotransporte=".$idserviciotransporte.";";

			$result=mysqli_query($conexion,$consultaEliminar);
			mysqli_close($conexion);

        	return $result;
		}

	}
  ?>
