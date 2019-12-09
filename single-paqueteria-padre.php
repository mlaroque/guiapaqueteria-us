<?php 

global $post;
date_default_timezone_set('America/Detroit');
$amp_param = $_GET["amp"];

if($amp_param){
	get_header('amp');
}else {
	get_header();
}

$post_name = $post->post_name;
$average_puntualidad = 0;
$average_servicio = 0;
$average_brand_stars = 0;
$total_reviews = 0;
$paginacion = 0;
$opiniones_arr;

if ($_GET['comentarios']){
	$paginacion = $_GET['comentarios'];
}

//Variables para los porcentajes de puntualidad y servicio
$total_puntualidad_5 = 0;
$total_puntualidad_4 = 0;
$total_puntualidad_3 = 0;
$total_puntualidad_2 = 0;
$total_puntualidad_1 = 0;
$total_puntualidad_25 = 0;
$total_servicio_5 = 0;
$total_servicio_4 = 0;
$total_servicio_3 = 0;
$total_servicio_2 = 0;
$total_servicio_1 = 0;	

//Variables para el envio y la recepción
$total_receptor = 0;
$total_envio = 0;

		//Establecer conexión con la base de datos
		global $conn_host, $conn_port, $conn_user, $conn_pass, $conn_db;
		$host = "localhost";
		$db = "guiapaqu_us_db";
		$user = "guiapaqu_user";
		$pwd = "gasherbrum-8000!";
		
		try {
			$conn = new PDO('mysql:host='.$host.';dbname='.$db.';charset=utf8', $user, $pwd);
		}
		catch (PDOException $e) {
			echo '<p>ERROR: No se conecto a la base de datos..!</p>';
			exit;
		}
		
		//Obtener la media de puntualidad y de servicio de esta empresa
		$sql = 'SELECT AVG(PUNTUALIDAD) as average_p, AVG(SERVICIO) as average_s FROM REVW_REVIEWS WHERE EMPRESA = "' . $post_name . '"';
		foreach ($conn->query($sql) as $row) {
			$average_puntualidad = $row['average_p'];
			$average_servicio = $row['average_s'];
		}
		
				
		//Calcular la media total de la empresa a partir de las medias de servicio y puntualidad
		$average_brand = ($average_puntualidad + $average_servicio*2) / 3;		
		$average_brand_stars  = ceil($average_brand*2) /2;
		
		//Obtener las estrellas
		$stars;
		$count_stars = 0;
		
		while($count_stars < floor($average_brand_stars)){
		
			$stars[$count_stars] = "fa-star";
			$count_stars += 1;
		}
		
		if($average_brand_stars * 2 != $count_stars * 2){
			$stars[$count_stars] = "fa-star-half-o";
			$count_stars += 1;
		}

		while($count_stars < 5){
		
			$stars[$count_stars] = "fa-star-o";
			$count_stars += 1;
		}
		
		//Obtener el número total de reviews en base de datos para esta empresa
		$sql = 'SELECT COUNT(EMPRESA) AS total FROM REVW_REVIEWS WHERE EMPRESA = "' . $post_name . '"';
		foreach ($conn->query($sql) as $row) {
			$total_reviews = $row['total'];
		}
		
		//Obtener la repartición de los votos de puntualidad
		$sql = 'SELECT puntualidad, COUNT( * ) AS num FROM REVW_REVIEWS WHERE EMPRESA = "' . $post_name . '" GROUP BY puntualidad';
		foreach ($conn->query($sql) as $row) {
			$puntualidad = $row['puntualidad'];
			
			if($puntualidad == 1){
				$total_puntualidad_1 = $row['num'];
			}else if($puntualidad == 2){
				$total_puntualidad_2 = $row['num'];
			}else if($puntualidad == 3){
				$total_puntualidad_3 = $row['num'];
			}else if($puntualidad == 4){
				$total_puntualidad_4 = $row['num'];
			}else if($puntualidad == 5){
				$total_puntualidad_5 = $row['num'];
			}else if($puntualidad == 2.5){
				$total_puntualidad_25 = $row['num'];
			}
		}
		
		//Obtener la repartición de los votos de puntualidad
		$sql = 'SELECT servicio, COUNT( * ) AS num FROM REVW_REVIEWS WHERE EMPRESA = "' . $post_name . '" GROUP BY servicio';
		foreach ($conn->query($sql) as $row) {
			$servicio = $row['servicio'];
			
			if($servicio == 1){
				$total_servicio_1 = $row['num'];
			}else if($servicio == 2){
				$total_servicio_2 = $row['num'];
			}else if($servicio == 3){
				$total_servicio_3 = $row['num'];
			}else if($servicio == 4){
				$total_servicio_4 = $row['num'];
			}else if($servicio == 5){
				$total_servicio_5 = $row['num'];
			}else if($servicio == 2.5){
				$total_servicio_25 = $row['num'];
			}
		}
		
		//Obtener la repartición de los envios VS recepción
		$sql = 'SELECT envio, COUNT( * ) AS num FROM REVW_REVIEWS WHERE EMPRESA = "' . $post_name . '" GROUP BY envio';
		foreach ($conn->query($sql) as $row) {
			$envio = $row['envio'];
			
			if($envio == 1){
				$total_envio = $row['num'];
			}else if($envio == 0){
				$total_receptor = $row['num'];
			}
		}
		
		//Obtener todas las opiniones para esta empresa		
		$sql = 'SELECT SERVICIO, PUNTUALIDAD, ENVIO, DATE, COMENTARIOS FROM REVW_REVIEWS WHERE EMPRESA = "' . $post_name . '" ORDER BY DATE DESC';
		$count = 0;

		foreach ($conn->query($sql) as $row) {
			if($count > 9){ break; } //limit reviews to 7 per page. There is no pagination at this stage.
			$opiniones_arr[$count] = array("servicio"=>$row['SERVICIO'], "puntualidad"=>$row['PUNTUALIDAD'], "envio"=>$row['ENVIO'], "date"=>$row['DATE'], "comentarios"=>$row['COMENTARIOS']);
			$count += 1;
		}
		
		$conn = null;

