<?php
$file_name = basename(__DIR__);
$slider = get_field('slider');
if (!add_splidejs()){add_splidejs();}
?>
<section class="block-<?= $file_name; ?> wrap flex justify-between gap-3 lg:gap-12">
<?php var_dump($slider); ?>
</section>