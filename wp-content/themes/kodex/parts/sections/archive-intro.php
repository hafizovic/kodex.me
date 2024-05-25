<?php
$catId = $args['cat_id'] ?? 1;

$queryArgs = array(
    'post_type'           => array( 'post' ),
    'post_status'         => array( 'publish' ),
    'posts_per_page'      => 3,
    'ignore_sticky_posts' => 1
);

if(is_tag()) {$queryArgs['tag_id'] = $catId;}
if(is_category()) {$queryArgs['cat'] = $catId;}

$queryInst = new WP_Query( $queryArgs );
if ( $queryInst->have_posts() ):
?>

    <div id="zox-feat-wrap" class="zoxrel">
        <div id="zox-feat-net1-wrap" class="left zoxrel zox100">
            <div class="zox-body-width">
                <div class="zox-feat-net1-grid zox-feat-cont left zoxrel zox100">
                    <div class="zox-feat-net1-cont">

                        <?php if ( $queryInst->have_posts() ) : ?>
                            <?php $i = 1; while ( $queryInst->have_posts() ) : $queryInst->the_post(); ?>

                                <?php if($i == 1): ?>
                                    <div class="zox-feat-net1-main zoxrel zox-div2 zox-s4">
                                        <section class="zox-art-wrap zoxrel">

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
                                                    kodex_title_linked('zox-s-title1-feat');
                                                    kodex_excerpt();
                                                    kodex_date();
                                                    ?>
                                                </div>
                                            </div>

                                        </section>
                                    </div>
                                <?php endif ?>

                                <?php if($i > 1 && $i == 2) : ?><div class="zox-feat-net1-sub zoxrel zox-div4"><?php endif; ?>

                                <?php if($i > 1) : ?>
                                    <section id="<?= $i ?>" class="zox-art-wrap zoxrel zox-art-main">
                                        <div class="zox-art-grid">

                                            <a href="<?php echo esc_url( get_permalink() ) ?>">
                                                <div class="zox-art-img zoxrel zox100 zoxlh0">
                                                    <?php
                                                    kodex_thumb_medium();
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

                                <?php if($i > 1 && $i == $queryInst->post_count) : ?></div><?php endif; ?>

                                <?php $i++; endwhile ?>
                        <?php endif; wp_reset_postdata() ?>

                    </div>

                    <?php get_template_part( 'parts/sidebar/sidebar-intro' ); ?>

                </div>
            </div>
        </div>
    </div>

<?php endif;