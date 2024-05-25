<?php
adsense('adsense_rest_above');

$limit = 3;
$first_ids = [];
$alreadyUsed = $args['used'];
$homeTrack = get_theme_mod( 'home_track-sort' );

if($homeTrack && is_array($homeTrack)) {
    foreach ($homeTrack as $aa) {
        $id = intval($aa['post']);
        if(!empty($id) && !in_array($id, $alreadyUsed)) array_push($first_ids, $id);
    }
}

$first_ids = array_unique( $first_ids );
$missing_ids = $limit - count($first_ids);

if($missing_ids > 0) {
    $second_ids = get_posts( array(
        'fields'              => 'ids',
        'post_type'           => array('post'),
        'post_status'         => array('publish'),
        'posts_per_page'      => $missing_ids,
        'orderby'             => 'date',
        'order'               => 'DESC',
        'post__not_in'        => $alreadyUsed,
        'ignore_sticky_posts' => 1,
        'no_found_rows'          => true,
        'update_post_meta_cache' => false,
        'update_post_term_cache' => false
    ));

    $post_ids = array_merge( $first_ids, $second_ids );
    foreach ($post_ids as $id) {array_push($args['used'], $id);}

    $finalQuery = new WP_Query(array(
        'posts_per_page'      => 3,
        'post_type'           => array('post'),
        'post_status'         => array('publish'),
        'post__in'            => $post_ids,
        'orderby'             => 'post__in',
        'ignore_sticky_posts' => 1,
        'no_found_rows'          => true,
        'update_post_meta_cache' => false,
        'update_post_term_cache' => false
    ));
} else {
    foreach ($first_ids as $id) {array_push($args['used'], $id);}

    $finalQuery = new WP_Query(array(
        'posts_per_page'      => 3,
        'post_type'           => array('post'),
        'post_status'         => array('publish'),
        'post__in'            => $first_ids,
        'orderby'             => 'post__in',
        'ignore_sticky_posts' => 1,
        'no_found_rows'          => true,
        'update_post_meta_cache' => false,
        'update_post_term_cache' => false
    ));
}

if ( $finalQuery->have_posts() ):
?>

    <div id="zox-home-widget-wrap" class="zox-widget-bg zox-widget-bgp zox-widget-txtw">
        <div id="zox_flex_list1_widget-1" class="zox-widget-home left relative zox_flex_list1_widget">
            <div class="zox-body-width">
                <div class="zox-widget-flex1-adr">
                    <div class="zox-widget-flex1-wrap zox-widget-flex1-col zox-div3">
                        <div class="zox-widget-flex1-cont zox100">

                            <?php $i = 1; while ( $finalQuery->have_posts() ) : $finalQuery->the_post(); ?>

                                <section class="zox-art-wrap zoxrel zox-art-<?php if($i == 1) {echo 'main';} else {echo 'mid';} ?>">
                                    <div class="zox-art-grid">

                                        <a href="<?php echo esc_url( get_permalink() ) ?>">
                                            <div class="zox-art-img zoxrel zox100 zoxlh0">
                                                <?php
                                                $i == 1 ? kodex_thumb_medium() : kodex_thumb_medium_small();
                                                kodex_post_type();
                                                ?>
                                            </div>
                                        </a>

                                        <div class="zox-art-text">
                                            <div class="zox-art-text-cont">
                                                <?php
                                                kodex_category();
                                                kodex_title_linked('zox-s-title2');
                                                kodex_excerpt();
                                                kodex_date();
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                            <?php $i++; endwhile; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endif; wp_reset_postdata() ?>

<?php adsense('adsense_rest_below');