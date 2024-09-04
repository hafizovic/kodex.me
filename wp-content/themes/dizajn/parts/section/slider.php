<?php
$catId = $args['cat_id'] ?? 1;
$cat   = get_category($catId) ?? 1;

$queryArgs = array(
    'post_type'      => array( 'post' ),
    'post_status'    => array( 'publish' ),
    'posts_per_page' => 8,
    'cat'            => $catId,
    'post__not_in'   => $args['used'] ?? []
);

$queryInst = new WP_Query( $queryArgs );

if ( $queryInst->have_posts() ):
    ?>

    <div class="section no-sidebar" data-scheme="dark" data-theme="<?php echo $cat->slug ?>">

        <div class="section-header">
            <a class="section-header-cat" href="<?php echo get_category_link( $cat->term_id ) ?>">
                <h4><span><?php echo $cat->name ?></span></h4>
            </a>
        </div>

        <div class="slider-latest swiffy-slider slider-item-reveal slider-item-nogap slider-item-snapstart slider-item-nosnap-touch slider-nav-scrollbar slider-nav-visible slider-nav-touch slider-nav-noloop slider-nav-autopause">
            <ul class="teasers slider-container" data-layout="slider">

                <?php while ( $queryInst->have_posts() ) : $queryInst->the_post();
                    if(isset($args['used'])) {
                        array_push($args['used'], get_the_ID());
                    }
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

<?php
endif;
wp_reset_postdata();