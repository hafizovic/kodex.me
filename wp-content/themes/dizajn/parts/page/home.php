<?php
$usedPosts = [];

get_template_part( 'parts/section/home-intro', 'intro', [ 'used' => &$usedPosts ]);
get_template_part( 'parts/section/home-cats', 'intro', [ 'used' => &$usedPosts ]);