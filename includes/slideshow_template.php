<?php
    $rhSlideCount = get_theme_mod('rh_slide_count_setting', 5);
    $rhSlideType = get_theme_mod('rh_slide_width_setting');
 ?>

<h1>SlideShow</h1>
<div id="rhSlideshowContainer <?php if($rhSlideType === 'full'){echo 'alignfull';}; ?>">
    <?php for($i=1;$i<=$rhSlideCount;$i++): ?>
        <?php
            if(get_theme_mod('rh_slide_' . $i . '_setting')){
                $rhSlideImage = get_theme_mod('rh_slide_' . $i . '_setting');
                // echo $rhSlideImage;
            } else {
                $rhSlideImage = plugin_dir_url(__DIR__). 'assets/images/placeholderSlide.jpg';
            }
        ?>
        <!-- <h3>Slide Num-<?= $i; ?></h3> -->
        <img class="rhSlideItem" src="<?= $rhSlideImage; ?>" alt="">
    <?php endfor; ?>
</div>
