<?php
/*
Template Name: PG RASTREADOR
*/
?>

<?php get_header(); ?>
<div id="content">
<div id="main" role="main">

<!--::::::::::::: RASTREADOR ::::::::::::::-->        
 
          <?php include("rastreador.php"); ?>
   
<div class="clearfix"></div>
<!--::::::::::::: RASTREADOR ::::::::::::::-->     	

<div class="clearfix"></div>

<div class="container">
    <div class="row">
		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">

	<?php $post_content = apply_filters('the_content',$post->post_content); echo $post_content; ?>

		</div>	 
				 
		    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">			 
<?php get_sidebar(); ?>    
</div>		
			</div>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>