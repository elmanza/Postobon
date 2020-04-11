
<section class="container-fluid position-relative" style="padding: 40px 0px 80px;">
  <img class="cuidemonos_img_registro cuidemonos_img_left" src="<?php echo HTML_DIR ?>images/postobon/background.png" alt="">
  <img class="cuidemonos_img_registro cuidemonos_img_right girar" src="<?php echo HTML_DIR ?>images/postobon/background.png" alt="">
  <!-- <div class="cont_img_rosita">
    <img class="cuidemonos_img cuidemonos_img_left" src="<?php //echo HTML_DIR ?>images/postobon/background2.png" alt="">
  </div>   -->
  <div class="wizardpostobon version2">
    <div class="inner">
      <div class="image-holder">
        <img class="" src="<?php echo HTML_DIR ?>images/postobon/form-wizard-1.jpg" alt="">
      </div>
      <div class="form-content">
        <div class="form-header"><h3>Registra tu negocio</h3></div>
        <div class="bullets-process">
          <ul>
            <li>
              <a href="#" class=""></a>
            </li>
            <li>
              <a href="#" class=""></a>
            </li>
            <li>
              <a href="#" class=""></a>
            </li>
          </ul>
        </div>
        <form  id="registroform" name="registroform">
          <div class="form-group-wizard-parts">
            <div>
              <div class="contenedor-block-wizard">
                <p>Por favor registre sus datos</p>
                <div class="form-row-2">
                  <div class="form-holder w-100">
                    <input type="text" name="namenegocio" placeholder="Nombre del negocio" class="form-control-input bl1">
                  </div>
                </div>
                <div class="form-row-2">
                  <div class="form-holder w-100">
                    <input type="text" name="nameperson" placeholder="Nombre persona de contacto" class="form-control-input bl1">
                  </div>
                </div>
                <div class="form-row-2">
                  <div class="form-holder">
                    <input type="text" name="email" placeholder="Email" class="form-control-input bl1">
                  </div>
                  <div class="form-holder">
                    <input type="text" name="telefono" placeholder="Telefono" class="form-control-input bl1 onlynumbers">
                  </div>
                </div>
                <div class="form-row-2 justify-content-between" style="margin-top: 41px;">
                  <div class="checkbox-circle">
                    <label>
                      <input id="aceptasolicitud" name="data_political" value="si" type="checkbox"> Acepto solicitud de autorización de tratamiento de datos personales <a style="display: block;" href="?view=politicadatospersonales" target="_blank" class="no_link">Ver aquí</a>
                      <span class="checkmark"></span>
                    </label>
                  </div>
                  <a href="#" data-pos="1" class="btnwz1 btn_next_wizard disable no_link">Siguiente</a>
                </div>
              </div>
            </div>
            <div>
              <div class="contenedor-block-wizard">
                <p>Información de su negocio</p>
                <div class="form-row-2">
                  <div class="form-holder">
                    <select class="style_select" name="place-state" id="place-state">
                    </select>
                  </div>
                  <div class="form-holder">
                    <select class="style_select" name="place-city" id="place-city">
                      <option>Cargando ciudades</option>
                    </select>
                  </div>                
                </div> 
                <div class="form-row-2">
                  <div class="form-holder">
                    <input type="text" name="place-neighborhood" placeholder="Barrio" class="form-control-input bl2">
                  </div>
                  <div class="form-holder">
                    <input type="text" name="address" placeholder="Dirección" class="form-control-input bl2">
                  </div>                
                </div> 
                <div class="form-row-2">
                  <div class="form-holder">
                    <div class="checkbox-tick">
                      <h6>Tiene servicio de domicilio</h6>
                      <label class="">
                        <input type="radio" name="domicilio" value="si" checked>Si<br>
                        <span class="checkmark"></span>
                      </label>
                      <label class="">
                        <input type="radio" name="domicilio" value="no">No<br>
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div> 
                  <div class="form-holder">
                    <input type="text" name="teldomicilios" placeholder="Telefono para domicilios" class="form-control-input onlynumbers bl2">
                  </div> 
                </div>                           
                <div class="form-row-2 justify-content-center" style="margin-top: 41px;">
                  <a href="#" data-pos="1" class="btn_back_wizard no_link">Atras</a>
                  <a href="#" data-pos="2" class="btn_next_wizard no_link">Siguiente</a>
                </div>
              </div>
            </div>

            <div>
              <div class="contenedor-block-wizard">
                <p>Paso 3</p>
                <br>
                <div class="form-row-2">
                  <div class="form-holder">
                    <div class="checkbox-tick">
                      <h6>Eres cliente de Postobón</h6>
                      <label class="">
                        <input type="radio" name="erescliente" value="si">Si<br>
                        <span class="checkmark"></span>
                      </label>
                      <label class="">
                        <input type="radio" name="erescliente" value="no" checked>No<br>
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div> 
                  <div class="form-holder">
                    <input disabled type="text" name="code_postobon" placeholder="Código cliente" class="form-control-input inputinformation code_postobon onlynumbers">
                    <div class="explicadorinput" data-toggle="tooltip" data-placement="top" title="Solo si eres cliente de Postobón">
                      <span class="ion-ios-information"></span>
                    </div>
                  </div>
                </div>  
                <div class="form-row-2 justify-content-center" style="margin-top: 41px;">
                  <a href="#" data-pos="2" class="btn_back_wizard no_link">Atras</a>
                  <input type="submit" class="btn_upload_wizard no_link" value="Enviar">
                </div>
              </div>
            </div>
          </div>          
        </form>
      </div>
    </div>
  </div>
</section>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="application/javascript" src="<?php echo HTML_DIR ?>js/register.js"></script>
