<?php
/**
 * The default Sidebar. It will appear on all causes
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0
 */
?>
<?php if ( is_active_sidebar( 'cause-1' ) ) : ?>
	<div id="secondary" class="grid_4 widget-area" role="complementary">
		<?php if ( ! dynamic_sidebar( 'cause-1' ) ) : ?>
		<?php endif; // end sidebar widget area ?>
	</div>
<?php endif; ?>