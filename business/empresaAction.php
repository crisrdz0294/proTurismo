<?php


include './empresaBusiness.php';

 if (isset($_POST['guardarEmpresa'])) {

    if (isset($_POST['nombreEmpresa']) && isset($_POST['telefonoEmpresa']) && isset($_POST['emailEmpresa'])
    && isset($_POST['paginaEmpresa'])) {

            $nombre = $_POST['nombreEmpresa'];
            $idRespon= $_POST['idEncargado'];
            $contacto=$_POST['telefonoEmpresa'];
           $email=$_POST['emailEmpresa'];
           $web=$_POST['paginaEmpresa'];
           $sitio=$_POST['idSitioTuristico'];


            if (strlen($nombre) > 0 && strlen($contacto) > 0&& strlen($email) > 0&& strlen($web) > 0&& strlen($sitio) > 0 ) {

                if (!is_numeric($nombre)) {

                $empre= new Empresa(0,$nombre,$contacto,$email,$web,$sitio,$idRespon);
                    $empresaBusiness= new EmpresaBusiness();

                    $result = $empresaBusiness->insertarEmpresas($empre);

                    if ($result == 1) {
                         header("location: ../view/empresaView.php?success=inserted");
                    } else {
                        header("location: ../view/empresaView.php?error=dbError");
                    }
            } else {
                header("location: ../view/empresaView.php?error=numberFormat");
            }
        } else {
            header("location: ../view/empresaView.php?error=emptyField");
        }
    } else {
        header("location: ../view/empresaView.php?error=error");
    }

}else if (isset($_POST['update'])) {


  if (isset($_POST['idEmpresa'])&&isset($_POST['nombreEmpresa']) && isset($_POST['telefonoEmpresa']) && isset($_POST['emailEmpresa'])
  && isset($_POST['paginaEmpresa'])&& isset($_POST['idSitioTuristico'])&& isset($_POST['idEncargado'])) {
    $id=$_POST['idEmpresa'];
    $nombre = $_POST['nombreEmpresa'];
    $idRespon= $_POST['idEncargado'];
    $contacto=$_POST['telefonoEmpresa'];
   $email=$_POST['emailEmpresa'];
   $web=$_POST['paginaEmpresa'];
   $sitio=$_POST['idSitioTuristico'];

                if (strlen($nombre) > 0 && strlen($idRespon) > 0 && strlen($contacto) > 0&& strlen($email) > 0&& strlen($web) > 0&& strlen($sitio) > 0 ) {

                if (!is_numeric($nombre)) {

                  $empre= new Empresa($id,$nombre,$contacto,$email,$web,$sitio,$idRespon);
                      $empresaBusiness= new EmpresaBusiness();



                    $result = $empresaBusiness->actualizarEmpresa($empre);
                if ($result == 1) {
                         header("location: ../view/empresaView.php?success=update");
                    } else {
                        header("location: ../view/empresaView.php?error=dbError");
                    }
            } else {
                header("location: ../view/empresaView.php?error=numberFormat");
            }
        } else {
            header("location: ../view/empresaView.php?error=emptyField");
        }
    } else {
        header("location: ../view/empresaView.php?error=error");
    }
} else if (isset($_POST['delete'])) {

    if (isset($_POST['idEmpresa'])) {

        $id = $_POST['idEmpresa'];


         $empresaBusiness= new EmpresaBusiness();

        $result = $empresaBusiness->eliminarEmpresas($id);
        if ($result == 1) {
            header("location: ../view/empresaView.php?success=update");
        } else {
            header("location: ../view/empresaView.php?error=dbError");
        }
    } else {
        header("location: ../view/empresaView.php?error=error");
    }
}
