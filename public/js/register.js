var colombia = [];
$( window ).on( "load", function() {
  get_departamentos();
  $('[data-toggle="tooltip"]').tooltip();
  $(document).keydown(function(event) {
    if (event.ctrlKey==true && (event.which == '118' || event.which == '86')) {
        swal("Hola!", "Acción no permitida en esta página.", "info");
        event.preventDefault();
     }
  });
});

function get_departamentos(){
  var contador = 0;
  $.ajax({
    type:'GET',
    dataType: 'json',
    url: 'public/data/colombia.json',
    cache:false,
    success: function(datos) {
    	colombia = datos;
      $("#place-state").empty();
      $("#place-state").append('<option selected disabled="disabled">Escoge tu departamento</option>');
      $.each(datos, function(index, item){
      	var state = item.departamento;
      	$("#place-state").append('<option data-posjson="'+index+'" value="'+state.toUpperCase()+'">'+state.toUpperCase()+'</option>');
      });
      },
     error: function() { alert("Error leyendo fichero jsonP"); }
  });
}

$("#place-state").change(function() {
  $(this).addClass("cambiaado");
	indice = $(this).children("option:selected").attr("data-posjson");
	llenar_ciudades(indice);
});

$("#place-city").change(function() {
  $(this).addClass("cambiaado");
});

function llenar_ciudades(indice){
	$("#place-city").empty();
	$("#place-city").append('<option selected disabled="disabled">Escoge tu ciudad</option>');
	$.each(colombia[indice].ciudades, function(index, item){
  	var ciudad = item;
  	$("#place-city").append('<option value="'+ciudad.toUpperCase()+'">'+ciudad.toUpperCase()+'</option>');
  });
}

$('.form-group-wizard-parts').slick({
    dots: false,
    infinite: false,
    autoplay: false,
    autoplaySpeed: 2000,
    fade: true,
    cssEase: 'linear',
    arrows:false,
    pauseOnHover: true,
    adaptiveHeight:false,
    slidesToShow: 1,
    slidesToScroll: 1,
    draggable: false
  });

$('.btn_back_wizard').on('click', function(event){ 
  event.preventDefault(); 
  var bloque = $(this).attr("data-pos");
  $(".bullets-process ul li:eq("+bloque+")").removeClass("checked");
  $(".form-group-wizard-parts").slick('slickPrev');  
});

$('.btn_next_wizard').on('click', function(event){ 
  event.preventDefault(); 
  if($(this).hasClass("disable")){
    swal("Hola!", "Por favor acepta las políticas de protección de datos.", "error");
  }else{
    var bloque = $(this).attr("data-pos");
    var pasar = false;
    if(bloque == 1){
      pasar = bloqueuno();
    }else if(bloque == 2){
      pasar = bloquedos();
    }
    if(pasar[0]){
      $(".bullets-process ul li:eq("+bloque+")").addClass("checked");
      $(".form-group-wizard-parts").slick('slickNext');
    }else{
      swal("Hola!", pasar[1], "error");
    }
  }    
});

$("#aceptasolicitud").click(function() {  
  if($(this).is(':checked')) {  
    $('.btnwz1').removeClass("disable");
  } else {  
    $('.btnwz1').addClass("disable");
  }  
}); 

$("input[name='erescliente']").click(function() {  
  console.log($(this).val());
  if($(this).val() == "si"){
    $(".code_postobon").removeAttr("disabled");
  }else{
    $(".code_postobon").attr( "disabled", "disabled" );
  }
}); 

$(".onlynumbers").keypress(function(event) {
  validatenumber(event);
});

function bloqueuno(){
  var longitud = true;
  var mensaje = "";
  $(".bl1").get().forEach(function(entry, index, array) {
    if(longitud){
      if($(entry).val().length < 3){
        longitud = false;
        mensaje = "Tienes campos incompletos";
      }
    }
  });
  if(longitud){
    if($("#aceptasolicitud").is(':checked')) {}else{longitud = false; mensaje = "Acepta nuestra política de tratamiento de datos.";}
  }
  return [longitud, mensaje];
}

function bloquedos(){
  var longitud = true;
  var mensaje = "";
  $(".bl2").get().forEach(function(entry, index, array) {
    if(longitud){
      if($(entry).val().length < 3){
        longitud = false;
        mensaje = "Tienes campos incompletos";
      }
    }
  });
  if(longitud){
    if($("#place-state").hasClass("cambiaado") && $("#place-city").hasClass("cambiaado")){}else{
      longitud = false; mensaje = "Revisa los campos departamento o ciudad";
    }
  }
  return [longitud, mensaje];
}

function validatenumber(evt) {
  var theEvent = evt || window.event;
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}

$("#registroform").submit(function(event){    
  event.preventDefault();   
  $.ajax({
   type:'POST',
   url:'ajax.php?mode=tiendas&key=inserttienda',
   data: $(this).serializeArray(),
   cache: false,
   success: function(data){
    console.log(data);
    var info = JSON.parse(data);
    if(info.respuesta){
      window.dataLayer = window.dataLayer || [];
      dataLayer.push({
       'event': 'registerComplete',
       });
      swal("Hola!", "Ya casi eres parte de tienda cercana postobón, seguiremos mas que nunca #juntos por la tienda y llevando el sabor a todos los rincones de colombia.", "success");
      window.setTimeout( function(){
        location.reload();
      }, 4000);  
    }else{
      swal("Hola!", info.info, "error");
    }
   },
   error: function(e){
     console.log(e.responseText);
   } 
  }); // fin ajax

});