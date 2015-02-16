<?php
/**
 * The default template for displaying staff archive
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0
 */
?>

<?php get_header(); ?>
<div class="item teaser-page-list">
	<div class="container_16">
		<aside class="grid_10">
			<h1 class="page-title"><?php single_cat_title(); ?></h1>
		</aside>
		<?php if ( ot_get_option('wpl_breadcrumbs') != "false") { ?>
			<div class="grid_6">
				<div id="rootline">
					<?php wplook_breadcrumbs(); ?>	
				</div>
			</div>
		<?php } ?>
		<div class="clear"></div>
	</div>
</div>

<div id="main" class="site-main container_16">
	<div class="inner">
		<?php if ( have_posts() ) : while (have_posts() ) : the_post(); ?>
			<?php 
				
				$candidate_position = get_post_meta(get_the_ID(), 'wpl_candidate_position', true);
				$candidate_phone = get_post_meta(get_the_ID(), 'wpl_candidate_phone', true);
				$candidate_email = get_post_meta(get_the_ID(), 'wpl_candidate_email', true);
				$candidate_blog = get_post_meta(get_the_ID(), 'wpl_candidate_blog', true);
				$candidate_share_items = get_post_meta($post->ID, 'candidate_share', true);
			?>
			<div class="candidate radius grid_4">
				<div class="candidate-margins">
					<a href="<?php the_permalink(); ?>">
						<?php if ( has_post_thumbnail() ) {?> 
								<?php the_post_thumbnail('candidate-thumb'); ?>
						<?php } ?>
						<div class="name"><?php the_title(); ?></div>
						<?php if ( $candidate_position ) { ?>
							<div class="position"><?php echo $candidate_position; ?></div>
						<?php } ?>
					</a>	
				</div>
			</div>
		
		<?php endwhile; wp_reset_postdata(); ?>
		<?php else : ?>
			<p><?php _e('Sorry, no Staff matched your criteria.', 'wplook'); ?></p>
		<?php endif; ?>
		<div class="clear"></div>
		<?php wplook_content_navigation('postnav' ) ?>
		<div class="clear"></div>
	</div>
</div>	

<?php get_footer(); ?>