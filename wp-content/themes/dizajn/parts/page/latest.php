<?php adsense('adsense_inner_top') ?>

<div class="section is-expanded">
    <div class="main">

        <div class="article popular">

            <div class="wrap" style="--wrap: 740px">

                <div class="popular-triggers">
                    <div class="is-active"><?php esc_attr_e( 'Najnovije', 'kodex' ) ?></div>
                    <a href="<?php echo esc_url( home_url( '/popularno' ) ) ?>"><?php esc_attr_e( 'Popularno', 'kodex' ) ?></a>
                </div>

                <?php
                $latestOptions = array(
                    'post_type'           => array( 'post' ),
                    'post_status'         => array( 'publish' ),
                    'paged'               => get_query_var('paged') ? get_query_var('paged') : 1,
                    'ignore_sticky_posts' => 1
                );

                $latestQuery = new WP_Query($latestOptions);
                if ($latestQuery->have_posts()):
                    ?>

                    <ul class="teasers" data-layout="popular">

                        <?php $i = 1; while ($latestQuery->have_posts()) : $latestQuery->the_post();
                            get_template_part('parts/shared/teaser', 'teaser', ['i' => $i]);
                            $i++; endwhile;
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
                    <div class="is-active" href="<?php echo esc_url( home_url( '/najnovije' ) ) ?>"><?php esc_attr_e( 'Najnovije', 'kodex' ) ?></div>
                    <a href="<?php echo esc_url( home_url( '/popularno' ) ) ?>"><?php esc_attr_e( 'Popularno', 'kodex' ) ?></a>
                </div>

            </div>

        </div>

    </div>

    <?php get_template_part( 'parts/sidebar/inner', 'sidebar-inner', [ 'i' => 1 ] ) ?>

</div>