<?php
/**
 * essential functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package essential
 */

if ( ! function_exists( 'essential_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function essential_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on essential, use a find and replace
	 * to change 'essential' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'essential', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'essential' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'essential_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'essential_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function essential_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'essential_content_width', 640 );
}
add_action( 'after_setup_theme', 'essential_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function essential_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'essential' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Default Page Sidebar', 'essential' ),
		'id'            => 'sidebar-2',
		'description'   => 'the sidebar that appears in the default page template',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'essential_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function essential_scripts() {
	wp_enqueue_style( 'essential-style', get_stylesheet_uri() );

	wp_enqueue_script('jquery');
	wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery') );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	//Lets bring in foundation CSS
	wp_enqueue_style( 'foundation-min', get_template_directory_uri() . '/css/foundation.min.css', array('essential-style') );
	wp_enqueue_style( 'bxslider', get_template_directory_uri() . '/css/bxslider.css', array('essential-style') );
	wp_enqueue_style( 'theme', get_template_directory_uri() . '/css/theme.css', array('essential-style', 'foundation-min', 'bxslider') );
	wp_enqueue_style( 'theme-responsive', get_template_directory_uri() . '/css/responsive.css', array('essential-style', 'foundation-min', 'bxslider', 'theme') );

	//Lets bring in foundation JS
	wp_enqueue_script( 'foundation-min', get_template_directory_uri() . '/js/foundation.min.js', array('jquery') );
	wp_enqueue_script( 'input', get_template_directory_uri() . '/js/input.js', array('jquery') );
	wp_enqueue_script( 'bxslider', get_template_directory_uri() . '/js/bxslider.js', array('jquery', 'jquery-easing') );

}
add_action( 'wp_enqueue_scripts', 'essential_scripts' );

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
