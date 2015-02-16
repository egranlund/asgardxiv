<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0
 */
?>

<?php get_header(); ?>

<?php if( is_home() ) { ?>
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
<?php } else { ?>
	<div class="item teaser-page-list">
		<div class="container_16">
			<aside class="grid_10">
				<?php wplook_doctitle(); ?>
			</aside>
			<div class="grid_6">
				<div id="rootline">
					<?php wplook_breadcrumbs(); ?>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
<?php } ?>
<div id="main" class="site-main container_16">
	<div class="inner">
		<div id="primary" class="grid_11 suffix_1">
			<?php if ( is_home() ) { ?>
				<div class="widget-title">
					<h3><?php _e('Latest posts', 'wplook'); ?></h3>
					<div class="clear"></div>
				</div>
			<?php } ?>
			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
				<?php endwhile; ?>

				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>

			<?php wplook_content_navigation('postnav' ) ?>
		</div>
		<?php get_sidebar(); ?>
		<div class="clear"></div>
	</div>
</div>
<?php get_footer(); ?>