<!DOCTYPE html>
<html>
<head>
	<title>Menu Principal</title>
  <?php

        session_start();

//Si la variable sesión está vacía
if (!isset($_SESSION['administrador'])&&!isset($_SESSION['identificador'])&&!isset($_SESSION['nombre'])&&!isset($_SESSION['correo']))
{

  header("location: ../index.php");
}
?>
</head>
<body>

	<h1>Menu Principal</h1><br>
	<a href="actividadesView.php">Manipular Actividades</a><br>
	<a href="GUITrabajoComunal.php">Manipular Trabajos Comunales</a><br>
	<a href="servicioTransporteView.php">Manipular Transporte</a><br>
	<a href="servicioHabitacionView.php">Manipular Habitaciones</a><br>
	<a href="servicioAlimentacionView.php">Manipular Alimentacion</a><br>
	<a href="requisitosActividadView.php">Manipular Requisitos</a><br>
	<a href="sitioturisticoview.php">Manipular Sitio Turistico</a><br>
	<a href="FamiliaView.php">Manipular Familia</a><br>
	<a href="responsableView.php">Manipular Responsable</a><br>
	<a href="empresaView.php">Manipular MicroEmpresa</a><br>
	<a href="paqueteTuristicoView.php">Manipular Paquete Turistico</a><br>
	<a href="tipoActividadTuristicaView.php">Manipular Tipo Actividades</a><br>
	<a href="viewRutas.php">Manipular Rutas</a><br>
</body>


</html>
