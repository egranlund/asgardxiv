<?php
/**
 * Template Name: Staff Page
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
				<h1 class="page-title"><?php the_title(); ?></h1>
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
				<?php $args = array( 'post_type' => 'post_staff','post_status' => 'publish', 'posts_per_page' => 100, 'paged'=> $paged); ?>
				<?php $wp_query = null; ?>
				<?php $wp_query = new WP_Query( $args ); ?>
				<?php if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
				<?php $candidate_position = get_post_meta(get_the_ID(), 'wpl_candidate_position', true); ?>
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
		</div>
	</div>
<?php get_footer(); ?>