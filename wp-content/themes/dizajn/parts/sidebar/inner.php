<?php
$catId = $args['cat_id'] ?? [];
$load  = $args['load'] ?? 5;
?>

<div class="sidebar">
    <div class="sidebar-scroller">

        <div class="tabs" data-el="tabs">
            <ul class="tabs-triggers">
                <li class="is-active" data-tab="tab-1"><?php esc_attr_e( 'Najnovije', 'dizajn' ) ?></li>
                <li data-tab="tab-2"><?php esc_attr_e( 'Popularno', 'dizajn' ) ?></li>
            </ul>
            <?php
            $latestOptions = array(
                'post_type'        => array( 'post' ),
                'post_status'      => array( 'publish' ),
                'posts_per_page'   => $load,
                'cat'              => $catId,
            );

            $popularOptions = array(
                'post_type'        => array( 'post' ),
                'post_status'      => array( 'publish' ),
                'posts_per_page'   => $load,
                'cat'              => $catId,
                'meta_key'         => 'popularno',
                'orderby'          => 'meta_value_num',
                'order'            => 'DESC',
                'date_query' => array(
                    array(
                        'after' => '2 weeks ago'
                    )
                )
            );
            ?>

            <div class="tabs-content">
                <div data-tab="tab-1">
                    <ul class="teasers" data-layout="sidebar">

                        <?php
                        $query = new WP_Query( $latestOptions );
                        if ( $query->have_posts() ):
                            while ( $query->have_posts() ) :
                                $query->the_post();
                                get_template_part('parts/shared/teaser');
                            endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>

                    </ul>
                </div>

                <div data-tab="tab-2" style="display: none">
                    <ul class="teasers" data-layout="sidebar">

                        <?php
                        $query = new WP_Query( $popularOptions );
                        if ( $query->have_posts() ):
                            while ( $query->have_posts() ) :
                                $query->the_post();
                                get_template_part('parts/shared/teaser');
                            endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>

                    </ul>
                </div>
            </div>

        </div>

    </div>
</div>