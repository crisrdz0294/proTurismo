<?php


include './servicioTransporteBusiness.php';

 if (isset($_POST['guardarServicioTransporte'])) {

    if (isset($_POST['precioServicioTransporte']) && isset($_POST['lugarSalida']) && isset($_POST['cantidadPersonas'])) {
            
            $precio = $_POST['precioServicioTransporte'];
            $lugar = $_POST['lugarSalida'];
            $cantidadP = $_POST['cantidadPersonas'];
        

            if (strlen($precio) > 0 && strlen($lugar) > 0 && strlen($cantidadP) > 0 ) {
            
                if (is_numeric($precio)) {

                    $servicioTransporte = new ServicioTransporte(0,$precio ,$lugar,$cantidadP );
                    $servicioTransporteBusiness = new ServicioTransporteBusiness();

                    $result = $servicioTransporteBusiness->insertarTransporteBusiness($servicioTransporte);

                    if ($result == 1) {
                         header("location: ../view/servicioTransporteView.php?success=inserted");
                    } else {
                        header("location: ../view/servicioTransporteView.php?error=dbError");
                    }
            } else {
                header("location: ../view/servicioTransporteView.php?error=numberFormat");
            }
        } else {
            header("location: ../view/servicioTransporteView.php?error=emptyField");
        }
    } else {
        header("location: ../view/servicioTransporteView.php?error=error");
    }
}else if (isset($_POST['update'])) {
   

    if (isset($_POST['precioServicioTransporte']) && isset($_POST['lugarSalida']) && isset($_POST['idServicioTransporte']) && isset($_POST['cantidadPersonas'])) {
            
        $idST = $_POST['idServicioTransporte'];
        $precioST = $_POST['precioServicioTransporte'];
        $ligarST = $_POST['lugarSalida'];
        $cantidadST = $_POST['cantidadPersonas'];
       
        if (strlen($idST) > 0 && strlen($precioST)>0 && strlen($ligarST)>0 && strlen($cantidadST)>0) {
            if (is_numeric($precioST)) {
                $servicioTransporte  = new ServicioTransporte ($idST,$precioST,$ligarST,$cantidadST);
                    $serviciotransporteBusiness = new ServicioTransporteBusiness();

                $result = $serviciotransporteBusiness->actualizarServicioTransporte($servicioTransporte);
                if ($result == 1) {
                         header("location: ../view/servicioTransporteView.php?success=inserted");
                    } else {
                        header("location: ../view/servicioTransporteView.php?error=dbError");
                    }
            } else {
                header("location: ../view/servicioTransporteView.php?error=numberFormat");
            }
        } else {
            header("location: ../view/servicioTransporteView.php?error=emptyField");
        }
    } else {
        header("location: ../view/servicioTransporteView.php?error=error");
    }
} else if (isset($_POST['delete'])) {

    if (isset($_POST['idServicioTransporte'])) {

        $idS = $_POST['idServicioTransporte'];
       

        $serviciotransporteBusiness = new ServicioTransporteBusiness();
        $result = $serviciotransporteBusiness->eliminarServicioTransporte($idS);

        if ($result == 1) {
            header("location: ../view/servicioTransporteView.php?success=deleted");
        } else {
            header("location: ../view/servicioTransporteView.php?error=dbError");
        }
    } else {
        header("location: ../view/servicioTransporteView.php?error=error");
    }
}
