<?php
/*
Template Name: Portada paqueteria y mensajeria
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
	<header class="entry-header">
		<h1 class="entry-title">Empresas de Servicios de Paquetería y Mensajería</h1>	</header><!-- .entry-header -->

		<div class="lc_ads">
			<div id="adsense_submenu" class="lc_ads_links lazy-ads"></div>
		</div>

	<div class="entry-content">
	

 <?php //echo get_template_part('inc/template', 'indice-contenido'); ?>
 

	<?php ob_start(); 
	echo do_shortcode('[buscador_sucursales]');
	$buscador = ob_get_clean(); ?>
	<?php $purified_content = preg_replace('/<h2(.*)>(Buscar.*)<\/h2>/', '<h2$1>$2</h2>'.$buscador, $purified_content); ?>


	<?php
	ob_start();
	echo do_shortcode('[listado_paqueterias]');
	$listado_paqueterias = ob_get_clean();

	// $purified_content = preg_replace('/<h2(.*)>(Paqueterías de Envíos en USA)<\/h2>/', '<h2$1>$2</h2>'.$listado_paqueterias, $purified_content);
?>

<?php echo $purified_content;?>

<div class="clearfix"></div>

<?php  
	$args = array(
		'post_type' => 'paqueterias-en',
		'posts_per_page' => -1,
		'orderby' => 'title',
		'order' => 'ASC'
	);

	$posts = get_posts($args);
?>
<!-- LISTADO DE ENLACES A PAQUETERIAS EN CIUDAD -->
<ul class="SUCFilter">
		<?php foreach($posts as $paqueteria): ?>
			<li><a href="<?php echo get_permalink($paqueteria->ID); ?>"> <?php echo get_the_title($paqueteria->ID); ?> </a></li>
		<?php endforeach; ?>
</ul>

<br>
<hr>

<h2>Sucursales más buscadas</h2>
 	<ul class="threeColist">
		<li><a href="https://guiapaqueteria.com/us/empresas/dhl/houston/">Paqueterías DHL en Houston</a></li>
		<li><a href="https://guiapaqueteria.com/us/empresas/dhl/las-vegas/">Paqueterías DHL en Las Vegeas</a></li>
		<li><a href="https://guiapaqueteria.com/us/empresas/estafeta/houston/">Paqueterías Estafeta en houston</a></li>
		<li><a href="https://guiapaqueteria.com/us/empresas/fedex/chicago/">Paqueterías Fedex en Chicago</a></li>
		<li><a href="https://guiapaqueteria.com/us/empresas/fedex/las-vegas/">Paqueterías Fedex en Las Vegas</a></li>
		<li><a href="https://guiapaqueteria.com/us/empresas/fedex/seattle/">Paqueterías Fedex en Seattle</a></li>
		<li><a href="https://guiapaqueteria.com/us/empresas/pakmail/denver/">Paqueterías Pakmail en Denver</a></li>
		<li><a href="https://guiapaqueteria.com/us/empresas/ups/chicago/">Paqueterías UPS en Chicago</a></li>
		<li><a href="https://guiapaqueteria.com/us/empresas/ups/houston/">Paqueterías UPS en Houston</a></li>
		<li><a href="https://guiapaqueteria.com/us/empresas/ups/las-vegas/">Paqueterías UPS en Las Vegas</a></li>
		<li><a href="https://guiapaqueteria.com/us/empresas/ups/seattle/">Paqueterías UPS en Seattle</a></li>
		<li><a href="https://guiapaqueteria.com/us/empresas/usps/chicago/">Paqueterías USPS en Chicago</a></li>
		<li><a href="https://guiapaqueteria.com/us/empresas/usps/las-vegas/">Paqueterías USPSen Las Vegas</a></li>
		<li><a href="https://guiapaqueteria.com/us/empresas/usps/seattle/">Paqueterías USPS  en Seattle</a></li>
	</ul>
<div class="clearfix"></div>
	</div><!-- .entry-content -->

			

	</article><!-- #post-## -->
</main></div></div></div>

<?php get_footer();?>
<script async src="<?php echo get_template_directory_uri(); ?>/js/ads/main.js"></script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script async src="<?php echo get_template_directory_uri(); ?>/js/ads/empresas-paqueteria-mensajeria.js"></script>