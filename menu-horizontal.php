	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 wellinfoLP" itemscope itemtype="http://schema.org/Organization">

						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<p class="text-left">
								<b>Teléfono</b>
								<span itemprop="telephone"><?php echo get_post_meta( $post->ID, 'telefono', true ); ?></span>
							</p>
							<p class="text-left">	
								<b>www:</b>
								<a itemprop="url" href="<?php $url_empresa = get_post_meta( $post->ID, 'web', true ); if (strpos($url_empresa,'https://') === false){
    							$url_empresa = 'https://'.$url_empresa;  }echo $url_empresa;?>" rel="nofollow" target="_blank">	ir a la página oficial</a>
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
						<li role="presentation" class="active"><a class="menu-item-lps" href="#precios">Precios</a></li>
						<li role="presentation"><a class="menu-item-lps" href="#cobertura">Cobertura</a></li>
						<li role="presentation"><a class="menu-item-lps" href="#servicios">Servicios</a></li>
						<li role="presentation"><a class="menu-item-lps" href="#cotizacion">Cotización</a></li>
						<li role="presentation"><a class="menu-item-lps" href="#rastreo">Rastreo</a></li>
						<li role="presentation"><a class="menu-item-lps" href="#faq">Preguntas Frecuentes</a></li>
						<li role="presentation"><a class="menu-item-lps" href="#list-sucursales">Sucursales</a></li>
					</ul>
				</div>