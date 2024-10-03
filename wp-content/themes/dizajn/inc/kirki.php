<?php

if ( class_exists( 'Kirki' ) ) {

    get_template_part( 'inc/customizer/colors' );

    new \Kirki\Panel(
        'home',
        [
            'priority'    => 10,
            'title'       => esc_html__( 'Početna', 'dizajn' ),
            'description' => esc_html__( 'Izmjenu početnu', 'dizajn' ),
        ]
    );

    get_template_part( 'inc/customizer/tags' );
    get_template_part( 'inc/customizer/intro' );
    get_template_part( 'inc/customizer/cats' );

}
