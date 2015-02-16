<?php
/**
 * Template Name: Home Page
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0
 */
?>

<?php get_header(); ?>

<?php $wpl_sliders = ot_get_option( 'wpl_sliders', array() ); ?>
<?php if( $wpl_sliders ) : ?>
	
	<div id="teaser">
		<?php $header_image = get_header_image(); ?>
		<?php if (! empty( $header_image ) ) {?>
			<img class="header-image" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
		<?php } else { 
			get_template_part( 'inc', 'slider' );
		} ?>
	</div>

<?php endif; ?> 

<div id="main" class="site-main container_16">
	<div class="inner">
		
		<?php if (is_active_sidebar( 'front-1' ) || is_active_sidebar( 'front-2' ) || is_active_sidebar( 'front-3' ) || is_active_sidebar( 'front-4' ) || is_active_sidebar( 'front-5' ) ) { ?>
			
			<?php if ( is_active_sidebar( 'front-1' ) ) : ?>
				<!-- First Widget Area -->
				<div class="<?php echo ot_get_option('wpl_first_front_widget_size') ?> first-home-widget-area">
					<?php ! dynamic_sidebar( 'front-1' ); ?>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'front-2' ) ) : ?>
				<!-- Second Widget Area -->
				<div class="<?php echo ot_get_option('wpl_second_front_widget_size') ?> second-home-widget-area">
					<?php dynamic_sidebar( 'front-2' ); ?>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'front-3' ) ) : ?>
				<!-- Third Widget Area -->
				<div class="<?php echo ot_get_option('wpl_third_front_widget_size') ?> third-home-widget-area">
					<?php dynamic_sidebar( 'front-3' ); ?>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'front-4' ) ) : ?>
				<!-- Forth Widget Area -->
				<div class="<?php echo ot_get_option('wpl_forth_front_widget_size') ?> forth-home-widget-area">
					<?php dynamic_sidebar( 'front-4' ); ?>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'front-5' ) ) : ?>
				<!-- Fifth Widget Area -->
				<div class="<?php echo ot_get_option('wpl_fifth_front_widget_size') ?> fifth-home-widget-area">
					<?php dynamic_sidebar( 'front-5' ); ?>
				</div>
			<?php endif; ?>

		<?php }	?>

		<div class="clear"></div>
	</div>
</div>	

<?php get_footer(); ?>