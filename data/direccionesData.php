<?php
	
	include_once 'data.php';
	class DireccionesData{
		public function DireccionesData(){}

		public function obtenerProvincias(){
			$con = new Data();
			$conexion = $con->conect();

			$query="SELECT * FROM tbprovincia;";
			$result = mysqli_query($conexion, $consultaInsertar);

			while (($fila = mysqli_fetch_array($result)) != NULL) {
    			echo '<option value="'.$fila["idprovincia"].'">'.$fila["nombreprovincia"].'</option>';
			}
			mysqli_free_result($result);
			mysqli_close($conexion);
		}
	}
?>