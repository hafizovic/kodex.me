<?php

// Get The Post View's total
function getPostViews($postID){
    $count_key = 'popularno';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}
function setPostViews($postID) {
    $count_key = 'popularno';
    $count = get_post_meta($postID, $count_key, true);

    if ( $count=='' ) {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// Method will register the cron event
function register_delete_manual_posts() {
    if( !wp_next_scheduled( 'delete_manual_posts' ) ) {

        $startTime = strtotime( "today 03:59am" );
        if( $startTime < time() ) {
            $startTime = $startTime + 24 * HOUR_IN_SECONDS;
        }

        wp_schedule_event( $startTime, 'daily', 'delete_manual_posts' );
    }
}
add_action( 'init', 'register_delete_manual_posts');

// Add custom column in WP-Admin to display Post Views
function act_delete_manual_posts() {remove_theme_mod('home_intro-sort');}
add_action( 'delete_manual_posts', 'act_delete_manual_posts' );

// Register the columns.
add_filter( "manage_posts_columns", function ( $defaults ) {
    $defaults['post_views'] = 'Pregleda';
    return $defaults;
} );

// Handle the value for each of the new columns.
add_action( "manage_posts_custom_column", function ( $column_name, $post_id ) {
    $postViews = getPostViews(get_the_ID());
    if ( $column_name == 'post_views' ) {echo $postViews;}
}, 10, 2 );

function add_class_on_li( $atts, $item, $args ) {
    $base = $item->object_id;
    $atts['data-theme'] = get_category($base) ? get_category($base)->slug : '';
    return $atts;
}
add_filter('nav_menu_item_attributes', 'add_class_on_li', 1, 3);