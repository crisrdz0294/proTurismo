<?php


include './tipoActividadTuristicaBusiness.php';

 if (isset($_POST['guardarTipoActividadTuristica'])) 
 {

    if (isset($_POST['nombretipoactividadturistica']) && isset($_POST['descripciontipoactividadturistica'])) 
    {

            $nombre = $_POST['nombretipoactividadturistica'];
            $descripcion= $_POST['descripciontipoactividadturistica'];
            $estado=$_POST['estadotipoactividadturistica'];
          

            if (strlen($nombre) > 0 && strlen($descripcion) > 0) {


                    $tipoActividadTuristica = new TipoActividadTuristica(0,$nombre,$descripcion,$estado);
                    $tipoActividadTuristicaBusisness = new TipoActividadTuristicaBusiness();

                    $result = $tipoActividadTuristicaBusisness->insertarTipoActividadTuristica($tipoActividadTuristica);

                    if ($result == 1) {
                         header("location: ../view/tipoActividadTuristicaView.php?success=inserted");
                    } else {
                        header("location: ../view/tipoActividadTuristicaView.php?error=dbError");
                    }
            
        } else {
            header("location: ../view/tipoActividadTuristicaView.php?error=emptyField");
        }
    } else {
        header("location: ../view/tipoActividadTuristicaView.php?error=error");
    }
}


else if (isset($_POST['update'])) 
{

    if (isset($_POST['idtipoactividadturistica']) && isset($_POST['nombretipoactividadturistica']) && isset($_POST['descripciontipoactividadturistica'])) 
    {
            $id=$_POST['idtipoactividadturistica'];
            $nombre = $_POST['nombretipoactividadturistica'];
            $descripcion= $_POST['descripciontipoactividadturistica'];
            $estado=$_POST['estadotipoactividadturistica'];


            if (strlen($nombre) > 0 && strlen($descripcion) > 0) {


                    $tipoActividadTuristica = new TipoActividadTuristica($id,$nombre,$descripcion,$estado);
                    $tipoActividadTuristicaBusisness = new TipoActividadTuristicaBusiness();

                    $result = $tipoActividadTuristicaBusisness->actualizarTipoActividadTuristica($tipoActividadTuristica);

                if ($result == 1) {
                         header("location: ../view/tipoActividadTuristicaView.php?success=update");
                    } else {
                        header("location: ../view/tipoActividadTuristicaView.php?error=dbError");
                    }
            
        } else {
            header("location: ../view/tipoActividadTuristicaView.php?error=emptyField");
        }
     } else {
        header("location: ../view/tipoActividadTuristicaView.php?error=error");
    }
} 
