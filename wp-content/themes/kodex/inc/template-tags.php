<?php

if ( ! function_exists( 'kodex_posttitle' ) ) :
    function kodex_posttitle() {
        if ( 'post' === get_post_type() ) {
            $output = get_post_meta( get_the_ID(), 'kodex_posttitle', true );
            if( !empty( $output ) ) {
                printf( '<span class="zox-post-excerpt"><p>' . '%1$s' . '</p></span>', $output );
            } else {
                printf( '<span class="zox-post-excerpt"><p>' . '%1$s' . '</p></span>', get_the_excerpt() );
            }
        }
    }
endif;

if ( ! function_exists( 'kodex_feat_caption' ) ) :
    function kodex_feat_caption() {
        $output = get_post_meta( get_the_ID(), 'kodex_featcaption', true );
        if( !empty( $output) ) {
            printf( '<span class="zox-post-img-cap">' . '%1$s' . '</span>', $output );
        }
    }
endif;

if ( ! function_exists( 'kodex_author' ) ) :
    function kodex_author() {
        if ( 'post' === get_post_type() ) {

            $guest = get_post_meta( get_the_ID(), 'kodex_guest', true );
            $userID = get_post_meta( get_the_ID(), 'kodex_author', true );

            if( !empty( $guest ) ) {
                $author = $guest;
            } else {
                $author_id = get_post_field ('post_author', get_the_ID());
                $display_name = get_the_author_meta( 'nickname' , $author_id );


//                echo get_the_author_meta('display_name');
                $author = $userID == 'on' ? $display_name : 'Kodex';
            }
            printf( '<strong class="zox-author-name vcard fn author">' . esc_html__( '%1$s', 'kodex' ) . '</strong>', $author );
        }
    }
endif;

if ( ! function_exists( 'get_adsense' )) :
    function get_adsense( $arg ) {
        $argId = get_theme_mod( $arg );
        if( ! empty( $argId ) ) {
            return do_shortcode( '[adinserter block="' . $argId . '"]' );
        }
    }
endif;

if ( ! function_exists( 'adsense' )) :
    function adsense( $arg ) {
        $argId = get_theme_mod( $arg );
        if( ! empty( $argId ) ) {
            echo do_shortcode( '[adinserter block="' . $argId . '"]' );
        }
    }
endif;

if ( ! function_exists( 'kodex_category' ) ) :
    function kodex_category() {
        if ( 'post' === get_post_type() ) {
            $categories = get_the_category();
            $output = !empty($categories) ? esc_html( $categories[0]->name ) : null;
            if($output) {
                printf( '<h3 class="zox-s-cat"><span class="zox-s-cat">' . '%1$s' . '</span></h3>', $output );
            }
        }
    }
endif;

if ( ! function_exists( 'kodex_excerpt' ) ) :
    function kodex_excerpt() {
        printf( '<p class="zox-s-graph">' . '%1$s' . '</p>', get_the_excerpt() );
    }
endif;

if ( ! function_exists( 'kodex_date' ) ) :
    function kodex_date() {
        if ( 'post' === get_post_type() ) {
            printf( '<div class="zox-byline-wrap"><span class="zox-byline-date" style="margin: 0;"><i class="far fa-clock"></i> ' . '%1$s' . ' - ' . '%2$s' . '</div>', get_the_date(), get_the_time() );
        }
    }
endif;

if ( ! function_exists( 'kodex_title_linked' ) ) :
    function kodex_title_linked($class = 'def') {
        printf( '<div class="zox-art-title"><a href="' . '%1$s' . '"><h2 class="' . '%2$s' . '">' . '%3$s' . '</h2></a></div>', get_permalink(), $class, get_the_title() );
    }
endif;

