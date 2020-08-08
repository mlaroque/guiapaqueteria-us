<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package LaComuna-Theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<!-- HREF Lang -->
<?php include 'inc/hreflang_references.php';?>
<?php wp_head(); ?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KD6QS5D');</script>
<!-- End Google Tag Manager -->
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KD6QS5D"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


  <div id="page" class="site">

<!--NEW HEADER BOOTSTRAP-->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/cotizador.css">

<header id="masthead" class="site-header" role="banner">
   <div class="container">
     
       <div class="row">
        
  
  <nav class="navbar navbar-headerW navbar-fixed-top">

   <div class="col-md-3">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-headerW">
      <a title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>">
        <img class="visible-lg visible-md hidden-sm hidden-xs img-responsive pull-left visible logo-lg" src="<?php echo get_template_directory_uri() . '/images/logo.png'; ?>" title="<?php echo get_bloginfo('description'); ?>" alt="<?php echo get_bloginfo('description'); ?>">
        </a>
        <a title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>">
        <img class="hidden-lg hidden-md visible-sm visible-xs img-responsive pull-left visible logo-xs" src="<?php echo get_template_directory_uri() . '/images/logo-xs.png'; ?>" title="<?php echo get_bloginfo('description'); ?>" alt="<?php echo get_bloginfo('description'); ?>">
        </a>


        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    </div>
    <div class="col-md-9 brdNav">
    <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-responsive-collapse navbar-right">
          <?php // Display the WordPress menu if available
          //wp_nav_menu( 
          //  array( 
          //    'menu' => 'Guiapaqueteria 2018', /* menu name */
          //    'menu_class' => 'nav navbar-nav',
          //    'theme_location' => 'main_nav', /* where in the theme it's assigned */
          //    'container' => 'false', /* container class */
          //  )
          //); ?>
          <?php wp_nav_menu(array(
                          'menu' => 'Guiapaqueteria 2018',
                         'theme_location' => 'main_nav',
                         'container' => false,
                         'walker' => new LCMN_Walker(),
                         'items_wrap' => '<ul id="%1$s" class="navbar-nav ml-auto">%3$s</ul>') )?>
          </div>
    </div><!-- /.navbar-collapse -->

</nav>
    </div>
            
</header>
<!--//NEW HEADER BOOTSTRAP-->
         
