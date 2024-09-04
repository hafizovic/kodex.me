<div class="section is-expanded">
    <div class="main">

        <div class="article">

            <header class="article-header">
                <h1 class="article-title text-center"><?php printf( esc_html__( 'Rezultati za: %s', 'dizajn' ), '<span>' . get_search_query() . '</span>' ) ?></h1>
            </header>

            <?php if ( have_posts() ) : ?>

                <ul class="teasers" data-layout="archive">
                    <?php while ( have_posts() ) : the_post();
                        get_template_part( 'parts/shared/teaser' );
                    endwhile ?>
                </ul>

                <?php
                get_template_part( 'parts/shared/pagination' );

            endif;
            ?>

        </div>

    </div>

    <?php get_template_part( 'parts/sidebar/inner', 'sidebar-inner', [ 'iterator' => 1 ] ) ?>

</div>