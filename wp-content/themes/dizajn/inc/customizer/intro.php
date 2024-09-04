<?php

// Get Last 100 posts for Intro section
$latestPosts = [];
$latestPostsQuery = get_posts( array(
    'post_type'      => array( 'post' ),
    'post_status'    => array( 'publish' ),
    'posts_per_page' => 100,
//    'cat'            => 3798,
    'date_query' => array(
        array(
            'after' => '2 weeks ago'
        )
    )
) );

foreach ( $latestPostsQuery as $post ) {
    $latestPosts[$post->ID] = $post->post_title;
}

new \Kirki\Panel(
    'home',
    [
        'priority'    => 10,
        'title'       => esc_html__( 'Početna', 'dizajn' ),
        'description' => esc_html__( 'Izmjenu početnu', 'dizajn' ),
    ]
);

new \Kirki\Section(
    'home_intro',
    [
        'panel'       => 'home',
        'priority'    => 10,
        'title'       => esc_html__( 'Intro', 'dizajn' ),
        'description' => esc_html__( 'Izmjeni primarne članke, koje posjetilac vidi čim otvori sajt.', 'dizajn' ),
    ]
);

new \Kirki\Field\Repeater(
    [
        'section'  => 'home_intro',
        'settings' => 'home_intro-sort',
        'priority' => 10,
        'label'    => esc_html__( 'Članci', 'dizajn' ),
        'row_label'    => [
            'type'  => 'field',
            'value' => esc_html__( 'Članak', 'dizajn' ),
            'field' => 'home_intro-sort-post',
        ],
        'fields'   => [
            'post'   => [
                'type'        => 'select',
                'label'       => esc_html__( 'Odaberi članke', 'dizajn' ),
                'placeholder' => esc_html__( 'Odaberi članak', 'dizajn' ),
                'choices'     => $latestPosts
            ],
        ],
        'choices' => [
            'limit' => 8
        ]
    ]
);
