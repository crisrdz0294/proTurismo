<?php


include './servicioTransporteBusiness.php';

 

 if (isset($_POST['guardarServicioTransporte'])) 
 {

    if (isset($_POST['origenServicioTransporte']) && isset($_POST['destinoServicioTransporte']) && 
        isset($_POST['KilometrosServicioTransporte']) && 
        isset($_POST['tipoVehiculoServicioTransporte']) && isset($_POST['precioServicioTransporte']) && 
        isset($_POST['cantidadPersonasServicioTransporte'])
        ) 
    {


        $origen = $_POST['origenServicioTransporte'];
        $destino = $_POST['destinoServicioTransporte'];
        $kilometros = $_POST['KilometrosServicioTransporte'];
        

        $tipoCarretera = $_POST['tipoCarreteraServicioTransporte1']."  ,  ".$_POST['tipoCarreteraServicioTransporte2']."  ,  ".$_POST['tipoCarreteraServicioTransporte3']."  ,  ".$_POST['tipoCarreteraServicioTransporte4']."  ,  ".$_POST['tipoCarreteraServicioTransporte5']."  ,  ".$_POST['tipoCarreteraServicioTransporte6'];


        $tipoVehiculo =  $_POST['tipoVehiculoServicioTransporte'];
        $montoTemp =str_replace(".","",$_POST['precioServicioTransporte']);
        $precioFinal=str_replace("₡","",$montoTemp);

        $cantidadPersonas = $_POST['cantidadPersonasServicioTransporte'];
        $idSitio=$_POST['sitioturistico'];



        if (strlen($origen) > 0 && strlen($destino) > 0 && strlen($kilometros) > 0 && strlen($tipoCarretera) > 0 && 
            strlen($tipoVehiculo) > 0 && strlen($precioFinal) > 0 && strlen($cantidadPersonas) > 0) 
        {
            
            $servicioTransporte = new ServicioTransporte(0,$origen ,$destino,$kilometros,$tipoCarretera,$tipoVehiculo,
            $precioFinal,$cantidadPersonas,$idSitio,0);
            
            $servicioTransporteBusiness = new ServicioTransporteBusiness();
            $result = $servicioTransporteBusiness->insertarTransporteBusiness($servicioTransporte);

            if ($result == 1) 
            {
                header("location: ../view/servicioTransporteView.php?success=inserted");
            } else {
                header("location: ../view/servicioTransporteView.php?error=dbError");
            }

        } else {
            header("location: ../view/servicioTransporteView.php?error=emptyField");
        }
    } else {
        header("location: ../view/servicioTransporteView.php?error=error");
    }
}

else if (isset($_POST['update'])) 
{   
  if (isset($_POST['origenServicioTransporte']) && isset($_POST['destinoServicioTransporte']) && 
        isset($_POST['KilometrosServicioTransporte']) && isset($_POST['idServicioTransporte']) &&  
        isset($_POST['tipoCarreteraServicioTransporte']) && isset($_POST['tipoVehiculoServicioTransporte']) && 
        isset($_POST['precioServicioTransporte']) && isset($_POST['cantidadPersonasServicioTransporte']) && 
        isset($_POST['idsitio'])
        ) 
    {

        $id = $_POST['idServicioTransporte'];
        $origen = $_POST['origenServicioTransporte'];
        $destino = $_POST['destinoServicioTransporte'];
        $kilometros = $_POST['KilometrosServicioTransporte'];
        $tipoCarretera = $_POST['tipoCarreteraServicioTransporte'];
        $tipoVehiculo =  $_POST['tipoVehiculoServicioTransporte'];
         $montoTemp =str_replace(".","",$_POST['precioServicioTransporte']);
        $precioFinal=str_replace("₡","",$montoTemp);
        $cantidadPersonas = $_POST['cantidadPersonasServicioTransporte'];
        $idSitio=$_POST['idsitio'];



        if (strlen($id) > 0 && strlen($origen) > 0 && strlen($destino) > 0 && strlen($kilometros) > 0 && strlen($tipoCarretera) > 0 && strlen($tipoVehiculo) > 0 && strlen($precioFinal) > 0 && strlen($cantidadPersonas) > 0) 
        {
            
            $servicioTransporte = new ServicioTransporte($id,$origen ,$destino,$kilometros,$tipoCarretera,$tipoVehiculo,$precioFinal,$cantidadPersonas,$idSitio,0);
            
            
            $serviciotransporteBusiness = new ServicioTransporteBusiness();
            $result = $serviciotransporteBusiness->actualizarServicioTransporte($servicioTransporte);                

            if ($result == 1) {
                header("location: ../view/servicioTransporteView.php?success=update");
            } else {
               header("location: ../view/servicioTransporteView.php?error=dbError");
             }
        } else {
            header("location: ../view/servicioTransporteView.php?error=emptyField");
        }
    } else {
        header("location: ../view/servicioTransporteView.php?error=error");
    }
} 


else if (isset($_POST['delete'])) 
{

   if (isset($_POST['idServicioTransporte'])) {

        $id = $_POST['idServicioTransporte'];
       

        $serviciotransporteBusiness = new ServicioTransporteBusiness();
        $result = $serviciotransporteBusiness->eliminarServicioTransporte($id);

        if ($result == 1) {
            header("location: ../view/servicioTransporteView.php?success=deleted");
        } else {
            header("location: ../view/servicioTransporteView.php?error=dbError");
        }
    } else {
        header("location: ../view/servicioTransporteView.php?error=error");
    }
}
