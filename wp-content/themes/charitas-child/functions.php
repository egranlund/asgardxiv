<?php
/**
 * Charitas Child functions and definitions
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0
 */

/*-----------------------------------------------------------
	Remove Admin Toolbar
------------------------------------------------------------*/
add_filter( 'show_admin_bar', '__return_false' );

/*-----------------------------------------------------------
	Remove Menus From Admin Toolbar
------------------------------------------------------------*/
//add_action( 'admin_init', 'my_remove_menu_pages' );

//function my_remove_menu_pages() {
//	remove_menu_page( 'edit.php?post_type=post_events' );
//	remove_menu_page( 'edit.php?post_type=post_gallery' );
//}