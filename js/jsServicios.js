function mostrarServiciosTransporte(){

    document.getElementById('contenedorActividades').style.display = 'none';
    document.getElementById('contenedorhospedaje').style.display = 'none';
    document.getElementById('contenedorAlimentacion').style.display = 'none';
    eliminarFilas(document.getElementById("tablatransporte"));    
    document.getElementById('contenedorGeneral').style.display = 'block';
    document.getElementById('contenedortransporte').style.display = 'block';
    var idpaquete=document.getElementById("idPaqueteTem").value;

     var formData = new FormData();
    formData.append("opcion",2);
    formData.append("idpaquete",idpaquete);
    $.ajax({
        url : "../business/mostrarServiciosBusiness.php",
        type : "post",
        dataType : "html",
        async:false,
        data : formData,
        cache : false,
        contentType : false,
        processData : false
        }).done(function(data) {

            var dataJson = eval('(' + data + ')');
            var tamano=dataJson.length;
            for(i=0;i<tamano;i++){
                var nuevafila="";
                if(dataJson[i]['estadoagregada'] ==0){
                  nuevafila= "<tr><td>" +
                   dataJson[i]['origen'] + "</td><td>" +
                   dataJson[i]['destino'] +"</td><td>"+
                   dataJson[i]['kilometros']+"km"+"</td><td>"+"₡"+
                   dataJson[i]['precio']+"</td><td>"+
                   '<input type="button" value="Agregar" onclick="agregarServicioTransporte(\''+dataJson[i]['idtransporte']+'\')" />'+
                   "</td></tr>" 
                   
                }else if(dataJson[i]['estadoagregada'] ==1){
                     nuevafila= "<tr><td>" +
                   dataJson[i]['origen'] + "</td><td>" +
                   dataJson[i]['destino'] +"</td><td>"+
                   dataJson[i]['kilometros']+"km"+"</td><td>"+"₡"+
                   dataJson[i]['precio']+"</td><td>"+
                   '<input type="button" value="Descartar" onclick="descartarServicioTransporte(\''+dataJson[i]['idtransporte']+'\')" />'+
                   "</td></tr>" 
                  
                }
                $("#tablatransporte").append(nuevafila);
            }

        });

}

function agregarServicioTransporte(idservicio){
    var idPaquete=document.getElementById("idPaqueteTem").value;
   var formData= new FormData();
    formData.append("opcion",5);
    formData.append("idpaquete",idPaquete);
    formData.append("idservicio",idservicio);
    $.ajax({
            url:"../business/agregarDescartarServicios.php",
            type : "post",
            dataType : "html",
            data : formData,
            cache : false,
            contentType : false,
            processData : false
    }).done(function(data) {
            alert("Se agrego con exito el servicio de transporte");
            eliminarFilas(document.getElementById('tablatransporte'));
           actualizarPrecioPaquete();
           mostrarServiciosTransporte();
    });
}

function descartarServicioTransporte(idservicio){
     var idPaquete=document.getElementById("idPaqueteTem").value;
    var formData= new FormData();
    formData.append("opcion",6);
    formData.append("idpaquete",idPaquete);
    formData.append("idservicio",idservicio);
    $.ajax({
            url:"../business/agregarDescartarServicios.php",
            type : "post",
            dataType : "html",
            data : formData,
            cache : false,
            contentType : false,
            processData : false
    }).done(function(data) {
            alert("Se descarto con exito el servicio de transporte");
            eliminarFilas(document.getElementById('tablatransporte'));
           actualizarPrecioPaquete();
           mostrarServiciosTransporte();
    });
}
/*...................Servicio alimentacion....................................*/

var precioFinal="";
function separarPrecio(precio){
  var arreglo=precio.split(",");
  for(var i=0;i<arreglo.length;i++){
    precioFinal=precioFinal+"₡"+arreglo[i]+",";
  }
}

