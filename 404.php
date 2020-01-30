<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package LaComuna-Theme
 */

get_header(); ?>

	<div class="container">
	<div class="row">
		<div class="content-area col-xs-12 col-sm-12 col-md-12 col-lg-12">
 
			<section class="error-404 not-found text-center">
				<header class="page-header text-center">
					<h1 class="page-title text-center"><?php esc_html_e( 'Oops! La página que buscaste no se encuentra.', 'lacomuna-theme' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<h2 class="text-center"><?php esc_html_e( 'Puedes seguir navegando nuestra web. ', 'lacomuna-theme' ); ?></h2>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->
 		</div>
	</div>
</div>



<div class="clearfix"></div>

<p><br></p>
<div class="clearfix"></div>



<!--:::::::::::::::::::::: INFO UTILES ::::::::::::::::::::-->

<div class="container-fluid BGgrisC">
<div class="container">
<div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <p><br></p>
          <h3 class="text-center">Lee sobre Empresas</h3><br>
          </div>
<div class="clearfix"></div>


<?php
    //Dichiarazione Loop Personalizzato
    $args = array(
        'post_type' => 'empresas',
        'posts_per_page' => 24,
        'orderby' => 'menu_order date',
        'order' => 'ASC'
    );

    $posts = get_posts($args);
    $count = 0;
    
    //Esecuzione Loop Personalizzato

    foreach($posts as $post_empresas):

      $count = $count + 1;  
?>
<div class="col-xs-6 col-sm-2 col-md-1 col-lg-1 emp404">
	<div class="text-center">
		<a href="<?php echo esc_url( get_permalink($post_empresas->ID)); ?>">
 				<img src="<?php echo get_the_post_thumbnail_url($post_empresas->ID); ?>"  class="img-circle" alt="<?php the_title(); ?>">
 		</a>
	</div>
</div>

      
 <?php
  endforeach;
?>   
<div class="clearfix"></div>
<p><br></p><p><br></p>
<div class="clearfix"></div>

<p class="text-center"><a class="btn btn-naranja btn-lg" href="https://guiapaqueteria.com/us/empresas-de-paqueteria-mensajeria/">VER TODAS</a></p>
<p><br></p><p><br></p>
</div>
</div>
</div>






<!--:::::::::::::::::::::: INFO UTILES ::::::::::::::::::::-->

<div class="container-fluid">
<div class="container">
<div class="row twoColist">
  <p><br></p>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <h3 class="text-center">Lee nuestras Guías</h3><br>
          </div>
<div class="clearfix"></div>

<ul>
<?php
    //Dichiarazione Loop Personalizzato
    $args = array(
        'post_type' => 'guias',
        'posts_per_page' => 12,
        'orderby' => 'menu_order date',
        'order' => 'ASC'
    );

    $posts = get_posts($args);
    $count = 0;
    
    //Esecuzione Loop Personalizzato

    foreach($posts as $post_guias):

      $count = $count + 1;  
?>

      
              <li><a href="<?php echo esc_url( get_permalink($post_guias->ID)); ?>">
              <?php echo $post_guias->post_title; ?>
              </a></li>
      
 <?php
  endforeach;
?>   
</ul>
<div class="clearfix"></div>

<p><br></p>
<p><br></p>
<div class="clearfix"></div>

<p class="text-center"><a class="btn btn-verde btn-lg blanco" href="https://guiapaqueteria.com/us/guias/">LEER TODAS</a></p>


<br><br>
</div>
</div>
</div>




<?php
get_footer();
