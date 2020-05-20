<?php
/**
 * The template for displaying all single posts
 */
get_header();
 ?>

<div class="container">
	<div class="row">
		<div id="primary" class="content-area col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<main id="main" class="site-main" role="main">
 
 					 <h1 class="text-left upper"><?php echo $post->post_title; ?></h1>
 					 <?php
					the_content();
					?>
 
				 
			</main> 
		</div> 
	</div> 	
</div>


<!--:::::::::::::::::::::::::::::::TE PODRIA INTERESAR::::::::::::::::::::::::::::::-->
<div class="container-fluid BGgrisC">
	<div class="container">
	<div class="row">
		<div class="fastGuides clearfix">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h4 class="text-center">TE PODRIA INTERESAR:</h4>
			</div>

			<div class="clearfix"></div>
    
			    <?php
   
    				$args = array( 
    							'post_type' => 'guias',
    							'posts_per_page'  => 6,
    							'orderby'        => 'rand'
    							);
					$query = new WP_Query( $args );
    					
    				while ( $query->have_posts() ) :
    				
    				$current_post = $query->the_post();
			    ?>


			    <div class="col-xs-12 col-sm-6 col-md-12 col-lg-12 text-left fastGuid">
			    	<a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>"> 
			    		<div class="cont">
				    		<img src="<?php echo get_the_post_thumbnail_url($current_post->ID, array( 150, 150) ); ?>" class="img-responsive">
				    		<h3><?php the_title(); ?></h3>
				    		<p><?php echo wp_trim_words(  get_the_content(), 40, '...' );?></p>
				    	</div>
			    	</a>
			    </div>
			    <?php
			    
			    		endwhile;
			    		wp_reset_postdata();
			    ?>
		</div>
	</div>
</div>
</div>
			
<!--:::::::::::::::::::::::::::::::TE PODRIA INTERESAR::::::::::::::::::::::::::::::-->




<?php get_footer(); ?>