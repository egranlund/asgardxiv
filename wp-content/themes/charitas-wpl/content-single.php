<?php
/**
 * The default template for displaying Single posts
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
					<?php wp_link_pages( array( 'before' => '<div class="clear"></div><div class="page-link"><span>' . __( 'Pages:', 'wplook' ) . '</span>', 'after' => '</div>' ) ); ?>
				</div>

				
				<div class="clear"></div>
				
				<div class="entry-meta-press">

					<time class="entry-date fleft" datetime="2013-05-22T18:06:36+00:00">
						<i class="icon-calendar"></i> <?php wplook_get_date_time(); ?>
					</time>

					<div class="category-i fleft">
						<i class="icon-folder"></i> <?php the_category(', ') ?>
					</div>
					
					<?php if ( get_the_tag_list( '', ', ' ) ) { ?>
						<div class="tag-i fleft"> 
							<i class="icon-tags"></i> <a href="#" rel="tag"><?php echo get_the_tag_list('',', ',''); ?></a> 
						</div>
					<?php } ?>

					<div class="author-i">
						<i class="icon-user"></i> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a>
					</div>
					<div class="clear"></div>
				</div>

			</div>

			<div class="clear"></div>
					
		</article>
	
<?php endwhile;  endif; ?>

<?php comments_template( '', true ); ?>