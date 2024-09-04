<?php
if ( ! defined( '_S_VERSION' ) ) {
    define( '_S_VERSION', '1.0.3' );
}

function design_setup() {
    // Make theme available for translation.
    load_theme_textdomain( 'design', get_template_directory() . '/inc/languages' );

    // Add default posts and comments RSS feed links to head.
    //add_theme_support( 'automatic-feed-links' );

    // Hide Admin bar for all users
    show_admin_bar(false);

    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support( 'post-thumbnails' );

    // Remove Emoji Code
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');

    // Remove RSD link
    remove_action ('wp_head', 'rsd_link');

    // Remove WLW Manfiest
    remove_action('wp_head', 'wlwmanifest_link');

    // Remove WP version
    remove_action('wp_head', 'wp_generator');

    // Remove JSON link
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );

    // Remove Global inline style
    function remove_global_styles(){
        wp_dequeue_style( 'global-styles' );
        wp_dequeue_style('dashicons');
        wp_deregister_style('dashicons');
    }
    add_action( 'wp_enqueue_scripts', 'remove_global_styles' );

    // Remove Classic Themes CSS
    remove_action( 'wp_enqueue_scripts', 'wp_enqueue_classic_theme_styles' );

    // Register navigation menus
    register_nav_menus(
        array(
            'header' => esc_html__( 'Header Navigacija', 'dizajn' ),
            'footer' => esc_html__( 'Footer Navigacija', 'dizajn' ),
        )
    );

    // Switch default core markup
    add_theme_support(
        'html5',
        array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script')
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'design_setup' );

// Content width in pixels, based on the theme's design and stylesheet.
function design_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'design_content_width', 960 );
}
add_action( 'after_setup_theme', 'design_content_width', 0 );

//// Register widget area
//function design_widgets_init() {
//    register_sidebar(
//        array(
//            'name'          => esc_html__( 'Sidebar', 'design' ),
//            'id'            => 'sidebar-1',
//            'description'   => esc_html__( 'Add widgets here.', 'design' ),
//            'before_widget' => '<section id="%1$s" class="widget %2$s">',
//            'after_widget'  => '</section>',
//            'before_title'  => '<h2 class="widget-title">',
//            'after_title'   => '</h2>',
//        )
//    );
//}
//add_action( 'widgets_init', 'design_widgets_init' );

// Enqueue scripts and styles
function design_scripts() {
    // Styles
    wp_enqueue_style( 'design-style', get_stylesheet_uri(), array(), _S_VERSION );

    // Scripts
    wp_enqueue_script( 'design-scripts',  get_template_directory_uri() . '/assets/dist/js/scripts.js', array(), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'design_scripts' );

// Backend snippets
require get_template_directory() . '/inc/back-end.php';
require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/kirki.php';
require get_template_directory() . '/inc/metabox.php';
require get_template_directory() . '/inc/theme-func.php';