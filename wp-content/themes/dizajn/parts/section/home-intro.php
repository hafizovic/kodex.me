<div id="intro" class="section">
    <div class="main">

        <?php
        $limit = 6;
        $first_ids = [];
        $homeIntro = get_theme_mod( 'home_intro-sort' );

        if($homeIntro && is_array($homeIntro)) {
            foreach ($homeIntro as $aa) {
                $id = intval($aa['post']);
                if(!empty($id)) {
                    array_push($first_ids, $id);
                }
            }
        }

        $missing_ids = $limit - count($first_ids);

        if($missing_ids > 0) {
            $second_ids = get_posts( array(
                'fields'         => 'ids',
                'post_type'      => array('post'),
                'post_status'    => array('publish'),
                'posts_per_page' => $missing_ids,
                'orderby'        => 'date',
                'order'          => 'DESC',
//                'cat'            => 36,
                'post__not_in'   => $first_ids,
            ));

            $post_ids = array_merge( $first_ids, $second_ids );
            foreach ($post_ids as $id) {
                array_push($args['used'], $id);
            }
            $finalQuery = new WP_Query(array(
                'posts_per_page' => $limit,
                'post_type'      => array('post'),
                'post_status'    => array('publish'),
                'post__in'       => $post_ids,
                'orderby'        => 'post__in',
            ));
        } else {
            foreach ($first_ids as $id) {
                array_push($args['used'], $id);
            }
            $finalQuery = new WP_Query(array(
                'posts_per_page' => 8,
                'post_type'      => array('post'),
                'post_status'    => array('publish'),
                'post__in'       => $first_ids,
                'orderby'        => 'post__in',
            ));
        }

        if ( $finalQuery->have_posts() ): ?>
        <ul class="teasers" data-layout="intro">
            <?php $i = 0; while ( $finalQuery->have_posts() ) : $finalQuery->the_post();
                get_template_part('parts/shared/teaser', 'teaser', ['i' => $i]);
            $i++; endwhile ?>
        </ul>

        <?php endif; wp_reset_postdata() ?>

    </div>

    <?php get_template_part('parts/sidebar/intro', 'sidebar', [
        'cat_id' => false,
        'load'   => 8
    ]) ?>

</div>