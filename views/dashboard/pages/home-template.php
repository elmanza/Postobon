<div class="table-responsive col-sm-12">
	<table id="tabla_tag" class="table-hover table table-bordered" style="width:100%">
    	<thead>
        	<tr>
	        	<th class='bg_gris text-center'>id</th>
						<th class='bg_gris text-center'>erescliente</th>
						<th class='bg_gris text-center'>cod_postobon</th>
						<th class='bg_gris text-center'>tipocliente</th>
						<th class='bg_gris text-center'>departamento</th>
						<th class='bg_gris text-center'>ciudad</th>
						<th class='bg_gris text-center'>nombre</th>
						<th class='bg_gris text-center'>domicilio</th>
						<th class='bg_gris text-center'>telefono_1</th>
						<th class='bg_gris text-center'>telefono_2</th>
						<th class='bg_gris text-center'>telefono_3</th>
						<th class='bg_gris text-center'>telefono_4</th>
						<th class='bg_gris text-center'>telefono_5</th>
						<th class='bg_gris text-center'>direccion</th>
						<th class='bg_gris text-center'>barrio</th>
						<th class='bg_gris text-center'>longitud</th>
						<th class='bg_gris text-center'>latitud</th>
						<th class='bg_gris text-center'>representante</th>
						<th class='bg_gris text-center'>email</th>
						<th class='bg_gris text-center'>telcontacto</th>
						<th class='bg_gris text-center'>aceptatratamientodatos</th>
						<th class='bg_gris text-center'>estado</th>
						<th class='bg_gris text-center'>creado</th>
        	</tr>
    	</thead>
    	<tbody>
    	</tbody>
	</table>
</div>

<script>
	var table = $('#tabla_tag').dataTable( {
	  "scrollY": "450px",
	  "paging": false,
	  "bFilter": false,
	  "responsive": true,
	  "sPaginationType": "full_numbers",
	  "iDisplayLength": 10
	});
</script>