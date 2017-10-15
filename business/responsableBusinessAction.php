<?php


include './responsableBusiness.php';



 if (isset($_POST['guardarResponsable']))
 {

    if (isset($_POST['cedulaResponsable']) && isset($_POST['nombreResponsable']) &&
        isset($_POST['primerApellidoResponsable']) && isset($_POST['segundoApellidoResponsable']) &&
        isset($_POST['telefonoResponsable']) && isset($_POST['emailResponsable'])
        )
    {




        $cedula = $_POST['cedulaResponsable'];
        $nombre = $_POST['nombreResponsable'];
        $primerApellido = $_POST['primerApellidoResponsable'];
        $segundoApellido = $_POST['segundoApellidoResponsable'];

        $telefonoTemp=substr( $_POST['telefonoResponsable'],6);
          $telefonoA = explode("-",$telefonoTemp);
          $telefono=$telefonoA[0].$telefonoA[1];
        $email = $_POST['emailResponsable'];



        if (strlen($cedula) > 0 && strlen($nombre) > 0 && strlen($primerApellido) > 0 && strlen($segundoApellido) > 0 &&
            strlen($telefono) > 0 && strlen($email) > 0)
        {

            $responsable = new Responsable(0,$cedula ,$nombre,$primerApellido,$segundoApellido,$telefono,
            $email);


            $responsableBusiness = new ResponsableBusiness();
            $result = $responsableBusiness->insertarResponsable($responsable);

            if ($result == 1)
            {
                header("location: ../view/responsableView.php?success=inserted");
            } else {
                header("location: ../view/responsableView.php?error=dbError");
            }

        } else {
            header("location: ../view/responsableView.php?error=emptyField");
        }
    } else {
        header("location: ../view/responsableView.php?error=error");
    }
}







if (isset($_POST['update']))
 {

    if (isset($_POST['idResponsable']) &&
        isset($_POST['cedulaResponsable']) &&
        isset($_POST['nombreResponsable']) &&
        isset($_POST['primerapellidoResponsable']) &&
        isset($_POST['segundoapellidoResponsable']) &&
        isset($_POST['telefonoResponsable']) &&
        isset($_POST['emailResponsable'])
        )
    {

        $id = $_POST['idResponsable'];
        $cedula = $_POST['cedulaResponsable'];
        $nombre = $_POST['nombreResponsable'];
        $primerApellido = $_POST['primerapellidoResponsable'];
        $segundoApellido = $_POST['segundoapellidoResponsable'];
        $telefono =  $_POST['telefonoResponsable'];
        $email = $_POST['emailResponsable'];



        if (strlen($id) > 0 && strlen($cedula) > 0 && strlen($nombre) > 0 && strlen($primerApellido) > 0 && strlen($segundoApellido) > 0 && strlen($telefono) > 0 && strlen($email) > 0)
        {

            $responsable = new Responsable($id,$cedula ,$nombre,$primerApellido,$segundoApellido,$telefono,
            $email);


            $responsableBusiness = new ResponsableBusiness();
            $result = $responsableBusiness->actualizarResponsable($responsable);

            if($result==0){
    					header("location: ../view/responsableView.php?success=update");
    				}else if($result==1){
    					header("location: ../view/responsableView.php?error=agregadoFamilia");
    				}else if($result==2){
    					header("location: ../view/responsableView.php?error=agregadoMicroEmpresa");
    				} else {
                header("location: ../view/responsableView.php?error=dbError");
            }

        } else {
            header("location: ../view/responsableView.php?error=emptyField");
        }
    } else {
        header("location: ../view/responsableView.php?error=error");
    }
}





else if (isset($_POST['delete']))
{

   if (isset($_POST['idResponsable'])) {

        $id = $_POST['idResponsable'];


        $responsableBusiness = new ResponsableBusiness();
        $result = $responsableBusiness->eliminarResponsable($id);


        if($result==0){
          header("location: ../view/responsableView.php?success=deleted");
        }else if($result==1){
          header("location: ../view/responsableView.php?error=agregadoFamilia");
        }else if($result==2){
          header("location: ../view/responsableView.php?error=agregadoMicroEmpresa");
        } else {
            header("location: ../view/responsableView.php?error=dbError");
        }
    } else {
        header("location: ../view/responsableView.php?error=error");
    }
}
