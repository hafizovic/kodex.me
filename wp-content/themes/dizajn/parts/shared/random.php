<?php
$randomArgs = array(
    'post_type'      => array( 'post' ),
    'post_status'    => array( 'publish' ),
    'posts_per_page' => 4,
    'post__not_in'   => [get_the_ID()],
);
$queryInst = new WP_Query( $randomArgs );
if ( $queryInst->have_posts() ):
    ?>

    <div class="group">

        <div class="section-header">
            <div class="section-header-cat">
                <h4><span><?php esc_html_e( 'Možda vas zanima', 'dizajn' ) ?></span></h4>
            </div>
        </div>

        <ul class="teasers" data-layout="archive">

            <?php while ( $queryInst->have_posts() ) : $queryInst->the_post();
                get_template_part('parts/shared/teaser');
            endwhile ?>

        </ul>

    </div>

<?php
endif;
wp_reset_postdata();