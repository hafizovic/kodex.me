<?php
/**
 * kodex functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kodex
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kodex_setup() {

    // Make theme available for translation
	load_theme_textdomain( 'kodex', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title
	add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages
	add_theme_support( 'post-thumbnails' );

    // Remove Emoji Code
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');

    // Remove RSD link
    remove_action('wp_head', 'rsd_link');

    // Remove WP version
    remove_action('wp_head', 'wp_generator');

    // Remove JSON link
    remove_action('wp_head', 'rest_output_link_wp_head', 10);

    // Remove Global inline style
    function remove_global_styles() {wp_dequeue_style('global-styles');}
    add_action('wp_enqueue_scripts', 'remove_global_styles');

    // Remove Classic Themes CSS
    remove_action('wp_enqueue_scripts', 'wp_enqueue_classic_theme_styles');

    // Register navigation menus
    register_nav_menus(
        array(
            'primary' => esc_html__('Primarni', 'kodex'),
            'secondary' => esc_html__('Sekundarni', 'kodex'),
        )
    );

    // Switch default core markup
	add_theme_support(
		'html5',
        array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script')
	);

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support( 'post-formats', array( 'image', 'video', 'audio', 'gallery' ) );
}
add_action( 'after_setup_theme', 'kodex_setup' );


// Content width in pixels, based on the theme's design and stylesheet.
function kodex_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kodex_content_width', 880 );
}
add_action( 'after_setup_theme', 'kodex_content_width', 0 );

// Enqueue scripts and styles.
function kodex_scripts() {

    // Styles
    wp_enqueue_style( 'kodex-style', get_stylesheet_uri(), array(), _S_VERSION );
//    wp_enqueue_style( 'kodex-inline', get_template_directory_uri() . '/assets/css/inline.css', array(), _S_VERSION );
//    wp_enqueue_style( 'kodex-demo', get_template_directory_uri() . '/assets/css/demo.css', array(), _S_VERSION );
//    wp_enqueue_style( 'kodex-fa', get_template_directory_uri() . '/assets/css/font-awesome-all.min.css', array(), _S_VERSION );
//    wp_enqueue_style( 'kodex-mq', get_template_directory_uri() . '/assets/css/media-queries.css', array(), _S_VERSION );

    // Scripts
	wp_enqueue_script( 'kodex-inline', get_template_directory_uri() . '/assets/js/inline.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'kodex-inherit', get_template_directory_uri() . '/assets/js/inherit.js', array('jquery'), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'kodex_scripts' );

require get_template_directory() . '/inc/back-end.php';
require get_template_directory() . '/inc/theme-func.php';
require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/kirki.php';
require get_template_directory() . '/inc/metabox.php';