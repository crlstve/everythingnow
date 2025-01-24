<?php
/*******************************************************************************
 *  INCLUDES
 ******************************************************************************/
	// Escapa acceso directo
		if ( ! defined( 'ABSPATH' ) ) { exit;}
	// Carga requeridas
		require get_template_directory() . '/classes/class-now-svg-icons.php';
		require get_template_directory() . '/inc/svg-icons.php';
		require get_template_directory() . '/classes/class-now-script-loader.php';
	// Carga de páginas de opciones de ACF	
		if( function_exists('acf_add_options_page') ) {
			acf_add_options_page();
			acf_add_options_sub_page('General');
			acf_add_options_sub_page('Header');
			acf_add_options_sub_page('Footer');
			acf_add_options_sub_page('Home');
			acf_add_options_sub_page('Blog');
		}
/*******************************************************************************
 *  CARGA DE ESTILOS Y SCRIPTS
 ******************************************************************************/
	// Carga de css
		function now_register_styles() {
			wp_enqueue_style( 'style', get_stylesheet_uri(), array(), '1.0' ); // -> No css, just meta info
			//wp_enqueue_style('now-style', get_stylesheet_directory_uri() . '/assets/css/now-style.css', array(), '1.0');
			// TTAILWIND //
				$tailwind_test = get_field('tailwind_test','options');
				if($tailwind_test){
					wp_enqueue_script('tailwind','https://cdn.tailwindcss.com'); // development
				}else{
					wp_enqueue_style('tailwind', get_stylesheet_directory_uri() . '/assets/css/theme.css', array(), '3.4.3'); // production
					wp_script_add_data( 'tailwind', 'defer', true );
				}			
		}
		add_action( 'wp_enqueue_scripts', 'now_register_styles' );

			// Now css for editor
				/* Add backend styles for Gutenberg.
					function now_editor_assets() {
					// Load the theme styles within Gutenberg.
					wp_enqueue_style('now-editor-styles',get_stylesheet_directory_uri() . '/assets/css/theme.css',FALSE);
					}
					add_action('enqueue_block_editor_assets', 'now_editor_assets');*/

	// Carga js
		function now_register_scripts() {
			wp_enqueue_script( 'now-header', get_template_directory_uri() . '/assets/js/header-effect.js', array(), '1.0', false );
			wp_script_add_data( 'now-header', 'defer', true );
			wp_enqueue_script( 'dark-mode', get_template_directory_uri() . '/assets/js/dark-mode.js', array(), '1.0', false );
		}
		add_action( 'wp_enqueue_scripts', 'now_register_scripts' );

		function splidejs() {
			wp_enqueue_script( 'splidejs', get_template_directory_uri() . '/assets/js/splide.js',array(), '4.1.3');
			wp_enqueue_style('splidecss', get_template_directory_uri() . '/assets/css/splide.css', array(), '4.1.3');
		}
		add_action( 'wp_enqueue_scripts', 'splidejs' );

		function now_theme_support() {

					// Add default posts and comments RSS feed links to head.
					add_theme_support( 'automatic-feed-links' );

					// Custom background color.
					add_theme_support(
						'custom-background',
						array(
							'default-color' => 'ffffff',
						)
					);

					// Set content-width.
					global $content_width;
					if ( ! isset( $content_width ) ) {
						$content_width = 580;
					}

					/*
					* Enable support for Post Thumbnails on posts and pages.
					*
					* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
					*/
					add_theme_support( 'post-thumbnails' );

					// Set post thumbnail size.
					set_post_thumbnail_size( 1200, 9999 );

					// Add custom image size used in Cover Template.
					add_image_size( 'now-fullscreen', 1980, 9999 );

					// Custom logo.
					$logo_width  = 120;
					$logo_height = 90;

					// If the retina setting is active, double the recommended width and height.
					if ( get_theme_mod( 'retina_logo', false ) ) {
						$logo_width  = floor( $logo_width * 2 );
						$logo_height = floor( $logo_height * 2 );
					}

					add_theme_support(
						'custom-logo',
						array(
							'height'      => $logo_height,
							'width'       => $logo_width,
							'flex-height' => true,
							'flex-width'  => true,
						)
					);

					/*
					* Let WordPress manage the document title.
					* By adding theme support, we declare that this theme does not use a
					* hard-coded <title> tag in the document head, and expect WordPress to
					* provide it for us.
					*/
					add_theme_support( 'title-tag' );

					/*
					* Switch default core markup for search form, comment form, and comments
					* to output valid HTML5.
					*/
					add_theme_support(
						'html5',
						array(
							'search-form',
							'comment-form',
							'comment-list',
							'gallery',
							'caption',
							'script',
							'style',
							'navigation-widgets',
						)
					);

					/*
					* Make theme available for translation.
					* Translations can be filed in the /languages/ directory.
					* If you're building a theme based on now, use a find and replace
					* to change 'now' to the name of your theme in all the template files.
					*/
					//load_theme_textdomain( 'now' );
					// Localisation Support
					load_theme_textdomain('now', get_template_directory() . '/languages');

					// Add support for full and wide align images.
					add_theme_support( 'align-wide' );

					// Add support for responsive embeds.
					add_theme_support( 'responsive-embeds' );

					/*
					* Adds starter content to highlight the theme on fresh sites.
					* This is done conditionally to avoid loading the starter content on every
					* page load, as it is a one-off operation only needed once in the customizer.
					*/
					if ( is_customize_preview() ) {
						require get_template_directory() . '/inc/starter-content.php';
						add_theme_support( 'starter-content', now_get_starter_content() );
					}

					// Add theme support for selective refresh for widgets.
					add_theme_support( 'customize-selective-refresh-widgets' );

					/*
					* Adds `async` and `defer` support for scripts registered or enqueued
					* by the theme.*/
					
					$loader = new now_Script_Loader();
					add_filter( 'script_loader_tag', array( $loader, 'filter_script_loader_tag' ), 10, 2 );
			}
			add_action( 'after_setup_theme', 'now_theme_support' );

			function my_theme_textdomain(){
				load_theme_textdomain( 'now', get_template_directory() . '/languages' );
			}
			add_action( 'after_setup_theme', 'my_theme_textdomain' );



	
	
			// Now Blocks
		add_action('init', function () {
			$blocks = [
				'testimonial',
				'slider',
			];
			foreach ($blocks as $block) {
				register_block_type( __DIR__ . '/blocks/' . $block);
			}
		});
		add_action('wp_enqueue_scripts', function () {
			if (has_block('acf/testimonial')) {
				wp_enqueue_style('testimonial-style', get_template_directory_uri() . '/blocks/testimonial/style.css');
				wp_enqueue_script('testimonial-script', get_template_directory_uri() . '/blocks/testimonial/script.js', array(), '1.0');
			}
			if (has_block('acf/slider')) {
				wp_enqueue_style('slider-style', get_template_directory_uri() . '/blocks/slider/style.css');
				wp_enqueue_script('slider-script', get_template_directory_uri() . '/blocks/slider/script.js', array(), '1.0');
			}
		});
		/* Now ACF -> Deprecated
		add_action('acf/init', 'my_acf_blocks_init');
		function my_acf_blocks_init() {

			// Check function exists.
			if( function_exists('acf_register_block_type') ) {

				// Register a testimonial block.
				acf_register_block_type(array(
					'name'              => 'testimonial',
					'title'             => __('Testimonial'),
					'description'       => __('A custom testimonial block.'),
					'render_template'   => '/blocks/testimonial/testimonial.php',
					'category'          => 'formatting',
				));
			}
		} */


