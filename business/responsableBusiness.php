<?php

include '../data/responsableData.php';

class ResponsableBusiness 
{
    private $responsable;
    
    public function ResponsableBusiness()
    {
        $this->responsable = new responsableData();
        
    }


    
	public function insertarResponsable($responsable){
		return $this->responsable->insertarResponsable($responsable);
	}

	public function mostrarTodosResponsable(){
		return $this->responsable->mostrarTodosResponsable();
	}

	public function actualizarResponsable($responsable){
		return $this->responsable->actualizarResponsable($responsable);
	}

	public function eliminarResponsable($idResponsable){
		return $this->responsable->eliminarResponsable($idResponsable);
	}
}

