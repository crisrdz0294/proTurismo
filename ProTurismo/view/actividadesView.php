<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Turismo Rural</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <?php 
         include '../business/tipoActividadBusiness.php';
     ?>

</head>

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
                       </select> 
                        <br>
                        <br>
                        <br>
                        
                    
                    <input type="submit" value="Guardar" name="guardarActividad" id="guardarActividad"/><br><br>
    </form>
    
    <h2>Actividades</h2>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Estado</th>
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
                echo '<td><input type="submit" value="Actualizar" name="update"/></td>';
                echo '<td><input type="submit" value="Eliminar" name="delete" /></td>';
             
                echo '</tr>';
                echo '</form>';
            }
          ?>
    </table>

    <footer>
    </footer>

</body>
</html>
