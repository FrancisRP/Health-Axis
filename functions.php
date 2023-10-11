<?php
/**
 * hive-starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package hive-starter
 */

/**
 * Implement the Starter ACF Fields
 */
require get_template_directory() . '/inc/acf-starters.php';

/**
 * Load Hive Easy Tag
 */
require get_template_directory() . '/inc/hive-easy-tag.php';

/**
 * Grab schema ACF field and wp_head hook
 */
require get_template_directory() . '/inc/schema.php';

/**
 * Theme helper functions
 */
require get_template_directory() . '/inc/helpers.php';

/**
 * WordPress Options
 */
function hive_starter_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on hive-starter, use a find and replace
	 * to change 'hive-starter' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'hive-starter', get_template_directory() . '/languages' );


	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'hive-starter' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

}

add_action( 'after_setup_theme', 'hive_starter_setup' );

/**
 * Header Clean Up.
 */
function hive_cleanup_head() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'wp_shortlink_wp_head');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'parent_post_rel_link', 10);
	remove_action('wp_head', 'start_post_rel_link', 10);
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
	remove_action('wp_head', 'print_emoji_detection_script', 7 );
	remove_action('admin_print_scripts', 'print_emoji_detection_script' );
	remove_action('wp_print_styles', 'print_emoji_styles' );
	remove_action('admin_print_styles', 'print_emoji_styles' );
}

add_action('after_setup_theme', 'hive_cleanup_head');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hive_starter_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'hive-starter' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'hive-starter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'hive_starter_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function hive_starter_scripts() {

	//remote vendor scripts CDNs
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

	// Font Awesome 5 (uncomment to enable)
	wp_enqueue_script('fontawesome',  'https://kit.fontawesome.com/7606573c7c.js');

	if ( WP_DEV == true ) {

		// Dev full CSS
		wp_enqueue_style( 'hive-starter-style', get_template_directory_uri() . '/css/style.css', array(), '1.0' );

		// Dev full JS
		wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), null);

	} else {

		// Minified CSS
		wp_enqueue_style( 'hive-starter-style', get_template_directory_uri() . '/css/style.min.css', array(), '1.0' );

		// Minified JS
		wp_enqueue_script('main-js', get_template_directory_uri() . '/js/dist/main.min.js', array('jquery'), null);

	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}

add_action( 'wp_enqueue_scripts', 'hive_starter_scripts' );

/**
 * Add ACF site settings page
 */
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Site Settings',
		'menu_title'	=> 'Site Settings',
		'menu_slug' 	=> 'site-settings',
		'capability'	=> 'edit_posts',
		'position' 	    => '2.1',
		'redirect'		=> false
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Theme Options',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-options',
		'capability'	=> 'edit_posts',
		'position' 	    => '2.2',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'site-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'site-settings',
	));

}

// Define custom image sizes
if (function_exists('add_image_size')) {

	add_image_size('post-featured-image', 1200, 500, true);

	add_image_size('alternating-image', 940, 740, true);

}

// Allow custom image sizes to be selected in Beaver Builder
add_filter( 'image_size_names_choose', 'custom_image_sizes' );

function custom_image_sizes( $sizes ) {

  global $_wp_additional_image_sizes;
  if (empty($_wp_additional_image_sizes)) {
    return $sizes;
  }
  foreach ($_wp_additional_image_sizes as $id => $data) {
    if (!isset($sizes[$id])) {
      $sizes[$id] = ucfirst(str_replace('-', ' ', $id));
    }
  }
  return $sizes;

}

// Add theme support for Beaver Themer header/footer layouts
add_action( 'after_setup_theme', 'hive_header_footer_support' );

function hive_header_footer_support() {
  add_theme_support( 'fl-theme-builder-headers' );
  add_theme_support( 'fl-theme-builder-footers' );
  add_theme_support( 'fl-theme-builder-parts' );
}

function output_social_icons() {

	ob_start();

	echo '<div class="social-links">';

	while (have_rows('social_icons', 'options')): the_row();

		$icon = get_sub_field('icon');
		$icon_url = get_sub_field('icon_url');

		echo '<a href="'.$icon_url.'" target="_blank">'.$icon.'</a>';

	endwhile;

	echo '</div>';

	return ob_get_clean();

}

add_shortcode("social-links", "output_social_icons" );
