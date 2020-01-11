<?php

global $filter_paqueteria;
global $codigo_postal;
global $colonia;
global $ciudad;
global $estado;
$suc_rows = array();

if($codigo_postal && $codigo_postal !== ""){
	$suc_rows_codigo = $wpdb->get_results( "SELECT * FROM LCMN_SUCURSALES_DETALLES WHERE CODIGO_POSTAL = " . trim($codigo_postal) . "" . $filter_paqueteria . " ORDER BY CODIGO_POSTAL");

	foreach($suc_rows_codigo as $suc_row_codigo){
		$suc_rows[$suc_row_codigo->ID] = $suc_row_codigo;
	}
}


$suc_rows_municipio = $wpdb->get_results( "SELECT * FROM LCMN_SUCURSALES_DETALLES WHERE CIUDAD = '" . trim($ciudad) . "'" . $filter_paqueteria . " ORDER BY CODIGO_POSTAL" );

foreach($suc_rows_municipio as $suc_row_municipio){
	if (!isset($suc_rows[$suc_row_municipio->ID])) {
		$suc_rows[$suc_row_municipio->ID] = $suc_row_municipio;
	}
}

if((!$codigo_postal || $codigo_postal == "") && (!$ciudad || $ciudad == "") && $estado){
	$estado = str_replace("-", " ", $estado);
	$suc_rows_estados = $wpdb->get_results( "SELECT * FROM LCMN_SUCURSALES_DETALLES WHERE DEPARTAMENTO = '" . trim($estado) . "'" . $filter_paqueteria . " ORDER BY CODIGO_POSTAL" );

	foreach($suc_rows_estados as $suc_rows_estado){
		if (!isset($suc_rows[$suc_rows_estado->ID])) {
			$suc_rows[$suc_rows_estado->ID] = $suc_rows_estado;
		}
	}
}


?>
						<?php
								$count = 1;
								foreach ( $suc_rows as $suc_row ):

										$show_row = "display:none;";
									if($count <= 8){
										$show_row = "";
									}

										$sucursales_posts = get_posts($args);

										$post_detalles = get_post($suc_row->POST_ID);

										$id_class =  strtolower(str_replace(" ", "-", $suc_row->CODIGO_POSTAL));
										$id_class_paq = strtolower(str_replace(" ", "-", $post_detalles->post_name));

									?>

<div class="well well-sm marPad0 blacoBG colonia-<?php echo $id_class; ?> paqueteria-<?php echo $id_class_paq; ?>" style="margin-bottom: 10px; <?php echo $show_row; ?>">	
<div class="row">

	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
 	<h4 class="text-center"><img src="<?php echo get_the_post_thumbnail_url($post_detalles->post_parent); ?>" class="img-circle" width="70"></h4>
	</div>

	<div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
			<div class="i-scheda">

								 <h4 class="text-left"><b><?php echo $suc_row->NOMBRE; ?></b> </h4>
									 <p class="grisDk text-left"><b>Dirección: </b> <?php echo $suc_row->CALLE; ?>, <?php echo $suc_row->CIUDAD; ?>, <?php echo $suc_row->DEPARTAMENTO; ?>, <?php echo $suc_row->CODIGO_POSTAL; ?></p>
									 <p class="grisDk text-left"><b>Horarios: </b> Lunes: <?php echo $suc_row->HOR_LUNES;?> Martes:<?php echo $suc_row->HOR_MARTES;?> Miércoles:<?php echo $suc_row->HOR_MIERCOLES;?> Jueves:<?php echo $suc_row->HOR_JUEVES;?> Viernes:<?php echo $suc_row->HOR_VIERNES;?> Sábado:<?php echo $suc_row->HOR_SABADO;?></p> 
									 <p class="grisDk text-left " class="grisDk"><b>Teléfono: </b><?php echo $suc_row->TELEFONO; ?></p>
									
         </div>
		</div>
	</div>
		<div class="clearfix"></div>
 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 btninfosuc">

<table>
<tr>
<td width="50%" class="btninfosucrdr">
	<p class="grisDk text-right small marPad0"><b><a class="grisDk small"  href="<?php echo get_permalink($post_detalles->post_parent); ?>">Perfil de Empresa</a></b></p>
        </td>
        <td >
			  <p class="grisDk text-left small marPad0"><b><a class="grisDk small" href="<?php echo get_permalink($suc_row->POST_ID); ?>">Ver Detalles</a></b></p>
</td>
</tr>
</table>
	</div>

</div>
</div>
 								<?php
 								$count += 1;
									 endforeach;

								?>
								<?php if($count > 8): ?>
								<button class="btn btn-verde btn-lg btn-block" onclick="jQuery('.blacoBG:hidden').slice(0,8).show();" style="text-align:center;" id="ver_mas_btn">Ver más</button>
								<div class="clearfix"></div>
								<?php endif; ?>