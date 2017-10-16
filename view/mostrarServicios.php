<!DOCTYPE html>
<html>
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script src="../js/jquery-3.2.1.js"></script>
    
	<?php 
		$idPaquete = $_GET['idpaquete'];
	?>
</head>

<style type="text/css">
	#contenedorServicios{
		margin-left: 20%;
        margin-top: -8.7%;
	}
</style>

<body>
	<br><h3>Lista de servicios</h3>
	<input type="radio" name="servicios" id="radioAlimentacion" onclick="cargarPaginaAlimentacion()">Servicio Alimentacion<br>
	<input type="radio" name="servicios" id="radioHospedaje" onclick="cargarPaginaHospedaje()">Servicio Hospedaje<br>
	<input type="radio" name="servicios" id="radioTransporte" onclick="cargarPaginaTransporte()">Servicio Transporte<br>
	<input type="hidden" id="idRadioSeleccionado">
	<div id="contenedorServicios"></div>

	<script>

            function cargarPaginaAlimentacion()
            {
            	var idPaqueteJs = <?php echo $idPaquete; ?>;
            
             	$("#contenedorServicios").load("../view/agregarServiciosAlimentacion.php",{idpaquete:idPaqueteJs});
            }

            function cargarPaginaHospedaje()
            {     
    			var idPaqueteJs = <?php echo $idPaquete; ?>;
            
             	$("#contenedorServicios").load("../view/agregarServiciosHospedaje.php",{idpaquete:idPaqueteJs});
            }

            function cargarPaginaTransporte()
            {     
                 var idPaqueteJs = <?php echo $idPaquete; ?>;
            
             	$("#contenedorServicios").load("../view/agregarServiciosTransporte.php",{idpaquete:idPaqueteJs});
            }
</script>
</body>
</html>