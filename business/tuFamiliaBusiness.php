<?php
include '../data/tuFamiliaData.php';

class TuFamiliaBusiness {

    private $familia;

    public function TuFamiliaBusiness(){
        $this->familia= new TuFamiliaData();

    }


		public function insertarFamilias($tuFamilia){
			return $this->familia->insertarFamilia($tuFamilia );
		}

		public function mostrarFamilias(){
			return $this->familia->mostrarTodosFamilias();
		}

		public function actualizarFamilias($tuFamilia){
			return $this->familia->actualizarFamilia($tuFamilia);
		}

		public function eliminarFamilias($idFamilia){
			return $this->familia->eliminarFamilia($idFamilia);
		}
	}



 ?>
