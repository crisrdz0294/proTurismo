<?php

include '../domain/PaqueteTuristico.php'

class PaqueteTuristicoData(){

public function PaqueteTuristicoData(){

}

public function insertarPaqueteActividad($PaqueteTuristico){
  $con = new Data();
  $conexion = $con->conect();

  $nombre=$PaqueteTuristico->getNombrePaqueteTuristico();
  $descripcion=$PaqueteTuristico->getDescripcionPaqueteTuristico();
  $precio=$PaqueteTuristico->getPrecioPaqueteTuristico();

  $consultaUltimoId ="SELECT MAX(idpaqueteturistico) AS idpaqueteturistico FROM tbpaqueteturistico";
  $maximoId=mysqli_query($conexion,$consultaUltimoId);
  $idSiguiente=1;

  if ($row = mysqli_fetch_row($maximoId)) {
          $idSiguiente = trim($row[0]) + 1;
      }

      $consultaInsertar="INSERT INTO tbpaqueteturistico VALUES(".$idSiguiente.",
      '".$nombre."',
      '".$descripcion."',
      ".$precio.");";

      $result = mysqli_query($conexion, $consultaInsertar);
      mysqli_close($conexion);
      return $result;

}

public function mostrarTodosPaqueteTuristicos(){

  $con= new Data();
$conexion=$con->conect();

$consultaMostrar="SELECT * FROM tbpaqueteturistico;";

$result = mysqli_query($conexion, $consultaMostrar);
mysqli_close($conexion);
  $actividades = [];

  while($row = mysqli_fetch_array($result)){
    $temporalPaquete=new PaqueteTuristico($row['idpaqueteturistico'],$row['nombrepaqueteturistico'],$row['descripcionpaqueteturistico'],$row['preciopaqueteturistico']);

    array_push($actividades,$temporalPaquete);
  }

  return $actividades;
}

public function actualizarPaqueteTuristico($PaqueteTuristico){
$con = new Data();
$conexion = $con->conect();

$nombre=$PaqueteTuristico->getNombreActividad();
$descripcion=$PaqueteTuristico->getDescripcionActividad();
$id=$PaqueteTuristico->getPrecioPaqueteTuristico();
$precio=$PaqueteTuristico->idPaqueteTuristico();

$consultaActualizar = "UPDATE tbpaqueteturistico SET  nombrepaqueteturistico= '".$nombre."',
 descripcionpaqueteturistico= '".$descripcion."',
  preciopaqueteturistico = ".$precio.",
   WHERE idpaqueteturistico= ".$id.";";

$result= mysqli_query($conexion,$consultaActualizar);
mysqli_close($conexion);

  return $result;
}










}




?>
