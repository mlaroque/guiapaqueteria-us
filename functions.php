<?php
/**
 * LaComuna-Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package LaComuna-Theme
 */
if ( ! function_exists( 'lacomuna_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function lacomuna_theme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on LaComuna-Theme, use a find and replace
	 * to change 'lacomuna-theme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'lacomuna-theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'header' => esc_html__( 'Header', 'lacomuna-theme' ),
    	'Top' => esc_html__( 'Top', 'lacomuna-theme' ),
		'footer' => esc_html__( 'Footer', 'lacomuna-theme' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'commentform',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'lacomuna_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'lacomuna_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lacomuna_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lacomuna_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'lacomuna_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lacomuna_theme_widgets_init() {
 
  register_sidebar(array(
    'id' => 'footer01',
    'name' => 'Footer 01',
    'before_widget' => '<div id="%1$s" class="widget footer-widget col-xs-12 col-sm-3 col-md-3 col-lg-3 %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widgettitle">',
    'after_title' => '</h2>',
  ));

  register_sidebar(array(
    'id' => 'footer02',
    'name' => 'Footer 02',
    'before_widget' => '<div id="%1$s" class="widget footer-widget col-xs-12 col-sm-3 col-md-3 col-lg-3 %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widgettitle">',
    'after_title' => '</h2>',
  ));

 register_sidebar(array(
    'id' => 'footer03',
    'name' => 'Footer 03',
    'before_widget' => '<div id="%1$s" class="widget footer-widget col-xs-12 col-sm-3 col-md-3 col-lg-3 %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widgettitle">',
    'after_title' => '</h2>',
  ));

    register_sidebar(array(
    'id' => 'footer04',
    'name' => 'Footer 04',
    'before_widget' => '<div id="%1$s" class="widget footer-widget col-xs-12 col-sm-3 col-md-3 col-lg-3 %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widgettitle">',
    'after_title' => '</h2>',
  ));
    
  register_sidebar(array(
    'id' => 'footer05',
    'name' => 'Footer 5 LeftOne',
    'before_widget' => '<div id="%1$s" class="widget footer-horizontal col-xs-12 col-sm-8 col-md-8 col-lg-8  %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widgettitle">',
    'after_title' => '</h2>',
  ));

  register_sidebar(array(
    'id' => 'footer06',
    'name' => 'Footer 6 RightOne',
    'before_widget' => '<div id="%1$s" class="widget footer-horizontal col-xs-12 col-sm-4 col-md-4 col-lg-4   text-right %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widgettitle">',
    'after_title' => '</h2>',
  ));

  register_sidebar(array(
    'id' => 'footer07',
    'name' => 'Footer Copy',
    'before_widget' => '<div id="%1$s" class="widget footer-copy text-center col-xs-12 col-sm-12 col-md-12 col-lg-12  %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widgettitle">',
    'after_title' => '</h2>',
  ));
  
}
add_action( 'widgets_init', 'lacomuna_theme_widgets_init' );
/**
 * Enqueue scripts and styles.
 */
function lacomuna_theme_scripts() {
    wp_enqueue_style('boot-main', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('boot-theme', get_template_directory_uri() . '/bootstrap/css/bootstrap-theme.min.css');
    if(!is_admin())
    {
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
    wp_enqueue_script('jquery');
        //bootstrap scripts
    wp_register_script('boot-script', get_template_directory_uri() .  '/bootstrap/js/bootstrap.min.js', 'jquery', false, true );
    wp_register_script( 'wpbs-js', 
      get_template_directory_uri() . '/library/dist/js/scripts.d1e3d952.min.js',
      array('bootstrap'), 
      '1.2', true );
    wp_enqueue_script( 'wpbs-js' );
    wp_enqueue_script('boot-script');    
    wp_register_script('main', get_template_directory_uri() .  '/js/main.js', 'jquery', false, true );
    wp_enqueue_script('main'); 
    }
	wp_enqueue_style( 'lacomuna-theme-style', get_stylesheet_uri() );
	wp_enqueue_script( 'lacomuna-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'lacomuna-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    wp_enqueue_script( 'nav-walker', get_template_directory_uri() . '/js/nav-walker.js', array(), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lacomuna_theme_scripts' );
// add image 
if ( function_exists( 'add_image_size' ) ) 
{ 
	add_image_size( 'post-thumb', 750, 300, true ); // larghezza 750 pixel e altezza 300 - true è il ritaglio
	add_image_size( 'cat-thumb', 330, 220, true ); // (ritagliata)
	add_image_size( 'smlThumb', 75, 100, true ); // (ritagliata)
}





//paginazione
function custom_pagination() {
    global $wp_query;

$big = 999999999; // need an unlikely integer

$pages =  paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
    'prev_text'          => __(' « '),
	'next_text'          => __(' » '),
	'next_text'          => __(' » '),
	'total' => $wp_query->max_num_pages,
    'type'          => 'array',

) );
if(is_array($pages))
{
    echo '<ul class="pagination">';
    foreach ($pages as $page)
{
    $class = (strpos($page, 'current') !== false) ? 'active' : 'paged';
    echo '<li class="'.$class.'">' . $page . '</li>';
}
    echo '</ul>';
}
}

/**************************************/
/***********POST TYPES*****************/
/**************************************/

add_action( 'init', 'create_post_type' );

function create_post_type() {  
	// register_post_type( 'paqueteria',  
    //     array(  
    //         'labels' => array(  
    //             'name' => __( 'Paqueterias' ),  
    //             'singular_name' => __( 'Paqueteria' )  
    //         ),  
    //     'public' => true,  
    //     'menu_position' => 4,
	// 	'hierarchical' => true,		
    //     'taxonomies' => array( 'category', 'post_tag' ),
	// 	'supports' => array( 'title', 'editor', 'author', 'comments', 'thumbnail', 'excerpt', 'page-attributes')
    //     )  
    // ); 
	
	register_post_type( 'empresas',  
        array(  
            'labels' => array(  
                'name' => __( 'Empresas' ),  
                'singular_name' => __( 'Empresa' )  
            ),  
        'public' => true,  
        'menu_position' => 4,
		'hierarchical' => true,		
        'taxonomies' => array( 'category', 'post_tag' ),
		'supports' => array( 'title', 'editor', 'author', 'comments', 'thumbnail', 'excerpt', 'page-attributes')
        )  
    );


    register_post_type( 'paqueterias-en',  
        array(  
            'labels' => array(  
                'name' => __( 'Paqueterias en Ciudad' ),  
                'singular_name' => __( 'Paqueteria en Ciudad' )  
            ),  
        'public' => true,  
        'menu_position' => 5,
		'hierarchical' => true,		
        'taxonomies' => array( 'category', 'post_tag' ),
		'supports' => array( 'title', 'editor', 'author', 'comments', 'thumbnail', 'excerpt', 'page-attributes')
        )  
	);

	register_post_type( 'envios',  
	array(  
		'labels' => array(  
			'name' => __( 'Rutas' ),  
			'singular_name' => __( 'Ruta' )  
		),  
	'public' => true,  
	'menu_position' => 6,  
	'hierarchical' => true,
	'taxonomies' => array( 'category', 'post_tag' ),
	'supports' => array( 'title', 'editor', 'author', 'comments', 'thumbnail', 'excerpt', 'page-attributes')
	) 
	);
	
	register_post_type( 'guias',  
	array(  
		'labels' => array(  
			'name' => __( 'Guias' ),  
			'singular_name' => __( 'Guia' )  
		),  
	'public' => true,  
	'menu_position' => 7,  
	'taxonomies' => array( 'category', 'post_tag' ),
	'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
	)  
    );

    register_post_type( 'giros',  
    array(  
        'labels' => array(  
            'name' => __( 'Giros' ),  
            'singular_name' => __( 'Giro' )  
        ),  
    'public' => true,  
    'menu_position' => 8,  
    'hierarchical' => true,
    'taxonomies' => array( 'category', 'post_tag' ),
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'page-attributes')
    )  
    );

    register_post_type( 'casilleros',  
    array(  
        'labels' => array(  
            'name' => __( 'Casilleros' ),  
            'singular_name' => __( 'Casillero' )  
        ),  
    'public' => true,  
    'menu_position' => 9,  
    'hierarchical' => true,
    'taxonomies' => array( 'category', 'post_tag' ),
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'page-attributes')
    )  
    );
	
} 

/**************************************/
/***********END*****************/
/**************************************/ 

/**************************************/
/***********SHORTCODES*****************/
/**************************************/

/* Incluimos los shortcodes del antiguo canvas que nos hacen falta */
require_once ( get_template_directory() . '/inc/functions/shortcodes-functions.php' );

/**************************************/
/***********END*****************/
/**************************************/ 



/**************************************/
/***********META BOXES*****************/
/**************************************/ 

/* Incluimos los shortcodes del antiguo canvas que nos hacen falta */
require_once ( get_template_directory() . '/inc/functions/meta-functions.php' );


/**************************************/
/***********END*****************/
/**************************************/ 

/**************************************/
/***********OTHER FUNCTIONS*****************/
/**************************************/ 

//Devuelve la imagen del logo si existe
function get_logo($post_id, $size){

    $thumb_id = get_post_thumbnail_id($post_id);
    $thumb_url = wp_get_attachment_image_src($thumb_id,$size, true);
    $logo_url = $thumb_url[0];

    return $logo_url;
}

//Añade categorias y tags a las páginas
function add_taxonomies_to_pages() {
 register_taxonomy_for_object_type( 'post_tag', 'page' );
 register_taxonomy_for_object_type( 'category', 'page' );
 }
add_action( 'init', 'add_taxonomies_to_pages' );

/* Incluimos funciones que pueden funcionar sin wordpress */
//require_once ( get_template_directory() . '/inc/functions/not-wp-functions.php' );

    class LCMN_Walker extends Walker_Nav_Menu {
    private $curItem;
    // Displays start of an element. E.g '<li> Item Name'
    // @see Walker::start_el()
    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
      $this->curItem = $item;
        $object = $item->object;
        $type = $item->type;
        $title = $item->title;
        $description = $item->description;
        $permalink = $item->url;

      if($depth > 0){
            $output .= "<li class='hidden subtoggle-".$item->menu_item_parent." " .  implode(" ", $item->classes) . "'>";
      }else{
            $output .= "<li class='" .  implode(" ", $item->classes) . "'>";
      }
        
      //Add SPAN if no Permalink
      if( $permalink && $permalink != '#' ) {
        $output .= '<a href="' . $permalink . '">';
      } else {
        $output .= '<a onclick="menu_toggle('.$item->ID.');">';
      }
       
      $output .= $title;

      if( $description != '' && $depth == 0 ) {
        $output .= '<small class="description">' . $description . '</small>';
      }


      $output .= '</a>';

    }

    function start_lvl(&$output, $item, $depth) {
        $output .= '<ul id="sub-'.$this->curItem->ID.'" class="sub-menu">';
    } 
    }

/**
 * Disable the emoji's
 */
function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
    add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
   }
   add_action( 'init', 'disable_emojis' );
   
   /**
    * Filter function used to remove the tinymce emoji plugin.
    * 
    * @param array $plugins 
    * @return array Difference betwen the two arrays
    */
   function disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
    return array();
    }
   }
   
   /**
    * Remove emoji CDN hostname from DNS prefetching hints.
    *
    * @param array $urls URLs to print for resource hints.
    * @param string $relation_type The relation type the URLs are printed for.
    * @return array Difference betwen the two arrays.
    */
   function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
    if ( 'dns-prefetch' == $relation_type ) {
    /** This filter is documented in wp-includes/formatting.php */
    $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
   
   $urls = array_diff( $urls, array( $emoji_svg_url ) );
    }
   
   return $urls;
   }

   /* //////*/
//    Disable embed.min
   function disable_embeds_code_init() {

    // Remove the REST API endpoint.
    remove_action( 'rest_api_init', 'wp_oembed_register_route' );
   
    // Turn off oEmbed auto discovery.
    add_filter( 'embed_oembed_discover', '__return_false' );
   
    // Don't filter oEmbed results.
    remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
   
    // Remove oEmbed discovery links.
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
   
    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );
    add_filter( 'tiny_mce_plugins', 'disable_embeds_tiny_mce_plugin' );
   
    // Remove all embeds rewrite rules.
    add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
   
    // Remove filter of the oEmbed result before any HTTP requests are made.
    remove_filter( 'pre_oembed_result', 'wp_filter_pre_oembed_result', 10 );
   }
   
   add_action( 'init', 'disable_embeds_code_init', 9999 );
   
   function disable_embeds_tiny_mce_plugin($plugins) {
       return array_diff($plugins, array('wpembed'));
   }
   
   function disable_embeds_rewrites($rules) {
       foreach($rules as $rule => $rewrite) {
           if(false !== strpos($rewrite, 'embed=true')) {
               unset($rules[$rule]);
           }
       }
       return $rules;
   }

/**************************************/
/***********END*****************/
/**************************************/

?>