<?php
/**
 * The template for displaying all single posts
 */
get_header();
 ?>

<?php if(!$amp_param):?>
<?php //if(is_user_logged_in() && current_user_can('administrator') ): echo "testing el nuevo diseño <br> solo se puede ver si eres un usuario loggeado <br> visitantes de la página ven el diseño original"; ?>
<?php if($post->ID == 437):  ?>
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
                <h2 class="blanco text-center upper"><?php echo $post->post_title; ?></h2>***

                <?php if($post->ID === 160 || $post->ID === 155 || $post->ID === 55 || $post->ID === 46|| $post->ID === 65): ?>

                <h3 class="blanco text-center">Envía más barato con nuestros aliados</h3>

                <h3 class="blanco text-center">Ahorra hasta <b>50%</b> en tu envío</h3>

                <?php else: ?>
                <h4 class="blanco text-center">Envía <b class="upper">más barato</b> con nuestros aliados.</h4>
                <p class="text-center" class="js-lazy-image">
	               <img src="<?php echo get_template_directory_uri() . '/images/c500-dhl-125x125.png'; ?>" alt="DHL" width="45" class="js-lazy-image">
	               <img src="<?php echo get_template_directory_uri() . '/images/c500-fedex-125x125.png'; ?>" alt="fedex" width="45" class="js-lazy-image">
	               <img src="<?php echo get_template_directory_uri() . '/images/c500-ups-125x125.png'; ?>" alt="ups" width="45" class="js-lazy-image">
                </p>
                <h3 class="blanco text-center">Ahorra hasta <b>50%</b> en tu envío</h3>
                <?php endif; ?>
                <div class="tb20pad">
                    <p class="blanco text-left"><img src="<?php echo get_template_directory_uri() . '/images/arrow.png'; ?>" class="js-lazy-image"> Cotiza y compara tarifas</p>
                    <p class="blanco text-left"><img src="<?php echo get_template_directory_uri() . '/images/arrow.png'; ?>" class="js-lazy-image"> Envíos Nacionales e Internacionales</p>
                    <p class="blanco text-left"><img src="<?php echo get_template_directory_uri() . '/images/arrow.png'; ?>" class="js-lazy-image">  Envía sin salir de casa</p>
                    <p class="blanco text-left"><img src="<?php echo get_template_directory_uri() . '/images/arrow.png'; ?>" class="js-lazy-image">  Recoleción a domicilio incluida</p>
                    <p class="blanco text-left"><img src="<?php echo get_template_directory_uri() . '/images/arrow.png'; ?>" class="js-lazy-image">  Tarifas económicas para empresas</p>
                </div>

            </div>

        </div>
    </div>
</div>
<div class="clearfix"></div>

<?php else: ?>
<div class="container-fluid bgOrform">
    <div class="container">
        <div class="clearfix"></div>
        <div class="row hpTop">
            <div class="col-md-12 text-center">
                <h2 class="blanco upper">Cotiza tu envío</span></h2>
            </div>

            <div class="row cotizaBox">
                <div class="col-xs-12 col-sm-1 col-md-2 col-lg-2 text-center">
                </div>
                <div class="col-md-8">
                    <?php include("cotizador.php"); ?>

                </div>
                <div class="col-xs-12 col-sm-1 col-md-2 col-lg-2 text-center">
                </div>
            </div>
            <div class="row hpTop">
                <div class="col-md-12 text-center">
                    <h2 class="blanco">Ahorra hasta 30%</b> en tu envío</h2>
                    <h2 class="blanco">Envíos desde USA</h2>
                </div>
            </div>

        </div>
        <div class="clearfix"></div>
    </div>
</div>

<?php endif; ?>
<?php endif; ?>


