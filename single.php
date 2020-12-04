<?php
/**
 * The template for displaying all single posts
 */
get_header();
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
 
 					 <h1 class="text-left upper"><?php echo $post->post_title; ?></h1>
 					 <div id="adsense_submenu" class="lc_ads lazy-ads"></div>
 					 <?php
 					 $purified_content = apply_filters('the_content', $post->post_content);

 					function insert_ads($m) {
    			    		static $matchcount = 0;

    			    		$matchcount++;

							if($matchcount == 1){
								ob_start();?>
									<div id="adsense_1erh2" class="lc_ads lazy-ads"></div>
    					     	<?php return $m[0] . ob_get_clean();// ;
    					    }else if($matchcount == 3){
    					     	ob_start();?>
									<div id="adsense_3erh2" class="lc_ads lazy-ads"></div>
    					     	<?php return $m[0] . ob_get_clean();// ;
    					    }else{
    					    	return $m[0];
    					    }
    					    
    					}


				 		$purified_content = preg_replace_callback('/<h2(.*?)>(.*?)<\/h2>/', 'insert_ads', $purified_content);

					echo $purified_content;
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
				    		<img src="<?php echo get_the_post_thumbnail_url($current_post->ID, array( 150, 150) ); ?>" class="img-responsive js-lazy-image">
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
<script async src="<?php echo get_template_directory_uri(); ?>/js/ads/main.js"></script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script async src="<?php echo get_template_directory_uri(); ?>/js/ads/guias.js"></script>