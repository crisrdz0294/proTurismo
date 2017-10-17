<?php
	
	include '../domain/tipoActividadTuristica.php';
	include 'data.php';
	class TipoActividadTuristicaData
	{

		public function TipoActividadTuristicaData(){}

		public function insertarTipoActividadTuristica($tipoActividadTuristica)
        {

            $con = new Data();
            $conexion = $con->conect();


       		$nombre = $tipoActividadTuristica->getNombretipoactividadturistica();
        	$descripcion = $tipoActividadTuristica->getDescripciontipoactividadturistica();
        	$estado = $tipoActividadTuristica->getEstadotipoactividadturistica();



            $consultaUltimoId ="SELECT MAX(idtipoactividadturistica) AS idtipoactividadturistica FROM tbtipoactividadturistica";
            $maximoId=mysqli_query($conexion,$consultaUltimoId);
            $idSiguiente=1;

            if ($row = mysqli_fetch_row($maximoId)) {
                $idSiguiente = trim($row[0]) + 1;
            }

            $consultaInsertar="INSERT INTO tbtipoactividadturistica VALUES (

            ".$idSiguiente.",         
            '".$nombre."',
            '".$descripcion."',
            ".$estado."
            );";


            $result = mysqli_query($conexion, $consultaInsertar);
            mysqli_close($conexion);
            return $result;
        }








        public function mostrarTodasTipoActividadTuristica(){

            $con = new Data();
            $conexion = $con->conect();
            $consultaMostrar = "SELECT * FROM tbtipoactividadturistica;";
            $result = mysqli_query($conexion, $consultaMostrar);
            mysqli_close($conexion);

            $tipoactividadturistica = [];
            while ($row = mysqli_fetch_array($result)) {
                $temporaralTipoActividadTuristica = new TipoActividadTuristica(

                    $row['idtipoactividadturistica'],
                    $row['nombretipoactividadturistica'],
                    $row['descripciontipoactividadturistica'],
                    $row['estadotipoactividadturistica']
                );

                array_push($tipoactividadturistica, $temporaralTipoActividadTuristica);
            }
            return $tipoactividadturistica;
        }
       



        	public function actualizarTipoActividadTuristica($tipoActividadTuristica)
        	{

			$con = new Data();
			$conexion = $con->conect();
                 
            $id=$tipoActividadTuristica->getIdtipoactividadturistica();
       		$nombre = $tipoActividadTuristica->getNombretipoactividadturistica();
        	$descripcion = $tipoActividadTuristica->getDescripciontipoactividadturistica();
        	$estado = $tipoActividadTuristica->getEstadotipoactividadturistica();           


			 $consultaActualizar = "UPDATE tbtipoactividadturistica SET 
             nombretipoactividadturistica= '".$nombre."',
        	descripciontipoactividadturistica ='". $descripcion."',
        	estadotipoactividadturistica=".$estado." WHERE idtipoactividadturistica=".$id.";";

            $result = mysqli_query($conexion, $consultaActualizar);
        	mysqli_close($conexion);

        	return $result;
		}
		

	}
  ?>