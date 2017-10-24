<?php


include './servicioAlimentacionBusiness.php';

 

 if (isset($_POST['guardarServicioAlimentacion'])) 
 {
    if ( isset($_POST['AdicionalesServicioAlimentacion']) && isset($_POST['alimentacionLlevarServicioAlimentacion'])) 
    {

      
      if(isset($_POST['tiempoComidasServicioAlimentacionD']) && is_null($_POST['tiempoComidasServicioAlimentacionA']) && is_null($_POST['tiempoComidasServicioAlimentacionC']))
      {
           $tiempoComidas = $_POST['tiempoComidasServicioAlimentacionD'];
      }

      if(is_null($_POST['tiempoComidasServicioAlimentacionD']) && isset($_POST['tiempoComidasServicioAlimentacionA']) && is_null($_POST['tiempoComidasServicioAlimentacionC']))
      {
           $tiempoComidas = $_POST['tiempoComidasServicioAlimentacionA'];
      }

      if(is_null($_POST['tiempoComidasServicioAlimentacionD']) && is_null($_POST['tiempoComidasServicioAlimentacionA']) && isset($_POST['tiempoComidasServicioAlimentacionC']))
      {
           $tiempoComidas = $_POST['tiempoComidasServicioAlimentacionC'];
      }
      
      if(isset($_POST['tiempoComidasServicioAlimentacionD']) && isset($_POST['tiempoComidasServicioAlimentacionA']) && is_null($_POST['tiempoComidasServicioAlimentacionC']))
      {
        $tiempoComidas = $_POST['tiempoComidasServicioAlimentacionD'].",".$_POST['tiempoComidasServicioAlimentacionA'];
      }

      if(isset($_POST['tiempoComidasServicioAlimentacionD']) && is_null($_POST['tiempoComidasServicioAlimentacionA']) && isset($_POST['tiempoComidasServicioAlimentacionC']))
      {
         $tiempoComidas = $_POST['tiempoComidasServicioAlimentacionD'].",".$_POST['tiempoComidasServicioAlimentacionC'];
      }
      
      if(is_null($_POST['tiempoComidasServicioAlimentacionD']) && isset($_POST['tiempoComidasServicioAlimentacionA']) && isset($_POST['tiempoComidasServicioAlimentacionC']))
      {
         $tiempoComidas = $_POST['tiempoComidasServicioAlimentacionA'].",".$_POST['tiempoComidasServicioAlimentacionC'];
      }
       if(isset($_POST['tiempoComidasServicioAlimentacionD']) && isset($_POST['tiempoComidasServicioAlimentacionA']) && isset($_POST['tiempoComidasServicioAlimentacionC']))
      {
          $tiempoComidas = $_POST['tiempoComidasServicioAlimentacionD'].",".$_POST['tiempoComidasServicioAlimentacionA'].",".$_POST['tiempoComidasServicioAlimentacionC'];
      }



        $descripcionAlimentacion = $_POST['descripcionAlimentacionServicioAlimentacionD']."".$_POST['descripcionAlimentacionServicioAlimentacionA']."".$_POST['descripcionAlimentacionServicioAlimentacionC'];




    if(isset($_POST['descripcionAlimentacionServicioAlimentacionD']) && is_null($_POST['descripcionAlimentacionServicioAlimentacionA']) && is_null($_POST['descripcionAlimentacionServicioAlimentacionC']))
      {
            $descripcionAlimentacion = $_POST['descripcionAlimentacionServicioAlimentacionD'];
      }

      if(is_null($_POST['descripcionAlimentacionServicioAlimentacionD']) && isset($_POST['descripcionAlimentacionServicioAlimentacionA']) && is_null($_POST['descripcionAlimentacionServicioAlimentacionC']))
      {
           $_POST['descripcionAlimentacionServicioAlimentacionA'];
      }

      if(is_null($_POST['descripcionAlimentacionServicioAlimentacionD']) && is_null($_POST['descripcionAlimentacionServicioAlimentacionA']) && isset($_POST['descripcionAlimentacionServicioAlimentacionC']))
      {
           $_POST['descripcionAlimentacionServicioAlimentacionC'];
      }
      
      if(isset($_POST['descripcionAlimentacionServicioAlimentacionD']) && isset($_POST['descripcionAlimentacionServicioAlimentacionA']) && is_null($_POST['descripcionAlimentacionServicioAlimentacionC']))
      {
        $descripcionAlimentacion = $_POST['descripcionAlimentacionServicioAlimentacionD'].",".$_POST['descripcionAlimentacionServicioAlimentacionA']; 
      }

      if(isset($_POST['descripcionAlimentacionServicioAlimentacionD']) && is_null($_POST['descripcionAlimentacionServicioAlimentacionA']) && isset($_POST['descripcionAlimentacionServicioAlimentacionC']))
      {
          $descripcionAlimentacion = $_POST['descripcionAlimentacionServicioAlimentacionD'].",".$_POST['descripcionAlimentacionServicioAlimentacionC'];
      }
      
      if(is_null($_POST['descripcionAlimentacionServicioAlimentacionD']) && isset($_POST['descripcionAlimentacionServicioAlimentacionA']) && isset($_POST['descripcionAlimentacionServicioAlimentacionC']))
      {
        $descripcionAlimentacion = $_POST['descripcionAlimentacionServicioAlimentacionA'].",".$_POST['descripcionAlimentacionServicioAlimentacionC'];  
      }
       if(isset($_POST['descripcionAlimentacionServicioAlimentacionD']) && isset($_POST['descripcionAlimentacionServicioAlimentacionA']) && isset($_POST['descripcionAlimentacionServicioAlimentacionC']))
      {
           $descripcionAlimentacion = $_POST['descripcionAlimentacionServicioAlimentacionD'].",".$_POST['descripcionAlimentacionServicioAlimentacionA'].",".$_POST['descripcionAlimentacionServicioAlimentacionC'];
      }





        $montoTempD =str_replace(".","",$_POST['precioServicioAlimentacionD']);
        $precioFinalD=str_replace("₡","",$montoTempD);

        $montoTempA =str_replace(".","",$_POST['precioServicioAlimentacionA']);
        $precioFinalA=str_replace("₡","",$montoTempA);

        $montoTempC =str_replace(".","",$_POST['precioServicioAlimentacionC']);
        $precioFinalC=str_replace("₡","",$montoTempC);
        
        



     
      if(isset($precioFinalD) &&  empty($precioFinalA) &&  empty($precioFinalC))
      {
            $precio= $precioFinalD;
      }

      else if(empty($precioFinalD) && isset($precioFinalA) && empty($precioFinalC))
      {
            $precio= $precioFinalA;
      }

      else if(empty($precioFinalD) && empty($precioFinalA) && isset($precioFinalC))
      {
            $precio= $precioFinalC;
      }
      
      else if(isset($precioFinalD) && isset($precioFinalA) && empty($precioFinalC))
      {
            $precio= $precioFinalD.",".$precioFinalA;
      }

      else if(isset($precioFinalD) && empty($precioFinalA) && isset($precioFinalC))
      {
          $precio= $precioFinalD.",".$precioFinalC;
      }
      
      else if(empty($precioFinalD) && isset($precioFinalA) && isset($precioFinalC))
      {
        $precio= $precioFinalA.",".$precioFinalC;
      }
      else
      {
         $precio= $precioFinalD.",".$precioFinalA.",".$precioFinalC;
      }








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
        $precio=str_replace("₡","",$_POST['precioServicioAlimentacion']);
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
