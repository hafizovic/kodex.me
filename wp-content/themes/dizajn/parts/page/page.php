<div class="section is-expanded">
	<div class="main">

		<?php while ( have_posts() ) : the_post() ?>

			<article <?php post_class('article'); ?>>

				<div class="page-header">
					<?php the_title( '<h1 class="article-title">', '</h1>' ); ?>
				</div>

				<div class="article-content">
					<?php the_content() ?>
				</div>

			</article>

		<?php endwhile ?>

	</div>

	<?php get_template_part( 'parts/sidebar/inner', 'sidebar-inner', [ 'iterator' => 1 ] ) ?>

</div>