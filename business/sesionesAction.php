<?php


require_once  'sesionesBusiness.php';
include_once '../Domain/sesion.php';

if (isset($_POST['accion'])) {
$accion=$_POST['accion'];



if ($accion=="taste") {
    
    if (isset($_POST['user'])&isset($_POST['password'])){
$usuario=$_POST['user'];
$password=$_POST['password'];



$sesionesBusiness =new sesionesBusiness();

$sesion= new Sesion($usuario,$password);

$resultado=$sesionesBusiness->validarSesion($sesion);

if($resultado[0]=="estudiante") 
{
   
   
    session_start();
    $_SESSION['estudiante']="$resultado[0]";
     $_SESSION['usuario']=$resultado[1];

   //header("location: ../View/principal.php");
   
 echo 'View/principal.php';

    exit(); 
}
 

else if($resultado[0]=="administrador") 
{
    session_start();
    $_SESSION['admnistrador']="$usuario";
    
      header("location: ../../view/");
    exit(); 
}
 

else if($resultado[0]=="asistente") 
{
    session_start();
    $_SESSION['asistente']="$usuario";
    header("location: ");
    exit();
} 
else 
{
   
  
   
}
}
 

}}