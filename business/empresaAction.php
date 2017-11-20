<?php


include './empresaBusiness.php';

 if (isset($_POST['guardarEmpresa'])) {


    if (isset($_POST['nombreEmpresa']) && isset($_POST['cedulaJuridicaEmpresa']) && isset($_POST['telefonoEmpresa']) && isset($_POST['emailEmpresa'])
    && isset($_POST['paginaEmpresa'])) {

            $nombre = $_POST['nombreEmpresa'];
            $idRespon= $_POST['idEncargado'];
            $telefonoTemp=substr( $_POST['telefonoEmpresa'],6);
            $telefonoA = explode("-",$telefonoTemp);
            $contacto=$telefonoA[0].$telefonoA[1];

           $email=$_POST['emailEmpresa'];
           $web=$_POST['paginaEmpresa'];
           $sitio=$_POST['idSitioTuristico'];
           $cedulaTemp=$_POST['cedulaJuridicaEmpresa'];
            $cedulaA=explode("-",$cedulaTemp);
            $cedula=$cedulaA[0].$cedulaA[1].$cedulaA[2];

            if (strlen($nombre) > 0 && strlen($contacto) > 0&& strlen($email) > 0&& strlen($web) > 0&& strlen($sitio) > 0 &&strlen($cedula) > 0) {

                if (!is_numeric($nombre)) {

                $empre= new Empresa(0,$nombre,$contacto,$email,$web,$sitio,$idRespon,$cedula);
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


  if (isset($_POST['idEmpresa'])&&isset($_POST['nombreEmpresa']) && isset($_POST['cedulaJuridicaEmpresa']) && isset($_POST['telefonoEmpresa']) && isset($_POST['emailEmpresa'])
  && isset($_POST['paginaEmpresa'])&& isset($_POST['idSitioTuristico'])&& isset($_POST['idEncargado'])) {
    $id=$_POST['idEmpresa'];
    $nombre = $_POST['nombreEmpresa'];
    $idRespon= $_POST['idEncargado'];

    $telefonoTemp=substr( $_POST['telefonoEmpresa'],6);
    $telefonoA = explode("-",$telefonoTemp);
    $contacto=$telefonoA[0].$telefonoA[1];



   $email=$_POST['emailEmpresa'];
   $web=$_POST['paginaEmpresa'];
   $sitio=$_POST['idSitioTuristico'];

     $cedulaTemp=$_POST['cedulaJuridicaEmpresa'];
      $cedulaA=explode("-",$cedulaTemp);
      $cedula=$cedulaA[0].$cedulaA[1].$cedulaA[2];


                if (strlen($nombre) > 0 && strlen($idRespon) > 0 && strlen($contacto) > 0&& strlen($email) > 0&& strlen($web) > 0&& strlen($sitio) > 0  && strlen($cedula) > 0)  {

                if (!is_numeric($nombre)) {

                  $empre= new Empresa($id,$nombre,$contacto,$email,$web,$sitio,$idRespon,$cedula);
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
            header("location: ../view/empresaView.php?success=delete");
        } else {
            header("location: ../view/empresaView.php?error=dbError");
        }
    } else {
        header("location: ../view/empresaView.php?error=error");
    }
}
