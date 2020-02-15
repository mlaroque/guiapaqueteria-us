<?php
/**
 * Template Name: Resultados de Sucursales
 */
get_header();

global $post;

$empresa = $_GET['empresa'];
$ciudad = $_GET['ciudad'];

$GLOBALS['empresa'] = $empresa;
$GLOBALS['ciudad'] = $ciudad;

?>



<div class="clearfix"></div>
<div class="container-fluid">
	<!--SOLO SI ES PARTNER 
	<div style="position: absolute; left: 0px; top: 0px; width: 90px; height: 90px">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/img/aliado.png" class="img-responsive" />
	</div>-->

  <div class="container">
    <div class="row">

			<div id="content">
				<div id="main" role="main">


					<div class="container">
    					<div class="row">
							<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
	
								<div class="page-header"><h1 class="page-title"><?php echo $post->post_title; ?> </h1>
								</div>

                                <?php //echo $ciudad; ?>
								<?php echo do_shortcode('[resultados_sucursales]'); ?>
								

							</div>	
 			 
 			 		    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">			 

							<?php get_sidebar();// sidebar 1 ?>
    
</div></div>
					</div>
    			</div>
			</div> <!-- end #content -->
		</div>
	</div>
</div>

<?php get_footer();?>