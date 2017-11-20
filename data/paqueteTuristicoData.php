<?php

include '../domain/paqueteTuristico.php';
include 'data.php';

class PaqueteTuristicoData{

public function PaqueteTuristicoData(){

}

public function insertarPaqueteTuristico($PaqueteTuristico){
  $con = new Data();
  $conexion = $con->conect();

  $nombre=$PaqueteTuristico->getNombrePaqueteTuristico();
  $descripcion=$PaqueteTuristico->getDescripcionPaqueteTuristico();
  $cantidadPersonas=$PaqueteTuristico->getCantidadPersonasPaqueteTuristico();
  $itinerario=$PaqueteTuristico->getItinerarioPaqueteTuristico();
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
      ".$cantidadPersonas.",
      '".$itinerario."',
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
    $temporalPaquete=new PaqueteTuristico($row['idpaqueteturistico'],$row['nombrepaqueteturistico'],$row['descripcionpaqueteturistico'],$row['cantidadpersonaspaqueteturistico'],$row['itinerariopaqueteturistico'],$row['preciopaqueteturistico']);
    array_push($actividades,$temporalPaquete);
  }

  return $actividades;
}

public function mostrarPaquetePorId($idpaquete){

    $con= new Data();
    $conexion=$con->conect();

    $consultaMostrar="SELECT * FROM tbpaqueteturistico where idpaqueteturistico=".$idpaquete." ;";

    $result = mysqli_query($conexion, $consultaMostrar);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $paquete = array("idpaquete"=>$row['idpaqueteturistico'],"nombrepaquete"=>$row['nombrepaqueteturistico'],"descripcionpaquete"=>$row['descripcionpaqueteturistico'],"cantidadpersonaspaquete"=>$row['cantidadpersonaspaqueteturistico'],"itinerariopaquete"=>$row['itinerariopaqueteturistico'],"preciopaquete"=>$row['preciopaqueteturistico']);
    mysqli_close($conexion);
    return $paquete;
}

public function actualizarPaqueteTuristico($idpaquete,$nombre,$descripcion,$cantidad,$itinerario){

    $con = new Data();
    $conexion = $con->conect();
    $retorno=0;
    $idTemporal=0;

    $consultaMostrar ="SELECT distinct idpaqueteturistico FROM tbpaqueteturisticoactividad where idpaqueteturistico=".$idpaquete."";
    $idPaquete=mysqli_query($conexion,$consultaMostrar);

    if ($row = mysqli_fetch_row($idPaquete)) {
        $idTemporal = trim($row[0]);
    }

    if($idTemporal==$idpaquete){
      $retorno=1;
    }else{
        

       $consultaMostrar ="SELECT distinct idpaqueteturistico FROM tbpaqueteturisticoservicio where idpaqueteturistico=".$idpaquete."";
        $idPaquete=mysqli_query($conexion,$consultaMostrar);

        if ($row = mysqli_fetch_row($idPaquete)) {
          $idTemporal = trim($row[0]);
        }

        if($idTemporal==$idpaquete){
          $retorno=2;
        }else{
          $consultaActualizar = "UPDATE tbpaqueteturistico SET  nombrepaqueteturistico= '".$nombre."',
        descripcionpaqueteturistico= '".$descripcion."',
        cantidadpersonaspaqueteturistico = ".$cantidad.",
        itinerariopaqueteturistico='".$itinerario."'
        WHERE idpaqueteturistico= ".$idpaquete.";";

        $result= mysqli_query($conexion,$consultaActualizar);
        mysqli_close($conexion);
      }
        
    }


  return $retorno;
}



public function obtenerNombrePaquete($idpaquete){
      $con =new Data();
      $conexion=$con->conect();
      $consultaNombre="SELECT nombrepaqueteturistico FROM tbpaqueteturistico where idpaqueteturistico=".$idpaquete."";

      $result = mysqli_query($conexion, $consultaNombre);
      mysqli_close($conexion);
      $nombrePaquete = array();
          while ($row = mysqli_fetch_array($result)) {

            $valores=array("nombrepaquete"=>$row["nombrepaqueteturistico"]);
              array_push($nombrePaquete, $valores);
          }
          return $nombrePaquete;
    }


public function obtenerPrecioPaquete($idpaquete){
      $con =new Data();
      $conexion=$con->conect();
      $consultaNombre="SELECT preciopaqueteturistico FROM tbpaqueteturistico where idpaqueteturistico=".$idpaquete."";

      $result = mysqli_query($conexion, $consultaNombre);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

      $precioPaquete = array("precio"=>$row['preciopaqueteturistico']);
      mysqli_close($conexion);
      return $precioPaquete;
    }

}


?>
