<?php
$file_name = basename(__DIR__);
$testimonial = get_field('testimonial');
$side = $testimonial['side'];
$label = $testimonial['label'];
$title = $testimonial['title'];
$text = $testimonial['text'];
$img = $testimonial['img'];
$vid = $testimonial['vid'];
$bullets = $testimonial['bullets'];
?>
<section class="block-<?= $file_name; ?> wrap flex <?= ($side == 'left' ? 'flex-col-reverse md:flex-row' : 'flex-col-reverse md:flex-row-reverse'); ?> justify-between gap-3 lg:gap-12">
    <article class="w-full md:w-3/5 lg:w-3/4 self-center">
        <?php if ($title) : ?>
            <header><<?= $label; ?> class="font-semibold text-2xl md:text-3xl mb-2 bg-clip-text text-transparent bg-gradient-to-b from-[#afafaf] via-[white] to-[#374151]"><?= esc_html($title); ?></<?= $label; ?>></header>
        <?php endif; ?>
        <div class="md:ml-2 md:border-l md:pl-4">
            <?php if ($text) : ?><p class="text-base text-white "><?= $text; ?></p><?php endif; ?>
        </div>
        <?php if($bullets): ?>
            <ul class="mt-4 flex flex-col gap-3">
                <?php foreach ($bullets as $bullet): ?>
                    <li class="flex flex-row gap-3" ><?= wp_get_attachment_image($bullet['bullet_icon'], 'thumb', true, array('class' => 'w-12 h-12 transition ease-in-out hover:scale-110 duration-400 self-center')); ?><p class="text-white self-center"><?= $bullet['bullet_text']; ?></p></li>
                <?php endforeach; ?>
            </ul>
        <?php  endif;  ?>
    </article>
    <?php if ($img || $vid) : ?>
        <div class="w-1/2 sm:w-1/3 md:w-2/5 lg:w-1/4 realtive rounded-full overflow-hidden aspect-square border-8 border-transparent flex items-center justify-center self-center">
            <?php if ($img) : ?>
                <?= wp_get_attachment_image($img, 'full', false, array('class' => 'object-cover w-full h-full transition ease-in-out hover:scale-110 duration-400')); ?>
            <?php elseif ($vid) : ?>
                <?= $vid ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</section>