<?php
	include 'data.php';
	include '../domain/provincias.php';

	class DataDirecciones{

		public function DataDirecciones(){}

		public function obtenerTodasProvincias(){

			$con = new Data();
			$conexion = $con->conect();
			$consultaMostrar = "SELECT * FROM tbprovincia;";
			$result = mysqli_query($conexion, $consultaMostrar);
			mysqli_close($conexion);
        	$provincias = [];
        	while ($row = mysqli_fetch_array($result)) {
            	$provinciaTemporal = new Provincia($row['idprovincia'],$row['nombreprovincia']);
            	array_push($provincias, $provinciaTemporal);
        	}
        	return $provincias;
		}	
	}
?>