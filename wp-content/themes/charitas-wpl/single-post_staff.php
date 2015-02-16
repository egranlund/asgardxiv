<?php
/**
 * The default template for displaying Single Candidate
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0
 */
?>

<?php get_header(); ?>
<?php 
	$parallax_image = get_post_meta(get_the_ID(), 'wpl_parallax_image', true); 
	$candidate_position = get_post_meta(get_the_ID(), 'wpl_candidate_position', true);
	$candidate_phone = get_post_meta(get_the_ID(), 'wpl_candidate_phone', true);
	$candidate_email = get_post_meta(get_the_ID(), 'wpl_candidate_email', true);
	$candidate_blog = get_post_meta(get_the_ID(), 'wpl_candidate_blog', true);
	$candidate_share_items = get_post_meta($post->ID, 'candidate_share', true);
?>

<?php while ( have_posts() ) : the_post(); // start of the loop.?>
	
	<?php if( $parallax_image ) { ?>
		<div class="item teaser-page" style="background: transparent url(<?php echo $parallax_image ?>) 0px -100px fixed no-repeat; ">
	<?php } else {?>
		<div class="item teaser-page-list">
	<?php } ?>
	
		<div class="container_16">
			<aside class="grid_10">
				<h1 class="page-title"><?php the_title() ?></h1>
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

<?php endwhile; // end of the loop. ?>

<div id="main" class="site-main container_16">
	<div class="inner">
		<div id="primary" class="grid_11 suffix_1">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			
				<article class="single">
					<div class="candidate radius grid_6">
						<div class="candidate-margins">
							
							<?php if ( has_post_thumbnail() ) {?> 
									<?php the_post_thumbnail('candidate-thumb'); ?>
							<?php } ?>
							<div class="name"><?php the_title(); ?></div>
							<div class="position"><?php echo $candidate_position; ?></div>
							<div class="social-icons">
							
								<?php if ( ! empty( $candidate_share_items ) ) {
									foreach( $candidate_share_items as $item ) { ?>
										<a class="i-<?php echo $item['wpl_share_item_icon']; ?> radius" href="<?php echo $item['wpl_share_item_url']; ?>"><i class="<?php echo $item['wpl_share_item_icon']; ?>"></i></a>
									<?php }
								} ?>
							</div>
							
						</div>
					</div>

					<div class="candidate-about fright">
						<ul class="candidate-detailes">
								<?php if ( $candidate_position ) { ?>
									<li><i class="icon-user"></i> <?php echo $candidate_position; ?></li>
								<?php } ?>

								<?php if ( wplook_custom_taxonomies_terms_links() ) { ?>
									<li><i class="icon-folder"></i> <?php echo wplook_custom_taxonomies_terms_links(); ?></li>
								<?php } ?>

								<?php if ($candidate_phone) { ?>
									<li><i class="icon-phone"></i> <?php echo $candidate_phone; ?></li>
								<?php } ?>

								<?php if ($candidate_email) { ?>
									<li><i class="icon-envelope"></i> <a href="mailto:<?php echo $candidate_email; ?>"><?php echo $candidate_email; ?></a></li>
								<?php } ?>

								<?php if ($candidate_blog) { ?>
									<li><i class="icon-link"></i> <a href="<?php echo $candidate_blog; ?>"><?php echo $candidate_blog; ?></a></li>
								<?php } ?>
								

							</ul>

						<?php the_content(); ?>
					</div>
					<div class="clear"></div>
				</article>

			<?php endwhile; endif; ?>

		</div><!-- #content -->

		<?php get_sidebar('staff'); ?>
		<div class="clear"></div>
	</div><!-- #primary -->
</div>	

<?php get_footer(); ?>