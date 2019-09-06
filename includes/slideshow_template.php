<style media="screen">
    h3{
        color: red;
    }
</style>

<?php
    $rhSlideCount = get_theme_mod('rh_slide_count_setting');
 ?>
<div class="full alignfull">
    <?php for($i=1;$i<=$rhSlideCount;$i++): ?>
        <h3>Slide Num-<?= $i; ?></h3>
    <?php endfor; ?>

</div>