if ( ! function_exists( 'kodex_post_type' ) ) :
    function kodex_post_type() {

        switch (get_post_format()) {
            case 'image':
                $icon = 'image';
                break;
            case 'video':
                $icon = 'video';
                break;
            case 'audio':
                $icon = 'music';
                break;
            case 'gallery':
                $icon = 'images';
                break;
            default:
        }

        if(isset($icon)) {
            printf( '<div class="zox-post-type"><span class="fas fa-' . $icon . '"></span></div>' );
        }
    }
endif;

if ( ! function_exists( 'kodex_thumb_large_medium' ) ) :
    function kodex_thumb_large_medium() {
        if ( has_post_thumbnail()) {
            $desktop = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), "kodex-large");
            $mobile = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), "kodex-medium");
            $output = '
                <img class="zox-reg-img wp-post-image" width="' . $desktop[1] . '" height="' . $desktop[2] . '" src="' . $desktop[0] . '" alt="" />
                <img class="zox-mob-img wp-post-image" width="' . $mobile[1] . '" height="' . $mobile[2] . '" src="' . $mobile[0] . '" alt="" />
            ';
        } else {
            $output = '
                <img class="zox-reg-img wp-post-image" width="1024" height="576" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABAAAAAJAAQMAAAApW4aWAAAAA1BMVEXr6+uInxNMAAAAaklEQVR42uzBgQAAAACAoP2pF6kCAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAOD24EAAAAAAQJC/9SBXAAAAAAAAAAAAAAAAsBciTwABgbEhzwAAAABJRU5ErkJggg==" alt="" />
                <img class="zox-mob-img wp-post-image" width="480" height="270" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAeAAAAEOAQMAAABrVFYkAAAAA1BMVEXr6+uInxNMAAAAJklEQVR42u3BAQ0AAADCIPuntscHDAAAAAAAAAAAAAAAAAAAAIg6QFYAAV5ZjqEAAAAASUVORK5CYII=" alt="" />
           ';
        }

        echo $output;
    }
endif;

if ( ! function_exists( 'kodex_thumb_medium_small' ) ) :
    function kodex_thumb_medium_small() {
        if ( has_post_thumbnail()) {
            $desktop = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), "kodex-medium");
            $mobile = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), "thumbnail");
            $output = '
                <img class="zox-reg-img wp-post-image" width="' . $desktop[1] . '" height="' . $desktop[2] . '" src="' . $desktop[0] . '" alt="" />
                <img class="zox-mob-img wp-post-image" width="' . $mobile[1] . '" height="' . $mobile[2] . '" src="' . $mobile[0] . '" alt="" />
            ';
        } else {
            $output = '
                <img class="zox-reg-img wp-post-image" width="480" height="270" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAeAAAAEOAQMAAABrVFYkAAAAA1BMVEXr6+uInxNMAAAAJklEQVR42u3BAQ0AAADCIPuntscHDAAAAAAAAAAAAAAAAAAAAIg6QFYAAV5ZjqEAAAAASUVORK5CYII=" alt="" />
                <img class="zox-mob-img wp-post-image" width="100" height="100" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAADIAQMAAACXljzdAAAAA1BMVEXr6+uInxNMAAAAHElEQVRYw+3BgQAAAADDoPtTX2EA1QAAAAAAogMUUAABFk0ePwAAAABJRU5ErkJggg==" alt="" />
           ';
        }

        echo $output;
    }
endif;

if ( ! function_exists( 'kodex_thumb_medium' ) ) :
    function kodex_thumb_medium() {
        if ( has_post_thumbnail()) {
            $medium = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), "kodex-medium");
            $output = '<img class="wp-post-image" width="' . $medium[1] . '" height="' . $medium[2] . '" src="' . $medium[0] . '" alt="" />';
        } else {
            $output = '<img class="wp-post-image" width="480" height="270" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAeAAAAEOAQMAAABrVFYkAAAAA1BMVEXr6+uInxNMAAAAJklEQVR42u3BAQ0AAADCIPuntscHDAAAAAAAAAAAAAAAAAAAAIg6QFYAAV5ZjqEAAAAASUVORK5CYII=" alt="" />';
        }

        echo $output;
    }
endif;