?>



	
  <?php if(!$amp_param):?>
	
<!--::::::::::::: COTIZADOR ::::::::::::::-->        
<div class="clearfix"></div>
<div class="container-fluid BGcoti">
	<!--SOLO SI ES PARTNER 
	<div style="position: absolute; left: 0px; top: 0px; width: 90px; height: 90px">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/img/aliado.png" class="img-responsive" />
	</div>-->

  <div class="container">
    <div class="row">


          <div class="col-md-6  pull-right">
          <?php include("cotizador.php"); ?>
          </div>



                <div class="col-md-6 tb20pad pull-left">
      		<h2 class="blanco text-center upper"><?php echo $post->post_title; ?></h2>
      	
 <?php if(false): ?>

		      		<h3 class="blanco text-center">Envía más barato con nuestros aliados</h3>
 
				<h3 class="blanco text-center">Ahorra hasta <b>50%</b> en tu envío</h3>

			<?php else: ?> 
<h4 class="blanco text-center">Envía <b class="upper">más barato</b> con nuestros aliados.</h4>
       		<p class="text-center" class="js-lazy-image">
			<img data-src="https://guiapaqueteria.com/wp-content/uploads/2017/01/c500-redpack-125x125.png" alt="redpack" width="45" class="js-lazy-image">
			<img data-src="https://guiapaqueteria.com/wp-content/uploads/2016/10/c500-estafeta-125x125.png" alt="estafeta" width="45" class="js-lazy-image">
		<!--<img data-src="https://guiapaqueteria.com/wp-content/uploads/2016/10/c500-dhl-125x125.png" alt="dhl" width="45" class="js-lazy-image">-->
			<img data-src="https://guiapaqueteria.com/wp-content/uploads/2016/10/c500-fedex-125x125.png" alt="fedex" width="45" class="js-lazy-image">
			<img data-src="https://guiapaqueteria.com/wp-content/uploads/2016/10/c500-ups-125x125.png" alt="ups" width="45" class="js-lazy-image">
		</p>
			<h3 class="blanco text-center">Ahorra hasta <b>50%</b> en tu envío</h3>

			<?php endif; ?> 
			<div class="tb20pad">
			<p class="blanco text-left">           
				<img data-src="<?php bloginfo('stylesheet_directory'); ?>/img/arrow.png" class="js-lazy-image"/>
				Cotiza y compara tarifas</p>
			<p class="blanco text-left">          
				<img data-src="<?php bloginfo('stylesheet_directory'); ?>/img/arrow.png" class="js-lazy-image"/>
				Envíos Nacionales e Internacionales</p>
			<p class="blanco text-left">          
				<img data-src="<?php bloginfo('stylesheet_directory'); ?>/img/arrow.png" class="js-lazy-image"/>
				Envía sin salir de casa</p>
			<p class="blanco text-left">          
				<img data-src="<?php bloginfo('stylesheet_directory'); ?>/img/arrow.png" class="js-lazy-image"/>
				Recoleción a domicilio incluida</p>
			<p class="blanco text-left">          
				<img data-src="<?php bloginfo('stylesheet_directory'); ?>/img/arrow.png" class="js-lazy-image"/>
				Tarifas económicas para empresas</p>
			</div>

      </div>
 

 



  </div>
