<section id="cuidemonos" class="d-flex align-items-center justify-content-center position-relative bg-azuloscuro">
	<img class="cuidemonos_img cuidemonos_img_left" src="<?php echo HTML_DIR ?>images/postobon/background.png" alt="">
	<h3 class="text-white f-restless">#Cuidándote<span>Nos</span>Cuidamos</h3>
	<img class="cuidemonos_img cuidemonos_img_right girar" src="<?php echo HTML_DIR ?>images/postobon/background.png" alt="">
</section>


<!--   SECCION TABLAA -->
<section id="tabladata" class="container-fluid bg-azulclaro pt-5 pb-5">
	<div class="container">
			<div class="buscador pt-4 ml-sm-3">
				<h3 class="f-restless text-white text-center">busca la tienda más cercana para pedir tu domicilio </h3>
				<div class="selectores__postobon">
					<div class="contenedor_selectores d-flex align-items-center justify-content-center">
						<div class="selector_card">
							<img src="<?php echo HTML_DIR ?>images/col-flag.webp" alt="">
							<!-- <select id="ciudadesselect" class="selectchosen chosen-select">
							</select> -->
							<select id="ciudadesselect" class="selectchosen chosen-select">
								<option selected disabled="disabled">Escoge tu ciudad</option>
							</select>
						</div>
						<div class="separador_horizontal"></div>
						<div class="selector_card">
							<span class="icon_style_one"><i class="ion-location"></i></span>
							<select id="tiposelect" class="selectchosen chosen-select">
								<option selected disabled="disabled">Escoge tu barrio</option>
							</select>
						</div>
						<div class="separador_horizontal"></div>
						<a href="#" class="btn_postobon btn_1 no_link">Buscar</a>
						<a href="#" data-toggle="tooltip" data-placement="top" title="Buscar por mi ubicación" class="btn_postobon_ubicacion"><span class="ion-location"></span><span style="padding-left: 5px; text-decoration: none;">Utiliza tu ubicación</span></a>
					</div>
				</div>
				<div style="position: relative;">
					<div class="selecionador_tipos">
						<div class="delivery-type-title">
							<p class="delivery-title">Tipo de Domicilio</p>
						</div>
						<select id="tipologias" name="tipologia">
							<option value="">No existen domicilios</option>
						</select>
					</div>
					<div id="map">
						
					</div>
				</div>
				<div class="card-big">
					<div class="datos_empresas table-responsive">
						<table class="table table-hover tabla-custome table-borderless">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Dirección</th>
									<th>Teléfono</th>
								</tr>
							</thead>
							<tbody id="cargartiendas">
							</tbody>
						</table>
						<div class="wapp-share">
							<a id="sharewasap" href="https://api.whatsapp.com/send?text=https://tiendacercanapostobon.com/" data-action="share/whatsapp/share"><img src="<?php echo HTML_DIR ?>images/share.png"></a>
						</div>
					</div>			
				</div>
				
			</div>
			<div class="cont__btns d-flex justify-content-between align-items-center flex-sm-wrap">
				<a href="?view=register" class="card-medium-postobon no_link active">
					<span><i class="ion-document-text"></i></span>
					<div>
						<h5>Registra</h5>
						<p>Tu negocio aquí</p>
					</div>
				</a>
				<a href="?view=consejos" class="card-medium-postobon no_link">
					<span><i class="ion-ios-checkmark-outline"></i></span>
					<div>
						<h5>CONSEJOS</h5>
						<p>Para el tendero</p>
					</div>
				</a>
				<a href="#" class="card-medium-postobon no_link">
					<span><i class="ion-ios-reload"></i></span>
					<div>
						<h5>ANTES DE HACER TU PEDIDO</h5>
						<p>Estoy en testing</p>
					</div>
				</a>
			</div>
	</div>	
</section>


