<?php


class PaqueteTuristico
{
      private $idPaqueteTuristico;
      private $nombrePaqueteTuristico;
      private $descripcionPaqueteTuristico;
      private $cantidadPersonasPaqueteTuristico;
      private $itinerarioPaqueteTuristico;
      private $precioPaqueteTurisco;


      function PaqueteTuristico($id,$name,$descripcion,$cantidadPersonas,$itinerario,$precio){
           $this->idPaqueteTuristico=$id;
            $this->nombrePaqueteTuristico=$name;
            $this->descripcionPaqueteTuristico=$descripcion;
            $this->cantidadPersonasPaqueteTuristico=$cantidadPersonas;
            $this->itinerarioPaqueteTuristico=$itinerario;
            $this->precioPaqueteTurisco=$precio;

      }

  public function setIdPaqueteTuristico($id){
    $this->idPaqueteTuristico=$id;

  }

  public function getIdPaqueteTuristico(){
    return $this->idPaqueteTuristico;
  }

  public function setNombrePaqueteTuristico($name){
    $this->nombrePaqueteTuristico=$name;
  }

  public function getNombrePaqueteTuristico(){
    return $this->nombrePaqueteTuristico;
  }

 public function setDescripcionPaqueteTuristico($des){
   $this->descripcionPaqueteTuristico=$des;
 }
 public function getDescripcionPaqueteTuristico(){
   return $this->descripcionPaqueteTuristico;
 }
 public function setPrecioPaqueteTuristico($price){
   $this->precioPaqueteTurisco=$price;
 }

public function getPrecioPaqueteTuristico(){
  return $this->precioPaqueteTurisco;
}

public function getCantidadPersonasPaqueteTuristico(){
  return $this->cantidadPersonasPaqueteTuristico;
}
public function getItinerarioPaqueteTuristico(){
  return $this->itinerarioPaqueteTuristico;
}


}



 ?>
