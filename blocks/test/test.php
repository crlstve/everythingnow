<?php
// Check rows exists.
if( have_rows('test_1') ):
    // Loop through rows.
    while( have_rows('test_1') ) : the_row();
        // Case: Paragraph layout.
        if( get_row_layout() == 'bloc_1' ):
            // Load sub field value.
            $title = get_sub_field('title_1');
            $text = get_sub_field('text_1'); 
            $img = get_sub_field('img_1');
            $vid = get_sub_field('vid_1');
?>
    <div class="wrap flex flex-col md:flex-row gap-3 my-16 md:my-24">
        <div class="w-full md:w-1/2">
            <?php if($title): ?><h2 class="font-bold text-xl"><?= esc_html($title); ?></h2><?php endif; ?>
            <?php if($text): ?><p class="text-base"><?= esc_html($text); ?></p><?php endif; ?>
        </div>
        <?php if($img || $vid):?>
        	<div class="w-full md:w-1/2">
                <?php if($img): ?>
                    <img hieght="600" width="800" src="<?= esc_url($img['url']); ?>" alt="<?= esc_attr($img['alt']); ?>" title="<?= esc_attr($img['title']); ?>">
                <?php elseif($vid): ?>
                    <?= $vid ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
  <?php 
        endif;
   endwhile;
endif;
?>