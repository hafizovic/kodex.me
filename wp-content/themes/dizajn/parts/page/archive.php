<?php
$url        = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$currentCat = get_queried_object();
$catId      = $currentCat->cat_ID;
$isParent   = $currentCat->parent === 0;

if( is_tag() ) {
    get_template_part( 'parts/section/archive-tag', 'intro', [ 'cat_id' => $catId, 'load' => 16 ] );
} else if( !$isParent || ($isParent && count(get_term_children($catId, 'category')) == 0) ) {
    get_template_part( 'parts/section/archive-cat', 'intro', [ 'cat_id' => $catId, 'load' => 16 ] );
} else {
    if (strpos($url,'sve') !== false) {
        get_template_part( 'parts/section/archive-cat', 'intro', [ 'cat_id' => $catId, 'load' => 10 ] );
    } else {
        get_template_part( 'parts/section/archive-intro', 'intro', [ 'cat_id' => $catId, 'load' => 6 ] );
        get_template_part( 'parts/section/archive-cats', 'intro', [ 'cat_id' => $catId, 'load' => 5 ] );
    }
}