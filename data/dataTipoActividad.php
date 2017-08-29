<?php
	
	include_once 'data.php';
	include '../domain/turismoRural.php';
	
	class DataTipoActividad{

		public function DataTipoActividad(){}

		public function insertarTipoActividad($tipoActividadTuristica){

			$con = new Data();
			$conexion = $con->conect();

			$nombre=$tipoActividadTuristica->getNombreTipoActividadTuristica();
			$descripcion=$tipoActividadTuristica->getDescripciontipoactividadturistica();
			$estado=$tipoActividadTuristica->getEstadoactividadturistica();

			$consultaUltimoId ="SELECT MAX(idtipoactividad) AS idtipoactividad FROM tbtipoactividad";
			$maximoId=mysqli_query($conexion,$consultaUltimoId);
			$idSiguiente=1;

			if ($row = mysqli_fetch_row($maximoId)) {
            	$idSiguiente = trim($row[0]) + 1;
        	}

        	$consultaInsertar="INSERT INTO tbtipoactividad VALUES (".$idSiguiente.",'".
        		$nombre."','".
        		$descripcion."',".$estado.");";

              	$result = mysqli_query($conexion, $consultaInsertar);
        	mysqli_close($conexion);
        	return $result;
		}

		public function mostrarTodosTiposActividades(){

			$con = new Data();
			$conexion = $con->conect();
			$consultaMostrar = "SELECT * FROM tbtipoactividad;";
			$result = mysqli_query($conexion, $consultaMostrar);
			mysqli_close($conexion);
        	$tiposActividadesTuristica = [];
        	while ($row = mysqli_fetch_array($result)) {
            	$temporaralTipoActividad = new TurismoRural($row['idtipoactividad'], $row['nombretipoactividad'], $row['descripciontipoactividad'], $row['estadotipoactividad']);
            	array_push($tiposActividadesTuristica, $temporaralTipoActividad);
        	}
        	return $tiposActividadesTuristica;

		}

		public function actualizarTiposActividades($tipoActividad){

			$con = new Data();
			$conexion = $con->conect();

			 $consultaActualizar = "UPDATE tbtipoactividad SET nombretipoactividad= '" . $tipoActividad->getNombreTipoActividadTuristica() . "', descripciontipoactividad='" . $tipoActividad->getDescripciontipoactividadturistica() . "',estadotipoactividad=" . $tipoActividad->getEstadoactividadturistica() ." WHERE idtipoactividad=" . $tipoActividad->getIdtipoactividadturistica() . ";";

              	$result = mysqli_query($conexion, $consultaActualizar);
        	mysqli_close($conexion);

        	return $result;
		}

		public function eliminarTipoActividad($idTipoActividad){
			$con = new Data();
			$conexion = $con->conect();

			 $consultaEliminar = "DELETE from tbtipoactividad where idtipoactividad=" . $idTipoActividad . ";";
       		 $result = mysqli_query($conexion, $consultaEliminar);
        	mysqli_close($conexion);

        	return $result;
		}

	}
  ?>