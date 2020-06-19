<?php
/*
Template Name: Portada Casilleros
*/
?>
<?php 
global $post;
get_header();
$purified_content = apply_filters('the_content',$post->post_content); 
?>

<div class="container">
	<div class="row">
		<div id="primary" class="content-area col-xs-12 col-sm-12 col-md-12 col-lg-12 infoLPp">
			<main id="main" class="site-main" role="main">


<div class="container">
	<div class="row">
		<div class="col-12">
			<?php echo get_template_part("inc/template","breadcrumbs"); ?>
		</div>
	</div>
</div>

			
<article id="post-15" class="post-15 page type-page status-publish hentry">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<header class="entry-header">
					<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
				</header>
			</div>
		</div>
	</div>

	<div class="entry-content">
	
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	 		<?php echo $purified_content;?>
	 	</div>
	</div>



		<div class="clearfix"></div>
<div class="row">
		<?php
		    //Dichiarazione Loop Personalizzato
		    $args = array(
		        'post_type' => 'casilleros',
		        'posts_per_page' => -1,	
		        'orderby' => 'menu_order date',
		        'order' => 'ASC'
		    );

		    $posts = get_posts($args);
		    $count = 0;
		    
		    //Esecuzione Loop Personalizzato

		    foreach($posts as $post_casilleros):

		      $count = $count + 1;  
		?>
 	
		<div id="<?php echo $post_casilleros->post_title; ?>" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 result-div">
			<div class="LEmpresas">
				<a href="<?php echo esc_url( get_permalink($post_casilleros->ID)); ?>">
					<div class="boxcon text-center">
						<div class="boxconImgCasil">
							<img src="<?php echo get_the_post_thumbnail_url($post_casilleros->ID); ?>" alt="Toda la información sobre <?php echo $post_casilleros->post_title; ?>">
						</div>
						<div class="LEmpresasname">
	 						<p class="text-center"><b><?php echo $post_casilleros->post_title; ?></b></p>
	 					</div>
					</div>
				</a>
			</div>
		</div>
		<?php
			endforeach;
		?>   

	</div>
</div>
	


<div class="clearfix"></div>
	</div><!-- .entry-content -->

			

	</article><!-- #post-## -->
</main></div></div></div>

<?php get_footer();?>