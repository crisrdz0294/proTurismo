<?php

include_once './familiaBusiness.php';

 if (isset($_POST['guardarfamilia'])) {

    if (isset($_POST['cantidadadultosmayores']) && isset($_POST['cantidadadultos']) && isset($_POST['cantidadadolecentes']) && isset($_POST['cantidadninos'])) {

            $mayores = $_POST['cantidadadultosmayores'];
            $adultos = $_POST['cantidadadultos'];
            $adolecentes = $_POST['cantidadadolecentes'];
            $ninos=$_POST['cantidadninos'];
            $idrespon=$_POST['idresponsable'];
            $idSitio=$_POST['sitioturistico'];

            if (strlen($mayores) >= 0 && strlen($adultos) >= 0 && strlen($adolecentes) >= 0 && strlen($ninos) >= 0 ) {

                if (is_numeric($mayores)) {

                    $familia = new Familia(0,$mayores,$adultos,$adolecentes,$ninos,$idrespon,$idSitio);
                    $familiaBis = new FamiliaBusiness();

                    $result = $familiaBis->insertarFamilias($familia);

                    if ($result == 1) {
                         header("location: ../view/familiaView.php?success=inserted");
                    } else {
                        header("location: ../view/familiaView.php?error=dbError");
                    }
            } else {
                header("location: ../view/familiaView.php?error=numberFormat");
            }
        } else {
            header("location: ../view/familiaView.php?error=emptyField");
        }
    } else {
        header("location: ../view/familiaView.php?error=error");
    }
}else if (isset($_POST['update'])) {



  if (isset($_POST['idfamilia']) 
    && isset($_POST['cantidadadultosmayores']) 
    && isset($_POST['adultosfamilia']) 
    && isset($_POST['cantidadadolecentes']) 
    && isset($_POST['cantidadninos']) 
    && isset($_POST['idresponsable']) 
    &&isset($_POST['idsitio']) ) {
  


  $id=$_POST['idfamilia'];
  $mayores = $_POST['cantidadadultosmayores'];
  $adultos = $_POST['adultosfamilia'];
  $adolecentes = $_POST['cantidadadolecentes'];
  $ninos=$_POST['cantidadninos'];
  $idrespon=$_POST['idresponsable'];
  $idSitio=$_POST['idsitio'];

        if ( strlen($mayores)>=0 && strlen($adultos)>=0 && strlen($adolecentes)>=0 && strlen($ninos)>=0 ) {
            if (is_numeric($mayores)) {
             
              $familia = new Familia($id,$mayores,$adultos,$adolecentes,$ninos,$idrespon,$idSitio);
              $familiaBis = new FamiliaBusiness();

              $result = $familiaBis->actualizarFamilias($familia);

                    if ($result == 1) {

                          header("location: ../view/familiaView.php?success=update");
                    } else {
                          header("location: ../view/familiaView.php?error=dbError");
                     }
            } else {
                  header("location: ../view/familiaView.php?error=numberFormat");
            }
        } else {
              header("location: ../view/familiaView.php?error=emptyField");
         }
         } else {
                      header("location: ../view/familiaView.php?error=error");
        }


} else if (isset($_POST['delete'])) {

    if (isset($_POST['idfamilia'])) {

        $id = $_POST['idfamilia'];

        $familiaBis = new FamiliaBusiness();

        $result = $familiaBis->eliminarFamilias($id);
        if ($result == 1) {
            header("location: ../view/familiaView.php?success=deleted");
        } else {
            header("location: ../view/familiaView.php?error=dbError");
        }
    } else {
        header("location: ../view/familiaView.php?error=error");
    }
}

?>