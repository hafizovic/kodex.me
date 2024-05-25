<?php

// Set custom excerpt width
function wpdocs_custom_excerpt_length( $length ) {return 16;}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

// Define new image sizes
add_image_size( 'kodex-thumb', 100, 100, true );
add_image_size( 'kodex-medium', 480, 270, true );
add_image_size( 'kodex-large', 1024, 576, false );

// Disable Adminbar for all users
add_filter('show_admin_bar', '__return_false');

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

// Add custom column in WP-Admin to display Post Views
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