<?php
	
	include 'data.php';

	class DataPaqueteServicios{
		public function DataPaqueteServicios(){}

		public function agregarServicioAlimentacion($idpaquete,$idservicioalimentacion,$precio){
			$con =new Data();
			$conexion=$con->conect();
			$tipoAlimentacion="sa";
			$precioPaquete;
    		$precioNuevo;

			$consultaAgregar="INSERT INTO tbpaqueteturisticoservicio VALUES(".$idpaquete.",".$idservicioalimentacion.",'".$tipoAlimentacion."');";
			$result = mysqli_query($conexion, $consultaAgregar);

			$consultaMostrar ="SELECT preciopaqueteturistico FROM tbpaqueteturistico where idpaqueteturistico=".$idpaquete."";
    		$precioConsulta=mysqli_query($conexion,$consultaMostrar);
    		

    		if ($row = mysqli_fetch_row($precioConsulta)) {
        		$precioPaquete = trim($row[0]);
    		}

    		if(is_numeric($precio)){

      			$precioNuevo=$precioPaquete+$precio;
     			 $consultaActualizar = "UPDATE tbpaqueteturistico SET preciopaqueteturistico= ".$precioNuevo."
        		WHERE idpaqueteturistico= ".$idpaquete.";";
				$result2= mysqli_query($conexion,$consultaActualizar);
        	}
        	mysqli_close($conexion);
        	return $result;
		}

		public function agregarServicioTransporte($idpaquete,$idserviciotransporte,$precio){
			$con =new Data();
			$conexion=$con->conect();
			$tipoTransporte="st";
			$precioPaquete;
    		$precioNuevo;

			$consultaAgregar="INSERT INTO tbpaqueteturisticoservicio VALUES(".$idpaquete.",".$idserviciotransporte.",'".$tipoTransporte."');";
			$result = mysqli_query($conexion, $consultaAgregar);

			$consultaMostrar ="SELECT preciopaqueteturistico FROM tbpaqueteturistico where idpaqueteturistico=".$idpaquete."";
    		$precioConsulta=mysqli_query($conexion,$consultaMostrar);
    		

    		if ($row = mysqli_fetch_row($precioConsulta)) {
        		$precioPaquete = trim($row[0]);
    		}
          	$precioNuevo=$precioPaquete+$precio;
     		$consultaActualizar = "UPDATE tbpaqueteturistico SET preciopaqueteturistico= ".$precioNuevo." WHERE idpaqueteturistico= ".$idpaquete.";";
			$result2= mysqli_query($conexion,$consultaActualizar);
        	
        	mysqli_close($conexion);
        	return $result;
		}

		public function agregarServicioHospedaje($idpaquete,$idserviciohospedaje,$precio){
			$con =new Data();
			$conexion=$con->conect();
			$tipoHospedaje="sh";
			$precioPaquete;
    		$precioNuevo;

			$consultaAgregar="INSERT INTO tbpaqueteturisticoservicio VALUES(".$idpaquete.",".$idserviciohospedaje.",'".$tipoHospedaje."');";
			$result = mysqli_query($conexion, $consultaAgregar);

			$consultaMostrar ="SELECT preciopaqueteturistico FROM tbpaqueteturistico where idpaqueteturistico=".$idpaquete."";
    		$precioConsulta=mysqli_query($conexion,$consultaMostrar);
    		

    		if ($row = mysqli_fetch_row($precioConsulta)) {
        		$precioPaquete = trim($row[0]);
    		}
          	$precioNuevo=$precioPaquete+$precio;
     		$consultaActualizar = "UPDATE tbpaqueteturistico SET preciopaqueteturistico= ".$precioNuevo." WHERE idpaqueteturistico= ".$idpaquete.";";
			$result2= mysqli_query($conexion,$consultaActualizar);

        	mysqli_close($conexion);
        	return $result;
		}

		public function descartarServicioAlimentacion($idpaquete,$idservicioalimentacion,$precio){
			$con =new Data();
			$conexion=$con->conect();
			$tipoAlimentacion="sa";
			$precioPaquete;
    		$precioNuevo;

			$consultaDescartar="DELETE FROM tbpaqueteturisticoservicio WHERE idpaqueteturistico=".$idpaquete." AND idservicio=".$idservicioalimentacion." AND idtiposervicio='".$tipoAlimentacion."';";
			$result = mysqli_query($conexion, $consultaDescartar);

			$consultaMostrar ="SELECT preciopaqueteturistico FROM tbpaqueteturistico where idpaqueteturistico=".$idpaquete."";
    		$precioConsulta=mysqli_query($conexion,$consultaMostrar);
    		

    		if ($row = mysqli_fetch_row($precioConsulta)) {
        		$precioPaquete = trim($row[0]);
    		}

    		if(is_numeric($precio)){

      			$precioNuevo=$precioPaquete-$precio;
     			 $consultaActualizar = "UPDATE tbpaqueteturistico SET preciopaqueteturistico= ".$precioNuevo."
        		WHERE idpaqueteturistico= ".$idpaquete.";";
				$result2= mysqli_query($conexion,$consultaActualizar);
        	}
        	mysqli_close($conexion);
        	return $result;
		}
		public function descartarServicioTransporte($idpaquete,$idserviciotransporte,$precio){
			$con =new Data();
			$conexion=$con->conect();
			$tipoTransporte="st";
			$precioPaquete;
    		$precioNuevo;

			$consultaDescartar="DELETE FROM tbpaqueteturisticoservicio WHERE idpaqueteturistico=".$idpaquete." AND idservicio=".$idserviciotransporte." AND idtiposervicio='".$tipoTransporte."';";
			$result = mysqli_query($conexion, $consultaDescartar);

			$consultaMostrar ="SELECT preciopaqueteturistico FROM tbpaqueteturistico where idpaqueteturistico=".$idpaquete."";
    		$precioConsulta=mysqli_query($conexion,$consultaMostrar);
    		

    		if ($row = mysqli_fetch_row($precioConsulta)) {
        		$precioPaquete = trim($row[0]);
    		}
      		$precioNuevo=$precioPaquete-$precio;
     		$consultaActualizar = "UPDATE tbpaqueteturistico SET preciopaqueteturistico= ".$precioNuevo." WHERE idpaqueteturistico= ".$idpaquete.";";
				$result2= mysqli_query($conexion,$consultaActualizar);
        
        	mysqli_close($conexion);
        	return $result;
		}
		public function descartarServicioHospedaje($idpaquete,$idserviciohospedaje,$precio){
			$con =new Data();
			$conexion=$con->conect();
			$tipoHospedaje="sh";
			$precioPaquete;
    		$precioNuevo;

			$consultaDescartar="DELETE FROM tbpaqueteturisticoservicio WHERE idpaqueteturistico=".$idpaquete." AND idservicio=".$idserviciohospedaje." AND idtiposervicio='".$tipoHospedaje."';";
			$result = mysqli_query($conexion, $consultaDescartar);

			$consultaMostrar ="SELECT preciopaqueteturistico FROM tbpaqueteturistico where idpaqueteturistico=".$idpaquete."";
    		$precioConsulta=mysqli_query($conexion,$consultaMostrar);
    		

    		if ($row = mysqli_fetch_row($precioConsulta)) {
        		$precioPaquete = trim($row[0]);
    		}
      		$precioNuevo=$precioPaquete-$precio;
     		$consultaActualizar = "UPDATE tbpaqueteturistico SET preciopaqueteturistico= ".$precioNuevo."WHERE idpaqueteturistico= ".$idpaquete.";";
				$result2= mysqli_query($conexion,$consultaActualizar);
        
        	mysqli_close($conexion);
        	return $result;
		}
	}
?>