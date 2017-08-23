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
                        <option value="doble">DOBLE</option>
                        <option value="deluxe">DELUXE</option>
                        <option value="queen">QUEEN</option>
                    </select> 
                <br>
                Internet:
                    <select name="internet">
                        <option value="no disponible">NO DISPONIBLE</option>
                        <option value="1mb">1MB</option>
                        <option value="2mb">2MB</option>
                        <option value="4mb-8mb">4MB-8mb</option>
                        <option value="10mb+">10MB+</option>
                    </select> 
                <br>
               Aire Acondicionado: 
                    <select name="aireAcondicionado">
                        <option value="0">NO DISPONIBLE</option>
                        <option value="1">DISPONIBLE</option>
           
                    </select> 
          
                <br>
                Cable:
                    <select name="cable">
                        <option value="no disponible">NO DISPONIBLE</option>
                        <option value="+50 canales">+50 CANALES</option>
                        <option value="+100 canales">+100 CANALES</option>
                        <option value="+150 canales">+150 CANALES</option>
                        <option value="+200 canales">+200 CANALES</option>
                    </select> 
                <br>
              
                Servicio al cuarto:
                    <select name="servicio">
                        <option value="0">NO DISPONIBLE</option>
                        <option value="1">DISPONIBLE</option>
                    </select
              
                <br>
              
                 <input type="submit" id="enviarFormulario" name="enviarFormulario" value="ENVIAR">

        </form>
        <h2>Habitaciones</h2>
         <table border="1">
                <tr>
                    
                    <th>Cama</th>
                    <th>Cable</th>
                    <th>Internet</th>
                    <th>Aire</th>
                    <th>Servicio</th>
                    <th>Opcion 1</th>
                    <th>Opcion 2</th>
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
                                        <option value="doble">DOBLE</option>
                                        <option value="deluxe">DELUXE</option>
                                        <option value="queen">QUEEN</option>

                                       </select> 
                                </td>';
                            break;

                            case 'doble':
                                echo '<td><select name="estiloCama" id="estiloCama">
                                        <option value="individual">INDIVIDUAL</option>
                                        <option selected value="doble">DOBLE</option>
                                        <option value="deluxe">DELUXE</option>
                                        <option value="queen">QUEEN</option>

                                       </select> 
                                </td>';
                            break;

                            case 'deluxe':
                                echo '<td><select name="estiloCama" id="estiloCama">
                                        <option value="individual">INDIVIDUAL</option>
                                        <option value="doble">DOBLE</option>
                                        <option selected value="deluxe">DELUXE</option>
                                        <option value="queen">QUEEN</option>

                                       </select> 
                                </td>';
                            break;

                            case 'queen':
                                echo '<td><select name="estiloCama" id="estiloCama">
                                        <option value="individual">INDIVIDUAL</option>
                                        <option value="doble">DOBLE</option>
                                        <option value="deluxe">DELUXE</option>
                                        <option selected value="queen">QUEEN</option>

                                       </select> 
                                </td>';
                            break;
                            
                            default:
                                # code...
                                break;
                        }

                        

                        
                        if(trim($tuRoom->getCableHabitacion())==trim("no disponible")){
                            echo '<td><select name="cable" id="cable">
                                         <option selected value="no disponible">NO DISPONIBLE</option>
                                        <option value="+50 canales">+50 CANALES</option>
                                        <option value="+100 canales">+100 CANALES</option>
                                        <option value="+150 canales">+150 CANALES</option>
                                        <option value="+200 canales">+200 CANALES</option>

                                       </select> 
                            </td>';
                        }else if (trim($tuRoom->getCableHabitacion())==trim("+50 canales")) {
                            echo '<td><select name="cable" id="cable">
                                         <option value="no disponible">NO DISPONIBLE</option>
                                        <option selected value="+50 canales">+50 CANALES</option>
                                        <option value="+100 canales">+100 CANALES</option>
                                        <option value="+150 canales">+150 CANALES</option>
                                        <option value="+200 canales">+200 CANALES</option>

                                       </select> 
                            </td>';
                        }else if (trim($tuRoom->getCableHabitacion())==trim("+100 canales")) {
                             echo '<td><select name="cable" id="cable">
                                         <option value="no disponible">NO DISPONIBLE</option>
                                        <option value="+50 canales">+50 CANALES</option>
                                        <option selected value="+100 canales">+100 CANALES</option>
                                        <option value="+150 canales">+150 CANALES</option>
                                        <option value="+200 canales">+200 CANALES</option>

                                       </select> 
                            </td>';
                        }else if (trim($tuRoom->getCableHabitacion())==trim("+150 canales")) {
                            echo '<td><select name="cable" id="cable">
                                         <option value="no disponible">NO DISPONIBLE</option>
                                        <option value="+50 canales">+50 CANALES</option>
                                        <option value="+100 canales">+100 CANALES</option>
                                        <option selected value="+150 canales">+150 CANALES</option>
                                        <option value="+200 canales">+200 CANALES</option>

                                       </select> 
                            </td>';
                        }else if (trim($tuRoom->getCableHabitacion())==trim("+200 canales")) {
                            echo '<td><select name="cable" id="cable">
                                         <option value="no disponible">NO DISPONIBLE</option>
                                        <option value="+50 canales">+50 CANALES</option>
                                        <option value="+100 canales">+100 CANALES</option>
                                        <option value="+150 canales">+150 CANALES</option>
                                        <option selected value="+200 canales">+200 CANALES</option>

                                       </select> 
                            </td>';
                        }
                       
                          switch ($tuRoom->getInternetHabitacion()){
                             case 'no disponible':
                                echo '<td><select name="internet" id="internet">                                   
                                    <option selected value="no disponible">NO DISPONIBLE</option>
                                    <option value="1mb">1MB</option>
                                    <option value="2mb">2MB</option>
                                    <option value="4mb-8mb">4MB-8mb</option>
                                    <option value="10mb+">10MB+</option>
                                </select> 
                                </td>';
                                break;
                            case '1mb':
                                echo '<td><select name="internet" id="internet">                                   
                                    <option value="no disponible">NO DISPONIBLE</option>
                                    <option selected value="1mb">1MB</option>
                                    <option value="2mb">2MB</option>
                                    <option value="4mb-8mb">4MB-8mb</option>
                                    <option value="10mb+">10MB+</option>
                                    </select> 
                                </td>';

                                break;

                            case '2mb':
                                echo '<td><select name="internet" id="internet">                                   
                                    <option value="no disponible">NO DISPONIBLE</option>
                                    <option value="1mb">1MB</option>
                                    <option selected value="2mb">2MB</option>
                                    <option value="4mb-8mb">4MB-8mb</option>
                                    <option value="10mb+">10MB+</option>
                                    </select> 
                                </td>';

                                break;
                            case '4mb-8mb':
                                echo '<td><select name="internet" id="internet">                                   
                                    <option value="no disponible">NO DISPONIBLE</option>
                                    <option value="1mb">1MB</option>
                                    <option value="2mb">2MB</option>
                                    <option selected value="4mb-8mb">4MB-8mb</option>
                                    <option value="10mb+">10MB+</option>
                                    </select> 
                                </td>';

                                break;
                            case '10mb+':
                                echo '<td><select name="internet" id="internet">                                   
                                    <option value="no disponible">NO DISPONIBLE</option>
                                    <option value="1mb">1MB</option>
                                    <option value="2mb">2MB</option>
                                    <option value="4mb-8mb">4MB-8mb</option>
                                    <option selected value="10mb+">10MB+</option>
                                    </select> 
                                </td>';

                                break;
                            default:
                                # code...
                                break;
                          } 
                           
                        
                      
                        switch ($tuRoom->getAireAcondicionadoHabitacion()) {
 
                            case '0':
                                 echo '<td><select name="aireAcondicionado" id="aireAcondicionado">                                   
                                     <option value="0">NO DISPONIBLE</option>
                                     <option value="1">DISPONIBLE</option>
                                    </select> 
                                </td>';
                            break;

                            case '1':
                                 echo '<td><select name="aireAcondicionado" id="aireAcondicionado">                                   
                                     <option value="0">NO DISPONIBLE</option>
                                     <option selected value="1">DISPONIBLE</option>
                                    </select> 
                                </td>';
                            break;

                            default:
                                # code...
                                break;
                        }

                        switch ($tuRoom->getServicioHabitacion()) {
                            case '0':
                                 echo '<td><select name="servicio" id="servicio">                                   
                                     <option selected value="0">NO DISPONIBLE</option>
                                     <option value="1">DISPONIBLE</option>
                                    </select> 
                                </td>';
                            break;

                            case '1':
                                 echo '<td><select name="servicio" id="servicio">                                   
                                     <option value="0">NO DISPONIBLE</option>
                                     <option selected value="1">DISPONIBLE</option>
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
