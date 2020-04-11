$( window ).on( "load", function() {
  obtenernuevastiendas();
});

var obtenernuevastiendas = function(){

	      table.fnDestroy();
				table.DataTable({
					//"scrollY": "450px",
					"columnDefs": [
				    { "visible": false, "targets": 0 },
				    { "visible": false, "targets": 1 },
				    { "visible": false, "targets": 2 },
				    { "visible": false, "targets": 3 },
				    { "visible": false, "targets": 4 },
				    { "visible": false, "targets": 9 },
				    { "visible": false, "targets": 10 },
				    { "visible": false, "targets": 11 },
				    { "visible": false, "targets": 12 },
				    { "visible": false, "targets": 15 },
				    { "visible": false, "targets": 16 },
				    { "visible": false, "targets": 18 },
				    { "visible": false, "targets": 20 }
				  ],
	        "paging": false,
	        "bFilter": true,
	        "responsive": true,
				  "processing" : true,
				  "serverside" : true,
				   dom: 'Bfrtip',
		        buttons: [
		            'excel', 'pdf', 'print'
		        ],
	        "sPaginationType": "full_numbers",

	        "iDisplayLength": 10,
				    "bSort": true,
					'ajax'       : {
				    "type"   : "POST",
				    "data" : {
		            "nm" : "001"
		        },
				    "url"    : 'ajax.php?mode=tiendas&key=getalmacenesnews',
				    "dataSrc": function (json) {
				    	console.log(json);
				    	var return_data = new Array();
				    	if(json.respuesta){
				    		for(var i=0;i< json.info.length; i++){
				    			botones = "<div class='acciones text-center'><a data-accion='getinfoinmueble' href='#' class='btn btn-icon hint--top btn-outline-success' data-number='"+json.info[i].id+"' aria-label='Datos'><span class='ion-stats-bars'></span></a><a data-accion='addtour' href='#' class='btn btn-icon hint--top btn-outline-info' data-number='"+json.info[i].id+"' aria-label='Agregar tour'><span class='ion-ios-cloud-upload'></span></a></div>";
				    			titulo = json.info[i].nombre+" - "+json.info[i].neighborhood+" - "+json.info[i].representante;
				    			precio = json.info[i].direccion;
				    			return_data.push({
				    				'id' : json.info[i].id,
					          'erescliente' : json.info[i].erescliente,
										'cod_postobon' : json.info[i].cod_postobon,
										'tipocliente' : json.info[i].tipocliente,
										'departamento' : json.info[i].departamento,
										'ciudad' : json.info[i].ciudad,
										'nombre' : json.info[i].nombre,
										'domicilio' : json.info[i].domicilio,
										'telefono_1' : json.info[i].telefono_1,
										'telefono_2' : json.info[i].telefono_2,
										'telefono_3' : json.info[i].telefono_3,
										'telefono_4' : json.info[i].telefono_4,
										'telefono_5' : json.info[i].telefono_5,
										'direccion' : json.info[i].direccion,
										'barrio' : json.info[i].barrio,
										'longitud' : json.info[i].longitud,
										'latitud' : json.info[i].latitud,
										'representante' : json.info[i].representante,
										'email' : json.info[i].email,
										'telcontacto' : json.info[i].telcontacto,
										'aceptatratamientodatos' : json.info[i].aceptatratamientodatos,
										'estado' : json.info[i].estado,
										'creado' : json.info[i].creado
					        });

				    		}
				    	}else{
				    		return_data.push({
					    			'id' : "",
					          'erescliente' : "",
										'cod_postobon' : "",
										'tipocliente' : "",
										'departamento' : "",
										'ciudad' : "",
										'nombre' : "",
										'domicilio' : "",
										'telefono_1' : "",
										'telefono_2' : "",
										'telefono_3' : "",
										'telefono_4' : "",
										'telefono_5' : "",
										'direccion' : "",
										'barrio' : "",
										'longitud' : "",
										'latitud' : "",
										'representante' : "",
										'email' : "",
										'telcontacto' : "",
										'aceptatratamientodatos' : "",
										'estado' : "",
										'creado' : ""
					        });
				    	}	
				    	return return_data; 
				    }
				  },
				  columns: [
								        { data: 'id',
								          defaultContent: "Error servidor"},
								        { data: 'erescliente',
								          defaultContent: "Error servidor"},
								        { data: 'cod_postobon',
								          defaultContent: "Error servidor" },
								        { data: 'tipocliente',
								          defaultContent: "Error servidor"},
								        { data: 'departamento',
								          defaultContent: "Error servidor"},
								        { data: 'ciudad',
								          defaultContent: "Error servidor" },
								        { data: 'nombre',
								          defaultContent: "Error servidor"},
								        { data: 'domicilio',
								          defaultContent: "Error servidor"},
								        { data: 'telefono_1',
								          defaultContent: "Error servidor" },
								        { data: 'telefono_2',
								          defaultContent: "Error servidor"},
								        { data: 'telefono_3',
								          defaultContent: "Error servidor"},
								        { data: 'telefono_4',
								          defaultContent: "Error servidor" },
								        { data: 'telefono_5',
								          defaultContent: "Error servidor"},
								        { data: 'direccion',
								          defaultContent: "Error servidor"},
								        { data: 'barrio',
								          defaultContent: "Error servidor" },
								        { data: 'longitud',
								          defaultContent: "Error servidor"},
								        { data: 'latitud',
								          defaultContent: "Error servidor"},
								        { data: 'representante',
								          defaultContent: "Error servidor" },
								        { data: 'email',
								          defaultContent: "Error servidor"},
								        { data: 'telcontacto',
								          defaultContent: "Error servidor"},
								        { data: 'aceptatratamientodatos',
								          defaultContent: "Error servidor" },
								        { data: 'estado',
								          defaultContent: "Error servidor" },
								        { data: 'creado',
								          defaultContent: "Error servidor"}
								    ]
				});
			 	table.dataTable().api().ajax.reload();
	}
