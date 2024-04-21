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
 <div class="wrap flex flex-col gap-3">
    <?php if($title): ?><h2 class="font-bold text-xl"><?= $title;?></h2><?php endif; ?>
    <?php if($text): ?><p class="text-base"><?= $text; ?></p><?php endif; ?>
	<?php if($img): ?><img src="<?= esc_html_e($img['url']); ?>" alt="<?=$img['alt']?>" title="<?=$img['title']?>"><?php endif; ?>
	<div class="w-full"><?= $vid ?></div>
 </div>
  <?php 
        endif;
   endwhile;
endif;
?>