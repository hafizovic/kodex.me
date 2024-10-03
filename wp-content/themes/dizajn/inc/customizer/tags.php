<?php

new \Kirki\Section(
    'home_tags',
    [
        'panel'       => 'home',
        'priority'    => 10,
        'title'       => esc_html__( 'Oznake', 'dizajn' ),
        'description' => esc_html__( 'Izmjeni oznake na vrhu sajta.', 'dizajn' ),
    ]
);

new \Kirki\Field\Repeater(
    [
        'section'  => 'home_tags',
        'settings' => 'home_tags-sort',
        'priority' => 10,
        'label'    => esc_html__( 'Članci', 'dizajn' ),
        'row_label'    => [
            'type'  => 'field',
            'value' => esc_html__( 'Članak', 'dizajn' ),
            'field' => 'home_intro-sort-post',
        ],
        'fields'   => [
            'naziv'   => [
                'type'        => 'text',
                'label'       => esc_html__( 'Naziv oznake', 'dizajn' ),
            ],
            'link'   => [
                'type'        => 'url',
                'label'       => esc_html__( 'Link oznake', 'dizajn' ),
            ],
        ],
        'choices' => [
            'limit' => 8
        ]
    ]
);
