<?php
/**
 * The default Custom post type for Publications
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0.4
 */
?>
<?php
if (!function_exists('wpl_publications_cpt')) {
	function wpl_publications_cpt(){
		
		$url_rewrite = ot_get_option('wpl_publication_url_rewrite');
		if( !$url_rewrite ) { $url_rewrite = 'publication'; }

		$url_rewrite_name = ot_get_option('wpl_publications_url_rewrite_name');
		if( !$url_rewrite_name ) { $url_rewrite_name = 'Publication'; }

		register_post_type('post_publications',
			array(
				'labels' => array(
					'name' => 'Publications',
					'singular_name' => $url_rewrite_name,
					'add_new' => 'Add New Publication',
					'add_new_item' => 'Add New Publication',
					'edit' => 'Edit',
					'edit_item' => 'Edit Publication',
					'new_item' => 'New Publication',
					'view' => 'View',
					'view_item' => 'View Publication',
					'search_items' => 'Search Publications',
					'not_found' => 'No Publications found',
					'not_found_in_trash' => 'No Publications found in Trash',
					'parent' => 'Parent Publication'
				),
				'description' => 'Easily lets you create some beautiful Publications.',
				'public' => true,
				'show_ui' => true, 
				'_builtin' => false,
				'capability_type' => 'page',
				'hierarchical' => true,
				'rewrite' => array('slug' => $url_rewrite),
				//'menu_icon' => get_template_directory_uri() . '/images/publications.png',
				'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
			)
		); 
		flush_rewrite_rules();
	}
	add_action('init', 'wpl_publications_cpt');
}	


/*-----------------------------------------------------------------------------------*/
/*	Adding category for Publications
/*-----------------------------------------------------------------------------------*/

if (!function_exists('wpl_publications_category')) {
	function wpl_publications_category() {

		$url_rewrite = ot_get_option('wpl_publications_category_url_rewrite');
		if( !$url_rewrite ) { $url_rewrite = 'publications-category'; }

		register_taxonomy('wpl_publications_category', 'post_publications', 
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
	add_action('init', 'wpl_publications_category');
}