<?php


include './tipoActividadBusiness.php';

 if (isset($_POST['guardarActividad'])) {

    if (isset($_POST['nombreActividad']) && isset($_POST['descripcionActividad']) && isset($_POST['estadoActividad'])) {
            
            $name = $_POST['nombreActividad'];
            $description = $_POST['descripcionActividad'];
            $estadoActividad = $_POST['estadoActividad'];
        

            if (strlen($name) > 0 && strlen($description) > 0 && strlen($estadoActividad) > 0 ) {
            
                if (!is_numeric($name)) {

                    $tipoActividadRural = new TurismoRural(0,$name,$description,$estadoActividad);
                    $tipoActividadBusiness = new TipoActividadBusiness();

                    $result = $tipoActividadBusiness->insertarTipoActividad($tipoActividadRural);

                    if ($result == 1) {
                         header("location: ../view/actividadesView.php?success=inserted");
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
}else if (isset($_POST['update'])) {
   

    if (isset($_POST['nombreActividad']) && isset($_POST['descripcionActividad']) && isset($_POST['idTipoActividad']) && isset($_POST['estadoActividad'])) {
            
        $id = $_POST['idTipoActividad'];
        $nombre = $_POST['nombreActividad'];
        $descripcion = $_POST['descripcionActividad'];
        $estado = $_POST['estadoActividad'];
       
        if (strlen($id) > 0 && strlen($nombre)>0 && strlen($descripcion)>0 && strlen($estado)>0) {
            if (!is_numeric($nombre)) {
                $tipoActividadRural = new TurismoRural($id,$nombre,$descripcion,$estado);
                    $tipoActividadBusiness = new TipoActividadBusiness();

                $result = $tipoActividadBusiness->actualizarTipoActividad($tipoActividadRural);
                if ($result == 1) {
                         header("location: ../view/actividadesView.php?success=inserted");
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
