<?php
get_header();

if     ( is_home() )                      { get_template_part( 'parts/pages/home' );               }
elseif ( is_404() )                       { get_template_part( 'parts/pages/404' );                }
elseif ( is_search() )                    { get_template_part( 'parts/pages/search' );             }
elseif ( is_archive() )                   { get_template_part( 'parts/pages/archive' );            }
else                                      { get_template_part( 'parts/pages/' . get_post_type() ); }

get_footer();
