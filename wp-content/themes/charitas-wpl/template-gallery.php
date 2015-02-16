<?php
/**
 * Template Name: Gallery Page
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0.7
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
			<div id="primary" class="grid_11 suffix_1">
				
				<?php $args = array( 'post_type' => 'post_gallery','post_status' => 'publish', 'posts_per_page' => 10, 'paged'=> $paged); ?>
				<?php $wp_query = null; ?>
				<?php $wp_query = new WP_Query( $args ); ?>
				<?php if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
					<?php $goal_amount = get_post_meta(get_the_ID(), 'wpl_goal_amount', true); ?>
					<article class="list">
						<div class="short-content">

							<?php if ( has_post_thumbnail() ) {?> 
								<figure>
									<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail('small-thumb'); ?>
										<div class="mask radius">
											<div class="mask-square"><i class="icon-image"></i></div>
										</div>
									</a>
								</figure>
							<?php } ?>


							<h1 class="entry-header">
								<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h1>

							<div class="short-description">
								<p><?php echo wplook_short_excerpt(ot_get_option('wpl_events_excerpt_limit'));?></p>
							</div>

							<div class="entry-meta">
							<?php 
								$args = array(
									'post_type' 		=> 'attachment',
									'numberposts' 		=> -1,
									'post_status' 		=> null,
									'post_mime_type'	=> 'image',
									'post_parent' 		=> $post->ID,
								);
								$attachments = get_posts( $args );
								?>
								<p class="sponsors fleft"><i class="icon-images"></i><span>
									<?php
									if ( count( $attachments ) == 0 ) {
										_e('no photos in the gallery', 'wplook');
									} elseif ( count( $attachments ) == 1 ) {
										echo count( $attachments );
										 _e(' photo in the gallery', 'wplook');
									} else {
										echo count( $attachments );
										_e(' photos in the gallery', 'wplook');
									} ?> 
									</span>
								</p> 

								<a class="buttons fright " href="<?php the_permalink(); ?>" title="<?php _e('Explore the Gallery', 'wplook'); ?>"><?php _e('See more', 'wplook'); ?></a>
							</div>

							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</article>
				
				<?php endwhile; wp_reset_postdata(); ?>
				<?php else : ?>
					<p><?php _e('Sorry, no galleries matched your criteria.', 'wplook'); ?></p>
				<?php endif; ?>
				
				<?php wplook_content_navigation('postnav' ) ?>

			</div>
	
			<?php get_sidebar('gallery'); ?>
			<div class="clear"></div>
		</div>
	</div>
<?php get_footer(); ?>