</div>
</div>    
<div class="clearfix"></div>
<!--::::::::::::: COTIZADOR ::::::::::::::-->    

			<div style="text-align:center;padding-top: 20px;">
					<?php
					global $post;
					
					?>
					<p>	
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<!-- Guiapaqueteria Submenu Responsive -->
					<ins class="adsbygoogle"
					     style="display:block"
					     data-ad-client="ca-pub-7600038231425274"
					     data-ad-slot="2202426433"
					     data-ad-format="link"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
					</p>

</div>

                  <?php endif; ?>     
	 





		
<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
<div class="container">
    <div class="row">
	<!--GRANDE -->
	<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">


					<!--:::::::::::::::::::::::::::::::::: NOME E STELLE :::::::::::::::::::::::::::::::-->
					 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<?php $image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array('125','125') ); echo $image;
										$img_src = "";
									if ( $image_attributes ){
										$img_src = $image_attributes[0];
									}
									?>
								<div class="col-md-9 col-sm-4 col-xs-12">
									<h1>
										<img itemprop="logo" data-src="<?php echo $img_src; ?>" class="img-circle logoLP js-lazy-image" alt="<?php echo $post->post_title; ?>">
 										<?php the_title(); ?></h1>
								</div>



								<div class="col-md-3 col-sm-8 col-xs-12 pull-right text-center starBoxstar">
												<h2 class="bigRat text-center"><?php echo $average_brand_stars; ?></h2>
												<?php for ($x = 0; $x < 5; $x++): ?>
												<i class="fa <?php echo $stars[$x]; ?>" aria-hidden="true"></i>
												<?php endfor; ?>
												<p class="vopi"><a href="#opiniones">Ver Opiniones</a></p>
								</div>


					</div>

					<!--:::::::::::::::::::::::::::::::::: ///NOME E STELLE :::::::::::::::::::::::::::::::-->
					

						
					<!--:::::::::::::::::::::::::::::::::: SCHEDA PAQUETERIA :::::::::::::::::::::::::::::::-->
				
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
				<!--:::::::::::::::::::::::::::::::::: /SCHEDA PAQUETERIA :::::::::::::::::::::::::::::::-->


 
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">




			<?php include("reviews/review_form.php"); ?>
			
				
				<!-- Google rating tag -->
				<script type="application/ld+json">
				{
				  "@context": "http://schema.org/",
				  "@type": "Service",
				  "name": "<?php the_title(); ?>",
				  "description": "<?php the_title(); ?>",
				  "aggregateRating": {
					"@type": "AggregateRating",
					"ratingValue": "<?php echo $average_brand_stars; ?>",
					"bestRating": "5",
					"ratingCount": "<?php echo $total_reviews; ?>"
				  }
				}
				</script>




				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<ul class="nav nav-pills azul-pills navLP">
					  <li role="presentation" class="active"><a class="menu-item-lps" href="#servicios">Servicios</a></li>
					  <li role="presentation"><a class="menu-item-lps" class="menu-item-lps"  href="#cotizacion">Cotización</a></li>
					  <li role="presentation"><a class="menu-item-lps" href="#rastreo">Rastreo</a></li>
					  <li role="presentation"><a class="menu-item-lps" href="#faq">Preguntas Frecuentes</a></li>
					  <li role="presentation"><a class="menu-item-lps" href="#list-sucursales">Sucursales</a></li>
				</ul>
				</div>

 <div id="LPpservice" class="infoLPp">
					<!---AAAAMP-->	
					<div class="clearfix"></div>
						 
					<?php 			

								$purified_content = apply_filters('the_content',$post->post_content);

								$purified_content =	preg_replace("/<h2(.*?)>(.*?)(?=<\/h2>)/s", "<!-- ACCORDION PARAGRAPH --><h2$1>$2</h2>", $purified_content);

								$purified_content = preg_replace("/<h2(.*?)>(.*?)Servicios(.*?)(?=<\/h2>)/", "<h2 id='servicios'$1>$2Servicios$3</h2>" . do_shortcode('[submenu_ad_paqueteria]'), $purified_content);

								$purified_content = preg_replace("/<h2(.*?)>(.*?)Cotizador(.*?)(?=<\/h2>)/", "<h2 id='cotizacion'$1>$2Cotizador$3</h2>", $purified_content);

								$purified_content = preg_replace("/<h2(.*?)>(.*?)Preguntas(.*?)(?=<\/h2>)/", "<h2 id='faq'$1>$2Preguntas$3</h2>", $purified_content);

								$purified_content = preg_replace("/<h2(.*?)>(.*?)Rastreo(.*?)(?=<\/h2>)/", "<h2 id='rastreo'$1>$2Rastreo$3</h2>", $purified_content);

								$shortcode_txt = do_shortcode( '[native_ad_paqueteria]');

								$purified_content = str_replace_second('<!-- ACCORDION PARAGRAPH', ''. $shortcode_txt .'<!-- ACCORDION PARAGRAPH', $purified_content);	

								echo $purified_content;	


							function str_replace_second($from, $to, $subject)
							{
			    				$from = '/'.preg_quote($from, '/').'/';
			    				return preg_replace($from, $to, $subject, 1);
							}

							get_template_part( 'includes/ads','abajo-contenido' );
							
							?>
					<!--- ////FIN AAAAMP-->	

