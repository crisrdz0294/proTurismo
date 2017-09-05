<?php
	class Distrito{

		private $iddistrito;
		private $nombredistrito;

		function Distrito($iddistrito,$nombre){
			 $this->iddistrito=$iddistrito;
        	 $this->nombredistrito=$nombre;
        	 $this->idcanton=$idcanton;
		}

		public function getIdDistrito(){
			return $this->iddistrito;
		}

		public function getNombreDistrito(){
			return $this->nombredistrito;
		}
	}
?>