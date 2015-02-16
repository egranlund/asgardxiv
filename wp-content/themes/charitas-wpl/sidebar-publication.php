<?php
/**
 * The default Sidebar. It will appear on all publication pages
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0.4
 */
?>
<?php if ( is_active_sidebar( 'publication-1' ) ) : ?>
	<div id="secondary" class="grid_4 widget-area" role="complementary">
		<?php if ( ! dynamic_sidebar( 'publication-1' ) ) : ?>
		<?php endif; // end sidebar widget area ?>
	</div>
<?php endif; ?>