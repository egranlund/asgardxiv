<?php
/*
 * Plugin Name: Featured News
 * Plugin URI: http://www.wplook.com
 * Description: Add Featured News on front page
 * Author: Victor Tihai
 * Version: 1.0
 * Author URI: http://www.wplook.com
*/

add_action('widgets_init', create_function('', 'return register_widget("wplook_featured_news");'));
class wplook_featured_news extends WP_Widget {

	
	/*-----------------------------------------------------------------------------------*/
	/*	Widget actual processes
	/*-----------------------------------------------------------------------------------*/
	
	public function __construct() {
		parent::__construct(
	 		'wplook_featured_news',
			'WPlook Featured News',
			array( 'description' => __( 'A widget for displaying Featured News on your front page. If no featured post will display latest posts', 'wplook' ), )
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
			$nr_posts = esc_attr( $instance[ 'nr_posts' ] );
		}
		else {
			$nr_posts = __( '5', 'wplook' );
		}  ?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"> <?php _e('Title:', 'wplook'); ?> </label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('nr_posts'); ?>"> <?php _e('Number of posts:', 'wplook'); ?> </label>
			<input class="widefat" id="<?php echo $this->get_field_id('nr_posts'); ?>" name="<?php echo $this->get_field_name('nr_posts'); ?>" type="text" value="<?php echo $nr_posts; ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;"> <?php _e('Number of posts you want to display', 'wplook'); ?></p>
		</p>
		
		<?php 
	}
	
	/*-----------------------------------------------------------------------------------*/
	/*	Processes widget options to be saved
	/*-----------------------------------------------------------------------------------*/
	
	
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['nr_posts'] = sanitize_text_field($new_instance['nr_posts']);
		return $instance;
	}


	/*-----------------------------------------------------------------------------------*/
	/*	Outputs the content of the widget
	/*-----------------------------------------------------------------------------------*/

	public function widget( $args, $instance ) {
		global $post;
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$nr_posts = apply_filters( 'widget', $instance['nr_posts'] );
		?>
		

		<?php
			$sticky = get_option( 'sticky_posts' );
			
			$args = array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => $nr_posts,
				'post__in' => $sticky,
				'ignore_sticky_posts' => 1
			);

			$sticky_post = null;
			$sticky_post = new WP_Query( $args );
		?>
		
			<?php if( $sticky_post->have_posts() ) : ?>
				<aside class="WPlookLatestNews flex-container-news" >
					<div class="widget-title mright mleft" >
						<h3><?php echo $title ?></h3>
						<div class="clear"></div>
					</div>
					
					<div class="latestnews-body flexslider-news loading">
						<ul class="slides">

							<?php while( $sticky_post->have_posts() ) : $sticky_post->the_post(); ?> 

								<li>
									<?php if ( has_post_thumbnail() ) {?>
										<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
											<div class="image fright"><?php the_post_thumbnail('medium-thumb'); ?></div>
										</a>
									<?php } ?>
									<div class="content fleft">
										<h3>
											<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h3>
										<p class="category"><?php the_category(', ') ?></p>
										<p class="description"><?php the_excerpt(); ?></p>
										<div class="flex-button-red"><a class="radius" href="<?php the_permalink(); ?>"><?php _e('Read More', 'wplook'); ?> <i class="icon-angle-right"></i></a></div>
									</div>
									<div class="clear"></div>
								</li>
								
							<?php endwhile; wp_reset_postdata(); ?>

						</ul>
					</div>
				</aside>
			<?php endif; ?>
		<?php
	}
}
?>