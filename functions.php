<?php
/**
 * Commune de Saint-Martin FR functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Commune_de_Saint-Martin_FR
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function saint_martin_fr_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Commune de Saint-Martin FR, use a find and replace
		* to change 'saint-martin-fr' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'saint-martin-fr', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

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
	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'saint-martin-fr'),
			'secondary' => __( 'Secondary Menu', 'saint-martin-fr' ),
		)
	);

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
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'saint_martin_fr_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'custom-logo' );

	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
	add_theme_support( 'custom-header', array(
		'width'                  => 2000,
		'height'                 => 700,
	) );

}
add_action( 'after_setup_theme', 'saint_martin_fr_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function saint_martin_fr_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'saint_martin_fr_content_width', 640 );
}
add_action( 'after_setup_theme', 'saint_martin_fr_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function saint_martin_fr_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Pied de page', 'saint-martin-fr' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Ajoutez les widget ici.', 'saint-martin-fr' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Liens rapides', 'saint-martin-fr' ),
			'id'            => 'liens-1',
			'description'   => esc_html__( 'Ajoutez les liens ici.', 'saint-martin-fr' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'requiredfoundation' ),
		'id' => 'sidebar-main',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
}
add_action( 'widgets_init', 'saint_martin_fr_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function saint_martin_fr_scripts() {
	wp_enqueue_style( 'saint-martin-fr-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'saint-martin-fr-style', 'rtl', 'replace' );

	wp_enqueue_script( 'saint-martin-fr-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'saint-martin-fr-masonry', get_template_directory_uri() . '/js/masonry.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'saint_martin_fr_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}




// function theme_customize_register( $wp_customize ) {
//     $wp_customize->add_section( 'header_images', array(
//         'title' => __( 'Header Images' ),
//         'priority' => 30,
//     ) );

//     $wp_customize->add_setting( 'header_image_desktop' , array(
//         'default' => '',
//         'transport' => 'refresh',
//     ) );

//     $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_image_desktop', array(
//         'label' => __( 'Header Image (Desktop)' ),
//         'section' => 'header_images',
//         'settings' => 'header_image_desktop',
//     ) ) );

//     $wp_customize->add_setting( 'header_image_mobile' , array(
//         'default' => '',
//         'transport' => 'refresh',
//     ) );

//     $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_image_mobile', array(
//         'label' => __( 'Header Image (Mobile)' ),
//         'section' => 'header_images',
//         'settings' => 'header_image_mobile',
//     ) ) );
// }
// add_action( 'customize_register', 'theme_customize_register' );