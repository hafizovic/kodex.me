<div id="zox-main-body-wrap" class="left relative">
    <div id="zox-home-main-wrap" class="zoxrel zox100">

        <div class="zox-body-width">
            <div class="zox-post-top-wrap zoxrel left zox100">
                <div class="zox-post-title-wrap zox-tit1">
                    <h1 class="zox-post-title left entry-title"><?php _e('Pretraga', 'kodex') ?></h1>
                </div>
            </div>
        </div>

        <div class="zox-body-width">
            <div id="zox-home-body-wrap" class="zoxrel zox100">
                <div id="zox-home-cont-wrap" class="zoxrel">

                    <div class="zox-search-box">
                        <form method="get" id="zox-search-form2" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <input type="text" name="s" id="zox-search-input2" value="<?php echo get_search_query(); ?>" onfocus='if (this.value == "<?php echo __( 'Traži', 'kodex' ) ?>") { this.value = ""; }' onblur='if (this.value == "<?php echo __( 'Traži', 'kodex' ) ?>") { this.value = ""; }' />
                            <input type="submit" id="zox-search-submit2" value="<?php echo __( 'Traži', 'kodex' ) ?>" />
                        </form>
                    </div>

                    <div id="zox-main-blog-wrap" class="zoxrel left zox100">
                        <div class="zox-main-blog zoxrel left zox100">

                            <?php if ( have_posts() ) : ?>

                                <section class="zox-blog-grid left zoxrel left zox100 infinite-content zox-divr zox-s4">

                                    <?php while ( have_posts() ) : the_post(); ?>

                                        <section class="zox-art-wrap zoxrel zox-art-mid infinite-post">
                                            <div class="zox-art-grid">

                                                <a href="<?php echo esc_url( get_permalink() ) ?>">
                                                    <div class="zox-art-img zoxrel zox100 zoxlh0">
                                                        <?php
                                                        kodex_thumb_medium_small();
                                                        kodex_post_type();
                                                        ?>
                                                    </div>
                                                </a>

                                                <div class="zox-art-text">
                                                    <div class="zox-art-text-cont">
                                                        <?php
                                                        kodex_category();
                                                        kodex_title_linked('zox-s-title2');
                                                        kodex_excerpt();
                                                        kodex_date();
                                                        ?>
                                                    </div>
                                                </div>

                                            </div>
                                        </section>

                                    <?php endwhile; ?>

                                </section>

                                <div class="zox-inf-more-wrap left zoxrel" style="display: none;">
                                    <div class="zox-nav-links">
                                        <nav class="pagination">
                                            <div class="nav-links">
                                                <?php echo paginate_links( array('prev_text' => '&larr;', 'next_text' => '&rarr;') ); ?>
                                        </nav>
                                    </div>
                                </div>

                            <?php else : ?>

                                <section class="zox-blog-grid left zoxrel left zox100 infinite-content zox-divr zox-s4">
                                    <div class="zox-search-text left relative">
                                        <h2 class="zox-s-title2" style="text-align: center; display: block"><?php _e('Bez rezultata', 'kodex') ?></h2>
                                    </div>
                                </section>

                            <?php endif; ?>

                        </div>
                    </div>
                </div>

                <?php get_template_part( 'parts/sidebar/sidebar-post' ); ?>

            </div>
        </div>
    </div>
</div>