</div>




<!--:::::::::::::::::::::::::::::::::: SUCCURSALES :::::::::::::::::::::::::::::::-->
				 		<div class="clearfix"></div>						 

	 				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						
						<div id="list-sucursales"> 
						<?php $post_sucursal_id = $post->ID; if(!$amp_param){include("includes/listado-sucursales.php");} ?>
						</div>
						<div class="clearfix"></div>
					</div>

<!--:::::::::::::::::::::::::::::::::: ///////SUCCURSALES :::::::::::::::::::::::::::::::-->







 




	<?php if($post->ID === 4113 || $post->ID === 4931  || $post->ID === 4932  || $post->ID === 4935  || $post->ID === 4936  || $post->ID === 4937 ): ?>
		<?php else: ?> 


<!--:::::::::::::::::::::::::::::::::: SECCION VOTOS CON BARRITAS :::::::::::::::::::::::::::::::-->
 
<div id="opiniones" class="col-md-12 col-xs-12">
<?php if(!$amp_param): ?>
	<h3 class="upper" style="border-bottom:1px dashed #999;  line-height: 35px"><b>Opiniones del servicio de <?php echo $post->post_title; ?>:</b></h3>
<?php else: ?>
	<h3 class="upper reviewsTitle"><b>Opiniones del servicio de <?php echo $post->post_title; ?>:</b></h3>
<?php endif; ?>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<h3 class="upper naranja"><b>Envia</b></h3>
<?php if(!$amp_param): ?>
<div class="progress">
<div class="progress-bar naranjaBG" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($total_envio / $total_reviews) * 100 ?>%">
<?php endif; ?>
<span><strong><?php echo $total_envio ?></strong></span>
<?php if(!$amp_param): ?>
</div>
</div>
<?php endif; ?>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<h3 class="upper naranja"><b>Recibe</b></h3>
<?php if(!$amp_param): ?>
<div class="progress">
<div class="progress-bar naranjaBG" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($total_receptor / $total_reviews) * 100 ?>%">
<?php endif; ?>
<span><strong><?php echo $total_receptor ?></strong></span>
<?php if(!$amp_param): ?>
</div>
</div>
<?php endif; ?>
</div>
<div class="col-md-12 col-sm-12 col-xs-12"><hr></div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<div class="porcentBox">
<h4><b>¿Qué tan puntual llegó tu paquete?</b></h4>
<p>Al día y a la hora programados</p>
<?php if(!$amp_param): ?>
<div class="progress">
<div class="progress-bar verdeBG" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($total_puntualidad_5 / $total_reviews) * 100 ?>%">
<?php endif; ?>
<span><strong><?php echo $total_puntualidad_5 ?></strong></span>
<?php if(!$amp_param): ?>
</div>
</div>
<?php endif; ?>

