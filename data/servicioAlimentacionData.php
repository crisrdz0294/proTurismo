<?php
    
    include_once 'data.php';
    include '../domain/servicioAlimentacion.php';
    
    class ServicioAlimentacionData{

        public function ServicioAlimentacionData(){}

        public function insertarServicioAlimentacion($servicioalimentacion)
        {

            $con = new Data();
            $conexion = $con->conect();
            

        $tiempoComidas = $servicioalimentacion->getTiempoComidasServicioAlimentacion();
        $descripcionAlimentacion = $servicioalimentacion->getDescripcionAlimentacionServicioAlimentacion();
        $precio = $servicioalimentacion->getPrecioServicioAlimentacion();
        $adicionales = $servicioalimentacion->getAdicionalesServicioAlimentacion();
        $alimentacionLlevar = $servicioalimentacion->getAlimentacionllevarServicioAlimentacion();





            $consultaUltimoId ="SELECT MAX(idservicioalimentacion) AS idservicioalimentacion FROM tbservicioalimentacion";
            $maximoId=mysqli_query($conexion,$consultaUltimoId);
            $idSiguiente=1;

            if ($row = mysqli_fetch_row($maximoId)) {
                $idSiguiente = trim($row[0]) + 1;
            }

            $consultaInsertar="INSERT INTO tbservicioalimentacion VALUES (
            
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
            $consultaMostrar = "SELECT * FROM tbservicioalimentacion;";
            $result = mysqli_query($conexion, $consultaMostrar);
            mysqli_close($conexion);

            $servicioDeAlimentacion = [];
            while ($row = mysqli_fetch_array($result)) {
                $temporaralServicioAlimentacion = new ServicioAlimentacion(

                    $row['idservicioalimentacion'], 
                    $row['tiemposervicioalimentacion'], 
                    $row['descripcionservicioalimentacion'],
                    $row['precioservicioalimentacion'],
                    $row['adicionalservicioalimentacion'], 
                    $row['llevarservicioalimentacion']
                );

                array_push($servicioDeAlimentacion, $temporaralServicioAlimentacion);
            }
            return $servicioDeAlimentacion;
        }








        public function actualizarServicioAlimentacion($servicioAlimentacion){
            $con = new Data();
            $conexion = $con->conect();

            $consultaActualizar = "UPDATE tbservicioalimentacion SET 

        tiemposervicioalimentacion = '".$servicioAlimentacion->getTiempoComidasServicioAlimentacion()."',
    descripcionservicioalimentacion = '".$servicioAlimentacion->getDescripcionAlimentacionServicioAlimentacion()."',
    precioservicioalimentacion = '".$servicioAlimentacion->getPrecioServicioAlimentacion()."',
    adicionalservicioalimentacion = '".$servicioAlimentacion->getAdicionalesServicioAlimentacion()."',
    llevarservicioalimentacion = '".$servicioAlimentacion->getAlimentacionllevarServicioAlimentacion()."' 
    WHERE idservicioalimentacion =" . $servicioAlimentacion->getIdServicioAlimentacion() . ";";



            $result = mysqli_query($conexion,$consultaActualizar);
            mysqli_close($conexion);

            return $result;
        }








        public function eliminarServicioAlimentacion($idalimentacion)
        {
            $con = new Data();
            $conexion = $con->conect();

            $consultaEliminar="DELETE FROM tbservicioalimentacion WHERE idservicioalimentacion =".$idalimentacion.";";

            $result=mysqli_query($conexion,$consultaEliminar);
            mysqli_close($conexion);

            return $result;
        }

    }
  ?>
