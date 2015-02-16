<?php
/**
 * The default template for displaying Single pages
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0
 */
?>

<?php get_header(); ?>


<?php 
$parallax_image = get_post_meta(get_the_ID(), 'wpl_parallax_image', true);
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
			<?php get_template_part('content', 'page' ); ?>
		</div><!-- #content -->
		<?php if ($page_width == 'display') { 
			get_sidebar('page');
		} ?>

		<div class="clear"></div>
	</div><!-- #primary -->
</div>	

<?php get_footer(); ?>