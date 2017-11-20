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


if($resultado[5]=="usuario")
{


    session_start();
    $_SESSION['usuario']="usuario";
     $_SESSION['identificador']=$resultado[0];
        $_SESSION['nombre']=$resultado[1]."".$resultado[2];
          $_SESSION['correo']=$resultado[3];


   echo "view/UsuarioView.php";



    exit();
}


else if($resultado[5]=="administrador")
{
    session_start();
    $_SESSION['admnistrador']="administrador";
     $_SESSION['identificador']=$resultado[0];
        $_SESSION['nombre']=$resultado[1]."".$resultado[2];
          $_SESSION['correo']=$resultado[3];

    echo "view/AdministradorView.php";

    exit();
}
else
{
 echo "index.php";


}
}


}
