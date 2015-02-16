<?php
/**
 * The default template for displaying Single causes
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0
 */
?>

<?php get_header(); ?>
<?php $parallax_image = get_post_meta(get_the_ID(), 'wpl_parallax_image', true); ?>
<?php 

 /*-----------------------------------------------------------
 	Form
 -----------------------------------------------------------*/

$nameError = '';
$emailError = ''; 
$commentError  = '';
$pagetitle = get_the_title();
$pagelink = get_permalink();
//If the form is submitted
if(isset($_POST['submitted'])) {
$name = trim($_POST['contactName']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$comments = trim($_POST['comments']);
	if(!isset($hasError)) {
		$emailTo = ot_get_option('wpl_events_email');
		if (!isset($emailTo) || ($emailTo == '') ){
			$emailTo = get_option('admin_email');
		}
		$subject = 'New message From: '.$name;
		$body = "I want to Join the event: $pagetitle \n $pagelink \n\nMy name is: $name \n\nMy Email is: $email \n\nMy phone number is: $phone \n\nMy comments: $comments";
		$headers = 'From: '.$name.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;
 
		mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}
} //end form ?>


<?php while ( have_posts() ) : the_post(); // start of the loop.?>
	
	<?php if( $parallax_image ) { ?>
		<div class="item teaser-page" style="background: transparent url(<?php echo $parallax_image ?>) 0px -100px fixed no-repeat; ">
	<?php } else {?>
		<div class="item teaser-page-list">
	<?php } ?>
	
		<div class="container_16">
			<aside class="grid_10">
				<h1 class="page-title"><?php the_title() ?></h1>
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

<?php endwhile; // end of the loop. ?>

<div id="main" class="site-main container_16">
	<div class="inner">
		<div id="primary" class="grid_11 suffix_1">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php
					$event_date = get_post_meta(get_the_ID(), 'wpl_event_date', true);
					$event_time = get_post_meta($post->ID, 'wpl_event_time', true);
					$event_url = get_post_meta(get_the_ID(), 'wpl_event_url', true);
					$event_location = get_post_meta(get_the_ID(), 'wpl_event_location', true);
					$event_address = get_post_meta(get_the_ID(), 'wpl_event_address', true);

					$event_lat = get_post_meta(get_the_ID(), 'wpl_event_latitude', true);
					$event_lng = get_post_meta(get_the_ID(), 'wpl_event_longitude', true);
					$event_pin = get_post_meta(get_the_ID(), 'wpl_event_pin_map_icon', true);
				?>
				<article class="single">
						
						<div class="event-info radius">
							
							<div class="month-time fleft">
								<span class="day fleft"><?php echo date('d',strtotime($event_date)); ?></span>
								<span class="month"><?php echo date_i18n('F, Y',strtotime($event_date)); ?></span><br />
								<span class="stime"><strong><?php echo $event_time; ?></strong></span>
							</div>
							

							<?php if ($event_address != '' || $event_location != '' ) { ?>
								<span class="event-address fleft">
									<span class="event-location fleft">
										<i class="icon-location2"></i>
									</span>
									<?php if ( $event_location ) { ?>
										<strong><?php echo $event_location ?></strong>,
									<?php } ?>
									
									<?php if ( $event_address ) { ?>
										<?php echo $event_address ?>
									<?php } ?>

								</span>
							<?php } ?>

							<a class="buttons bookplace fright radius"><i class="icon-signup"></i> <?php _e('Join us', 'wplook'); ?></a>
							
							<?php if ( $event_url ){ ?>
								<a class="buttons facebook fright radius" href="<?php echo $event_url; ?>"><i class="icon-facebook"></i> <?php _e('Facebook', 'wplook'); ?></a>
							<?php } ?>
							
							<div class="clear"></div>
							
							<?php if ( $event_lat !='' && $event_lng != '') {?>
							
							
								<div class="event-map">
									<h3><?php _e('Browse map', 'wplook'); ?></h3><br />
									<script type="text/javascript">
										function initialize() {
											var mapOptions = {
												center: new google.maps.LatLng(<?php echo $event_lat; ?>, <?php echo $event_lng ?>),
												zoom: 15,
												mapTypeId: google.maps.MapTypeId.ROADMAP,
											};
											var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
											
											var image = '<?php echo $event_pin; ?>';

											var myLatLng = new google.maps.LatLng(<?php echo $event_lat; ?>, <?php echo $event_lng ?>);
											var beachMarker = new google.maps.Marker({
												position: myLatLng,
												map: map,
												icon: image
											});
										}
										google.maps.event.addDomListener(window, 'load', initialize);
									</script>
									<div id="map-canvas"></div>
									
								</div>
							<?php } ?>

							<div class="book-your-place">
								
								<h3><?php _e('Join us:', 'wplook'); ?></h3><br />
								<form action="<?php the_permalink(); ?>" id="reservation-form" method="post">

									<p>
										<label for="contactName"></label>
										<input class="radius"  type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" placeholder="<?php _e( 'Your Name *', 'wplook' ); ?>" required/>
									</p>
									<p>
										<label for="email"></label>
										<input class="radius" type="email" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" placeholder="<?php _e( 'Your Email Adress *', 'wplook' ); ?>" required/>
									</p>
									<p>
										<label for="phone"></label>
										<input class="radius" type="tel" name="phone" id="phone" value="<?php if(isset($_POST['phone']))  echo $_POST['phone'];?>" placeholder="<?php _e( 'Phone Number*', 'wplook' ); ?>" required/>
									</p>
									<p>
										<label for="commentsText"></label>
										<textarea class="contactme-text required requiredField radius" name="comments" cols="20" rows="5" placeholder="<?php _e( 'Your message goes here', 'wplook' ); ?>" required="required"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
										<?php $commentError=''; if($commentError != '') { ?>
											<span class="error"><?php $commentError;?></span>
										<?php } ?>	
									</p>
									<p>
										<input  class="buttons radius send" value="<?php _e( 'Send !', 'wplook' ); ?>" type="submit"></input>
										<input type="hidden" name="submitted" id="submitted" value="true" />
									</p>
								</form>


							</div>
						</div>

						<div class="entry-content">

							<?php if ( has_post_thumbnail() ) { ?>
								<figure>
										<?php the_post_thumbnail('big-thumb'); ?>
								</figure>
							<?php } ?>

							<div class="long-description">
								<?php the_content(); ?>
							</div>

							
							<div class="clear"></div>

						</div>
						<div class="clear"></div>

						<?php $share_buttons = get_post_meta(get_the_ID(), 'wpl_share_buttons_events', true); ?>
						
						<?php if ( $share_buttons !='hide' ) {
							wplook_get_share_buttons();
						} ?>

						<div class="clear"></div>
					
					</article>

			<?php endwhile; endif; ?>

		</div><!-- #content -->

		<?php get_sidebar('events'); ?>
		<div class="clear"></div>
	</div><!-- #primary -->
</div>	

<?php get_footer(); ?>