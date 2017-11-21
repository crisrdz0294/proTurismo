function cargarProvincias(){

}

function cargarCantones(idprovincia){

}

function cargarDistritos(idcanton){

}





function Guardar() {
  img = document.getElementById("archivos").files;
  var data = new FormData();
  for(i=0;i<img.length;i++){
    data.append('uploadedfile'+i,img[i]);
  }
  data.append('guardarSitio',"guardarSitio");
  data.append('nombrecomercial',document.getElementById("nombrecomercial").value);
  data.append('telefono',document.getElementById("telefono").value);
  data.append('provincia',document.getElementById("provincia").value);
  data.append('canton',document.getElementById("canton").value);
  data.append('distrito',document.getElementById("distrito").value);
  data.append('direccion',document.getElementById("direccion").value);
  data.append('sitioweb',document.getElementById("sitioweb").value);


  $.ajax({
      url: "../business/sitioTuristicoBusinessAction.php",
      type: 'POST',
      data: data,
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
            window.location.assign("../view/sitioturisticoview.php");
      },
      error: function(xhr, status, error){quitarLoadingModal();  },
      beforeSend: function( xhr ) {
       
      }
    });
};





function Guardar2() {
  img = document.getElementById("archivos").files;
  var data = new FormData();
  for(i=0;i<img.length;i++){
    data.append('uploadedfile'+i,img[i]);
  }
  
  data.append('guardarServicioAlimentacion',"guardarServicioAlimentacion");
  data.append('tiempoComidasServicioAlimentacionD',document.getElementById("tiempoComidasServicioAlimentacionD").value);
  data.append('tiempoComidasServicioAlimentacionA',document.getElementById("tiempoComidasServicioAlimentacionA").value);
  data.append('tiempoComidasServicioAlimentacionC',document.getElementById("tiempoComidasServicioAlimentacionC").value);

  data.append('descripcionAlimentacionServicioAlimentacionD',document.getElementById("descripcionAlimentacionServicioAlimentacionD").value);
  data.append('descripcionAlimentacionServicioAlimentacionA',document.getElementById("descripcionAlimentacionServicioAlimentacionA").value);
  data.append('descripcionAlimentacionServicioAlimentacionC',document.getElementById("descripcionAlimentacionServicioAlimentacionC").value);
  

  data.append('precioServicioAlimentacionD',document.getElementById("precioServicioAlimentacionD").value);
  data.append('precioServicioAlimentacionA',document.getElementById("precioServicioAlimentacionA").value);
  data.append('precioServicioAlimentacionC',document.getElementById("precioServicioAlimentacionC").value);
  data.append('AdicionalesServicioAlimentacion',document.getElementById("AdicionalesServicioAlimentacion").value);
  data.append('alimentacionLlevarServicioAlimentacion',document.getElementById("alimentacionLlevarServicioAlimentacion").value);
  data.append('sitioturistico',document.getElementById("sitioturistico").value);
  data.append('guardarServicioAlimentacion',document.getElementById("guardarServicioAlimentacion").value);



  $.ajax({
      url: "../business/servicioAlimentacionBusinessAction.php",
      type: 'POST',
      data: data,
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
            window.location.assign("../view/servicioAlimentacionView.php");
      },
      error: function(xhr, status, error){quitarLoadingModal();  },
      beforeSend: function( xhr ) {
       
      }
    });
};




function Guardar3() {

  img = document.getElementById("archivos").files;
  var data = new FormData();
  for(i=0;i<img.length;i++){
    data.append('uploadedfile'+i,img[i]);
  }

  data.append("guardar","guardarServicioTransporte");
  data.append('origenServicioTransporte',document.getElementById("origenServicioTransporte").value);
  data.append('destinoServicioTransporte',document.getElementById("destinoServicioTransporte").value);
  data.append('KilometrosServicioTransporte',document.getElementById("KilometrosServicioTransporte").value);
  data.append('tipoCarretera[]',document.getElementById("tipoCarreteraServicioTransporte1").value);
  data.append('tipoCarretera[]',document.getElementById("tipoCarreteraServicioTransporte2").value);
  data.append('tipoCarretera[]',document.getElementById("tipoCarreteraServicioTransporte3").value);
  data.append('tipoCarretera[]',document.getElementById("tipoCarreteraServicioTransporte4").value);
  data.append('tipoCarretera[]',document.getElementById("tipoCarreteraServicioTransporte5").value);
  data.append('tipoCarretera[]',document.getElementById("tipoCarreteraServicioTransporte6").value);
  data.append('tipoVehiculoServicioTransporte',document.getElementById("tipoVehiculoServicioTransporte").value);
  data.append('precioServicioTransporte',document.getElementById("precioServicioTransporte").value);
  data.append('cantidadPersonasServicioTransporte',document.getElementById("cantidadPersonasServicioTransporte").value);
  data.append('sitioturistico',document.getElementById("sitioturistico").value);

  $.ajax({
      url: "../business/servicioTransporteBusinessAction.php",
      type: 'POST',
      data: data,
      accion: "guardar",
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
      
            window.location.assign("../view/servicioTransporteView.php");
      },
      error: function(xhr, status, error){
       
      },
      beforeSend: function( xhr ) {
       
      }
    });
};





function Guardar4() {
  img = document.getElementById("archivos").files;
  var data = new FormData();
  for(i=0;i<img.length;i++){
    data.append('uploadedfile'+i,img[i]);
  }
  data.append('enviarFormulario',"enviarFormulario");
  data.append('estiloCama',document.getElementById("estiloCama").value);
  data.append('cantidadcamas',document.getElementById("cantidadcamas").value);
  data.append('internet',document.getElementById("internet").value);
  data.append('aireAcondicionado',document.getElementById("aireAcondicionado").value);
  data.append('ventilador',document.getElementById("ventilador").value);
  data.append('cable',document.getElementById("cable").value);
  data.append('banos',document.getElementById("banos").value);
  data.append('vista',document.getElementById("vista").value);
  data.append('cantidadpersonas',document.getElementById("cantidadpersonas").value);
  data.append('cantidadCuartos',document.getElementById("cantidadCuartos").value);
  data.append('precio',document.getElementById("precio").value);
  data.append('acceso',document.getElementById("acceso").value);
  data.append('idEncargado',document.getElementById("idEncargado").value);

  


  $.ajax({
      url: "../business/servicioHabitacionAction.php",
      type: 'POST',
      data: data,
      guardar:"enviarFormulario",
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
            window.location.assign("../view/servicioHabitacionView.php");
      },
      error: function(xhr, status, error){},
      beforeSend: function( xhr ) {
       
      }
    });
};


