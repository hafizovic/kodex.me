<div class="section is-expanded">
	<div class="main">

		<?php while ( have_posts() ) : the_post() ?>

			<article <?php post_class('article'); ?>  data-theme="<?php echo dizajn_slug_and_name()['slug'] ?>">

				<div class="article-header">
					<div class="article-header-main">

						<div class="article-header-main-info">
							<?php
							dizajn_pretitle();
							the_title( '<h1 class="article-title">', '</h1>' );
							dizajn_posttitle();
							?>
						</div>

						<div class="article-header-sub-info">
							<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ) ?>"><?php echo esc_html( get_the_date() . ' - ' .  get_the_time() )  ?></time>
							<?php dizajn_author() ?>
						</div>

					</div>
					<div class="article-header-thumb">
						<?php if ( has_post_thumbnail()) : ?>
							<div class="article-thumb">
								<?php
								the_post_thumbnail();
								dizajn_feat_caption();
								?>
							</div>
						<?php endif ?>
					</div>
				</div>

				<div class="article-content">
					<?php
					the_content();
					wp_link_pages([
						'before'           => '<div class="nav-pages">',
						'after'            => '</div>',
						'next_or_number'   => 'number',
						'nextpagelink'     => '&larr;',
						'previouspagelink' => '&rarr;',
					]);
					?>

					<div class="text-center">
						<?php
						dizajn_tags();
						dizajn_sharer();
						?>
					</div>

				</div>

			</article>

		<?php
		comments_template();
		endwhile;
		get_template_part( 'parts/shared/random' );
		?>

	</div>

	<?php get_template_part( 'parts/sidebar/inner', 'sidebar-inner', [ 'iterator' => 1 ] ) ?>

</div>

<?php
get_template_part( 'parts/section/related');