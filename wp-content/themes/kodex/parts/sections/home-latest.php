<?php
$args = array(
    'post_type'              => array( 'post' ),
    'post_status'            => array( 'publish' ),
    'posts_per_page'         => 10,
    'post__not_in'           => $args['used'],
    'ignore_sticky_posts'    => 1,
    'no_found_rows'          => true,
    'update_post_meta_cache' => true,
    'update_post_term_cache' => true
);
$latest = new WP_Query( $args );
if ( $latest->have_posts() ) : ?>

<?php $i = 1; while ( $latest->have_posts() ) : $latest->the_post(); ?>

    <?php if($i == 1): ?>
        <div class="zox-widget-bg">
            <div id="zox_alt_img_widget-2" class="zox-widget-home left relative zox_alt_img_widget">
                <div class="zox-body-width">
                    <div class="zox-widget-altimg-wrap zox-widget-altimg-over zox100 zoxrel left">
                        <div class="zox-widget-altimg-cont">
                            <div class="zox-widget-altimg-grid">

                                <section class="zox-art-wrap zoxrel">
                                    <div class="zox-art-grid">

                                        <a href="<?php echo esc_url( get_permalink() ) ?>">
                                            <div class="zox-art-img zoxrel zox100 zoxlh0">
                                                <?php
                                                kodex_thumb_large_medium();
                                                kodex_post_type();
                                                ?>
                                            </div>
                                        </a>

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
                                </section>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if($i == 2) : ?>
        <div id="zox-home-widget-wrap" class="zoxrel left zox100">
        <div class="zox-widget-bg">
        <div id="zox_flex_list1_widget-2" class="zox-widget-home left relative zox_flex_list1_widget">
        <div class="zox-body-width">
        <div class="zox-widget-flex1-adr">
        <div class="zox-widget-flex1-wrap zox-widget-flex1-col zox-div4">
        <div class="zox-widget-flex1-cont zox100">
    <?php endif ?>

    <?php if($i >= 2 && $i <= 5) : ?>
        <section class="zox-art-wrap zoxrel zox-art-<?php if($i == 2) {echo 'main';} else {echo 'mid';} ?>">
            <div class="zox-art-grid">

                <a href="<?php echo esc_url( get_permalink() ) ?>">
                    <div class="zox-art-img zoxrel zox100 zoxlh0">
                        <?php
                        $i == 2 ? kodex_thumb_medium() : kodex_thumb_medium_small();
                        kodex_post_type();
                        ?>
                    </div>
                </a>

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
        </section>
    <?php endif; ?>

    <?php if($i == 5 ) : ?>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    <?php endif; ?>

    <?php if($i == 6) : ?>
        <div class="zox-body-width">
        <div id="zox-home-body-wrap" class="zoxrel zox100">
        <div id="zox-home-cont-wrap" class="zoxrel">
        <div id="zox-main-blog-wrap" class="zoxrel left zox100">
        <div class="zox-main-blog zoxrel left zox100">
        <section class="zox-blog-grid left zoxrel zox100 zox-divr zox-s4">
    <?php endif; ?>

    <?php if($i >= 6 && $i <= 10) : ?>
        <article class="zox-art-wrap zoxrel zox-art-<?php if($i == 6) {echo 'main';} else {echo 'mid';} ?>">
            <div class="zox-art-grid">

                <a href="<?php echo esc_url( get_permalink() ) ?>">
                    <div class="zox-art-img zoxrel zox100 zoxlh0">
                        <?php
                        $i == 6 ? kodex_thumb_medium() : kodex_thumb_medium_small();
                        kodex_post_type();
                        ?>
                    </div>
                </a>

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
        </article>
    <?php endif; ?>

    <?php if($i == 10) : ?>
        </section>
        </div>
        </div>
        </div>
        <?php get_template_part( 'parts/sidebar/sidebar-latest' ); ?>
        </div>
        </div>
    <?php endif; ?>

<?php $i++; endwhile; ?>

<?php endif; wp_reset_postdata(); ?>