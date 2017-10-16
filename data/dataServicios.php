<?php  
	include 'data.php';

	class DataPaqueteServicios{
		public function DataPaqueteServicios(){}
		public function obtenerIdServiciosAlimentacion(){
		$con =new Data();
			$conexion=$con->conect();
			$consultaMostrar="SELECT idservicio FROM tbpaqueteturisticoservicio WHERE idtiposervicio='sa';";

			$result = mysqli_query($conexion, $consultaMostrar);
			mysqli_close($conexion);
        	$listaId = array();
        	while ($row = mysqli_fetch_array($result)) {

        		$valores=array("idServicioAlimentacion"=>$row["idservicio"]);
            	array_push($listaId, $valores);
        	}
        	return $listaId;
	}
	public function obtenerIdServiciosHospedaje(){
		$con =new Data();
			$conexion=$con->conect();
			$consultaMostrar="SELECT idservicio FROM tbpaqueteturisticoservicio WHERE idtiposervicio='sh';";

			$result = mysqli_query($conexion, $consultaMostrar);
			mysqli_close($conexion);
        	$listaId = array();
        	while ($row = mysqli_fetch_array($result)) {

        		$valores=array("idServicioHospedaje"=>$row["idservicio"]);
            	array_push($listaId, $valores);
        	}
        	return $listaId;
	}
	public function obtenerIdServiciosTransporte(){}
		$con =new Data();
			$conexion=$con->conect();
			$consultaMostrar="SELECT idservicio FROM tbpaqueteturisticoservicio WHERE idtiposervicio='st';";

			$result = mysqli_query($conexion, $consultaMostrar);
			mysqli_close($conexion);
        	$listaId = array();
        	while ($row = mysqli_fetch_array($result)) {

        		$valores=array("idServicioTransporte"=>$row["idservicio"]);
            	array_push($listaId, $valores);
        	}
        	return $listaId;
	}
	}
?>