<?php get_header() ?>

	<div class="content">
		<div class="wrap">

			<?php
			if     ( is_home() )                    { get_template_part( 'parts/page/home' );               }
			elseif ( is_404() )                     { get_template_part( 'parts/page/404' );                }
			elseif ( is_search() )                  { get_template_part( 'parts/page/search' );             }
			elseif ( is_archive() )                 { get_template_part( 'parts/page/archive' );            }
			else                                    { get_template_part( 'parts/page/' . get_post_type() ); }
			?>

		</div>
	</div>

<?php get_footer();