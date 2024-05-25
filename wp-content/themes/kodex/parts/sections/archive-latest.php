<div class="zox-body-width">
    <div id="zox-home-body-wrap" class="zoxrel zox100">
        <div id="zox-home-cont-wrap" class="zoxrel">
            <div id="zox-main-blog-wrap" class="zoxrel left zox100">
                <div class="zox-main-blog zoxrel left zox100">
                    <section class="zox-blog-grid left zoxrel zox100 zox-divr zox-s4">

                        <?php if ( have_posts() ) : ?>
                            <?php $i = 1; while ( have_posts() ) : the_post(); ?>

                                <article class="zox-art-wrap zoxrel zox-art-<?php if($i == 1) {echo 'main';} else {echo 'mid';} ?>">
                                    <div class="zox-art-grid">

                                        <a href="<?php echo esc_url( get_permalink() ) ?>">
                                            <div class="zox-art-img zoxrel zox100 zoxlh0">
                                                <?php
                                                $i == 1 ? kodex_thumb_medium() : kodex_thumb_medium_small();
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
                                </article>

                            <?php $i++; endwhile; ?>

                            <div class="zox-inf-more-wrap left zoxrel" style="display: none;">
                                <div class="zox-nav-links">
                                    <nav class="pagination">
                                        <div class="nav-links">
                                            <?php echo paginate_links( array('prev_text' => '&larr;', 'next_text' => '&rarr;') ); ?>
                                        </div>
                                    </nav>
                                </div>
                            </div>

                        <?php endif; ?>

                    </section>
                </div>
            </div>
        </div>

        <?php get_template_part( 'parts/sidebar/sidebar-latest' ); ?>

    </div>
</div>