<?php
/**
 * The default Theme Options
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0
 */


/*-----------------------------------------------------------------------------------*/
/*	Initialize the options before anything else. 
/*-----------------------------------------------------------------------------------*/

add_action( 'admin_init', 'wpl_theme_options', 1 );


/*-----------------------------------------------------------------------------------*/
/*	Build the custom settings & update OptionTree.
/*-----------------------------------------------------------------------------------*/
if (!function_exists('wpl_theme_options')) {
	function wpl_theme_options() {

		/*-----------------------------------------------------------
			Get a copy of the saved settings array.
		-----------------------------------------------------------*/

		$saved_settings = get_option( 'option_tree_settings', array() );
	  

		/*-----------------------------------------------------------
			Custom settings array that will eventually be  passes 
			to the OptionTree Settings API Class.
		-----------------------------------------------------------*/

		$custom_settings = array(
			'contextual_help' => array(

				'content'       => array( 
					array(
						'id'        => 'general_help',
						'title'     => 'General',
						'content'   => '<p>Help content goes here!</p>'
					)
				),

				'sidebar'       => '<p>Sidebar content goes here!</p>',
			),

			'sections'        => array(


				/*-----------------------------------------------------------
					General Settings
				-----------------------------------------------------------*/
				
				array(
					'title'       => 'General settings',
					'id'          => 'general_settings'
				),


				/*-----------------------------------------------------------
					Toolbar Settings
				-----------------------------------------------------------*/
				
				array(
					'title'       => 'Toolbar settings',
					'id'          => 'toolbar'
				),


				/*-----------------------------------------------------------
					Slider Settings
				-----------------------------------------------------------*/

				array(
					'title'       => 'Slider settings',
					'id'          => 'slider_settings'
				),


				/*-----------------------------------------------------------
					Home Page Settings
				-----------------------------------------------------------*/

				array(
					'title'       => 'Home page settings',
					'id'          => 'home_page_settings'
				),


				/*-----------------------------------------------------------
					Causes settings
				-----------------------------------------------------------*/

				array(
					'title'       => 'Causes settings',
					'id'          => 'causes_settings'
				),


				/*-----------------------------------------------------------
					Events settings
				-----------------------------------------------------------*/

				array(
					'title'       => 'Events settings',
					'id'          => 'events_settings'
				),


				/*-----------------------------------------------------------
					Staff settings
				-----------------------------------------------------------*/

				array(
					'title'       => 'Staff settings',
					'id'          => 'staff_settings'
				),


				/*-----------------------------------------------------------
					Publications settings
				-----------------------------------------------------------*/

				array(
					'title'       => 'Publications settings',
					'id'          => 'publications_settings'
				),


				/*-----------------------------------------------------------
					Gallery settings
				-----------------------------------------------------------*/

				array(
					'title'       => 'Gallery settings',
					'id'          => 'gallery_settings'
				),


				/*-----------------------------------------------------------
					PayPal settings
				-----------------------------------------------------------*/

				array(
					'title'       => 'Payment settings',
					'id'          => 'paypal_settings'
				)
				
			),

			'settings'        => array(

				/*-----------------------------------------------------------
					General Settings
				-----------------------------------------------------------*/
				
				array(
					'label'       => 'Logo Image',
					'id'          => 'wpl_logo',
					'type'        => 'upload',
					'desc'        => 'Upload your logo.',
					'std'         => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'general_settings'
				),

				array(
					'label'       => 'Favicon',
					'id'          => 'wpl_favicon',
					'type'        => 'upload',
					'desc'        => 'Upload your favicon.<br/><br/><strong>NOTICE:</strong> Use .png image type. You can generate an favicon <a target="_blank" href="http://www.favicon.cc">here</a>',
					'std'         => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'general_settings'
				),

				array(
					'label'       => 'Contact Form Email',
					'id'          => 'wpl_contact_form_email',
					'type'        => 'text',
					'desc'        => 'Add the default emaild address for contact form.',
					'std'         => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'general_settings'
				),

				array(
					'label'       => 'Google Analytics Tracking Code',
					'id'          => 'wpl_google_analytics_tracking_code',
					'type'        => 'textarea-simple',
					'desc'        => 'Insert the complete tracking script from analytics.google.com',
					'std'         => '',
					'rows'        => '8',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'general_settings'
				),

				array(
					'label'       => 'Copyright',
					'id'          => 'wpl_copyright',
					'type'        => 'text',
					'desc'        => 'Enter your Copyright notice displayed in the footer of the website.',
					'std'         => 'Copyright &copy; 2013. All Rights reserved.',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'general_settings'
				),

				array(
					'label'       => 'Affiliate',
					'id'          => 'wpl_affiliate',
					'type'        => 'text',
					'desc'        => 'Add your Themeforest username and start earning money. Refer new users to buy the Charitas Theme and you will receive 30% of their first purchase or cash deposit!<br /> The link will appear in the footer at Designed by WPlook',
					'std'         => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'general_settings'
				),

				array(
					'label'       => 'Custom Cascading Style Sheets',
					'id'          => 'wpl_css',
					'type'        => 'textarea-simple',
					'desc'        => 'Add custom CSS to your theme.',
					'std'         => '',
					'rows'        => '10',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'general_settings'
				),

				array(
					'label'       => 'Deactivate breadcrumb',
					'id'          => 'wpl_breadcrumbs',
					'type'        => 'radio',
					'desc'        => 'Activate or deactivate the breadcrumbs.',
					'choices'     => array(
						array(
							'label'       => 'Activate',
							'value'       => 'true'
						),
						array(
							'label'       => 'Deactivate',
							'value'       => 'false'
						)
					),        
					'std'         => 'true',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'general_settings'
				),
				
				array(
					'label'       => 'Breadcrumb text for home link',
					'id'          => 'wpl_breadcrumb_home_name',
					'type'        => 'text',
					'desc'        => 'Add custom text for breadcrumb heme link',
					'std'         => 'Home',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'general_settings'
				),

				/*-----------------------------------------------------------
					Toolbar Settings
				-----------------------------------------------------------*/

				array(
					'label'       => 'Phone Number',
					'id'          => 'wpl_phone_number',
					'type'        => 'text',
					'desc'        => 'Add the phone number.',
					'std'         => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'toolbar'
				),

				array(
					'label'       => 'RSS Link',
					'id'          => 'wpl_rss_link',
					'type'        => 'text',
					'desc'        => 'Add the RSS link or Feedburner RSS Link',
					'std'         => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'toolbar'
				),

				array(
					'label'       => 'Contact page Link',
					'id'          => 'wpl_contact_page_link',
					'type'        => 'custom-post-type-select',
					'desc'        => 'Select the contact page',
					'std'         => '',
					'rows'        => '',
					'post_type'   => 'page',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'toolbar'
				),

				array(
					'label'       => 'Contact Email',
					'id'          => 'wpl_contact_email',
					'type'        => 'text',
					'desc'        => 'Add an email address. <strong>NOTE*</strong> Keep this field blank if you selected the contact page.',
					'std'         => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'toolbar'
				),

				array(
					'label'       => 'Social Network Navigation',
					'id'          => 'toolbar_share',
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
							'desc'        => '<strong>NOTICE</strong>: Choose one item from tne next list: <br />icon-facebook, <br />icon-github, <br />icon-twitter, <br />icon-pinterest, <br />icon-linkedin, <br />icon-google-plus, <br />icon-youtube-play, <br />icon-skype, <br />icon-vk, <br />icon-vimeo',
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
				),
				
				array(
					'label'       => 'Group/Ungroup Social buttons',
					'id'          => 'wpl_group_icons',
					'type'        => 'radio',
					'desc'        => 'Group/Ungroup Social buttons.',
					'choices'     => array(
						array(
							'label'       => 'Group',
							'value'       => 'true'
						),
						array(
							'label'       => 'Ungroup',
							'value'       => 'false'
						)
					),        
					'std'         => 'true',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'toolbar'
				),


				array(
					'label'       => 'Activate Search form',
					'id'          => 'wpl_search_form',
					'type'        => 'radio',
					'desc'        => 'Activate or deactivate the search form.',
					'choices'     => array(
						array(
							'label'       => 'Activate',
							'value'       => 'true'
						),
						array(
							'label'       => 'Deactivate',
							'value'       => 'false'
						)
					),        
					'std'         => 'true',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'toolbar'
				),

				array(
					'label'       => 'Donate Link',
					'id'          => 'wpl_donete_link',
					'type'        => 'text',
					'desc'        => 'Add the donate link',
					'std'         => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'toolbar'
				),


				/*-----------------------------------------------------------
					Slider Settings
				-----------------------------------------------------------*/

				array(
					'label'       => 'Slides',
					'id'          => 'wpl_sliders',
					'type'        => 'list-item',
					'desc'        => 'Press the <strong>Add New</strong> button in order to add a new slider.',
					'settings'    => array(
						array(
							'label'       => 'Slider Image',
							'id'          => 'wpl_slider_item_image',
							'type'        => 'upload',
							'desc'        => '<strong>Recommended image size:</strong> 1920x714px.',
							'std'         => '',
							'rows'        => '',
							'post_type'   => '',
							'class'       => '',
							'taxonomy'    => '',
							'class'       => '',
							'section'     => ''
						),

						array(
							'label'       => 'Slider Thumbnail',
							'id'          => 'wpl_slider_item_thumbnail',
							'type'        => 'upload',
							'desc'        => '<strong>Recommended image size:</strong> 272x150px',
							'std'         => '',
							'rows'        => '',
							'post_type'   => '',
							'class'       => '',
							'taxonomy'    => '',
							'section'     => ''
						),

						array(
							'label'       => 'Slide Title',
							'id'          => 'wpl_slider_item_title',
							'type'        => 'text',
							'desc'        => 'Enter a slide Title.',
							'std'         => '',
							'rows'        => '',
							'post_type'   => '',
							'class'       => '',
							'taxonomy'    => '',
							'section'     => ''
						),

						array(
							'label'       => 'Slide Title color',
							'id'          => 'wpl_slider_item_title_color',
							'type'        => 'colorpicker',
							'desc'        => 'Select a color for slider title.',
							'std'         => '#FFFFFF',
							'rows'        => '',
							'post_type'   => '',
							'class'       => '',
							'taxonomy'    => '',
							'section'     => ''
						),


						array(
							'label'       => 'Slide Description',
							'id'          => 'wpl_slider_item_description',
							'type'        => 'textarea',
							'desc'        => 'Enter a slide Title.',
							'std'         => '',
							'rows'        => '',
							'post_type'   => '',
							'class'       => '',
							'taxonomy'    => '',
							'section'     => ''
						),

						array(
							'label'       => 'Slide Description color',
							'id'          => 'wpl_slider_item_description_color',
							'type'        => 'colorpicker',
							'desc'        => 'Select a color for slider description.',
							'std'         => '#FFFFFF',
							'rows'        => '',
							'post_type'   => '',
							'class'       => '',
							'taxonomy'    => '',
							'section'     => ''
						),

						array(
							'label'       => 'Slide Buton Text',
							'id'          => 'wpl_slider_item_button_text',
							'type'        => 'text',
							'desc'        => 'Enter the text you want to display on button, for examle: read more',
							'std'         => 'Read more',
							'rows'        => '',
							'post_type'   => '',
							'class'       => '',
							'taxonomy'    => '',
							'section'     => ''
						),

						array(
							'label'       => 'Slide URL',
							'id'          => 'wpl_slider_item_url',
							'type'        => 'text',
							'desc'        => 'Enter the slider URL',
							'std'         => '',
							'rows'        => '',
							'post_type'   => '',
							'class'       => '',
							'taxonomy'    => '',
							'section'     => ''
						),

						array(
							'label'       => 'Slide Button color',
							'id'          => 'wpl_slider_item_button_color',
							'type'        => 'colorpicker',
							'desc'        => 'Select a color for the button.',
							'std'         => '#FFFFFF',
							'rows'        => '',
							'post_type'   => '',
							'class'       => '',
							'taxonomy'    => '',
							'section'     => ''
						),
					),
					'std'         => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'slider_settings'
				),

				array(
					'label'       => 'Revolution Slider Alias',
					'id'          => 'wpl_slider_revolution',
					'type'        => 'text',
					'desc'        => '<strong>Use Revolution Slider instead of displaing the base slider (FlexSlider).</strong> If you have installed the revolution slider Plugin, add the Slider Alias here. From this example [rev_slider test1] you need to add only the test1. If you do not have the plugin you can buy it from here: http://bit.ly/1eD7aE1',
					'std'         => '',
					'rows'        => '',
					'post_type'   => '',
					'class'       => '',
					'taxonomy'    => '',
					'section'     => 'slider_settings'
				),


				/*-----------------------------------------------------------
					Home Page Settings
				-----------------------------------------------------------*/

				array(
					'label'       => 'First home page widget area',
					'id'          => 'wpl_first_front_widget_size',
					'type'        => 'select',
					'desc'        => 'Set the size for first home page widget area',
					'choices'     => array(
						array(
							'label'       => '25%',
							'value'       => 'grid_4'
						),
						array(
							'label'       => '50%',
							'value'       => 'grid_8'
						),
						array(
							'label'       => '75%',
							'value'       => 'grid_12'
						),
						array(
							'label'       => '100%',
							'value'       => 'grid_16'
						),
					),
					'std'         => 'grid_12',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'home_page_settings'
				),

				array(
					'label'       => 'Second home page widget area',
					'id'          => 'wpl_second_front_widget_size',
					'type'        => 'select',
					'desc'        => 'Set the size for second home page widget area',
					'choices'     => array(
						array(
							'label'       => '25%',
							'value'       => 'grid_4'
						),
						array(
							'label'       => '50%',
							'value'       => 'grid_8'
						),
						array(
							'label'       => '75%',
							'value'       => 'grid_12'
						),
						array(
							'label'       => '100%',
							'value'       => 'grid_16'
						),
					),
					'std'         => 'grid_4',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'home_page_settings'
				),

				array(
					'label'       => 'Third home page widget area',
					'id'          => 'wpl_third_front_widget_size',
					'type'        => 'select',
					'desc'        => 'Set the size for third home page widget area',
					'choices'     => array(
						array(
							'label'       => '25%',
							'value'       => 'grid_4'
						),
						array(
							'label'       => '50%',
							'value'       => 'grid_8'
						),
						array(
							'label'       => '75%',
							'value'       => 'grid_12'
						),
						array(
							'label'       => '100%',
							'value'       => 'grid_16'
						),
					),
					'std'         => 'grid_16',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'home_page_settings'
				),

				array(
					'label'       => 'Forth home page widget area',
					'id'          => 'wpl_forth_front_widget_size',
					'type'        => 'select',
					'desc'        => 'Set the size for forth home page widget area',
					'choices'     => array(
						array(
							'label'       => '25%',
							'value'       => 'grid_4'
						),
						array(
							'label'       => '50%',
							'value'       => 'grid_8'
						),
						array(
							'label'       => '75%',
							'value'       => 'grid_12'
						),
						array(
							'label'       => '100%',
							'value'       => 'grid_16'
						),
					),
					'std'         => 'grid_16',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'home_page_settings'
				),

				array(
					'label'       => 'Fifth home page widget area zise',
					'id'          => 'wpl_fifth_front_widget_size',
					'type'        => 'select',
					'desc'        => 'Set the size for fifth home page widget area',
					'choices'     => array(
						array(
							'label'       => '25%',
							'value'       => 'grid_4'
						),
						array(
							'label'       => '50%',
							'value'       => 'grid_8'
						),
						array(
							'label'       => '75%',
							'value'       => 'grid_12'
						),
						array(
							'label'       => '100%',
							'value'       => 'grid_16'
						),
					),
					'std'         => 'grid_16',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'home_page_settings'
				),


				/*-----------------------------------------------------------
					Causes settings
				-----------------------------------------------------------*/

				array(
					'label'       => 'URL Rewrite',
					'id'          => 'wpl_causes_url_rewrite',
					'type'        => 'text',
					'desc'        => '',
					'std'         => 'cause',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'causes_settings'
				),

				array(
					'label'       => 'URL Rewrite name',
					'id'          => 'wpl_causes_url_rewrite_name',
					'type'        => 'text',
					'desc'        => 'The URL Rewrite name will appear in the rootline/breadcrumb',
					'std'         => 'Causes',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'causes_settings'
				),

				array(
					'label'       => 'Category URL Rewrite',
					'id'          => 'wpl_causes_category_url_rewrite',
					'type'        => 'text',
					'desc'        => '',
					'std'         => 'causes-category',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'causes_settings'
				),

				array(
					'label'       => 'Excerpt limit',
					'id'          => 'wpl_cause_excerpt_limit',
					'type'        => 'text',
					'desc'        => 'Set how many words do you want to display for causes excerpt.',
					'std'         => '40',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'causes_settings'
				),


				/*-----------------------------------------------------------
					Events settings
				-----------------------------------------------------------*/

				array(
					'label'       => 'URL Rewrite',
					'id'          => 'wpl_events_url_rewrite',
					'type'        => 'text',
					'desc'        => '',
					'std'         => 'events',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'events_settings'
				),

				array(
					'label'       => 'URL Rewrite',
					'id'          => 'wpl_events_url_rewrite_name',
					'type'        => 'text',
					'desc'        => 'The URL Rewrite name will appear in the rootline/breadcrumb',
					'std'         => 'Event',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'events_settings'
				),

				array(
					'label'       => 'Category URL Rewrite',
					'id'          => 'wpl_events_category_url_rewrite',
					'type'        => 'text',
					'desc'        => '',
					'std'         => 'events-category',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'events_settings'
				),

				array(
					'label'       => 'Event Email',
					'id'          => 'wpl_events_email',
					'type'        => 'text',
					'desc'        => 'Add the email address where do you want to receive information about people who want to enjoy the event.',
					'std'         => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'events_settings'
				),

				array(
					'label'       => 'Excerpt limit',
					'id'          => 'wpl_events_excerpt_limit',
					'type'        => 'text',
					'desc'        => 'Set how many words do you want to display for upcoming and past events excerpt.',
					'std'         => '40',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'events_settings'
				),


				/*-----------------------------------------------------------
					Staff settings
				-----------------------------------------------------------*/

				array(
					'label'       => 'URL Rewrite',
					'id'          => 'wpl_staff_url_rewrite',
					'type'        => 'text',
					'desc'        => '',
					'std'         => 'our-staff',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'staff_settings'
				),

				array(
					'label'       => 'URL Rewrite Name',
					'id'          => 'wpl_staff_url_rewrite_name',
					'type'        => 'text',
					'desc'        => 'The URL Rewrite name will appear in the rootline/breadcrumb',
					'std'         => 'Staff',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'staff_settings'
				),

				array(
					'label'       => 'Category URL Rewrite',
					'id'          => 'wpl_staff_category_url_rewrite',
					'type'        => 'text',
					'desc'        => '',
					'std'         => 'staff-category',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'staff_settings'
				),


				/*-----------------------------------------------------------
					Publications settings
				-----------------------------------------------------------*/

				array(
					'label'       => 'URL Rewrite',
					'id'          => 'wpl_publication_url_rewrite',
					'type'        => 'text',
					'desc'        => '',
					'std'         => 'publications',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'publications_settings'
				),

				array(
					'label'       => 'URL Rewrite Name',
					'id'          => 'wpl_publications_url_rewrite_name',
					'type'        => 'text',
					'desc'        => 'The URL Rewrite name will appear in the rootline/breadcrumb',
					'std'         => 'Publications',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'publications_settings'
				),

				array(
					'label'       => 'Category URL Rewrite',
					'id'          => 'wpl_publications_category_url_rewrite',
					'type'        => 'text',
					'desc'        => '',
					'std'         => 'publications-category',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'publications_settings'
				),


				/*-----------------------------------------------------------
					Gallery settings
				-----------------------------------------------------------*/

				array(
					'label'       => 'URL Rewrite',
					'id'          => 'wpl_gallery_url_rewrite',
					'type'        => 'text',
					'desc'        => '',
					'std'         => 'gallery',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'gallery_settings'
				),

				array(
					'label'       => 'URL Rewrite Name',
					'id'          => 'wpl_gallery_url_rewrite_name',
					'type'        => 'text',
					'desc'        => 'The URL Rewrite name will appear in the rootline/breadcrumb',
					'std'         => 'Galleries',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'gallery_settings'
				),

				array(
					'label'       => 'Category URL Rewrite',
					'id'          => 'wpl_gallery_category_url_rewrite',
					'type'        => 'text',
					'desc'        => '',
					'std'         => 'gallery-category',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'gallery_settings'
				),



				/*-----------------------------------------------------------
					Payment settings
				-----------------------------------------------------------*/

				array(
					'label'       => 'Activate or deactivate PayPal donation',
					'id'          => 'wpl_activate_paypal',
					'type'        => 'select',
					'desc'        => 'Activate or deactivate the paypal donation box on cause page',
					'choices'     => array(
						array(
							'label'       => 'Activated',
							'value'       => 'activated'
						),
						array(
							'label'       => 'Deactivated',
							'value'       => 'deactivated'
						),
					),
					'std'         => 'activated',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'paypal_settings'
				),
				array(
					'label'       => 'First default donation amount',
					'id'          => 'wpl_default_first_amount',
					'type'        => 'text',
					'desc'        => 'The first default donation amount',
					'std'         => '10',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'paypal_settings'
				),
				array(
					'label'       => 'Second default donation amount',
					'id'          => 'wpl_default_second_amount',
					'type'        => 'text',
					'desc'        => 'The second default donation amount',
					'std'         => '25',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'paypal_settings'
				),
				array(
					'label'       => 'Third default donation amount',
					'id'          => 'wpl_default_third_amount',
					'type'        => 'text',
					'desc'        => 'The third default donation amount',
					'std'         => '50',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'paypal_settings'
				),
				array(
					'label'       => 'Minimum donation amount for custom amount',
					'id'          => 'wpl_min_amount',
					'type'        => 'text',
					'desc'        => 'Minimum donation amount for custom amount',
					'std'         => '75',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'paypal_settings'
				),
				array(
					'label'       => 'Currency Code',
					'id'          => 'wpl_curency_code',
					'type'        => 'text',
					'desc'        => 'Add curency code, for ex: USD, EUR, CAD.',
					'std'         => 'USD',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'paypal_settings'
				),
				array(
					'label'       => 'Currency Sign',
					'id'          => 'wpl_curency_sign',
					'type'        => 'text',
					'desc'        => 'Add the currency sign for ex: $',
					'std'         => '$',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'paypal_settings'
				),
				array(
					'label'       => 'PayPal Email',
					'id'          => 'wpl_paypal_email',
					'type'        => 'text',
					'desc'        => 'You will receive donation on this email',
					'std'         => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'paypal_settings'
				),
				array(
					'label'       => 'Direct Bank Transfer Details',
					'id'          => 'wpl_direct_bank_transfer',
					'type'        => 'textarea',
					'desc'        => 'Add Bank Transfer Details',
					'std'         => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'paypal_settings'
				),
				array(
					'label'       => 'Cheque Payment Details',
					'id'          => 'wpl_cheque_payment',
					'type'        => 'textarea',
					'desc'        => 'Add Check payment details',
					'std'         => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'paypal_settings'
				),
				array(
					'label'       => 'Thank You page',
					'id'          => 'wpl_thank_you_page',
					'type'        => 'custom-post-type-select',
					'desc'        => 'Select the Thank You page. After successful payment users will return to this page.',
					'std'         => '',
					'rows'        => '',
					'post_type'   => 'page',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'paypal_settings'
				)
			)
		);
		/* settings are not the same update the DB */
		if ( $saved_settings !== $custom_settings ) {
			update_option( 'option_tree_settings', $custom_settings ); 
		}
	}
}

