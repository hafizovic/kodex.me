<?php adsense('adsense_inner_top') ?>

<div class="section is-expanded">
    <div class="main">

        <div class="article popular">

            <div class="wrap" style="--wrap: 740px">

                <div class="popular-triggers">
                    <a href="<?php echo esc_url( home_url( '/najnovije' ) ) ?>"><?php esc_attr_e( 'Najnovije', 'kodex' ) ?></a>
                    <div class="is-active"><?php esc_attr_e( 'Popularno', 'kodex' ) ?></div>
                </div>

                <?php
                $popularOptions = array(
                    'post_type'           => array( 'post' ),
                    'post_status'         => array( 'publish' ),
                    'meta_key'            => 'popularno',
                    'orderby'             => 'meta_value_num',
                    'order'               => 'DESC',
                    'ignore_sticky_posts' => 1,
                    'date_query' => array(
                        array(
                            'after' => '24 hours ago'
                        )
                    ),
                    'paged' => get_query_var('paged') ? get_query_var('paged') : 1
                );

                $popularQuery = new WP_Query($popularOptions);
                if ($popularQuery->have_posts()):
                    ?>

                    <ul class="teasers" data-layout="popular">

                        <?php
                        $i = 1; while ($popularQuery->have_posts()) : $popularQuery->the_post();
                            get_template_part('parts/shared/teaser', 'teaser', ['i' => $i]);
                            $i++; endwhile
                        ?>

                    </ul>

                    <nav class="navigation pagination" aria-label="Članci">
                        <h2 class="screen-reader-text">Navigacija člancima</h2>
                        <div class="nav-links">
                            <?php
                            echo paginate_links( array(
                                'prev_text' => '&larr;',
                                'next_text' => '&rarr;',
                                'total' => 5,
                            ) );
                            ?>
                    </nav>

                <?php
                endif;
                wp_reset_postdata();
                ?>

                <div class="popular-triggers">
                    <a href="<?php echo esc_url( home_url( '/najnovije' ) ) ?>"><?php esc_attr_e( 'Najnovije', 'kodex' ) ?></a>
                    <div class="is-active"><?php esc_attr_e( 'Popularno', 'kodex' ) ?></div>
                </div>

            </div>

        </div>

    </div>

    <?php get_template_part( 'parts/sidebar/inner', 'sidebar-inner', [ 'i' => 1 ] ) ?>

</div>