<?php
/**
 * The default template for displaying Single Publication
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0.4
 */
?>

<?php get_header(); ?>
<?php $parallax_image = get_post_meta(get_the_ID(), 'wpl_parallax_image', true); ?>

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
				<?php
					$publication_file = get_post_meta(get_the_ID(), 'wpl_publication_file', true);
					$publication_file_size = get_post_meta($post->ID, 'wpl_publication_file_size', true);
				?>
				<article class="single-publication">

						<div class="entry-content">

							<?php if ( has_post_thumbnail() ) { ?>
								<figure>
										<?php the_post_thumbnail(); ?>
								</figure>
							<?php } ?>

							<div class="long-description">
								<?php the_content(); ?>
							</div>

							
							<div class="clear"></div>

						</div>
						<div class="clear"></div>
						
						<div class="entry-meta-pub">
				
							<?php $share_buttons = get_post_meta(get_the_ID(), 'wpl_share_buttons_publication', true); ?>
							<?php if ( $share_buttons !='hide' ) {
								wplook_get_share_buttons();
							} ?>

							<time class="entry-date fleft" datetime="2013-05-22T18:06:36+00:00">
								<i class="icon-calendar"></i> <?php wplook_get_date(); ?>
							</time>

							<span class="download_file_single fleft">
								<a target="_blank" href="<?php if ( $publication_file ) { echo $publication_file; } else { echo "#";} ?>"><?php if ( $publication_file_size ){  echo $publication_file_size; } else { echo "...";} ?></a>
							</span>

							<a target="_blank" class="buttons-download fright" href="<?php if ( $publication_file ) { echo $publication_file; } else { echo "#";} ?>" title="<?php _e('Download', 'wplook'); ?>"><i class="icon-download"></i> <?php _e('Download', 'wplook'); ?></a>

							<div class="clear"></div>
						</div>


						<div class="clear"></div>
					
					</article>

			<?php endwhile; endif; ?>

		</div><!-- #content -->

		<?php get_sidebar('publication'); ?>
		<div class="clear"></div>
	</div><!-- #primary -->
</div>	

<?php get_footer(); ?>