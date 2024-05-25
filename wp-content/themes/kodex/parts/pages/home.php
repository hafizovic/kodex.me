<div id="zox-main-body-wrap" class="left relative">
    <div id="zox-home-main-wrap" class="zoxrel zox100">

        <?php
        $usedPosts = [];

        get_template_part( 'parts/sections/home-intro', 'intro', [ 'used' => &$usedPosts ] );
        get_template_part( 'parts/sections/home-featured', 'featured', [ 'used' => &$usedPosts ] );
        get_template_part( 'parts/sections/home-latest', 'latest', [ 'used' => &$usedPosts ] );
        ?>

    </div>
</div>