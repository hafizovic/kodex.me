<?php
$catId = $args['cat_id'] ?? 1;
$load = $args['load'] ?? 2;

if (have_posts()) :
    ?>

    <div class="section">

        <div class="main">

            <div class="article">

                <header class="article-header">
                    <h1 class="article-title text-center"><?php esc_html_e( 'Tag:', 'dizajn' ) ?> <span><?php single_tag_title(); ?></span></h1>
                </header>

                <?php
                get_template_part( 'parts/shared/tag', 'tag', [ 'cat_id' => $catId ]);
                get_template_part( 'parts/shared/pagination' );
                ?>

            </div>

        </div>

        <?php get_template_part( 'parts/sidebar/intro', 'sidebar', [ 'cat_id' => $catId, 'load' => 8 ] ) ?>

    </div>

<?php endif;