<p>El mismo día pero una(s) hora(s) más tarde</p>
<?php if(!$amp_param): ?>
<div class="progress">
<div class="progress-bar azulBG" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($total_puntualidad_4 / $total_reviews) * 100 ?>%">
<?php endif; ?>
<span><strong><?php echo $total_puntualidad_4 ?></strong></span>
<?php if(!$amp_param): ?>
</div>
</div>
<?php endif; ?>

<p>Un día antes</p>
<?php if(!$amp_param): ?>
<div class="progress">
<div class="progress-bar frambuesaBG" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($total_puntualidad_3 / $total_reviews) * 100 ?>%">
<?php endif; ?>
<span><strong><?php echo $total_puntualidad_3 ?></strong></span>
<?php if(!$amp_param): ?>
</div>
</div>
<?php endif; ?>

<p>Un día o más después</p>
<?php if(!$amp_param): ?>
<div class="progress">
<div class="progress-bar amarilloBG" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($total_puntualidad_2 / $total_reviews) * 100 ?>%">
<?php endif; ?>
<span><strong><?php echo $total_puntualidad_2 ?></strong></span>
<?php if(!$amp_param): ?>
</div>
</div>
<?php endif; ?>

<p>No se ha entregado</p>
<?php if(!$amp_param): ?>
<div class="progress">
<div class="progress-bar rojoBG" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($total_puntualidad_1 / $total_reviews) * 100 ?>%">
<?php endif; ?>
<span><strong><?php echo $total_puntualidad_1 ?></strong></span>
<?php if(!$amp_param): ?>
</div>
</div>
<?php endif; ?>

<p>No estoy seguro</p>
<?php if(!$amp_param): ?>
<div class="progress">
<div class="progress-bar grisBG" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($total_puntualidad_25 / $total_reviews) * 100 ?>%">
<?php endif; ?>
<span><strong><?php echo $total_puntualidad_25 ?></strong></span>
<?php if(!$amp_param): ?>
</div>
</div>
<?php endif; ?>
</div>
	</div>

							
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<div class="porcentBox">
<h4><b>¿Cómo consideras la atención y el servicio?</b></h4>
<p>Excelente</p>
<?php if(!$amp_param): ?>
<div class="progress">
<div class="progress-bar verdeBG" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($total_servicio_5 / $total_reviews) * 100 ?>%">
<?php endif; ?>
<span><strong><?php echo $total_servicio_5 ?></strong></span>
<?php if(!$amp_param): ?>
</div>
</div>
<?php endif; ?>

<p>Bueno</p>
<?php if(!$amp_param): ?>
<div class="progress">
<div class="progress-bar azulBG" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($total_servicio_4 / $total_reviews) * 100 ?>%">
<?php endif; ?>
<span><strong><?php echo $total_servicio_4 ?></strong></span>
<?php if(!$amp_param): ?>
</div>
</div>
<?php endif; ?>

<p>Aceptable</p>
<?php if(!$amp_param): ?>
<div class="progress">
<div class="progress-bar frambuesaBG" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($total_servicio_3 / $total_reviews) * 100 ?>%">
<?php endif; ?>
<span><strong><?php echo $total_servicio_3 ?></strong></span>
<?php if(!$amp_param): ?>
</div>
</div>
<?php endif; ?>

<p>Malo</p>
<?php if(!$amp_param): ?>
<div class="progress">
<div class="progress-bar amarilloBG" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($total_servicio_2 / $total_reviews) * 100 ?>%">
<?php endif; ?>
<span><strong><?php echo $total_servicio_2 ?></strong></span>
<?php if(!$amp_param): ?>
</div>
</div>
<?php endif; ?>

