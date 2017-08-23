<?php 
	
	include '../data/dataTrabajoComunal.php';

	class TrabajoComunalBusiness{

		private $dataTrabajoComunal=null;

		public function TrabajoComunalBusiness(){
			$this->dataTrabajoComunal= new DataTrabajoComunal();
		}

		public function insertarTrabajoComunal($trabajoComunal){
			return $this->dataTrabajoComunal->insertarTrabajoComunal($trabajoComunal);
		}

		public function mostrarTodosTrabajosComunal(){
			return $this->dataTrabajoComunal->mostrarTodosTrabajosComunal();
		}

		public function actualizarTrabajoComunal($trabajoComunal){
			return $this->dataTrabajoComunal->actualizarTrabajoComunal($trabajoComunal);
		}

		public function eliminarTrabajoComunal($idTrabajoComunal){
			return $this->dataTrabajoComunal->eliminarTrabajoComunal($idTrabajoComunal);
		}
	}

  ?>

