<?php
/*
 * Plugin Name: Posts
 * Plugin URI: http://www.wplook.com
 * Description: Add Posts on pages
 * Author: Victor Tihai
 * Version: 1.0
 * Author URI: http://www.wplook.com
*/

add_action('widgets_init', create_function('', 'return register_widget("wplook_progress_bar_widget");'));
class wplook_progress_bar_widget extends WP_Widget {

	
	/*-----------------------------------------------------------------------------------*/
	/*	Widget actual processes
	/*-----------------------------------------------------------------------------------*/
	
	public function __construct() {
		parent::__construct(
	 		'wplook_progress_bar_widget',
			'WPlook Progress Bar',
			array( 'description' => __( 'A widget for displaying the global Progress Bar', 'wplook' ), )
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
			$title = __( 'Progress Bar', 'wplook' );
		}

		if ( $instance ) {
			$read_more_link = esc_attr( $instance[ 'read_more_link' ] );
		}
		else {
			$read_more_link = __( '', 'wplook' );
		}

		?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"> <?php _e('Title:', 'wplook'); ?> </label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('read_more_link'); ?>"> <?php _e('Donate URL:', 'wplook'); ?> </label>
				<input class="widefat" id="<?php echo $this->get_field_id('read_more_link'); ?>" name="<?php echo $this->get_field_name('read_more_link'); ?>" type="text" value="<?php echo $read_more_link; ?>" />
				<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;"> <?php _e('The URL to all Causes', 'wplook'); ?></p>
			</p>

		<?php 
	}
	

	/*-----------------------------------------------------------------------------------*/
	/*	Processes widget options to be saved
	/*-----------------------------------------------------------------------------------*/
	
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['read_more_link'] = sanitize_text_field($new_instance['read_more_link']);
		return $instance;
	}

	/*-----------------------------------------------------------------------------------*/
	/*	Outputs the content of the widget
	/*-----------------------------------------------------------------------------------*/

	public function widget( $args, $instance ) {
		global $post;
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$read_more_link = apply_filters( 'widget', $instance['read_more_link'] );

			$args=array(
				'meta_key'=>'wpl_pledge_cause',
				'post_type' => 'post_pledges',
				'post_status' => 'publish',
				'posts_per_page' => -1,
				'meta_query' => array(
					array(
						'key' => 'wpl_pledge_payment_Status',
						'value' => 'Completed',
						'compare' => 'IN',
					),
				)
			);

			$my_query = null;
			$my_query = new WP_Query($args);
				
				$donations_number = 0;
				$donations_raised = 0;

			if( $my_query->have_posts() ) {
			 
			  while ($my_query->have_posts()) : $my_query->the_post(); 
				$don = get_post_meta(get_the_ID(), 'wpl_pledge_donation_amount', true);
				$trz = get_post_meta(get_the_ID(), 'wpl_pledge_payment_source', true);
					$donations_raised += $don;
					$donations_number++;

			  endwhile;
			  
			}

			wp_reset_query();  // Restore global post data stomped by the_post().


			// Cause Query

			$argsamount=array(
				'post_type' => 'post_causes',
				'post_status' => 'publish',
				'posts_per_page' => -1,
			);


			$amount_query = null;
			$amount_query = new WP_Query($argsamount);
				
				$amount_to_raise = 0;

			if( $amount_query->have_posts() ) {

			  while ($amount_query->have_posts()) : $amount_query->the_post(); 
				$goal_amount = get_post_meta(get_the_ID(), 'wpl_goal_amount', true);
					$amount_to_raise += $goal_amount;
			  endwhile;
			}

			wp_reset_query();  // Restore global post data stomped by the_post().
			?>


			<aside class="widget WPlookPosts">	
				<div class="widget-title">
					<h3><?php echo $title ?></h3>
					<?php if ( $read_more_link != "") { ?>
					<?php } ?>
					
					<div class="clear"></div>
				</div>

				<div class="mask-open radius">
					<div class="square-info full radius">
						<div class="square-info-margins">
							<?php if ( $goal_amount !='' && $goal_amount !='0' ) { ?>
								<div class="progress-detailes">
									<span class="progress-percent radius fleft"><?php echo formatMoney($percentage = $donations_raised * 100 / $amount_to_raise, true) ?>%<span class="arrow"></span></span>
									<span class="progress-money radius fright"><?php echo ot_get_option('wpl_curency_sign') ?><?php echo formatMoney($amount_to_raise); ?><span class="arrow"></span></span>
									<div class="clear"></div>
								</div>
								<progress max="100" value="<?php echo $percentage; ?>"></progress>
							<?php } ?>	

							<div class="meta fleft">
								<p class="sponsors"><i class="icon-heart2"></i> <?php echo $donations_number; ?> <?php _e('Sponsors', 'wplook'); ?></p> 
								<p class="fund"><i class="icon-credit"></i> <?php echo ot_get_option('wpl_curency_sign') ?><?php echo formatMoney($donations_raised); ?> </p>
							</div>
							<?php if ( $read_more_link ) { ?>
								<div class="fright">
									<a href="<?php echo $read_more_link; ?>" class="donate_now buttons fright" title="<?php _e('Donate for this Cause', 'wplook'); ?>"><?php _e('Donate', 'wplook'); ?> <i class="icon-heart"></i></a>
								</div>
							<?php } ?>
							
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</aside>
			<div class="clear"></div>
	<?php }
} ?>