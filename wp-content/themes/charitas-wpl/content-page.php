<?php
/**
 * The default template for displaying content for pages
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0
 */
?>

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>
	
		<article id="post-<?php the_ID(); ?>" <?php post_class("single"); ?>>
						
			<div class="entry-content">
				<?php if(has_post_thumbnail()) { ?>
					<figure>
						<?php the_post_thumbnail('big-thumb'); ?>
					</figure> 
				<?php } ?>

				<div class="clear"></div>

				<div class="long-description">
					<?php the_content(); ?>
				</div>

				<div class="clear"></div>
				
			</div>

			<div class="clear"></div>
					
		</article>
	
<?php endwhile;  endif; ?>