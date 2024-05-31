<?php
// Check rows exists.
//if( have_rows('test_1') ):
// Loop through rows.
//while( have_rows('test_1') ) : the_row();
// Case: Paragraph layout.
// if( get_row_layout() == 'bloc_1' ):
// Load sub field value.
$text_img = get_field('text_img');
$side = $text_img['side'];
$title = $text_img['title_1'];
$text = $text_img['text_1'];
$img = $text_img['img_1'];
$vid = $text_img['vid_1'];
?>
<section class="wrap flex <?= ($side == 'left' ? 'flex-col-reverse md:flex-row' : 'flex-col-reverse md:flex-row-reverse'); ?> justify-center gap-3 lg:gap-12">
    <article class="w-full md:w-3/5 xl:w-5/12">
        <?php if ($title) : ?><h1 class="font-bold text-2xl md:text-3xl mb-4 md:mb-5 bg-clip-text text-transparent bg-gradient-to-b from-yellow-200 via-yellow-400 to-yellow-700"><?= esc_html($title); ?></h1><?php endif; ?>
        <?php if ($text) : ?><p class="text-base md:text-lg text-white"><?= esc_html($text); ?></p><?php endif; ?>
    </article>
    <?php if ($img || $vid) : ?>
        <div class="w-1/2 sm:w-1/3 md:w-2/5 lg:w-1/4 realtive rounded-full overflow-hidden aspect-square border-8 border-transparent  flex items-center justify-center">
            <?php if ($img) : ?>
                <?= wp_get_attachment_image($img, 'full', null, array('class' => 'object-cover w-full h-full transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-400')); ?>
            <?php elseif ($vid) : ?>
                <?= $vid ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</section>
<?php
//    endif;
//endwhile;
//endif;
?>