<p>Pesimo</p>
<?php if(!$amp_param): ?>
<div class="progress">
<div class="progress-bar rojoBG" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($total_servicio_1 / $total_reviews) * 100 ?>%">
<?php endif; ?>
<span><strong><?php echo $total_servicio_1 ?></strong></span>
<?php if(!$amp_param): ?>
</div>
</div>
<?php endif; ?>

</div>
							</div>
								
<!--:::::::::::::::::::::::::::::::::: /SECCION VOTOS CON BARRITAS :::::::::::::::::::::::::::::::-->



<!-- ::::::::::::::::::::::::::::::: SECCIÓN COMENTARIOS :::::::::::::::::::: -->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="listComm">
	
	<?php foreach($opiniones_arr as $opinion):
		$date1=date_create($opinion["date"]);
		$date2=date_create(date("Y-m-d H:i:s"));
		$diff_global=date_diff($date1,$date2);
		$diff = "";
		$diff_years = $diff_global->format("%y");
		$diff_days = $diff_global->format("%d");
		$diff_hours = $diff_global->format("%h");
		$diff_minutes = $diff_global->format("%i");
		
		if($diff_years !== "0"){
			$diff = "Hace " . $diff_years;
			if($diff_years === "1"){
				$diff .= " año";
			}else{
				$diff .= " años";
			}
		}else if ($diff_days != "0"){
			$diff = "Hace " . $diff_days;
			if($diff_days === "1"){
				$diff .= " día";
			}else{
				$diff .= " días";
			}
		}else if ($diff_hours != "0"){
			$diff = "Hace " . $diff_hours;
			if($diff_hours === "1"){
				$diff .= " hora";
			}else{
				$diff .= " horas";
			}
		}else if ($diff_minutes != "0"){
			$diff = "Hace " . $diff_minutes;
			if($diff_minutes === "1"){
				$diff .= " minuto";
			}else{
				$diff .= " minutos";
			}
		}else{
			$diff = "Hace unos instantes";
		}
		
		$envio_text = "";
		$opinion_envio = $opinion["envio"];
		if($opinion_envio === 0){
			$envio_text = "realizó un envío";
		}else{
			$envio_text = "recibío un envío";
		}
		
		$puntualidad_label_text = "";
		$puntualidad_text = "";
		if($opinion["puntualidad"] == 5){
			$puntualidad_label_text	= "AL DÍA Y HORA PROGRAMADOS";
			$puntualidad_text = "fue entregado <strong>".$puntualidad_label_text."</strong>";
		}else if($opinion["puntualidad"] == 4){
			$puntualidad_label_text	= "UNA(S) HORA(S) DESPUÉS";
			$puntualidad_text = "fue entregado el mismo día pero <strong>".$puntualidad_label_text."</strong>";
		}else if($opinion["puntualidad"] == 3){
			$puntualidad_label_text	= "UN DÍA ANTES";
			$puntualidad_text = "fue entregado <strong>".$puntualidad_label_text."</strong>";
		}else if($opinion["puntualidad"] == 2){
			$puntualidad_label_text	= "UN DÍA O MÁS DESPUÉS";
			$puntualidad_text = "fue entregado <strong>".$puntualidad_label_text."</strong>";
		}else if($opinion["puntualidad"] == 1){
			$puntualidad_label_text	= "NO FUE ENTREGADO";
			$puntualidad_text = "<strong>".$puntualidad_label_text."</strong>";
		}else if($opinion["puntualidad"] == 2.5){
			$puntualidad_label_text	= "DESCONOCIDO";
			$puntualidad_text = "está en estado <strong>".$puntualidad_label_text."</strong>";
		}
		
		$servicio_label_text = "";
		$servicio_text = "";
		if($opinion["servicio"] == 5){
			$servicio_label_text = "EXCELENTE";
			$servicio_text = "fue <strong>".$servicio_label_text."</strong>";
		}else if($opinion["servicio"] == 4){
			$servicio_label_text = "BUENO";
			$servicio_text = "fue <strong>".$servicio_label_text."</strong>";
		}else if($opinion["servicio"] == 3){
			$servicio_label_text = "ACEPTABLE";
			$servicio_text = "fue <strong>".$servicio_label_text."</strong>";
		}else if($opinion["servicio"] == 2){
			$servicio_label_text = "MALO";
			$servicio_text = "fue <strong>".$servicio_label_text."</strong>";
		}else if($opinion["servicio"] == 1){
			$servicio_label_text = "PÉSIMO";
			$servicio_text = "fue <strong>".$servicio_label_text."</strong>";
		}
		
		
		//Calcular media por cada opinión
		$average_review = ($opinion["puntualidad"] + $opinion["servicio"]*2) / 3;		
		$average_review_stars  = ceil($average_review*2) /2;

		$star;
		$count = 0;
		
		while($count < $average_review_stars){
		
			$star[$count] = "fa-star";
			$count += 1;
		}
		
		if($average_review_stars % $count != 0){
			$star[$count] = "fa-star-half-o";
			$count += 1;
		}

		while($count < 5){
		
			$star[$count] = "fa-star-o";
			$count += 1;
		}

	?>
	
		<div class="col-md-1 col-sm-2 col-xs-3">
			<p>
			<?php if(!$amp_param): ?>
				<img data-src="<?php echo $img_src; ?>" class="img-responsive img-circle center-block js-lazy-image">
			<?php else: ?>
				<amp-img src="<?php echo $img_src; ?>" class="img-responsive img-circle center-block" height=30 width=30></amp-img>
			<?php endif; ?>
			</p>
		</div>
		
		<div class="col-md-7 col-sm-3 col-xs-9 starComstar">
			<p class="text-left">
				<?php for ($x = 0; $x < 5; $x++): ?>
					<i class="fa <?php echo $star[$x]; ?>" aria-hidden="true"></i>
				<?php endfor; ?>
			</p>
		</div>
		
		<div class="col-md-4 col-sm-3 col-xs-9">
			<p class="text-right small"><?php echo $diff; ?></p>
		</div>
		
		<div class="col-lg-12 col-md-12 ciol-sm-12 col-xs-12">
			<div class="clearfix"></div>
				<?php if($opinion["puntualidad"] == 5): ?><span class="label label-primary"><?php echo $puntualidad_label_text; ?></span><?php endif;?>
				<?php if($opinion["puntualidad"] == 4): ?><span class="label label-success"><?php echo $puntualidad_label_text; ?></span><?php endif;?>
				<?php if($opinion["puntualidad"] == 3): ?><span class="label label-info"><?php echo $puntualidad_label_text; ?></span><?php endif;?>
				<?php if($opinion["puntualidad"] == 2): ?><span class="label label-warning"><?php echo $puntualidad_label_text; ?></span><?php endif;?>
				<?php if($opinion["puntualidad"] == 1): ?><span class="label label-danger"><?php echo $puntualidad_label_text; ?></span><?php endif;?>
				<?php if($opinion["puntualidad"] == 2.5): ?><span class="label label-default"><?php echo $puntualidad_label_text; ?></span><?php endif;?>
				<?php if($opinion["servicio"] == 5): ?><span class="label label-primary"><?php echo $servicio_label_text; ?></span><?php endif;?>
				<?php if($opinion["servicio"] == 4): ?><span class="label label-success"><?php echo $servicio_label_text; ?></span><?php endif;?>
				<?php if($opinion["servicio"] == 3): ?><span class="label label-info"><?php echo $servicio_label_text; ?></span><?php endif;?>
				<?php if($opinion["servicio"] == 2): ?><span class="label label-warning"><?php echo $servicio_label_text; ?></span><?php endif;?>
				<?php if($opinion["servicio"] == 1): ?><span class="label label-danger"><?php echo $servicio_label_text; ?></span><?php endif;?>

				<p>Un usuario que <?php echo $envio_text; ?>, lo rastreó en la página de guiapaqueteria.com <?php echo lcfirst($diff); ?> y consideró que el servicio <?php echo $servicio_text; ?>. El usuario precisa que el envío  <?php echo $puntualidad_text; ?>. </p>
		</div>

<?php endforeach; ?>
</div>
</div>
<!-- ::::::::::::::::::::::::::::::: SECCIÓN COMENTARIOS :::::::::::::::::::: -->

 
 <?php endif; ?>




 </div>

 </div>
 
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">			
	<?php get_sidebar(); // sidebar 1 ?>
 </div>
</div>
 
</article> 

 

<?php get_footer(); ?>