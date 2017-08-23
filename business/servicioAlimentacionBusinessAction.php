<?php


include './servicioAlimentacionBusiness.php';

 if (isset($_POST['guardarServicioAlimentacion'])) {

    if (isset($_POST['tipoAlimentacionServicioAlimentacion']) && isset($_POST['tiempoComidasServicioAlimentacion']) && isset($_POST['descripcionAlimentacionServicioAlimentacion'])) {
            
            $tipoAlimentacion = $_POST['tipoAlimentacionServicioAlimentacion'];
            $tiempoComidas = $_POST['tiempoComidasServicioAlimentacion'];
            $descripcionAlimentacion = $_POST['descripcionAlimentacionServicioAlimentacion'];
        

            if (strlen($tipoAlimentacion) > 0 && strlen($tiempoComidas) > 0 && strlen($descripcionAlimentacion) > 0 ) {
            
            

                    $servicioAlimentacionn = new ServicioAlimentacion(0,$tipoAlimentacion,$tiempoComidas,$descripcionAlimentacion);
                    $servicioAlimentacionBusiness = new ServicioAlimentacionBusiness();

                    $result = $servicioAlimentacionBusiness->insertarServicioAlimentacionData($servicioAlimentacionn);

                    if ($result == 1) {
                         header("location: ../view/servicioAlimentacionView.php?success=inserted");
                    } else {
                        header("location: ../view/servicioAlimentacionView.php?error=dbError");
                    }
           
        } else {
            header("location: ../view/servicioAlimentacionView.php?error=emptyField");
        }
    } else {
        header("location: ../view/servicioAlimentacionView.php?error=error");
    }
}else if (isset($_POST['update'])) {
   

    if (isset($_POST['tipoAlimentacionServicioAlimentacion']) && isset($_POST['tiempoComidasServicioAlimentacion']) && isset($_POST['idServicioAlimentacion']) && isset($_POST['descripcionAlimentacionServicioAlimentacion'])) {
            
        $id = $_POST['idServicioAlimentacion'];
        $tipoAlimentacion = $_POST['tipoAlimentacionServicioAlimentacion'];
        $tiempoComidas = $_POST['tiempoComidasServicioAlimentacion'];
        $descripcionAlimentacion = $_POST['descripcionAlimentacionServicioAlimentacion'];


       
        if (strlen($id) > 0 && strlen($tipoAlimentacion)>0 && strlen($tiempoComidas)>0 && strlen($descripcionAlimentacion)>0) {
            if (!is_numeric($tipoAlimentacion)) {


                $servicioAlimentacion = new ServicioAlimentacion($id,$tipoAlimentacion,$tiempoComidas,$descripcionAlimentacion);
                    $servicioAlimentacionBusiness = new ServicioAlimentacionBusiness();

                $result = $servicioAlimentacionBusiness->actualizarServicioAlimentacion($servicioAlimentacion);
                if ($result == 1) {
                         header("location: ../view/servicioAlimentacionView.php?success=inserted");
                    } else {
                        header("location: ../view/servicioAlimentacionView.php?error=dbError");
                    }
            } else {
                header("location: ../view/servicioAlimentacionView.php?error=numberFormat");
            }
        } else {
            header("location: ../view/servicioAlimentacionView.php?error=emptyField");
        }
    } else {
        header("location: ../view/servicioAlimentacionView.php?error=error");
    }
} else if (isset($_POST['delete'])) {

    if (isset($_POST['idServicioAlimentacion'])) {

        $id = $_POST['idServicioAlimentacion'];
       

         $servicioAlimentacionBusiness = new ServicioAlimentacionBusiness();
        $result = $servicioAlimentacionBusiness->eliminarServicioAlimentacion($id);
        if ($result == 1) {
            header("location: ../view/servicioAlimentacionView.php?success=deleted");
        } else {
            header("location: ../view/servicioAlimentacionView.php?error=dbError");
        }
    } else {
        header("location: ../view/servicioAlimentacionView.php?error=error");
    }
}
