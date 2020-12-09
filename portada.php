<?php
/**
 * Template Name: Portada-Guiapaqueteria
 */
 
?>

<?php get_header(); ?>






			<div id="content" class="clearfix">
				<div id="main" class="clearfix hp" role="main">


				
<div class="clearfix"></div>

<?php include("reviews/review_form.php"); ?>
				



					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
							
 
						
<!-- end article header -->
					
						<section class="post_content portadaGP">
							<?php the_content(); ?>
					
						</section> <!-- end article section -->
					

						
	

        
  <?php if(!$amp_param):?>

<div class="container-fluid bgOrform">
<div class="container">
  <div class="clearfix"></div>
  <div class="row hpTop">
          <div class="col-md-12 text-center">
              <h1 class="blanco">Cotiza tu envío</span></h1>
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
   </div>  </div>
                  <?php endif; ?>     
     

<!--:::::::::::::::::::::: LOGOS ::::::::::::::::::::--> 
<div class="container">
  <div class="row">
    <div class="col-12">
      <?php echo get_template_part("inc/template","breadcrumbs"); ?>
    </div>
  </div>
</div>

 <div class="container">

  <div class="row tb60mar">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
      <h2>Realiza tus envíos con las mejores Empresas</h2>  
      </div>

      <div class="clearfix"></div>
             <div class="col-xs-12 col-sm-2 col-md-4 col-lg-4 text-center">
     </div>
 
      <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2 text-center">
           <a href="https://guiapaqueteria.com/us/empresas/ups/"><img src="https://guiapaqueteria.com/us/wp-content/themes/lacomuna-theme/images/hp-ups.png" class="img-responsive js-lazy-image"></a>
      </div>
      <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2 text-center">
           <a href="https://guiapaqueteria.com/us/empresas/fedex/"><img src="https://guiapaqueteria.com/us/wp-content/themes/lacomuna-theme/images/hp-fedex.png" class="img-responsive js-lazy-image"></a>
      </div>  
       <div class="col-xs-12 col-sm-2 col-md-4 col-lg-4 text-center">
     </div>
</div>

</div>

 <!--::::::::::::::::::::::STEP COTIZACION ::::::::::::::::::::-->
<div class="container-fluid tb60mar tb20pad BGgrisC">
<div class="container">
<div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
              <h2>¿Cómo funciona?</h2>
            </div>
  
            <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 text-center">
            </div>

            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2 text-center">
                  <img src="<?php bloginfo('stylesheet_directory'); ?>/images/hpa-cotizar.png" class="img-responsive js-lazy-image" />
                  <h4><b class="verde">01.</b> Cotiza</h4>
            </div>
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2 text-center">
                  <img src="<?php bloginfo('stylesheet_directory'); ?>/images/hpa-comparar.png" class="img-responsive js-lazy-image" />
                  <h4><b class="verde">02.</b> Compara Ofertas y Elige</h4>
            </div>

            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2 text-center">
                  <img src="<?php bloginfo('stylesheet_directory'); ?>/images/hpa-datos.png" class="img-responsive js-lazy-image" />
                  <h4><b class="verde">03.</b> Introduce los datos de tu envío</h4>
            </div>
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2 text-center">
                  <img src="<?php bloginfo('stylesheet_directory'); ?>/images/hpa-paga.png" class="img-responsive js-lazy-image" />
                  <h4><b class="verde">04.</b> Paga tu envío</h4>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 text-center">
                  <img src="<?php bloginfo('stylesheet_directory'); ?>/images/hpa-guia.png" class="img-responsive js-lazy-image" />
                  <h4><b class="verde">05.</b> Descarga tu guía de envío</h4>
            </div>

            <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 text-center"> 
            </div>
    
 
</div>
</div>
</div> 


 
 <!--:::::::::::::::::::::: EMPRESAS ::::::::::::::::::::-->
<div class="hp5paq">
<div class="container">
<div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <h2>¿Envías más de <b class="verde">5 paquetes</b> a la semana?</h2>
            <h3 class="naranja">Registrate para una cuenta corporativa y recibe mayores beneficios.</h3>
          </div>
