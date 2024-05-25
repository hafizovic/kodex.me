<div class="zox-post-side-wrap zox-post-side-noalp zoxrel zox-sticky-side">
    <div id="zox-side-wrap" class="zoxrel zox-divs">

        <?php
        $popularOptions = array(
            'post_type'        => array( 'post' ),
            'post_status'      => array( 'publish' ),
            'posts_per_page'   => 7,
            'meta_key'         => 'popularno',
            'orderby'          => 'meta_value_num',
            'order'            => 'DESC',
            'date_query' => array(
                array(
                    'after' => '24 hours ago'
                )
            )
        );

        $query = new WP_Query($popularOptions);
        if ($query->have_posts()):
        ?>

        <div class="zox-side-widget zox_side_trend_widget">

            <div class="zox-widget-side-head">
                <h4 class="zox-widget-side-title"><span class="zox-widget-side-title"><?php _e('Popularno:', 'kodex') ?></span></h4>
            </div>

            <div class="zox-widget-side-trend-wrap left zoxrel zox100">

                <?php while ($query->have_posts()) : $query->the_post(); ?>

                    <section class="zox-art-wrap zoxrel zox-art-small">
                        <div class="zox-art-grid">
                            <div class="zox-art-text">
                                <?php kodex_title_linked('zox-s-title3'); ?>
                            </div>
                        </div>
                    </section>

                <?php endwhile; ?>

            </div>
        </div>

        <?php endif; wp_reset_postdata(); ?>

        <?php adsense('adsense_rest_sidebar2'); ?>

    </div>
</div>