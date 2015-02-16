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

		<?php
			$args=array(
				'meta_key'=>'wpl_pledge_cause',
				'meta_value'=> $post->ID,
				'post_type' => 'post_pledges',
				'post_status' => 'publish',
				'posts_per_page' => -1,
				'meta_query' => array(
					array(
						'key' => 'wpl_pledge_payment_Status',
						'value' => 'Completed',
						'compare' => 'IN',
					),
					/*array(
						'key' => 'wpl_pledge_first_name',
						'value' => '',
						'compare' => 'IN',
					)*/
				)
			);

			$my_query = null;
			$my_query = new WP_Query($args);
				
				$donations_number = 0;
				$donations_raised = 0;

			if( $my_query->have_posts() ) {
			 


			  while ($my_query->have_posts()) : $my_query->the_post(); 
				$don = get_post_meta(get_the_ID(), 'wpl_pledge_donation_amount', true);
				$trz = get_post_meta(get_the_ID(), 'wpl_pledge_payment_source', true);

					$donations_raised += $don;
					$donations_number++;

			  endwhile;
			  
			}
			wp_reset_query();  // Restore global post data stomped by the_post().
			?>	

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article class="single">
					<div class="entry-content">
						
						<?php if ( has_post_thumbnail() ) { ?>
							<figure>
								<?php the_post_thumbnail('big-thumb'); ?>
								<div class="mask-open radius">
									<div class="square-info radius">
										<div class="square-info-margins">
											<?php if ( $goal_amount !='' && $goal_amount !='0' ) { ?>
												<div class="progress-detailes">
													<span class="progress-percent radius fleft"><?php echo formatMoney($percentage = $donations_raised * 100 / $goal_amount, true) ?>%<span class="arrow"></span></span>
													<span class="progress-money radius fright"><?php echo ot_get_option('wpl_curency_sign') ?><?php echo formatMoney($goal_amount); ?><span class="arrow"></span></span>
													<div class="clear"></div>
												</div>
												<progress max="100" value="<?php echo $percentage; ?>"></progress>
											<?php } ?>	

											<div class="meta fleft">
												<p class="sponsors"><i class="icon-heart2"></i> <?php echo $donations_number; ?> <?php _e('Sponsors', 'wplook'); ?></p> 
												<p class="fund"><i class="icon-credit"></i> <?php echo ot_get_option('wpl_curency_sign') ?><?php echo formatMoney($donations_raised); ?> </p>
											</div>
											<div class="fright">
                                            	<?php if ( ot_get_option('wpl_activate_paypal') == "activated") { ?>
												<a class="donate_now buttons fright" title="<?php _e('Donate for this Cause', 'wplook'); ?>"><?php _e('Donate', 'wplook'); ?> <i class="icon-heart"></i></a>
                                                <?php } ?>
											</div>
											<div class="clear"></div>
										</div>
									</div>
								</div>
							</figure> 
						<?php } ?>
						
						<?php if (! has_post_thumbnail() ) { ?>
								<div class="mask-open radius">
									<div class="square-info full radius">
										<div class="square-info-margins">
											<?php if ( $goal_amount !='' && $goal_amount !='0' ) { ?>
												<div class="progress-detailes">
													<span class="progress-percent radius fleft"><?php echo formatMoney($percentage = $donations_raised * 100 / $goal_amount, true) ?>%<span class="arrow"></span></span>
													<span class="progress-money radius fright"><?php echo ot_get_option('wpl_curency_sign') ?><?php echo formatMoney($goal_amount); ?><span class="arrow"></span></span>
													<div class="clear"></div>
												</div>
												<progress max="100" value="<?php echo $percentage; ?>"></progress>
											<?php } ?>	

											<div class="meta fleft">
												<p class="sponsors"><i class="icon-heart2"></i> <?php echo $donations_number; ?> <?php _e('Sponsors', 'wplook'); ?></p> 
												<p class="fund"><i class="icon-credit"></i> <?php echo ot_get_option('wpl_curency_sign') ?><?php echo formatMoney($donations_raised); ?> </p>
											</div>
											<div class="fright">
                                            	<?php if ( ot_get_option('wpl_activate_paypal') == "activated") { ?>
												<a class="donate_now buttons fright" title="<?php _e('Donate for this Cause', 'wplook'); ?>"><?php _e('Donate', 'wplook'); ?> <i class="icon-heart"></i></a>
                                                <?php } ?>
											</div>
											<div class="clear"></div>
										</div>
									</div>
								</div>
						<?php } ?>

						<div class="paymend_detailes">
							<?php if ( ot_get_option('wpl_activate_paypal') == "activated") { ?>
								<div class="toggle-content-donation">
									<div class="expand-button"><p><?php _e('PayPal', 'wplook'); ?></p></div>
									<div class="expand">
										<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
											<h2 class="donate-amoung"><?php _e('Donation amount', 'wplook'); ?></h2>
											


											<?php if ( ot_get_option('wpl_default_first_amount') != "") { ?>
												<label>
													<input name="amount" type="radio" value="<?php echo ot_get_option('wpl_default_first_amount') ?>"><span><?php echo ot_get_option('wpl_curency_sign') ?><?php echo ot_get_option('wpl_default_first_amount') ?></span>
												</label>
											<?php } ?>

											<?php if ( ot_get_option('wpl_default_second_amount') != "") { ?>
												<label>
													<input name="amount" type="radio" value="<?php echo ot_get_option('wpl_default_second_amount') ?>"><span><?php echo ot_get_option('wpl_curency_sign') ?><?php echo ot_get_option('wpl_default_second_amount') ?></span>
												</label>
											<?php } ?>

											<?php if ( ot_get_option('wpl_default_third_amount') != "") { ?>
												<label>
													<input name="amount" type="radio" value="<?php echo ot_get_option('wpl_default_third_amount') ?>"><span><?php echo ot_get_option('wpl_curency_sign') ?><?php echo ot_get_option('wpl_default_third_amount') ?></span>
												</label>
											<?php } ?>


											<label>
												<input name="amount" type="number" min="<?php echo ot_get_option('wpl_min_amount') ?>" placeholder="<?php _e('Custom Amount in', 'wplook'); ?> <?php echo ot_get_option('wpl_curency_code') ?>" title="<?php _e('Custom Amount', 'wplook'); ?>">
											</label>


											<label>
												<input type="hidden" name="cmd" value="_xclick">
											</label>


											<label>
												<input type="hidden" name="business" value="<?php echo ot_get_option('wpl_paypal_email') ?>">
											</label>

											<label>
												<input type="hidden" name="item_name" value="Donation for <?php the_title(); ?>">
											</label>
											<label>
												<input type="hidden" name="item_number" value="<?php echo get_the_ID(); ?>">
											</label>
											<label>
												<input type="hidden" name="currency_code" value="<?php echo ot_get_option('wpl_curency_code') ?>">
											</label>
											
											<label>
												<input type="hidden" name="return" value="<?php echo get_page_link(ot_get_option('wpl_thank_you_page')); ?>">
											</label>

											<label>
												<input type="hidden" name="notify_url" value="<?php echo get_template_directory_uri() ?>/ipn.php" />
											</label>

											<label>
												<input class="donate_now_bt" type="submit" value="<?php _e('Donate !', 'wplook'); ?>" name="submit" alt="<?php _e('Make Donation with PayPal', 'wplook'); ?>">
											</label>
										</form>
									</div>
								</div>
							<?php } ?>

							<?php if ( ot_get_option('wpl_direct_bank_transfer') != "") { ?>
								<div class="toggle-content-donation">
									<div class="expand-button"><p><?php _e('Direct Bank Transfer', 'wplook'); ?></p></div>
									<div class="expand"><?php echo ot_get_option('wpl_direct_bank_transfer') ?></div>
								</div>
							<?php } ?>

							<?php if ( ot_get_option('wpl_cheque_payment') != "") { ?>
								<div class="toggle-content-donation">
									<div class="expand-button"><p><?php _e('Cheque Payment', 'wplook'); ?></p></div>
									<div class="expand"><?php echo ot_get_option('wpl_cheque_payment') ?></div>
								</div>
							<?php } ?>

						</div>
						
						<div class="long-description">
							<?php the_content(); ?>
						</div>
						
						<div class="clear"></div>
						
						<?php $share_buttons = get_post_meta(get_the_ID(), 'wpl_share_buttons_cause', true); ?>
						<?php if ( $share_buttons !='hide' ) {
							wplook_get_share_buttons();
						} ?>
					</div>

				</article>

			<?php endwhile; endif; ?>

		</div><!-- #content -->

		<?php get_sidebar('causes'); ?>
		<div class="clear"></div>
	</div><!-- #primary -->
</div>	

<?php get_footer(); ?>