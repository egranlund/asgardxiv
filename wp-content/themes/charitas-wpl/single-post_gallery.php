<?php
/**
 * The default template for displaying Single causes
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0
 */
?>

<?php get_header(); ?>
<?php
$parallax_image = get_post_meta(get_the_ID(), 'wpl_parallax_image', true);
$goal_amount = get_post_meta(get_the_ID(), 'wpl_goal_amount', true);
$page_width = get_post_meta(get_the_ID(), 'wpl_sidebar_option', true);

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
		<div id="primary" class="<?php if ( $page_width == 'display' ) { echo 'grid_11 suffix_1'; } else { echo 'grid_16'; } ?>">


			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article class="single">
					<div class="entry-content">
						
						<div class="long-description">
							<?php 
								$args = array(
									'post_type' 		=> 'attachment',
									'numberposts' 		=> null,
									'post_status' 		=> null,
									'post_mime_type'	=> 'image',
									'orderby'       	=> 'menu_order ID',
									'post_parent' 		=> $post->ID,
									'posts_per_page'	=> '9999'
								);
								$attachments = get_posts( $args );

							?>
							<?php if(count( $attachments ) > 1) { ?>
						
							<div class="flexslider-gallery loading">
								<ul class="slides">
									<?php foreach ( $attachments as $attachment ) { ?>
									<?php
										$image_attributes = wp_get_attachment_image_src( $attachment->ID, 'thumbnail' )  ? wp_get_attachment_image_src( $attachment->ID, 'thumbnail' ) : wp_get_attachment_image_src( $attachment->ID, 'full' );
									?>
									<li><?php echo wp_get_attachment_image( $attachment->ID, 'big-thumb' ); ?></li>
									<?php } ?>
								</ul>
								<div class="clear"></div>
							</div>
							
							<div id="flexslider-gallery-carousel" class="flexslider-gallery-carousel">
								<ul class="slides">
									<?php foreach ( $attachments as $attachment ) { ?>
									<?php
										$image_attributes = wp_get_attachment_image_src( $attachment->ID, 'small-thumb' )  ? wp_get_attachment_image_src( $attachment->ID, 'small-thumb' ) : wp_get_attachment_image_src( $attachment->ID, 'small-thumb' );
									?>
									<li><?php echo wp_get_attachment_image( $attachment->ID, 'small-thumb' ); ?></li>
									<?php } ?>
								</ul>
							</div>

							<?php } else { ?>
								<?php if(has_post_thumbnail()) { ?>
									<figure>
										<?php the_post_thumbnail('big-thumb'); ?>
									</figure> 
								<?php } 
							} ?>
							
							<div class="clear"></div>
							<?php the_content(); ?>
						</div>
						
						<div class="clear"></div>
						
						<div class="entry-meta-press">
				
							<?php $share_buttons = get_post_meta(get_the_ID(), 'wpl_share_buttons_gallery', true); ?>
							<?php if ( $share_buttons !='hide' ) {
								wplook_get_share_buttons();
							} ?>

							<time class="entry-date fleft" datetime="2013-05-22T18:06:36+00:00">
								<i class="icon-calendar"></i> <?php wplook_get_date_time(); ?>
							</time>

							<div class="author-i">
								<i class="icon-user"></i> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a>
							</div>
							<div class="clear"></div>
						</div>
					</div>

				</article>

			<?php endwhile; endif; ?>

		</div><!-- #content -->
		<?php if ($page_width == 'display') { 
			get_sidebar('gallery');
		} ?>
		<div class="clear"></div>
	</div><!-- #primary -->
</div>	

<?php get_footer(); ?>