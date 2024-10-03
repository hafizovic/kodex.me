<?php

// Get first Level Categories
$firstLvlCats = [];
$firstLvlCatsQuery = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC',
    'parent'  => 0
) );

foreach( $firstLvlCatsQuery as $cat ) {
    $firstLvlCats[$cat->cat_ID] = $cat->name;
}

new \Kirki\Section(
    'home_cats',
    [
        'panel'       => 'home',
        'priority'    => 30,
        'title'       => esc_html__( 'Kategorije', 'dizajn' ),
        'description' => esc_html__( 'Izmjeni vidljivost i redoslijed kategorija ispod primarnih vijesti.', 'dizajn' ),
    ]
);

//    new \Kirki\Field\Sortable(
//        [
//            'section'  => 'home_intro',
//            'settings' => 'home_intro-sort',
//            'priority' => 10,
//            'label'    => esc_html__( 'Članci', 'dizajn' ),
//            'choices'  => $latestPosts,
//        ]
//    );

new \Kirki\Field\Sortable(
    [
        'section'  => 'home_cats',
        'settings' => 'home_cats-sort',
        'priority' => 10,
        'label'    => esc_html__( 'Kategorije', 'dizajn' ),
        'choices'  => $firstLvlCats,
    ]
);
