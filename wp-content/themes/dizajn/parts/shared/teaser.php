<?php $iteration = $args['i'] ?? 99 ?>

<li class="teaser" data-theme="<?php echo dizajn_slug_and_name()['slug'] ?>">
    <a class="teaser-thumb d-block" href="<?php echo esc_url( get_permalink() ) ?>" alt="<?php the_title_attribute() ?>">
        <?php
        dizajn_media_icon();
        if ( has_post_thumbnail()) : ?>
            <?php the_post_thumbnail(); ?>
        <?php endif ?>
    </a>

    <div class="teaser-content">
        <?php dizajn_pretitle() ?>
        <a href="<?php echo esc_url( get_permalink() ) ?>">
            <?php if($iteration == 0): ?>
                <div class="teaser-custom-title">
                    <div class="teaser-custom-title-inner">
                        <?php the_title( '<h3>', '</h3>' ); ?>
                        <div class="teaser-excerpt"> <?php echo get_the_excerpt() ?></div>
                    </div>
                </div>
            <?php else: ?>
                <?php the_title( '<h3>', '</h3>' ); ?>
            <?php endif ?>
        </a>
        <time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ) ?>"><?php echo esc_html( get_the_date() . ' - ' .  get_the_time() )  ?></time>
    </div>
</li>