function agregarServicioAlimentacion(idservicio){
   var idPaquete=document.getElementById("idPaqueteTem").value;
    var formData= new FormData();
    formData.append("opcion",1);
    formData.append("idpaquete",idPaquete);
    formData.append("idservicio",idservicio);

     $.ajax({
            url:"../business/agregarDescartarServicios.php",
            type : "post",
            dataType : "html",
            data : formData,
            cache : false,
            contentType : false,
            processData : false
    }).done(function(data) {
            alert("Se agrego con exito el servicio de alimentacion");
            eliminarFilas(document.getElementById('tablaAlimentacion'));
           actualizarPrecioPaquete();
           mostrarServiciosAlimentacion();
    });

}
function descartarServicioAlimentacion(idservicio){
  var idPaquete=document.getElementById("idPaqueteTem").value;
    var formData= new FormData();
    formData.append("opcion",2);
    formData.append("idpaquete",idPaquete);
    formData.append("idservicio",idservicio);

     $.ajax({
            url:"../business/agregarDescartarServicios.php",
            type : "post",
            dataType : "html",
            data : formData,
            cache : false,
            contentType : false,
            processData : false
    }).done(function(data) {
            alert("Se descarto con exito el servicio de alimentacion");
            eliminarFilas(document.getElementById('tablaAlimentacion'));
           actualizarPrecioPaquete();
           mostrarServiciosAlimentacion();
    });
}
function mostrarServiciosAlimentacion(){

    document.getElementById('contenedorActividades').style.display = 'none';
    document.getElementById('contenedorhospedaje').style.display = 'none';
    document.getElementById('contenedortransporte').style.display = 'none';
    eliminarFilas(document.getElementById("tablaAlimentacion"));    
    document.getElementById('contenedorGeneral').style.display = 'block';
    document.getElementById('contenedorAlimentacion').style.display = 'block';
    var idpaquete=document.getElementById("idPaqueteTem").value;

     var formData = new FormData();
    formData.append("opcion",1);
    formData.append("idpaquete",idpaquete);
    $.ajax({
        url : "../business/mostrarServiciosBusiness.php",
        type : "post",
        dataType : "html",
        async:false,
        data : formData,
        cache : false,
        contentType : false,
        processData : false
        }).done(function(data) {

            var dataJson = eval('(' + data + ')');
            var tamano=dataJson.length;
            for(i=0;i<tamano;i++){
                var nuevafila="";
                separarPrecio(dataJson[i]['precio']);
                precioFinal=precioFinal.substring(0,precioFinal.length-1);
                if(dataJson[i]['estadoagregada'] ==0){
                  nuevafila= "<tr><td>" +
                   dataJson[i]['tiempocomidas'] + "</td><td>" +
                   dataJson[i]['descripcioncomidas'] +"</td><td>"+
                   precioFinal+"</td><td>"+
                   '<input type="button" value="Agregar" onclick="agregarServicioAlimentacion(\''+dataJson[i]['idalimentacion']+'\')" />'+
                   "</td></tr>" 
                   precioFinal="";
                }else if(dataJson[i]['estadoagregada'] ==1){
                     nuevafila= "<tr><td>" +
                   dataJson[i]['tiempocomidas'] + "</td><td>" +
                   dataJson[i]['descripcioncomidas'] +"</td><td>"+
                   precioFinal+"</td><td>"+
                   '<input type="button" value="Descartar" onclick="descartarServicioAlimentacion(\''+dataJson[i]['idalimentacion']+'\')" />'+
                   "</td></tr>" 
                  precioFinal="";
                }
                $("#tablaAlimentacion").append(nuevafila);
            }

        });

}

/*...................Servicio hospedaje....................................*/

function mostrarServiciosHospedaje(){

    document.getElementById('contenedorActividades').style.display = 'none';
    document.getElementById('contenedorAlimentacion').style.display = 'none';
    document.getElementById('contenedortransporte').style.display = 'none';
    eliminarFilas(document.getElementById("tablahospedaje"));    
    document.getElementById('contenedorGeneral').style.display = 'block';
    document.getElementById('contenedorhospedaje').style.display = 'block';
    var idpaquete=document.getElementById("idPaqueteTem").value;

     var formData = new FormData();
    formData.append("opcion",3);
    formData.append("idpaquete",idpaquete);
    $.ajax({
        url : "../business/mostrarServiciosBusiness.php",
        type : "post",
        dataType : "html",
        async:false,
        data : formData,
        cache : false,
        contentType : false,
        processData : false
        }).done(function(data) {

            var dataJson = eval('(' + data + ')');
            var tamano=dataJson.length;
            for(i=0;i<tamano;i++){
                var nuevafila="";
                if(dataJson[i]['estadoagregada'] ==0){
                  nuevafila= "<tr><td>" +
                   dataJson[i]['estilocama'] + "</td><td>" +
                   dataJson[i]['numerocamas']+"</td><td>"+
                   dataJson[i]['numerocuartos']+"</td><td>"+
                   dataJson[i]['numeropersonas'] +"</td><td>"+"₡"+
                   dataJson[i]['precio']+"</td><td>"+
                   '<input type="button" value="Agregar" onclick="agregarServicioHospedaje(\''+dataJson[i]['idhospedaje']+'\')" />'+
                   "</td></tr>" 
                }else if(dataJson[i]['estadoagregada'] ==1){
                    nuevafila= "<tr><td>" +
                   dataJson[i]['estilocama'] + "</td><td>" +
                   dataJson[i]['numerocamas']+"</td><td>"+
                   dataJson[i]['numerocuartos']+"</td><td>"+
                   dataJson[i]['numeropersonas'] +"</td><td>"+"₡"+
                   dataJson[i]['precio']+"</td><td>"+
                   '<input type="button" value="Descartar" onclick="descartarServicioHospedaje(\''+dataJson[i]['idhospedaje']+'\')" />'+
                   "</td></tr>" 
                  
                }
                $("#tablahospedaje").append(nuevafila);
            }

        });

}

function agregarServicioHospedaje(idservicio){
    var idPaquete=document.getElementById("idPaqueteTem").value;
   var formData= new FormData();
    formData.append("opcion",3);
    formData.append("idpaquete",idPaquete);
    formData.append("idservicio",idservicio);
    $.ajax({
            url:"../business/agregarDescartarServicios.php",
            type : "post",
            dataType : "html",
            data : formData,
            cache : false,
            contentType : false,
            processData : false
    }).done(function(data) {
            alert("Se agrego con exito el servicio de hospedaje");
            eliminarFilas(document.getElementById('tablahospedaje'));
           actualizarPrecioPaquete();
           mostrarServiciosHospedaje();
            
    });
}

function descartarServicioHospedaje(idservicio){
    var idPaquete=document.getElementById("idPaqueteTem").value;
    var formData= new FormData();
    formData.append("opcion",4);
    formData.append("idpaquete",idPaquete);
    formData.append("idservicio",idservicio);
    $.ajax({
            url:"../business/agregarDescartarServicios.php",
            type : "post",
            dataType : "html",
            data : formData,
            cache : false,
            contentType : false,
            processData : false
    }).done(function(data) {
            alert("Se descarto con exito el servicio de hospedaje");
             eliminarFilas(document.getElementById('tablahospedaje'));
           actualizarPrecioPaquete();
           mostrarServiciosHospedaje();
    });
}
