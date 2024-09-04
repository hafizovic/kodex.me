<?php
$catId = $args['cat_id'] ?? 1;
$load  = $args['load'] ?? 4;

$subCats = get_categories( array(
    'hide_empty' => true,
    'child_of'   => $catId
) );

if( !empty( $subCats ) ) :

    $catIDs = [];
    foreach ( $subCats as $cat ) :
        array_push($catIDs, $cat->term_id);

        $catPosts = get_posts( array(
            'hide_empty'     => true,
            'posts_per_page' => $load,
            'child_of'       => $catId,
        ) );

        if ( !empty( $catPosts ) ):
            ?>

            <div class="section no-sidebar" data-theme="<?php echo get_category($catId)->slug ?>" data-prvi="<?= $load ?>" data-drugi="<?= $catId ?>">
                <div class="main">

                    <?php get_template_part( 'parts/shared/category', 'category', [ 'show_title' => true, 'cat_id' => $cat->term_id, 'load' => $load ]); ?>

                </div>
            </div>

        <?php
        endif;
    endforeach;
endif;