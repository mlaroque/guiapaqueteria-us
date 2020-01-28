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

			 		ob_start();
			 		echo do_shortcode('[tabla_envios tipo="documento"]');
			 		echo do_shortcode('[tabla_envios tipo="1kg"]');
			 		echo do_shortcode('[tabla_envios tipo="5kg"]');
			 		echo do_shortcode('[tabla_envios tipo="30kg"]');
			 		$tablas_envios = ob_get_clean();

			 		$purified_content = preg_replace('/<h2(.*?)>(.*?)recios(.*?)<\/h2>/','<h2$1>$2recios$3</h2>'.$tablas_envios,$purified_content);

			 		echo $purified_content;

			 		get_template_part("inc/template","rutas-hijas-listado");
			 		get_template_part("inc/shortcodes/banner","cotizar");
			 		$post_parent = $post->post_parent;
			 		if($post_parent == 0){
			 			$post_parent = $post->ID;
			 		}
			 		$categories = get_the_category($post_parent);
			 		$cat = "";
			 		foreach($categories as $category){
			 			$cat .= $category->term_id .",";
			 		}
			 		rtrim($cat,",");
			 		$tags = get_the_tags($post_parent);
			 		$tag = "";
			 		foreach($tags as $etiqueta){
			 			$tag .= $etiqueta->slug . ",";
			 		}
			 		rtrim($tag,",");
			 		get_template_part("inc/shortcodes/guias","relacionadas");
			 		get_template_part("inc/template","rutas-padres-listado");
			 	?>

					
			</main> 
		</div>
		</div> 
	</div> 	
</div>


<?php get_footer(); ?>