<?php
/*
 * Plugin Name: Events
 * Plugin URI: http://www.wplook.com
 * Description: Add Events on pages
 * Author: Victor Tihai
 * Version: 1.0
 * Author URI: http://www.wplook.com
*/

add_action('widgets_init', create_function('', 'return register_widget("wplook_events_widget");'));
class wplook_events_widget extends WP_Widget {

	
	/*-----------------------------------------------------------------------------------*/
	/*	Widget actual processes
	/*-----------------------------------------------------------------------------------*/
	
	public function __construct() {
		parent::__construct(
	 		'wplook_events_widget',
			'WPlook Events',
			array( 'description' => __( 'A widget for displaying upcoming or past events', 'wplook' ), )
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
			$title = __( 'Events', 'wplook' );
		}

		if ( $instance ) {
			$categories = esc_attr( $instance[ 'categories' ] );
		}
		else {
			$categories = __( 'All', 'wplook' );
		}

		if ( $instance ) {
			$nr_posts = esc_attr( $instance[ 'nr_posts' ] );
		}
		else {
			$nr_posts = __( '1', 'wplook' );
		}

		if ( $instance ) {
			$event_type = esc_attr( $instance[ 'event_type' ] );
		}
		else {
			$event_type = __( '', 'wplook' );
		}

		if ( $instance ) {
			$read_more_link = esc_attr( $instance[ 'read_more_link' ] );
		}
		else {
			$read_more_link = __( '', 'wplook' );
		}

		if ( $instance ) {
			$clear_after = esc_attr( $instance[ 'clear_after' ] );
		}
		else {
			$clear_after = __( '1', 'wplook' );
		}

		?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"> <?php _e('Title:', 'wplook'); ?> </label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('categories'); ?>">
				<?php _e('Category:', 'wplook'); ?>
				<br />
			</label>
			
			<?php wp_dropdown_categories(
				array( 
					'name'	=> $this->get_field_name("categories"),
					'show_option_all'    => __('All', 'wplook'),
					'show_count'	=> 1,
					'selected' => $categories,
					'taxonomy'  => 'wpl_events_category' 
				) 
			); ?>
			
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('nr_posts'); ?>"> <?php _e('Number of Events:', 'wplook'); ?> </label>
			<input class="widefat" id="<?php echo $this->get_field_id('nr_posts'); ?>" name="<?php echo $this->get_field_name('nr_posts'); ?>" type="text" value="<?php echo $nr_posts; ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;"> <?php _e('Number of events you want to display', 'wplook'); ?></p>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('event_type'); ?>"><?php _e('Event Type:', 'wplook'); ?> <br /> </label>
			<select id="<?php echo $this->get_field_id('event_type'); ?>" name="<?php echo $this->get_field_name('event_type'); ?>">
				<option value="upcomming_events" <?php selected( 'upcomming_events', $event_type ); ?>><?php _e('Upcoming Events', 'wplook'); ?></option>
				<option value="past_events" <?php selected( 'past_events', $event_type ); ?>><?php _e('Past Events', 'wplook'); ?></option>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('read_more_link'); ?>"> <?php _e('URL to all events:', 'wplook'); ?> </label>
			<input class="widefat" id="<?php echo $this->get_field_id('read_more_link'); ?>" name="<?php echo $this->get_field_name('read_more_link'); ?>" type="text" value="<?php echo $read_more_link; ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;"> <?php _e('View all events URL', 'wplook'); ?></p>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('size'); ?>">
				<?php _e('Clear after?', 'wplook'); ?>
				<br />
			</label>
			<select id="<?php echo $this->get_field_id('clear_after'); ?>" name="<?php echo $this->get_field_name('clear_after'); ?>">
				<option value="0" <?php selected( '0', $clear_after ); ?>><?php _e('Yes', 'wplook'); ?></option>
				<option value="1" <?php selected( '1', $clear_after ); ?>><?php _e('No', 'wplook'); ?></option>
			</select>
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;"> <?php _e('Clear after if you want to add one more widged after this widget', 'wplook'); ?></p>
		</p>
		
		<?php 
	}
	

	/*-----------------------------------------------------------------------------------*/
	/*	Processes widget options to be saved
	/*-----------------------------------------------------------------------------------*/
	
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['categories'] = sanitize_text_field($new_instance['categories']);
		$instance['nr_posts'] = sanitize_text_field($new_instance['nr_posts']);
		$instance['event_type'] = sanitize_text_field($new_instance['event_type']);
		$instance['clear_after'] = sanitize_text_field($new_instance['clear_after']);
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
		$categories = apply_filters( 'widget_categories', $instance['categories'] );
		$nr_posts = apply_filters( 'widget', $instance['nr_posts'] );
		$event_type = apply_filters( 'widget', $instance['event_type'] );
		$clear_after = apply_filters('widget_clear_after', $instance['clear_after']);
		$read_more_link = apply_filters( 'widget', $instance['read_more_link'] );
		?>
		
