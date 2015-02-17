<?php
/*
 * Plugin Name: Flickr Widget
 * Plugin URI: http://www.wplook.com
 * Description: Add Flickr images to the blog
 * Author: Victor Tihai
 * Version: 1.0
 * @since: Charitas 1.0.7
 * Author URI: http://www.wplook.com
*/
?>
<?php 
add_action('widgets_init', create_function('', 'return register_widget("WPlookflickr");'));
class WPlookflickr extends WP_Widget {
		
	/*-----------------------------------------------------------------------------------*/
	/*	Widget actual processes
	/*-----------------------------------------------------------------------------------*/
	
	public function __construct() {
		parent::__construct(
	 		'WPlookflickr',
			'WPlook Flickr',
			array( 'description' => __( 'A widget for displaying Flickr images', 'wplook' ), )
		);
	}
	

	/*-----------------------------------------------------------------------------------*/
	/*	Outputs the options form on admin
	/*-----------------------------------------------------------------------------------*/

	function form($instance) {
		if ( $instance ) {
			$title = esc_attr( $instance[ 'title' ] );
		} else {
			$title = __( 'My Flickr', 'wplook' );
		} 

		if ( $instance ) {
			$flickrrss = esc_attr( $instance[ 'flickrrss' ] );
		} else {
			$flickrrss = __( 'insert flickr RSS', 'wplook' );
		} 

		if ( $instance ) {
			$thumbs = esc_attr( $instance[ 'thumbs' ] );
		} else {
			$thumbs = __( '6', 'wplook' );
		} ?>
		
		<!-- Title-->
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">
				<?php _e('Title:', 'wplook'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<!-- Flickr RSS -->
		<p>
			<label for="<?php echo $this->get_field_id('flickrrss'); ?>">
				<?php _e('Flickr RSS:', 'wplook'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('flickrrss'); ?>" name="<?php echo $this->get_field_name('flickrrss'); ?>" type="text" value="<?php echo $flickrrss; ?>" />
		<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
			<?php _e('Insert your Flickr RSS.', 'wplook'); ?>
		</p>
		</p>
		<!-- Number of thumbs -->
		<p>
			<label for="<?php echo $this->get_field_id('thumbs'); ?>">
				<?php _e('Number of thumbs:', 'wplook'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('thumbs'); ?>" name="<?php echo $this->get_field_name('thumbs'); ?>" type="text" value="<?php echo $thumbs; ?>" />
		<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
			<?php _e('Number of thumbnails you want to display.', 'wplook'); ?>
		</p>
		</p>

		<?php 
	} 
	

	/*-----------------------------------------------------------------------------------*/
	/*	Processes widget options to be saved
	/*-----------------------------------------------------------------------------------*/
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['flickrrss'] = sanitize_text_field($new_instance['flickrrss']);
		$instance['thumbs'] = sanitize_text_field($new_instance['thumbs']);
	return $instance;
	}

	
	/*-----------------------------------------------------------------------------------*/
	/*	Outputs the content of the widget
	/*-----------------------------------------------------------------------------------*/

	function widget($args, $instance) {
			// outputs the content of the widget
			 extract( $args );
				$title = apply_filters('widget_title', $instance['title']);
				$flickrrss = apply_filters('widget_flickrrss', $instance['flickrrss']);
				$thumbs = apply_filters('widget_thumbs', $instance['thumbs']);
			?>
			<?php if ($title=="") $title = "Contact us"; ?>
			<?php echo $before_widget; ?>
			<?php if ( $title )
					echo $before_title . $title . $after_title; ?>
				<div class='flickr-widget-body'>
			<?php 
			// simple pie
			require_once(ABSPATH . 'wp-includes/class-simplepie.php');	
				$upload_dir = wp_upload_dir();
				
				$feed = new SimplePie();
				if ($flickrrss == '') {
					$feed->set_feed_url('http://api.flickr.com/services/feeds/photos_public.gne?id=27673812@N05&lang=en-us&format=rss_200');
				} else {
					$feed->set_feed_url($flickrrss);
				}
				$feed->set_cache_location($upload_dir['basedir']);
				$feed->set_cache_duration(1800);
				$feed->init();
				$feed->handle_content_type();
			
			if (!function_exists('image_from_description')) {
				function image_from_description($data) {
					preg_match_all('/<img src="([^"]*)"([^>]*)>/i', $data, $matches);
					return $matches[1][0];
				}
			}

			$size = '1';
			if (!function_exists('select_image')) {
			
				function select_image($img, $size) {
					$img = explode('/', $img);
					$filename = array_pop($img);
					
					$s = array(
					'_s.', // square 75x75
					'_t.', // thumb 100x75
					'_m.', // small 240x181 / 181x240
					'.',   // medium 500 x377
					'_b.'  // large 
					);
					
					$img[] = preg_replace('/(_(s|t|m|b))?\./i', $s[$size], $filename);
					return implode('/', $img);
				}
			}

			foreach ($feed->get_items(0,$thumbs) as $item) {

				if ($enclosure = $item->get_enclosure()) {
					$img = image_from_description($item->get_description());
					$full_url = $item->get_permalink();
					$thumb_url = select_image($img, $size);
					echo '<a href="' . $full_url . '" target="_blank" title="' . $enclosure->get_title() . '"><img src="' . $thumb_url . '" /></a>'."\n";
				}
			?>


			<?php } ?>
			<!-- / #Flickr -->	</div>
				<?php echo $after_widget; ?>
			<?php
		}
	 // end
}
?>