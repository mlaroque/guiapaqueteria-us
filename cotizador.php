
<div class="col-md-12 text-center">   
  <h2 class="blanco upper">COTIZA AQUÍ</h2>
    <small><a class="pointer blanco" data-toggle="modal" data-target=".antesdecotizar"><b>Importante</b>: Antes de Cotizar</a></small>
  <div class="stepwizard">
      <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
        <span class="step">1</span>
        </div>
        <div class="stepwizard-step">
        <span class="step">2</span>
        </div>
        <div class="stepwizard-step">
        <span class="step">3</span>
        </div>
        <div class="stepwizard-step">
        <span class="step">4</span>
        </div>
      </div>
  </div>
</div>
<div class="clearfix"></div>

<form id="regForm" action="https://guiapaqueteria.com/us/resultados-de-cotizacion/" autocomplete="off">
  <div class="clearfix"></div>
  <div class="col-xs-12 col-sm-12 col-lg-12">
  <!-- One "tab" for each step in the form: -->
    <div class="tab">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <h3>Selecciona tu tipo de Envío</h3>
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group sendPaq">
              <div class="checkbox text-center">
                  <input type='radio' name='doc_or_package' value='Package' id="paq"/>
                  <label for="paq"></label> 
                  <h6>Paquete</h6>
              </div>
            </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group sendDoc">
              <div class="checkbox text-center">
                  <input type="radio" name="doc_or_package" value="Document" id="doc"/>
                  <label for="doc"></label> 
                  <h6>Documento</h6>
              </div>
            </div>
          </div>
       
      </div>
    </div>
  </div>
   <!-- <div class="tab">
      <h3>Tu envío es:</h3>
 
      <div class="checkbox text-center">
     
          <label>
            <input name="q_envio_nacional" class="seguroIn" type="radio" id="q_envio_nacional" value="option1" checked="checked"> &nbsp;Nacional</label>
          <label>
          <input name="q_envio_nacional" class="seguroIn" type="radio" id="q_envio_internacional" value="option2">  &nbsp;Internacional 
        </label>
      </div>
    </div>-->

    <div class="tab">
      <h3>¿Hacia dónde lo envías?</h3>
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="country_origen_block">
          <div class="form-group"> 
            <label for="">ORIGEN (Desde)</label>
              <select name="country_origen" id="country_origen" class="form-control">
                <!--<?php //include 'inc/cotizador/international-codes-select-list.php';?>-->
                <option value="US">Estados Unidos</option>
                <option value="MX">México</option>
              </select>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
              <label for="">ORIGEN (C.P.)</label>
             <input class="form-control input-lg autocompletar_from" id="from_keyword_se" placeholder="Código Postal" type="text" autocomplete="noauto-origen" autofill="off" name="ciudad_origen">
            <input type="hidden" value="" class="input-lg" name="from_keyword_id_se" id="from_keyword_id_se" />
          </div>
        </div>



             <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="country_destino_block">
          <div class="form-group"> 
            <label for="">DESTINO (Hacia)</label>
              <select name="country_destino" id="country_destino" class="form-control">
                <!--<?php //include 'inc/cotizador/international-codes-select-list.php';?>-->
                <option value="MX">México</option>
              </select>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
              <label for="">DESTINO (C.P.)</label>
              <input class="form-control input-lg autocompletar_to" id="to_keyword_se" placeholder="Código Postal" type="text" autocomplete="new-password"  name="ciudad_destino">
              <input type="hidden" value="" class="input-lg" name="to_keyword_id_se" id="to_keyword_id_se" />
          </div>
        </div>






      </div><!--row-->
       </div> <!--tab-->
       
    

    <div class="tab tab_paqueteria"><h3 class="tab_paq_title">Introduce las medidas</h3>
      <div class="row sub_tab_paqueteria">
      <?php if(false && is_user_logged_in()): ?>
        <div class="package_container">
          <div class="col-md-6" id="package_length_container">
            <div class="form-group">
                <label for="">Largo <small>(cm)</small></label>
                <input class="form-control input-lg" id="package_length" type="number" placeholder="Ej. 20" name="package_length" type="text" step="0.5" min="0" value="0">
            </div>
          </div>
          <div class="col-md-6" id="package_width_container">
            <div class="form-group">
                <label for="">Ancho <small>(cm)</small></label>
                <input class="form-control input-lg" id="package_width" type="number" placeholder="Ej. 20" name="package_width" type="text" step="0.5" min="0" value="0" pattern="[0-9]?(.5)?" required>
            </div>
          </div>
          <div class="col-md-6" id="package_height_container">
            <div class="form-group">
                <label for="">Alto <small>(cm)</small></label>
                <input class="form-control input-lg" id="package_height" type="number" placeholder="Ej. 20" name="package_height" type="text" step="0.5" min="0" value="0">
            </div>
          </div>
          <div class="col-md-6" id="package_weight_container">
            <div class="form-group">
                <label for="">Peso <small>(Kg)</small></label>
                <input class="form-control input-lg" id="package_weight" type="number" placeholder="Ej. 20" name="package_weight" type="text" step="0.5" min="0" value="0">
            </div>
          </div>
        </div>
        <div class="document_container">
          <div class="col-md-12">
            <div class="form-group">
                <label for="">Peso <small>(Kg)</small></label>
                <input class="form-control input-lg" id="doc_weight" type="number" placeholder="Ej. 20" name="doc_weight" type="text" step="0.5" value="0" min="0">
            </div>
          </div>
        </div>
      <?php else: ?>
      <div class="package_container">
      <div class="col-xs-4 col-md-2" id="">
        <div class="form-group">
          <label for="">No. de <small>Paquetes</small> </label>
          <input class="form-control input-lg input_paqueteria"  placeholder="" id="number_packages" name="number_packages[]" value="1" type="number">
        </div>
      </div>
      <div class="col-xs-4 col-md-2" id="package_length_container">
        <div class="form-group">
          <label for="">Largo <small>(cm)</small></label>
          <input class="form-control input-lg input_paqueteria" id="package_length"  placeholder="" name="package_length[]"  type="number">
        </div>
      </div>
      <div class="col-xs-4 col-md-2" id="package_width_container">
        <div class="form-group">
          <label for="">Ancho <small>(cm)</small></label>
          <input class="form-control input-lg input_paqueteria" id="package_width"  placeholder="" name="package_width[]" type="number" >
        </div>
      </div>
      <div class="col-xs-4 col-md-2" id="package_height_container">
        <div class="form-group">
          <label for="">Alto <small>(cm)</small></label>
          <input class="form-control input-lg input_paqueteria" id="package_height"  placeholder="" name="package_height[]" type="number" >
        </div>
      </div>
      <div class="col-xs-4 col-md-2" id="package_weight_container">
        <div class="form-group">
          <label for="">Peso <small>(Kg)</small></label>
          <input class="form-control input-lg" id="package_weight" placeholder="" name="package_weight[]" type="number">
        </div>
      </div>
      <div class="removeButton" style="display:none;">
        <div class="col-xs-4 col-md-2 col-lg-2 text-center">
          <div class="form-group blanco">
            <a href="#" class="btn btn-danger btn-lg bin" onclick="remove_link(this);"><img src="https://guiapaqueteria.com/wp-content/themes/guiapaqueteria-child/images/bin.png"></span></a>
          </div>
        </div>
      </div>
