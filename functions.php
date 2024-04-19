<?php
/**
 * now functions and definitions
 **/

require get_template_directory() . '/classes/class-now-svg-icons.php';
require get_template_directory() . '/classes/class-now-script-loader.php';

// Now css
	function now_register_styles() {
		wp_enqueue_style( 'style', get_stylesheet_uri(), array(), '1.0' );
		wp_enqueue_style('now-style', get_stylesheet_directory_uri() . '/assets/css/now-style.css', array(), '1.0');
		// TTAILWIND //
			// CDN -> wp_enqueue_script('tailwind','https://cdn.tailwindcss.com');
			wp_enqueue_style('tailwind', get_stylesheet_directory_uri() . '/assets/css/tailwind-min.css', array(), '3.3.2');
	}
	add_action( 'wp_enqueue_scripts', 'now_register_styles' );

// Now js
	function now_register_scripts() {
		/*wp_enqueue_script( 'now-js', get_template_directory_uri() . '/assets/js/index.js', array(), '1.0', false );
		wp_script_add_data( 'now-js', 'async', true );*/
	}
	add_action( 'wp_enqueue_scripts', 'now_register_scripts' );



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


// Now ACF -> Gutemberg
	add_action('acf/init', 'my_acf_blocks_init');
	function my_acf_blocks_init() {

	    // Check function exists.
	    if( function_exists('acf_register_block_type') ) {

	        // Register a testimonial block.
	        acf_register_block_type(array(
	            'name'              => 'testimonial',
	            'title'             => __('Testimonial'),
	            'description'       => __('A custom testimonial block.'),
	            'render_template'   => '/blocks/test.php',
	            'category'          => 'formatting',
	        ));
	    }
	}

// Now Logo
function now_logo($html) {
    $html = str_replace('custom-logo-link', 'w-full self-center', $html);
    $html = preg_replace('/(<img(.*?)class="([^"]*)")/', '$1 title="Everything Now" width="300" height="73" class="$3 w-24" style="aspect-ratio:300 / 73;"', $html);
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


// Now clean SVG
function sanitize_svg($svg) {
    $svg = str_replace(['<![CDATA[', ']]>'], '', $svg);
    return $svg;
}
add_filter('wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
    $filetype = wp_check_filetype( $filename, $mimes );
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4);
add_filter('wp_handle_upload_prefilter', function($file) {
    if($file['type'] === 'image/svg+xml') {
        $svg = file_get_contents($file['tmp_name']);
        $svg = sanitize_svg($svg);
        file_put_contents($file['tmp_name'], $svg);
    }
    return $file;
});

// Now custom var_dump
	function now_var_dump($data) {
	    // Verifica si el usuario actual es un administrador
	    if (current_user_can('administrator')) {
	        var_dump($data);
	    }
	}