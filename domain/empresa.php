<?php

/**
 *
 */
class Empresa
{

  private $idEmpresa;
  private $idResponsableEmpresa;
  private $contactoTelefonicoEmpresa;
  private $emailEmpresa;
  private $sitioWebEmpresa;
  private $idSitioTuristico;
  private $nombreEmpresa;

  function Empresa($idempresa,$nombre,$idresponsable,$contacto,$email,$sitio,$idSitio)
  {
  $this->idEmpresa=$idempresa;
  $this->idResponsableEmpresa=$idresponsable;
  $this->contactoTelefonicoEmpresa=$contacto;
  $this->emailEmpresa=$email;
  $this->sitioWebEmpresa=$sitio;
  $this->idSitioTuristico=$idSitio;
  $this->nombreEmpresa=$nombre;
  }

  public function setIdEmpresa($idEmpre){
    $this->idEmpresa=$idEmpre;
  }

  public function getIdEmpresa(){
    return $this->idEmpresa;
  }

  public function setIdResponsableEmpresa($responsable){
    $this->idResponsableEmpresa=$responsable;
  }

public function getIdResponsableEmpresa(){
    return  $this->idResponsableEmpresa;
}

public function setContactoTelefonicoEmpresa($contacto){
  $this->contactoTelefonicoEmpresa=$contacto;
}

public function getContactoTelefonicoEmpresa(){
  return $this->contactoTelefonicoEmpresa;
}

public function setEmailEmpresa($email){
  $this->emailEmpresa=$email;
}

public function getEmailEmpresa(){
  return $this->emailEmpresa;
}

public function setSitioWebEmpres($sitio){
  $this->sitioWebEmpresa=$sitio;
}

public function getSitioWebEmpresa(){
  return $this->sitioWebEmpresa;
}

public function setIdSitioTuristico($sitio){
  $this->idSitioTuristico=$sitio;
}

public function getIdSitioTuristico(){
  return $this->idSitioTuristico;
}

public function setNombreEmpresa($name){
  $this->nombreEmpresa=$name;
}
public function getNombreEmpresa(){
   return $this->nombreEmpresa;
}



}