<div class="clearfix"></div>
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-left">
            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/check.png" class="pull-left hpCheck js-lazy-image" width="30" />
            <h4>Tarifas preferenciales en servicios seleccionados.</h4>
          </div>
          
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-left">
            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/check.png" class="pull-left hpCheck js-lazy-image" width="30" />
            <h4>Rastreo avanzado.</h4>
          </div>
          
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-left">
            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/check.png" class="pull-left hpCheck js-lazy-image" width="30" />
            <h4>Libreta de direcciones frecuentes para envíos rápidos.</h4>
          </div>
          
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-left">
            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/check.png" class="pull-left hpCheck js-lazy-image" width="30" />
            <h4>Creación de nuevos envíos con rapidez.</h4>
          </div>
          
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-left">
            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/check.png" class="pull-left hpCheck js-lazy-image" width="30" />
            <h4>Monedero de prepago para pagos más rápidos.</h4>
          </div>
          
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-left">
            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/check.png" class="pull-left hpCheck js-lazy-image" width="30" />
            <h4>Soluciones para tu negocio o tienda en línea.</h4>
          </div>
<div class="clearfix"></div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <a href="https://envios.guiapaqueteria.com/shipping/sign_up/" target="_blank" class="btn btn-naranja btn-lg">REGÍSTRATE AHORA</a>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">&nbsp;</div>

      
</div>
</div>
</div>



 <!--:::::::::::::::::::::: INFO UTILES ::::::::::::::::::::-->

<div class="container-fluid BGgrisC">
<div class="container">
<div class="row fastGuides">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <h2 class="text-center">Información útil para tu Envío</h2>
          </div>
<div class="clearfix"></div>


<?php
    //Dichiarazione Loop Personalizzato
    $args = array(
        'post_type' => 'guias',
        'posts_per_page' => 6,
        'orderby' => 'menu_order date',
        'order' => 'ASC'
    );

    $posts = get_posts($args);
    $count = 0;
    
    //Esecuzione Loop Personalizzato

    foreach($posts as $post_guias):

      $count = $count + 1;  
?>

      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-left fastGuid">
              <a href="<?php echo esc_url( get_permalink($post_guias->ID)); ?>">
              <div class="cont">
              <img src="<?php echo get_the_post_thumbnail_url($post_guias->ID); ?>" class="img-responsive js-lazy-image">
              <h3><?php echo $post_guias->post_title; ?></h3>
              <p><?php echo wp_trim_words( $post_guias->post_content, 15, '...' );?></p>
              </div>
              </a>
      </div>
      
 <?php
  endforeach;
?>   

</div>
</div>
</div>

 
<div class="container-fluid hp3reasons faq">
<div class="container">
 
            <div class="col-md-12 text-center">
              <h2>Preguntas Frecuentes</h2>
            </div>
 

 
            <div class="col-md-12 text-center">
      
<div class="panel-group" id="faqSx" role="tablist" aria-multiselectable="true">


  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="faq01">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#faqSx" href="#collapseFaq01" aria-expanded="false" aria-controls="collapseFaq01">
         ¿Qué es GuiaPaquetería?
        </a>
      </h4>
    </div>
    <div id="collapseFaq01" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faq01">
      <div class="panel-body">
         <p>Somos un comparador de empresas de paquetería. A través de nuestra página puedes cotizar tu envío y recibir ofertas de las principales empresas de paquetería y hacer tu envío a precios especiales no disponibles en sucursales. Esto lo logramos dado que tenemos acuerdos con las empresas en nuestro catálogo.</p>

      <p>Somos un intermediario entre las empresas y el cliente final. El servicio de recolección, entrega rastreo, etc. Es proporcionado por la empresa que elijas, pero nosotros te damos todas las facilidades para hacerlo todo en nuestra página.</p>
      </div>
    </div>
</div>




  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="faq02bis">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#faqSx" href="#collapseFaq02bis" aria-expanded="false" aria-controls="collapseFaq02bis">
         ¿Cómo Funcionan los envíos en GuíaPaquetería?
        </a>
      </h4>
    </div>
    <div id="collapseFaq02bis" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faq02bis">
      <div class="panel-body">
        <ol>
          <li>Cotiza tu envío.</li>
          <li>Recibirás ofertas de las empresas más importantes en México. Elige la tarifa y servicios que más te convengan.</li>
          <li>Introduce los datos de origen y destino.</li>
          <li>Realiza tu pago con tarjeta, transferencia bancaria, PayPal u OXXO.</li>
          <li>Al hacer tu pago podrás descargar tu guía de envío. Deberás imprimirla y pegarla a tu envío. También te envíamos una copia a tu correo electrónico.</li>
        </ol>

