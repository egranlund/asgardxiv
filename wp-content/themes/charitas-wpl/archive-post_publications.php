<?php
/**
 * The default template for displaying publications archive
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0.4
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
		<div id="primary" class="grid_11 suffix_1">
			
			<?php if ( have_posts() ) : while (have_posts() ) : the_post(); ?>
				<?php
					$publication_file = get_post_meta(get_the_ID(), 'wpl_publication_file', true);
					$publication_file_size = get_post_meta($post->ID, 'wpl_publication_file_size', true);
				?>

				<article class="list pub">
					<div class="short-content">
						<?php if ( has_post_thumbnail() ) { ?>
							<figure>
								<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('publications-thumb'); ?>
									<div class="mask radius">
										<div class="mask-square"><i class="icon-download"></i></div>
									</div>
								</a>
							</figure>
						<?php } ?>

						<h1 class="entry-header">
							<a class="url summary" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h1>

						<div class="short-description description">
							<?php the_excerpt(); ?>
						</div>

						<div class="entry-meta">
							<time class="dtstart" datetime=""><a class="buttons time fleft" href="<?php the_permalink(); ?>"><i class="icon-calendar"></i> <?php wplook_get_date(); ?></a></time> 
							<span class="download_file fleft">
								<a target="_blank" href="<?php if ( $publication_file ) { echo $publication_file; } else { echo "#";} ?>"><?php if ( $publication_file_size ){  echo $publication_file_size; } else { echo "...";} ?></a>
							</span>
							<a class="buttons fright" href="<?php the_permalink(); ?>" title="<?php _e('Download', 'wplook'); ?>"><?php _e('Download', 'wplook'); ?></a>
						</div>
						<div class="clear"></div>

					</div>
					<div class="clear"></div>
				</article>
			
			<?php endwhile; wp_reset_postdata(); ?>
			<?php else : ?>
				<p><?php _e('Sorry, no publications matched your criteria.', 'wplook'); ?></p>
			<?php endif; ?>
			
			<?php wplook_content_navigation('postnav' ) ?>

		</div>

		<?php get_sidebar('publication'); ?>
		<div class="clear"></div>
	</div>
</div>

<?php get_footer(); ?>