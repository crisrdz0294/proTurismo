<?php


include './paqueteTuristicoBusiness.php';

 

 if (isset($_POST['guardarPaqueteTuristico'])) 
 {
    
    if (isset($_POST['nombrePaqueteTuristico']) && 
        isset($_POST['descripcionPaqueteTuristico']) &&
        isset($_POST['precioPaqueteTuristico']) && 
        ) 
    {
        $id = $_POST['idPaqueteTuristico'];
        $nombre = $_POST['nombrePaqueteTuristico'];
        $descripcion = $_POST['descripcionPaqueteTuristico'];        
        $precio = $_POST['precioPaqueteTuristico'];
        



        if (strlen($nombre) > 0 && strlen($descripcion) > 0 && strlen($precio) > 0 
        {
            
            
        $paqueteTuristico = new PaqueteTuristico($nombre,$descripcion ,$precio);
        
        
        $paqueteTuristicoBusiness = new PaqueteTuristicoBusiness();
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






else if (isset($_POST['update'])) 
{   
    
    if (isset($_POST['idPaqueteTuristico']) && 
        isset($_POST['nombrePaqueteTuristico']) && 
        isset($_POST['descripcionPaqueteTuristico']) &&
        isset($_POST['precioPaqueteTuristico']) && 
        ) 
    {
        $id = $_POST['idPaqueteTuristico'];
        $nombre = $_POST['nombrePaqueteTuristico'];
        $descripcion = $_POST['descripcionPaqueteTuristico'];        
        $precio = $_POST['precioPaqueteTuristico'];
        



        if (strlen($id) > 0 && strlen($nombre) > 0 && strlen($descripcion) > 0 && strlen($precio) > 0 
        {
            
        $paqueteTuristico = new PaqueteTuristico($id,$nombre,$descripcion ,$precio);
        
        
        $paqueteTuristicoBusiness = new PaqueteTuristicoBusiness();
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
