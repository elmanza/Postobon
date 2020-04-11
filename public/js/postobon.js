$(".chosen-select").chosen({disable_search_threshold: 8});
$( window ).on( "load", function() {
  $('[data-toggle="tooltip"]').tooltip();
  if(typeof parametros_bool !== "undefined"){
    getciudades();
    init();
  }
});

function init(){
  if(parametros_bool && tipo !== false){
    getTypes(ciudad);
    var params = { "ciudad" : ciudad, "tipo" : tipo};
    buscar(params)
  }
}
/*
Domicilio
código postobon
Departamento

-- Bario falta en el formulario*/


function getciudades(){
  var parametros = {
    "id" : "--" 
  };
  $.ajax({
   type:'POST',
   url:'ajax.php?mode=tiendas&key=getciudades',
   data: parametros,
   cache: false,
   success: function(data){
    var info = JSON.parse(data);
    if(info.respuesta){
      $("#ciudadesselect").empty();
      if(!parametros_bool){ $("#ciudadesselect").append('<option selected disabled="disabled">Selecciona tu ciudad</option>');}else{$("#ciudadesselect").append('<option disabled="disabled">Selecciona tu ciudad</option>');}
      $.each(info.info, function(key, value){
        if(parametros_bool && ciudad == value.ciudad){
          $("#ciudadesselect").append('<option selected value="'+value.ciudad+'">'+value.ciudad+'</option>');
        }else{
          $("#ciudadesselect").append('<option value="'+value.ciudad+'">'+value.ciudad+'</option>');
        }       
      });     
      $(".chosen-select").trigger("chosen:updated");
    }
   },
   error: function(e){
     console.log(e.responseText);
   } 
  }); // fin ajax
}

$( "#ciudadesselect" ).change(function() {
  ciudad = $(this).val();
  window.history.replaceState(null, null, "?city="+ciudad);
  getTypes(ciudad);
});
$( "#tiposelect" ).change(function() {
  window.history.replaceState(null, null, "?city="+ciudad+"&type="+$(this).val());
});


$( "#tipologias" ).change(function() {
  $(".allinfo").fadeOut();
  var _tipologia = $(this).val();
  var clase_tabla = _tipologia.replace(/-/g, "").replace(/ /g, "");
  $("."+clase_tabla).fadeIn();
  $.each(markers, function(key, value){
    if(_tipologia == 0){
      value.setVisible(true);
    }else{
      if(value.tipologia == _tipologia){
        value.setVisible(true);
      }else{
        value.setVisible(false);
      }
    }      
  });   
});


function getTypes(ciudad){
  var parametros = {
    "ciudad" : ciudad 
  };
  $.ajax({
   type:'POST',
   url:'ajax.php?mode=tiendas&key=getbarrios',
   data: parametros,
   cache: false,
   success: function(data){
    var info = JSON.parse(data);  
    if(info.respuesta){
      $("#tiposelect").empty();
    if(tipo == false){ $("#tiposelect").append('<option selected disabled="disabled">Selecciona el tipo de negocio</option>');}else{$("#tiposelect").append('<option disabled="disabled">Selecciona el tipo de negocio</option>');}
      $.each(info.info, function(key, value){
        if(tipo !== false && value.barrio == tipo){
          $("#tiposelect").append('<option selected value="'+value.barrio+'">'+value.barrio+'</option>');
        }else{
          $("#tiposelect").append('<option value="'+value.barrio+'">'+value.barrio+'</option>');
        }     
      });     
      $(".chosen-select").trigger("chosen:updated");
    }else{
      
    }
   },
   error: function(e){
     console.log(e.responseText);
   } 
  }); // fin ajax
}

function buscar(params){
  
  var urlwasap = window.location.href;
  var urlwasapanalitycs = urlwasap+"&utm_source=social&utm_medium=whatsApp&utm_campaign=share";
  var urfinal = urlwasapanalitycs.replace(/[&]/g, "%26");

  $.ajax({
   type:'POST',
   url:'ajax.php?mode=tiendas&key=getalmacenes',
   data: params,
   cache: false,
   success: function(data){
    var info = JSON.parse(data);
    if(info.respuesta){
      $("#sharewasap").attr("href","https://api.whatsapp.com/send?text="+urfinal);
      clearOverlays();
      setBounds();
      $("#cargartiendas").empty();
      $("#tipologias").empty();
      $("#tipologias").append('<option value="0">Todos</option>');
      markers_tiendas = [];
      tipologias = [];
      $.each(info.info, function(key, value){
        if(parseFloat(value.latitud) == 0.0){
          console.log("...");
        }else{
          // telefonos
          var telefono = value.telefono_1+" "+value.telefono_2+" "+value.telefono_3+" "+value.telefono_4+" "+value.telefono_5;
          var lat = value.latitud;
          var lng = value.longitud;
          var orig = value.tipologia;
          var clase_tabla = orig.replace(/-/g, "").replace(/ /g, "");
          $("#cargartiendas").append('<tr class="'+clase_tabla+' allinfo"><td>'+value.nombre+'</td><td>'+value.direccion+'</td><td><a class="no_link" href="tel:'+telefono+'">'+telefono+'</a></td></tr>');
          var agregar = true;
          for (var i =  0; i < tipologias.length; i++) {          
            if(value.tipologia == tipologias[i]){
              agregar = false;
              break; 
            }
          }
          if(agregar){
            tipologias.push(value.tipologia);
            $("#tipologias").append('<option value="'+value.tipologia+'">'+value.tipologia+'</option>');
          }
          addMarker({lat: parseFloat(value.latitud), lng:  parseFloat(value.longitud)},{titulo:value.nombre,direccion:value.direccion,telefono:telefono,tipologia:value.tipologia});
          markers_tiendas.push({lat: parseFloat(lat.replace(",", ".")), lng:  parseFloat(lng.replace(",", "."))});
          centermap();
        }          
        
      }); 
      $("#alerta_tiendas").fadeOut();
      $(".datos_empresas").fadeIn();
       /*$('html,body').animate({scrollTop: ($('.datos_empresas').offset().top - 35)},'slow'); */
    }else{        
    }
   },
   error: function(e){
     console.log(e.responseText);
   } 
  }); // fin ajax
}

$('.btn_postobon').on('click', function(event){ 
  event.preventDefault(); 
  var city_i = $("#ciudadesselect option:checked").val();
  var tipo_i = $("#tiposelect option:checked").val();
  window.history.replaceState(null, null, "?city="+city_i+"&type="+tipo_i);
  var params = {
   "ciudad" : city_i,
   "tipo" : tipo_i
 };
 buscar(params)
});



$('.btn_postobon_ubicacion').on('click', function(event){ 
  event.preventDefault(); 
  getmylatlng();
});