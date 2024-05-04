<?php get_header(); ?>

<main class="wrap my-12 md:my-20">
<?php //bloginfo( 'name' ); ?>
<?php //bloginfo( 'description' ); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php //the_title(); ?>

<?php the_content(); ?>

<?php wp_link_pages(); ?>

<?php edit_post_link(); ?>

<?php endwhile; ?>

<?php
if ( get_next_posts_link() ) {
next_posts_link();
}
?>
<?php
if ( get_previous_posts_link() ) {
previous_posts_link();
}
?>

<?php else: ?>

<p><?php _e('No hay post','now'); ?></p>

<?php endif; ?>

</main>
<?php get_footer(); ?>