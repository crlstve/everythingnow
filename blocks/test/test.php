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
    <section class="wrap flex flex-col <?= ($side=='left' ? 'lg:flex-row' : 'lg:flex-row-reverse'); ?> gap-6 justify-between">
        <article class="w-full lg:w-1/2">
            <?php if($title): ?><h1 class="font-bold text-3xl mb-8"><?= esc_html($title); ?></h1><?php endif; ?>
            <?php if($text): ?><p class="text-base"><?= esc_html($text); ?></p><?php endif; ?>
        </article>
        <?php if($img || $vid):?>
        	<div class="w-full lg:w-1/2">
                <?php if($img): ?>
                    <?= wp_get_attachment_image($img, 'full',null, array('class'=>'rounded-2xl')); ?>
                <?php elseif($vid): ?>
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