<?php
/**
 * The default template for no results
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h3 class="entry-title">
		<?php _e("We didn't found any results for:", 'wplook'); ?> '<?php echo get_search_query(); ?>'
	</h3>
	<p><?php _e('Try again with another combination!', 'wplook'); ?></p>
	<?php get_template_part( 'searchform' ); ?>
</article>