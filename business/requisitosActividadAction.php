<?php


include './requisitosActividadBusiness.php';

 if (isset($_POST['guardarRequisitosActividad'])) {

    if (isset($_POST['edadRequisitosActividad']) && isset($_POST['conocimientoRequisitosActividad']) && isset($_POST['estadoFisicoRequisitosActividad'])&& isset($_POST['equipoNecesarioRequisitosActividad'])&& isset($_POST['aptitudesRequisitosActividad'])) {
            
            $edad = $_POST['edadRequisitosActividad'];
            $conocimiento= $_POST['conocimientoRequisitosActividad'];
            $estado=$_POST['estadoFisicoRequisitosActividad'];
            $equipo=$_POST['equipoNecesarioRequisitosActividad'];
            $aptitudes=$_POST['aptitudesRequisitosActividad'];
        
            printf($edad);

            if ($edad > 0 && strlen($conocimiento) > 0 && strlen($estado) > 0&& strlen($equipo) > 0&& strlen($aptitudes) > 0 ) {
            
                if (is_numeric($edad)) {

                    $requisitosActividad = new requisitosActividad(0,$edad,$conocimiento,$estado,$equipo,$aptitudes);
                    $requisitosActividadBusisness = new requisitosActividadBusiness();

                    $result = $requisitosActividadBusisness->insertarRequisitosActividad($requisitosActividad);

                    if ($result == 1) {
                         header("location: ../view/requisitosActividadView.php?success=inserted");
                    } else {
                        header("location: ../view/requisitosActividadView.php?error=dbError");
                    }
            } else {
                header("location: ../view/requisitosActividadView.php?error=numberFormat");
            }
        } else {
            header("location: ../view/requisitosActividadView.php?error=emptyField");
        }
    } else {
        header("location: ../view/requisitosActividadView.php?error=error");
    }
}else if (isset($_POST['update'])) {
   

    if (isset($_POST['idRequisitosActividad']) &&isset($_POST['edadRequisitosActividad']) && isset($_POST['conocimientoRequisitosActividad']) && isset($_POST['estadoFisicoRequisitosActividad'])&& isset($_POST['equipoNecesarioRequisitosActividad'])&& isset($_POST['aptitudesRequisitosActividad'])) {
            $id=$_POST['idRequisitosActividad'];
            $edad = $_POST['edadRequisitosActividad'];
            $conocimiento= $_POST['conocimientoRequisitosActividad'];
            $estado=$_POST['estadoFisicoRequisitosActividad'];
            $equipo=$_POST['equipoNecesarioRequisitosActividad'];
            $aptitudes=$_POST['aptitudesRequisitosActividad'];
        

            if ($edad > 0 && strlen($conocimiento) > 0 && strlen($estado) > 0&& strlen($equipo) > 0&& strlen($aptitudes) > 0 ) {
            
                if (is_numeric($edad)) {

                    $requisitosActividad = new requisitosActividad($id,$edad,$conocimiento,$estado,$equipo,$aptitudes);

                    
                    $requisitosActividadBusisness = new requisitosActividadBusiness();



                    $result = $requisitosActividadBusisness->actualizarRequisitosActividad($requisitosActividad);
                if ($result == 1) {
                         header("location: ../view/requisitosActividadView.php?success=inserted");
                    } else {
                        header("location: ../view/requisitosActividadView.php?error=dbError");
                    }
            } else {
                header("location: ../view/requisitosActividadView.php?error=numberFormat");
            }
        } else {
            header("location: ../view/requisitosActividadView.php?error=emptyField");
        }
    } else {
        header("location: ../view/requisitosActividadView.php?error=error");
    }
} else if (isset($_POST['delete'])) {

    if (isset($_POST['idRequisitosActividad'])) {

        $id = $_POST['idRequisitosActividad'];
       

         $requisitosActividadBusisness = new requisitosActividadBusiness();
         
        $result = $requisitosActividadBusisness->eliminarRequisitoActividad($id);
        if ($result == 1) {
            header("location: ../view/requisitosActividadView.php?success=deleted");
        } else {
            header("location: ../view/requisitosActividadView.php?error=dbError");
        }
    } else {
        header("location: ../view/requisitosActividadView.php?error=error");
    }
}
