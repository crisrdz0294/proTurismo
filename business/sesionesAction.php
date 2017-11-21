<?php


require_once  'sesionesBusiness.php';
include_once '../domain/sesion.php';

if (isset($_POST['logear'])) {
  if (isset($_POST['emailLogin'])&isset($_POST['passwordLogin'])){

    $usuario=$_POST['emailLogin'];
    $password=$_POST['passwordLogin'];
    $sesionesBusiness =new sesionesBusiness();
    $sesion= new Sesion($usuario,$password);
    $resultado=$sesionesBusiness->validarSesion($sesion);

if($resultado){
if($resultado[4]=="usuario"){

    session_start();
    $_SESSION['usuario']="usuario";
     $_SESSION['identificador']=$resultado[0];
        $_SESSION['nombre']=$resultado[1]." ".$resultado[2];
          $_SESSION['correo']=$resultado[3];

   echo "view/paqueteTuristicoView.php";
    exit();
}else if($resultado[4]=="administrador"){

    session_start();
    $_SESSION['administrador']="administrador";
     $_SESSION['identificador']=$resultado[0];
        $_SESSION['nombre']=$resultado[1]." ".$resultado[2];
          $_SESSION['correo']=$resultado[3];

    echo "view/menuAdministradorView.php";

    exit();
}}
else
{
 echo "index.php";


}
}


}
