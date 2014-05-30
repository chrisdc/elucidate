<?php
/**
 * Elucidate functions and definitions
 *
 * @package Elucidate
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'elucidate_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function elucidate_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Elucidate, use a find and replace
	 * to change 'elucidate' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'elucidate', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 680, 9999 );
	add_image_size( 'elucidate-full-width', 920, 9999 );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'elucidate' ),
		'social' => __( 'Social Media Menu', 'elucidate' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'quote' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'elucidate_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // elucidate_setup
add_action( 'after_setup_theme', 'elucidate_setup' );

/**
 * Adjust content_width on front-page.php
 */
function elucidate_adjust_content_width() {
    global $content_width;
 
    if ( is_page_template( 'page-templates/full-width.php' ) )
        $content_width = 780;
}
add_action( 'template_redirect', 'elucidate_adjust_content_width' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function elucidate_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'elucidate' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'The default sidebar that appears on the majority of pages', 'elucidate' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Front Page Widget 1', 'elucidate' ),
		'id'            => 'front-page-1',
		'description'   => __( 'The first (leftmost) sidebar used by front-page.php', 'elucidate' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Front Page Widget 2', 'elucidate' ),
		'id'            => 'front-page-2',
		'description'   => __( 'The second (central) sidebar used by front-page.php', 'elucidate' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Front Page Widget 3', 'elucidate' ),
		'id'            => 'front-page-3',
		'description'   => __( 'The third (rightmost) sidebar used by front-page.php', 'elucidate' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'elucidate_widgets_init' );

/**
 * Returns the url to the Lato web font stylesheet
 */
function elucidate_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'elucidate' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Lato:300,400,700,400italic,700italic' ), "//fonts.googleapis.com/css" );
	}

	return $font_url;
}

/**
 * Enqueue scripts and styles
 */
function elucidate_scripts() {
	wp_enqueue_style( 'elucidate-style', get_stylesheet_uri() );
	
	wp_enqueue_style ( 'lato-webfont', elucidate_font_url() );

	wp_enqueue_script( 'elucidate-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'elucidate-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'elucidate-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'elucidate_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
