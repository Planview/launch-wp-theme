<?php
/**
 * Planview Product Launch functions and definitions
 *
 * @package Planview Product Launch
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'launch_theme_info') ) :
/**
 * Sets a global variable with the theme info
 */
function launch_theme_info() {
	global $launch_theme_info;
	$launch_theme_info = wp_get_theme();
}
add_action( 'init', 'launch_theme_info' );
endif;

if ( ! function_exists( 'launch_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function launch_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Planview Product Launch, use a find and replace
	 * to change 'launch' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'launch', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'launch' ),
		'footer' => __( 'Footer Menu', 'launch' ),
	) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // launch_setup
add_action( 'after_setup_theme', 'launch_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function launch_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'launch' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'launch_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function launch_scripts() {
	global $launch_theme_info;

	$launch_version = $launch_theme_info->get( 'Version' );

	if ( is_admin() )
		wp_enqueue_style( 'launch-style', get_stylesheet_uri() );

	if ( ! is_admin() ) {
		wp_enqueue_style( 'launch-style', get_template_directory_uri() . '/css/style.css', array(), $launch_version );
	}

	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/min/modernizr.min.js', array(), '2.7.2', false );

	wp_enqueue_script( 'launch-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'launch_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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
