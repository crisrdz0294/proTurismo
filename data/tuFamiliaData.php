<?php
include_once 'data.php';
include '../domain/tuFamilia.php';

class TuFamiliaData{

  public function tuFamiliaData(){}

  public function insertarFamilia($tuFamilia){

    $con = new Data();
    $conexion = $con->conect();


    $mayores=$tuFamilia->getAdultoMayorFamilia();
    $adultos=$tuFamilia->getAdultoFamilia();
    $adolecente=$tuFamilia->getAdolecenteFamilia();
    $ninos=$tuFamilia->getNinoFamilia();


    $consultaUltimoId ="SELECT MAX(idfamilia) AS idfamilia FROM tbfamilia";
    $maximoId=mysqli_query($conexion,$consultaUltimoId);
    $idSiguiente=1;

    if ($row = mysqli_fetch_row($maximoId)) {
            $idSiguiente = trim($row[0]) + 1;
        }

        $consultaInsertar="INSERT INTO tbfamilia VALUES (".$idSiguiente.",".$mayores.",".$adultos.",".$adolecente.",".$ninos.");";

          $result = mysqli_query($conexion, $consultaInsertar);
        mysqli_close($conexion);
        return $result;
  }


  public function mostrarTodosFamilias(){

    $con = new Data();
    $conexion = $con->conect();
    $consultaMostrar = "SELECT * FROM tbfamilia;";
    $result = mysqli_query($conexion, $consultaMostrar);
    mysqli_close($conexion);

        $todasFamilias = [];
        while ($row = mysqli_fetch_array($result)) {
            $tempFamilia = new TuFamilia($row['idfamilia'], $row['adultosmayoresfamilia'], $row['adultosfamilia'], $row['adolescentesfamilia'], $row['ninosfamilia']);
            array_push($todasFamilias, $tempFamilia);
        }
        return $todasFamilias;
  }



  public function actualizarFamilia($tuFamilia){
    $con = new Data();
    $conexion = $con->conect();


    $mayores=$tuFamilia->getAdultoMayorFamilia();
    $adultos=$tuFamilia->getAdultoFamilia();
    $adolecente=$tuFamilia->getAdolecenteFamilia();
    $ninos=$tuFamilia->getNinoFamilia();
    $id=$tuFamilia->getIdFamilia();

    $consultaUpdate="UPDATE tbfamilia SET adultosmayoresfamilia=".$mayores." , adultosfamilia=".$adultos.",adolescentesfamilia=".$adolecente.",ninosfamilia=".$ninos." WHERE idfamilia=".$id.";";

    $result = mysqli_query($conexion, $consultaUpdate);
    mysqli_close($conexion);

        return $result;
  }



  public function eliminarFamilia($idFamilia){
    $con = new Data();
    $conexion = $con->conect();

    $consultaEliminar="DELETE FROM tbfamilia WHERE idfamilia=".$idFamilia.";";

    $result=mysqli_query($conexion,$consultaEliminar);
    mysqli_close($conexion);

        return $result;
  }

}


 ?>
