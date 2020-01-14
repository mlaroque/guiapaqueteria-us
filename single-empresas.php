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

<div class="infoLPp">
					<!--:::::::::::::::::::::::::::::::::: NOME E STELLE :::::::::::::::::::::::::::::::-->
					 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				 
								<div class="col-md-9 col-sm-4 col-xs-12 logoBig">
									<h1>
										<?php the_post_thumbnail('medium'); ?>
 										<?php echo $post->post_title; ?></h1>
								</div>



							<!--	<div class="col-md-3 col-sm-8 col-xs-12 pull-right text-center starBoxstar">
												<h2 class="bigRat text-center"><?php echo $average_brand_stars; ?></h2>
												<?php for ($x = 0; $x < 5; $x++): ?>
												<i class="fa <?php echo $stars[$x]; ?>" aria-hidden="true"></i>
												<?php endfor; ?>
												<p class="vopi"><a href="#opiniones">Ver Opiniones</a></p>
								</div>-->


					</div>

					<!--:::::::::::::::::::::::::::::::::: ///NOME E STELLE :::::::::::::::::::::::::::::::-->
					


<!--:::::::::::::::::::::::::::::::::: SCHEDA PAQUETERIA ::::::::::::::::::::::::::::::: 
				
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 wellinfoLP" itemscope itemtype="http://schema.org/Organization">

						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<p class="text-left">
								<b>Teléfono</b>
								<span itemprop="telephone"><?php echo get_post_meta( $post->ID, 'paqueteria_tel', true ); ?></span>
							</p>
							<p class="text-left">	
								<b>www:</b>
								<a itemprop="url" href="<?php $url_empresa = get_post_meta( $post->ID, 'paqueteria_web', true ); if (strpos($url_empresa,'http://') === false){
    							$url_empresa = 'http://'.$url_empresa;  }echo $url_empresa;?>" rel="nofollow" target="_blank">	ir a la página oficial</a>
    						</p>
							<p>
								<b>Contacto</b>

								<a itemprop="url" href="<?php $url_empresa = get_post_meta( $post->ID, 'paqueteria_contacto', true ); if (strpos($url_empresa,'http://') === false){
    							$url_empresa = 'http://'.$url_empresa;  }echo $url_empresa;?>" rel="nofollow" target="_blank"> @Contacto</a>

 
							</p>
					</div>	 
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<p class="text-left"><b>Atención telefónica</b><br/>
									<span itemprop="att-telefono"><?php echo get_post_meta( $post->ID, 'paqueteria_att-tel', true ); ?></span>
								</p>
						</div>
				</div>
 
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<ul class="nav nav-pills azul-pills navLP">
					  <li role="presentation" class="active"><a class="menu-item-lps" href="#servicios">Servicios</a></li>
					  <li role="presentation"><a class="menu-item-lps" href="#cotizacion">Cotización</a></li>
					  <li role="presentation"><a class="menu-item-lps" href="#rastreo">Rastreo</a></li>
					  <li role="presentation"><a class="menu-item-lps" href="#faq">Preguntas Frecuentes</a></li>
					  <li role="presentation"><a class="menu-item-lps" href="#list-sucursales">Sucursales</a></li>
				</ul>
				</div>
-->
<div class="clearfix"></div>


					<?php
					the_content();
					?>

					<?php if($post->post_parent > 0): ?>

						<?php get_template_part("inc/sucursales/sucursales","detalles"); ?>
						<?php get_template_part("inc/sucursales/sucursales","listado"); ?>
					<?php endif; ?>
					
			</main> 
		</div>
		</div> 
	</div> 	
</div>


<?php get_footer(); ?>