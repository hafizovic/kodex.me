
<?php
$currentTags = wp_get_post_terms( get_queried_object_id(), 'post_tag', ['fields' => 'ids'] );

$first_ids = get_posts( array(
    'fields'              => 'ids',
    'post_type'           => array('post'),
    'post_status'         => array( 'publish' ),
    'posts_per_page'      => 4,
    'orderby'             => 'date',
    'order'               => 'DESC',
    'ignore_sticky_posts' => 1,
    'tax_query' => [
        [
            'taxonomy' => 'post_tag',
            'terms'    => $currentTags
        ]
    ]
));

$missing_ids = 4 - count($first_ids);

if($missing_ids > 0) {
    $second_ids = get_posts( array(
        'fields'              => 'ids',
        'post_type'           => array('post'),
        'post_status'         => array( 'publish' ),
        'posts_per_page'      => $missing_ids,
        'orderby'             => 'date',
        'order'               => 'DESC',
        'post__not_in'        => $first_ids,
        'ignore_sticky_posts' => 1,
    ));

    $post_ids = array_merge( $second_ids, $first_ids );

    $finalQuery = new WP_Query(array(
        'post_type'           => array('post'),
        'post__in'            => $post_ids,
        'orderby'             => 'date',
        'order'               => 'DESC',
        'ignore_sticky_posts' => 1
    ));

} else {

    $finalQuery = new WP_Query(array(
        'post_type'           => array('post'),
        'post__in'            => $first_ids,
        'orderby'             => 'date',
        'order'               => 'DESC',
        'ignore_sticky_posts' => 1
    ));

}

if ( $finalQuery->have_posts() ): ?>

    <div class="zox-post-more-wrap left zoxrel zox100">
        <div class="zox-post-width">
            <div class="zox-post-more left zoxrel zox100">

                <div class="zox-post-main-head left zoxrel zox100">
                    <h4 class="zox-post-main-title">
                        <span class="zox-post-main-title"><?php esc_html_e( 'Slične vijesti', 'kodex' ) ?></span>
                    </h4>
                </div>

                <div class="zox-post-more-grid zox-div4 left zoxrel zox100">

                    <?php while ( $finalQuery->have_posts() ) : $finalQuery->the_post(); ?>

                        <div class="zox-art-wrap zoxrel zox-art-mid">
                            <div class="zox-art-grid">

                                <div class="zox-art-img zoxrel zox100 zoxlh0">
                                    <a href="<?php echo esc_url( get_permalink() ) ?>">
                                        <?php
                                        kodex_thumb_medium();
                                        kodex_post_type();
                                        ?>
                                    </a>
                                </div>

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
                        </div>

                    <?php endwhile; ?>

                </div>
            </div>
        </div>
    </div>


<?php endif;
wp_reset_postdata();

