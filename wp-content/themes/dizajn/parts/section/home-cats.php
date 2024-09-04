<?php
$homeCats = get_theme_mod( 'home_cats-sort' );

if ( !empty( $homeCats ) ):
    $i = 0;
    $open = false;

    foreach ( $homeCats as $cat ):

        if( $i == 0 || $i == count($homeCats) - 1 ) {
            get_template_part( 'parts/section/slider', 'slider', [ 'cat_id' => $cat, 'used' => $args['used'] ] );
        } else {
            echo '<div class="section no-sidebar"><div class="main">';
            get_template_part( 'parts/shared/category', 'category', [ 'show_title' => true, 'cat_id' => $cat, 'load' => 5, 'used' => $args['used'] ]);
            echo '</div></div>';
        }

    $i++; endforeach;

    if( $open ) {
        echo '</div></div>';
    }

endif;