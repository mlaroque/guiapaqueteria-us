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

				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 logoEmp">
					 <h1 class="text-left upper"><?php the_post_thumbnail('medium'); ?> <?php echo $post->post_title; ?></h1>
					</div>



					<?php
					the_content();
					?>
					
			</main> 
		</div> 
	</div> 	
</div>


<?php get_footer(); ?>