<?php
/*
 * Plugin Name: Address
 * Plugin URI: http://www.wplook.com
 * Description: Add Address to pages
 * Author: Victor Tihai
 * Version: 1.0
 * Author URI: http://www.wplook.com
*/

add_action('widgets_init', create_function('', 'return register_widget("wplook_address_widget");'));
class wplook_address_widget extends WP_Widget {


	/*-----------------------------------------------------------------------------------*/
	/*	Widget actual processes
	/*-----------------------------------------------------------------------------------*/
	
	public function __construct() {
		parent::__construct(
	 		'wplook_address_widget',
			'WPlook Address',
			array( 'description' => __( 'A widget for displaying Address', 'wplook' ), )
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
			$title = __( 'Contact Us', 'wplook' );
		}

		if ( $instance ) {
			$organisation_name = esc_attr( $instance[ 'organisation_name' ] );
		}
		else {
			$organisation_name = __( '', 'wplook' );
		}

		if ( $instance ) {
			$street_address = esc_attr( $instance[ 'street_address' ] );
		}
		else {
			$street_address = __( '', 'wplook' );
		}

		if ( $instance ) {
			$region = esc_attr( $instance[ 'region' ] );
		}
		else {
			$region = __( '', 'wplook' );
		}

		if ( $instance ) {
			$zip_code = esc_attr( $instance[ 'zip_code' ] );
		}
		else {
			$zip_code = __( '', 'wplook' );
		}

		if ( $instance ) {
			$country = esc_attr( $instance[ 'country' ] );
		}
		else {
			$country = __( '', 'wplook' );
		}

		if ( $instance ) {
			$phone = esc_attr( $instance[ 'phone' ] );
		}
		else {
			$phone = __( '', 'wplook' );
		}

		if ( $instance ) {
			$email = esc_attr( $instance[ 'email' ] );
		}
		else {
			$email = __( '', 'wplook' );
		}

		if ( $instance ) {
			$website = esc_attr( $instance[ 'website' ] );
		}
		else {
			$website = __( '', 'wplook' );
		}

		?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"> <?php _e('Title:', 'wplook'); ?> </label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('organisation_name'); ?>"> <?php _e('Organisation Name:', 'wplook'); ?> </label>
				<input class="widefat" id="<?php echo $this->get_field_id('organisation_name'); ?>" name="<?php echo $this->get_field_name('organisation_name'); ?>" type="text" value="<?php echo $organisation_name; ?>" />
				<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;"> <?php _e('Add Organisation name', 'wplook'); ?></p>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('street_address'); ?>">
					<?php _e('Street Address:', 'wplook'); ?>
				</label>
				<textarea cols="25" rows="10" class="widefat" id="<?php echo $this->get_field_id('street_address'); ?>" name="<?php echo $this->get_field_name('street_address'); ?>" type="text"><?php echo $street_address; ?></textarea>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('region'); ?>"> <?php _e('Region:', 'wplook'); ?> </label>
				<input class="widefat" id="<?php echo $this->get_field_id('region'); ?>" name="<?php echo $this->get_field_name('region'); ?>" type="text" value="<?php echo $region; ?>" />
				<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;"> <?php _e('Add Region', 'wplook'); ?></p>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('zip_code'); ?>"> <?php _e('Zip Code:', 'wplook'); ?> </label>
				<input class="widefat" id="<?php echo $this->get_field_id('zip_code'); ?>" name="<?php echo $this->get_field_name('zip_code'); ?>" type="text" value="<?php echo $zip_code; ?>" />
				<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;"> <?php _e('Add Zip Code', 'wplook'); ?></p>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('country'); ?>"> <?php _e('Country:', 'wplook'); ?> </label>
				<input class="widefat" id="<?php echo $this->get_field_id('country'); ?>" name="<?php echo $this->get_field_name('country'); ?>" type="text" value="<?php echo $country; ?>" />
				<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;"> <?php _e('Add Country Name', 'wplook'); ?></p>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('phone'); ?>"> <?php _e('Phone:', 'wplook'); ?> </label>
				<input class="widefat" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo $phone; ?>" />
				<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;"> <?php _e('Add Phone Number', 'wplook'); ?></p>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('email'); ?>"> <?php _e('Email:', 'wplook'); ?> </label>
				<input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" />
				<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;"> <?php _e('Add Email Address', 'wplook'); ?></p>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('website'); ?>"> <?php _e('Website:', 'wplook'); ?> </label>
				<input class="widefat" id="<?php echo $this->get_field_id('website'); ?>" name="<?php echo $this->get_field_name('website'); ?>" type="text" value="<?php echo $website; ?>" />
				<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;"> <?php _e('Add Website Address', 'wplook'); ?></p>
			</p>


		<?php 
	}
	

