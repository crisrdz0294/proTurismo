<?php
	
	include 'data.php';

	class DataPaqueteServicios{
		public function DataPaqueteServicios(){}

		public function agregarServicioAlimentacion($idpaquete,$idservicioalimentacion){
			$con =new Data();
			$conexion=$con->conect();
			$tipoAlimentacion="sa";
			$precioPaquete;
    		$precioNuevo;
            $precioAlimentacion;

			$consultaAgregar="INSERT INTO tbpaqueteturisticoservicio VALUES(".$idpaquete.",".$idservicioalimentacion.",'".$tipoAlimentacion."');";
			$result = mysqli_query($conexion, $consultaAgregar);

			$consultaMostrar ="SELECT preciopaqueteturistico FROM tbpaqueteturistico where idpaqueteturistico=".$idpaquete."";
    		$precioConsulta=mysqli_query($conexion,$consultaMostrar);
    		

    		if ($row = mysqli_fetch_row($precioConsulta)) {
        		$precioPaquete = trim($row[0]);
    		}

            $consultaPrecioAlimentacion ="SELECT precioservicioalimentacion FROM tbservicioalimentacion where idservicioalimentacion=".$idservicioalimentacion."";

            $precioAlimentacionConsulta=mysqli_query($conexion,$consultaPrecioAlimentacion);
            

            if ($row = mysqli_fetch_row($precioAlimentacionConsulta)) {
                $precioAlimentacion = trim($row[0]);
            }

    		if(is_numeric($precioAlimentacion)){

      			$precioNuevo=$precioPaquete+$precioAlimentacion;
     			 $consultaActualizar = "UPDATE tbpaqueteturistico SET preciopaqueteturistico= ".$precioNuevo."
        		WHERE idpaqueteturistico= ".$idpaquete.";";
				$result2= mysqli_query($conexion,$consultaActualizar);

        	}else{

                $porciones = explode(",", $precioAlimentacion);

                for ($i=0; $i <count($porciones);$i++) { 

                        $precioNuevo=$precioNuevo+$porciones[$i];    
                    
                }
                $precioNuevo=$precioNuevo+$precioPaquete;

                $consultaActualizar = "UPDATE tbpaqueteturistico SET preciopaqueteturistico= ".$precioNuevo."
                        WHERE idpaqueteturistico= ".$idpaquete.";";
                        $result2= mysqli_query($conexion,$consultaActualizar);
            }

        	mysqli_close($conexion);
        	return $result;
		}

		public function agregarServicioTransporte($idpaquete,$idserviciotransporte){
			$con =new Data();
			$conexion=$con->conect();
			$tipoTransporte="st";
			$precioPaquete;
    		$precioNuevo;
            $precioTransporte;

			$consultaAgregar="INSERT INTO tbpaqueteturisticoservicio VALUES(".$idpaquete.",".$idserviciotransporte.",'".$tipoTransporte."');";
			$result = mysqli_query($conexion, $consultaAgregar);

			$consultaMostrar ="SELECT preciopaqueteturistico FROM tbpaqueteturistico where idpaqueteturistico=".$idpaquete."";
    		$precioConsulta=mysqli_query($conexion,$consultaMostrar);
    		

    		if ($row = mysqli_fetch_row($precioConsulta)) {
        		$precioPaquete = trim($row[0]);
    		}

            $consultaMostrar2 ="SELECT precioserviciotransporte FROM tbserviciotransporte where idserviciotransporte=".$idserviciotransporte."";
            $precioConsulta2=mysqli_query($conexion,$consultaMostrar2);
            

            if ($row = mysqli_fetch_row($precioConsulta2)) {
                $precioTransporte = trim($row[0]);
            }

          	$precioNuevo=$precioPaquete+$precioTransporte;
     		$consultaActualizar = "UPDATE tbpaqueteturistico SET preciopaqueteturistico= ".$precioNuevo." WHERE idpaqueteturistico= ".$idpaquete.";";
			$result2= mysqli_query($conexion,$consultaActualizar);
        	
        	mysqli_close($conexion);
        	return $result;
		}

		public function agregarServicioHospedaje($idpaquete,$idserviciohospedaje){
			$con =new Data();
			$conexion=$con->conect();
			$tipoHospedaje="sh";
			$precioPaquete;
    		$precioNuevo;
            $precioHospedaje;

			$consultaAgregar="INSERT INTO tbpaqueteturisticoservicio VALUES(".$idpaquete.",".$idserviciohospedaje.",'".$tipoHospedaje."');";
			$result = mysqli_query($conexion, $consultaAgregar);

			$consultaMostrar ="SELECT preciopaqueteturistico FROM tbpaqueteturistico where idpaqueteturistico=".$idpaquete."";
    		$precioConsulta=mysqli_query($conexion,$consultaMostrar);
    		

    		if ($row = mysqli_fetch_row($precioConsulta)) {
        		$precioPaquete = trim($row[0]);
    		}

            $consultaMostrar2 ="SELECT precioserviciohospedaje FROM tbserviciohospedaje where idserviciohospedaje=".$idserviciohospedaje."";
            $precioConsulta2=mysqli_query($conexion,$consultaMostrar2);
            

            if ($row = mysqli_fetch_row($precioConsulta2)) {
                $precioHospedaje = trim($row[0]);
            }

          	$precioNuevo=$precioPaquete+$precioHospedaje;
     		$consultaActualizar = "UPDATE tbpaqueteturistico SET preciopaqueteturistico= ".$precioNuevo." WHERE idpaqueteturistico= ".$idpaquete.";";
			$result2= mysqli_query($conexion,$consultaActualizar);

        	mysqli_close($conexion);
        	return $result;
		}

		public function descartarServicioAlimentacion($idpaquete,$idservicioalimentacion){
			$con =new Data();
			$conexion=$con->conect();
			$tipoAlimentacion="sa";
			$precioPaquete;
    		$precioNuevo;
              $precioAlimentacion;

			$consultaDescartar="DELETE FROM tbpaqueteturisticoservicio WHERE idpaqueteturistico=".$idpaquete." AND idservicio=".$idservicioalimentacion." AND idtiposervicio='".$tipoAlimentacion."';";
			$result = mysqli_query($conexion, $consultaDescartar);

			$consultaMostrar ="SELECT preciopaqueteturistico FROM tbpaqueteturistico where idpaqueteturistico=".$idpaquete."";
    		$precioConsulta=mysqli_query($conexion,$consultaMostrar);
    		

    		if ($row = mysqli_fetch_row($precioConsulta)) {
        		$precioPaquete = trim($row[0]);
    		}

            $consultaPrecioAlimentacion ="SELECT precioservicioalimentacion FROM tbservicioalimentacion where idservicioalimentacion=".$idservicioalimentacion."";

            $precioAlimentacionConsulta=mysqli_query($conexion,$consultaPrecioAlimentacion);
            

            if ($row = mysqli_fetch_row($precioAlimentacionConsulta)) {
                $precioAlimentacion = trim($row[0]);
            }

            

    		if(is_numeric($precioAlimentacion)){

      			$precioNuevo=$precioPaquete-$precioAlimentacion;
     			 $consultaActualizar = "UPDATE tbpaqueteturistico SET preciopaqueteturistico= ".$precioNuevo."
        		WHERE idpaqueteturistico= ".$idpaquete.";";
				$result2= mysqli_query($conexion,$consultaActualizar);
        	}else{

                $porciones = explode(",", $precioAlimentacion);

                for ($i=0; $i <count($porciones);$i++) { 

                        $precioNuevo=$precioNuevo+$porciones[$i];    
                    
                }

                $precioNuevo=$precioPaquete-$precioNuevo;

                $consultaActualizar = "UPDATE tbpaqueteturistico SET preciopaqueteturistico= ".$precioNuevo."
                        WHERE idpaqueteturistico= ".$idpaquete.";";
                        $result2= mysqli_query($conexion,$consultaActualizar);
            }
        	mysqli_close($conexion);
        	return $result;
		}
		public function descartarServicioTransporte($idpaquete,$idserviciotransporte){
			$con =new Data();
			$conexion=$con->conect();
			$tipoTransporte="st";
			$precioPaquete;
    		$precioNuevo;
            $precioTransporte;

			$consultaDescartar="DELETE FROM tbpaqueteturisticoservicio WHERE idpaqueteturistico=".$idpaquete." AND idservicio=".$idserviciotransporte." AND idtiposervicio='".$tipoTransporte."';";
			$result = mysqli_query($conexion, $consultaDescartar);

			$consultaMostrar ="SELECT preciopaqueteturistico FROM tbpaqueteturistico where idpaqueteturistico=".$idpaquete."";
    		$precioConsulta=mysqli_query($conexion,$consultaMostrar);
    		

    		if ($row = mysqli_fetch_row($precioConsulta)) {
        		$precioPaquete = trim($row[0]);
    		}

            $consultaMostrar2 ="SELECT precioserviciotransporte FROM tbserviciotransporte where idserviciotransporte=".$idserviciotransporte."";
            $precioConsulta2=mysqli_query($conexion,$consultaMostrar2);
            

            if ($row = mysqli_fetch_row($precioConsulta2)) {
                $precioTransporte = trim($row[0]);
            }

            $precioNuevo=$precioPaquete-$precioTransporte;
     		$consultaActualizar = "UPDATE tbpaqueteturistico SET preciopaqueteturistico= ".$precioNuevo." WHERE idpaqueteturistico= ".$idpaquete.";";
				$result2= mysqli_query($conexion,$consultaActualizar);
        
        	mysqli_close($conexion);
        	return $result;
		}
	public function descartarServicioHospedaje($idpaquete,$idserviciohospedaje){
			$con =new Data();
			$conexion=$con->conect();
			$tipoHospedaje="sh";
			$precioPaquete;
    		$precioNuevo;
            $precio;

			$consultaDescartar="DELETE FROM tbpaqueteturisticoservicio WHERE idpaqueteturistico=".$idpaquete." AND idservicio=".$idserviciohospedaje." AND idtiposervicio='".$tipoHospedaje."';";
			$result = mysqli_query($conexion, $consultaDescartar);

			$consultaMostrar ="SELECT preciopaqueteturistico FROM tbpaqueteturistico where idpaqueteturistico=".$idpaquete."";
            $precioConsulta=mysqli_query($conexion,$consultaMostrar);
            

            if ($row = mysqli_fetch_row($precioConsulta)) {
                $precioPaquete = trim($row[0]);
            }

            $consultaHospedaje ="SELECT precioserviciohospedaje FROM tbserviciohospedaje where idserviciohospedaje=".$idserviciohospedaje."";
            $precioConsultaHospedaje=mysqli_query($conexion,$consultaHospedaje);
            

            if ($row = mysqli_fetch_row($precioConsultaHospedaje)) {
                $precio = trim($row[0]);
            }

      		$precioNuevo=$precioPaquete-$precio;
     		$consultaActualizar = "UPDATE tbpaqueteturistico SET preciopaqueteturistico= ".$precioNuevo." WHERE idpaqueteturistico= ".$idpaquete.";";

			$result2= mysqli_query($conexion,$consultaActualizar);
        
        	mysqli_close($conexion);
        	return $result;
		}
	}
?>