		<?php

			if ( $categories < '1' ) {

				if ( $event_type == "past_events") {
					$args = array(
						'post_type' => 'post_events', 
						'posts_per_page' => $nr_posts, 
						'meta_key' => 'wpl_event_date', 
						'orderby' => 'meta_value',
						'order' => 'ASC',
						'meta_compare' => '<',
						'meta_value' => date_i18n('Y-m-d')
					);
				} else {
					$args = array(
						'post_type' => 'post_events', 
						'posts_per_page' => $nr_posts, 
						'meta_key' => 'wpl_event_date', 
						'orderby' => 'meta_value',
						'order' => 'ASC',
						'meta_compare' => '>=',
						'meta_value' => date_i18n('Y-m-d')
					);
				}

			} else {

				if ( $event_type == "past_events") {
					$args = array(
						'post_type' => 'post_events', 
						'posts_per_page' => $nr_posts, 
						'meta_key' => 'wpl_event_date', 
						'orderby' => 'meta_value',
						'order' => 'ASC',
						'meta_compare' => '<',
						'meta_value' => date_i18n('Y-m-d'),
						'tax_query' => array(
							array(
								'taxonomy' => 'wpl_events_category',
								'field' => 'id',
								'terms' => $categories
							)
					)
					);
				} else {
					$args = array(
						'post_type' => 'post_events', 
						'posts_per_page' => $nr_posts, 
						'meta_key' => 'wpl_event_date', 
						'orderby' => 'meta_value',
						'order' => 'ASC',
						'meta_compare' => '>=',
						'meta_value' => date_i18n('Y-m-d'),
						'tax_query' => array(
							array(
								'taxonomy' => 'wpl_events_category',
								'field' => 'id',
								'terms' => $categories
							)
						)
					);
				}
			}

			$events = null;
			$events = new WP_Query( $args );
		?>
		
			<?php if( $events->have_posts() ) : ?>
				
				<aside class="widget WPlookevents">	
					<div class="widget-title">
						<h3><?php echo $title ?></h3>
						<?php if ( $read_more_link != "") { ?>
							<div class="viewall fright"><a href="<?php echo $read_more_link; ?>" class="radius" title="<?php _e('View all Events', 'wplook'); ?>"><?php _e('view all', 'wplook'); ?></a></div>
						<?php } ?>
						<div class="clear"></div>
					</div>
					
					<div class="widget-event-body">

						<?php while( $events->have_posts() ) : $events->the_post(); ?>
							<?php
								$event_date = get_post_meta(get_the_ID(), 'wpl_event_date', true);
								$event_time = get_post_meta($post->ID, 'wpl_event_time', true);
								$event_url = get_post_meta(get_the_ID(), 'wpl_event_url', true);
								$event_address = get_post_meta(get_the_ID(), 'wpl_event_address', true);
							?>
							<article class="event-item">
								<?php if ( has_post_thumbnail() ) {?>
									<figure>
										<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail('small-thumb'); ?>
												<div class="mask radius">
											<div class="mask-square"><i class="icon-link"></i></div>
										</div>
										</a>
									</figure>
								<?php } ?>

								<h3 class="entry-header">
									<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3>

								<div class="entry-meta-widget">
									<div class="date">
										<time datetime="<?php echo date('c',strtotime($event_date)); ?>"><i class="icon-calendar"></i><?php echo date_i18n( get_option('date_format'), strtotime($event_date) ); ?> <?php _e('at', 'wplook'); ?> <?php echo $event_time; ?></time>
									</div>
									<div class="location"><i class="icon-location2"></i> <a href="<?php the_permalink(); ?>"><?php echo $event_address; ?></a></div>
									<?php if ( $event_url != "") { ?>
										<div class="facebook"><i class="icon-facebook"></i> <a href="<?php echo $event_url; ?>"><?php _e('Facebook', 'wplook'); ?></a></div> 
									<?php } ?>
								</div>
							</article>

						<?php endwhile; wp_reset_postdata(); ?>
							
					</div>
				</aside>
				<?php if ( $clear_after =="0" ) { ?>
					<div class="clear-widget"></div>
				<?php } ?>
			<?php endif; ?>
		<?php
	}
}
?>