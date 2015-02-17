<?php
/**
 * The default Custom post type for Sponsors
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0
 */
?>
<?php

if (!function_exists('wpl_sponsors_cpt')) {
	function wpl_sponsors_cpt(){
		
		$url_rewrite = ot_get_option('wpl_sponsors_url_rewrite');
		if( !$url_rewrite ) { $url_rewrite = 'sponsor'; }

		register_post_type('post_sponsor',
			array(
				'labels' => array(
					'name' => 'Sponsors',
					'singular_name' => 'Sponsor',
					'add_new' => 'Add New Sponsor',
					'add_new_item' => 'Add New Sponsor',
					'edit' => 'Edit',
					'edit_item' => 'Edit Sponsor',
					'new_item' => 'New Sponsor',
					'view' => 'View',
					'view_item' => 'View Sponsor',
					'search_items' => 'Search Sponsors',
					'not_found' => 'No Sponsors found',
					'not_found_in_trash' => 'No Sponsors found in Trash',
					'parent' => 'Parent Sponsor'
				),
				'description' => 'Easily lets you create some beautiful Sponsors.',
				'public' => true,
				'show_ui' => true, 
				'_builtin' => false,
				'capability_type' => 'page',
				'hierarchical' => true,
				'rewrite' => array('slug' => $url_rewrite),
				//'menu_icon' => get_template_directory_uri() . '/images/sponsor.png',
				'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
			)
		); 
		flush_rewrite_rules();
	}
	add_action('init', 'wpl_sponsors_cpt');
}	