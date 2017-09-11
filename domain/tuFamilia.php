<?php


class TuFamilia {
    private $idFamilia;
    private $adulltoMayorFamilia;
    private $adultoFamilia;
    private $adolecenteFamilia;
    private $ninoFamilia;

    private $idResponsable;
    private $sitioTuristico;

    function TuFamilia($idFamilia, $adulltoMayorFamilia, $adultoFamilia, $adolecenteFamilia, $ninoFamilia,$idResponsable,$sitioTuristico) {

        $this->idFamilia = $idFamilia;
        $this->adulltoMayorFamilia = $adulltoMayorFamilia;
        $this->adultoFamilia = $adultoFamilia;
        $this->adolecenteFamilia = $adolecenteFamilia;
        $this->ninoFamilia = $ninoFamilia;

        $this->idResponsable = $idResponsable;
        $this->sitioTuristico = $sitioTuristico;
    }
    function getIdFamilia() {
        return $this->idFamilia;
    }

    function getAdultoMayorFamilia() {
        return $this->adulltoMayorFamilia;
    }

    function getAdultoFamilia() {
        return $this->adultoFamilia;
    }

    function getAdolecenteFamilia() {
        return $this->adolecenteFamilia;
    }

    function getNinoFamilia() {
        return $this->ninoFamilia;
    }


    function getIdResponsable() {
        return $this->idResponsable;
    }
    function getSitioTuristico() {
        return $this->sitioTuristico;
    }







    function setIdFamilia($idFamilia) {
        $this->idFamilia = $idFamilia;
    }

    function setAdulltoMayorFamilia($adulltoMayorFamilia) {
        $this->adulltoMayorFamilia = $adulltoMayorFamilia;
    }

    function setAdultoFamilia($adultoFamilia) {
        $this->adultoFamilia = $adultoFamilia;
    }

    function setAdolecenteFamilia($adolecenteFamilia) {
        $this->adolecenteFamilia = $adolecenteFamilia;
    }

    function setNinoFamilia($ninoFamilia) {
        $this->ninoFamilia = $ninoFamilia;
    }
    


}
