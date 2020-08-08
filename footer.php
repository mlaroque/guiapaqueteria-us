<?php
/**
 * The template for displaying the footer
 *
  *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package LaComuna-Theme
 */

?> 


<div class="container-fluid payments">
    <div class="container">
    		<div class="row">
    			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
    				<h3><b>Métodos de Pago</b></h3>
<p> 
<img data-src="https://guiapaqueteria.com/us/wp-content/themes/lacomuna-theme/images/pm-visa.png" alt="visa" class="js-lazy-image js-lazy-image--handled fade-in" src="https://guiapaqueteria.com/us/wp-content/themes/lacomuna-theme/images/pm-visa.png">  
<img data-src="https://guiapaqueteria.com/us/wp-content/themes/lacomuna-theme/images/pm-mastercard.png" alt="mastercard" class="js-lazy-image js-lazy-image--handled fade-in" src="https://guiapaqueteria.com/us/wp-content/themes/lacomuna-theme/images/pm-mastercard.png"> 
<img data-src="https://guiapaqueteria.com/us/wp-content/themes/lacomuna-theme/images/pm-amex.png" alt="american express" class="js-lazy-image js-lazy-image--handled fade-in" src="https://guiapaqueteria.com/us/wp-content/themes/lacomuna-theme/images/pm-amex.png"> 
<img data-src="https://guiapaqueteria.com/us/wp-content/themes/lacomuna-theme/images/pm-paypal.png" alt="pay pal" class="js-lazy-image js-lazy-image--handled fade-in" src="https://guiapaqueteria.com/us/wp-content/themes/lacomuna-theme/images/pm-paypal.png"> 
<img data-src="https://guiapaqueteria.com/us/wp-content/themes/lacomuna-theme/images/pm-spei.png" alt="spei" class="js-lazy-image js-lazy-image--handled fade-in" src="https://guiapaqueteria.com/us/wp-content/themes/lacomuna-theme/images/pm-spei.png"> 
<img data-src="https://guiapaqueteria.com/us/wp-content/themes/lacomuna-theme/images/pm-oxxo.png" alt="oxxo" class="js-lazy-image js-lazy-image--handled fade-in" src="https://guiapaqueteria.com/us/wp-content/themes/lacomuna-theme/images/pm-oxxo.png"> 
  </p> 
    			</div>
    		</div>
    </div>
   	</div>
<div class="container-fluid newsletter">
    <div class="container">
    		<div class="row">
        			<div class="col-md-1 hidden-xs">
        				<img src="https://guiapaqueteria.com/wp-content/uploads/2018/04/newsletter.png" class="img-responsive">
            	</div>
        			<div class="col-md-6">
        				<h3>Recibe Ofertas y promociones directo a tu correo</h3>
        				<p>Somos Ecológicos, no enviamos correo basura :)</p>
        			</div>
        					<div class="col-md-5">
                   <!-- Begin MailChimp Signup Form -->
                  <!--<link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">
                  <style type="text/css">
                  #mc_embed_signup{background: transparent; clear:left; font:14px Helvetica,Arial,sans-serif; width:100%;}
                  /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
                     We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
                  </style>-->
                  <div id="mc_embed_signup">
                  <form action="https://guiapaqueteria.us18.list-manage.com/subscribe/post?u=53f130fd26af58902090a2786&amp;id=b30009e1f3" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate="novalidate">
                  <div id="mc_embed_signup_scroll">

                  <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="correo electrónico" required="">
                  <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                  <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_53f130fd26af58902090a2786_b30009e1f3" tabindex="-1" value=""></div>
                  <div class="clear"><input type="submit" value="Suscribir" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                  </div>
                  </form>
                  </div>
                    <!--End mc_embed_signup-->
                  </div>
</div>
</div>
</div>
 
<footer id="colophon" class="site-footer" role="contentinfo">
<div class="container-fluid foot">
<div class="container">
<div class="row">
 
        <div id="widget-footer">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer01') ) : ?>
                <?php endif; ?>
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer02') ) : ?>
                <?php endif; ?>
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer03') ) : ?>
                <?php endif; ?>
                  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer04') ) : ?>
                <?php endif; ?>
          </div> 
 
  
</div>
</div>
</div> 

 
<div class="container-fluid footSub">
  <div class="container">
    <div class="row">
      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer05') ) : ?>
        <?php endif; ?>
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer06') ) : ?>
        <?php endif; ?>
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer07') ) : ?>
        <?php endif; ?>
    </div>
  </div>
</div>

 
</footer> 
<?php wp_footer(); ?>

<?php if(!$amp_param){include 'modals.php';} ?>
	
</body>
</html>