<!--<div class="clearfix"></div><hr class="my"><div class="clearfix"></div>-->
    </div>
    </div>
 <h6 class="agregar_div"><a href="" class="clone-link" onclick="return false;"><b class="blanco">Agregar otro paquete</b></a>  <!--<a href="#" type="button" data-toggle="modal" data-target=".maspaquetes"><div class="stepwizard-step"><span class="step"><b>?</b></span></div></a>--></h6>
 
      
      <?php endif; ?>
      <div class="document_container">
          <div class="col-md-12">
            <div class="form-group">
                <label for="">Peso <small>(Kg)</small></label>
                <input class="form-control input-lg" id="doc_weight" type="number" placeholder="Ej. 20" name="doc_weight" type="text" step="0.5" value="0" min="0">
            </div>
          </div>
      </div> 
      


          
        
    </div>


    <div class="tab"><h3>¿Quieres Asegurar tu Envío?</h3>
 
      <div class="checkbox">
     
          <input name="q_asegurar" class="seguroIn" type="radio" id="q_asegurar_si" value="option1"> &nbsp;Si</label>
          <label>
          <input name="q_asegurar" class="seguroIn" type="radio" id="q_asegurar_no" value="option2" checked="checked">  &nbsp;No 
        </label>
      </div>
      <div id="valor_asegurado">
        <label for="">Valor del seguro (MXN)</label>
        <input class="form-control input-lg" id="valor_asegurado_txt" placeholder="Valor asegurado" type="text" name="insurance">
      </div>
              <small><a class="pointer" data-toggle="modal" data-target=".info-seguro">Recomendaciones sobre tu Seguro</a></small>

    </div>

    <div>
      <div class="regBtn">
        <button type="button" class="btn btn-azul" id="prevBtn" onclick="nextPrev(-1)">Atrás</button>
        <button type="button" class="btn btn-verde" id="nextBtn" onclick="nextPrev(1)">Seguir</button>
      </div>
    </div>
  </div>


  <div class="clearfix"></div>

</form> 
<!--<p class="text-center blanco small mb5">¿Envías más de un paquete a la misma dirección? <a href="https://envios.guiapaqueteria.com/"><b>Haz Click Aquí</b></a></p>-->
 

 <?php



    wp_register_script('se_init', get_stylesheet_directory_uri() . '/js/se_init.js');
    wp_enqueue_script('se_init', '', array(), 'jquery', true);

    wp_register_script('typeahead', get_stylesheet_directory_uri() . '/js/typeahead.min.js');
    wp_enqueue_script('typeahead', '', array(), 'jquery', true);

    wp_register_script('jquery-validate', 'https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js');
    wp_enqueue_script('jquery-validate', '', array(), 'jquery', true);

    wp_register_script('cotizador_utils', get_stylesheet_directory_uri() . '/js/cotizador_utils.js');
    wp_enqueue_script('cotizador_utils', '' , array(), 'jquery', true);


 ?>
