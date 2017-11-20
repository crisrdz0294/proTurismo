<?php

include_once 'data.php';
include '../domain/servicioHabitacion.php';
include_once '../domain/sitioTuristico.php';


class ServicioHabitacionData {

    function ServicioHabitacionData(){}


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
                $target_path = $target_path ."hb-".$cont."-".$id.".".$extension;
                if(move_uploaded_file($imagen['tmp_name'], $target_path)) 
                {
                    $flag = true;
                    $archivos=$archivos.$target_path.";";
                    
                }
                $cont++;
            }
            $update ="UPDATE tbserviciohospedaje SET imagenes = '$archivos' WHERE idserviciohospedaje='$id'";
            mysqli_query($conexion,$update);
            return $flag;
        }




    public function insertServicioHabitacion($servicioHabitacion,$imagenes)
    {
        $con= new Data();
        $conexion=$con->conect();

        $consultaUltimoId ="SELECT MAX(idserviciohospedaje) AS idserviciohospedaje FROM tbserviciohospedaje";
	       $maximoId=mysqli_query($conexion,$consultaUltimoId);
    	   $idSiguiente=1;

	       if ($row = mysqli_fetch_row($maximoId)) {
            	$idSiguiente = trim($row[0]) + 1;
        }

           $internet=$servicioHabitacion->getInternetHabitacion();
           $cable=$servicioHabitacion->getCableHabitacion();
           $cama=$servicioHabitacion->getCamaHabitacion();
           $aire=$servicioHabitacion->getAireAcondicionadoHabitacion();
           $ventilador=$servicioHabitacion->getVentiladorHabitacion();
           $vista=$servicioHabitacion->getVistaHabitacion();
           $camas=$servicioHabitacion->getCantidadCamasHabitacion();           
           $personas=$servicioHabitacion->getCantidadPersonasHabitacion();
           $cuarto=$servicioHabitacion->getCantidadCuartosHabitacion();
           $acceso=$servicioHabitacion->getAccesibilidadHabitacion();
           $banos=$servicioHabitacion->getBanosHabitacion();
           $precio=$servicioHabitacion->getPrecioServicioHabitacion();
           $idSitio=$servicioHabitacion->getIdSitio();


           $consultaInsertar="INSERT INTO tbserviciohospedaje(idserviciohospedaje,tipocamaserviciohospedaje,internetserviciohospedaje,cableserviciohospedaje,aireacondicionadoserviciohospedaje,ventiladorserviciohospedaje,cantidadcamasserviciohospedaje,cantidadpersonasserviciohospedaje,vistaserviciohospedaje,banosserviciohospedaje,accesibilidadserviciohospedaje,numerocuartosserviciohospedaje,precioserviciohospedaje,idsitioturistico)
           
            VALUES (".$idSiguiente.",
            '".$cama."',
            ".$internet.",
            ".$cable.",
            ".$aire.",
            ".$ventilador.",
            ".$camas.",
            ".$personas.",         
            '".$vista."',
            '".$banos."',
            ".$acceso.",
            ".$cuarto.",
            ".$precio.",
            ".$idSitio.");";

          $result = mysqli_query($conexion, $consultaInsertar);         
          $this->uploadImagen($imagenes,$idSiguiente);
        	mysqli_close($conexion);
        	return $result;

    }

    public function mostrarHabitaciones(){

			$con = new Data();
			$conexion = $con->conect();
			$consultaMostrar = "SELECT * FROM tbserviciohospedaje;";
			$result = mysqli_query($conexion, $consultaMostrar);
			mysqli_close($conexion);
        	$tuRoom = [];
        	while ($row = mysqli_fetch_array($result)) {

            	$temporalHabitacion = new ServicioHabitacion(
              
              $row['tipocamaserviciohospedaje'],
              $row['internetserviciohospedaje'],
              $row['aireacondicionadoserviciohospedaje'],
              $row['cableserviciohospedaje'],
              $row['idserviciohospedaje'],
              $row['cantidadcamasserviciohospedaje'],
              $row['ventiladorserviciohospedaje'],
              $row['vistaserviciohospedaje'],
              $row['cantidadpersonasserviciohospedaje'],
              $row['numerocuartosserviciohospedaje'], 
              $row['banosserviciohospedaje'],
              $row['accesibilidadserviciohospedaje'],
              $row['precioserviciohospedaje'],
              $row['idsitioturistico'],0);
            	
              array_push($tuRoom, $temporalHabitacion);
        	}
        	return $tuRoom;

		}


		public function actualizarHabitacion($servicioHabitacion){

			$con = new Data();
			$conexion = $con->conect();
                 
           $idRoom=$servicioHabitacion->getIdHabitacion();            
           $internet=$servicioHabitacion->getInternetHabitacion();
           $cable=$servicioHabitacion->getCableHabitacion();
           $cama=$servicioHabitacion->getCamaHabitacion();
           $aire=$servicioHabitacion->getAireAcondicionadoHabitacion();
           $ventilador=$servicioHabitacion->getVentiladorHabitacion();
           $vista=$servicioHabitacion->getVistaHabitacion();
           $camas=$servicioHabitacion->getCantidadCamasHabitacion();
           
           $personas=$servicioHabitacion->getCantidadPersonasHabitacion();
           $cuarto=$servicioHabitacion->getCantidadCuartosHabitacion();

           $acceso=$servicioHabitacion->getAccesibilidadHabitacion();
           $banos=$servicioHabitacion->getBanosHabitacion();
          $precio=$servicioHabitacion->getPrecioServicioHabitacion();
           $idSitio=$servicioHabitacion->getIdSitio();


			 $consultaActualizar = "UPDATE tbserviciohospedaje SET 

        tipocamaserviciohospedaje= '".$cama."',
        internetserviciohospedaje =". $internet.",
        cableserviciohospedaje=".$cable.",
        aireacondicionadoserviciohospedaje=".$aire.",
        ventiladorserviciohospedaje=".$ventilador.",
        cantidadcamasserviciohospedaje=".$camas.",
        cantidadpersonasserviciohospedaje=".$personas.",
        vistaserviciohospedaje='".$vista."',
        banosserviciohospedaje='".$banos."',
        accesibilidadserviciohospedaje	=".$acceso.",
        numerocuartosserviciohospedaje=".$cuarto.",
        precioserviciohospedaje=".$precio.",     
        idsitioturistico=".$idSitio."  WHERE idserviciohospedaje=".$idRoom.";";

              	$result = mysqli_query($conexion, $consultaActualizar);
        	mysqli_close($conexion);

        	return $result;
		}

		public function eliminarHabitacion($idServicioHabitacion){
			$con = new Data();
			$conexion = $con->conect();

			 $consultaEliminar = "DELETE from tbserviciohospedaje where idserviciohospedaje=" . $idServicioHabitacion . ";";
       		 $result = mysqli_query($conexion, $consultaEliminar);
        	mysqli_close($conexion);

        	return $result;
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

}
