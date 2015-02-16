<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0
 */

?>
<?php if( is_single()) { ?>

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
	<article id="post-<?php the_ID(); ?>" <?php post_class("single"); ?>>
						
			<div class="entry-content">
				
				<div class="clear"></div>

				<div class="long-description">
				
					
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

					<?php } else { ?>
						<?php if(has_post_thumbnail()) { ?>
							<figure>
								<?php the_post_thumbnail('big-thumb'); ?>
							</figure> 
						<?php } 
					} ?>

					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="clear"></div><div class="page-link"><span>' . __( 'Pages:', 'wplook' ) . '</span>', 'after' => '</div>' ) ); ?>
				</div>

				
				<div class="clear"></div>
				
				<div class="entry-meta-press">
					
					<?php $share_buttons = get_post_meta(get_the_ID(), 'wpl_share_buttons', true); ?>
					<?php if ( $share_buttons !='hide' ) {
						wplook_get_share_buttons();
					} ?>

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

		<?php comments_template( '', true ); ?>

<?php } else { ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class("list"); ?>>
		<div class="short-content">
			
			<?php if ( has_post_thumbnail() ) {?>
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
				<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h1>

			<div class="short-description">
				<p><?php echo wplook_short_excerpt('40');?></p>
				<?php wp_link_pages( array( 'before' => '<div class="clear"></div><div class="page-link"><span>' . __( 'Pages:', 'wplook' ) . '</span>', 'after' => '</div>' ) ); ?>
			</div>
			
			<div class="entry-meta">
				<time datetime="<?php echo get_the_date( 'c' ) ?>">
					<a class="buttons time fleft" href="<?php the_permalink(); ?>"><i class="icon-calendar"></i> <?php wplook_get_date_time(); ?></a>
				</time> 
				<a class="buttons author fleft" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><i class="icon-user"></i> <?php echo get_the_author(); ?></a> 
				<a class="buttons fright" href="<?php the_permalink(); ?>" title="<?php _e('read more', 'wplook'); ?>"><?php _e('read more', 'wplook'); ?></a>
			</div>
			<div class="clear"></div>

		</div>
		<div class="clear"></div>
	</article>
<?php } ?>	