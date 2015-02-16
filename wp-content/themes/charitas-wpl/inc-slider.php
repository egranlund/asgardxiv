<?php
/**
 * The default template for displaying Flexslider
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0
 */
?>
<?php 
	$wpl_sliders = ot_get_option( 'wpl_sliders', array() );
?>

<?php if ( $wpl_sliders && ot_get_option('wpl_slider_revolution') == '' ){ ?>
<div class="flexslider loading">
	<ul class="slides">
		<?php $i = 0; ?>
		<?php foreach( $wpl_sliders as $item ) : ?>
		<?php if(++$i > 4) break; ?>
			<li data-thumb="<?php echo $item['wpl_slider_item_thumbnail']; ?>">
				<img src="<?php echo $item['wpl_slider_item_image']; ?>" alt="<?php echo $item['wpl_slider_item_title']; ?>">
				<div class="flex-caption ">
					<div class="flex-content container_16">
						<div class="grid_16">
							<?php if ( $item['wpl_slider_item_title'] != "") { ?>
								<h1 <?php if ( $item['wpl_slider_item_title_color'] != "") { ?> style="color: <?php echo $item['wpl_slider_item_title_color']; ?>;" <?php } ?>><?php echo $item['wpl_slider_item_title']; ?></h1>
							<?php } ?>
							
							<?php if ( $item['wpl_slider_item_description'] != "") { ?>
								<h2 <?php if ( $item['wpl_slider_item_description_color'] != "") { ?> style="color: <?php echo $item['wpl_slider_item_description_color']; ?>;" <?php } ?>><?php echo $item['wpl_slider_item_description']; ?></h2>
							<?php } ?>

							<?php if ( $item['wpl_slider_item_url'] != "") { ?>
								<div class="flex-button"><a <?php if ( $item['wpl_slider_item_button_color'] != "") { ?> style="color: <?php echo $item['wpl_slider_item_button_color']; ?>; border: 1px solid <?php echo $item['wpl_slider_item_button_color']; ?>;" <?php } ?> class="radius" href="<?php echo $item['wpl_slider_item_url']; ?>"><?php echo $item['wpl_slider_item_button_text']; ?> <i class="icon-angle-right"></i></a></div>
							<?php } ?>
						</div>	
					</div>
				</div>
			</li>
		<?php endforeach; ?>
	</ul>
</div>

<?php } elseif ( ot_get_option( 'wpl_slider_revolution') != '' ){ ?>
	<div class="revolution-slider">
		<?php putRevSlider( ot_get_option( 'wpl_slider_revolution') ); ?>
	</div>		
<?php } ?>