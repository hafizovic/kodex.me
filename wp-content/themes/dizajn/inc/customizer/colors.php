<?php

// Get first Level Categories
$firstLvlCats = [];
$firstLvlCatsQuery = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC',
    'parent'  => 0
) );

new \Kirki\Panel(
    'colors',
    [
        'priority'    => 10,
        'title'       => esc_html__( 'Boje', 'dizajn' ),
        'description' => esc_html__( 'Postavi boje', 'dizajn' ),
    ]
);

new \Kirki\Section(
    'colors_cats',
    [
        'panel'       => 'colors',
        'priority'    => 20,
        'title'       => esc_html__( 'Kategorije', 'dizajn' ),
        'description' => esc_html__( 'Izmjeni boje kategorija', 'dizajn' ),
    ]
);

foreach ($firstLvlCatsQuery as $cat) {
    new \Kirki\Field\Color(
        [
            'section'     => 'colors_cats',
            'settings'    => 'colors_cats_' . $cat->slug,
            'label'       => $cat->slug,
            'description' => esc_html__( 'Regular color control, no alpha channel.', 'kirki' ),
//            'default'     => '#0008DC',
//            'mode'        => 'hue',
            'choices'     => [
                'alpha' => true,
            ],

        ]
    );
}
