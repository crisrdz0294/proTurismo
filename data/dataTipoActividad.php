<?php
	
	include_once 'data.php';
	include '../domain/tipoActividad.php';
	
	class DataTipoActividad{

		public function DataTipoActividad(){}

	
		public function mostrarTodosTiposActividades(){

			$con = new Data();
			$conexion = $con->conect();
			$consultaMostrar = "SELECT * FROM tbtipoactividadturistica;";
			$result = mysqli_query($conexion, $consultaMostrar);
			mysqli_close($conexion);
        	$tiposActividades = [];
        	while ($row = mysqli_fetch_array($result)) {
            	$temporaralTipoActividad = new TipoActividad($row['idtipoactividadturistica'], $row['nombretipoactividadturistica'], $row['descripciontipoactividadturistica']);
            	array_push($tiposActividades, $temporaralTipoActividad);
        	}
        	return $tiposActividades;

		}

	}
  ?>