<?php
/**
 * The default template for displaying search results
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("list"); ?>>
	<div class="short-content">
		
		<?php if ( has_post_thumbnail() ) {?>
			<figure>
			<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('small-thumb'); ?>
				<div class="mask radius">
					<div class="mask-square"><i class="icon-link"></i></div>
				</div>
			</a>
			</figure> 
		<?php } ?>

		<h1 class="entry-header">
			<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h1>

		<div class="short-description">
			<p><?php echo wplook_short_excerpt('40');?></p>
		</div>

		<div class="entry-meta">
			<time datetime="<?php echo get_the_date( 'c' ) ?>">
				<a class="buttons time fleft" href="<?php the_permalink(); ?>"><i class="icon-calendar"></i> <?php wplook_get_date_time(); ?></a>
			</time> 

			<a class="buttons fright" href="<?php the_permalink(); ?>" title="<?php _e('read more', 'wplook'); ?>"><?php _e('read more', 'wplook'); ?></a>
		</div>
		<div class="clear"></div>

	</div>
	<div class="clear"></div>
</article>