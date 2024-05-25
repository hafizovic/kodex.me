<?php

if ( class_exists( 'Kirki' ) ) {

//    // Get first Level Categories
//    $firstLvlCats = [];
//    $firstLvlCatsQuery = get_categories( array(
//        'orderby' => 'name',
//        'order'   => 'DESC',
////        'parent'  => 0
//    ) );
//
//    foreach( $firstLvlCatsQuery as $cat ) {
//        $firstLvlCats[$cat->cat_ID] = $cat->name;
//    }

    // Get Last 100 posts for Intro section
    $latestPosts = [];
    $latestPostsQuery = get_posts( array(
        'post_type'      => array( 'post' ),
        'post_status'    => array( 'publish' ),
        'orderby'        => 'ID',
        'order'          => 'DESC',
        'posts_per_page' => 10,
        'date_query' => array(
            array(
                'after' => '2 months ago'
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
            'title'       => esc_html__( 'Početna', 'kodex' ),
            'description' => esc_html__( 'Izmjenu početnu', 'kodex' ),
        ]
    );

    new \Kirki\Panel(
        'adsense',
        [
            'priority'    => 20,
            'title'       => esc_html__( 'Reklame', 'kodex' ),
            'description' => esc_html__( 'Izmjeni reklame. Kod mora biti u formatu Shortcode', 'kodex' ),
        ]
    );

    new \Kirki\Section(
        'home_intro',
        [
            'panel'       => 'home',
            'priority'    => 10,
            'title'       => esc_html__( 'Intro', 'kodex' ),
        ]
    );

    new \Kirki\Section(
        'home_track',
        [
            'panel'       => 'home',
            'priority'    => 20,
            'title'       => esc_html__( 'Traka', 'kodex' ),
        ]
    );

    new \Kirki\Field\Select(
        [
            'section'     => 'home_intro',
            'settings'    => 'home_intro-layout',
            'label'       => esc_html__( 'Prikaz', 'kodex' ),
            'placeholder' => esc_html__( 'Choose an option', 'kodex' ),
            'default'     => 'option-1',
            'choices'     => [
                'option1' => esc_html__( 'Opcija 1', 'kodex' ),
                'option2' => esc_html__( 'Opcija 2', 'kodex' ),
                'option3' => esc_html__( 'Opcija 3', 'kodex' ),
                'option4' => esc_html__( 'Opcija 4', 'kodex' ),
            ],
        ]
    );

    new \Kirki\Field\Repeater(
        [
            'section'  => 'home_intro',
            'settings' => 'home_intro-sort',
            'priority' => 10,
            'label'    => esc_html__( 'Članci', 'kodex' ),
            'row_label'    => [
                'type'  => 'field',
                'value' => esc_html__( 'Članak', 'kodex' ),
                'field' => 'home_intro-sort-post',
            ],
            'fields'   => [
                'post'   => [
                    'type'        => 'select',
                    'label'       => esc_html__( 'Odaberi članke', 'kodex' ),
                    'placeholder' => esc_html__( 'Odaberi članak', 'kodex' ),
                    'choices'     => $latestPosts
                ],
            ],
            'choices' => [
                'limit' => 3
            ]
        ]
    );

    new \Kirki\Field\Repeater(
        [
            'section'  => 'home_track',
            'settings' => 'home_track-sort',
            'priority' => 10,
            'label'    => esc_html__( 'Članci', 'kodex' ),
            'row_label'    => [
                'type'  => 'field',
                'value' => esc_html__( 'Članak', 'kodex' ),
                'field' => 'home_track-sort-post',
            ],
            'fields'   => [
                'post'   => [
                    'type'        => 'select',
                    'label'       => esc_html__( 'Odaberi članke', 'kodex' ),
                    'placeholder' => esc_html__( 'Odaberi članak', 'kodex' ),
                    'choices'     => $latestPosts
                ],
            ],
            'choices' => [
                'limit' => 3
            ]
        ]
    );

    new \Kirki\Section(
        'adsense_rest',
        [
            'panel' => 'adsense',
            'priority' => 20,
            'title' => esc_html__('Lokacije', 'kodex'),
        ]
    );

    new \Kirki\Field\Slider(
        [
            'section'     => 'adsense_rest',
            'settings'    => 'adsense_rest_top',
            'priority'    => 10,
            'label'       => esc_html__( 'Vrh stranice', 'kodex' ),
            'description' => esc_html__( 'Ova reklama se prikazuje na vrhu stranice odmah ispod navigacije', 'kodex' ),
            'choices'     => ['min' => 0, 'max' => 16, 'step' => 1],
        ]
    );

    new \Kirki\Field\Slider(
        [
            'section'     => 'adsense_rest',
            'settings'    => 'adsense_rest_bottom',
            'priority'    => 20,
            'label'       => esc_html__( 'Dno stranice', 'kodex' ),
            'description' => esc_html__( 'Ova reklama se prikazuje na dnu stranice odmah iznad footera', 'kodex' ),
            'choices'     => ['min' => 0, 'max' => 16, 'step' => 1],
        ]
    );

    new \Kirki\Field\Slider(
        [
            'section'     => 'adsense_rest',
            'settings'    => 'adsense_rest_above',
            'priority'    => 30,
            'label'       => esc_html__( 'Iznad bloka istaknutih vijesti', 'kodex' ),
            'description' => esc_html__( 'Ova reklama se prikazuje na naslovnoj stranici iznad obojenog bloka', 'kodex' ),
            'choices'     => ['min' => 0, 'max' => 16, 'step' => 1],
        ]
    );

    new \Kirki\Field\Slider(
        [
            'section'     => 'adsense_rest',
            'settings'    => 'adsense_rest_below',
            'priority'    => 40,
            'label'       => esc_html__( 'Ispod bloka istaknutih vijesti', 'kodex' ),
            'description' => esc_html__( 'Ova reklama se prikazuje na naslovnoj stranici ispod obojenog bloka', 'kodex' ),
            'choices'     => ['min' => 0, 'max' => 16, 'step' => 1],
        ]
    );

    new \Kirki\Field\Slider(
        [
            'section'     => 'adsense_rest',
            'settings'    => 'adsense_rest_sidebar1',
            'priority'    => 40,
            'label'       => esc_html__( 'Sidebar 1', 'kodex' ),
            'description' => esc_html__( 'Ova reklama se prikazuje unutar sidebara u intro sekciji', 'kodex' ),
            'choices'     => ['min' => 0, 'max' => 16, 'step' => 1],
        ]
    );

    new \Kirki\Field\Slider(
        [
            'section'     => 'adsense_rest',
            'settings'    => 'adsense_rest_sidebar2',
            'priority'    => 40,
            'label'       => esc_html__( 'Sidebar 2', 'kodex' ),
            'description' => esc_html__( 'Ove reklama se prikazuje u donjem sidebaru na naslovnoj i u sidebaru na unutarnjim stranicama', 'kodex' ),
            'choices'     => ['min' => 0, 'max' => 16, 'step' => 1],
        ]
    );

}