<p><small>** Todos nuestros servicios incluyen recolección a domicilio sin costo extra. Si lo deseas también ofrecemos un servicios de recolección premium, <a class="pointer" data-toggle="modal" data-target=".premium">conoce más aquí</a></small></p>
      </div>
    </div>
  </div>




  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="faq02">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#faqSx" href="#collapseFaq02" aria-expanded="false" aria-controls="collapseFaq02">
         ¿Dónde están las sucursales?
        </a>
      </h4>
    </div>
    <div id="collapseFaq02" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faq02">
      <div class="panel-body">
        <p>GuíaPaquetería no cuenta con sucursales, los servicios de entrega en sucursal o recolección ocurre, deben ser hechos directamente en la sucursal de la empresa que elijas.</p>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="faq03">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#faqSx" href="#collapseFaq03" aria-expanded="false" aria-controls="collapseFaq03">
         ¿Cómo hago un envío Ocurre?
        </a>
      </h4>
    </div>
    <div id="collapseFaq03" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faq03">
      <div class="panel-body">
       <p>Hemos escrito <a href="https://guiapaqueteria.com/hacer-envio-ocurre-guiapaqueteria/">esta guía</a> para tu referencia, pero aquí te resumimos el proceso. Para hacer un envío ocurre solo es necesario que al introducir los datos de origen y destino (tercer paso del proceso de envío) introduzcas la dirección de la sucursal que desees y especifiques que es un envío ocurre.</p>
       <p>Ejemplo: 
        <br>
    Dirección de entrega:  (Ocurre) Sucursal Redpack en Av. Central No. 51, Col. Bosques de los bosques.</p>
      </div>
    </div>
</div>
 <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="faq04">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#faqSx" href="#collapseFaq04" aria-expanded="false" aria-controls="collapseFaq04">
        ¿Cómo funciona el servicio de recolección?
        </a>
      </h4>
    </div>
    <div id="collapseFaq04" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faq04">
      <div class="panel-body">
       <p>Todos nuestros servicios incluyen recolección sin costo extra. Además contamos con un servicio de recolecciones premium si necesitas apoyo especial. Puedes adquirirlo en el tercer paso del proceso.</p>

      <p>Las recolecciones son hechas por la empresa que elijas para hacer tu envío. Un repartidor pasará a recoger tu paquete en la dirección que indiques. Puedes leer más sobre las recolecciones <a href="https://envios.guiapaqueteria.com/shipping/pickups/pickup_guarantee/" target="_blank">aquí</a>.</p>
      </div>
    </div>
  </div>
 <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="faq05">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#faqSx" href="#collapseFaq05" aria-expanded="false" aria-controls="collapseFaq05">
        ¿En qué horario se hacen las recolecciones?
        </a>
      </h4>
    </div>
    <div id="collapseFaq05" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faq05">
      <div class="panel-body">
       <p>Se hacen en un horario de 09:00 am a 8:00 pm. Se pide atentamente al cliente que considere estar en el domicilio durantes este rango de tiempo o que se encuentre alguien que haga la entrega del paquete.
      </p>
      </div>
    </div>
  </div>

 <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="faq06">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#faqSx" href="#collapseFaq06" aria-expanded="false" aria-controls="collapseFaq06">
          ¿Qué pasa si no había nadie cuando se intentó la recolección?
        </a>
      </h4>
    </div>
    <div id="collapseFaq06" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faq06">
      <div class="panel-body">
       <p>Si el repartidor pasa a recoger tu paquete y no hay nadie en el domicilio por lo general se dejará una nota que indica el intentó la recolección sin tener éxito. <b>En este caso deberás programar una nueva recolección llamando a directamente a la empresa. </b>
      </p>
      </div>
    </div>
  </div>
 
 <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="faq07">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#faqSx" href="#collapseFaq07" aria-expanded="false" aria-controls="collapseFaq07">
¿Cuánto cuesta el enviar un paquete o documento?
        </a>
      </h4>
    </div>
    <div id="collapseFaq07" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faq07">
      <div class="panel-body">
       <p>El costo depende de la distancia y el peso del sobre, para conocer el costo exacto es necesario cotizar en nuestra página. Para cotizar debes conocer los códigos postales y colonias de origen y destino, dimensiones (alto, largo y ancho en centímetros) y peso de tu paquete (el kilos). Para documentos solo debes conocer el peso.
      </p>
      </div>
    </div>
  </div>


 <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="faq08">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#faqSx" href="#collapseFaq08" aria-expanded="false" aria-controls="collapseFaq08">
¿Cuánto tarda en llegar mi envío?
        </a>
      </h4>
    </div>
    <div id="collapseFaq08" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faq08">
      <div class="panel-body">
       <p>El tiempo de entrega depende del servicio que selecciones. Las empresas cuentan con servicios exprés de entrega al siguiente día con diferentes modalidades. </p>
<p>En servicios económicos los rangos de entrega son de entre 1 a 5 días. <b>Los servicios económicos no tienen garantía de entrega</b>. Por lo que en temporadas altas como navidad los envíos en servicio económicos pueden tardar más.
      </p>
      </div>
    </div>
  </div>

 <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="faq09">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#faqSx" href="#collapseFaq09" aria-expanded="false" aria-controls="collapseFaq09">
