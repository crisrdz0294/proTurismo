<?php

	include_once 'data.php';
	include '../domain/actividad.php';

	class SesionesData {

		public function SesionesData(){}

		public function validarSesion($sesion){
			$con = new Data();
			$conexion = $con->conect();

      $usuario=$sesion->getID();
      $contrasena=$sesion->getPasword();




			$consulta ="SELECT * FROM tbusuario WHERE correousuario='".$usuario."' AND claveusuario='".$contrasena."'   ";
			$result=mysqli_query($conexion,$consulta);
         $usuarioFinal=array();

      if($result){
        while ($row = mysqli_fetch_assoc($result)) {

        array_push(  $usuarioFinal,$row['cedulausuario']);
        array_push($usuarioFinal,$row['nombreusuario']);
        array_push($usuarioFinal,$row['apellidosusuario']);
        array_push($usuarioFinal,$row['correousuario']);
        array_push($usuarioFinal,$row['tipousuario']);

        }

        return $usuarioFinal;

      }else{
      
          return $usuarioFinal;
      }
      mysqli_close($conexion);

        }
      }
