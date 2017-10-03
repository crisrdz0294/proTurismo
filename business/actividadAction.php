<?php


include_once './actividadBusiness.php';

 if (isset($_POST['guardarActividad'])) {



    if (isset($_POST['nombreActividad']) && isset($_POST['descripcionActividad']) && isset($_POST['estadoActividad'])&& isset($_POST['cantidadpersonas'])&&isset($_POST['lugaractividad'])&&isset($_POST['distanciahospedaje'])&&
        isset($_POST['habilidades'])&&isset($_POST['horarioactividad'])) {
            
            $name = $_POST['nombreActividad'];
            $description = $_POST['descripcionActividad'];
            $estadoActividad = $_POST['estadoActividad'];
            $cantidadpersonas=$_POST['cantidadpersonas'];
            $lugaractividad=$_POST['lugaractividad'];
            $distanciahospedaje=$_POST['distanciahospedaje'];
            $habilidades=$_POST['habilidades'];
            $horarioactividad=$_POST['horarioactividad'];
            $idSitio=$_POST['sitioturistico'];
            $idTipoActividad=$_POST['tipoactividad'];

            $habilidadesSeleccionadas="";
 
            for ($i=0;$i<count($habilidades);$i++)    {     
               
                $habilidadesSeleccionadas.=$habilidades[$i].",";  
            }

            $habilidadesSeleccionadas=substr($habilidadesSeleccionadas,0,-1);

            json_encode($habilidadesSeleccionadas);
            
            $actividad = new Actividad(0,$name,$description,$estadoActividad,$cantidadpersonas,$lugaractividad, $distanciahospedaje,$habilidadesSeleccionadas,$horarioactividad,$idSitio,$idTipoActividad);


            $actividadBusiness = new ActividadBusiness();

            $result = $actividadBusiness->insertarActividad($actividad);

                    if ($result == 1) {
                         header("location: ../view/actividadesView.php?success=inserted");
                    } else {
                        header("location: ../view/actividadesView.php?error=dbError");
                    }    
       
    } else {
        header("location: ../view/actividadesView.php?error=error");
    }
}else if (isset($_POST['update'])) {
   
   if (isset($_POST['nombreActividad']) && isset($_POST['descripcionActividad']) && isset($_POST['estadoActividad'])&& isset($_POST['cantidadpersonas'])&&isset($_POST['lugaractividad'])&&isset($_POST['distanciahospedaje'])&&
        isset($_POST['habilidades'])&&isset($_POST['horarioactividad']) &&isset($_POST['idActividad'])&&isset($_POST['idtipo'])&&isset($_POST['idsitio'])) {


            $name = $_POST['nombreActividad'];
            $description = $_POST['descripcionActividad'];
            $estadoActividad = $_POST['estadoActividad'];
            $cantidadpersonas=$_POST['cantidadpersonas'];
            $lugaractividad=$_POST['lugaractividad'];
            $distanciahospedaje=$_POST['distanciahospedaje'];
            $habilidades=$_POST['habilidades'];
            $horarioactividad=$_POST['horarioactividad'];
            $idSitio=$_POST['idsitio'];
            $idTipoActividad=$_POST['idtipo'];
            $id=$_POST['idActividad'];

             $actividad = new Actividad($id,$name,$description,$estadoActividad,$cantidadpersonas,$lugaractividad, $distanciahospedaje,$habilidades,$horarioactividad,$idSitio,$idTipoActividad);
             


            $actividadBusiness = new ActividadBusiness();

            $result = $actividadBusiness->actualizarActividad($actividad);

            if ($result==0) {
                header("location: ../view/actividadesView.php?success=update");
            }else if($result==1){
                header("location: ../view/actividadesView.php?error=AgregadaRequisitos");
            }else{
                header("location: ../view/actividadesView.php?error=agregadaPaquete");
            }    

        } else {
            header("location: ../view/actividadesView.php?error=error");
        }
   

} else if (isset($_POST['delete'])) {

    if (isset($_POST['idActividad'])) {

        $id = $_POST['idActividad'];
       

        $actividadBusiness = new ActividadBusiness();
        $result = $actividadBusiness->eliminarActividad($id);
         if ($result==0) {
                header("location: ../view/actividadesView.php?success=delete");
            }else if($result==1){
                header("location: ../view/actividadesView.php?error=AgregadaRequisitos");
            }else{
                header("location: ../view/actividadesView.php?error=agregadaPaquete");
            } 
    } else {
        header("location: ../view/actividadesView.php?error=error");
    }
}
