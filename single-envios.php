<?php
/**
 * The template for displaying all single posts
 */
global $post;
get_header();
$purified_content = apply_filters('the_content',$post->post_content);
 ?>

<div class="container">
	<div class="row">
		<div id="primary" class="content-area col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<main id="main" class="site-main" role="main">

			 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			 			<h1><?php echo $post->post_title; ?></h1>
			 	</div>

			 	<?php 

			 		get_template_part("inc/template","indice-contenido");

			 		echo $purified_content;

			 	?>

					
			</main> 
		</div>
		</div> 
	</div> 	
</div>


<?php get_footer(); ?>