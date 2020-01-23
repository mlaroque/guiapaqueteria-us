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
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'lacomuna-theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'lacomuna-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );  register_sidebar( array(
		'name'          => esc_html__( 'Footer-1', 'lacomuna-theme' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'lacomuna-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
     register_sidebar( array(
		'name'          => esc_html__( 'Footer-2', 'lacomuna-theme' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'lacomuna-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
     register_sidebar( array(
		'name'          => esc_html__( 'Footer-3', 'lacomuna-theme' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'lacomuna-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
 register_sidebar( array(
		'name'          => esc_html__( 'Footer-4', 'lacomuna-theme' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'lacomuna-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
  register_sidebar( array(
		'name'          => esc_html__( 'Footer Horizontal', 'lacomuna-theme' ),
		'id'            => 'footer-horizontal',
		'description'   => esc_html__( 'Add widgets here.', 'lacomuna-theme' ),
		'before_widget' => '<section id="%1$s" class="footH widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
  register_sidebar( array(
		'name'          => esc_html__( 'Copyright', 'lacomuna-theme' ),
		'id'            => 'copyright',
		'description'   => esc_html__( 'Add widgets here.', 'lacomuna-theme' ),
		'before_widget' => '<section id="%1$s" class="copyright widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
  
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
	
	register_post_type( 'guias',  
	array(  
		'labels' => array(  
			'name' => __( 'Guias' ),  
			'singular_name' => __( 'Guia' )  
		),  
	'public' => true,  
	'menu_position' => 6,  
	'taxonomies' => array( 'category', 'post_tag' ),
	'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
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


/**************************************/
/***********END*****************/
/**************************************/

?>