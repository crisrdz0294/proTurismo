<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Turismo Rural</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script src="../js/jquery-3.2.1.js"></script>
    <script src="../js/jsDinero.js"></script>

     <?php

         include '../business/sitioTuristicoBusiness.php';
         include '../data/tipoActividadTuristicaData.php';


         $dataTipoActividad=new TipoActividadTuristicaData();
         $listaTipos=$dataTipoActividad->mostrarTodasTipoActividadTuristica();
         $sitioBusiness=new SitioTuristicoBusiness();
         $listaSitios= $sitioBusiness->mostrarTodosSitiosTuristicos();

         if(empty($listaSitios) || empty($listaTipos)){
            echo "<h3>No se pueden crear actividades porque no hay sitios turisticos ni tipos de actividad ingresados en el sistema</h3>";
          ?>
          <br><a href="menuAdministradorView.php">Volver a Menu</a>
          <?php
          }
          else if(empty($listaSitios))
          {
            echo "<h3>No se pueden crear actividades porque no hay sitios turisticos ingresados en el sistema</h3>";?>
          <br><a href="../view/sitioturisticoview.php">Crear Sitio Turistico</a>
          <?php                      
          } 

          else if(empty($listaTipos))
          {
            echo "<h3>No se pueden crear actividades porque no hay tipos de actividad ingresados en el sistema</h3>";
            ?>
            <br><a href="../view/tipoActividadTuristicaView.php">Crear Tipo Actividad Turistica</a>
            <?php
          } 

          else{

     ?>

</head>

<style type="text/css">
    #posicion2Radios{

        margin-left: 10%;
        margin-top: -81px;
    }


</style>

