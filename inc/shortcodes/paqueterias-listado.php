 <?php 
						global $post;
						global $servicio;
						
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
						
							$args = array(
								'post_type' => 'empresas',
								'post_parent' => 0,
								'tag' => $servicio,
								'posts_per_page' => -1,
								'nopaging' => true,
								'orderby' => 'menu_order',
								'order' => 'DESC'
								);	
								
								$query = new WP_Query( $args );
								
								while ( $query->have_posts() ):	
								
								$query->the_post();
								$post = get_post();								
								
								$average_puntualidad = 0;
								$average_servicio = 0;
								$average_brand_stars = 0;
								
								//Obtener la media de puntualidad y de servicio de esta empresa
								$sql = 'SELECT AVG(PUNTUALIDAD) as average_p, AVG(SERVICIO) as average_s FROM REVW_REVIEWS WHERE EMPRESA = "' . $post->post_name . '"';
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

								$post_tags = get_the_tags($post->ID);
								$tags_str = "";

								if ( !empty($post_tags) ){
									foreach($post_tags as $post_tag){
										if(strpos($post_tag->slug,"servicio") !== false){
											$tags_str .= $post_tag->slug . ",";
										}
									}
							
									$tags_str = rtrim($tags_str, ",");
								}
						?>
						
 <div id="<?php echo $post->post_name; ?>" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 result-div" data-servicios="<?php echo $tags_str; ?>" style="float:left">

	<div class="LEmpresas">
			
		<a href="<?php echo esc_url( get_permalink() ); ?>">
			<div class="boxcon text-center">
				<div class="boxconImg">
					<img src="<?php the_post_thumbnail_url(); ?>" class="img-circle js-lazy-image" alt="<?php the_title(); ?>">
				</div>
					<div class="LEmpresasname">
 							<p class="text-center"><?php the_title(); ?></p>
 					</div>
 					<div class="text-center starBstar">
 						<?php for ($x = 0; $x < 5; $x++): ?>
							<i class="fa <?php echo $stars[$x]; ?>" aria-hidden="true"></i>
						<?php endfor; ?>
					</div>
			</div>
		</a>
	</div>
</div>


 			
<?php endwhile;
						
	wp_reset_postdata();
?>		
<div class="clearfix"></div>