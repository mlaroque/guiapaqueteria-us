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




<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container-fluid foot">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-3 foot1">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-1') ) : ?>
				<?php endif; ?>
				</div>
				<div class="col-md-3 col-sm-3 foot2">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-2') ) : ?>
				<?php endif; ?>
				</div>
				<div class="col-md-3 col-sm-3 foot3">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-3') ) : ?>
				<?php endif; ?>
				</div>
				<div class="col-md-3 col-sm-3 foot4">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-4') ) : ?>
				<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="container grisBK">
			<div class="col-md-12">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-5') ) : ?>
				<?php endif; ?>
				</div>
		</div>
	</div>

	<div class="container-fluid footSub">
		<div class="container">
		<div class="row">
			<div class="col-md-12 text-center"><p><br/></p>
       		<p class="text-center blanco">Copyright © 2016 – 2019 Guiapaqueteria by <a href="https://lacomuna.mx/" class="white" target="_blank" rel="noopener noreferrer">LaComuna</a> – All rights reserved </p><p><br/></p>
       	</div>
       </div>
       </div>
   </div>

<?php wp_footer(); ?>
	
</footer>
</body>
</html>
