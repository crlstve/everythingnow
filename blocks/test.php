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
	<h2 class="font-bold text-xl"><?php if($title){ echo $title; }?></h2>
	<p class="text-base"><?php if($text){ echo $text; }?></p>
	<?php if($img): ?>
	<img src="<?php echo esc_url($img['url']); ?>" alt="<?=$img['alt']?>" title="<?=$img['title']?>">
	<?php endif; ?>
	<div class="w-full"><?= $vid ?></div>
 </div>
  <?php 
        endif;
   endwhile;
endif;
?>