<?php
// Check rows exists.
//if( have_rows('test') ):
// Loop through rows.
//while( have_rows('test') ) : the_row();
// Case: Paragraph layout.
// if( get_row_layout() == 'bloc' ):
// Load sub field value.
$file_name = basename(__FILE__, '.php');
$testimonial = get_field('testimonial');
$side = $testimonial['side'];
$label = $testimonial['label'];
$title = $testimonial['title'];
$text = $testimonial['text'];
$img = $testimonial['img'];
$vid = $testimonial['vid'];
$bullets = $testimonial['bullets'];
?>
<section class="<?= $file_name; ?> wrap flex <?= ($side == 'left' ? 'flex-col-reverse md:flex-row' : 'flex-col-reverse md:flex-row-reverse'); ?> justify-between gap-3 lg:gap-12">
    <article class="w-full md:w-3/5 lg:w-3/4 self-center">
        <?php if ($title) : ?><<?= $label; ?> class="font-bold text-2xl md:text-3xl mb-2 bg-clip-text text-transparent bg-gradient-to-b from-[#afafaf] via-[white] to-[#374151]"><?= esc_html($title); ?></<?= $label; ?>><?php endif; ?>
        <?php if ($text) : ?><p class="text-base text-white"><?= $text; ?></p><?php endif; ?>
    </article>
    <?php if ($img || $vid) : ?>
        <div class="w-1/2 sm:w-1/3 md:w-2/5 lg:w-1/4 realtive rounded-full overflow-hidden aspect-square border-8 border-transparent flex items-center justify-center self-center">
            <?php if ($img) : ?>
                <?= wp_get_attachment_image($img, 'full', null, array('class' => 'object-cover w-full h-full transition ease-in-out hover:scale-110 duration-400')); ?>
            <?php elseif ($vid) : ?>
                <?= $vid ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</section>