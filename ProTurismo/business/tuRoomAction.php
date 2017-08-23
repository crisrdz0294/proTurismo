<?php

include './tuRoomBusisnes.php';
    
    if (isset($_POST['enviarFormulario'])) {

    if (isset($_POST['estiloCama']) && isset($_POST['aireAcondicionado']) && isset($_POST['internet'])&& isset($_POST['servicio'])&& isset($_POST['cable'])) {
            
            $cama = $_POST['estiloCama'];
            $aire = $_POST['aireAcondicionado'];
            $inter= $_POST['internet'];
            $servicio=$_POST['servicio'];
            $cable=$_POST['cable'];
        

            if (strlen($cama) > 0 && strlen($aire) > 0 && strlen($inter) > 0&& strlen($servicio) > 0&& strlen($cable) > 0 ) {
            
                
                    $nuevoCuarto = new TuRoom($cama,$inter,$aire,$cable,$servicio,0);

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
   

    if (isset($_POST['estiloCama']) && isset($_POST['aireAcondicionado']) && isset($_POST['internet'])&& isset($_POST['servicio'])&& isset($_POST['cable']) && isset($_POST['idhabitacion'])) {
            
           $id = $_POST['idhabitacion'];
           $cama = $_POST['estiloCama'];
            $aire = $_POST['aireAcondicionado'];
            $inter= $_POST['internet'];
            $servicio=$_POST['servicio'];
            $cable=$_POST['cable'];
       
        if (strlen($cama) > 0 && strlen($aire) > 0 && strlen($inter) > 0&& strlen($servicio) > 0&& strlen($cable) > 0 ) {
            if (is_numeric($id)) {
                  $nuevoCuarto = new TuRoom($cama,$inter,$aire,$cable,$servicio,$id);
                  
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


