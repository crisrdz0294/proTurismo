<?php

include './tuRoomBusisnes.php';

    if (isset($_POST['enviarFormulario'])) {

    if (isset($_POST['estiloCama']) && isset($_POST['aireAcondicionado']) && isset($_POST['internet'])&& isset($_POST['cable'])&& isset($_POST['cantidadcamas'])&& isset($_POST['cantidadpersonas'])&& isset($_POST['vista'])
    && isset($_POST['banos'])&& isset($_POST['acceso']) && isset($_POST['ventilador'])) {

            $cama = $_POST['estiloCama'];
            $aire = $_POST['aireAcondicionado'];
            $inter= $_POST['internet'];
            $cable=$_POST['cable'];
            $ventilador=$_POST['ventilador'];
            $personas=$_POST['cantidadpersonas'];
            $camas=$_POST['cantidadcamas'];
            $vista=$_POST['vista'];
            $acces=$_POST['acceso'];
            $banos=$_POST['banos'];

            if (strlen($cama) >=0 && strlen($aire) >= 0 && strlen($inter) >= 0&& strlen($cable) >= 0
            && strlen($ventilador) >= 0&& strlen($personas) >0&& strlen($camas) >0&& strlen($vista) >= 0&& strlen($acces) >=0&& strlen($banos) >=0) {


                    $nuevoCuarto = new TuRoom($cama,$inter,$aire,$cable,0,$camas,$ventilador,$vista,$personas,$banos,$acces);

                    $tuRoonBusisnes = new TuRoomBusisnes();

                    $result = $tuRoonBusisnes->insertTuRoom($nuevoCuarto);

                    if ($result == 1) {
                         header("location: ../view/tuRoomView.php?success=inserted");
                    } else {
                        header("location: ../view/tuRoomView.php?error=dbError");
                    }
            } else {
                header("location: ../view/tuRoomView.php?error=numberFormat");
            }
        } else {
            header("location: ../view/tuRoomView.php?error=emptyField");
        }

    }else if (isset($_POST['update'])) {


      if (isset($_POST['idhabitacion']) &&isset($_POST['estiloCama']) && isset($_POST['aireAcondicionado']) && isset($_POST['internet'])&& isset($_POST['cable'])&& isset($_POST['cantidadcamas'])&& isset($_POST['cantidadpersonas'])&& isset($_POST['vista'])
      && isset($_POST['banos'])&& isset($_POST['acceso']) && isset($_POST['ventilador'])) {
              $id=$_POST['idhabitacion'];
              $cama = $_POST['estiloCama'];
              $aire = $_POST['aireAcondicionado'];
              $inter= $_POST['internet'];
              $cable=$_POST['cable'];
              $ventilador=$_POST['ventilador'];
              $personas=$_POST['cantidadpersonas'];
              $camas=$_POST['cantidadcamas'];
              $vista=$_POST['vista'];
              $acces=$_POST['acceso'];
              $banos=$_POST['banos'];

            if (strlen($cama) >=0 && strlen($aire) >= 0 && strlen($inter) >= 0&& strlen($cable) >= 0
            && strlen($ventilador) >= 0&& strlen($personas) >0&& strlen($camas) >0&& strlen($vista) >= 0&& strlen($acces) >=0&& strlen($banos) >=0) {
            if (is_numeric($id)) {
                  $nuevoCuarto = new TuRoom($cama,$inter,$aire,$cable,$id,$camas,$ventilador,$vista,$personas,$banos,$acces);

                    $tuRoonBusisnes = new TuRoomBusisnes();

                    $result = $tuRoonBusisnes->actualizarTuRoom($nuevoCuarto);

                if ($result == 1) {
                         header("location: ../view/tuRoomView.php?success=inserted");
                    } else {
                        header("location: ../view/tuRoomView.php?error=dbError");
                    }
            } else {
                header("location: ../view/tuRoomView.php?error=numberFormat");
            }
        } else {
            header("location: ../view/tuRoomView.php?error=emptyField");
        }
    } else {
        header("location: ../view/tuRoomView.php?error=error");
    }
} else if (isset($_POST['delete'])) {

    if (isset($_POST['idhabitacion'])) {

        $id = $_POST['idhabitacion'];
        $tuRoonBusisnes = new TuRoomBusisnes();
        $result = $tuRoonBusisnes->eliminarTuRoom($id);

        if ($result == 1) {
            header("location: ../view/tuRoomView.php?success=deleted");
        } else {
            header("location: ../view/tuRoomView.php?error=dbError");
        }
    } else {
        header("location: ../view/tuRoomView.php?error=error");
    }
}
