<?php
/**
 * The template for displaying all single posts
 */
get_header();
global $post;
 ?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<?php echo get_template_part("inc/template","breadcrumbs"); ?>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div id="primary" class="content-area col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<main id="main" class="site-main" role="main">

				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 logoEmp marPad0">
					 <h1 class="text-left upper"><?php the_post_thumbnail('medium'); ?> <?php echo $post->post_title; ?></h1>
					 <div id="adsense_submenu" class="lc_ads lazy-ads"></div>
				</div>

					<div class="clearfix"></div>



					<?php
					the_content();
					?>
					<?php echo do_shortcode('[resultados_sucursales ciudad="'.str_replace("-"," ",$post->post_name).'"]'); ?>
					
					<h2 class="text-center">Paqueterías en otras ciudades</h2>
					<?php get_template_part("inc/shortcodes/paqueterias-en-listado"); ?>
			</main> 
		</div> 
	</div> 	
</div>


<?php get_footer(); ?>
<script async src="<?php echo get_template_directory_uri(); ?>/js/ads/main.js"></script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script async src="<?php echo get_template_directory_uri(); ?>/js/ads/paqueterias_en.js"></script>
