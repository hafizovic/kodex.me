<?php

// Change login logo url
function logo_url() {
    return home_url();
}
add_filter('login_headerurl', 'logo_url');

// Change login logo title
function url_title() {
    return get_bloginfo();
}
add_filter('login_headertext', 'url_title');

// Custom login styles/scripts
function login_style() {
    wp_enqueue_style('custom-login', get_template_directory_uri() . '/inc/admin/login.css', array(), '1.0.0', 'all');
}
add_action('login_enqueue_scripts', 'login_style');

// Custom admin styles/scripts
function backend_style() {
    wp_enqueue_style('backend', get_template_directory_uri() . '/inc/admin/backend.css', array(), '1.0.0', 'all');
}
add_action('admin_enqueue_scripts', 'backend_style');

// Remove default Dashboard widgets
function remove_dashboard_meta() {
    remove_action( 'welcome_panel', 'wp_welcome_panel' );
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
    remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' );
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
}
add_action( 'admin_init', 'remove_dashboard_meta' );

// Remove default Customizer Options
function ja_remove_customizer_options( $wp_customize ) {
    $wp_customize->remove_panel( 'themes'              ); // Change theme
    $wp_customize->remove_panel('widgets'              );
    $wp_customize->remove_section( 'static_front_page' ); // Homepage Settings
    $wp_customize->remove_section( 'title_tagline'     ); // Site Identity
    $wp_customize->remove_section( 'custom_css'        ); // Additional CSS
}
add_action( 'customize_register', 'ja_remove_customizer_options', 10 );

// Create Custom Widget
function custom_dashboard_help() {
    echo '<h2>Dobrodošli…</h2>';
    echo '<h3>…na Kodex.me administraciju.</h3>';
    echo '<hr>';
    echo '<ul>';
    echo '<li><a href="' . wp_customize_url() . '?autofocus[section]=home_intro">Da izmijenite raspored vijesti na početnoj</a></li>';
    echo '<li><a href="' . wp_customize_url() . '?autofocus[section]=home_cats">Da izmijenite raspored kategorija na početnoj</a></li>';
    echo '</ul>';
}

function my_custom_dashboard_widgets() {
    wp_add_dashboard_widget('custom_help_widget', 'Kodex Podrška', 'custom_dashboard_help');
    global $wp_meta_boxes;
}

add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

// Audd to Editor and Author to "Customize" theme
function specific_role_settings(){

    $user = wp_get_current_user();
    $allowed_roles = array('editor', 'author');
    if( array_intersect($allowed_roles, $user->roles ) ) {
        $user->add_cap( 'edit_theme_options' );
        $user->add_cap( 'edit_theme_options' );

        remove_submenu_page('themes.php', 'themes.php');
        remove_submenu_page('themes.php', 'site-editor.php?path=/patterns');
        remove_submenu_page('themes.php', 'theme-editor.php');
        remove_menu_page( 'tools.php' );
    }

//
//    $roleEditor = get_role( 'editor' );
//    $roleAuthor = get_role( 'author' );
//    $roleEditor->add_cap( 'edit_theme_options' );
//    $roleAuthor->add_cap( 'edit_theme_options' );
//
//    remove_submenu_page('themes.php', 'themes.php');
//    remove_submenu_page('themes.php', 'site-editor.php?path=/patterns');
//    remove_submenu_page('themes.php', 'theme-editor.php');


}
add_action( 'admin_init', 'specific_role_settings' );


