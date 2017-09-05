<?php


include './tipoActividadBusiness.php';

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

            $habilidadesSeleccionadas="";
 
            for ($i=0;$i<count($habilidades);$i++)    {     
               
                $habilidadesSeleccionadas.=$habilidades[$i].",";  
            }

            $habilidadesSeleccionadas=substr($habilidadesSeleccionadas,0,-1);

            json_encode($habilidadesSeleccionadas);
            
            $tipoActividadRural = new TurismoRural(0,$name,$description,$estadoActividad,$cantidadpersonas,$lugaractividad, $distanciahospedaje,$habilidadesSeleccionadas,$horarioactividad);

            $tipoActividadBusiness = new TipoActividadBusiness();

            $result = $tipoActividadBusiness->insertarTipoActividad($tipoActividadRural);

                    if ($result == 1) {
                         header("location: ../view/actividadesView.php?success=inserted");
                    } else {
                        header("location: ../view/actividadesView.php?error=dbError");
                    }    
       
    } else {
        header("location: ../view/actividadesView.php?error=error");
    }
}else if (isset($_POST['update'])) {
   

        
    if (isset($_POST['nombreActividad']) && isset($_POST['descripcionActividad']) && isset($_POST['estadoActividad'])&& isset($_POST['cantidadpersonas']) && isset($_POST['lugaractividad'])&&isset($_POST['distanciahospedaje'])&& isset($_POST['habilidades']) && isset($_POST['horarioactividad']) && isset($_POST['idTipoActividad'])) {
            
            $id = $_POST['idTipoActividad'];
            $nombre = $_POST['nombreActividad'];
            $descripcion = $_POST['descripcionActividad'];
            $estado = $_POST['estadoActividad'];
            $cantidadpersonas=$_POST['cantidadpersonas'];
            $lugaractividad=$_POST['lugaractividad'];
            $distanciahospedaje=$_POST['distanciahospedaje'];
            $habilidades=$_POST['habilidades'];
            $horarioactividad=$_POST['horarioactividad'];
     
       
        if (strlen($id) > 0 && strlen($nombre)>0 && strlen($descripcion)>0 && strlen($estado)>0) {
            if (!is_numeric($nombre)) {

                $tipoActividadRural = new TurismoRural($id,$nombre,$descripcion,$estado,$cantidadpersonas,$lugaractividad, $distanciahospedaje,$habilidades,$horarioactividad);
                    $tipoActividadBusiness = new TipoActividadBusiness();

                $result = $tipoActividadBusiness->actualizarTipoActividad($tipoActividadRural);
                if ($result == 1) {
                         header("location: ../view/actividadesView.php?success=update");
                    } else {
                        header("location: ../view/actividadesView.php?error=dbError");
                    }
            } else {
                header("location: ../view/actividadesView.php?error=numberFormat");
            }
        } else {
            header("location: ../view/actividadesView.php?error=emptyField");
        }
    } else {
        header("location: ../view/actividadesView.php?error=error");
    }
} else if (isset($_POST['delete'])) {

    if (isset($_POST['idTipoActividad'])) {

        $id = $_POST['idTipoActividad'];
       

         $tipoActividadBusiness = new TipoActividadBusiness();
        $result = $tipoActividadBusiness->eliminarTipoActividad($id);
        if ($result == 1) {
            header("location: ../view/actividadesView.php?success=deleted");
        } else {
            header("location: ../view/actividadesView.php?error=dbError");
        }
    } else {
        header("location: ../view/actividadesView.php?error=error");
    }
}
