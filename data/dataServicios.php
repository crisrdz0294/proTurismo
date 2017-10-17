<?php  
	include_once 'data.php';

	class DataServicios{
		public function DataServicios(){}

		public function obtenerIdServiciosAlimentacion(){
			$con =new Data();
			$conexion=$con->conect();
			$consultaMostrar="SELECT idpaqueteturistico,idservicio FROM tbpaqueteturisticoservicio WHERE idtiposervicio='sa';";

			$result = mysqli_query($conexion, $consultaMostrar);
			mysqli_close($conexion);
        	$listaId = array();
        	while ($row = mysqli_fetch_array($result)) {

        		$valores=array("idServicioAlimentacion"=>$row["idservicio"],"idpaquete"=>$row["idpaqueteturistico"]);
            	array_push($listaId, $valores);
        	}
        	return $listaId;
		}
		public function obtenerIdServiciosHospedaje(){
			$con =new Data();
			$conexion=$con->conect();
			$consultaMostrar="SELECT idpaqueteturistico,idservicio FROM tbpaqueteturisticoservicio WHERE idtiposervicio='sh';";

			$result = mysqli_query($conexion, $consultaMostrar);
			mysqli_close($conexion);
        	$listaId = array();
        	while ($row = mysqli_fetch_array($result)) {

        		$valores=array("idServicioHospedaje"=>$row["idservicio"],"idpaquete"=>$row["idpaqueteturistico"]);
            	array_push($listaId, $valores);
        	}
        	return $listaId;
	}
	public function obtenerIdServiciosTransporte(){
		$con =new Data();
			$conexion=$con->conect();
			$consultaMostrar="SELECT idpaqueteturistico,idservicio FROM tbpaqueteturisticoservicio WHERE idtiposervicio='st';";

			$result = mysqli_query($conexion, $consultaMostrar);
			mysqli_close($conexion);
        	$listaId = array();
        	while ($row = mysqli_fetch_array($result)) {

        		$valores=array("idServicioTransporte"=>$row["idservicio"],"idpaquete"=>$row["idpaqueteturistico"]);
            	array_push($listaId, $valores);
        	}
        	return $listaId;
	}
	}
?>