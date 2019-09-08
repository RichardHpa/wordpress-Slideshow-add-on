<?php
    $rhSlideCount = get_theme_mod('rh_slide_count_setting', 5);
    $rhSlideType = get_theme_mod('rh_slide_width_setting');
 ?>

<div class="slideshowContainer<?php if($rhSlideType === 'full'){echo 'alignfull';}; ?>">
    <?php for($i=1;$i<=$rhSlideCount;$i++): ?>
        <?php
            $rhSlideImage =  get_theme_mod('rh_slide_' . $i . '_setting');
            // echo $rhSlideImage;
        ?>
        <h3>Slide Num-<?= $i; ?></h3>
        <!-- <img src="<?= $rhSlideImage; ?>" alt=""> -->
    <?php endfor; ?>
</div>
