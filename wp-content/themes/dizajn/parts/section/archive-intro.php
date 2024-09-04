<?php
$catId = $args['cat_id'] ?? 1;
$load  = $args['load'] ?? 4;
$cat   = get_category($catId) ?? 1;

$queryArgs = array(
    'post_type'      => array( 'post' ),
    'post_status'    => array( 'publish' ),
    'posts_per_page' => $load,
    'cat'            => $catId,
);

$queryInst = new WP_Query( $queryArgs );
if ( $queryInst->have_posts() ):
?>

<div id="intro" class="section" data-theme="<?php echo get_category($catId)->slug ?>">
    <div class="main">

        <div class="section-header">
            <a class="section-header-cat" href="<?php echo get_category_link( $cat->term_id ) ?>?sve">
                <h4><span><?php echo $cat->name ?></span></h4>
            </a>
            <a class="section-header-all" href="<?php echo get_category_link( $cat->term_id ) ?>">
                <span><?php esc_html_e( 'Više', 'dizajn' ) ?></span>
            </a>
        </div>

        <ul class="teasers" data-layout="intro">
            <?php while ( $queryInst->have_posts() ) : $queryInst->the_post();
                get_template_part('parts/shared/teaser');
            endwhile ?>
        </ul>

    </div>

    <?php get_template_part( 'parts/sidebar/intro', 'sidebar', [ 'cat_id' => $catId, 'load' => 8 ] ) ?>

</div>

<?php endif; wp_reset_postdata() ?>