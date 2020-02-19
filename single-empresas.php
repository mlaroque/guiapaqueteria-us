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
		
		<!-- COMMENT:  Agrego diseño solo al post Test nuevo diseño (437) -->
		<?php if($post->ID == 437): ?>	 <!--ELIMINAR.. --> 
			
			<!-- COMMENT: Licia este es el banner de arriba que no me sale bien, use estos dos archivos y no tuve suerte -->
          	<?php //include("form-vertical-steps.php") ?>
			<?php include("cotizador.php") ?>


			<?php 
				$post_name = $post->post_name;
				$average_puntualidad = 0;
				$average_servicio = 0;
				$average_brand_stars = 0;
				$total_reviews = 1;
				$paginacion = 0;
				$opiniones_arr = array();

				$post_name = 'dhl'; //ELIMINAR.. HARDCODEADO PARA PRUEBAS

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
				$db = "guiapaqu_db";
				// $db = "guiapaqu_us_db";
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
					if($total_reviews == 0){
						$total_reviews = 1;
					}
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

		<?php endif; ?> <!-- ELIMINAR -->

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

<div class="infoLPp">
					<!--:::::::::::::::::::::::::::::::::: NOME E STELLE :::::::::::::::::::::::::::::::-->
					 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				 
								<div class="col-md-9 col-sm-4 col-xs-12 logoBig">
									<h1>
										<?php the_post_thumbnail('medium'); ?>
 										<?php echo $post->post_title; ?></h1>
								</div>


						<?php if($post->ID == 437): ?> <!-- ELIMINAR -->
								<div class="col-md-3 col-sm-8 col-xs-12 pull-right text-center starBoxstar">
												<h2 class="bigRat text-center"><?php echo $average_brand_stars; ?></h2>
												<?php for ($x = 0; $x < 5; $x++): ?>
												<i class="fa <?php echo $stars[$x]; ?>" aria-hidden="true"></i>
												<?php endfor; ?>
												<p class="vopi"><a href="#opiniones">Ver Opiniones</a></p>
								</div>
						<?php endif; ?> <!-- ELIMINAR -->

					</div>

					<!--:::::::::::::::::::::::::::::::::: ///NOME E STELLE :::::::::::::::::::::::::::::::-->
					


<!--:::::::::::::::::::::::::::::::::: SCHEDA PAQUETERIA ::::::::::::::::::::::::::::::: -->
<?php if($post->ID == 437): ?> <!-- ELIMINAR -->

					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 wellinfoLP" itemscope itemtype="http://schema.org/Organization">

						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<p class="text-left">
								<b>Teléfono</b>
								<span itemprop="telephone"><?php echo get_post_meta( $post->ID, 'telefono', true ); ?></span>
							</p>
							<p class="text-left">	
								<b>www:</b>
								<a itemprop="url" href="<?php $url_empresa = get_post_meta( $post->ID, 'web', true ); if (strpos($url_empresa,'http://') === false){
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
		<?php endif; ?> <!-- ELIMINAR -->

<div class="clearfix"></div>


					<?php
					$purified_content = apply_filters('the_content', $post->post_content);
					get_template_part("inc/template-indice-contenido");
					echo $purified_content;
					// the_content();
					?>

					<?php if($post->post_parent > 0): ?>

						<?php get_template_part("inc/sucursales/sucursales","detalles"); ?>
						
					<?php endif; ?>
						<?php get_template_part("inc/sucursales/sucursales","listado"); ?>
						
						<?php if($post->ID == 437): ?> <!-- ELIMINAR -->

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

						<?php endif; ?> <!-- ELIMINAR -->
			</main> 
		</div>
		</div> 
	</div> 	
</div>


<?php get_footer(); ?>