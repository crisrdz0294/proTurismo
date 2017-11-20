<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script src="../js/jquery-3.2.1.js"></script>
  <script type="text/javascript" src="../js/jsTablas.js"></script>
  <script type="text/javascript" src="../js/jsPaquetesTuristicos.js"></script>
  <script type="text/javascript" src="../js/jsActividades.js"></script>
  <script type="text/javascript" src="../js/jsServicios.js"></script>
  <script type="text/javascript" src="../js/jsModales.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/estilosModal.css">  
</head>
  <?php 
    include '../business/paqueteTuristicoBusiness.php';
    $paqueteTuristicoBusiness = new paqueteTuristicoBusiness(); 
      $todosPaquetes = $paqueteTuristicoBusiness->mostrarTodosPaqueteTuristico();
    ?>
<body>
<input type="hidden" id="idPaqueteTem">
<input type="hidden" id="idActividadTem">
  <h2>Paquetes Turisticos Disponibles</h2>
  <select id="prueba" onchange="cargarTablaPaqueteTuristico()">

    <option selected disabled>Seleccione un paquete</option>
    <?php
          foreach ($todosPaquetes as $paquete){
        ?>
        <option value="<?php echo $paquete->getIdPaqueteTuristico();?>"><?php echo $paquete->getNombrePaqueteTuristico();?></option>;
        <?php 
           } 
        ?>
                      
  </select>&emsp;<button id="myBtn" onclick="modalRegistro()">Ingresar Nuevo</button>

  <div id="contenedorTabla" style="display: none;">
    <br><br>
    <table id="tabla_resultados" border="1">
          <tr>
              <th>Nombre </th>
              <th>Descripcion</th>
              <th>Cantidad Personas</th>
              <th>Itinerario</th>
              <th>Precio Total</th>
              <th>Precio Descuento(10%)</th>
              <th>Opcion 1</th>
              <th>Opcion 2</th>
              <th>Opcion 3</th>
          </tr>
      </table>
  </div><br>

  <div id="contenedorRadios" style="display: none;">
  <h3>Presione una de las opciones de servicios</h3>
    <input type="radio" name="servicios" id="radioAlimentacion" onclick="mostrarServiciosAlimentacion()">Servicio Alimentacion<br>
    <input type="radio" name="servicios" id="radioHospedaje" onclick="mostrarServiciosHospedaje()">Servicio Hospedaje<br>
    <input type="radio" name="servicios" id="radioTransporte" onclick="mostrarServiciosTransporte()" >Servicio Transporte<br>
  </div><br><br>

  
  <div id="contenedorGeneral" style="display: none;">
    <div id="contenedorActividades" style="display: none;">
      <h3>Lista de Actividades</h3>
      <table id="tablaActividades" border="1">
        <tr>
          <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Opcion</th>
            </tr>
        </table>
    </div>
    
  <div id="contenedorAlimentacion" style="display: none;">
    <table border="1" id="tablaAlimentacion">
            <tr>
              <th>Tiempos</th>
              <th>Descripcion</th>
              <th>Precio</th>
              <th>Opcion</th>
          </tr>
      </table>
  </div>
      
  <div id="contenedorhospedaje" style="display: none;">
    <table border="1" id="tablahospedaje">
            <tr>
              <th>Tipo Cama</th>
              <th>Cantidad Camas </th>
              <th>Cantidad Cuartos</th>
              <th>Cantidad Personas</th>
              <th>Precio Hospedaje</th>
              <th>Opcion</th>
          </tr>
      </table>
  </div>
      
  <div id="contenedortransporte" style="display: none;">
    <table border="1" id="tablatransporte">
            <tr>
              <th>Origen</th>
              <th>Destino</th>
              <th>Kilometros</th>
              <th>Precio</th>
              <th>Opcion</th>
          </tr>
        </table>
  </div>
      
  </div>
  <div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content" style="text-align:center;">
    <span class="close">&times;</span>
      <h3>Registrar Paquete Turistico</h3>

  <form method="post" action="../business/paqueteTuristicoBusinessAction.php">

    Nombre <br>
    <input type="text" name="nombre" placeholder="Ingrese el nombre"><br><br>
    Descripcion <br>
    <input type="text" name="descripcion" placeholder="Ingrese la descripcion"><br><br>
    Cantidad Personas <br>
    <input type="number" name="cantidadpersonas" placeholder="Ingrese la cantidad de personas"><br><br>
    Itinerario <br>
    <textarea required name="itinerario" id="itinerario" cols="30" rows="5" placeholder="Describa el itinerario del paquete"></textarea><br><br>

    <input type="submit" name="guardarPaquete" value="Guardar">

  </form>
  </div>

</div>

</body>
</html>