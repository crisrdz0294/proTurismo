<?php
	
	include_once 'data.php';
	include '../domain/paqueteActividad.php';

	class DataPaqueteActividad{

		public function DataPaqueteActividad(){}

		public function agregarActividadPaquete($paqueteActividad){

			$con =new Data();
			$conexion=$con->conect();
			$idpaquete=$paqueteActividad->getIdPaquete();
			$idactividad=$paqueteActividad->getIdActividad();

			$consultaAgregar="INSERT INTO tbpaqueteturisticoactividad VALUES(".$idpaquete.",".$idactividad.");";
			$result = mysqli_query($conexion, $consultaAgregar);
        	mysqli_close($conexion);
        	return $result;
		}

		public function descartarActividadPaquete($idactividad){
			$con =new Data();
			$conexion=$con->conect();
			
			$consultaDescartar="DELETE FROM tbpaqueteturisticoactividad WHERE idactividad=".$idactividad.";";
			$result = mysqli_query($conexion, $consultaDescartar);
        	mysqli_close($conexion);
        	return $result;	
		}

		public function obtenerIdActividadesPaquete(){

			$con =new Data();
			$conexion=$con->conect();
			$consultaMostrar="SELECT * FROM tbpaqueteturisticoactividad;";

			$result = mysqli_query($conexion, $consultaMostrar);
			mysqli_close($conexion);
        	$listaIdActividades = array();
        	while ($row = mysqli_fetch_array($result)) {

        		$valores=array("idactividad"=>$row["idactividad"],"idpaquete"=>$row["idpaqueteturistico"]);
            	array_push($listaIdActividades, $valores);
        	}
        	return $listaIdActividades;

		}

	}
?>