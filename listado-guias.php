<?php
/**
 * Template Name: listado Guias
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package LaComuna-Theme
 */

get_header(); ?>
	

<div class="container">
	<div class="row">
		<div id="primary" class="content-area col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<main id="main" class="site-main" role="main">

				<h1><?php echo $post->post_title; ?></h1>

<p>&nbsp;</p>

 <?php
    //Dichiarazione Loop Personalizzato
    $args = array(
        'post_type' => 'guias',
        'posts_per_page' => -1,
        'orderby' => 'menu_order date',
        'order' => 'ASC'
    );

    $posts = get_posts($args);
    $count = 0;
    
    //Esecuzione Loop Personalizzato

    foreach($posts as $post_guias):

      $count = $count + 1;  
?>


<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 PGpostList">
	<div class="page-header">
		<h1>
			<a href="<?php echo esc_url( get_permalink($post_guias->ID)); ?>">
				<?php echo $post_guias->post_title; ?>
			</a>
		</h1>
	</div>

 	<div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
 		<a href="<?php echo esc_url( get_permalink($post_guias->ID)); ?>">
 			<img src="<?php echo get_the_post_thumbnail_url($post_guias->ID); ?>">
 		</a>
 	</div>

 	<div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
 		<p><?php echo wp_trim_words( $post_guias->post_content, 55, '...' );?>
		<a href="<?php echo esc_url( get_permalink($post_guias->ID)); ?>" class="more-link">Read more »</a></p>
 	</div>
 </div>

 <?php
	endforeach;
?>   










			</main> 
		</div>
		</div> 
	</div> 	
</div>

<?php
get_footer();
