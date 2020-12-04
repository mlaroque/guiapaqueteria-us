 <?php
 
 $GLOBALS['tracking_no'] = $_GET['tracking_no'];
 $GLOBALS['package_brand'] = $_GET['package_brand'];
 global $wp_query;

 wp_register_script( 'rastreo', get_template_directory_uri() . '/js/rastreador.js', array('jquery'), null, true );
 wp_enqueue_script( 'rastreo' );
 
?>
	
<div class="container-full" id="rrdor">
  	<div class="BGrastre">
<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h1 class="TitHpR blanco">RASTREA TU ENVIO</h1>

          </div>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<!-- ::::::::::::::::::::::::::::::: ESTA ES LA IMAGEN DEL PAQUETE EN EL RASTREADOR; HAY QUE CAMBIARLO CON LOS LOGOS DE LA PAQUETERIA QUE ESTAMOS VISITANDO: EL PAQUETITO SE QUEDA SOLO EN PORTADA O EN LAS PAGINAS GENERICAS QUE CREAREMOS, o HA QUE SER BRANDIZZATO :::::::::::::::::::: -->
	<?php 
		
		$image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array('125','125') ); echo $image;
		$img_src = "http://guiapaqueteria.com/us/wp-content/themes/guiapaqueteria-child/images/box.png";
		if ( $image_attributes  && $post->post_type === 'paqueteria'){
				$img_src = $image_attributes[0];
		}
					
	?>
	<!--
<div class="col-xs-12 col-sm-12 col-md-1 col-g-1">
<center><img src="<?php echo $img_src; ?>" class="img-responsive img-paq"></center>
</div>-->

<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" id="selectPaqueteria">
<select class="form-control input-lg" id="tracker_select">
 <option value=" ">Selecciona Paquetería</option>
	<option value="dhl">DHL</option>
	<option value="fedex">Fedex</option>
	<option value="ups">UPS</option>
	</select>

</div>
	
	
<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
<input type="text" class="form-control input-lg"  id="tracking_field" placeholder="número de rastreo">
<?php

$args = array(
		'post_type' => 'paqueteria',
		'posts_per_page'=>-1
	);

$contact_posts = get_posts($args);

foreach($contact_posts as $contact_post):

	if(get_post_meta( $contact_post->ID, 'paqueteria_tel', true )):
?>
<input id="hidden_telefono_<?php echo $contact_post->post_name;?>" type="hidden" value="<?php echo get_post_meta( $contact_post->ID, 'paqueteria_tel', true ); ?>">
<input id="hidden_web_<?php echo $contact_post->post_name;?>" type="hidden" value="<?php echo get_post_meta( $contact_post->ID, 'paqueteria_web', true ); ?>">
<?php endif; endforeach; ?>
<input id="hidden_post_id" type="hidden" value="<?php echo $post->ID; ?>">

<input id="sidebar_element" type="hidden" value="<?php echo $sidebar; ?>">
<input id="url_paqueteria" type="hidden" value="<?php echo $wp_query->query_vars['url_paqueteria']; ?>">
</div>


<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
	<a onclick="rastreo();" class="btn btn-naranja btn-lg center-block" href="#" ">RASTREAR</a>
</div>
			

			</div>
</div>
</div>
	</div>
</div>
						
						
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div id="loadingDiv"><div style='text-align:center;padding: 20px;'><img class="js-lazy-image" src='<?php echo get_stylesheet_directory_uri(); ?>/images/ajax-loader.gif'/></div></div>
			
			<?php if(!$sidebar): ?>
			<div style="text-align:center;padding-top: 20px;">
					<?php
					global $post;
					
					?>
						
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<!-- Guiapaqueteria Submenu Responsive -->
					<ins class="adsbygoogle"
					     style="display:block"
					     data-ad-client="ca-pub-7600038231425274"
					     data-ad-slot="6409799093"
					     data-ad-format="link"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
					</p>

			</div>
			<?php endif; ?>

			<div id="tracking_message"></div>
									<table cellpadding="10" celspacing="10" id="tracking_table" style="display:none">
									<thead>
									<tr class="BGareomex">
									<th>No. guia</th>
									<th>Origen</th>
									<th>Destino</th>
									<th>Fecha documentación</th>
									<th>Fecha embarque</th>
									<th>Fecha entrega</th>
									<th>Dirección entrega</th>	
									</tr>
									</thead>
									<tbody>
									<tr>
									<td data-label="No. guia">&nbsp;<span id="tracking_number"></span></td>
									<td data-label="Origen">&nbsp;<span id="origin"></span></td>
									<td data-label="Destino">&nbsp;<span id="destination"></span></td>
									<td data-label="Fecha documentación">&nbsp;<span id="date_begin"></span></td>
									<td data-label="Fecha embarque">&nbsp;<span id="date_sent"></span></td>
									<td data-label="Fecha entrega">&nbsp;<span id="date_delivery"></span></td>
									<td data-label="Dirección entrega">&nbsp;<span id="address"></span></td>
									</tr>
									</tbody>
									</table>
									
									<table celspacing="3" id="tracking_table_enviaya" style="display:none">		
									<thead>
									<tr class="BGareomex">
										<th><p>ACTIVIDAD</p></th>
										<th><p>FECHA</p></th>
										<th class="showHeaders"><p>CÓDIGO POSTAL</p></th>
										<th class="showHeaders"><p>CIUDAD</p></th>
										<th class="showHeaders"><p>PAÍS</p></th>
										<th class="showHeaders"><p>RECIBIDO POR / NOTA</p></th>
									</tr>
									</thead>
									<tbody class="tracking_lines">
									</tbody>
									</table>									
									
									
									<div style="width:100%;height:10px;"></div>
									<p><span id="delivered_to"></span></p>
</div>


<div style="text-align:center;">
<iframe frameborder="0" src="" marginheight="1" marginwidth="1" name="cboxmain" id="cboxmain" seamless="seamless" frameborder="0" allowtransparency="true"  class="tracking_frame"></iframe>
</div>

<script type="text/javascript">

	var tracking_no = "<?php global $tracking_no; echo $tracking_no;?>";
	var package_brand = "<?php global $package_brand; echo $package_brand;?>";

</script>
