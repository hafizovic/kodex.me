<?php
$currentTags = wp_get_post_terms( get_queried_object_id(), 'post_tag', ['fields' => 'ids'] );

$first_ids = get_posts( array(
    'fields'         => 'ids',
    'post_type'      => array('post'),
    'post_status'    => array( 'publish' ),
    'posts_per_page' => '8',
    'orderby'        => 'date',
    'order'          => 'DESC',
    'tax_query' => [
        [
            'taxonomy' => 'post_tag',
            'terms'    => $currentTags
        ]
    ]
));

$missing_ids = 8 - count($first_ids);

if($missing_ids > 0) {
    $second_ids = get_posts( array(
        'fields'         => 'ids',
        'post_type'      => array('post'),
        'post_status'    => array( 'publish' ),
        'posts_per_page' => $missing_ids,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'post__not_in'   => $first_ids
    ));

    $post_ids = array_merge( $second_ids, $first_ids );

    $finalQuery = new WP_Query(array(
        'post_type' => array('post'),
        'post__in'  => $post_ids,
        'orderby'   => 'date',
        'order'     => 'DESC'
    ));

} else {

    $finalQuery = new WP_Query(array(
        'post_type' => array('post'),
        'post__in'  => $first_ids,
        'orderby'   => 'date',
        'order'     => 'DESC'
    ));

}

if ( $finalQuery->have_posts() ): ?>

    <div class="section no-sidebar" data-scheme="dark">

        <div class="section-header">
            <div class="section-header-cat">
                <h4><span><?php esc_html_e( 'Slični članci', 'dizajn' ) ?></span></h4>
            </div>
        </div>

        <div class="slider-latest swiffy-slider slider-item-reveal slider-item-nogap slider-item-snapstart slider-item-nosnap-touch slider-nav-scrollbar slider-nav-visible slider-nav-touch slider-nav-noloop slider-nav-autopause">
            <ul class="teasers slider-container" data-layout="slider">

                <?php while ( $finalQuery->have_posts() ) : $finalQuery->the_post();
                    get_template_part('parts/shared/teaser');
                endwhile ?>

            </ul>

            <button type="button" class="slider-nav">
                <svg class="d-block" width="18" height="18"><use xlink:href="#i-arrow-left" /></svg>
            </button>
            <button type="button" class="slider-nav slider-nav-next">
                <svg class="d-block" width="18" height="18"><use xlink:href="#i-arrow-right" /></svg>
            </button>

        </div>
    </div>

<?php endif;
wp_reset_postdata();