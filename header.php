<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class('dark:bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-gray-700 via-gray-900 to-black scroll-smooth'); ?>>
<?php wp_body_open(); ?>
<header id="now-header" class="sticky top-0">
	<div class="wrap z-50 py-3 flex flex-row justify-between">
		<div id="now-logo" class="w-20 h-8 flex flex-row">
			<?= (has_custom_logo()) ? the_custom_logo() : ''; ?>
		</div>
		<div id="mega-menu" class="self-center dark:text-white">
			<?php wp_nav_menu(); ?>
		</div>
	</div>
</header>