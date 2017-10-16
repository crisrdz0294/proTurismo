<?php


include './paqueteTuristicoBusiness.php';

 

 if (isset($_POST['guardarPaquete'])) {
    
    if (isset($_POST['nombre']) && isset($_POST['descripcion']) &&isset($_POST['cantidadpersonas']) &&isset($_POST['itinerario'])) {
        
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];        
        $cantidadPersonas = $_POST['cantidadpersonas'];
        $itinerario = $_POST['itinerario'];

        if (strlen($nombre) > 0 && strlen($descripcion) > 0 && strlen($cantidadPersonas) > 0 && strlen($itinerario) > 0 )
        {
            
            
        $paqueteTuristico = new PaqueteTuristico(0,$nombre,$descripcion,$cantidadPersonas,$itinerario,0);
                                           
        
        $paqueteTuristicoBusiness = new paqueteTuristicoBusiness();
        $result = $paqueteTuristicoBusiness->insertarPaqueteTuristico($paqueteTuristico);

            if ($result == 1) 
            {
                header("location: ../view/paqueteTuristicoView.php?success=inserted");
            } else {
                header("location: ../view/paqueteTuristicoView.php?error=dbError");
            }

        } else {
            header("location: ../view/paqueteTuristicoView.php?error=emptyField");
        }
    } else {
        header("location: ../view/paqueteTuristicoView.php?error=error");
    }
}
else if (isset($_POST['update'])) {   
    
    if (isset($_POST['idpaquete']) && 
        isset($_POST['nombre']) && 
        isset($_POST['descripcion']) &&
        isset($_POST['cantidadpersonas']) &&
        isset($_POST['itinerario']) 
        ) {

        $id = $_POST['idpaquete'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $cantidadPersonas = $_POST['cantidadpersonas'];
        $itinerario = $_POST['itinerario'];        
     
        if (strlen($id) > 0 && strlen($nombre) > 0 && strlen($descripcion) > 0 && strlen($cantidadPersonas) > 0 && strlen($itinerario) > 0 )
        {
            
        $paqueteTuristico = new PaqueteTuristico($id,$nombre,$descripcion ,$cantidadPersonas,$itinerario,0);
        
        
        $paqueteTuristicoBusiness = new paqueteTuristicoBusiness();
        $result = $paqueteTuristicoBusiness->actualizarPaqueteTuristico($paqueteTuristico);


            if ($result == 0) {
                header("location: ../view/paqueteTuristicoView.php?success=update");
            } else {
               header("location: ../view/paqueteTuristicoView.php?error=actividadesAgregadas");
             }
        } else {
            header("location: ../view/paqueteTuristicoView.php?error=emptyField");
        }
    } else {
        header("location: ../view/paqueteTuristicoView.php?error=error");
    }
} 
