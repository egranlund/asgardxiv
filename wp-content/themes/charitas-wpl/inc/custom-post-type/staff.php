<?php
/**
 * The default Custom post type for Staff
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0
 */
?>
<?php

if (!function_exists('wpl_staff_cpt')) {
	function wpl_staff_cpt(){
		
		$url_rewrite = ot_get_option('wpl_staff_url_rewrite');
		if( !$url_rewrite ) { $url_rewrite = 'staff'; }

		$url_rewrite_name = ot_get_option('wpl_staff_url_rewrite_name');
		if( !$url_rewrite_name ) { $url_rewrite_name = 'Staff'; }

		register_post_type('post_staff',
			array(
				'labels' => array(
					'name' => 'Staff',
					'singular_name' => $url_rewrite_name,
					'add_new' => 'Add New Candidate',
					'add_new_item' => 'Add New Candidate',
					'edit' => 'Edit',
					'edit_item' => 'Edit Candidate',
					'new_item' => 'New Candidate',
					'view' => 'View',
					'view_item' => 'View Candidate',
					'search_items' => 'Search for Candidates',
					'not_found' => 'No Candidates found',
					'not_found_in_trash' => 'No Candidates found in Trash',
					'parent' => 'Parent Candidate'
				),
				'description' => 'Easily lets you create some beautiful Staff.',
				'public' => true,
				'show_ui' => true, 
				'_builtin' => false,
				'capability_type' => 'page',
				'hierarchical' => true,
				'rewrite' => array('slug' => $url_rewrite),
				//'menu_icon' => get_template_directory_uri() . '/images/staff.png',
				'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
			)
		); 
		flush_rewrite_rules();
	}
	add_action('init', 'wpl_staff_cpt');
}

/*-----------------------------------------------------------------------------------*/
/*	Adding category for Staff
/*-----------------------------------------------------------------------------------*/

if (!function_exists('wpl_staff_category')) {
	function wpl_staff_category() {

		$url_rewrite = ot_get_option('wpl_staff_category_url_rewrite');
		if( !$url_rewrite ) { $url_rewrite = 'staff-items'; }

		register_taxonomy('wpl_staff_category', 'post_staff', 
			array( 
				'hierarchical' => true, 
				'labels' => array(
					  'name' => 'Departaments',
					  'singular_name' => 'Department',
					  'search_items' =>  'Search in Department',
					  'popular_items' => 'Popular Departments',
					  'all_items' => 'All Departments',
					  'parent_item' => 'Parent Department',
					  'parent_item_colon' => 'Parent Department:',
					  'edit_item' => 'Edit Department',
					  'update_item' => 'Update Department',
					  'add_new_item' => 'Add New Department',
					  'new_item_name' => 'New Department Name'
				),
				'show_ui' => true,
				'query_var' => true, 
				'rewrite' => array('slug' => $url_rewrite)
			) 
		); 
		flush_rewrite_rules();
	}
	add_action('init', 'wpl_staff_category');
}