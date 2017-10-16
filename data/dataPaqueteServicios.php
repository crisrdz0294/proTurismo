<?php
	
	include 'data.php';

	class DataPaqueteServicios{
		public function DataPaqueteServicios(){}

		public function agregarServicioAlimentacion($idpaquete,$idservicioalimentacion){
			$con =new Data();
			$conexion=$con->conect();
			$tipoAlimentacion="sa";

			$consultaAgregar="INSERT INTO tbpaqueteturisticoservicio VALUES(".$idpaquete.",".$idservicioalimentacion.",'".$tipoAlimentacion."');";
			$result = mysqli_query($conexion, $consultaAgregar);
        	mysqli_close($conexion);
        	return $result;
		}

		public function agregarServicioTransporte($idpaquete,$idserviciotransporte){
			$con =new Data();
			$conexion=$con->conect();
			$tipoTransporte="st";

			$consultaAgregar="INSERT INTO tbpaqueteturisticoservicio VALUES(".$idpaquete.",".$idserviciotransporte.",'".$tipoTransporte."');";
			$result = mysqli_query($conexion, $consultaAgregar);
        	mysqli_close($conexion);
        	return $result;
		}

		public function agregarServicioHospedaje($idpaquete,$idserviciohospedaje){
			$con =new Data();
			$conexion=$con->conect();
			$tipoHospedaje="sh";

			$consultaAgregar="INSERT INTO tbpaqueteturisticoservicio VALUES(".$idpaquete.",".$idserviciohospedaje.",'".$tipoHospedaje."');";
			$result = mysqli_query($conexion, $consultaAgregar);
        	mysqli_close($conexion);
        	return $result;
		}

		public function descartarServicioAlimentacion($idpaquete,$idservicioalimentacion){
			$con =new Data();
			$conexion=$con->conect();
			$tipoAlimentacion="sa";

			$consultaDescartar="DELETE FROM tbpaqueteturisticoservicio WHERE idpaqueteturistico=".$idpaquete." AND idservicio=".$idservicioalimentacion." AND idtiposervicio='".$tipoAlimentacion."';";
			$result = mysqli_query($conexion, $consultaDescartar);
        	mysqli_close($conexion);
        	return $result;
		}
		public function descartarServicioTransporte($idpaquete,$idserviciotransporte){
			$con =new Data();
			$conexion=$con->conect();
			$tipoTransporte="st";

			$consultaDescartar="DELETE FROM tbpaqueteturisticoservicio WHERE idpaqueteturistico=".$idpaquete." AND idservicio=".$idserviciotransporte." AND idtiposervicio='".$tipoTransporte."';";
			$result = mysqli_query($conexion, $consultaDescartar);
        	mysqli_close($conexion);
        	return $result;
		}
		public function descartarServicioHospedaje($idpaquete,$idserviciohospedaje){
			$con =new Data();
			$conexion=$con->conect();
			$tipoHospedaje="sh";

			$consultaDescartar="DELETE FROM tbpaqueteturisticoservicio WHERE idpaqueteturistico=".$idpaquete." AND idservicio=".$idserviciotransporte." AND idtiposervicio='".$tipoHospedaje."';";
			$result = mysqli_query($conexion, $consultaDescartar);
        	mysqli_close($conexion);
        	return $result;
		}
	}
?>