<div class="container">
    <div class="row">
        <div id="primary" class="content-area col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <main id="main" class="site-main" role="main">

                <!-- COMMENT:  Agrego diseño solo al post Test nuevo diseño (437) -->
                <?php if($post->ID == 437): ?>
                <!--ELIMINAR.. -->

                <!-- COMMENT: Licia este es el banner de arriba que no me sale bien, use estos dos archivos y no tuve suerte -->
                <?php //include("form-vertical-steps.php") ?>
                <?php //include("cotizador.php") ?>


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

                <?php endif; ?>
                <!-- ELIMINAR -->

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <!--:::::::::::::::::::::::::::::::::: NOME E STELLE :::::::::::::::::::::::::::::::-->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                
                        <div id="adsense_submenu" class="lc_ads lazy-ads"></div>
                        <div class="clearfix"></div>

						<div class="row">
                            <div class="col-12">
                                <?php echo get_template_part("inc/template","breadcrumbs"); ?>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-4 col-xs-12 logoBig">
                            <h1>
                                <?php the_post_thumbnail('medium'); ?>
                                <?php echo $post->post_title; ?></h1>
                        </div>

                        <?php if($post->ID == 437): ?>
                        <!-- ELIMINAR -->
                        <div class="col-md-3 col-sm-8 col-xs-12 pull-right text-center starBoxstar">
                            <h2 class="bigRat text-center"><?php echo $average_brand_stars; ?></h2>
                            <?php for ($x = 0; $x < 5; $x++): ?>
                            <i class="fa <?php echo $stars[$x]; ?>" aria-hidden="true"></i>
                            <?php endfor; ?>
                            <p class="vopi"><a href="#opiniones">Ver Opiniones</a></p>
                        </div>
                        <?php endif; ?>
                        <!-- ELIMINAR -->

                    </div>

                    <!--:::::::::::::::::::::::::::::::::: ///NOME E STELLE :::::::::::::::::::::::::::::::-->
                    <div class="clearfix"></div>


                    <!--:::::::::::::::::::::::::::::::::: SCHEDA PAQUETERIA ::::::::::::::::::::::::::::::: -->


                    <?php include("menu-horizontal.php"); ?>

                    <div class="infoLPp">
                        <div class="clearfix"></div>


                        <?php
					$purified_content = apply_filters('the_content', $post->post_content);
					if($post->post_parent < 1){
						//get_template_part("inc/template-indice-contenido");
					}
					

					ob_start();?>

                        <div id="adsense_servicios" class="lc_ads lazy-ads"></div>
                        <?php $ad_servicios = ob_get_clean();
                         $purified_content = preg_replace("/<h2(.*?)>(.*?)Precios(.*?)(?=<\/h2>)/", "<h2 id='precios'$1>$2Precios$3</h2>" . $ad_cotiza, $purified_content);
                         $purified_content = preg_replace("/<h2(.*?)>(.*?)Cobertura(.*?)(?=<\/h2>)/", "<h2 id='cobertura'$1>$2Cobertura$3</h2>" . $ad_cotiza, $purified_content);
					    $purified_content = preg_replace("/<h2(.*?)>(.*?)Servicios(.*?)<\/h2>/", "<h2 id='servicios'$1>$2Servicios$3</h2>" . $ad_servicios, $purified_content); 

					ob_start();?>




                        <div id="adsense_cotiza" class="lc_ads lazy-ads"></div>
                        <?php $ad_cotiza = ob_get_clean();

					$purified_content = preg_replace("/<h2(.*?)>(.*?)Cotiza(.*?)(?=<\/h2>)/", "<h2 id='cotizacion'$1>$2Cotiza$3</h2>" . $ad_cotiza, $purified_content);
                        $purified_content = preg_replace("/<h2(.*?)>(.*?)Preguntas (.*?)(?=<\/h2>)/", "<h2 id='faq'$1>$2Preguntas$3</h2>", $purified_content);
                        $purified_content = preg_replace("/<h2(.*?)>(.*?)Rastreo(.*?)(?=<\/h2>)/", "<h2 id='rastreo'$1>$2Rastreo$3</h2>", $purified_content);
                        $purified_content = preg_replace("/<h2(.*?)>(.*?)Sucursales y Teléfonos(.*?)(?=<\/h2>)/", "<h2 id='list-sucursales'$1>$2Sucursales y Teléfonos$3</h2>", $purified_content);
					
					$links = 'https://guiapaqueteria.com/rastreador/';
                    $links = preg_replace('/\/rastreador/','/us/rastreador',$purified_content);
                    echo $links; 

				
					// the_content();
					?>

                        <?php if($post->post_parent > 0): ?>

                        <?php get_template_part("inc/sucursales/sucursales","detalles"); ?>

                        <?php endif; ?>
                        <?php get_template_part("inc/sucursales/sucursales","listado"); ?>

                        <?php if($post->ID == 437): ?>
                        <!-- ELIMINAR -->

                        <!--:::::::::::::::::::::::::::::::::: SECCION VOTOS CON BARRITAS :::::::::::::::::::::::::::::::-->

                        <div id="opiniones" class="col-md-12 col-xs-12">
                            <?php if(!$amp_param): ?>
                            <h3 class="upper" style="border-bottom:1px dashed #999;  line-height: 35px"><b>Opiniones del
                                    servicio <?php echo $post->post_title; ?>:</b></h3>
                            <?php else: ?>
                            <h3 class="upper reviewsTitle"><b>Opiniones del servicio de
                                    <?php echo $post->post_title; ?>:</b></h3>
                            <?php endif; ?>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <h3 class="upper naranja"><b>Envia</b></h3>
                            <?php if(!$amp_param): ?>
                            <div class="progress">
                                <div class="progress-bar naranjaBG" role="progressbar" aria-valuenow="40"
                                    aria-valuemin="0" aria-valuemax="100"
                                    style="width: <?php echo ($total_envio / $total_reviews) * 100 ?>%">
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
                                <div class="progress-bar naranjaBG" role="progressbar" aria-valuenow="40"
                                    aria-valuemin="0" aria-valuemax="100"
                                    style="width: <?php echo ($total_receptor / $total_reviews) * 100 ?>%">
                                    <?php endif; ?>
                                    <span><strong><?php echo $total_receptor ?></strong></span>
                                    <?php if(!$amp_param): ?>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <hr>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="porcentBox">
                                <h4><b>¿Qué tan puntual llegó tu paquete?</b></h4>
                                <p>Al día y a la hora programados</p>
                                <?php if(!$amp_param): ?>
                                <div class="progress">
                                    <div class="progress-bar verdeBG" role="progressbar" aria-valuenow="40"
                                        aria-valuemin="0" aria-valuemax="100"
                                        style="width: <?php echo ($total_puntualidad_5 / $total_reviews) * 100 ?>%">
                                        <?php endif; ?>
                                        <span><strong><?php echo $total_puntualidad_5 ?></strong></span>
                                        <?php if(!$amp_param): ?>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <p>El mismo día pero una(s) hora(s) más tarde</p>
                                <?php if(!$amp_param): ?>
                                <div class="progress">
                                    <div class="progress-bar azulBG" role="progressbar" aria-valuenow="60"
                                        aria-valuemin="0" aria-valuemax="100"
                                        style="width: <?php echo ($total_puntualidad_4 / $total_reviews) * 100 ?>%">
                                        <?php endif; ?>
                                        <span><strong><?php echo $total_puntualidad_4 ?></strong></span>
                                        <?php if(!$amp_param): ?>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <p>Un día antes</p>
                                <?php if(!$amp_param): ?>
                                <div class="progress">
                                    <div class="progress-bar frambuesaBG" role="progressbar" aria-valuenow="40"
                                        aria-valuemin="0" aria-valuemax="100"
                                        style="width: <?php echo ($total_puntualidad_3 / $total_reviews) * 100 ?>%">
                                        <?php endif; ?>
                                        <span><strong><?php echo $total_puntualidad_3 ?></strong></span>
                                        <?php if(!$amp_param): ?>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <p>Un día o más después</p>
                                <?php if(!$amp_param): ?>
                                <div class="progress">
                                    <div class="progress-bar amarilloBG" role="progressbar" aria-valuenow="40"
                                        aria-valuemin="0" aria-valuemax="100"
                                        style="width: <?php echo ($total_puntualidad_2 / $total_reviews) * 100 ?>%">
                                        <?php endif; ?>
                                        <span><strong><?php echo $total_puntualidad_2 ?></strong></span>
                                        <?php if(!$amp_param): ?>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <p>No se ha entregado</p>
                                <?php if(!$amp_param): ?>
                                <div class="progress">
                                    <div class="progress-bar rojoBG" role="progressbar" aria-valuenow="40"
                                        aria-valuemin="0" aria-valuemax="100"
                                        style="width: <?php echo ($total_puntualidad_1 / $total_reviews) * 100 ?>%">
                                        <?php endif; ?>
                                        <span><strong><?php echo $total_puntualidad_1 ?></strong></span>
                                        <?php if(!$amp_param): ?>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <p>No estoy seguro</p>
                                <?php if(!$amp_param): ?>
                                <div class="progress">
                                    <div class="progress-bar grisBG" role="progressbar" aria-valuenow="40"
                                        aria-valuemin="0" aria-valuemax="100"
                                        style="width: <?php echo ($total_puntualidad_25 / $total_reviews) * 100 ?>%">
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
                                    <div class="progress-bar verdeBG" role="progressbar" aria-valuenow="40"
                                        aria-valuemin="0" aria-valuemax="100"
                                        style="width: <?php echo ($total_servicio_5 / $total_reviews) * 100 ?>%">
                                        <?php endif; ?>
                                        <span><strong><?php echo $total_servicio_5 ?></strong></span>
                                        <?php if(!$amp_param): ?>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <p>Bueno</p>
                                <?php if(!$amp_param): ?>
                                <div class="progress">
                                    <div class="progress-bar azulBG" role="progressbar" aria-valuenow="40"
                                        aria-valuemin="0" aria-valuemax="100"
                                        style="width: <?php echo ($total_servicio_4 / $total_reviews) * 100 ?>%">
                                        <?php endif; ?>
                                        <span><strong><?php echo $total_servicio_4 ?></strong></span>
                                        <?php if(!$amp_param): ?>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <p>Aceptable</p>
                                <?php if(!$amp_param): ?>
                                <div class="progress">
                                    <div class="progress-bar frambuesaBG" role="progressbar" aria-valuenow="40"
                                        aria-valuemin="0" aria-valuemax="100"
                                        style="width: <?php echo ($total_servicio_3 / $total_reviews) * 100 ?>%">
                                        <?php endif; ?>
                                        <span><strong><?php echo $total_servicio_3 ?></strong></span>
                                        <?php if(!$amp_param): ?>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <p>Malo</p>
                                <?php if(!$amp_param): ?>
                                <div class="progress">
                                    <div class="progress-bar amarilloBG" role="progressbar" aria-valuenow="40"
                                        aria-valuemin="0" aria-valuemax="100"
                                        style="width: <?php echo ($total_servicio_2 / $total_reviews) * 100 ?>%">
                                        <?php endif; ?>
                                        <span><strong><?php echo $total_servicio_2 ?></strong></span>
                                        <?php if(!$amp_param): ?>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <p>Pesimo</p>
                                <?php if(!$amp_param): ?>
                                <div class="progress">
                                    <div class="progress-bar rojoBG" role="progressbar" aria-valuenow="40"
                                        aria-valuemin="0" aria-valuemax="100"
                                        style="width: <?php echo ($total_servicio_1 / $total_reviews) * 100 ?>%">
                                        <?php endif; ?>
                                        <span><strong><?php echo $total_servicio_1 ?></strong></span>
                                        <?php if(!$amp_param): ?>
                                    </div>
                                </div>
                                <?php endif; ?>

                            </div>
                        </div>

                        <!--:::::::::::::::::::::::::::::::::: /SECCION VOTOS CON BARRITAS :::::::::::::::::::::::::::::::-->

                        <?php endif; ?>
                        <!-- ELIMINAR -->
            </main>
        </div>
    </div>