¿Qué opciones de pago tengo?
        </a>
      </h4>
    </div>
    <div id="collapseFaq09" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faq09">
      <div class="panel-body">
       <p>Te brindamos todas las facilidades para hacer tu pago. Contamos con pagos con tarjetas de crédito o débito, transferencias SPEI, PayPal y pagos en tiendas OXXO.</p>

<p>Justo después de completar tu pago podrás descargar tu guía de envío, que además te enviamos por correo electrónico.</p>
      </div>
    </div>
  </div>

 <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="faq10">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#faqSx" href="#collapseFaq10" aria-expanded="false" aria-controls="collapseFaq10">
 ¿Cómo funcionan los pagos en OXXO?
        </a>
      </h4>
    </div>
    <div id="collapseFaq10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faq10">
      <div class="panel-body">
       <p>Al seleccionar pagos en OXXO se emitirá una ficha de pago con número de referencia. Puedes imprimir la ficha o tomarle una foto. LLévala a tu OXXO más cercano y haz tu pago en efectivo. Al hacer tu pago recibirás tu guía en tu correo electrónico de manera instantánea.</p>
      </div>
    </div>
  </div>

 <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="faq11">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#faqSx" href="#collapseFaq11" aria-expanded="false" aria-controls="collapseFaq11">
¿Cómo hago un envío por cobrar?
        </a>
      </h4>
    </div>
    <div id="collapseFaq11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faq11">
      <div class="panel-body">
       <p>En nuestra página es muy sencillo hacer un envío por cobrar. Dado que tenemos diferentes opciones de pago y además puedes enviar la guía por correo electrónico, tienes toda la flexibilidad para hacerlo. </p>

<p>Por ejemplo si tu vas a enviar pero no vas a pagar, puedes hacer todo el proceso de emisión de guía de envío en nuestra página y al llegar a la parte de pagos seleccionar “pago con OXXO”. Se te enviará una ficha de pago con un número de referencia, el cual puedes enviar a quien va a apagar para que acuda a una tienda OXXO y haga el pago. En cuanto esté hecho recibirás tu guía por correo electrónico.</p>

<p>Si tu vas a recibir y a pagar, puedes hacer el proceso de emisión de guía de envío en nuestra página, hacer el pago y enviar la guía a quien vaya a hacer el envío.</p>
      </div>
    </div>
  </div>


 <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="faq12">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#faqSx" href="#collapseFaq12" aria-expanded="false" aria-controls="collapseFaq12">
¿Puedo obtener un comprobante de envío?
        </a>
      </h4>
    </div>
    <div id="collapseFaq12" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faq12">
      <div class="panel-body">
       <p>Sí. En general la prueba de envío será tu guía, sin embargo para mayor seguridad puedes tomar una foto de tu paquete una vez que lo tengas listo para entrega al repartidor o en sucursal. Adicionalmente puedes pedir al repartidor que lo firme de recibido. Esto solo para recolecciones a domicilio. En sucursales obtendrás un comprobante.</p>
      </div>
    </div>
  </div>


 <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="faq13">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#faqSx" href="#collapseFaq13" aria-expanded="false" aria-controls="collapseFaq13">
¿Dónde están las sucursales de GuíaPaquetería?
        </a>
      </h4>
    </div>
    <div id="collapseFaq13" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faq13">
      <div class="panel-body">
       <p>Nosotros no tenemos sucursales, dependemos de las sucursales de las empresas. Solo somos los intermediarios que te ayudan a hacer tu envío desde casa y a precios increíbles.</p>
      </div>
    </div>
  </div>


 <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="faq14">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#faqSx" href="#collapseFaq14" aria-expanded="false" aria-controls="collapseFaq14">
Problemas generales
        </a>
      </h4>
    </div>
    <div id="collapseFaq14" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faq14">
      <div class="panel-body">
       <p>Si alguna duda no quedó resuelta en nuestras preguntas frecuentes, puedes contactarnos por correo electrónico a contacto@guiapaqueteria.com o envíanos un mensaje a través del chat disponible en la esquina inferior derecha de esta página.
</p>
      </div>
    </div>
  </div>
</div>
 
</div></div></div>


					
					</article> <!-- end article -->
					
					<?php comments_template(); ?>
					
					<?php endwhile; ?>	
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("Not Found", "wpbootstrap"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "wpbootstrap"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
				<?php //get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->
			
			
			
			<!-- ::::::::::::::::::::::::::::::: SECCIÓN LISTADO EMPRESAS :::::::::::::::::::: -->


<?php get_footer(); ?>