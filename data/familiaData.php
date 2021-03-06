<?php
include_once 'data.php';
include '../domain/familia.php';
include '../domain/responsable.php';
include '../domain/sitioTuristico.php';
include '../domain/empresa.php';

class FamiliaData{

  public function FamiliaData(){}

  public function insertarFamilia($familia){

    $con = new Data();
    $conexion = $con->conect();


    $mayores=$familia->getAdultoMayorFamilia();
    $adultos=$familia->getAdultoFamilia();
    $adolecente=$familia->getAdolecenteFamilia();
    $ninos=$familia->getNinoFamilia();
    $idresponsable=$familia->getIdResponsable();
    $idSitio=$familia->getSitioTuristico();


    $consultaUltimoId ="SELECT MAX(idfamilia) AS idfamilia FROM tbfamilia";
    $maximoId=mysqli_query($conexion,$consultaUltimoId);
    $idSiguiente=1;

    if ($row = mysqli_fetch_row($maximoId)) {
            $idSiguiente = trim($row[0]) + 1;
        }

        $consultaInsertar="INSERT INTO tbfamilia VALUES (".$idSiguiente.",".$mayores.",".$adultos.",".$adolecente.",".$ninos.",".$idresponsable.",".$idSitio.");";

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
            $tempFamilia = new Familia($row['idfamilia'], $row['adultosmayoresfamilia'], $row['adultosfamilia'], $row['adolescentesfamilia'], $row['ninosfamilia'],$row['idresponsable'],$row['idsitioturistico']);
            array_push($todasFamilias, $tempFamilia);
        }
        return $todasFamilias;
  }





   public function mostrarTodosResponsable(){

            $con = new Data();
            $conexion = $con->conect();
            $consultaMostrar = "SELECT * FROM tbresponsable;";
            $result = mysqli_query($conexion, $consultaMostrar);
            mysqli_close($conexion);

            $responsable = [];
            while ($row = mysqli_fetch_array($result)) {
                $temporaralResponsable = new Responsable(

                    $row['idresponsable'],
                    $row['cedularesponsable'],
                    $row['nombreresponsable'],
                    $row['primerapellidoresponsable'],
                    $row['segundoapellidoresponsable'],
                    $row['telefonoresponsable'],
                    $row['emailresponsable']
                );

                array_push($responsable, $temporaralResponsable);
            }
            return $responsable;
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


  public function actualizarFamilia($familia){
    $con = new Data();
    $conexion = $con->conect();


    $mayores=$familia->getAdultoMayorFamilia();
    $adultos=$familia->getAdultoFamilia();
    $adolecente=$familia->getAdolecenteFamilia();
    $ninos=$familia->getNinoFamilia();
    $id=$familia->getIdFamilia();
    $idresponsable=$familia->getIdResponsable();
    $idSitio=$familia->getSitioTuristico();


    $consultaUpdate="UPDATE tbfamilia SET adultosmayoresfamilia=".$mayores." , adultosfamilia=".$adultos.",adolescentesfamilia=".$adolecente.",ninosfamilia=".$ninos.",idresponsable=".$idresponsable.",idsitioturistico=".$idSitio." WHERE idfamilia=".$id.";";

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

  public function mostrarEmpresas(){

    $con = new Data();
    $conexion = $con->conect();
    $consultaMostrar = "SELECT * FROM tbmicroempresa ;";
    $result = mysqli_query($conexion, $consultaMostrar);
    mysqli_close($conexion);
        $empresas = [];
        while ($row = mysqli_fetch_array($result)) {
            $empresaNueva = new Empresa($row['idmicroempresa'],$row['nombremicroempresa'],$row['contactotelefonomicroempresa'],$row['emailmicroempresa'],$row['sitiowebmicroempresa'],$row['idsitioturistico'],$row['idresponsable'],$row['cedulajuridicamicroempresa']);
            array_push($empresas, $empresaNueva);
        }
        return $empresas;
  }

}


 ?>
