<?php 
	include './sitioTuristicoBusiness.php';	

	if(isset($_POST['guardarSitio'])){

		if(isset($_POST['nombrecomercial']) && isset($_POST['telefono']) && isset($_POST['provincia']) && isset($_POST['canton']) && isset($_POST['distrito']) && isset($_POST['direccion']) && isset($_POST['direccion'])){

			$nombrecomercial=$_POST['nombrecomercial'];
			$telefono=$_POST['telefono'];
			$provincia=$_POST['provincia'];
			$canton=$_POST['canton'];
			$distrito=$_POST['distrito'];
			$direccion=$_POST['direccion'];
			$sitioWeb=$_POST['sitioweb'];

			if(strlen($nombrecomercial)>0 && strlen($telefono)>0  && strlen($provincia)>0 &&
			   strlen($canton)>0 && strlen($distrito)>0 && strlen($direccion)>0 && strlen($sitioWeb)>0){

				$sitioTuristico = new SitioTuristico(0,$nombrecomercial,$telefono,$provincia,
					$canton,$distrito,$direccion,$sitioWeb);


				$sitioTuristicoBusiness= new SitioTuristicoBusiness();

				$result=$sitioTuristicoBusiness->insertarSitioTuristico($sitioTuristico);

				if($result==1){
					header("location: ../view/sitioturisticoview.php?success=inserted");
				}else{
					header("location: ../view/sitioturisticoview.php?error=dbError");
				}

			}else{
				header("location: ../view/sitioturisticoview.php?error=camposvacios");
			}
		}else{
			header("location: ../view/sitioturisticoview.php?error=error");
		}
	}else if(isset($_POST['update'])){

		if(isset($_POST['idsitio'])&&isset($_POST['nombrecomercial']) && isset($_POST['telefono']) &&  isset($_POST['direccion'])&&isset($_POST['sitioweb'])){

			$nombrecomercial=$_POST['nombrecomercial'];
			$telefono=$_POST['telefono'];
			$direccion=$_POST['direccion'];
			$id=$_POST['idsitio'];
			$sitioweb=$_POST['sitioweb'];

			if(strlen($nombrecomercial)>0 && strlen($telefono)>0 && strlen($direccion)>0){

				$sitioTuristico = new SitioTuristico($id,$nombrecomercial,$telefono,0,
					0,0,$direccion,$sitioweb);

				$sitioTuristicoBusiness= new SitioTuristicoBusiness();

				$result=$sitioTuristicoBusiness->actualizarSitioTuristico($sitioTuristico);

				if($result==1){
					header("location: ../view/sitioturisticoview.php?success=update");
				}else{
					header("location: ../view/sitioturisticoview.php?error=dbError");
				}
			}else{
				header("location: ../view/sitioturisticoview.php?error=camposvacios");
			}
		}else{
			header("location: ../view/sitioturisticoview.php?error=error");
		}

	}else if(isset($_POST['delete'])){

		if (isset($_POST['idsitio'])) {

			$id=$_POST['idsitio'];

			$sitioTuristicoBusiness= new SitioTuristicoBusiness();
			
			$result=$sitioTuristicoBusiness->eliminarSitioTuristico($id);

			if ($result==1) {
				header("location: ../view/sitioturisticoview.php?success=delete");
			}else{
				header("location: ../view/sitioturisticoview.php?error=dbError");
			}

		}else{
			header("location: ../view/sitioturisticoview.php?error=error");
		}

	}
?>