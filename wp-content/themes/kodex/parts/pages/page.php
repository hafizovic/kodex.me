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

                                <?php the_title( '<h1 class="zox-post-title left entry-title">', '</h1>' ); ?>

                                <div class="zox-post-info-wrap">
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

                            <?php if(has_post_thumbnail()) {kodex_thumb();} ?>

                            <div class="zox-post-body-wrap left zoxrel">
                                <div class="zox-post-body left zoxrel zox100">
                                    <?php the_content() ?>
                                </div>
                            </div>

                        </div>

                        <?php get_template_part( 'parts/sidebar/sidebar-post' ); ?>

                    </div>
                </div>
            </div>
        </div>
    </article>
</div>