<body>

    <header>
        </header>

             <h1>Registrar Actividad</h1>
             <br>
        <form id="form" method="post" action="../business/actividadAction.php">
                    Nombre:
                    <input required type="text" name="nombreActividad" id="nombreActividad"/><br>
                    Descripcion:<br>
                    <textarea required  name="descripcionActividad" id="descripcionActividad" placeholder="Describa la actividad"></textarea><br>
                    Estado:<br>
                     <select name="estadoActividad" id="estadoActividad">
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                       </select><br>
                    Cantidad de personas:<br>
                        <input required type="number" name="cantidadpersonas" id="cantidadpersonas"/><br>

                    Lugar de la actividad:<br>
                        <textarea required  name="lugaractividad" id="lugaractividad" placeholder="Escriba el lugar de la actividad"></textarea><br>
                    Distancia del lugar de hospedaje:<br>
                    <input required type="text" name="distanciahospedaje" id="distanciahospedaje"/><br>
                    Habilidades requeridas:<br>
                          Ninguna <input type="checkbox" name="habilidades[]" id="ninguna"  onclick="Functioncheck()"  value="ninguna" /><br>
                          Caminar <input type="checkbox" name="habilidades[]" id="caminar" value="caminar" /><br>
                          Limpiar <input type="checkbox" name="habilidades[]" id="limpiar" value="limpiar" /><br>
                          Pintar <input type="checkbox" name="habilidades[]"  id="pintar" value="pintar" /><br>
                          Cocinar <input type="checkbox" name="habilidades[]" id="cocinar" value="cocinar" /><br>
                          <div id="posicion2Radios">
                            Jugar <input type="checkbox" name="habilidades[]" id="jugar" value="jugar" /><br>
                            Construir <input type="checkbox" name="habilidades[]" id="construir" value="construir" /><br>
                            Artesanales<input type="checkbox" name="habilidades[]"  id="artesanales" value="artesanales" /><br>
                            Buena memoria<input type="checkbox" name="habilidades[]"  id="memoria" value="buena memoria" />
                          </div><br>


                    Horario de la actividad:<br>
                    <textarea required  name="horarioactividad" id="horarioactividad" placeholder="Describa el horario de la actividad"></textarea><br><br>

                    Precio Actividad: <br>
                    <input type="text" name="precio" id="precio" onkeyup="format(this)"><br>

                    Tipo de actividad:<br>

                    <select id="tipoactividad" name="tipoactividad">

                        <?php
                          foreach ($listaTipos as $tipoActividad){
                        ?>
                          <option value="<?php echo $tipoActividad->getIdtipoactividadturistica();?>"><?php echo $tipoActividad->getNombretipoactividadturistica();?></option>;
                        <?php
                           }
                        ?>

                     </select><br><br>

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


                    <input type="submit" value="Guardar" name="guardarActividad" id="guardarActividad"/><br><br>
    </form>


    <div id="posicionTabla">
         <h1>Lista de actividades</h1>


          <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Estado</th>
            <th>Cantidad personas</th>
            <th>Lugar actividad</th>
            <th>Distancia de hospedaje</th>
            <th>Habilidades</th>
            <th>Horario</th>
            <th>Precio Actividad</th>
            <th>Tipo Actividad</th>
            <th>Sitio Turistico</th>
            <th>Opcion1</th>
            <th>Opcion2</th>
        </tr>

        <?php


          include '../business/actividadBusiness.php';
            $actividadBusiness = new ActividadBusiness();
            $todasActividades= $actividadBusiness->mostrarTodasActividades();



            foreach($todasActividades as $actividad){

                echo '<form method="post" enctype="multipart/form-data" action="../business/actividadAction.php">';
                echo '<input type="hidden" name="idActividad" id="idActividad" value="' . $actividad->getIdActividad().'">';
                echo '<tr>';
                echo '<td><input type="text" name="nombreActividad" id="nombreActividad" value="' . $actividad->getNombreActividad() . '"/></td>';
                echo '<td><input type="text" name="descripcionActividad" id="descripcionActividad" value="' . $actividad->getDescripcionActividad() . '"/></td>';
                if($actividad->getEstadoActividad()==1){
                       echo '<td> <select name="estadoActividad" id="estadoActividad">
                         <option selected value="1">Activo</option>
                        <option value="0">Inactivo</option>
                       </select>
                       </td>';
                }else{

                    echo '<td> <select name="estadoActividad" id="estadoActividad">
                         <option value="1">Activo</option>
                        <option selected value="0">Inactivo</option>
                       </select>
                       </td>';

                }

                echo '<td><input type="number" name="cantidadpersonas" id="cantidadpersonas" value="' . $actividad->getCantidadPersonasActividad() . '"/></td>';
                echo '<td><input type="text" name="lugaractividad" id="lugaractividad" value="' . $actividad->getLugarActividad() . '"/></td>';
                echo '<td><input type="text" name="distanciahospedaje" id="distanciahospedaje" value="' . $actividad->getDistanciaHospedajeActividad() . '"/></td>';
                echo '<td><textarea name="habilidades" id="habilidades" >'. $actividad->getHabilidadesActividad().'</textarea></td>';
                echo '<td><textarea name="horarioactividad" id="horarioactividad" >'. $actividad->getHorarioActividad().'</textarea></td>';
                 echo '<td><input type="text" name="precio" id="precio" onkeyup="format(this)" value= "'."₡".number_format($actividad->getPrecioActividad(),0,'.',"").'"/></td>';


                echo '<td><select name="idtipo" id="idtipo"> '?>
                        <?php
                          foreach ($listaTipos as $tipoActividad){
                        ?>
                          <?php
                            if($tipoActividad->getIdtipoactividadturistica()==$actividad->getIdTipoActividadSitio()){  ?>

                               <option selected value="<?php echo $tipoActividad->getIdtipoactividadturistica();?>"><?php echo $tipoActividad->getNombretipoactividadturistica();?></option>;
                              <?php }else{?>

                                <option value="<?php echo $tipoActividad->getIdtipoactividadturistica();?>"><?php echo $tipoActividad->getNombretipoactividadturistica();?></option>;
                              <?php  } ?>


                        <?php
                           }
                        ?>
                <?php

                echo '</select>';
                echo '</td>';

                 echo '<td><select name="idsitio" id="idsitio"> '?>
                        <?php
                          foreach ($listaSitios as $sitio){
                        ?>
                          <?php
                            if($sitio->getIdSitio()==$actividad->getIdSitioActividad()){  ?>

                               <option selected value="<?php echo $sitio->getIdSitio();?>"><?php echo $sitio->getNombreComercial();?></option>;
                              <?php }else{?>

                                 <option value="<?php echo $sitio->getIdSitio();?>"><?php echo $sitio->getNombreComercial();?></option>;
                              <?php  } ?>


                        <?php
                           }
                        ?>
                <?php

                echo '</select>';
                echo '</td>';

                echo '<td><input type="submit" value="Actualizar" name="update"/></td>';
                echo '<td><input type="submit" value="Eliminar" name="delete" /></td>';

                echo '</tr>';
                echo '</form>';

                 }
                 ?>




    </table>

    </div>

     <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "dbError") {
                            echo '<script language="javascript">alert("Error al procesar la transacción");</script>';
                        }else if($_GET['error'] == "AgregadaRequisitos"){
                          echo '<script language="javascript">alert("Error: La actividad esta asociada a unos requisitos");</script>';

                        }else if($_GET['error'] == "agregadaPaquete"){
                          echo '<script language="javascript">alert("Error: La actividad esta asociada a un paquete turistico");</script>';
                        }

                     }else if (isset($_GET['success'])) {
                        echo '<script language="javascript">alert("Transacción Realizada");</script>';
                    }
                    ?>



    <footer>
    </footer>

</body>

<script>
function Functioncheck() 
{
    if(document.getElementById("ninguna").checked)
     {          
          document.getElementById("caminar").disabled = true;
          document.getElementById("limpiar").disabled = true;
          document.getElementById("pintar").disabled = true;
          document.getElementById("cocinar").disabled = true;
          document.getElementById("jugar").disabled = true;
          document.getElementById("construir").disabled = true;
          document.getElementById("artesanales").disabled = true;
          document.getElementById("memoria").disabled = true;

          document.getElementById("caminar").checked = false;
          document.getElementById("limpiar").checked = false;
          document.getElementById("pintar").checked = false;
          document.getElementById("cocinar").checked = false;
          document.getElementById("jugar").checked = false;
          document.getElementById("construir").checked = false;
          document.getElementById("artesanales").checked = false;
          document.getElementById("memoria").checked = false;
     }
     else
     {
          document.getElementById("caminar").disabled = false;
          document.getElementById("limpiar").disabled = false;
          document.getElementById("pintar").disabled = false;
          document.getElementById("cocinar").disabled = false;
          document.getElementById("jugar").disabled = false;
          document.getElementById("construir").disabled = false;
          document.getElementById("artesanales").disabled = false;
          document.getElementById("memoria").disabled = false;

          
     }
}
</script>
<?php
  }
?>
</html>
