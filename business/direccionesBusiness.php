<?php

	include '../data/dataDirecciones.php';

	class DireccionesBusiness{

		private $dataDirecciones=null;
		

		public function DireccionesBusiness(){
			$this->dataDirecciones = new DataDirecciones();
		}

		public function mostrarProvincias(){
			return $this->dataDirecciones->obtenerTodasProvincias();
		}

	}
  ?>