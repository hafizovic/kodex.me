<?php

$layout = get_theme_mod('home_intro-layout');

if($layout == 'option4') {
    $limit = 1;
} elseif($layout == 'option3') {
    $limit = 2;
} else {
    $limit = 3;
}

$first_ids = [];
$homeIntro = get_theme_mod( 'home_intro-sort' );

if($homeIntro && is_array($homeIntro)) {
    foreach ($homeIntro as $aa) {
        $id = intval($aa['post']);
        if(!empty($id)) array_push($first_ids, $id);
    }
}

$first_ids = array_unique($first_ids);
$missing_ids = $limit - count($first_ids);

if($missing_ids > 0) {
    $second_ids = get_posts( array(
        'fields'              => 'ids',
        'post_type'           => array('post'),
        'post_status'         => array('publish'),
        'posts_per_page'      => $missing_ids,
        'orderby'             => 'date',
        'order'               => 'DESC',
        //'cat'                 => 36,
        'post__not_in'        => $first_ids,
        'ignore_sticky_posts' => 1,
        'no_found_rows'          => true,
        'update_post_meta_cache' => false,
        'update_post_term_cache' => false
    ));

    $post_ids = array_merge( $first_ids, $second_ids );
    foreach ($post_ids as $id) {array_push($args['used'], $id);}

    $finalQuery = new WP_Query(array(
        'posts_per_page'      => 3,
        'post_type'           => array('post'),
        'post_status'         => array('publish'),
        'post__in'            => $post_ids,
        'orderby'             => 'post__in',
        'ignore_sticky_posts' => 1,
        'no_found_rows'          => true,
        'update_post_meta_cache' => false,
        'update_post_term_cache' => false
    ));
} else {
    foreach ($first_ids as $id) {array_push($args['used'], $id);}

    $finalQuery = new WP_Query(array(
        'posts_per_page'      => 3,
        'post_type'           => array('post'),
        'post_status'         => array('publish'),
        'post__in'            => $first_ids,
        'orderby'             => 'post__in',
        'ignore_sticky_posts' => 1,
        'no_found_rows'          => true,
        'update_post_meta_cache' => false,
        'update_post_term_cache' => false
    ));
}
?>

<div id="zox-feat-wrap" class="zoxrel">
    <div id="zox-feat-net1-wrap" class="left zoxrel zox100">
        <div class="zox-body-width">
            <div class="zox-feat-net1-grid zox-feat-cont left zoxrel zox100">
                <div class="zox-feat-net1-cont intro-<?php echo $layout ?>">

                    <?php if ( $finalQuery->have_posts() ) : ?>
                        <?php $i = 1; while ( $finalQuery->have_posts() ) : $finalQuery->the_post(); ?>

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

                        <?php if($i > 1 && $i == 2) : ?><div class="zox-feat-net1-<?php if($layout == 'option3') {echo 'main zox-div2';} else {echo 'sub zox-div4';} ?> zoxrel"><?php endif; ?>

                        <?php if($i > 1) : ?>
                            <section id="<?= $i ?>" class="zox-art-wrap zoxrel zox-art-main">
                                <div class="zox-art-grid">

                                    <a href="<?php echo esc_url( get_permalink() ) ?>">
                                        <div class="zox-art-img zoxrel zox100 zoxlh0">
                                            <?php
                                            $layout == 'option3' ? kodex_thumb_large_medium() : kodex_thumb_medium();
                                            kodex_post_type();
                                            ?>
                                        </div>
                                    </a>

                                    <div class="zox-art-text">
                                        <div class="zox-art-text-cont">
                                            <?php
                                            kodex_category();
                                            $layout == 'option3' ? kodex_title_linked('zox-s-title1-feat') : kodex_title_linked('zox-s-title2');
                                            kodex_excerpt();
                                            kodex_date();
                                            ?>
                                        </div>
                                    </div>

                                </div>
                            </section>
                        <?php endif; ?>

                        <?php if($i > 1 && $i == $finalQuery->post_count) : ?></div><?php endif; ?>

                    <?php $i++; endwhile ?>
                    <?php endif; wp_reset_postdata() ?>

                </div>

                <?php get_template_part( 'parts/sidebar/sidebar-intro' ); ?>

            </div>
        </div>
    </div>
</div>