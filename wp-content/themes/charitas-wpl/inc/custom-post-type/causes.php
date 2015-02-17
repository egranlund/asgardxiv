<?php
/**
 * The default Custom post type for Causes
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0
 */
?>
<?php 
if (!function_exists('wpl_causes_cpt')) {
	function wpl_causes_cpt(){
		
		$url_rewrite = ot_get_option('wpl_causes_url_rewrite');
		if( !$url_rewrite ) { $url_rewrite = 'cause'; }

		$url_rewrite_name = ot_get_option('wpl_causes_url_rewrite_name');
		if( !$url_rewrite_name ) { $url_rewrite_name = 'Cause'; }

		register_post_type('post_causes',
			array(
				'labels' => array(
					'name' => 'Causes',
					'singular_name' => $url_rewrite_name,
					'add_new' => 'Add New Cause',
					'add_new_item' => 'Add New Cause',
					'edit' => 'Edit',
					'edit_item' => 'Edit Cause',
					'new_item' => 'New Cause',
					'view' => 'View',
					'view_item' => 'View Causes',
					'search_items' => 'Search Causes',
					'not_found' => 'No Causes found',
					'not_found_in_trash' => 'No Causes found in Trash',
					'parent' => 'Parent Cause'
				),
				'description' => 'Easily lets you create some beautiful Causes.',
				'public' => true,
				'show_ui' => true, 
				'_builtin' => false,
				'capability_type' => 'page',
				'hierarchical' => true,
				'rewrite' => array('slug' => $url_rewrite),
				'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
			)
		); 
		flush_rewrite_rules();
	}
	add_action('init', 'wpl_causes_cpt');
}

/*-----------------------------------------------------------------------------------*/
/*	Adding category for causes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('wpl_causes_category')) {
	function wpl_causes_category() {

		$url_rewrite = ot_get_option('wpl_causes_category_url_rewrite');
		if( !$url_rewrite ) { $url_rewrite = 'causes-category'; }

		register_taxonomy('wpl_causes_category', 'post_causes', 
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
	add_action('init', 'wpl_causes_category');
}