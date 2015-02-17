<?php
/**
 * The default Custom post type for Galleries
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0.7
 */
?>
<?php

if (!function_exists('wpl_gallery_cpt')) {
	
	function wpl_gallery_cpt(){
		
		$url_rewrite = ot_get_option('wpl_gallery_url_rewrite');
		if( !$url_rewrite ) { $url_rewrite = 'gallery'; }

		$url_rewrite_name = ot_get_option('wpl_gallery_url_rewrite_name');
		if( !$url_rewrite_name ) { $url_rewrite_name = 'Gallery'; }

		register_post_type('post_gallery',
			array(
				'labels' => array(
					'name' => 'Galleries',
					'singular_name' => $url_rewrite_name,
					'add_new' => 'Add New Gallery',
					'add_new_item' => 'Add New Gallery',
					'edit' => 'Edit',
					'edit_item' => 'Edit Gallery',
					'new_item' => 'New Gallery',
					'view' => 'View',
					'view_item' => 'View Gallery',
					'search_items' => 'Search Galleries',
					'not_found' => 'No Galleries found',
					'not_found_in_trash' => 'No Galleries found in Trash',
					'parent' => 'Parent Gallery'
				),
				'description' => 'Easily lets you create some beautiful Galleries.',
				'public' => true,
				'show_ui' => true, 
				'_builtin' => false,
				'capability_type' => 'page',
				'hierarchical' => true,
				'rewrite' => array('slug' => $url_rewrite),
				//'menu_icon' => get_template_directory_uri() . '/images/gallery.png',
				'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
			)
		); 
		flush_rewrite_rules();
	}
	add_action('init', 'wpl_gallery_cpt');
}


/*-----------------------------------------------------------------------------------*/
/*	Adding category for Galleries
/*-----------------------------------------------------------------------------------*/

if (!function_exists('wpl_gallery_category')) {
	
	function wpl_gallery_category() {

		$url_rewrite = ot_get_option('wpl_gallery_category_url_rewrite');
		if( !$url_rewrite ) { $url_rewrite = 'gallery-category'; }

		register_taxonomy('wpl_gallery_category', 'post_gallery', 
			array( 
				'hierarchical' => true, 
				'labels' => array(
					  'name' => 'Categories',
					  'singular_name' => 'Category',
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
	add_action('init', 'wpl_gallery_category');
}	