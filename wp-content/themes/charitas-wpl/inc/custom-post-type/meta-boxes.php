<?php
/**
 * The default Meta Box Settings
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0
 */



/*-----------------------------------------------------------------------------------*/
/*	Initialize the meta boxes. 
/*-----------------------------------------------------------------------------------*/

add_action( 'admin_init', 'wpl_meta_boxes' );

function wpl_meta_boxes() {

	
	/*-----------------------------------------------------------
		Custom meta box for pages
	-----------------------------------------------------------*/
	
	$page_meta_box = array(
		'id'          => 'page_meta_box',
		'title'       => 'Page Options',
		'desc'        => '',
		'pages'       => array( 'page' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'label'       => 'Header image',
				'id'          => 'wpl_parallax_image',
				'type'        => 'upload',
				'desc'        => 'The image will display upper the content, the required dimensions:  (1920x714px)',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => ''
			),
			array(
				'label'       => 'Sidebar Option',
				'id'          => 'wpl_sidebar_option',
				'type'        => 'select',
				'desc'        => 'Display or hide the sidebar on this page', 
				'choices'     => array(
					array(
						'label'       => 'Display',
						'value'       => 'display'
					),
					array(
						'label'       => 'Hide',
						'value'       => 'hide'
					),
				),        
				'std'         => 'Default Layout',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			)
		)
	);
	ot_register_meta_box( $page_meta_box );


	/*-----------------------------------------------------------
		Custom meta box for Publications
	-----------------------------------------------------------*/
	
	$publications_meta_box = array(
		'id'          => 'publications_meta_box',
		'title'       => 'Page Options',
		'desc'        => '',
		'pages'       => array( 'post_publications' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'label'       => 'Header image',
				'id'          => 'wpl_parallax_image',
				'type'        => 'upload',
				'desc'        => 'The image will display upper the content, the required dimensions:  (1920x714px)',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => ''
			),

			array(
				'label'       => 'Publication File',
				'id'          => 'wpl_publication_file',
				'type'        => 'upload',
				'desc'        => 'Upload the file. (The file must have the .pdf extension.)',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => ''
			),

			array(
				'label'       => 'File size',
				'id'          => 'wpl_publication_file_size',
				'type'        => 'text',
				'desc'        => 'The file size. (For ex: 1.45MB)',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => ''
			),

			array(
				'label'       => 'Display Share Buttons',
				'id'          => 'wpl_share_buttons_publication',
				'type'        => 'select',
				'desc'        => 'Activate or deactivate Share Buttons', 
				'choices'     => array(
					array(
						'label'       => 'Display',
						'value'       => 'display'
					),
					array(
						'label'       => 'Hide',
						'value'       => 'hide'
					),
				),        
				'std'         => 'activate',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),

		)
	);
	ot_register_meta_box( $publications_meta_box );


	/*-----------------------------------------------------------
  		Custom meta box for posts
  	-----------------------------------------------------------*/

	$blog_meta_box = array(
		'id'          => 'blog_meta_box',
		'title'       => 'Post Options',
		'desc'        => '',
		'pages'       => array( 'post' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(  
			array(
				'label'       => 'Header image',
				'id'          => 'wpl_parallax_image',
				'type'        => 'upload',
				'desc'        => 'The image will display upper the content, the required dimensions:  (1920x714px)',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => ''
			),
			array(
				'label'       => 'Display Share Buttons',
				'id'          => 'wpl_share_buttons',
				'type'        => 'select',
				'desc'        => 'Activate or deactivate Share Buttons', 
				'choices'     => array(
					array(
						'label'       => 'Display',
						'value'       => 'display'
					),
					array(
						'label'       => 'Hide',
						'value'       => 'hide'
					),
				),        
				'std'         => 'activate',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
		)
	);
	ot_register_meta_box( $blog_meta_box );


	/*-----------------------------------------------------------
  		Causes
  	-----------------------------------------------------------*/

	$causes_meta_box = array(
		'id'          => 'causes_meta_box',
		'title'       => 'Cause Options',
		'desc'        => '',
		'pages'       => array( 'post_causes' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(  
			array(
				'label'       => 'Header image',
				'id'          => 'wpl_parallax_image',
				'type'        => 'upload',
				'desc'        => 'The image will display upper the content, the required dimensions:  (1920x714px)',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => ''
			),
			array(
				'label'       => 'Goal Amount',
				'id'          => 'wpl_goal_amount',
				'type'        => 'text',
				'desc'        => 'The amount that should be accumulated for this cause',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => ''
			),
			array(
				'label'       => 'Display Share Buttons',
				'id'          => 'wpl_share_buttons_cause',
				'type'        => 'select',
				'desc'        => 'Activate or deactivate Share Buttons', 
				'choices'     => array(
					array(
						'label'       => 'Display',
						'value'       => 'display'
					),
					array(
						'label'       => 'Hide',
						'value'       => 'hide'
					),
				),        
				'std'         => 'activate',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
		)
	);
	ot_register_meta_box( $causes_meta_box );


	/*-----------------------------------------------------------
  		Gallery
  	-----------------------------------------------------------*/

	$gallery_meta_box = array(
		'id'          => 'gallery_meta_box',
		'title'       => 'Gallery Options',
		'desc'        => '',
		'pages'       => array( 'post_gallery' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(  
			array(
				'label'       => 'Header image',
				'id'          => 'wpl_parallax_image',
				'type'        => 'upload',
				'desc'        => 'The image will display upper the content, the required dimensions:  (1920x714px)',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => ''
			),

			array(
				'label'       => 'Sidebar Option',
				'id'          => 'wpl_sidebar_option',
				'type'        => 'select',
				'desc'        => 'Display or hide the sidebar on this page', 
				'choices'     => array(
					array(
						'label'       => 'Display',
						'value'       => 'display'
					),
					array(
						'label'       => 'Hide',
						'value'       => 'hide'
					),
				),        
				'std'         => 'Default Layout',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			
			array(
				'label'       => 'Display Share Buttons',
				'id'          => 'wpl_share_buttons_gallery',
				'type'        => 'select',
				'desc'        => 'Activate or deactivate Share Buttons', 
				'choices'     => array(
					array(
						'label'       => 'Display',
						'value'       => 'display'
					),
					array(
						'label'       => 'Hide',
						'value'       => 'hide'
					),
				),        
				'std'         => 'activate',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
		)
	);
	ot_register_meta_box( $gallery_meta_box );


	/*-----------------------------------------------------------
  		Pledges
  	-----------------------------------------------------------*/

	$pledges_meta_box = array(
		'id'          => 'pledges_meta_box',
		'title'       => 'Cause Options',
		'desc'        => '',
		'pages'       => array( 'post_pledges' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(  
			array(
				'label'       => 'Chose the cause',
				'id'          => 'wpl_pledge_cause',
				'type'        => 'custom-post-type-select',
				'desc'        => 'Choose the cause', 
				'std'         => '',
				'rows'        => '',
				'post_type'   => 'post_causes',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'label'       => 'Transaction ID',
				'id'          => 'wpl_pledge_transaction_id',
				'type'        => 'text',
				'desc'        => 'Add the transaction ID',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'label'       => 'First name',
				'id'          => 'wpl_pledge_first_name',
				'type'        => 'text',
				'desc'        => 'Add the first name',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'label'       => 'Last name',
				'id'          => 'wpl_pledge_last_name',
				'type'        => 'text',
				'desc'        => 'Add the last name',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'label'       => 'Country',
				'id'          => 'wpl_pledge_country',
				'type'        => 'text',
				'desc'        => 'Add the Postal Code',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'label'       => 'City',
				'id'          => 'wpl_pledge_city',
				'type'        => 'text',
				'desc'        => 'Add the City',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'label'       => 'Address',
				'id'          => 'wpl_pledge_address',
				'type'        => 'text',
				'desc'        => 'Add the address',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'label'       => 'Postal Code',
				'id'          => 'wpl_pledge_postal_code',
				'type'        => 'text',
				'desc'        => 'Add the Postal Code',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			
			
			array(
				'label'       => 'Email',
				'id'          => 'wpl_pledge_email',
				'type'        => 'text',
				'desc'        => 'Add the Email address',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'label'       => 'Donation Amount',
				'id'          => 'wpl_pledge_donation_amount',
				'type'        => 'text',
				'desc'        => 'Add the Donation Amount',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'label'       => 'Payment Source',
				'id'          => 'wpl_pledge_payment_source',
				'type'        => 'select',
				'desc'        => 'Chose the pledge payment source', 
				'choices'     => array(
					array(
						'label'       => 'Manual',
						'value'       => 'manual'
					),
					array(
						'label'       => 'PayPal',
						'value'       => 'paypal'
					),
					array(
						'label'       => 'Check/Cash',
						'value'       => 'check_cash'
					),
				),        
				'std'         => 'Default Layout',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'label'       => 'Payment Status',
				'id'          => 'wpl_pledge_payment_Status',
				'type'        => 'select',
				'desc'        => 'Chose the pledge payment status', 
				'choices'     => array(
					array(
						'label'       => 'Completed',
						'value'       => 'Completed'
					),
					array(
						'label'       => 'Refunded',
						'value'       => 'Refunded'
					),
					array(
						'label'       => 'Canceled',
						'value'       => 'Canceled'
					),
				),        
				'std'         => 'Default Layout',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			)
		)
	);
	ot_register_meta_box( $pledges_meta_box );


	/*-----------------------------------------------------------
  		Events
  	-----------------------------------------------------------*/

	$events_meta_box = array(
		'id'          => 'events_meta_box',
		'title'       => 'Events Options',
		'desc'        => '',
		'pages'       => array( 'post_events' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(  
			array(
				'label'       => 'Header image',
				'id'          => 'wpl_parallax_image',
				'type'        => 'upload',
				'desc'        => 'Optional! <br />The image will display upper the content, the required dimensions:  (1920x714px)',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => ''
			),
			array(
				'label'       => 'Date',
				'id'          => 'wpl_event_date',
				'type'        => 'text',
				'desc'        => 'Insert the event date. Ex: 2013-04-27 (yyyy-mm-dd)',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'label'       => 'Time',
				'id'          => 'wpl_event_time',
				'type'        => 'text',
				'desc'        => 'Insert the event time. Ex: 18:00 or 06:00 PM',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'label'       => 'URL',
				'id'          => 'wpl_event_url',
				'type'        => 'text',
				'desc'        => 'Add the event url to facebook.com',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),

			array(
				'label'       => 'Event Location',
				'id'          => 'wpl_event_location',
				'type'        => 'text',
				'desc'        => 'The name of the building where the event will take place',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),


			array(
				'label'       => 'Address',
				'id'          => 'wpl_event_address',
				'type'        => 'text',
				'desc'        => 'Add the event adress. Ex: 51 Sherbrooke W., Montreal, QC.',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'label'       => 'Latitude',
				'id'          => 'wpl_event_latitude',
				'type'        => 'text',
				'desc'        => 'Add the event Latitude',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'label'       => 'Longitude',
				'id'          => 'wpl_event_longitude',
				'type'        => 'text',
				'desc'        => 'Add the event Longitude',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'label'       => 'Pin map Icon',
				'id'          => 'wpl_event_pin_map_icon',
				'type'        => 'upload',
				'desc'        => 'Upload an Pin for map. The image size: ~32x32px.',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'label'       => 'Display Share Buttons',
				'id'          => 'wpl_share_buttons_events',
				'type'        => 'select',
				'desc'        => 'Activate or deactivate Share Buttons', 
				'choices'     => array(
					array(
						'label'       => 'Display',
						'value'       => 'display'
					),
					array(
						'label'       => 'Hide',
						'value'       => 'hide'
					),
				),        
				'std'         => 'activate',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),

		)
	);
	ot_register_meta_box( $events_meta_box );


	/*-----------------------------------------------------------
  		Staff
  	-----------------------------------------------------------*/

	$staff_meta_box = array(
		'id'          => 'staff_meta_box',
		'title'       => 'Staff Options',
		'desc'        => '',
		'pages'       => array( 'post_staff' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(  
			array(
				'label'       => 'Header image',
				'id'          => 'wpl_parallax_image',
				'type'        => 'upload',
				'desc'        => 'Optional! <br /> The image will display upper the content, the required dimensions:  (1920x714px)',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => ''
			),

			array(
				'label'       => 'Position',
				'id'          => 'wpl_candidate_position',
				'type'        => 'text',
				'desc'        => 'Candidate position, (ex: CEO/Co-Founder)',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => ''
			),

			array(
				'label'       => 'Phone',
				'id'          => 'wpl_candidate_phone',
				'type'        => 'text',
				'desc'        => 'Candidate phone number',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => ''
			),

			array(
				'label'       => 'Email',
				'id'          => 'wpl_candidate_email',
				'type'        => 'text',
				'desc'        => 'Candidate email address',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => ''
			),

			array(
				'label'       => 'Blog URL',
				'id'          => 'wpl_candidate_blog',
				'type'        => 'text',
				'desc'        => 'Candidate Blog URL',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => ''
			),

			array(
				'label'       => 'Social Network links',
				'id'          => 'candidate_share',
				'type'        => 'list-item',
				'desc'        => 'Press the <strong>Add New</strong> button in order to add social media links.',
				'settings'    => array(
					array(
						'label'       => 'Service Name',
						'id'          => 'wpl_share_item_name',
						'type'        => 'text',
						'desc'        => 'The name of the social network site, for example: "Facebook"',
						'std'         => '',
						'rows'        => '',
						'post_type'   => '',
						'taxonomy'    => '',
						'class'       => '',
						'section'     => ''
					),
					array(
						'label'       => 'URL',
						'id'          => 'wpl_share_item_url',
						'type'        => 'text',
						'desc'        => 'Enter the URL of the social network site, for example: http://www.facebook.com/wplookthemes',
						'std'         => '',
						'rows'        => '',
						'post_type'   => '',
						'taxonomy'    => '',
						'class'       => '',
						'section'     => ''
					), 
					array(
						'label'       => 'Icon',
						'id'          => 'wpl_share_item_icon',
						'type'        => 'text',
						'desc'        => '<strong>NOTICE</strong>: Choose one item from tne next list: <br />icon-facebook, <br />icon-github, <br />icon-twitter, <br />icon-pinterest, <br />icon-linkedin, <br />icon-google-plus, <br />icon-youtube, <br />icon-flickr',
						'std'         => 'icon-',
						'rows'        => '',
						'post_type'   => '',
						'taxonomy'    => '',
						'class'       => '',
						'section'     => ''
					), 
				),
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'toolbar'
			)
		)
	);
	ot_register_meta_box( $staff_meta_box );

	
}