
var markers_tiendas = [];
var markers = [];
var map;
var icon,icon_yo;
var bounds;
var activeWindow;
var tipologias = [];

function getmylatlng(){
   if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
        var pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
        searchposition(pos);
      }, function() {
        console.log("El usuario no compartió su ubicación");
      });
    } else {
      // Browser doesn't support Geolocation
      console.log("EL USUARIO NO DIO LOS PERMISOS");
    }
}

var getParams = function (url) {
  var params = {};
  var parser = document.createElement('a');
  parser.href = url;
  var query = parser.search.substring(1);
  var vars = query.split('&');
  var view = false;
  for (var i = 0; i < vars.length; i++) {
    var pair = vars[i].split('=');
    params[pair[0]] = decodeURIComponent(pair[1]);
    if(pair[0] == "view"){
      view = true;
    }
  }
  return [params,view];
};

function searchposition(position){
  var urlwasap = window.location.href;
  var gg = getParams(urlwasap);
  console.log(gg);
  if(gg[1]){
    window.history.replaceState(null, null, "?view="+gg[0].view+"&ubicacionlat="+position.lat+"&ubicacionlng="+position.lng);
  }else{
    window.history.replaceState(null, null, "?ubicacionlat="+position.lat+"&ubicacionlng="+position.lng);
  }
  $.ajax({
   type:'POST',
   url:'ajax.php?mode=tiendas&key=searchposition',
   data: position,
   cache: false,
   success: function(data){
    var info = JSON.parse(data);
    console.log(info);
    if(info.respuesta){
      var urlwasap = window.location.href;
      var urlwasapanalitycs = urlwasap+"&utm_source=social&utm_medium=whatsApp&utm_campaign=share";
      var urfinal = urlwasapanalitycs.replace(/[&]/g, "%26");      
      $("#sharewasap").attr("href","https://api.whatsapp.com/send?text="+urfinal);
      clearOverlays();
      setBounds();
      $("#cargartiendas").empty();
      $("#tipologias").empty();
      $("#tipologias").append('<option value="0">Todos</option>');
      markers_tiendas = [];
      tipologias = [];
      addMarker(position,{titulo:"Tu ubicación",direccion:"Por geolicación",telefono:"Sin información", tipologia:"Mi casa"});
      $.each(info.info, function(key, value){
        if(parseFloat(value.latitud) == 0.0){
        }else{
          var agregar = true;
          for (var i =  0; i < tipologias.length; i++) {
            
            if(value.tipologia == tipologias[i]){
              agregar = false;
              break; 
            }
          }
          if(agregar){
            tipologias.push(value.tipologia);
            console.log(tipologias.length);
            $("#tipologias").append('<option value="'+value.tipologia+'">'+value.tipologia+'</option>');
          }
          // telefonos
          var telefono = value.telefono_1+" "+value.telefono_2+" "+value.telefono_3+" "+value.telefono_4+" "+value.telefono_5;
          var lat = value.latitud;
          var lng = value.longitud;           
          var orig = value.tipologia;
          var clase_tabla = orig.replace(/-/g, "").replace(/ /g, "");
          $("#cargartiendas").append('<tr class="'+clase_tabla+' allinfo"><td>'+value.nombre+'</td><td>'+value.direccion+'</td><td><a class="no_link" href="tel:'+telefono+'">'+telefono+'</a></td></tr>');
          addMarker({lat: parseFloat(value.latitud), lng:  parseFloat(value.longitud)},{titulo:value.nombre,direccion:value.direccion,telefono:telefono,tipologia:value.tipologia});
          markers_tiendas.push({lat: parseFloat(value.latitud), lng:  parseFloat(value.longitud)});
          centermap();
        }          
      }); 
      $("#alerta_tiendas").fadeOut();
      $(".datos_empresas").fadeIn();
       /*$('html,body').animate({scrollTop: ($('.datos_empresas').offset().top - 35)},'slow'); */
    }else{        
      clearOverlays();
      setBounds();
      addMarker(position,{titulo:"Tu ubicación",direccion:"Por geolicación",telefono:"Sin información", tipologia:"Mi casa"});
      swal("Lo sentimos", "No hay tiendas cercanas a tu ubicación", "info");
    }
   },
   error: function(e){
     console.log(e.responseText);
   } 
  }); // fin ajax
}



function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
       zoom: 4,
       zoomControl: true,
       disableDoubleClickZoom: true,
       scaleControl: true,
       scrollwheel: true,
       panControl: true,
       streetViewControl: false,
       draggable : true,
       rotateControl: true,
       mapTypeControl: false,
       overviewMapControl: false,
       fullscreenControl: false,
       overviewMapControlOptions: {
           opened: false,
       },
       pixelRatio: window.devicePixelRatio || 1
       
    });
    // add a resize listener to make sure that the map occupies the whole container

    

    icon = {
        url: "public/images/postobon/location.svg", // url
        scaledSize: new google.maps.Size(30, 30), // scaled size
        origin: new google.maps.Point(0,0) // origin
    };
    icon_yo = {
        url: "public/images/postobon/pin.svg", // url
        scaledSize: new google.maps.Size(30, 30), // scaled size
        origin: new google.maps.Point(0,0) // origin
    };

    map.setCenter(new google.maps.LatLng(
      4.666371846312094,
      -74.07623925781252
    ));
    var colombia = new google.maps.Marker({
          position: {lat: 4.666371846312094, lng: -74.07623925781252},
          map: map,
          title: 'Colombia',
          icon: icon,
          draggable: true,
          animation: google.maps.Animation.DROP
        });
    markers.push(colombia);
    setBounds();
}

function clearOverlays() {
  for (var i = 0; i < markers.length; i++ ) {
    markers[i].setMap(null);
  }
  markers.length = 0;
}

function addMarker(location,obj) {

  if(obj.direccion == "Por geolicación"){
    var iconofinal = icon_yo;
  }else{
    var iconofinal = icon;
  }
  
  var marker = new google.maps.Marker({
    position: {lat: location.lat, lng: location.lng},
    map: map,
    icon: iconofinal,
    title: obj.titulo,
    telefono: obj.telefono,
    direccion: obj.direccion,
    tipologia: obj.tipologia,
    animation: google.maps.Animation.BOUNCE
  });
  marker.addListener('click', function() {
     if(activeWindow != null){activeWindow.close();}
     var infowindow = new google.maps.InfoWindow({content:'<div id="contentinfomap"><h3>'+this.title+'</h3><p><span class="ion-map"></span><span>'+this.direccion+'</span></p><p><span class="ion-ios-telephone"></span><a class="no_link" href="tel:'+this.telefono+'"><span>'+this.telefono+'</span></a></p></div>'});
         infowindow.open(map, marker);
         activeWindow = infowindow;   
  });
  bounds.extend(marker.position); 
  setTimeout(function(){ marker.setAnimation(null); }, 2050);
  markers.push(marker);
}

function setBounds(){
  bounds = new google.maps.LatLngBounds();
}

function centermap(){
  map.fitBounds(bounds);
}