<?php
	
	include_once 'data.php';
	include '../domain/serviciotransporte.php';
    include_once '../domain/sitioTuristico.php';
	
	class ServicioTransporteData{

		public function ServicioTransporteData(){}



        function uploadImagen($imagenes,$id){
            
            $flag = false;
            $con =new Data();
            $conexion=$con->conect();
            $archivos="";
            $cont = 1;
            foreach ($imagenes as $imagen) 
            {
                 $target_path = "../imagenes/";
                 $name = $imagen['name'];
                $extension = end(explode(".", $name));
                $target_path = $target_path ."tr-".$cont."-".$id.".".$extension;
                if(move_uploaded_file($imagen['tmp_name'], $target_path)) 
                {
                    $flag = true;
                    $archivos=$archivos.$target_path.";";
                    
                }
                $cont++;
            }
            $update ="UPDATE tbserviciotransporte SET imagenes = '$archivos' WHERE idserviciotransporte='$id'";
            mysqli_query($conexion,$update);
            return $flag;
        }



		public function insertarServicioTransporte($serviciotransporte){

			$con = new Data();
			$conexion = $con->conect();
			

    		$origen=$serviciotransporte->getOrigenServicioTransporte();
    		$destino=$serviciotransporte->getDestinoServicioTransporte();
    		$kilometros=$serviciotransporte->getKilometrosServicioTransporte();
   			$tipoCarretera=$serviciotransporte->getTipoCarreteraServicioTransporte();
    		$tipoVehiculo=$serviciotransporte->getTipoVehiculoServicioTransporte();
    		$precio=$serviciotransporte->getPrecioServicioTransporte();
    		$cantidadPersonas=$serviciotransporte->getCantidadPersonasServicioTransporte();

            $idSitio=$serviciotransporte->getSitioTuristico();
        


			$consultaUltimoId ="SELECT MAX(idserviciotransporte) AS idserviciotransporte FROM tbserviciotransporte";
			$maximoId=mysqli_query($conexion,$consultaUltimoId);
			$idSiguiente=1;

			if ($row = mysqli_fetch_row($maximoId)) {
            	$idSiguiente = trim($row[0]) + 1;
        	}

        	$consultaInsertar="INSERT INTO tbserviciotransporte(idserviciotransporte,origenserviciotransporte,destinoserviciotransporte,kilometrosserviciotransporte,tipocarreteraserviciotransporte,tipovehiculoserviciotransporte,precioserviciotransporte,cantidadpersonasserviciotransporte,idsitioturistico) VALUES (
        	
        	".$idSiguiente.",
        	'".$origen."',
        	'".$destino."',
       		".$kilometros.",
        	'".$tipoCarretera."',
       	 	'".$tipoVehiculo."',
        	".$precio.",        	
        	".$cantidadPersonas.",
            ".$idSitio."
        	
        	);";


            $result = mysqli_query($conexion, $consultaInsertar);            
           // $this->uploadImagen($imagenes,$idSiguiente);
        	mysqli_close($conexion);
        	return $result;
		}

		public function mostrarTodosServicioTransporte(){

			$con = new Data();
			$conexion = $con->conect();
			$consultaMostrar = "SELECT * FROM tbserviciotransporte;";
			$result = mysqli_query($conexion, $consultaMostrar);
			mysqli_close($conexion);

        	$servicioDeTransporte = [];
        	while ($row = mysqli_fetch_array($result)) {
            	$temporalServicioTransporte = new ServicioTransporte(

            		$row['idserviciotransporte'], 
          			$row['origenserviciotransporte'], 
    				$row['destinoserviciotransporte'],  
    				$row['kilometrosserviciotransporte'], 
   					$row['tipocarreteraserviciotransporte'], 
    				$row['tipovehiculoserviciotransporte'], 
    				$row['precioserviciotransporte'], 
    				$row['cantidadpersonasserviciotransporte'],
                    $row['idsitioturistico'],0,
                    $row['imagenes']
    			);

            	array_push($servicioDeTransporte, $temporalServicioTransporte);
        	}
        	return $servicioDeTransporte;
		}

         public function mostrarTodosSitiosTuristicos(){

            $con = new Data();
            $conexion = $con->conect();
            $consultaMostrar = "SELECT * FROM tbsitioturistico;";
            $result = mysqli_query($conexion, $consultaMostrar);
            mysqli_close($conexion);
            $sitiosTuristicos = [];
            while ($row = mysqli_fetch_array($result)) {
                $sitioTuristicoTemporal = new SitioTuristico($row['idsitioturistico'],$row['nombrecomercialsitioturistico'],$row['telefonositioturistico'],$row['idprovinciasitioturistico'],$row['idcantonsitioturistico'],$row['iddistritositioturistico'],$row['direccionexactasitioturistico'],$row['sitiowebsitioturistico']);
                array_push($sitiosTuristicos, $sitioTuristicoTemporal);
            }
            return $sitiosTuristicos;
        }

		public function actualizarServicioTransporte($serviciotransporte){
			$con = new Data();
			$conexion = $con->conect();

			$consultaActualizar = "UPDATE tbserviciotransporte SET 
    		origenserviciotransporte = '".$serviciotransporte->getOrigenServicioTransporte()."',
    		destinoserviciotransporte = '".$serviciotransporte->getDestinoServicioTransporte(). "',
    		kilometrosserviciotransporte = ".$serviciotransporte->getKilometrosServicioTransporte().",tipocarreteraserviciotransporte = '".$serviciotransporte->getTipoCarreteraServicioTransporte()."',tipovehiculoserviciotransporte = '".$serviciotransporte->getTipoVehiculoServicioTransporte()."',
    		precioserviciotransporte = ".$serviciotransporte->getPrecioServicioTransporte().",
    		cantidadpersonasserviciotransporte = ".$serviciotransporte->getCantidadPersonasServicioTransporte().",
            idsitioturistico = ".$serviciotransporte->getSitioTuristico()."		
            WHERE idserviciotransporte =" . $serviciotransporte->getIdServicioTransporte() . ";";


            $result = mysqli_query($conexion,$consultaActualizar);
        	mysqli_close($conexion);

        	return $result;
		}

		public function eliminarServicioTransporte($idserviciotransporte)
		{
			$con = new Data();
			$conexion = $con->conect();

			$consultaEliminar="DELETE FROM tbserviciotransporte WHERE idserviciotransporte = ".$idserviciotransporte.";";

			$result=mysqli_query($conexion,$consultaEliminar);
			mysqli_close($conexion);

        	return $result;
		}

	}
  ?>
