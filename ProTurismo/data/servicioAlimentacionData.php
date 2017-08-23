<?php
	
	include_once 'data.php';
	include '../domain/servicioAlimentacion.php';
	
	class ServicioAlimentacionData{

		public function ServicioAlimentacionData(){}

		public function insertarServicioAlimentacionData($servicioalimentacion)

		{

			$con = new Data();
			$conexion = $con->conect();
			
			
			$tipoAlimentacion=$servicioalimentacion->getTipoAlimentacionServicioAlimentacion();
			$tiempoComidas=$servicioalimentacion->getTiempoComidasServicioAlimentacion();
			$descripcionAlimentacion=$servicioalimentacion->getDescripcionAlimentacionServicioAlimentacion();

			$consultaUltimoId ="SELECT MAX(idserviciotransporte) AS idserviciotransporte FROM tbserviciotransporte";
			$maximoId=mysqli_query($conexion,$consultaUltimoId);
			$idSiguiente=1;

			if ($row = mysqli_fetch_row($maximoId)) {
            	$idSiguiente = trim($row[0]) + 1;
        	}


			$consultaUltimoId ="SELECT MAX(idalimentacion) AS idalimentacion FROM tbservicioalimentacion";
			$maximoId=mysqli_query($conexion,$consultaUltimoId);
			$idSiguiente=1;

			if ($row = mysqli_fetch_row($maximoId)) {
            	$idSiguiente = trim($row[0]) + 1;
        	}




        	$consultaInsertar="INSERT INTO tbservicioalimentacion VALUES (
        	".$idSiguiente.",
        	'".$tipoAlimentacion."',
        	".$tiempoComidas.",
        	'".$descripcionAlimentacion."');";

              	$result = mysqli_query($conexion, $consultaInsertar);
        	mysqli_close($conexion);
        	return $result;
		}









		public function mostrarTodosServicioAlimentacion(){

			$con = new Data();
			$conexion = $con->conect();


			$consultaMostrar = "SELECT * FROM tbservicioalimentacion;";			
			$result = mysqli_query($conexion, $consultaMostrar);
			mysqli_close($conexion);

        	$servicioalimentacionn = [];
        	while ($row = mysqli_fetch_array($result)) {

            	$temporaralServicioAlimentacion = new ServicioAlimentacion($row['idalimentacion'], $row['tipoalimentacion'], $row['tiempocomidas'], $row['descripcionalimentacion']);
            	array_push($servicioalimentacionn, $temporaralServicioAlimentacion);
        	}
        	return $servicioalimentacionn;

		}








		public function actualizarServicioAlimentacion($servicioAlimentacion){

			$con = new Data();
			$conexion = $con->conect();

			 $consultaActualizar = "UPDATE tbservicioalimentacion SET 
			 tipoalimentacion= '" . $servicioAlimentacion->getTipoAlimentacionServicioAlimentacion() . "', 
			 tiempocomidas=" . $servicioAlimentacion->getTiempoComidasServicioAlimentacion() . ",
			 descripcionalimentacion='" . $servicioAlimentacion->getDescripcionAlimentacionServicioAlimentacion() ."' WHERE idalimentacion=" . $servicioAlimentacion->getIdServicioAlimentacion() . ";";

              	$result = mysqli_query($conexion, $consultaActualizar);
        	mysqli_close($conexion);

        	return $result;
		}








		public function eliminarServicioAlimentacion($idServicioAlimentacion){
			$con = new Data();
			$conexion = $con->conect();

			 $consultaEliminar = "DELETE from tbservicioalimentacion where idalimentacion=" . $idServicioAlimentacion . ";";
       		 $result = mysqli_query($conexion, $consultaEliminar);
        	mysqli_close($conexion);

        	return $result;
		}

	}
  ?>