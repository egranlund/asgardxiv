<?php
/**
* Plugin Name: ReCaptcha
* Plugin URI: www.asgardxiv.com
* Description: This is a plugin to integrate google recaptcha in to user registration and comments
* Version: 1.0
* Author: Eric Granlund
* Author URI: www.asgardxiv.com
* License: GPL2
*/

/*-----------------------------------------------------------
        Adding Recaptcha Admin Options
------------------------------------------------------------*/
function no_captcha_recaptcha_menu() {
	add_submenu_page("options-general.php", "ReCapatcha Options", "ReCaptcha Options", "manage_options", "recaptcha-options", "recaptcha_options_page");	
}

function recaptcha_options_page() { ?>
	<div class="wrap">
		<h1>ReCaptcha Options</h1>
		<form method="post" action="options.php">
		<?php settings_fields("header_section");
			do_settings_sections("recaptcha-options");
			submit_button(); ?>          
		</form>
	</div>
<?php }
add_action("admin_menu", "no_captcha_recaptcha_menu");

function display_recaptcha_options() {
	add_settings_section("header_section", "Keys", "display_recaptcha_content", "recaptcha-options");

	add_settings_field("captcha_site_key", __("Site Key"), "display_captcha_site_key_element", "recaptcha-options", "header_section");
	add_settings_field("captcha_secret_key", __("Secret Key"), "display_captcha_secret_key_element", "recaptcha-options", "header_section");

	register_setting("header_section", "captcha_site_key");
	register_setting("header_section", "captcha_secret_key");
}

function display_recaptcha_content() {
	echo __('<p>You need to <a href="https://www.google.com/recaptcha/admin" rel="external">register you domain</a> and get keys to make this plugin work.</p>');
	echo __("Enter the key details below");
}

function display_captcha_site_key_element() { ?>
	<input type="text" name="captcha_site_key" id="captcha_site_key" value="<?php echo get_option('captcha_site_key'); ?>" />
<?php }

function display_captcha_secret_key_element() { ?>
	<input type="text" name="captcha_secret_key" id="captcha_secret_key" value="<?php echo get_option('captcha_secret_key'); ?>" />
<?php }
add_action("admin_init", "display_recaptcha_options");

/*-----------------------------------------------------------
        Adding Recaptcha Scripts and Styles
------------------------------------------------------------*/
function frontend_recaptcha_script() {
	wp_register_script("recaptcha", "https://www.google.com/recaptcha/api.js");
	wp_enqueue_script("recaptcha");
	
	$plugin_url = plugin_dir_url(__FILE__);
	wp_enqueue_style("no-captcha-recaptcha", $plugin_url ."recaptcha.css");
}
add_action("wp_enqueue_scripts", "frontend_recaptcha_script");

/*-----------------------------------------------------------
        Adding Recaptcha WP Registration Form
------------------------------------------------------------*/
function login_recaptcha_script() {
	wp_register_script("recaptcha_login", "https://www.google.com/recaptcha/api.js");
	wp_enqueue_script("recaptcha_login");
}
add_action("login_enqueue_scripts", "login_recaptcha_script");

function display_register_captcha() { ?>
	<div class="g-recaptcha" data-sitekey="<?php echo get_option('captcha_site_key'); ?>"></div>
<?php }
add_action("register_form", "display_register_captcha");

function verify_registration_captcha($errors, $sanitized_user_login, $user_email) {
	if (isset($_POST['g-recaptcha-response'])) {
		$recaptcha_secret = get_option('captcha_secret_key');
		$response = wp_remote_get("https://www.google.com/recaptcha/api/siteverify?secret=". $recaptcha_secret ."&response=". $_POST['g-recaptcha-response']);
		$response = json_decode($response["body"], true);
		if (true == $response["success"]) {
			return $errors;
		} else {
			$errors->add("Captcha Invalid", __("<strong>ERROR</strong>: You are a bot"));
		}
	} else {
		$errors->add("Captcha Invalid", __("<strong>ERROR</strong>: You are a bot. If not then enable JavaScript"));
	}
	return $errors;
}
add_filter("registration_errors", "verify_registration_captcha", 10, 3);

/*-----------------------------------------------------------
        Adding Recaptcha BP Registration Form
------------------------------------------------------------*/
function display_bp_registration_recaptcha() { ?>
	<div id="recaptcha-bp-register">
		<label for="recaptcha"><?php _e( 'Recaptcha', 'buddypress' ); ?> <?php _e( '(required)', 'buddypress' ); ?></label>
		<?php do_action( 'bp_recaptcha_errors' ); ?>
		<div class="g-recaptcha" data-sitekey="<?php echo get_option('captcha_site_key'); ?>"></div>

		<input type="submit" name="signup_submit" id="signup_submit" value="<?php esc_attr_e( 'Complete Sign Up', 'buddypress' ); ?>" />
	</div>
<?php }
add_action("bp_before_registration_submit_buttons", "display_bp_registration_recaptcha");

function verify_bp_registration_captcha() {
	global $bp;
	
	if (isset($_POST['g-recaptcha-response'])) {
		$recaptcha_secret = get_option('captcha_secret_key');
		$response = wp_remote_get("https://www.google.com/recaptcha/api/siteverify?secret=". $recaptcha_secret ."&response=". $_POST['g-recaptcha-response']);
		$response = json_decode($response["body"], true);
		if (true == $response["success"]) {
			
		} else {
			//$error_message->add("Captcha Invalid", __("<strong>ERROR</strong>: You are a bot"));
			$bp->signup->errors['recaptcha'] = __( 'Check the recaptcha box.' );
		}
	} else {
		$bp->signup->errors['recaptcha'] = __( 'Check the recaptcha box.' );
	}
}
add_action("bp_signup_validate", "verify_bp_registration_captcha");
