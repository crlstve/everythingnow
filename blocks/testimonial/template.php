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
$cta = $testimonial['cta'];
?>
<section class="block-<?= $file_name; ?> wrap flex <?= ($side == 'left' ? 'flex-col-reverse md:flex-row' : 'flex-col-reverse md:flex-row-reverse'); ?> justify-between gap-3 lg:gap-12">
    <article class="w-full md:w-3/5 lg:w-3/4 self-center">
        <?php if ($title) : ?>
            <header><<?= $label; ?> class="font-semibold text-2xl md:text-3xl mb-2 bg-clip-text text-transparent bg-gradient-to-b from-[#afafaf] via-[white] to-[#374151]"><?= esc_html($title); ?></<?= $label; ?>></header>
        <?php endif; ?>
        <?php if ($text) : ?>
            <div class="md:ml-2 md:border-l md:pl-4"><p class="text-base dark:text-white "><?= $text; ?></p></div>
        <?php endif; ?>
        <?php if($bullets || $cta['cta_link'] ): ?>
            <div class="flex flex-col lg:flex-row">
                <?php if($bullets): ?>
                    <ul class="mt-4 flex flex-col gap-3 <?php if($cta['cta_link']): ?>lg:w-2/3<?php endif; ?>">
                        <?php foreach ($bullets as $bullet): ?>
                            <li class="flex flex-row gap-3" ><?= wp_get_attachment_image($bullet['bullet_icon'], 'thumb', true, array('class' => 'w-12 h-12 transition ease-in-out hover:scale-110 duration-400 self-center')); ?><p class="dark:text-white self-center"><?= $bullet['bullet_text']; ?></p></li>
                        <?php endforeach; ?>
                    </ul>
                <?php  endif;  ?>
                <?php if($cta['cta_link']): ?>
                    <div class="mt-4 flex lg:justify-center self-start lg:self-center">
                        <a href="<?= $cta['cta_link']; ?>"><button class="dark:text-black dark:bg-white rounded-full font-bold px-12 py-3"><?= $cta['cta_text']; ?></button></a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
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