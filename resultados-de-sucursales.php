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
	 

  <div class="container">
    <div class="row">

			<div id="content">
				<div id="main" role="main">


					<div class="container">
    					<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	
								<div class="page-header"><h1 class="page-title"><?php echo $post->post_title; ?> </h1>
								</div>

                                <?php //echo $ciudad; ?>
								<?php echo do_shortcode('[resultados_sucursales]'); ?>
								

							</div>	
 			 
 			 		  
 			 		  </div>
					</div>
    			</div>
			</div> <!-- end #content -->
		</div>
	</div>
</div>

<?php get_footer();?>