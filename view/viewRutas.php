<!DOCTYPE html>
<html>
<head>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBx1fI7DiwpTuvETUQ5K8suNJ3FArBfJZ8&libraries=geometry,places" text="javascript">
    </script>
</head>
<style type="text/css">
  
  #map-canvas{
    width: 400px;
    height: 400px;
  }
  #panelDatos{
    margin-left: 40%;
    margin-top: -10%;
  }
</style>
<body>
  <input type="" id="lugarorigen" size="50" placeholder="Digite el nombre del lugar"> <br><br>

  <div id="map-canvas"></div><br><br>

  Actividad a realizar:
  <select id="opciones">
    <option disabled selected>Seleccione</option>
    <option>Lugar Origen</option>
    <option>Lugar Destino</option>
  </select><br><br>

  <input type="button" id="guardarLugar" onclick="guardarLugar(),habilitarBoton()" value="Guardar"><br><br>

  <input type="hidden" id="origen">
  <input type="hidden" id="destino">

  <input type="button" id="cargarRuta" onclick="cargarRuta()" value="Cargar Ruta" disabled>
  <div id="panelDatos" ></div><br><br>
   
</body>
<script type="text/javascript">
    
    var geocoder = new google.maps.Geocoder();
    function codificar(valor){
      console.log(valor);
      var latlngStr = valor.split(',', 2);
      
      var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};

      geocoder.geocode({'location': latlng}, function(results, status) {

         if (status === 'OK') {
            if (results[1]) {
              console.log(results[1].formatted_address);
            }
         }
            
      });
    }
      var mapa=new google.maps.Map(document.getElementById('map-canvas'),{
          center:{
            lat:10.0000000,
            lng:-84.0000000
          },
          zoom:7
      });

      var marcador=new google.maps.Marker({
        position:{
          lat:10.0000000,
          lng:-84.0000000
        },
        map:mapa,
        draggable:true
      });


       var input=document.getElementById('lugarorigen');
       
       var busqueda= new google.maps.places.SearchBox(input);

        mapa.addListener('bounds_changed', function() {
          busqueda.setBounds(mapa.getBounds());
        });

        google.maps.event.addListener(busqueda,'places_changed',function(){

          var lugares=busqueda.getPlaces();
          var bounds= new google.maps.LatLngBounds();
          var i,lugar;
        
          for(i=0;lugar=lugares[i];i++){
          
            if(lugar!=null){
              bounds.extend(lugar.geometry.location);
              marcador.setPosition(lugar.geometry.location);
            }
          }
          mapa.fitBounds(bounds);
          mapa.setZoom(17);
            
        });

  
        function guardarLugar(){
          
          var costarica = {lat:10.0000000,lng:-84.0000000};
          var select=document.getElementById("opciones").value;
          if(select==="Seleccione"){
            alert("Debe seleccionar una opcion");
          }else if(select==="Lugar Origen"){
              document.getElementById("origen").value=marcador.getPosition().lat()+","+marcador.getPosition().lng();
              codificar(document.getElementById("origen").value);
              document.getElementById('lugarorigen').value="";
              mapa.setCenter(costarica);
              mapa.setZoom(7);
          }else if(select==="Lugar Destino"){
             document.getElementById("destino").value=marcador.getPosition().lat()+","+marcador.getPosition().lng();
             document.getElementById('lugarorigen').value="";
             mapa.setCenter(costarica);
             mapa.setZoom(7);
          }
        }

        function habilitarBoton(){
          var origenRuta=document.getElementById("origen").value;
          var destinoRuta=document.getElementById("destino").value;
          if(origenRuta!=""&&destinoRuta!=""){
            document.getElementById('cargarRuta').disabled = false;
          }else{
            document.getElementById('cargarRuta').disabled = true;
          }
        }
        
        function computeTotalDistance(result) {
          var total = 0;
          var myroute = result.routes[0];
          for (var i = 0; i < myroute.legs.length; i++) {
            total += myroute.legs[i].distance.value;
          }
          total = total / 1000;
          document.getElementById("total").value = total + ' km';
        }

        function cargarRuta(){
          marcador.setMap(null);
          var origenRuta=document.getElementById("origen").value;
          var destinoRuta=document.getElementById("destino").value;
            var request = {
              origin:origenRuta,
              destination:destinoRuta,
              travelMode: google.maps.TravelMode.DRIVING
            };
  
           var directionsService = new google.maps.DirectionsService();
           var directionsDisplay = new google.maps.DirectionsRenderer();
  
          // Indicamos dónde esta el mapa para renderizarnos
            directionsDisplay.setMap(mapa);
          // Indicamos dónde esta el panel para mostrar el texto
           var panel = document.getElementById("panelDatos");
          panel.innerHTML = ""; // Vacío el panel, por si buscamos varias veces
          directionsDisplay.setPanel(panel);
  
          directionsService.route(request, function(result, status) {
          if (status == google.maps.DirectionsStatus.OK) {
              directionsDisplay.setDirections(result);
              //computeTotalDistance(result);
          }
         });

        }
</script>
</script>
</html>