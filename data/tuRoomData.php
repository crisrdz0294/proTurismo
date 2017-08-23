<?php
 
include_once  'data.php';
include '../domain/tuRoom.php';


class TuRoomData {
    
    function TuRoomData(){}
    
    public function insertTuRoom($tuRoom){
        $con= new Data();
        $conexion=$con->conect();
        
        $consultaUltimoId ="SELECT MAX(idhabitacion) AS idhabitacion FROM tbhabitacion";
	       $maximoId=mysqli_query($conexion,$consultaUltimoId);
    	   $idSiguiente=1;

	       if ($row = mysqli_fetch_row($maximoId)) {
            	$idSiguiente = trim($row[0]) + 1;
        }
                
           $internet=$tuRoom->getInternetHabitacion();
           $cable=$tuRoom->getCableHabitacion();
           $servicio=$tuRoom->getServicioHabitacion();
           $cama=$tuRoom->getCamaHabitacion();
           $aire=$tuRoom->getAireAcondicionadoHabitacion();
                                                
           $consultaInsertar="INSERT INTO tbhabitacion VALUES (".$idSiguiente.",'".$cama."','".$internet."','".$cable."',".$aire.",".$servicio.");";

              	$result = mysqli_query($conexion, $consultaInsertar);
        	mysqli_close($conexion);
        	return $result;

    }
    
    public function mostrarHabitaciones(){

			$con = new Data();
			$conexion = $con->conect();
			$consultaMostrar = "SELECT * FROM tbhabitacion;";
			$result = mysqli_query($conexion, $consultaMostrar);
			mysqli_close($conexion);
        	$tuRoom = [];
        	while ($row = mysqli_fetch_array($result)) {

            	$temporalHabitacion = new TuRoom($row['camahabitacion'], $row['internethabitacion'],$row['aireacondicionadohabitacion'], $row['cablehabitacion'],$row['serviciohabitacion'],$row['idhabitacion']);
            	array_push($tuRoom, $temporalHabitacion);
        	}
        	return $tuRoom;

		}
                

		public function actualizarHabitacion($tuRoom){

			$con = new Data();
			$conexion = $con->conect();

			 $consultaActualizar = "UPDATE tbhabitacion SET camahabitacion= '" . $tuRoom->getCamaHabitacion(). "', internethabitacion='" . $tuRoom->getInternetHabitacion() . "',cablehabitacion='" . $tuRoom->getCableHabitacion() . "',aireacondicionadohabitacion=" . $tuRoom->getAireAcondicionadoHabitacion() . ",serviciohabitacion=" . $tuRoom->getServicioHabitacion() ." WHERE idhabitacion=" . $tuRoom->getIdHabitacion(). ";";

              	$result = mysqli_query($conexion, $consultaActualizar);
        	mysqli_close($conexion);

        	return $result;
		}

		public function eliminarHabitacion($idTuRoom){
			$con = new Data();
			$conexion = $con->conect();

			 $consultaEliminar = "DELETE from tbhabitacion where idhabitacion=" . $idTuRoom . ";";
       		 $result = mysqli_query($conexion, $consultaEliminar);
        	mysqli_close($conexion);

        	return $result;
		}

}
