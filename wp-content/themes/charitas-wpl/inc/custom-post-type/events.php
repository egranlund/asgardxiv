<?php
/**
 * The default Custom post type for Events
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0
 */
?>
<?php

if (!function_exists('wpl_events_cpt')) {
	
	function wpl_events_cpt(){
		
		$url_rewrite = ot_get_option('wpl_events_url_rewrite');
		if( !$url_rewrite ) { $url_rewrite = 'event'; }

		$url_rewrite_name = ot_get_option('wpl_events_url_rewrite_name');
		if( !$url_rewrite_name ) { $url_rewrite_name = 'Event'; }

		register_post_type('post_events',
			array(
				'labels' => array(
					'name' => 'Events',
					'singular_name' => $url_rewrite_name,
					'add_new' => 'Add New Event',
					'add_new_item' => 'Add New Event',
					'edit' => 'Edit',
					'edit_item' => 'Edit Event',
					'new_item' => 'New Event',
					'view' => 'View',
					'view_item' => 'View Event',
					'search_items' => 'Search Events',
					'not_found' => 'No Events found',
					'not_found_in_trash' => 'No Events found in Trash',
					'parent' => 'Parent Event'
				),
				'description' => 'Easily lets you create some beautiful Events.',
				'public' => true,
				'show_ui' => true, 
				'_builtin' => false,
				'capability_type' => 'page',
				'hierarchical' => true,
				'rewrite' => array('slug' => $url_rewrite),
				//'menu_icon' => get_template_directory_uri() . '/images/event.png',
				'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
			)
		); 
		flush_rewrite_rules();
	}
	add_action('init', 'wpl_events_cpt');
}


/*-----------------------------------------------------------------------------------*/
/*	Adding category for Evenys
/*-----------------------------------------------------------------------------------*/

if (!function_exists('wpl_events_category')) {
	
	function wpl_events_category() {

		$url_rewrite = ot_get_option('wpl_events_category_url_rewrite');
		if( !$url_rewrite ) { $url_rewrite = 'events-category'; }

		register_taxonomy('wpl_events_category', 'post_events', 
			array( 
				'hierarchical' => true, 
				'labels' => array(
					  'name' => 'Categories',
					  'singular_name' => 'Department',
					  'search_items' =>  'Search in Category',
					  'popular_items' => 'Popular Categories',
					  'all_items' => 'All Categories',
					  'parent_item' => 'Parent Category',
					  'parent_item_colon' => 'Parent Category:',
					  'edit_item' => 'Edit Category',
					  'update_item' => 'Update Category',
					  'add_new_item' => 'Add New Category',
					  'new_item_name' => 'New Category Name'
				),
				'show_ui' => true,
				'query_var' => true, 
				'rewrite' => array('slug' => $url_rewrite)
			) 
		); 
		flush_rewrite_rules();
	}
	add_action('init', 'wpl_events_category');
}	