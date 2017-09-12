<?php
	class Distrito{

		private $iddistrito;
		private $nombredistrito;
		private $idcantonDistrito;

		function Distrito($iddistrito,$nombre,$idcanton){
			 $this->iddistrito=$iddistrito;
        	 $this->nombredistrito=$nombre;
        	 $this->idcantonDistrito=$idcanton;
		}

		public function getIdDistrito(){
			return $this->iddistrito;
		}

		public function getIdCantonDistrito(){
			return $this->idcantonDistrito;
		}
		public function getNombreDistrito(){
			return $this->nombredistrito;
		}
	}
?>