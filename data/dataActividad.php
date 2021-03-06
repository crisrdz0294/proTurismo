<?php
	
	include_once 'data.php';
	include '../domain/actividad.php';

	class DataActividad{

		public function DataActividad(){}

		public function insertarActividad($actividad){
			$con = new Data();
			$conexion = $con->conect();

			$nombre=$actividad->getNombreActividad();
			$descripcion=$actividad->getDescripcionActividad();
			$estado=$actividad->getEstadoActividad();
			$cantidadPersonas=$actividad->getCantidadPersonasActividad();
			$lugarActivdad=$actividad->getLugarActividad();
			$distanciaHospedaje=$actividad->getDistanciaHospedajeActividad();
			$horarioActividad=$actividad->getHorarioActividad();
			$idSitio=$actividad->getIdSitioActividad();
			$idTipoActividad=$actividad->getIdTipoActividadSitio();
			$habilidadesActividad=$actividad->getHabilidadesActividad();
			$precio=$actividad->getPrecioActividad();

			$consultaUltimoId ="SELECT MAX(idactividad) AS idactividad FROM tbactividad";
			$maximoId=mysqli_query($conexion,$consultaUltimoId);
			$idSiguiente=1;

			if ($row = mysqli_fetch_row($maximoId)) {
            	$idSiguiente = trim($row[0]) + 1;
        	}

        	$consultaInsertar="INSERT INTO tbactividad VALUES(".$idSiguiente.",'".$nombre."','".$descripcion."',".$estado.",".$cantidadPersonas.",'".$lugarActivdad."','".$distanciaHospedaje."','".$habilidadesActividad."','".$horarioActividad."',".$precio.",".$idSitio.",".$idTipoActividad.");";

        	$result = mysqli_query($conexion, $consultaInsertar);
        	mysqli_close($conexion);
        	return $result;

        }

        public function mostrarTodasActividades(){

        	$con= new Data();
			$conexion=$con->conect();

			$consultaMostrar="SELECT * FROM tbactividad;";

			$result = mysqli_query($conexion, $consultaMostrar);
			mysqli_close($conexion);
        	$actividades = array();

        	while($row = mysqli_fetch_array($result)){
        		$temporalActividad=new Actividad($row['idactividad'],$row['nombreactividad'],$row['descripcionactividad'],$row['estadoactividad'],$row['cantidadpersonasactividad'],$row['lugaractividad'],$row['distanciahospedajeactividad'],$row['habilidadesactividad'],$row['horarioactividad'],$row['idsitioturistico'],$row['idtipoactividad'],$row['precioactividad'],0);

        		array_push($actividades,$temporalActividad);
        	}

        	return $actividades;
        }

        public function actualizarActividad($actividad){
			$con = new Data();
			$conexion = $con->conect();

			$nombre=$actividad->getNombreActividad();
			$descripcion=$actividad->getDescripcionActividad();
			$estado=$actividad->getEstadoActividad();
			$cantidadPersonas=$actividad->getCantidadPersonasActividad();
			$lugarActivdad=$actividad->getLugarActividad();
			$distanciaHospedaje=$actividad->getDistanciaHospedajeActividad();
			$horarioActividad=$actividad->getHorarioActividad();
			$idSitio=$actividad->getIdSitioActividad();
			$idTipoActividad=$actividad->getIdTipoActividadSitio();
			$habilidadesActividad=$actividad->getHabilidadesActividad();
			$id=$actividad->getIdActividad();
			$precio=$actividad->getPrecioActividad();

			$retorno;
			$idTemporal=0;

		 	$consultaActividad ="SELECT idactividad FROM tbrequisitos where idactividad=".$id."";
			$idActividad=mysqli_query($conexion,$consultaActividad);

			if ($row = mysqli_fetch_row($idActividad)) {
            	$idTemporal = trim($row[0]);
        	}

        	if($idTemporal==$id){
        		$retorno=1;
        	}else{

        		$consultaMostrar ="SELECT distinct idactividad FROM tbpaqueteturisticoactividad where idactividad=".$id."";
        		$idActividadAgregada=mysqli_query($conexion,$consultaMostrar);

        		if ($row = mysqli_fetch_row($idActividadAgregada)) {
            		$idTemporal = trim($row[0]);
        		}

        		if($idTemporal==$id){
        			$retorno=2;
        		}else{
        			$consultaActualizar = "UPDATE tbactividad SET  nombreactividad= '".$nombre."', descripcionactividad= '".$descripcion."', estadoactividad = ".$estado.", cantidadpersonasactividad = ".$cantidadPersonas.", lugaractividad = '".$lugarActivdad."', distanciahospedajeactividad='".$distanciaHospedaje."',habilidadesactividad='".$habilidadesActividad."',horarioactividad='".$horarioActividad."',precioactividad=".$precio.",idsitioturistico=".$idSitio.",idtipoactividad=".$idTipoActividad." WHERE idactividad= ".$id.";";
		
					$result= mysqli_query($conexion,$consultaActualizar);
					mysqli_close($conexion);
        		}
        	}

 			return $retorno;
		}


		public function eliminarActividad($idactividad){
			$con = new Data();
			$conexion = $con->conect();

			$retorno;
			$idTemporal=0;

		 	$consultaActividad ="SELECT idactividad FROM tbrequisitos where idactividad=".$idactividad."";
			$idActividad=mysqli_query($conexion,$consultaActividad);

			if ($row = mysqli_fetch_row($idActividad)) {
            	$idTemporal = trim($row[0]);
        	}

        	if($idTemporal==$idactividad){
        		$retorno=1;
        	}else{
        		$consultaMostrar="SELECT distinct idactividad FROM tbpaqueteturisticoactividad where idactividad=".$idactividad.";";
        		$idActividadAgregada=mysqli_query($conexion,$consultaMostrar);

        		if ($row = mysqli_fetch_row($idActividadAgregada)) {
            		$idTemporal = trim($row[0]);
        		}

        		if($idTemporal==$idactividad){
        			$retorno=2;
        		}else{

					$consultaEliminar="DELETE FROM tbactividad WHERE idactividad =".$idactividad.";";

					$result = mysqli_query($conexion, $consultaEliminar);
        			mysqli_close($conexion);
        		}
        	}
        	return $retorno;

		}

	}
?>