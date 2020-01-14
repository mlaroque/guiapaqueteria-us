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
				<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">

 					 <h1 class="text-left upper"><?php echo $post->post_title; ?></h1>
 					 <?php
					the_content();
					?>
				</div>

				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">			
					<?php get_sidebar(); // sidebar 1 ?>
				 </div>
			</main> 
		</div> 
	</div> 	
</div>


<?php get_footer(); ?>