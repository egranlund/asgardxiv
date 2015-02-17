<?php
/*
 * Plugin Name: Quote
 * Plugin URI: http://www.wplook.com
 * Description: Add Causes on pages
 * Author: Victor Tihai
 * Version: 1.0
 * Author URI: http://www.wplook.com
*/

add_action('widgets_init', create_function('', 'return register_widget("wplook_quote_widget");'));
class wplook_quote_widget extends WP_Widget {

	
	/*-----------------------------------------------------------------------------------*/
	/*	Widget actual processes
	/*-----------------------------------------------------------------------------------*/
	
	public function __construct() {
		parent::__construct(
	 		'wplook_quote_widget',
			'WPlook Quote',
			array( 'description' => __( 'A widget for displaying Quotes', 'wplook' ), )
		);
	}

	
	/*-----------------------------------------------------------------------------------*/
	/*	Outputs the options form on admin
	/*-----------------------------------------------------------------------------------*/
	
	public function form( $instance ) {
		
		if ( $instance ) {
			$title = esc_attr( $instance[ 'title' ] );
		}
		else {
			$title = __( '', 'wplook' );
		}

		if ( $instance ) {
			$quote = esc_attr( $instance[ 'quote' ] );
		}
		else {
			$quote = __( '', 'wplook' );
		}

		?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"> <?php _e('Title:', 'wplook'); ?> </label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('quote'); ?>">
					<?php _e('Quote:', 'wplook'); ?>
				</label>
				<textarea cols="25" rows="10" class="widefat" id="<?php echo $this->get_field_id('quote'); ?>" name="<?php echo $this->get_field_name('quote'); ?>" type="text"><?php echo $quote; ?></textarea>
			</p>

		<?php 
	}
	

	/*-----------------------------------------------------------------------------------*/
	/*	Processes widget options to be saved
	/*-----------------------------------------------------------------------------------*/
	
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['quote'] = $new_instance['quote'];
		return $instance;
	}


	/*-----------------------------------------------------------------------------------*/
	/*	Outputs the content of the widget
	/*-----------------------------------------------------------------------------------*/

	public function widget( $args, $instance ) {
		global $post;
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$quote = apply_filters( 'widget', $instance['quote'] );
		?>
		
			<aside class="widget WPlookAnounce radius" >	
				<div class="announce-body mright mleft">
					<div class="margin"><h1><?php echo $title ?></h1>
					<h3><?php echo $quote ?></h3></div>
				</div>
			</aside>
		
			
		<?php
	}
}
?>