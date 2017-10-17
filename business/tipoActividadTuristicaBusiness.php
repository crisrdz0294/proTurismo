<?php

	include '../data/tipoActividadTuristicaData.php';

	class TipoActividadTuristicaBusiness
	{

		private $tipoActividadTuristicaData=null;



		public function TipoActividadTuristicaBusiness()
		{
			$this->tipoActividadTuristicaData = new TipoActividadTuristicaData();
		}


		public function insertarTipoActividadTuristica($tipoActividadTuristica){
			return $this->tipoActividadTuristicaData->insertarTipoActividadTuristica($tipoActividadTuristica);
		}

		public function mostrarTodasTipoActividadTuristica()
		{
			return $this->tipoActividadTuristicaData->mostrarTodasTipoActividadTuristica();
		}

		public function actualizarTipoActividadTuristica($tipoActividadTuristica){
			return $this->tipoActividadTuristicaData->actualizarTipoActividadTuristica($tipoActividadTuristica);
		}

	}
  ?>