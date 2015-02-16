<?php
/**
 * Template Name: Past events
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
			<div id="primary" class="grid_11 suffix_1">
				<?php $args = array(
					'post_type' => 'post_events', 
					'posts_per_page' => 10, 
					'paged'=> $paged, 
					'meta_key' => 'wpl_event_date', 
					'orderby' => 'meta_value',
					'order' => 'DESC',
					'meta_compare' => '<',
					'meta_value' => date_i18n('Y-m-d')
				); ?>
				
				<?php $wp_query = null;
				$wp_query = new WP_Query( $args );

				if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();?>
					
				<?php
					$event_date = get_post_meta(get_the_ID(), 'wpl_event_date', true);
					$event_time = get_post_meta($post->ID, 'wpl_event_time', true);
					$event_url = get_post_meta(get_the_ID(), 'wpl_event_url', true);
				?>
				
				<article class="list vevent">
						<div class="short-content">
							<?php if ( has_post_thumbnail() ) { ?>
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
								<a class="url summary" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h1>

							<div class="short-description description">
								<p><?php echo wplook_short_excerpt(ot_get_option('wpl_events_excerpt_limit'));?></p>
							</div>

							<div class="entry-meta">
								<time class="dtstart" datetime="<?php echo date('c',strtotime($event_date)); ?>"><a class="buttons time fleft" href="<?php the_permalink(); ?>"><i class="icon-calendar"></i> <?php echo date_i18n( get_option('date_format'), strtotime($event_date) ); ?> <?php _e('at', 'wplook'); ?> <?php echo $event_time; ?></a></time> 
								<?php if ( $event_url != "") { ?>
									<a class="buttons facebook fleft" href="<?php echo $event_url; ?>"><i class="icon-facebook"></i> <?php _e('Facebook', 'wplook'); ?></a> 
								<?php } ?>
								<a class="buttons fright" href="<?php the_permalink(); ?>" title="<?php _e('Join us', 'wplook'); ?>"><?php _e('Read more', 'wplook'); ?></a>
							</div>
							<div class="clear"></div>

						</div>
						<div class="clear"></div>
					</article>
				<?php endwhile; wp_reset_postdata(); ?>
				<?php else : ?>
					<p><?php _e('Sorry, no events matched your criteria.', 'wplook'); ?></p>
				<?php endif; ?>
				<?php wplook_content_navigation('postnav' ) ?>
			</div>
	
			<?php get_sidebar('events'); ?>
			<div class="clear"></div>
		</div>
	</div>
<?php get_footer(); ?>