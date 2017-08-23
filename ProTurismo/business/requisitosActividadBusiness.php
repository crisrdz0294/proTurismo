<?php

include '../data/requisitosActividadData.php';

class requisitosActividadBusiness {
    private $requisito;
    
    public function requisitosActividadBusiness(){
        $this->requisito= new requisitosActividadData();
        
    }
    
    
		public function insertarRequisitosActividad($requisitosActividad){
			return $this->requisito->insertarRequisitosActividad($requisitosActividad );
		}

		public function mostrarTodosRequisitosActividad(){
			return $this->requisito->mostrarTodosRequisitosActividad();
		}

		public function actualizarRequisitosActividad($requisitosActividad){
			return $this->requisito->actualizarRequisitosActividad($requisitosActividad);
		}

		public function eliminarRequisitoActividad($idRequisitosActividad){
			return $this->requisito->eliminarRequisitosActividad($idRequisitosActividad);
		}
	}

