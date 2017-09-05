<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Turismo Rural</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <?php 
         include '../business/tipoActividadBusiness.php';
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
        <form id="form" method="post" action="../business/tipoActividadAction.php">
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
                          Caminar <input type="checkbox" name="habilidades[]" value="caminar" /><br>
                          Limpiar <input type="checkbox" name="habilidades[]" value="limpiar" /><br> 
                          Pintar <input type="checkbox" name="habilidades[]" value="pintar" /><br> 
                          Cocinar <input type="checkbox" name="habilidades[]" value="cocinar" /><br>
                          <div id="posicion2Radios">
                            Jugar <input type="checkbox" name="habilidades[]" value="jugar" /><br> 
                            Construir <input type="checkbox" name="habilidades[]" value="construir" /><br> 
                            Artesanales<input type="checkbox" name="habilidades[]" value="artesanales" /><br>
                            Buena memoria<input type="checkbox" name="habilidades[]" value="buena memoria" />
                          </div><br>
                      

                    Horario de la actividad:<br>
                    <textarea required  name="horarioactividad" id="horarioactividad" placeholder="Describa el horario de la actividad"></textarea><br><br>
    
                   
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
            <th>Opcion1</th>
            <th>Opcion2</th>
        </tr>

        <?php
            $tipoActividadBusiness = new TipoActividadBusiness();
            $todosTiposActividades= $tipoActividadBusiness->mostrarTodosTiposActividades();

            foreach($todosTiposActividades as $tipoActividad){
           
                echo '<form method="post" enctype="multipart/form-data" action="../business/tipoActividadAction.php">';
                echo '<input type="hidden" name="idTipoActividad" id="idTipoActividad" value="' . $tipoActividad->getIdtipoactividadturistica().'">';
                echo '<tr>';
                echo '<td><input type="text" name="nombreActividad" id="nombreActividad" value="' . $tipoActividad->getNombreTipoActividadTuristica() . '"/></td>';
                echo '<td><input type="text" name="descripcionActividad" id="descripcionActividad" value="' . $tipoActividad->getDescripciontipoactividadturistica() . '"/></td>';
                if($tipoActividad->getEstadoactividadturistica()==1){
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

                echo '<td><input type="number" name="cantidadpersonas" id="cantidadpersonas" value="' . $tipoActividad->getCantidadPersonasActividadTuristica() . '"/></td>';
                echo '<td><input type="text" name="lugaractividad" id="lugaractividad" value="' . $tipoActividad->getLugarActividadTuristica() . '"/></td>';
                echo '<td><input type="text" name="distanciahospedaje" id="distanciahospedaje" value="' . $tipoActividad->getDistanciaHospedajeActividadTuristica() . '"/></td>';
                echo '<td><textarea name="habilidades" id="habilidades" >'. $tipoActividad->getHabilidadesActividadTuristica().'</textarea></td>';
                echo '<td><textarea name="horarioactividad" id="horarioactividad" >'. $tipoActividad->getHorarioActividadTuristica().'</textarea></td>';

                echo '<td><input type="submit" value="Actualizar" name="update"/></td>';
                echo '<td><input type="submit" value="Eliminar" name="delete" /></td>';
             
                echo '</tr>';
                echo '</form>';
            }
          ?>
    </table>

    </div>
   

    <footer>
    </footer>

</body>
</html>
