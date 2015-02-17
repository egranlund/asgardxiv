<?php 
/**
 * Comments List for page/post/image
 *
 * @package WPlook
 * @subpackage Charitas
 * @since Charitas 1.0.0
*/

if ( ! function_exists( 'wplook_comment' ) ) :

function wplook_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	
	<li <?php comment_class('vcard'); ?> id="comment-<?php comment_ID(); ?>">
		
		<div class="comment-gravatar fleft">
			<?php echo get_avatar( $comment, 50 ); ?>
		</div>

		<div class="entry-header-comments">
			<div class="reply fright"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div>
			
			<?php printf( __( '%s <span class="says">says on:</span>', 'wplook' ), sprintf( '<h3 class="fn">%s</h3>', get_comment_author_link() ) ); ?> </br />
			<div class="comment-date fleft"><i class="icon-clock"></i> <?php printf( __( '%1$s at %2$s', 'wplook' ), get_comment_date(), get_comment_time() ); ?></div>
			<div class="clear"></div>
		</div>
<div class="clear"></div>
		<div class="comment-body">
			<div class="entry-content">
				<?php if ( $comment->comment_approved == '0' ) : ?>
				<div class="comment-awaiting-moderation">
					<?php _e( 'Your comment is awaiting moderation.', 'wplook' ); ?>
				</div>
				<br />
				<?php endif; ?>
				<?php comment_text(); ?>
				
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
		
	<!-- </li># comment #-->
<?php
	break;
	case 'pingback' :
	case 'trackback' :
	?>

	<li <?php comment_class(''); ?> id="trackback-<?php comment_ID(); ?>">
	<div class="comment-gravatar">
			<img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=identicon&s=50">
		</div>
		<div class="comment-body">
		<div class="entry-header-comments">
		<span class="tooltip"></span>
	
		 <span class="fn"><a><?php _e( 'Pingback/Trackback', 'wplook' ); ?></a></span>
		<span class="comment-date"><?php printf( __( '%1$s at %2$s', 'wplook' ), get_comment_date(), get_comment_time() ); ?></span>
		</div>
		<div class="entry-content">
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<div class="comment-awaiting-moderation">
				<?php _e( 'Your comment is awaiting moderation.', 'wplook' ); ?>
			</div>
			<br />
			<?php endif; ?>
			<?php comment_author_link(); ?>
		</div>
		</div>
		<div class="clear"></div>
	<!-- </li># ping #-->
<?php break; 	endswitch; 
} endif; ?>
<?php
// create new comment form
// Credits: http://snipplr.com
function wplook_comment_form( $args = array(), $post_id = null ) {
	global $user_identity, $id;
	if ( null === $post_id )
		$post_id = $id;
	else
		$id = $post_id;
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$fields =  array(

		'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', 'wplook' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
		'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
		'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email', 'wplook' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
		'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
		'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website', 'wplook' ) . '</label>' .
		'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
	);
	$required_text = sprintf( ' ' . __('Required fields are marked %s', 'wplook' ), '<span class="required"><a>*</a></span>' );
	$defaults = array(
		'fields'		=> apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field'		=> '<p class="comment-form-comment"><label for="comment">' . __( 'Comment', 'wplook' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
		'must_log_in'		=> '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'wplook' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'logged_in_as'		=> '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'wplook' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.', 'wplook' ) . ( $req ? $required_text : '' ) . '</p>',
		'id_form'						=> 'commentform',
		'id_submit'					=> 'submit',
		'title_reply'				=> __( 'Leave a Comment', 'wplook' ),
		'title_reply_to'		=> __( 'Leave a Reply to %s', 'wplook' ),
		'cancel_reply_link'	=> __( 'or Cancel reply', 'wplook' ),
		'label_submit'			=> __( 'Send Comment', 'wplook' ),
	);

	$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );	?>
		<?php if ( comments_open() ) : ?>
			<?php do_action( 'comment_form_before' ); ?>
			<div id="respond">
				<header class="page-header"><h1 class="page-_comment-title"><?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?>   <?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?></h1></header>
				<?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
					<?php echo $args['must_log_in']; ?>
					<?php do_action( 'comment_form_must_log_in_after' ); ?>
				<?php else : ?>
					<form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>">
						<?php do_action( 'comment_form_top' ); ?>
						<?php if ( is_user_logged_in() ) : ?>
							<?php echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity ); ?>
							<?php do_action( 'comment_form_logged_in_after', $commenter, $user_identity ); ?>
						<?php else : ?>
							<?php echo $args['comment_notes_before']; ?>
							<?php
							do_action( 'comment_form_before_fields' );
							foreach ( (array) $args['fields'] as $name => $field ) {
								echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";
							}
						do_action( 'comment_form_after_fields' );
						?>
						<?php endif; ?>
						<?php echo apply_filters( 'comment_form_field_comment', $args['comment_field'] ); ?>
						<?php //echo $args['comment_notes_after']; ?>
						<p class="form-submit">
							<input name="submit" type="submit" id="<?php echo esc_attr( $args['id_submit'] ); ?>" value="<?php echo esc_attr( $args['label_submit'] ); ?>" />
							<?php comment_id_fields(); ?>
						</p>
						<?php do_action( 'comment_form', $post_id ); ?>
					</form>
				<?php endif; ?>
			</div><!-- #respond -->
			<?php do_action( 'comment_form_after' ); ?>
		<?php else : ?>
			<?php do_action( 'comment_form_comments_closed' ); ?>
		<?php endif; ?>
	<?php
}