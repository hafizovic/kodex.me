                    <?php adsense('adsense_rest_bottom'); ?>

                    <footer id="zox-foot-wrap" class="left zoxrel zox100">
                        <div class="zox-head-width">
                            <div class="zox-foot-grid left zoxrel zox100">

                                <div class="zox-foot-left-wrap">

                                    <div class="zox-foot-logo left zox-lh0">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>" rel="home">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" width="224" height="73">
                                        </a>
                                    </div>

                                    <div class="zox-foot-left left">
                                        <div class="zox-foot-menu">
                                            <?php
                                            wp_nav_menu( array(
                                                'theme_location'	=> "secondary",
                                                'container'			=> "div",
                                                'container_id'		=> "",
                                                'container_class'	=> "menu-secondary-menu-container",
                                                'menu_id'			=> "menu-secondary-menu1",
                                                'menu_class'		=> "menu",
                                                'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                                'depth'				=> 1,
                                            ) );
                                            ?>
                                        </div>

                                        <div class="zox-foot-copy">
                                            <p><?php printf( esc_html__( 'Copyright © %1$s %2$s. Sva prava zadržana', 'kodex' ),  date('Y'), get_bloginfo( 'name' ) ); ?></p>
                                        </div>

                                    </div>
                                </div>

                                <div class="zox-foot-right-wrap">
                                    <div class="zox-foot-soc right relative">
                                        <ul class="zox-foot-soc-list left relative">
                                            <li><a href="https://www.facebook.com/KodexMe" target="_blank" class="fab fa-facebook-f"></a></li>
                                            <li><a href="https://x.com/kodexme" target="_blank" class="fab fa-x-twitter"></a></li>
                                            <li><a href="https://www.youtube.com/kodexme" target="_blank" class="fab fa-youtube"></a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </footer>

                </div>
            </div>
        </div>
    </div>

    <div class="zox-fly-top back-to-top">
        <span class="fas fa-angle-up"></span>
    </div>

</div>

<?php wp_footer(); ?>

<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-39185024-1', 'kodex.me');
ga('send', 'pageview');
</script>

</body>
</html>
