<?php
setPostViews( get_the_ID() );

$sh_url = urlencode(get_permalink());
$sh_title = str_replace( ' ', '%20', get_the_title());

$facebookURL  = 'https://www.facebook.com/sharer/sharer.php?u='.$sh_url;
$twitterURL   = 'https://twitter.com/intent/tweet?text='.$sh_title.'&amp;url='.$sh_url;
$whatsappURL  = 'https://wa.me/?text='.$sh_title . ' ' . $sh_url;
$mailUrl = 'mailto:?subject='.$sh_title . '&amp;BODY='.$sh_url;
?>

<div id="zox-main-body-wrap" class="left relative">
    <article class="post-344 post type-post status-publish format-standard has-post-thumbnail hentry category-world tag-alaska tag-american tag-census tag-native tag-world">
        <div class="zox-article-wrap zoxrel left zox100">
            <div class="zox-post-top-wrap zoxrel left zox100">
                <div class="zox-post-title-wrap zox-tit2">
                    <div class="zox-post-width">
                        <header class="zox-post-head-wrap left zoxrel zox100">
                            <div class="zox-post-head zoxrel">

                                <?php
                                $categories = get_the_category();
                                if ( ! empty( $categories ) ) : ?>
                                    <h3 class="zox-post-cat">
                                        <a class="zox-post-cat-link" href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ) ?>"><span class="zox-post-cat"><?php echo esc_html( $categories[0]->name ) ?></span></a>
                                    </h3>
                                <?php endif; ?>

                                <?php
                                the_title( '<h1 class="zox-post-title left entry-title">', '</h1>' );
                                kodex_posttitle();
                                ?>


                                <div class="zox-post-info-wrap">

                                    <div class="zox-post-byline-wrap" style="grid-template-columns: 1fr;">
                                        <div class="zox-author-info-wrap">

                                            <div class="zox-author-name-wrap">
                                                <p><?php _e('Autor:', 'kodex') ?></p> <?php kodex_author() ?>
                                            </div>

                                            <div class="zox-post-date-wrap">
                                                <p><?php _e('Objavljeno:', 'kodex') ?></p> <span class="zox-post-date updated"><time class="post-date updated" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ) ?>"><?php echo esc_html( get_the_date() . ' - ' .  get_the_time() )  ?></time></span>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="zox-post-soc-top-wrap">
                                        <div class="zox-post-soc-stat">
                                            <ul class="zox-post-soc-stat-list left zoxrel">
                                                <a href="<?php echo $facebookURL; ?>" target="_blank"><li class="zox-post-soc-fb"><i class="fab fa-facebook-f"></i></li></a>
                                                <a href="<?php echo $twitterURL; ?>" target="_blank"><li class="zox-post-soc-twit"><i class="fab fa-x-twitter"></i></li></a>
                                                <li class="zox-post-soc-copy"><i class="fas fa-link"></i></li>
                                                <a href="<?php echo $whatsappURL; ?>" target="_blank"><li class="zox-post-soc-com zox-com-click"><i class="fab fa-whatsapp"></i></li></a>
                                                <a href="<?php echo $mailUrl; ?>"><li class="zox-post-soc-com zox-com-click"><i class="fas fa-envelope"></i></li></a>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </header>
                    </div>
                </div>
            </div>

            <div class="zox-post-main-grid">
                <div class="zox-post-width">
                    <div class="zox-post-main-wrap zoxrel left zox100">
                        <div class="zox-post-main">

                            <?php if ( has_post_thumbnail()) : ?>
                                <div class="zox-post-bot-wrap">
                                    <div class="zox-post-img-wrap">
                                        <div class="zox-post-img left zoxrel zoxlh0" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                                            <?php
                                            the_post_thumbnail('full', array('class' => 'attachment-zox-mid-thumb size-zox-mid-thumb'));
                                            kodex_feat_caption();
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="zox-post-body-wrap left zoxrel">

                                <div class="zox-post-body left zoxrel zox100">
                                    <?php the_content() ?>
                                </div>

                                <?php
                                $post_tags = get_the_tags();
                                if ( $post_tags ) :
                                    ?>
                                    <div class="zox-post-body-bot left zoxrel zox100">
                                        <div class="zox-post-body-width">
                                            <div class="zox-post-tags left zoxrel zox100">
                                                <span class="zox-post-tags-header"><?php _e('Oznake:', 'kodex') ?></span>
                                                <?php $i = 0; foreach( $post_tags as $tag ): ?>
                                                    <a href="<?php echo esc_attr( get_tag_link( $tag->term_id ) ) ?>"><?php echo __( $tag->name ) ?></a><?php if($i !== count($post_tags) - 1) echo ', ' ?>
                                                <?php $i++; endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>

                        <?php get_template_part( 'parts/sidebar/sidebar-post' ); ?>

                    </div>
                </div>
            </div>

            <div class="zox-post-soc-scroll">
                <ul class="zox-post-soc-list left zoxrel">
                    <a href="<?php echo $facebookURL; ?>"><li class="zox-post-soc-fb"><i class="fab fa-facebook-f"></i></li></a>
                    <a href="<?php echo $twitterURL; ?>"><li class="zox-post-soc-twit"><i class="fab fa-x-twitter"></i></li></a>
                    <li class="zox-post-soc-copy"><i class="fas fa-link"></i></li>
                    <a href="<?php echo $whatsappURL; ?>"><li class="zox-post-soc-twit"><i class="fab fa-whatsapp"></i></li></a>
                    <a href="<?php echo $mailUrl; ?>"><li class="zox-post-soc-twit"><i class="fas fa-envelope"></i></li></a>
                </ul>
            </div>

        </div>

        <?php get_template_part( 'parts/sections/single-related' ); ?>

    </article>
</div>