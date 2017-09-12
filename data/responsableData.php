<?php
    
    include 'data.php';
    include '../domain/responsable.php';
    
    class responsableData{

        public function responsableData(){}

        public function insertarResponsable($responsable)
        {

            $con = new Data();
            $conexion = $con->conect();
            

        $cedula = $responsable->getCedulaResponsable();
        $nombre = $responsable->getNombreResponsable();
        $primerApellido = $responsable->getPrimirapellidoResponsable();   
        $segundoApellido = $responsable->getSegundoapellidoResponsable();
        $telefono = $responsable->getTelefonoResponsable();
        $email = $responsable->getEmailResponsable();



            $consultaUltimoId ="SELECT MAX(idresponsable) AS idresponsable FROM tbresponsable";
            $maximoId=mysqli_query($conexion,$consultaUltimoId);
            $idSiguiente=1;

            if ($row = mysqli_fetch_row($maximoId)) {
                $idSiguiente = trim($row[0]) + 1;
            }

            $consultaInsertar="INSERT INTO tbresponsable VALUES (
            
            ".$idSiguiente.",
            '".$cedula."',
            '".$nombre."',
            '".$primerApellido."',
            '".$segundoApellido."',
            '".$telefono."',
            '".$email."'

            );";


            $result = mysqli_query($conexion, $consultaInsertar);
            mysqli_close($conexion);
            return $result;
        }








        public function mostrarTodosResponsable(){

            $con = new Data();
            $conexion = $con->conect();
            $consultaMostrar = "SELECT * FROM tbresponsable;";
            $result = mysqli_query($conexion, $consultaMostrar);
            mysqli_close($conexion);

            $responsable = [];
            while ($row = mysqli_fetch_array($result)) {
                $temporaralResponsable = new Responsable(

                    $row['idresponsable'], 
                    $row['cedularesponsable'], 
                    $row['nombreresponsable'], 
                    $row['primerapellidoresponsable'],
                    $row['segundoapellidoresponsable'],
                    $row['telefonoresponsable'], 
                    $row['emailresponsable']
                );

                array_push($responsable, $temporaralResponsable);
            }
            return $responsable;
        }








        public function actualizarResponsable($responsable){
            $con = new Data();
            $conexion = $con->conect();

            $consultaActualizar = "UPDATE tbresponsable SET 

        cedularesponsable = '".$responsable->getCedulaResponsable()."',
        nombreresponsable = '".$responsable->getNombreResponsable()."',
        primerapellidoresponsable = '".$responsable->getPrimirapellidoResponsable()."',
        segundoapellidoresponsable = '".$responsable->getSegundoapellidoResponsable()."',
        telefonoresponsable = '".$responsable->getTelefonoResponsable()."',
        emailresponsable = '".$responsable->getEmailResponsable()."' 
        WHERE idresponsable =" . $responsable->getIdResponsable() . ";";



            $result = mysqli_query($conexion,$consultaActualizar);
            mysqli_close($conexion);

            return $result;
        }








        public function eliminarResponsable($idresponsable)
        {
            $con = new Data();
            $conexion = $con->conect();

            $consultaEliminar="DELETE FROM tbresponsable WHERE idresponsable =".$idresponsable.";";

            $result=mysqli_query($conexion,$consultaEliminar);
            mysqli_close($conexion);

            return $result;
        }

    }
  ?>
