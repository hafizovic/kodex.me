<?php
$catId     = $args['cat_id'] ?? 1;
$cat       = get_category($catId) ?? 1;

if ( have_posts() ):
    ?>

    <div class="group" data-theme="<?php echo $cat->slug ?>">

        <ul class="teasers" data-layout="category">

            <?php while ( have_posts() ) : the_post();
                if(isset($args['used'])) {
                    array_push($args['used'], get_the_ID());
                }
                get_template_part('parts/shared/teaser');
            endwhile ?>

        </ul>

    </div>

<?php
endif;
wp_reset_postdata();