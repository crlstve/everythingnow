<?php
$file_name = basename(__DIR__);
$slider = get_field('slider');
$slides = $slider['slide'];
<<<<<<< HEAD
?>
<section class="block-<?= $file_name; ?> wrap gap-3 lg:gap-12">
    <<?= $slider['label']; ?> class="text-lg font-bold m-0 dark:text-white text-center"><?= $slider['title'] ?></<?= $slider['label']; ?>>
=======

?>
<section class="block-<?= $file_name; ?> wrap gap-3 lg:gap-12">
<<?= $slider['label']; ?> class="text-lg font-bold m-0 dark:text-white text-center"><?= $slider['title'] ?></<?= $slider['label']; ?>>
>>>>>>> fc4a3998cf3ec3e021ac9b030fb6ed8b47293fcf
    <div class="mt-8 splide wrap w-1/2">
        <div class="splide__track ">
            <ul class="splide__list">
                <?php foreach ($slides as $slide): ?>
                <li class="splide__slide list-none m-0 flex">
<<<<<<< HEAD
                    <div class="lg:flex lg:flex-wrap align-center shadow rounded-2xl relative">
                        <article class="w-full content-slide text-left p-4 lg:p-8 rounded-2xl absolute">
                                <<?= $slide['label']; ?> class="text-lg font-bold m-0 dark:text-white text-center"><?= $slide['title'] ?></<?= $slide['label']; ?>>
                                <p class="text-base m-0 text-white">
                                <?=$slide['content']?>
                                </p>
                        </article>
                        <?= wp_get_attachment_image($slide['slide_img'], 'full', false, ['class' => 'w-full h-full object-cover self-center rounded-2xl']); ?>
=======
                    <div class="lg:flex lg:flex-wrap align-center shadow rounded-2xl">
                        <?= wp_get_attachment_image($slide['slide_img'], 'thumb', false, array('class' => 'w-12 h-12 transition ease-in-out hover:scale-110 duration-400 self-center')); ?>
                        <div class="w-full content-slide text-left p-4 lg:p-8 bg-white rounded-2xl relative">
                            <<?= $slide['label']; ?> class="text-lg font-bold m-0 dark:text-white text-center"><?= $slide['title'] ?></<?= $slide['label']; ?>>
                            <p class="text-base m-0 text-white">
                            <?=$slide['content']?>
                            </p>
                        </div>
>>>>>>> fc4a3998cf3ec3e021ac9b030fb6ed8b47293fcf
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>