</div>
</div>



<!--:::::::::::::::::::::::::::::::TE PODRIA INTERESAR::::::::::::::::::::::::::::::-->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="fastGuides clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h4 class="text-center upper">Otras Empresas</h4>
                </div>

                <div class="clearfix"></div>

                <?php 
		$args = array(
				'post_type' => 'empresas',
				'category_name' => 'paqueteria',
				'posts_per_page' => 6,
				'orderby' => 'rand'

			);

		$empresas = get_posts($args);

		foreach($empresas as $empresa):?>
                <div class="col-12 col-sm-4 col-md-2 col-lg-2 text-center">
                    <div class="REmpresas text-center">
                        <a class="text-center" href="<?php echo get_permalink($empresa->ID); ?>">
                            <div class="RempresaImg">
                                <img src="<?php echo get_the_post_thumbnail_url($empresa->ID,'medium');?>"
                                    class="img-circle"
                                    alt="Toda la información sobre <?php echo ($empresa->post_title);?>">
                            </div>
                            <div class="clearfix"></div>
                            <p class="text-center">
                                <?php echo ($empresa->post_title);?>
                            </p>
                        </a>
                    </div>
                </div>

                <?php endforeach;?>
            </div>



        </div>
    </div>
</div>
</div>

<!--:::::::::::::::::::::::::::::::TE PODRIA INTERESAR::::::::::::::::::::::::::::::-->
<?php get_footer(); ?>
<script async src="<?php echo get_template_directory_uri(); ?>/js/ads/main.js"></script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<?php if($post->post_parent > 0): ?>
<script async src="<?php echo get_template_directory_uri(); ?>/js/ads/empresas_sucursales.js"></script>
<?php else: ?>
<script async src="<?php echo get_template_directory_uri(); ?>/js/ads/empresas.js"></script>
<?php endif;?>