<?php
    $rhSlideCount = get_theme_mod('rh_slide_count_setting', 5);
    $rhSlideType = get_theme_mod('rh_slide_width_setting');
 ?>

<h1>SlideShow</h1>
<div class="rhSlideshowContainer <?php if($rhSlideType === 'full'){echo 'alignfull';}; ?>">
    <div class="rhSlideShowInner">
        <?php for($i=1;$i<=$rhSlideCount;$i++): ?>
            <?php
                if(get_theme_mod('rh_slide_' . $i . '_setting')){
                    $rhSlideImage = get_theme_mod('rh_slide_' . $i . '_setting');
                } else {
                    $rhSlideImage = plugin_dir_url(__DIR__). 'assets/images/placeholderSlide.jpg';
                }
            ?>
            <div class="rhSlideItem">
                <img class="" src="<?= $rhSlideImage; ?>" alt="">
            </div>
        <?php endfor; ?>
    </div>
</div>