	/*-----------------------------------------------------------------------------------*/
	/*	Processes widget options to be saved
	/*-----------------------------------------------------------------------------------*/
	
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['organisation_name'] = sanitize_text_field($new_instance['organisation_name']);
		$instance['street_address'] = sanitize_text_field($new_instance['street_address']);
		$instance['region'] = sanitize_text_field($new_instance['region']);
		$instance['zip_code'] = sanitize_text_field($new_instance['zip_code']);
		$instance['country'] = sanitize_text_field($new_instance['country']);
		$instance['phone'] = sanitize_text_field($new_instance['phone']);
		$instance['email'] = sanitize_text_field($new_instance['email']);
		$instance['website'] = sanitize_text_field($new_instance['website']);

		return $instance;
	}


	/*-----------------------------------------------------------------------------------*/
	/*	Outputs the content of the widget
	/*-----------------------------------------------------------------------------------*/

	public function widget( $args, $instance ) {
		global $post;
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$organisation_name = apply_filters( 'widget', $instance['organisation_name'] );
		$street_address = apply_filters( 'widget', $instance['street_address'] );
		$region = apply_filters( 'widget', $instance['region'] );
		$zip_code = apply_filters( 'widget', $instance['zip_code'] );
		$country = apply_filters( 'widget', $instance['country'] );
		$phone = apply_filters( 'widget', $instance['phone'] );
		$email = apply_filters( 'widget', $instance['email'] );
		$website = apply_filters( 'widget', $instance['website'] );
		
		?>
		
		<aside class="widget widget_adress">
			
			<?php if ($title=="") $title = "Contact us"; ?>
			<?php echo $before_widget; ?>
			<?php if ( $title )
					echo $before_title . $title . $after_title; ?>


			<address class="vcard">
				<?php if($organisation_name){ ?>
					<h3 class="org vcard"><?php echo $organisation_name; ?></h3>
				<?php } ?>
				
				<p class="adr">
					<?php if ( $street_address ){ ?>
						<span class="street-address"> <?php echo $street_address; ?></span>
					<?php } ?>


					<?php if ( $region ){ ?>
						<span class="region"> <?php echo $region; ?></span>
					<?php } ?>


					<?php if ( $zip_code ){ ?>
						<span class="postal-code"> <?php echo $zip_code; ?></span>
					<?php } ?>
						
					<?php if ( $country ){ ?>	
						<span class="country-name"> <?php echo $country; ?></span>
					<?php } ?>

				</p>
				<?php if ( $phone ){ ?>
					<b><?php _e('Phone:', 'wplook'); ?></b><span class="tel"> <?php echo $phone; ?></span><br />
				<?php } ?>

				<?php if ( $email ){ ?>
					<b><?php _e('E-mail:', 'wplook'); ?></b><span class="email"> <?php echo $email; ?></span><br />
				<?php } ?>

				<?php if ( $website ){ ?>	
					<b><?php _e('Website:', 'wplook'); ?></b><span class="url"> <?php echo $website ?></span><br />
				<?php } ?>
			</address>
		</aside>
		
		<?php
	}
}
?>