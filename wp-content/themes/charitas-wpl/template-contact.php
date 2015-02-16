<?php
/**
 * Template Name: Contact page
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0
 */
?>

<?php get_header(); ?>
<?php

/*-----------------------------------------------------------
	Form
-----------------------------------------------------------*/

$nameError = '';
$emailError = ''; 
$commentError  = '';
//If the form is submitted
if(isset($_POST['submitted'])) {
	$name = trim($_POST['contactName']);
	$email = trim($_POST['email']);
	$phone = trim($_POST['phone']);
	$comments = trim($_POST['comments']);
	if(!isset($hasError)) {
		$emailTo = ot_get_option('wpl_contact_form_email');
		if (!isset($emailTo) || ($emailTo == '') ){
			$emailTo = get_option('admin_email');
		}
		$subject = 'New message From'.$name;
		$body = "My name is: $name \n\nMy Email is: $email \n\nMy phone number is: $phone \n\nMy comments: $comments";
		$headers = 'From: '.$name.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;
 
		mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}
}
//end form
?>
	<div class="item teaser-page-list">
		<div class="container_16">
			<aside class="grid_10">
				<h1 class="page-title"><?php the_title(); ?></h1>
			</aside>
			<?php if ( ot_get_option('wpl_breadcrumbs') != "false") { ?>
				<div class="grid_6">
					<div id="rootline">
						<?php wplook_breadcrumbs(); ?>	
					</div>
				</div>
			<?php } ?>
			<div class="clear"></div>
		</div>
	</div>
	
	<div id="main" class="site-main container_16">
		<div class="inner">
			<div id="primary" class="grid_11 suffix_1">
				
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; // end of the loop. ?>
			
				<?php if(isset($emailSent) && $emailSent == true) { ?>
					<div class="thanks">
						<p><?php _e( 'Thanks, your email was sent successfully.', 'wplook' ); ?></p>
					</div>
				<?php } else { ?>
					<?php if(isset($hasError) ) { ?>
						<p class="error"><?php _e( 'Sorry, an error occured.', 'wplook' ); ?><p>
					<?php } ?>
					<form action="<?php the_permalink(); ?>" id="contact-form" method="post">
						<p>
							<label for="contactName"></label>
							<input  type="text" name="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" placeholder="<?php _e( 'Your Name *', 'wplook' ); ?>" required/>
						</p>
						<p>
							<label for="email"></label>
							<input  type="email" name="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" placeholder="<?php _e( 'Your Email Adress*', 'wplook' ); ?>" required/>
						</p>
						<p>
							<label for="phone"></label>
							<input type="tel" name="phone" value="<?php if(isset($_POST['phone']))  echo $_POST['phone'];?>" placeholder="<?php _e( 'Phone Number', 'wplook' ); ?>" />
						</p>
						<p>
							<label for="commentsText"></label>
							<textarea class="contactme-text required requiredField" name="comments" cols="20" rows="10" placeholder="<?php _e( 'Your message goes here', 'wplook' ); ?>" required="required"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
							<?php $commentError=''; if($commentError != '') { ?>
								<span class="error"><?php $commentError;?></span>
							<?php } ?>
						</p>
						<div class="form-submit">
							<input id="submit" class="sendemail" value="<?php _e( 'Send', 'wplook' ); ?>" type="submit"></input >
							<input type="hidden" name="submitted" id="submitted" value="true" />
						</div>
					</form>
				<?php } ?>
			</div>
	
			<?php get_sidebar('contact'); ?>
			<div class="clear"></div>
		</div>
	</div>
<?php get_footer(); ?>