<div id="zox-main-body-wrap" class="left relative">
    <div id="zox-home-main-wrap" class="zoxrel zox100">

        <?php
        $currentCat = get_queried_object();
        $catId      = $currentCat->term_id;

        get_template_part( 'parts/sections/archive-intro', 'intro', ['cat_id' => $catId] );
        get_template_part( 'parts/sections/archive-latest', 'intro', ['cat_id' => $catId] );
        ?>

    </div>
</div>