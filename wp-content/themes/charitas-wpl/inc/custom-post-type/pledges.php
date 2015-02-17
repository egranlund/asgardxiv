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

if (!function_exists('wpl_pledges_cpt')) {
	function wpl_pledges_cpt(){
		
		$url_rewrite = ot_get_option('wpl_pledges_url_rewrite');
		if( !$url_rewrite ) { $url_rewrite = 'pledges'; }

		register_post_type('post_pledges',
			array(
				'labels' => array(
					'name' => 'Pledges',
					'singular_name' => 'Pledge',
					'add_new' => 'Add New Pledge',
					'add_new_item' => 'Add New Pledge',
					'edit' => 'Edit',
					'edit_item' => 'Edit Pledge',
					'new_item' => 'New Pledge',
					'view' => 'View',
					'view_item' => 'View Pledges',
					'search_items' => 'Search Pledges',
					'not_found' => 'No Pledges found',
					'not_found_in_trash' => 'No Pledges found in Trash',
					'parent' => 'Parent Pledge'
				),
				'description' => 'Easily lets you create some beautiful Pledges.',
				'public' => false,
				'show_ui' => true, 
				'_builtin' => false,
				'capability_type' => 'page',
				'hierarchical' => true,
				'rewrite' => array('slug' => $url_rewrite),
				//'menu_icon' => get_template_directory_uri() . '/images/pledge.png',
				'supports' => array('title', 'thumbnail'),
			)
		); 
		flush_rewrite_rules();
	}
	add_action('init', 'wpl_pledges_cpt');
}	