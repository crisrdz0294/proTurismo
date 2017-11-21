<?php
	include './sitioTuristicoBusiness.php';
	echo "[;ayp";
	if(isset($_POST['guardarSitio'])){

		if(isset($_POST['nombrecomercial']) && isset($_POST['telefono']) && isset($_POST['provincia']) && isset($_POST['canton']) && isset($_POST['distrito']) && isset($_POST['direccion']) && isset($_POST['direccion'])){

			$nombrecomercial=$_POST['nombrecomercial'];

			$telefonoTemp=substr( $_POST['telefono'],6);

			$telefonoA = explode("-",$telefonoTemp);
			$telefono=$telefonoA[0].$telefonoA[1];

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

				$result=$sitioTuristicoBusiness->insertarSitioTuristico($sitioTuristico,$_FILES);

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
			$telefonoTemp=substr( $_POST['telefono'],6);
			$telefonoA = explode("-",$telefonoTemp);
			$telefono=$telefonoA[0].$telefonoA[1];
			$direccion=$_POST['direccion'];
			$id=$_POST['idsitio'];
			$sitioweb=$_POST['sitioweb'];

			if(strlen($nombrecomercial)>0 && strlen($telefono)>0 && strlen($direccion)>0){

				$sitioTuristico = new SitioTuristico($id,$nombrecomercial,$telefono,0,
					0,0,$direccion,$sitioweb);

				$sitioTuristicoBusiness= new SitioTuristicoBusiness();

				$result=$sitioTuristicoBusiness->actualizarSitioTuristico($sitioTuristico);

				if($result==0){
					header("location: ../view/sitioturisticoview.php?success=update");
				}else if($result==1){
					header("location: ../view/sitioturisticoview.php?error=agregadoFamilia");
				}else if($result==2){
					header("location: ../view/sitioturisticoview.php?error=agregadoMicroEmpresa");
				}else if($result==3){
					header("location: ../view/sitioturisticoview.php?error=agregadoHospedaje");
				}else if($result==4){
					header("location: ../view/sitioturisticoview.php?error=agregadoTransporte");
				}else if($result==5){
					header("location: ../view/sitioturisticoview.php?error=agregadoAlimentacion");
				}else if($result==6){
					header("location: ../view/sitioturisticoview.php?error=agregadoTrabajoComunal");
				}else{
					header("location: ../view/sitioturisticoview.php?error=agregadoActividad");
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

			if($result==0){
				header("location: ../view/sitioturisticoview.php?success=delete");
			}else if($result==1){
				header("location: ../view/sitioturisticoview.php?error=agregadoFamilia");
			}else if($result==2){
				header("location: ../view/sitioturisticoview.php?error=agregadoMicroEmpresa");
			}else if($result==3){
				header("location: ../view/sitioturisticoview.php?error=agregadoHospedaje");
			}else if($result==4){
				header("location: ../view/sitioturisticoview.php?error=agregadoTransporte");
			}else if($result==5){
				header("location: ../view/sitioturisticoview.php?error=agregadoAlimentacion");
			}else if($result==6){
				header("location: ../view/sitioturisticoview.php?error=agregadoTrabajoComunal");
			}else{
				header("location: ../view/sitioturisticoview.php?error=agregadoActividad");
			}

		}else{
			header("location: ../view/sitioturisticoview.php?error=error");
		}

	}
?>
