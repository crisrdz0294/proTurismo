<?php


include './paqueteTuristicoBusiness.php';

 

 if (isset($_POST['guardarPaquete'])) {
    
    if (isset($_POST['nombre']) && isset($_POST['descripcion']) &&isset($_POST['precio']) ) {
        
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];        
        $precio = $_POST['precio'];

        if (strlen($nombre) > 0 && strlen($descripcion) > 0 && strlen($precio) > 0 )
        {
            
            
        $paqueteTuristico = new PaqueteTuristico(0,$nombre,$descripcion ,$precio);
        
        
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
        isset($_POST['precio']) 
        ) {

        $id = $_POST['idpaquete'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];        
        $precio = $_POST['precio'];
        



        if (strlen($id) > 0 && strlen($nombre) > 0 && strlen($descripcion) > 0 && strlen($precio) > 0 )
        {
            
        $paqueteTuristico = new PaqueteTuristico($id,$nombre,$descripcion ,$precio);
        
        
        $paqueteTuristicoBusiness = new paqueteTuristicoBusiness();
        $result = $paqueteTuristicoBusiness->actualizarPaqueteTuristico($paqueteTuristico);


            if ($result == 1) {
                header("location: ../view/paqueteTuristicoView.php?success=update");
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
