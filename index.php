<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Turismo Rural</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <script src="js/jquery-3.2.1.js"></script>
    <script src="js/sesiones.js"></script>
  <style>
	.centrar
	{
		position: absolute;
		/*nos posicionamos en el centro del navegador*/
		top:50%;
		left:50%;
		/*determinamos una anchura*/
		width:400px;
		/*indicamos que el margen izquierdo, es la mitad de la anchura*/
		margin-left:-200px;
		/*determinamos una altura*/
		height:300px;
		/*indicamos que el margen superior, es la mitad de la altura*/
		margin-top:-150px;
		border:1px solid #808080;
		padding:5px;
	}
	</style>
</head>

<body>

<div class="centrar">
  <h1> Bienvenido </h1>
<form id="form1" name="form1" >

Usuario: <input type="email" id="emailLogin" >
<br>
<br>
Contraseña: <input type="password" id="passwordLogin">

<br>
<br>

<input type="button" id="logear" name="logear" value="ingresar" onclick="VerificarLogin()">

</form>

</div>

<?php
               if (isset($_GET['error'])) {

                       echo '<script language="javascript">alert('.$error.');</script>';

               }
               ?>


</body>







</html>
