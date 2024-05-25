<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>

    <script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js"></script>
    <script>
        window.googletag = window.googletag || { cmd: [] };
        googletag.cmd.push(() => {
            googletag.defineSlot('/34629545/skin_desni_360x1000', [360, 1000], 'div-gpt-ad-1435236610569-0').addService(googletag.pubads());
            googletag.defineSlot('/34629545/skin_lijevi_360x1000', [360, 1000], 'div-gpt-ad-1435236610569-1').addService(googletag.pubads());
            googletag.defineSlot('/34629545/kodex_LB_728x90', [728, 90], 'div-gpt-ad-1376633216064-0').addService(googletag.pubads());
            googletag.defineSlot('/34629545/Skin_desno_160x600', [160, 600], 'div-gpt-ad-1377788877407-0').addService(googletag.pubads());
            googletag.defineSlot('/34629545/Skin_lijevo_160x600', [160, 600], 'div-gpt-ad-1377789026571-0').addService(googletag.pubads());
            googletag.defineSlot('/34629545/home_300x250_2', [300, 250], 'div-gpt-ad-1379427878929-0').addService(googletag.pubads());
            googletag.defineSlot('/34629545/home_300x250_1', [300, 250], 'div-gpt-ad-1379677055199-0').addService(googletag.pubads());
            googletag.defineSlot('/34629545/drustvo_300x250_1', [300, 250], 'div-gpt-ad-1388413497313-0').addService(googletag.pubads());
            googletag.defineSlot('/34629545/cafe_300x250_2', [300, 250], 'div-gpt-ad-1391265315547-0').addService(googletag.pubads());
            googletag.defineSlot('/34629545/300x250_politika', [300, 250], 'div-gpt-ad-1392474858677-0').addService(googletag.pubads());
            googletag.defineSlot('/34629545/1x1adu', [1, 1], 'div-gpt-ad-1396648097411-0').addService(googletag.pubads());
            googletag.pubads().enableSyncRendering();
            googletag.pubads().enableSingleRequest();
            googletag.pubads().collapseEmptyDivs();
            googletag.enableServices();
        });
    </script>
</head>

<body <?php body_class('zox-net1 zox-s4'); ?>>
<?php wp_body_open(); ?>

<div id="zox-site" class="left zoxrel">

    <div id="zox-fly-wrap">

        <div id="zox-fly-menu-top" class="left relative">
            <div id="zox-fly-logo" class="left relative">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>" rel="home">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" width="224" height="73">
                </a>
            </div>
            <div class="zox-fly-but-wrap zox-fly-but-menu zox-fly-but-click">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div id="zox-fly-menu-wrap">
            <nav class="zox-fly-nav-menu left relative">
                <?php
                wp_nav_menu( array(
                    'theme_location'	=> "primary",
                    'container'			=> "div",
                    'container_id'		=> "",
                    'container_class'	=> "menu-main-menu-container",
                    'menu_id'			=> "menu-main-menu",
                    'menu_class'		=> "menu",
                    'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'				=> 3,
                ) );
                ?>
            </nav>
        </div>

        <div id="zox-fly-soc-wrap">
            <span class="zox-fly-soc-head">Connect with us</span>
            <ul class="zox-fly-soc-list left relative">
                <li><a href="https://www.facebook.com/KodexMe" target="_blank" class="fab fa-facebook-f"></a></li>
                <li><a href="https://x.com/kodexme" target="_blank" class="fab fa-x-twitter"></a></li>
                <li><a href="https://www.youtube.com/kodexme" target="_blank" class="fab fa-youtube"></a></li>
            </ul>
        </div>

    </div>

    <div id="zox-search-wrap">
        <div class="zox-search-cont">
            <p class="zox-search-p"><?php _e('Unesite pojam pretrage', 'kodex' ) ?></p>
            <div class="zox-search-box">
                <form method="get" id="zox-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" style="width: 100%">
                    <input type="text" name="s" id="zox-search-input" onfocus='if (this.value == "<?php echo __( 'Traži', 'kodex' ) ?>") { this.value = ""; }' onblur='if (this.value == "<?php echo __( 'Traži', 'kodex' ) ?>") { this.value = ""; }' />
                    <input type="submit" id="zox-search-submit" value="<?php echo __( 'Traži', 'kodex' ) ?>" />
                </form>
            </div>
        </div>
        <div class="zox-search-but-wrap zox-search-click">
            <span></span>
            <span></span>
        </div>
    </div>

    <div id="zox-site-wall" class="left zoxrel">
        <div id="zox-site-main" class="left zoxrel">
            <header id="zox-main-head-wrap" class="left zoxrel zox-trans-head">
                <div id="zox-top-head-wrap" class="left relative">
                    <div class="zox-head-width">
                        <div id="zox-top-head" class="relative">

                            <div id="zox-top-head-left">
                                <div class="zox-top-nav-menu zox100">
                                    <?php
                                    wp_nav_menu( array(
                                        'theme_location'	=> "secondary",
                                        'container'			=> "div",
                                        'container_id'		=> "",
                                        'container_class'	=> "menu-secondary-menu-container",
                                        'menu_id'			=> "menu-secondary-menu",
                                        'menu_class'		=> "menu",
                                        'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                        'depth'				=> 1,
                                    ) );
                                    ?>
                                </div>
                            </div>

                            <div id="zox-top-head-right">
                                <div class="zox-top-soc-wrap">
                                    <a href="https://www.facebook.com/KodexMe" target="_blank"><span class="zox-top-soc-but fab fa-facebook-f"></span></a>
                                    <a href="https://x.com/kodexme" target="_blank"><span class="zox-top-soc-but fab fa-x-twitter"></span></a>
                                    <a href="https://www.youtube.com/kodexme" target="_blank"><span class="zox-top-soc-but fab fa-youtube"></span></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div id="zox-bot-head-wrap" class="left zoxrel">
                    <div class="zox-head-width">
                        <div id="zox-bot-head">

                            <div id="zox-bot-head-left">
                                <div class="zox-fly-but-wrap zoxrel zox-fly-but-click">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>

                            <div id="zox-bot-head-mid" class="relative">
                                <div class="zox-bot-head-logo">
                                    <div class="zox-bot-head-logo-main">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>" rel="home">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" width="224" height="73">
                                        </a>
                                    </div>
                                </div>
                                <div class="zox-bot-head-menu">
                                    <div class="zox-nav-menu">
                                        <?php
                                        wp_nav_menu( array(
                                            'theme_location'	=> "primary",
                                            'container'			=> "div",
                                            'container_id'		=> "",
                                            'container_class'	=> "menu-main-menu-container",
                                            'menu_id'			=> "menu-main-menu-1",
                                            'menu_class'		=> "menu",
                                            'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                            'depth'				=> 3,
                                        ) );
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div id="zox-bot-head-right">
                                <span class="zox-night zox-night-mode fas fa-moon"></span>
                                <span class="zox-nav-search-but fas fa-search zox-search-click"></span>
                            </div>

                        </div>
                    </div>
                </div>
            </header>

            <?php adsense('adsense_rest_top'); ?>

            <div id="zox-site-grid">
                <div id="zox-site-wall-small">