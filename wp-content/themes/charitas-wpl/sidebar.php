<?php
/**
 * The default Sidebar. It will appear on all Press/Blog pages
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0
 */
?>

<div id="secondary" class="grid_4 widget-area" role="complementary">
	<?php if ( ! dynamic_sidebar( 'post-1' ) ) : ?>
		<aside id="archives" class="widget">
			<div class="widget-title">	<h3><?php _e( 'Archives', 'wplook' ); ?></h3>
			<div class="right-corner"></div></div>
			<ul>
				<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
			</ul>
		</aside>
		<aside id="meta" class="widget">
			<div class="widget-title">	<h3><?php _e( 'Meta', 'wplook' ); ?></h3>
			<div class="right-corner"></div></div>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>
			</ul>
		</aside>
	<?php endif; // end sidebar widget area ?>
</div>