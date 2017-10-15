<?php

include './ServicioHabitacionBusisnes.php';

    if (isset($_POST['enviarFormulario'])) {

    if (isset($_POST['estiloCama']) && isset($_POST['aireAcondicionado']) && isset($_POST['internet'])&& isset($_POST['cable'])&& isset($_POST['cantidadcamas'])&& isset($_POST['cantidadpersonas'])&& isset($_POST['cantidadCuartos'])&& isset($_POST['vista'])
    && isset($_POST['banos'])&& isset($_POST['acceso']) && isset($_POST['ventilador'])) {

            $cama = $_POST['estiloCama'];
            $aire = $_POST['aireAcondicionado'];
            $inter= $_POST['internet'];
            $cable=$_POST['cable'];
            $ventilador=$_POST['ventilador'];
            $personas=$_POST['cantidadpersonas'];
            $cuartos=$_POST['cantidadCuartos'];
            $camas=$_POST['cantidadcamas'];
            $vista=$_POST['vista'];
            $acces=$_POST['acceso'];
            $banos=$_POST['banos'];
            $idSitio=$_POST['idEncargado'];


            if (strlen($cama) >=0 && strlen($aire) >= 0 && strlen($inter) >= 0&& strlen($cable) >= 0
            && strlen($ventilador) >= 0&& strlen($personas) >0&& strlen($cuartos) >0&& strlen($camas) >0&& strlen($vista) >= 0&& strlen($acces) >=0&& strlen($banos) >=0) {


                    $nuevoCuarto = new ServicioHabitacion($cama,$inter,$aire,$cable,0,$camas,$ventilador,$vista,$personas,$cuartos,$banos,$acces,$idSitio);

                    $servicioHabitacionBusisnes = new ServicioHabitacionBusisnes();

                    $result = $servicioHabitacionBusisnes->insertServicioHabitacion($nuevoCuarto);

                    if ($result == 1) {
                         header("location: ../view/servicioHabitacionView.php?success=inserted");
                    } else {
                        header("location: ../view/servicioHabitacionView.php?error=dbError");
                    }
            } else {
                header("location: ../view/servicioHabitacionView.php?error=numberFormat");
            }
        } else {
            header("location: ../view/servicioHabitacionView.php?error=emptyField");
        }

    }else if (isset($_POST['update'])) {


    if (isset($_POST['idhabitacion']) && isset($_POST['estiloCama']) && isset($_POST['aireAcondicionado']) && isset($_POST['internet'])&& isset($_POST['cable'])&& isset($_POST['cantidadcamas'])&& isset($_POST['cantidadpersonas'])&& isset($_POST['cantidadCuartos'])&& isset($_POST['vista'])
    && isset($_POST['banos'])&& isset($_POST['acceso']) && isset($_POST['ventilador'])) {

            $id=$_POST['idhabitacion'];
            $cama = $_POST['estiloCama'];
            $aire = $_POST['aireAcondicionado'];
            $inter= $_POST['internet'];
            $cable=$_POST['cable'];
            $ventilador=$_POST['ventilador'];
            $personas=$_POST['cantidadpersonas'];
            $cuartos=$_POST['cantidadCuartos'];
            $camas=$_POST['cantidadcamas'];
            $vista=$_POST['vista'];
            $acces=$_POST['acceso'];
            $banos=$_POST['banos'];
            $idSitio=$_POST['idEncargado'];


            if (strlen($cama) >=0 && strlen($aire) >= 0 && strlen($inter) >= 0&& strlen($cable) >= 0
            && strlen($ventilador) >= 0&& strlen($personas) >0&& strlen($cuartos) >0&& strlen($camas) >0&& strlen($vista) >= 0&& strlen($acces) >=0&& strlen($banos) >=0) {
            

            if (is_numeric($id)) 
            {
                  $nuevoCuarto = new ServicioHabitacion($cama,$inter,$aire,$cable,$id,$camas,$ventilador,$vista,$personas,$cuartos,$banos,$acces,$idSitio);

                    $servicioHabitacionBusisnes = new ServicioHabitacionBusisnes();

                    $result = $servicioHabitacionBusisnes->actualizarServicioHabitacion($nuevoCuarto);

                if ($result == 1) {
                         header("location: ../view/servicioHabitacionView.php?success=update");
                    } else {
                        header("location: ../view/servicioHabitacionView.php?error=dbError");
                    }
            } else {
                header("location: ../view/servicioHabitacionView.php?error=numberFormat");
            }
        } else {
            header("location: ../view/servicioHabitacionView.php?error=emptyField");
        }
    } else {
        header("location: ../view/servicioHabitacionView.php?error=error");
    }
} else if (isset($_POST['delete'])) {

    if (isset($_POST['idhabitacion'])) {

        $id = $_POST['idhabitacion'];
        $servicioHabitacionBusisnes = new ServicioHabitacionBusisnes();
        $result = $servicioHabitacionBusisnes->eliminarServicioHabitacion($id);

        if ($result == 1) {
            header("location: ../view/servicioHabitacionView.php?success=deleted");
        } else {
            header("location: ../view/servicioHabitacionView.php?error=dbError");
        }
    } else {
        header("location: ../view/servicioHabitacionView.php?error=error");
    }
}
