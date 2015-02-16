<?php
/**
 * The header template file
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	
	<!--  Basic Page Needs -->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php global $page, $paged;
		wp_title( '', true, 'right' );
		?></title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Favicon -->
	<?php if ( ot_get_option('wpl_favicon') ) { ?>
		<link rel="shortcut icon" href="<?php echo ot_get_option('wpl_favicon');  ?>">
		<link rel="apple-touch-icon" href="<?php echo ot_get_option('wpl_favicon');  ?>" />
	<?php } ?>

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
	<?php wp_head(); ?>
	<style type="text/css"><?php echo stripslashes(ot_get_option('wpl_css')) ?></style>
</head>
<body <?php body_class(); ?>>
	<div id="page">

		<!-- Toolbar -->
		<div id="toolbar">
			<div class="container_16">

				<div class="grid_16">
					
					
						<?php
							if ( has_nav_menu( 'language' ) ) { 
								wp_nav_menu( array('depth' => '3', 'theme_location' => 'language' ));
						} ?> 


					<ul class="tb-list">
						<?php if ( ot_get_option('wpl_phone_number') != "") { ?>
							<li class="phone"><a href="tel:<?php echo ot_get_option('wpl_phone_number') ?>" ><?php _e('Tel.:', 'wplook'); ?><?php echo ot_get_option('wpl_phone_number') ?></a></li>
						<?php } ?>

						<?php if ( ot_get_option('wpl_rss_link') != "") { ?>
							<li class="rss"><a href="<?php echo ot_get_option('wpl_rss_link') ?>"><i class="icon-feed2"></i></a></li>
						<?php } ?>
						
						<?php if ( ot_get_option('wpl_contact_page_link') != "") { ?>
							<li class="contact"><a href="<?php echo get_page_link(ot_get_option('wpl_contact_page_link')); ?>"><i class="icon-envelope"></i></a></li>
						<?php } ?>

						<?php if ( ot_get_option('wpl_contact_email') != "") { ?>
							<li class="contact"><a href="mailto:<?php echo ot_get_option('wpl_contact_email'); ?>"><i class="icon-envelope"></i></a></li>
						<?php } ?>
						
						<?php if ( ot_get_option('wpl_group_icons') != "false") { ?>
										
							<?php $toolbar_share = ot_get_option( 'toolbar_share', array() ); ?>
							<?php if( $toolbar_share ) : ?>
								<li class="share"><a href="#"><i class="icon-share"></i></a>
									<ul class="share-items radius-bottom">
										<?php foreach( $toolbar_share as $item ) : ?>
											<li class="share-item-<?php echo $item['wpl_share_item_icon']; ?> radius"><a target="_blank" title="<?php echo $item['wpl_share_item_name']; ?>" href="<?php echo $item['wpl_share_item_url']; ?>"><i class="<?php echo $item['wpl_share_item_icon']; ?>"></i></a></li>
										<?php endforeach; ?>
									</ul>
								</li>
							<?php endif; ?>

						<?php } else { ?>

							<?php $toolbar_share = ot_get_option( 'toolbar_share', array() ); ?>
							<?php if( $toolbar_share ) : ?>
								<?php foreach( $toolbar_share as $item ) : ?>
									<li class="share-item-<?php echo $item['wpl_share_item_icon']; ?> mt"><a target="_blank" title="<?php echo $item['wpl_share_item_name']; ?>" href="<?php echo $item['wpl_share_item_url']; ?>"><i class="<?php echo $item['wpl_share_item_icon']; ?>"></i></a></li>
								<?php endforeach; ?>
							<?php endif; ?>

						<?php } ?>

						<?php if ( ot_get_option('wpl_search_form') == "true") { ?>
							<li class="search"><a href="#"><i class="icon-search"></i></a>
								<ul class="search-items radius-bottom">
									<li>
										<div class="search-form">
											<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
												<div>
													<input type="text" value="<?php _e('Search for...', 'wplook'); ?>" name="s" id="s" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
													<input type="submit" id="searchsubmit" value="Search" />
												</div>
											</form>
										</div>
									</li>
								</ul>
							</li>
						<?php } ?>

						<?php if ( ot_get_option('wpl_donete_link') != "") { ?>
							<li class="donate"><a href="<?php echo ot_get_option('wpl_donete_link') ?>"><?php _e('Donate', 'wplook'); ?> <i class="icon-heart"></i></a></li>
						<?php } ?>

					</ul>
					<div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<!-- /#toolbar -->

		<header id="branding" class="site-header" role="banner">
			<div id="sticky_navigation">
				<div class="container_16">
					<hgroup class="fleft grid_5">
							<h1 id="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php bloginfo('description'); ?>" rel="home">
							<?php   
							if ( ot_get_option('wpl_logo') != ''){?>
									<img src="<?php echo ot_get_option('wpl_logo'); ?>">
								<?php } else {
									bloginfo('name');
								}?>
							</a></h1>
								<h2 id="site-description"><?php bloginfo('description'); ?></h2>
					</hgroup>

					<nav role="navigation" class="site-navigation main-navigation grid_11" id="site-navigation">
						<?php wp_nav_menu( array('menu_class' => 'nav-menu',  'theme_location' => 'primary' )); ?>
					</nav>
					
					<!-- Mobile navigation -->
					
					<div class="grid_16 mob-nav"></div>

					<!-- .site-navigation .main-navigation -->
					<div class="clear"></div>
				</div>
			</div>
		</header>
		<!-- #masthead .site-header -->