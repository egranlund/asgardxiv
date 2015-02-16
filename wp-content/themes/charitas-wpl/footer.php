<?php
/**
 * The footer template
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0
 */
?>
	
	<div id="footer-widget-area">
		
	<!-- Footer -->
		<footer id="colophon" class="site-footer" role="contentinfo">
			
			<div id="tertiary" class="sidebar-container" role="complementary">
				<?php if (is_active_sidebar( 'f1-widgets' ) || is_active_sidebar( 'f2-widgets' ) || is_active_sidebar( 'f3-widgets' ) || is_active_sidebar( 'f4-widgets' ) ) { ?>
					<div class="container_16">
						
						<?php if ( is_active_sidebar( 'f1-widgets' ) ) : ?>					
							<!-- First Widget Area -->
							<div class="grid_4">
								<?php dynamic_sidebar( 'f1-widgets' ); ?>
							</div>
						<?php endif; ?>

						<?php if ( is_active_sidebar( 'f2-widgets' ) ) : ?>					
							<!-- Second Widget Area -->
							<div class="grid_4">
								<?php dynamic_sidebar( 'f2-widgets' ); ?>
							</div>
						<?php endif; ?>

						<?php if ( is_active_sidebar( 'f3-widgets' ) ) : ?>					
							<!-- Third Widget Area -->
							<div class="grid_4">
								<?php dynamic_sidebar( 'f3-widgets' ); ?>
							</div>
						<?php endif; ?>

						<?php if ( is_active_sidebar( 'f4-widgets' ) ) : ?>					
							<!-- Forth Widget Area -->
							<div class="grid_4">
								<?php dynamic_sidebar( 'f4-widgets' ); ?>
							</div>
						<?php endif; ?>

						<div class="clear"></div>
					</div>
				<?php }	?>

			</div>

			<!-- Site Info -->
			<div class="site-info">
				<div class="container_16">
					
					<!-- CopyRight -->
					<div class="grid_8">
						<p class="copy">
							<?php if ( ot_get_option('wpl_copyright') ){
								echo ot_get_option('wpl_copyright');
							} ?>
						</p>
					</div>
					
					<!-- Design By -->
					<div class="grid_8">
						<p class="designby"><?php _e('Designed by', 'wplook'); ?> <a href="http://themeforest.net/item/charitas-foundation-wordpress-theme/5150694<?php if ( ot_get_option('wpl_affiliate') ) { ?>?ref=<?php echo ot_get_option('wpl_affiliate'); } else {echo "?ref=wplook";} ?>" title="<?php _e('WPlook', 'wplook'); ?>" target="_blank">WPlook</a></p>
					</div>

					<div class="clear"></div>
				</div>
			</div><!-- .site-info -->
		</footer><!-- #colophon .site-footer -->

	</div>
	<!-- /#page -->

	<?php if ( ot_get_option('wpl_google_analytics_tracking_code') ) {
		// Google Analytics Tracking Code
		echo ot_get_option('wpl_google_analytics_tracking_code');
	} ?>

	<?php wp_footer(); ?>
</body>
</html>