<!-- 	SECCIÓN MARCAS  -->
<section id="rosita" class="position-relative">
	<div class="cont_img_rosita">
		<img class="" src="<?php echo HTML_DIR ?>images/postobon/background2.png" alt="">
	</div>	
	<div style="right: 0px;" class="cont_img_rosita">
		<img class="girar" src="<?php echo HTML_DIR ?>images/postobon/background2.png" alt="">
	</div>
	<div class="container">
		<div class="pt-4 d-flex justify-content-center align-items-center">
			<a href="https://rosita.postobon.com/pedidos/" class="btn_rosita">
				<img class="" src="<?php echo HTML_DIR ?>images/postobon/rositabtn__.png" alt="">
			</a>
		</div>
		<ul class="list_marcas">
			<li><img src="<?php echo HTML_DIR ?>images/postobon/marca_postobon.png" alt=""> </li>
			<li><img src="<?php echo HTML_DIR ?>images/postobon/marca_colombiana.png" alt=""> </li>
			<li><img src="<?php echo HTML_DIR ?>images/postobon/marca_pepsi.png" alt=""> </li>
			<li><img src="<?php echo HTML_DIR ?>images/postobon/marca_sevenup.png" alt=""> </li>
			<li><img src="<?php echo HTML_DIR ?>images/postobon/marca_aqua.png" alt=""> </li>
			<li><img src="<?php echo HTML_DIR ?>images/postobon/marca_tutti.png" alt=""> </li>
			<li><img src="<?php echo HTML_DIR ?>images/postobon/marca_hit.png" alt=""> </li>
			<li><img src="<?php echo HTML_DIR ?>images/postobon/marca_tea.png" alt=""> </li>
			<li><img src="<?php echo HTML_DIR ?>images/postobon/marca_cristal.png" alt=""> </li>
			<li><img src="<?php echo HTML_DIR ?>images/postobon/marca_h2oh.png" alt=""> </li>
			<li><img src="<?php echo HTML_DIR ?>images/postobon/marca_hatsu.png" alt=""> </li>
			<li><img src="<?php echo HTML_DIR ?>images/postobon/marca_bretana.png" alt=""> </li>
			<li><img src="<?php echo HTML_DIR ?>images/postobon/marca_bary.png" alt=""> </li>
			<li><img src="<?php echo HTML_DIR ?>images/postobon/marca_gatorade.png" alt=""> </li>
			<li><img src="<?php echo HTML_DIR ?>images/postobon/marca_squash.png" alt=""> </li>
			<li><img src="<?php echo HTML_DIR ?>images/postobon/marca_speed.png" alt=""> </li>
			<li><img src="<?php echo HTML_DIR ?>images/postobon/marca_redbull.png" alt=""> </li>
			<li><img style="width: 60px;" src="<?php echo HTML_DIR ?>images/postobon/marca_natu.png" alt=""> </li>
			<li><img src="<?php echo HTML_DIR ?>images/postobon/marca_andina.png" alt=""> </li>
			<li><img src="<?php echo HTML_DIR ?>images/postobon/marca_miller.png" alt=""> </li>
			<li><img src="<?php echo HTML_DIR ?>images/postobon/marca_heineken.png" alt=""> </li>
			<li><img src="<?php echo HTML_DIR ?>images/postobon/marca_sol.png" alt=""> </li>
			<li><img src="<?php echo HTML_DIR ?>images/postobon/marca_tecate.png" alt=""> </li>
			<li><img src="<?php echo HTML_DIR ?>images/postobon/marca_cordilleras.png" alt=""> </li>
		</ul>
	</div>
</section>

<section id="banners">
	<a class="movil-banner" href="https://www.canalrcn.com/" target="_blank"><img src="<?php echo HTML_DIR ?>images/postobon/mailing-prime.png" alt=""></a>
	<a class="desktop-banner" href="https://www.canalrcn.com/" target="_blank"><img src="<?php echo HTML_DIR ?>images/postobon/banner_prime.png" alt=""></a>
</section>



<script src="https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyAMlxefD7_N1wa-4LlNTzEvDSxAhBHkkRA&callback=initMap"
    async defer></script>
<script type="application/javascript" src="<?php echo HTML_DIR ?>js/mapagoogle.js"></script>
<script>
	var parametros_bool = false;
	var ciudad,tipo;
	<?php  
		if(isset($_GET['city'])){
			echo "parametros_bool = true;";
			if(isset($_GET['type'])){
				echo "ciudad = '".$_GET['city']."'; tipo = '".$_GET['type']."';";
			}else{
				echo "ciudad = '".$_GET['city']."'; tipo = false;";
			}			
		}elseif(isset($_GET['ubicacionlat']) && isset($_GET['ubicacionlng'])){
			echo "searchposition({lat: ".$_GET['ubicacionlat'].", lng: ".$_GET['ubicacionlng']."})";
		}else{
			echo "getmylatlng();";
		}
	?>
</script>