<?php
    
    include_once 'data.php';
    include '../domain/servicioAlimentacion.php';
    
    class ServicioAlimentacionData{

        public function ServicioAlimentacionData(){}

        public function insertarServicioTransporte($servicioalimentacion)
        {

            $con = new Data();
            $conexion = $con->conect();
            

        $tiempoComidas = $servicioalimentacion->getTiempoComidasServicioAlimentacion();
        $descripcionAlimentacion = $servicioalimentacion->getDescripcionAlimentacionServicioAlimentacion();
        $precio = $servicioalimentacion->getPrecioServicioAlimentacion();
        $adicionales = $servicioalimentacion->getAdicionalesServicioAlimentacion();
        $alimentacionLlevar = $servicioalimentacion->getAlimentacionllevarServicioAlimentacion();





            $consultaUltimoId ="SELECT MAX(idalimentacion) AS idalimentacion FROM tbserviciodealimentacion";
            $maximoId=mysqli_query($conexion,$consultaUltimoId);
            $idSiguiente=1;

            if ($row = mysqli_fetch_row($maximoId)) {
                $idSiguiente = trim($row[0]) + 1;
            }

            $consultaInsertar="INSERT INTO tbserviciodealimentacion VALUES (
            
            ".$idSiguiente.",
            '".$tiempoComidas."',
            '".$descripcionAlimentacion."','
            ".$precio."', 
            '".$adicionales."', 
            '".$alimentacionLlevar."'
            
            );";


            $result = mysqli_query($conexion, $consultaInsertar);
            mysqli_close($conexion);
            return $result;
        }











        public function mostrarTodosServicioAlimentacion(){

            $con = new Data();
            $conexion = $con->conect();
            $consultaMostrar = "SELECT * FROM tbserviciodealimentacion;";
            $result = mysqli_query($conexion, $consultaMostrar);
            mysqli_close($conexion);

            $servicioDeAlimentacion = [];
            while ($row = mysqli_fetch_array($result)) {
                $temporaralServicioAlimentacion = new ServicioAlimentacion(

                    $row['idalimentacion'], 
                    $row['tiempocomidas'], 
                    $row['descripcionalimentacion'],
                    $row['precio'],
                    $row['adicionales'], 
                    $row['alimentacionllevar']
                );

                array_push($servicioDeAlimentacion, $temporaralServicioAlimentacion);
            }
            return $servicioDeAlimentacion;
        }








        public function actualizarServicioAlimentacion($servicioAlimentacion){
            $con = new Data();
            $conexion = $con->conect();

            $consultaActualizar = "UPDATE tbserviciodealimentacion SET 

        tiempocomidas = '".$servicioAlimentacion->getTiempoComidasServicioAlimentacion()."',
    descripcionalimentacion = '".$servicioAlimentacion->getDescripcionAlimentacionServicioAlimentacion()."',
    precio = '".$servicioAlimentacion->getPrecioServicioAlimentacion()."',
    adicionales = '".$servicioAlimentacion->getAdicionalesServicioAlimentacion()."',
    alimentacionllevar = '".$servicioAlimentacion->getAlimentacionllevarServicioAlimentacion()."' 
    WHERE idalimentacion =" . $servicioAlimentacion->getIdServicioAlimentacion() . ";";



            $result = mysqli_query($conexion,$consultaActualizar);
            mysqli_close($conexion);

            return $result;
        }










        public function eliminarServicioAlimentacion($idalimentacion)
        {
            $con = new Data();
            $conexion = $con->conect();

            $consultaEliminar="DELETE FROM tbserviciodealimentacion WHERE idalimentacion=".$idalimentacion.";";

            $result=mysqli_query($conexion,$consultaEliminar);
            mysqli_close($conexion);

            return $result;
        }

    }
  ?>
