<!DOCTYPE html>

<?php
    include '../business/servicioHabitacionBusisnes.php';

    $servicioHabitacionBusisnes= new ServicioHabitacionBusisnes();

    $listasitios=$servicioHabitacionBusisnes->mostrarSitios();

     if(empty($listasitios)){
            echo "<h3>No se pueden crear servicios de habitacion porque no hay sitios turisticos ingresados en el sistema</h3>";
          ?>
          <br><a href="../view/sitioturisticoview.php">Crear Sitio Turistico</a>
          <?php  
          }else{
?>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
        <script src="../js/jquery-3.2.1.js"></script>
        <script src="../js/jsDinero.js"></script>
        <script src="../js/jsSitioTuristico.js"></script>
        

    </head>
    <body>
        <h1>Registrar Habitacion</h1>
        <form id="formulario" method="post" action="javascript:Guardar4();" enctype="multipart/form-data">
                Estilo de cama:
                    <select name="estiloCama" id="estiloCama">
                        <option value="individual">INDIVIDUAL</option>
                        <option value="matrimonial">MATRIMONIAL</option>
                        <option value="camarote">CAMAROTE</option>

                    </select>
                <br>
                  <br>
                  Numero de camas:
                  <input type="number" id="cantidadcamas" name="cantidadcamas">
                <br>
                  <br>
                Internet:
                    <select name="internet" id="internet">
                        <option value="0">NO DISPONIBLE</option>
                        <option value="1">DISPONIBLE</option>

                    </select>
                <br>
                  <br>
               Aire Acondicionado:
                    <select name="aireAcondicionado" id="aireAcondicionado">
                        <option value="0">NO DISPONIBLE</option>
                        <option value="1">DISPONIBLE</option>

                    </select>
                    <br>
                  <br>
                    Ventilador:
                         <select name="ventilador" id="ventilador">
                             <option value="0">NO DISPONIBLE</option>
                             <option value="1">DISPONIBLE</option>
                           </select>
                <br>
                  <br>
                Cable:
                    <select name="cable" id="cable">
                      <option value="0">NO DISPONIBLE</option>
                      <option value="1">DISPONIBLE</option>
                    </select>
                <br>
                  <br>

                Baños:
                    <input type="radio" name="banos" id="banos" value="Dentro Habitacion">Dentro Habitacion
                    <input type="radio" name="banos" value="Compartido"> Compartido

                <br>
                <br>
                Vista:
                <br>
                <textarea  name="vista"  id="vista" cols="30" rows="5" placeholder="Describa la vista que tiene la habitacion"></textarea>
                <br>
                <br>
                Numero maxino de personas:
                <input type="number" name="cantidadpersonas" id="cantidadpersonas">
                <br>
                <br>
                Numero de cuartos disponibles
                <input type="number" name="cantidadCuartos" id="cantidadCuartos">
                <br>
                <br>
                Precio Habitacion: <br>
                    <input type="text" name="precio" id="precio" onkeyup="format(this)"><br><br>
                Accesibilidad:
                <select name="acceso">
                    <option value="0">SI</option>
                    <option value="1">NO</option>
                </select>
                <br>
                <br>
                Sitio:
                <?php
                echo '
                <select id="idEncargado" name="idEncargado">';


               			 foreach ($listasitios as $sitioTuristico){

               			 echo '<option value="'.$sitioTuristico->getIdSitio().'">'.$sitioTuristico->getNombreComercial().'</option>;';

               				}


                echo ' </select><br><br>';
               ?>
                 <input type="file" multiple="true" id="archivos" name="archivos" />
                    <br>
                    <br>
                    <br>
                 <input type="submit" id="enviarFormulario" name="enviarFormulario" value="Guardar">

        </form>
        <h2>Habitaciones</h2>
         <table border="1">
                <tr>
                    <th>Estilo Cama</th>
                    <th>Cantidad camas</th>
                    <th>Cable</th>
                    <th>Internet</th>
                    <th>Aire</th>
                    <th>Ventilador</th>
                    <th>Baños</th>
                    <th>Vista</th>
                    <th>Cantidad personas</th>
                    <th>Cantidad Cuartos</th>
                    <th>Accesibilidad</th>
                    <th>Precio Habitacion</th>
                    <th>Sitio</th>
                    <th>Actulizar</th>
                    <th>Eliminar</th>
                </tr>

                <?php
                    $servicioHabitacionBusiness = new ServicioHabitacionBusisnes();
                    $todosHabitaciones= $servicioHabitacionBusiness->mostrarServicioHabitacion();
                    $sitios=$servicioHabitacionBusisnes->mostrarSitios();

                    foreach ($todosHabitaciones as $servicioHabitacion) {
                        echo '<form method="post" enctype="multipart/form-data" action="../business/servicioHabitacionAction.php">';
                        echo '<input type="hidden" name="idhabitacion" id="idhabitacion" value="' . $servicioHabitacion->getIdHabitacion().'">';
                        echo '<tr>';

                        switch ($servicioHabitacion->getCamaHabitacion()) {

                            case 'individual':
                                echo '<td><select name="estiloCama" id="estiloCama">
                                        <option selected value="individual">INDIVIDUAL</option>
                                        <option value="matrimonial">MATRIMONIAL</option>
                                        <option value="camarote">CAMAROTE</option>
                                       </select>
                                </td>';
                            break;

                            case 'matrimonial':
                                echo '<td><select name="estiloCama" id="estiloCama">
                                <option value="individual">INDIVIDUAL</option>
                                <option selected  value="matrimonial">MATRIMONIAL</option>
                                <option value="camarote">CAMAROTE</option>

                                       </select>
                                </td>';
                            break;

                            case 'camarote':
                                echo '<td><select name="estiloCama" id="estiloCama">
                                <option value="individual">INDIVIDUAL</option>
                                <option  value="matrimonial">MATRIMONIAL</option>
                                <option  selected  value="camarote">CAMAROTE</option>
                                       </select>
                                </td>';
                            break;



                            default:
                                # code...
                                break;
                        }


                         echo '<td><input type="number" name="cantidadcamas" value="'.$servicioHabitacion->getCantidadCamasHabitacion().'"/></td>';

                        if($servicioHabitacion->getInternetHabitacion()==0){
                            echo '<td><select name="cable" id="cable">
                                         <option selected value="0">NO DISPONIBLE</option>
                                           <option  value="1">DISPONIBLE</option>

                                       </select>
                            </td>';
                        }else {
                            echo '<td><select name="cable" id="cable">
                                         <option value="0">NO DISPONIBLE</option>
                                          <option selected  value="1">DISPONIBLE</option>

                                       </select>
                            </td>';
                        }



                          if ($servicioHabitacion->getInternetHabitacion()==0) {
                            echo '<td><select name="internet" id="internet">
                                <option selected value="0">NO DISPONIBLE</option>
                                  <option value="1">DISPONIBLE</option>
                            </select>
                            </td>';
                          } else {
                            echo '<td><select name="internet" id="internet">
                                <option value="0">NO DISPONIBLE</option>
                                  <option selected value="1">DISPONIBLE</option>
                            </select>
                            </td>';
                          }

                        

                        if ($servicioHabitacion->getAireAcondicionadoHabitacion()==0) {
                                                      echo '<td><select name="aireAcondicionado" id="aireAcondicionado">
                                                          <option selected value="0">NO DISPONIBLE</option>
                                                            <option value="1">DISPONIBLE</option>
                                                      </select>
                                                      </td>';
                                                    } else {
                                                      echo '<td><select name="aireAcondicionado" id="aireAcondicionado">
                                                          <option value="0">NO DISPONIBLE</option>
                                                            <option selected value="1">DISPONIBLE</option>
                                                      </select>
                                                      </td>';
                                                    }




                        switch ($servicioHabitacion->getVentiladorHabitacion()) {

                            case '0':
                                 echo '<td><select name="ventilador" id="ventilador">
                                     <option selected value="0">NO DISPONIBLE</option>
                                     <option value="1">DISPONIBLE</option>
                                    </select>
                                </td>';
                            break;

                            case '1':
                                 echo '<td><select name="ventilador" id="ventilador">
                                     <option value="0">NO DISPONIBLE</option>
                                     <option selected value="1">DISPONIBLE</option>
                                    </select>
                                </td>';
                            break;

                            default:
                                # code...
                                break;
                        }

                        


                        switch ($servicioHabitacion->getBanosHabitacion()) {

                            case "Dentro Habitacion":
                                 echo '<td><select name="banos" id="banos">
                                     <option selected value="Dentro Habitacion">Dentro Habitacion</option>
                                     <option value="Compartido">Compartido</option>
                                    </select>
                                </td>';
                            break;

                            case "Compartido":
                                 echo '<td><select name="banos" id="banos">
                                     <option value="Dentro Habitacion">Dentro Habitacion</option>
                                     <option selected value="Compartido">Compartido</option>
                                    </select>
                                </td>';
                            break;

                            default:
                                # code...
                                break;
                        }



                      echo '<td>  <textarea type="text" name="vista" placeholder="Describa la vista que tiene la habitacion">'.$servicioHabitacion->getVistaHabitacion().'</textarea></td>';

                     echo '<td><input type="number" name="cantidadpersonas" value="'.$servicioHabitacion->getCantidadPersonasHabitacion().'"/></td>';

                     echo '<td><input type="number" name="cantidadCuartos" value="'.$servicioHabitacion->getCantidadCuartosHabitacion().'"/></td>';



                     switch ($servicioHabitacion->getAccesibilidadHabitacion()) {

                         case '0':
                              echo '<td><select name="acceso" id="acceso">
                                  <option selected value="0">NO</option>
                                  <option value="1">SI</option>
                                 </select>
                             </td>';
                         break;

                         case '1':
                              echo '<td><select name="acceso" id="acceso">
                                  <option value="0">NO</option>
                                  <option selected value="1">SI</option>
                                 </select>
                             </td>';
                         break;

                         default:
                             # code...
                             break;

                     }

                     echo '<td><input type="text" name="precio" id="precio" onkeyup="format(this)" value= "'."₡".number_format($servicioHabitacion->getPrecioServicioHabitacion(),0,'.',"").'"/></td>';
                     echo '<td>
                     <select id="idEncargado" name="idEncargado">';


                           foreach ($sitios as $sitioTuristico){

                           echo '<option value="'.$sitioTuristico->getIdSitio().'">'.$sitioTuristico->getNombreComercial().'</option>';

                            }


                     echo ' </select><br><br></td>';

                        echo '<td><input type="submit" value="Actualizar" name="update" id="update"/></td>';
                        echo '<td><input type="submit" value="Eliminar" name="delete" id="delete"/></td>';

                        echo '</tr>';
                        echo '</form>';
                    }
                ?>
        </table>



         <?php
                   
               if (isset($_GET['error']))
                {
                          if ($_GET['error'] == "dbError") 
                          {
                              echo '<script language="javascript">alert("Error al procesar la transacción");</script>';
                          }
                          else if($_GET['error'] == "emptyField")
                          {
                             echo '<script language="javascript">alert("Error al procesar la transacción hay campos vacios");</script>'; 
                          
                          }
                          else if($_GET['error'] == "error")
                          {
                              echo '<script language="javascript">alert("Error: Error al procesar la transacción No se ingresaron datos");</script>'; 
                          }
                      }
                      else if (isset($_GET['success'])) 
                      {
                          echo '<script language="javascript">alert("Transacción Realizada");</script>'; 
                      }
        ?>





    </body>

    <?php  
  }
?>
</html>
