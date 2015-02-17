<?php 
/**
 * Register widget areas.
 *
 * @package WPlook
 * @subpackage Charitas
 * @since Charitas 1.0
 */


/*-----------------------------------------------------------
	Include Widgets
-----------------------------------------------------------*/
get_template_part( '/inc/widgets/widget', 'featurednews' );
get_template_part( '/inc/widgets/widget', 'events' );
get_template_part( '/inc/widgets/widget', 'causes' );
get_template_part( '/inc/widgets/widget', 'staff' );
get_template_part( '/inc/widgets/widget', 'quote' );
get_template_part( '/inc/widgets/widget', 'address' );
get_template_part( '/inc/widgets/widget', 'posts' );
get_template_part( '/inc/widgets/widget', 'progress-bar' );
get_template_part( '/inc/widgets/widget', 'flickr' );
get_template_part( '/inc/widgets/widget', 'social' );

function wplook_widgets_init() {

	/*-----------------------------------------------------------
		Home page Widget area
	-----------------------------------------------------------*/
	
	register_sidebar( array(
		'name' => __( 'First Home Page Widget area', 'wplook' ),
		'id' => 'front-1',
		'description' => __('Widgets in this area will be shown only on the Home Page Template.','wplook' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3><div class="clear"></div></div>'
	) );

	register_sidebar( array(
		'name' => __( 'Second Home Page Widget area', 'wplook' ),
		'id' => 'front-2',
		'description' => __('Widgets in this area will be shown only on the Home Page Template.','wplook' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3><div class="clear"></div></div>'
	) );

	register_sidebar( array(
		'name' => __( 'Third Home Page Widget area', 'wplook' ),
		'id' => 'front-3',
		'description' => __('Widgets in this area will be shown only on the Home Page Template.','wplook' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3><div class="clear"></div></div>'
	) );

	register_sidebar( array(
		'name' => __( 'Forth Home Page Widget area', 'wplook' ),
		'id' => 'front-4',
		'description' => __('Widgets in this area will be shown only on the Home Page Template.','wplook' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3><div class="clear"></div></div>'
	) );

	register_sidebar( array(
		'name' => __( 'Fifth Home Page Widget area', 'wplook' ),
		'id' => 'front-5',
		'description' => __('Widgets in this area will be shown only on the Home Page Template.','wplook' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3><div class="clear"></div></div>'
	) );



	/*-----------------------------------------------------------
		Pages widget area
	-----------------------------------------------------------*/
	
	register_sidebar( array(
		'name' => __( 'Page Widget area', 'wplook' ),
		'id' => 'page-1',
		'description' => __('Widgets in this area will be shown on All Pages.','wplook' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3><div class="clear"></div></div>'
	) );
	

	/*-----------------------------------------------------------
		Posts Widget area
	-----------------------------------------------------------*/
	
	register_sidebar( array(
		'name' => __( 'Press/Blog Widget area', 'wplook' ),
		'id' => 'post-1',
		'description' => __('Widgets in this area will be shown on All Posts.','wplook' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3><div class="clear"></div></div>'
	) );


	/*-----------------------------------------------------------
		Causes Widget area
	-----------------------------------------------------------*/
	
	register_sidebar( array(
		'name' => __( 'Causes Widget area', 'wplook' ),
		'id' => 'cause-1',
		'description' => __('Widgets in this area will be shown on All Causes.','wplook' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3><div class="clear"></div></div>'
	) );


	/*-----------------------------------------------------------
		Event widget area
	-----------------------------------------------------------*/
	
	register_sidebar( array(
		'name' => __( 'Event Widget area', 'wplook' ),
		'id' => 'event-1',
		'description' => __('Widgets in this area will be shown on All Events.','wplook' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3><div class="clear"></div></div>'
	) );


	/*-----------------------------------------------------------
		Staff widget area
	-----------------------------------------------------------*/
	
	register_sidebar( array(
		'name' => __( 'Staff Widget area', 'wplook' ),
		'id' => 'staff-1',
		'description' => __('Widgets in this area will be shown on All Staff.','wplook' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3><div class="clear"></div></div>'
	) );


	/*-----------------------------------------------------------
		Publications Widget area
	-----------------------------------------------------------*/
	
	register_sidebar( array(
		'name' => __( 'Publications Widget area', 'wplook' ),
		'id' => 'publication-1',
		'description' => __('Widgets in this area will be shown on all Publications.','wplook' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3><div class="clear"></div></div>'
	) );


	/*-----------------------------------------------------------
		Gallerry Widget area
	-----------------------------------------------------------*/
	
	register_sidebar( array(
		'name' => __( 'Gallery Widget area', 'wplook' ),
		'id' => 'gallery-1',
		'description' => __('Widgets in this area will be shown on all Gallery pages.','wplook' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3><div class="clear"></div></div>'
	) );
	

	/*-----------------------------------------------------------
		Contact page Widget area
	-----------------------------------------------------------*/
	
	register_sidebar( array(
		'name' => __( 'Contact Page Widget area', 'wplook' ),
		'id' => 'contact-1',
		'description' => __('Widgets in this area will be shown on Contact Pages.','wplook' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3><div class="clear"></div></div>'
	) );

	

	/*-----------------------------------------------------------
		Footer Widget area
	-----------------------------------------------------------*/

	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'wplook' ),
		'id' => 'f1-widgets',
		'description' => __( 'The first footer widget area', 'wplook' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	) );


	register_sidebar( array(
		'name' => __( 'Scond Footer Widget Area', 'wplook' ),
		'id' => 'f2-widgets',
		'description' => __( 'The second footer widget area', 'wplook' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	) );


	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'wplook' ),
		'id' => 'f3-widgets',
		'description' => __( 'The Third footer widget area', 'wplook' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	) );

	register_sidebar( array(
		'name' => __( 'Forth Footer Widget Area', 'wplook' ),
		'id' => 'f4-widgets',
		'description' => __( 'The Forth footer widget area', 'wplook' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	) );
}
/** Register sidebars */
add_action( 'widgets_init', 'wplook_widgets_init' );
?>