/*******************************************************************************
 *  PÁGINA DE OPCIONES
 ******************************************************************************/
		add_action( 'admin_menu', 'now_page_menu' );
		function now_page_menu(){
			add_menu_page(
				'Opciones', // page <title>Title</title>
				'Opciones', // link text
				'manage_options', // user capabilities
				'now-options', // menu slug
				'now_page_menu_callback', // this function prints the page content
				'dashicons-admin-generic', // icon (from Dashicons for example)
				4 // menu position
			);
		}
		
		function now_page_menu_callback(){
			echo '<div class="wrap">';
			echo '<h1>Opciones</h1>';
			echo '<form method="post" action="options.php">';
				settings_fields('now_options');
				do_settings_sections('now_options');
				submit_button();
		}



/*******************************************************************************
 *  CARGA DE ELEMENTOS
 ******************************************************************************/
	// Now Logo
		function now_logo($html) {
			$html = str_replace('custom-logo-link', 'w-full self-center', $html);
			$html = preg_replace('/(<img(.*?)class="([^"]*)")/', '$1 title="Everything Now" width="300" height="73" class="$3 w-24"', $html);
			return $html;
		}
		add_filter('get_custom_logo', 'now_logo');

	// Now Menu
		function now_menu() {
			$locations = array(
				'megamenu' => __('Mega Menu', 'now'),
				'mobile'   => __( 'Mobile Menu', 'now' ),
				'footer'   => __( 'Footer Menu', 'now' ),
				'social'   => __( 'Social Menu', 'now' ),
			);
			register_nav_menus( $locations );
		}
		add_action( 'init', 'now_menu' );

	// Now SVG
		function allow_svg_upload( $mimes ) {
			$mimes['svg'] = 'image/svg+xml';
			return $mimes;
		}
		add_filter( 'upload_mimes', 'allow_svg_upload' );

	// Now custom var_dump
		function now_var_dump($data) {
			// Verifica si el usuario actual es un administrador
			if (current_user_can('administrator')) {
				var_dump($data);
			}
		}

	// Now create footer widgets
		function now_footer_widets() {
			register_sidebar( array(
				'name'          => 'Footer 1',
				'id'            => 'footer_1',
				'before_widget' => '<div class="footer-content dark:text-white">',
				'after_widget'  => '</div>',
				'before_title'  => '<span data-class="footer-title" class="font-bold dark:text-white">',
				'after_title'   => '</span>',
			) );
			register_sidebar( array(
				'name'          => 'Footer 2',
				'id'            => 'footer_2',
				'before_widget' => '<div class="footer-content dark:text-white">',
				'after_widget'  => '</div>',
				'before_title'  => '<span data-class="footer-title" class="font-bold dark:text-white">',
				'after_title'   => '</span>',
			) );
			register_sidebar( array(
				'name'          => 'Footer 3',
				'id'            => 'footer_3',
				'before_widget' => '<div class="footer-content dark:text-white">',
				'after_widget'  => '</div>',
				'before_title'  => '<span data-class="footer-title" class="font-bold dark:text-white">',
				'after_title'   => '</span>',
			) );
			register_sidebar( array(
				'name'          => 'Footer 4',
				'id'            => 'footer_4',
				'before_widget' => '<div class="footer-content dark:text-white">',
				'after_widget'  => '</div>',
				'before_title'  => '<span data-class="footer-title" class="font-bold dark:text-white">',
				'after_title'   => '</span>',
			) );
				register_sidebar( array(
				'name'          => 'Footer Social Media',
				'id'            => 'footer_rrss',
				'before_widget' => '<div class="footer-content dark:text-white">',
				'after_widget'  => '</div>',
				'before_title'  => '<span data-class="footer-title" class="font-bold dark:text-white">',
				'after_title'   => '</span>',
			) );    

		}
	    add_action( 'widgets_init', 'now_footer_widets' );