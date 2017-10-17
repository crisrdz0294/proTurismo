<?php


include './servicioAlimentacionBusiness.php';

 

 if (isset($_POST['guardarServicioAlimentacion'])) 
 {
    if ( isset($_POST['AdicionalesServicioAlimentacion']) && isset($_POST['alimentacionLlevarServicioAlimentacion'])) 
    {

        $tiempoComidas = $_POST['tiempoComidasServicioAlimentacionD']."  ,  ".$_POST['tiempoComidasServicioAlimentacionA']."  ,  ".$_POST['tiempoComidasServicioAlimentacionC'];

        $descripcionAlimentacion = $_POST['descripcionAlimentacionServicioAlimentacionD']."  ,  ".$_POST['descripcionAlimentacionServicioAlimentacionA']."  ,  ".$_POST['descripcionAlimentacionServicioAlimentacionC'];

        $montoTempD =str_replace(".","",$_POST['precioServicioAlimentacionD']);
        $precioFinalD=str_replace("₡","",$montoTempD);

        $montoTempA =str_replace(".","",$_POST['precioServicioAlimentacionA']);
        $precioFinalA=str_replace("₡","",$montoTempA);

        $montoTempC =str_replace(".","",$_POST['precioServicioAlimentacionC']);
        $precioFinalC=str_replace("₡","",$montoTempC);
        
        
        $precio= $precioFinalD.",".$precioFinalA.",".$precioFinalC;


        $Adicionales  = $_POST['AdicionalesServicioAlimentacion'];
        $alimentacionLlevar  = $_POST['alimentacionLlevarServicioAlimentacion'];

        $idSitio=$_POST['sitioturistico'];



        if (strlen($tiempoComidas) > 0 && strlen($descripcionAlimentacion) > 0 && strlen($precio) > 0 && strlen($Adicionales) > 0 && strlen($alimentacionLlevar) > 0)
        {
            
        $servicioAlimentacion = new ServicioAlimentacion(0,$tiempoComidas,$descripcionAlimentacion ,$precio,$Adicionales,$alimentacionLlevar,$idSitio,0);
        
        
        $servicioAlimentacionBusiness = new ServicioAlimentacionBusiness();
        $result = $servicioAlimentacionBusiness->insertarServicioAlimentacion($servicioAlimentacion);

            if ($result == 1) 
            {
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
}






else if (isset($_POST['update'])) 
{   
    
    if (isset($_POST['idServicioAlimentacion']) && 
        isset($_POST['tiempoComidasServicioAlimentacion']) && 
        isset($_POST['descripcionAlimentacionServicioAlimentacion']) &&
        isset($_POST['precioServicioAlimentacion']) && 
        isset($_POST['AdicionalesServicioAlimentacion']) && 
        isset($_POST['alimentacionLlevarServicioAlimentacion']) && 
        isset($_POST['idsitio'])
        ) 
    {
        $id = $_POST['idServicioAlimentacion'];
        $tiempoComidas = $_POST['tiempoComidasServicioAlimentacion'];
        $descripcionAlimentacion = $_POST['descripcionAlimentacionServicioAlimentacion'];        
        $precio = $_POST['precioServicioAlimentacion'];
        $Adicionales  = $_POST['AdicionalesServicioAlimentacion'];
        $alimentacionLlevar  = $_POST['alimentacionLlevarServicioAlimentacion'];
        $idSitio=$_POST['idsitio'];



        if (strlen($id) > 0 && strlen($tiempoComidas) > 0 && strlen($descripcionAlimentacion) > 0 && strlen($precio) > 0 && strlen($Adicionales) > 0 && strlen($alimentacionLlevar) > 0)
        {
            
        $servicioAlimentacion = new ServicioAlimentacion($id,$tiempoComidas,$descripcionAlimentacion ,$precio,$Adicionales,$alimentacionLlevar,$idSitio,0);
        
        
        $servicioAlimentacionBusiness = new ServicioAlimentacionBusiness();
        $result = $servicioAlimentacionBusiness->actualizarServicioAlimentacion($servicioAlimentacion);


            if ($result == 1) {
                header("location: ../view/servicioAlimentacionView.php?success=update");
            } else {
               header("location: ../view/servicioAlimentacionView.php?error=dbError");
             }
        } else {
            header("location: ../view/servicioAlimentacionView.php?error=emptyField");
        }
    } else {
        header("location: ../view/servicioAlimentacionView.php?error=error");
    }
} 





else if (isset($_POST['delete'])) 
{

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
