<?php

if ( ! function_exists( 'adsense' )) :
    function adsense( $arg ) {
        $argId = get_theme_mod( $arg );
        if( ! empty( $argId ) ) {
            echo do_shortcode( '[adinserter block="' . $argId . '"]' );
        }
    }
endif;

if ( ! function_exists( 'dizajn_slug_and_name' ) ) :
    function dizajn_slug_and_name() {
        if ( 'post' === get_post_type() ) {
            $catSlug = 'dizajn';
            $catName = get_bloginfo( 'name' );

            if (has_category()) {

                $cats = get_the_category();

                if(!empty($cats[0]) && $cats[0]->slug !== 'naslovnica') {
                    $catSlug = $cats[0]->slug;
                    $catName = $cats[0]->name;
                } elseif (!empty($cats[1]) && $cats[1]->slug !== 'naslovnica' ) {
                    $catSlug = $cats[1]->slug;
                    $catName = $cats[1]->name;
                }
            }

            return [
                'slug' => $catSlug,
                'name' => $catName
            ];
        }
    }
endif;

if ( ! function_exists( 'dizajn_pretitle' ) ) :
    function dizajn_pretitle() {
        if ( 'post' === get_post_type() ) {
            $primary = get_post_meta( get_the_ID(), 'dizajn_pretitle', true );
            $fallback = dizajn_slug_and_name()['name'];
            $output = !empty( $primary ) ? $primary : $fallback;
            printf( '<span>' . '%1$s' . '</span>', $output );

        }
    }
endif;

if ( ! function_exists( 'dizajn_posttitle' ) ) :
    function dizajn_posttitle() {
        if ( 'post' === get_post_type() ) {
            $output = get_post_meta( get_the_ID(), 'dizajn_posttitle', true );
            if( !empty( $output ) ) {
                printf( '<div class="article-posttitle">' . '%1$s' . '</div>', $output );
            }
        }
    }
endif;


if ( ! function_exists( 'dizajn_media_icon' ) ) :
    function dizajn_media_icon() {
        $val = get_post_meta( get_the_ID(), 'dizajn_media', true );
        if( !empty( $val ) && $val !== 'none') {
            if($val == 'photo') {
                printf('<svg class="d-block teaser-icon" width="20" height="20"><use xlink:href="#i-photo"></use></svg>');
            } else {
                printf('<svg class="d-block teaser-icon" width="20" height="20"><use xlink:href="#i-video"></use></svg>');
            }
        }
    }
endif;

if ( ! function_exists( 'dizajn_author' ) ) :
    function dizajn_author() {
        if ( 'post' === get_post_type() ) {

            $guest = get_post_meta( get_the_ID(), 'dizajn_guest', true );
            $userID = get_post_meta( get_the_ID(), 'dizajn_author', true );

            if( !empty( $guest ) ) {
                $author = $guest;
            } else {
                $author = $userID == 'on' ? get_the_author_meta('display_name') : get_bloginfo( 'name' );
            }
            printf( '<div class="article-author">' . esc_html__( 'Autor: %1$s', 'dizajn' ) . '</div>', $author );
        }
    }
endif;

if ( ! function_exists( 'dizajn_feat_caption' ) ) :
    function dizajn_feat_caption() {
        $output = get_post_meta( get_the_ID(), 'dizajn_featcaption', true );
        if( !empty( $output) ) {
            printf( '<figcaption>' . '%1$s' . '</figcaption>', $output );
        }
    }
endif;

if ( ! function_exists( 'dizajn_categories' ) ) :
    function dizajn_categories() {
        if ( 'post' === get_post_type() ) {
            $categories_list = get_the_category_list( esc_html__( ', ', 'dizajn' ) );
            if ( $categories_list ) {
                printf( '<div class="cat-links">' . esc_html__( 'Objavljeno pod %1$s', 'dizajn' ) . '</div>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            }
        }
    }
endif;

if ( ! function_exists( 'dizajn_tags' ) ) :
    function dizajn_tags() {
        if ( 'post' === get_post_type() ) {
            $tags_list = get_the_tag_list( '', esc_html_x( '', 'separator', 'dizajn' ) );
            if ( $tags_list ) {
                printf( '<span class="tags-links">' . esc_html__( '%1$s', 'dizajn' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            }
        }
    }
endif;

if ( ! function_exists( 'dizajn_sharer' ) ) :
    function dizajn_sharer() {
        if ( 'post' === get_post_type() ) {

            $sh_url = urlencode(get_permalink());
            $sh_title = str_replace( ' ', '%20', get_the_title());

            $facebookURL  = 'https://www.facebook.com/sharer/sharer.php?u='.$sh_url;
            $messengerUrl = 'fb-messenger://share/?link='.$sh_url;
            $viberUrl     = 'viber://forward?text='.$sh_url;
            $whatsappURL  = 'viber://forward?text='.$sh_title . ' ' . $sh_url;
            $twitterURL   = 'https://twitter.com/intent/tweet?text='.$sh_title.'&amp;url='.$sh_url;
            $linkedInURL  = 'https://www.linkedin.com/shareArticle?mini=true&url='.$sh_url.'&amp;title='.$sh_title;

            $sharer = '<div class="sharer">
                    
                    <a class="d-block facebook"  href="' . $facebookURL . '" target="_blank"><svg class="d-block" width="20" height="20"><use xlink:href="#i-facebook-share"></use></svg></a>
                    <a class="d-block viber"     href="' . $viberUrl . '" target="_blank"><svg class="d-block" width="20" height="20"><use xlink:href="#i-viber-share"></use></svg></a>
                    <a class="d-block messenger" href="' . $messengerUrl . '" target="_blank"><svg class="d-block" width="20" height="20"><use xlink:href="#i-messenger-share"></use></svg></a>
                    <a class="d-block whatsapp"  href="' . $whatsappURL . '" target="_blank"><svg class="d-block" width="20" height="20"><use xlink:href="#i-whatsapp-share"></use></svg></a>
                    <a class="d-block twitter"   href="' . $twitterURL . '" target="_blank"><svg class="d-block" width="20" height="20"><use xlink:href="#i-twitter-share"></use></svg></a>
                    <a class="d-block linkedin"  href="' . $linkedInURL . '" target="_blank"><svg class="d-block" width="20" height="20"><use xlink:href="#i-linkedin-share"></use></svg></a>
                  </div>';

            echo $sharer;
        }
    }
endif;

if ( ! function_exists( 'dizajn_views_counter' ) ) :
    function dizajn_views_counter() {
        if ( 'post' === get_post_type() ) {
            if(current_user_can( 'manage_options' )) {
                $output = getPostViews(get_the_ID());
                if( !empty( $output) ) {
                    printf( '<div class="view-counter">' . '%1$s' . '</div>', $output );
                }
            }
        }
    }
endif;