function actualizarPaqueteTuristico(){

   if(document.getElementById("nombre").value==""||document.getElementById("descripcion").value==""||
    document.getElementById("cantidad").value==""||document.getElementById("itinerario").value==""){
    alert("Hay campos vacios");
   }
 
}

function actualizarPrecioPaquete(){
    var idpaquete=document.getElementById("idPaqueteTem").value;
    var formData= new FormData();
    formData.append("opcion",2);
    formData.append("idpaquete",idpaquete);

    $.ajax({
        url : "../business/traerPaqueteTuristicoBusiness.php",
        type : "post",
        dataType : "html",
        async:false,
        data : formData,
        cache : false,
        contentType : false,
        processData : false
        }).done(function(data) {
            var dataJson = eval('(' + data + ')');
            var precio="₡"+dataJson['precio'];
            var precioDescontado=dataJson['precio']-((dataJson['precio']*10)/100);
            precioDescontado=Math.round(precioDescontado);
            var precioDescuentoFinal="₡"+precioDescontado;
            
            
            $("#tabla_resultados tr").find('td:eq(4)').each(function () {
 
                $(this).html(precio);
            })

             $("#tabla_resultados tr").find('td:eq(5)').each(function () {
                $(this).html(precioDescuentoFinal);
            })
        });
}

function cargarTablaPaqueteTuristico(){

	$("#contenedorTabla").css("display", "block");
    eliminarFilas(document.getElementById("tabla_resultados"));
	var idpaquete = document.getElementById("prueba").value; 

	document.getElementById("idPaqueteTem").value=idpaquete;

	var formData = new FormData();
	formData.append("opcion",1);
	formData.append("idprueba",idpaquete);
	
	$.ajax({
    	url : "../business/traerPaqueteTuristicoBusiness.php",
    	type : "post",
    	dataType : "html",
    	async:false,
    	data : formData,
    	cache : false,
    	contentType : false,
    	processData : false
    	}).done(function(data) {
     		var dataJson = eval('(' + data + ')');
     		var montoDescontado=dataJson['preciopaquete']-((dataJson['preciopaquete']*10)/100);
            montoDescontado=Math.round(montoDescontado);
			idtemporal=dataJson['idpaquete'];
             var nuevafila= '<tr><td>'+
            '<input type="text" id="nombre" value="'+dataJson['nombrepaquete']+'"/>'+'</td><td>' +
            '<input type="text" id="descripcion" value="'+dataJson['descripcionpaquete']+'"/>'+'</td><td>' +
            '<input type="number" id="cantidad" value="'+dataJson['cantidadpersonaspaquete']+'"/>'+'</td><td>' +
            '<input type="text" id="itinerario" value="'+dataJson['itinerariopaquete']+'"/>'+'</td><td>' +"₡"+
			dataJson['preciopaquete']+"</td><td>"+"₡"+montoDescontado+"</td><td>"+
            '<input type="button" value="Actualizar" onclick="actualizarPaqueteTuristico()" />'+"</td><td>"+
			'<input type="button" value="Agregar Actividades" id="boton1" onclick="mostrarActividades()" />'+
			"</td><td>"+'<input type="button" value="Agregar Servicios" onclick="mostrarRadios()" />'+"</td></tr>"
			$("#tabla_resultados").append(nuevafila);

     	});
	document.getElementById('contenedorRadios').style.display = 'none';
	document.getElementById("radioAlimentacion").checked = false;
	document.getElementById("radioTransporte").checked = false;
	document.getElementById("radioHospedaje").checked = false;

	eliminarFilas(document.getElementById('tablaActividades'));

	document.getElementById('contenedorActividades').style.display = 'none';

	$("#boton1").click(function() {
  		document.getElementById('boton1').disabled=true;
	});

}	

function mostrarRadios(){
	document.getElementById("radioAlimentacion").checked = false;
	document.getElementById("radioTransporte").checked = false;
	document.getElementById("radioHospedaje").checked = false;
	document.getElementById('boton1').disabled=false;
	document.getElementById("idPaqueteTem").value=idtemporal;
	 document.getElementById('contenedorGeneral').style.display = 'none';
	
	$("#contenedorRadios").css("display", "block");
}
