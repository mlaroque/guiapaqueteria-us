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
