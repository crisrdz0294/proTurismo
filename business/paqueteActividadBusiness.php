
<?php
	
	include_once '../data/dataActividad.php';
	include_once '../data/dataPaqueteActividad.php';
	
	class PaqueteActividadBusiness{

		private $dataPaqueteActividad=null;
		private $dataActividad=null;

		public function PaqueteActividadBusiness(){
			$this->dataActividad = new DataActividad();
			$this->dataPaqueteActividad = new DataPaqueteActividad();
		}

		public function obtenerActividadesAgregadas(){

			$listaActividades= $this->dataActividad->mostrarTodasActividades();
			$listaIdActividades=$this->dataPaqueteActividad->obtenerIdActividadesPaquete();
			$idPaquete=$_POST['idpaquete'];
			$agregados=array();
			$agregado=false;
			$respuestaFinal = array();

			for($i=0;$i<count($listaActividades);$i++){

				for($j=0;$j<count($listaIdActividades);$j++){
					$temporalActividadAgregada=$listaIdActividades[$j];

					if($listaActividades[$i]->getIdActividad()==$temporalActividadAgregada['idactividad']&&$temporalActividadAgregada['idpaquete']==$idPaquete){

						array_push($agregados,$listaActividades[$i]);
						$j=count($listaIdActividades);
					}
				}
			}

		for($i=0;$i<count($listaActividades);$i++){
				
				for($j=0;$j<count($agregados);$j++){

					if($listaActividades[$i]->getIdActividad()==$agregados[$j]->getIdActividad()){
						$agregado=true;	
					}
				}

				if($agregado==false){
					$valores=array("idactividad"=>$listaActividades[$i]->getIdActividad(),"nombreactividad"=>$listaActividades[$i]->getNombreActividad(),"descripcionactividad"=>$listaActividades[$i]->getDescripcionActividad(),"precioactividad"=>$listaActividades[$i]->getPrecioActividad(),"estadoagregada"=>0);
            		
				}else{
					$valores=array("idactividad"=>$listaActividades[$i]->getIdActividad(),"nombreactividad"=>$listaActividades[$i]->getNombreActividad(),"descripcionactividad"=>$listaActividades[$i]->getDescripcionActividad(),"precioactividad"=>$listaActividades[$i]->getPrecioActividad(),"estadoagregada"=>1);
					$agregado=false;	
				}
				
				array_push($respuestaFinal, $valores);
			}

		

		
		echo "".json_encode($respuestaFinal).""; 

		}

			

	}
?>

<?php

	$op = $_POST['opcion'];
	$paqueteBusiness = new PaqueteActividadBusiness;
	if($op == 1){
	 	$paqueteBusiness->obtenerActividadesAgregadas();
	}
	
?>