<?php
/**
 * The default Sidebar. It will appear on all Gallery pages
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0.7
 */
?>
<?php if ( is_active_sidebar( 'gallery-1' ) ) : ?>
	<div id="secondary" class="grid_4 widget-area" role="complementary">
		<?php if ( ! dynamic_sidebar( 'gallery-1' ) ) : ?>
		<?php endif; // end sidebar widget area ?>
	</div>
<?php endif; ?>