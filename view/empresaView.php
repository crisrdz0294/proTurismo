<!DOCTYPE html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Turismo Rural</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <?php

        include '../business/sitioTuristicoBusiness.php';
        $sitioBusiness=new SitioTuristicoBusiness();
        $listaSitios=$sitioBusiness->mostrarTodosSitiosTuristicos();
     ?>

</head

<body>

  <h1>Registrar Empresa</h1>
  <br>
<form id="form" method="post" action="../business/empresaAction.php">
 Encargado de la empresa:
 <select name="idEncargado" id="idEncargado" >
   <?php
   /*
       $empresaBusiness = new empresaBusiness();
       $empresa= $empresaBusiness->mostrarTodosTiposActividades();

       foreach($todasEncargadoEmpresas as $empresa){
    echo '<option value="empresa.getIdEmpresa()">empresa.getNombreEmpresa()</option>';
       }
*/?>
</select><br>
<br>
  Nombre de la empresa:
  <input type="text" id="nombreEmpresa" name="nombreEmpresa" required /><br>
<br>
  Telefono:
  <input type="text" id="telefonoEmpresa" name="telefonoEmpresa" required /><br>
  <br>
  Email:
    <input type="email" id="emailEmpresa" name="emailEmpresa" required /><br>
    <br>
  Pagina Web:
    <input type="text" id="paginaEmpresa" name="paginaEmpresa"  /><br>
    <br>
Sitio Turistico:<br>
    <select id="sitioturistico" name="sitioturistico">

        <?php
          foreach ($listaSitios as $sitio){
        ?>
          <option value="<?php echo $sitio->getIdSitio();?>"><?php echo $sitio->getNombreComercial();?></option>;
        <?php
           }
        ?>

     </select><br><br>
   <br>

   <input type="submit" value="Guardar" name="guardarEmpresa" id="guardarEmpresa"/><br><br>
</form>
<?php
      include '../business/empresaBusiness.php';
?>

</body>
