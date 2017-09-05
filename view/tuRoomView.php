<!DOCTYPE html>

<?php
    include '../business/tuRoomBusisnes.php';

?>

    <head>
        <meta charset="UTF-8">
        <title>Manipular</title>

    </head>
    <body>
        <h1>Registrar Habitacion</h1>
        <form id="formulario" method="post" action="../business/tuRoomAction.php">
                Estilo de cama:
                    <select name="estiloCama">
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
                    <select name="internet">
                        <option value="0">NO DISPONIBLE</option>
                        <option value="1">DISPONIBLE</option>

                    </select>
                <br>
                  <br>
               Aire Acondicionado:
                    <select name="aireAcondicionado">
                        <option value="0">NO DISPONIBLE</option>
                        <option value="1">DISPONIBLE</option>

                    </select>
                    <br>
                  <br>
                    Ventilador:
                         <select name="ventilador">
                             <option value="0">NO DISPONIBLE</option>
                             <option value="1">DISPONIBLE</option>
                           </select>
                <br>
                  <br>
                Cable:
                    <select name="cable">
                      <option value="0">NO DISPONIBLE</option>
                      <option value="1">DISPONIBLE</option>
                    </select>
                <br>
                  <br>
                Baños dentro de la habitacion:
                    <select name="banos">
                        <option value="0">SI</option>
                        <option value="1">NO</option>
                    </select>

                <br>
                <br>
                Vista:
                <br>
                <textarea  name="vista" cols="30" rows="5" placeholder="Describa la vista que tiene la habitacion"></textarea>
                <br>
                <br>
                Numero maxino de personas:
                <input type="number" name="cantidadpersonas">
                <br>
                <br>
                Accesibilidad:
                <select name="acceso">
                    <option value="0">SI</option>
                    <option value="1">NO</option>
                </select>
                <br>
                <br>

                 <input type="submit" id="enviarFormulario" name="enviarFormulario" value="ENVIAR">

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
                    <th>Baños dentro</th>
                    <th>Vista</th>
                    <th>Cantidad personas</th>
                    <th>Accesibilidad</th>
                    <th>Actulizar</th>
                    <th>Eliminar</th>
                </tr>

                <?php
                    $tuRoomdBusiness = new TuRoomBusisnes();
                    $todosHabitaciones= $tuRoomdBusiness->mostrarTuRoom();
                    foreach ($todosHabitaciones as $tuRoom) {
                        echo '<form method="post" enctype="multipart/form-data" action="../business/tuRoomAction.php">';
                        echo '<input type="hidden" name="idhabitacion" id="idhabitacion" value="' . $tuRoom->getIdHabitacion().'">';
                        echo '<tr>';

                        switch ($tuRoom->getCamaHabitacion()) {

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


                         echo '<td><input type="number" name="cantidadcamas" value="'.$tuRoom->getCantidadCamasHabitacion().'"/></td>"';

                        if($tuRoom->getInternetHabitacion()==0){
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



                          if ($tuRoom->getInternetHabitacion()==0) {
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

                                                    if ($tuRoom->getAireAcondicionadoHabitacion()==0) {
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




                        switch ($tuRoom->getVentiladorHabitacion()) {

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

                        switch ($tuRoom->getBanosHabitacion()) {

                            case '0':
                                 echo '<td><select name="banos" id="banos">
                                     <option selected value="0">NO DISPONIBLE</option>
                                     <option value="1">DISPONIBLE</option>
                                    </select>
                                </td>';
                            break;

                            case '1':
                                 echo '<td><select name="banos" id="banos">
                                     <option value="0">NO DISPONIBLE</option>
                                     <option selected value="1">DISPONIBLE</option>
                                    </select>
                                </td>';
                            break;

                            default:
                                # code...
                                break;
                        }



                      echo '<td>  <textarea type="text" name="vista" placeholder="Describa la vista que tiene la habitacion">'.$tuRoom->getVistaHabitacion().'</textarea></td>';
                     echo '<td><input type="number" name="cantidadpersonas" value="'.$tuRoom->getCantidadPersonasHabitacion().'"/></td>"';


                     switch ($tuRoom->getAccesibilidadHabitacion()) {

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

                        echo '<td><input type="submit" value="Actualizar" name="update" id="update"/></td>';
                        echo '<td><input type="submit" value="Eliminar" name="delete" id="delete"/></td>';

                        echo '</tr>';
                        echo '</form>';
                    }
                ?>
        </table>
    </body>
</html>
