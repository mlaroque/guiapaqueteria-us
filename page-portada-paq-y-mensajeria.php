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

			
<article id="post-15" class="post-15 page type-page status-publish hentry">
	<header class="entry-header">
		<h1 class="entry-title">Empresas de Servicios de Paquetería y Mensajería</h1>	</header><!-- .entry-header -->

	<div class="entry-content">
	

<!--INDICE-->
<!-- TODO indice dinámico -->
<div class="col-12 col-sm-5 col-md-4 col-lg-4">
	<div class="indice-A">
		<p class="text-center"><b>Indíce</b></p>
			<ol class="list-group list-group-indice-A">
			 	<li class="list-group-item"><a href="#">¿Qué es?</a></li>
			 	<li class="list-group-item"><a href="#">Servicios de paquetería y mensajería</a></li>
			 	<li class="list-group-item"><a href="#">Empresas de Paquetería y Mensajería</a></li>
			 	<li class="list-group-item"><a href="#">Paqueterías cerca de ti</a></li>
			 	<li class="list-group-item"><a href="#">Buscador de sucursales</a></li>
			</ol>
   	</div>
</div>
<!--// FIN INDICE-->

<?php
ob_start();
echo do_shortcode('[listado_paqueterias]');
$listado_paqueterias = ob_get_clean();

$purified_content = preg_replace('/<h2(.*)>(Paqueterías de Envíos en USA)<\/h2>/', '<h2$1>$2</h2>'.$listado_paqueterias, $purified_content)
?>

<div class="clearfix"></div>

 <h2>Buscar Paqueterías Near Me</h2>
<div class="buscaSuc">
<div class="buscasucursales">

<div class="col-xs-12 col-sm-5	 col-md-5 col-lg-5">
    <div class="form-group">
      <label>Ciudad</label>
    <select id="estado" class="form-control input-lg">
      <option value="ciudad-de-mexico">Ciudad de México</option>
    </select>
    </div>
</div>
<div class="col-xs-12 col-sm-4 col-md-5 col-lg-5">
    <div class="form-group">
        <label>Empresa</label>
      <select id="paqueterias" class="form-control input-lg">
          <option value="0">Todas</option>
      </select>
    </div>
</div>

<div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
  <div class="form-group">
    <label class="hidden-xs">&nbsp;</label>
    <button class="btn btn-verde btn-lg btn-block" type="submit" onclick="buscar_sucursales();">Buscar</button>
  </div>
</div>
</div>
</div>

<?php echo $purified_content;?>


<div class="clearfix"></div>
<h2>Paqueterías en</h2>
<ul class="SUCFilter">
			<li><a href="https://guiapaqueteria.com/paqueterias-en-estado/aguascalientes/">Aguascalientes</a></li>
			<li><a href="https://guiapaqueteria.com/paqueterias-en-estado/baja-california/">Baja California</a></li>
			<li><a href="https://guiapaqueteria.com/paqueterias-en-estado/baja-california-sur/">Baja California Sur</a></li>
			<li><a href="https://guiapaqueteria.com/paqueterias-en-estado/campeche/">Campeche</a></li>
			<li><a href="https://guiapaqueteria.com/paqueterias-en-estado/chiapas/">Chiapas</a></li>
			<li><a href="https://guiapaqueteria.com/paqueterias-en-estado/chihuahua/">Chihuahua</a></li>
			<li><a href="https://guiapaqueteria.com/paqueterias-en-estado/paqueterias-en-ciudad-de-mexico/">Ciudad de México</a></li>
			<li><a href="https://guiapaqueteria.com/paqueterias-en-estado/coahuila-de-zaragoza/">Coahuila de Zaragoza</a></li>
			<li><a href="https://guiapaqueteria.com/paqueterias-en-estado/colima/">Colima</a></li>
			<li><a href="https://guiapaqueteria.com/paqueterias-en-estado/durango/">Durango</a></li>
			<li><a href="https://guiapaqueteria.com/paqueterias-en-estado/guanajuato/">Guanajuato</a></li>
			<li><a href="https://guiapaqueteria.com/paqueterias-en-estado/guerrero/">Guerrero</a></li>
			<li><a href="https://guiapaqueteria.com/paqueterias-en-estado/hidalgo/">Hidalgo</a></li>
			<li><a href="https://guiapaqueteria.com/paqueterias-en-estado/jalisco/">Jalisco</a></li>
			<li><a href="https://guiapaqueteria.com/paqueterias-en-estado/de-mexico/">México</a></li>
			<li><a href="https://guiapaqueteria.com/paqueterias-en-estado/michoacan/">Michoacán</a></li>
			<li><a href="https://guiapaqueteria.com/paqueterias-en-estado/nayarit/">Nayarit</a></li>
			<li><a href="https://guiapaqueteria.com/paqueterias-en-estado/nuevo-leon/">Nuevo León</a></li>
			<li><a href="https://guiapaqueteria.com/paqueterias-en-estado/oaxaca/">Oaxaca</a></li>
			<li><a href="https://guiapaqueteria.com/paqueterias-en-estado/puebla/">Puebla</a></li>
			<li><a href="https://guiapaqueteria.com/paqueterias-en-estado/queretaro/">Querétaro Arteaga</a></li>
			<li><a href="https://guiapaqueteria.com/paqueterias-en-estado/quintana-roo/">Quintana Roo</a></li>
			<li><a href="https://guiapaqueteria.com/paqueterias-en-estado/san-luis-potosi/">San Luis Potosí</a></li>
			<li><a href="https://guiapaqueteria.com/paqueterias-en-estado/sinaloa/">Sinaloa</a></li>
			<li><a href="https://guiapaqueteria.com/paqueterias-en-estado/sonora/">Sonora</a></li>
			<li><a href="https://guiapaqueteria.com/paqueterias-en-estado/tabasco/">Tabasco</a></li>
			<li><a href="https://guiapaqueteria.com/paqueterias-en-estado/tamaulipas/">Tamaulipas</a></li>
			<li><a href="https://guiapaqueteria.com/paqueterias-en-estado/tlaxcala/">Tlaxcala</a></li>
			<li><a href="https://guiapaqueteria.com/paqueterias-en-estado/veracruz/">Veracruz</a></li>
			<li><a href="https://guiapaqueteria.com/paqueterias-en-estado/yucatan/">Yucatán</a></li>
			<li><a href="https://guiapaqueteria.com/paqueterias-en-estado/zacatecas/">Zacatecas</a></li>
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