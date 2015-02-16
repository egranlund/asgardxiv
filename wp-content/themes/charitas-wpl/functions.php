<?php
/**
 * Charitas functions and definitions
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0
 */


/*-----------------------------------------------------------------------------------*/
/*	Content Width
/*-----------------------------------------------------------------------------------*/

if ( ! isset( $content_width ) )
	$content_width = 790; /* pixels */

/*-----------------------------------------------------------------------------------*/
/*	Include Option Tree
/*-----------------------------------------------------------------------------------*/

	/*-----------------------------------------------------------
		Optional: set 'ot_show_pages' filter to false.
		This will hide the settings & documentation pages.
	-----------------------------------------------------------*/

	add_filter( 'ot_show_pages', '__return_true' );


	/*-----------------------------------------------------------
		Optional: set 'ot_show_new_layout' filter to false.
		This will hide the "New Layout" section on the Theme Options page.
	-----------------------------------------------------------*/

	add_filter( 'ot_show_new_layout', '__return_false' );


	/*-----------------------------------------------------------
		Required: set 'ot_theme_mode' filter to true.
	-----------------------------------------------------------*/

	add_filter( 'ot_theme_mode', '__return_true' );


	/*-----------------------------------------------------------
		Required: include OptionTree.
	-----------------------------------------------------------*/

	include_once( get_template_directory() . '/option-tree/ot-loader.php' );
	include_once( get_template_directory() . '/inc/theme-options.php' );
	include_once( get_template_directory() . '/inc/custom-post-type/meta-boxes.php' );


/*-----------------------------------------------------------------------------------*/
/*	Theme setup
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'wplook_setup' ) ) :

function wplook_setup() {


	/*-----------------------------------------------------------
		Make theme available for translation
	-----------------------------------------------------------*/

	load_theme_textdomain( 'wplook', get_template_directory() . '/languages' );


	/*-----------------------------------------------------------
		Theme style for the visual editor
	-----------------------------------------------------------*/
	
	add_editor_style( 'css/editor-style.css' );

	/*-----------------------------------------------------------
		Add default posts and comments RSS feed links to head
	-----------------------------------------------------------*/
	
	add_theme_support( 'automatic-feed-links' );

	/*-----------------------------------------------------------
		Enable support for Post Thumbnails on posts and pages
	-----------------------------------------------------------*/
	
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'small-thumb', 272, 150, true );
	add_image_size( 'medium-thumb', 500, 277, true );
	add_image_size( 'big-thumb', 1200, 661, true );
	add_image_size( 'candidate-thumb', 225, 235, true );
	add_image_size( 'parallax-thumb', 1920, 714, true );
	add_image_size( 'publications-thumb', 200, 9999 );
	
	/*-----------------------------------------------------------
		Register menu
	-----------------------------------------------------------*/
	
	function register_my_menus() {
		register_nav_menus(
				array(
					'primary' => __( 'Main Menu', 'wplook' ),
					'language' => __( 'Language Menu', 'wplook' ),
				) 
		);
	}
		
	add_action( 'init', 'register_my_menus' );
	wp_create_nav_menu( 'Main Menu', array( 'slug' => 'primary' ) );
	wp_create_nav_menu( 'Language Menu', array( 'slug' => 'language' ) );
	
	/*-----------------------------------------------------------
		Enable support for Post Formats
	-----------------------------------------------------------*/
	
	add_theme_support( 'post-formats', array( 'gallery', 'video', 'status' ) );


	/*-----------------------------------------------------------
		Add theme Support Custom Background
	-----------------------------------------------------------*/
	
	add_theme_support( 'custom-background' );


	/*-----------------------------------------------------------
		Add theme Support  Custom Header
	-----------------------------------------------------------*/
	
	add_theme_support( 'custom-header' );

}
endif; // wplook_setup
add_action( 'after_setup_theme', 'wplook_setup' );



/*-----------------------------------------------------------------------------------*/
/*	Include Theme specific functionality
/*-----------------------------------------------------------------------------------*/

include_once( get_template_directory() . '/inc/widgets/widget-init.php' );				// Initiate all widgets
include_once( get_template_directory() . '/inc/headerdata.php' );						// Include header data
include_once( get_template_directory() . '/inc/library.php' );							// Include other functions
include_once( get_template_directory() . '/inc/custom-post-type/causes.php' );			// Include Post Type Causes
include_once( get_template_directory() . '/inc/custom-post-type/events.php' );			// Include Post Type Events
include_once( get_template_directory() . '/inc/custom-post-type/staff.php' );			// Include Post Type Staff
include_once( get_template_directory() . '/inc/custom-post-type/publications.php' );	// Include Post Type Publications
include_once( get_template_directory() . '/inc/custom-post-type/pledges.php' );			// Include Post Type Pledges
include_once( get_template_directory() . '/inc/custom-post-type/gallery.php' );			// Include Post Type Pledges
require_once (get_template_directory() . '/inc/' . 'comment.php');						// Comments


/*-----------------------------------------------------------------------------------*/
/*	Custom Background
/*-----------------------------------------------------------------------------------*/

$defaults = array(
	'default-color'          => 'ffffff',
	'default-image'          => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $defaults );


/*-----------------------------------------------------------
	Custom Header
-----------------------------------------------------------*/

$defaults = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => '1920',
	'height'                 => '636',
	'flex-height'            => true,
	'flex-width'             => true,
	'default-text-color'     => '',
	'header-text'            => false,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults );


/*-----------------------------------------------------------
	Add custom Colors to the theme
-----------------------------------------------------------*/

add_action( 'customize_register', 'hg_customize_register' );
function hg_customize_register($wp_customize) {
	$colors = array();
	$colors[] = array( 'slug'=>'wpl_link_color', 'default' => '#e53b51', 'label' => __( 'Link color', 'wplook' ) );
	$colors[] = array( 'slug'=>'wpl_hover_link_color', 'default' => '#c9253a', 'label' => __( 'Hover link color', 'wplook' ) );
	$colors[] = array( 'slug'=>'wpl_accent_color', 'default' => '#e53b51', 'label' => __( 'Accent Color', 'wplook' ) );
	$colors[] = array( 'slug'=>'wpl_toolbar_color', 'default' => '#000000', 'label' => __( 'Toolbar Color', 'wplook' ) );


	foreach($colors as $color) {
		// SETTINGS
		$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options' ));

		// CONTROLS
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'colors', 'settings' => $color['slug'] )));
	}
}
