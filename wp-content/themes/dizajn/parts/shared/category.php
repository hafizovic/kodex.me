<?php

$showTitle = $args['show_title'] ?? true;
$catId     = $args['cat_id'] ?? 1;
$load      = $args['load'] ?? 8;
$cat       = get_category($catId) ?? 1;

$queryArgs = array(
    'post_type'      => array( 'post' ),
    'post_status'    => array( 'publish' ),
    'posts_per_page' => $load,
    'cat'            => $catId,
    'post__not_in'   => $args['used'] ?? [],
    'paged' => get_query_var( 'paged' )
);

$queryInst = new WP_Query( $queryArgs );
if ( $queryInst->have_posts() ):
    ?>

    <div class="group" data-theme="<?php echo $cat->slug ?>">

        <?php if( $showTitle ) : ?>

            <div class="section-header">
                <a class="section-header-cat" href="<?php echo get_category_link( $cat->term_id ) ?>">
                    <h4><span><?php echo $cat->name ?></span></h4>
                </a>
                <a class="section-header-all" href="<?php echo get_category_link( $cat->term_id ) ?>">
                    <span><?php esc_html_e( 'Više', 'dizajn' ) ?></span>
                </a>
            </div>

        <?php endif ?>

        <ul class="teasers" data-layout="category">

            <?php while ( $queryInst->have_posts() ) : $queryInst->the_post();
                if(isset($args['used'])) {
                    array_push($args['used'], get_the_ID());
                }
                get_template_part('parts/shared/teaser');
            endwhile ?>

        </ul>

    </div>

<?php
endif;
wp_reset_postdata();