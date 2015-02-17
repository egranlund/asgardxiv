<?php
/**
 * Event Submission Form Metabox For Venues
 * This is used to add a metabox to the event submission form to allow for choosing or
 * creating a venue for user submitted events.
 *
 * This is ALSO used in the Venue edit view. Be careful to test changes in both places.
 *
 * Override this template in your own theme by creating a file at
 * [your-theme]/tribe-events/community/modules/venue.php
 *
 * @package TribeCommunityEvents
 * @since  2.1
 * @author Modern Tribe Inc.
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); }

$venue_name = tribe_get_venue();

if ( !isset( $event ) ) { $event = null; }
?>

<!-- Venue -->
<div class="tribe-events-community-details eventForm bubble" id="event_venue">

	<table class="tribe-community-event-info" cellspacing="0" cellpadding="0">

		<tr>
			<td colspan="2" class="tribe_sectionheader">
				<h4><?php _e( 'Event Location Details', 'tribe-events-community' ); ?></h4>
			</td><!-- .tribe_sectionheader -->
		</tr>

		<?php tribe_community_events_venue_select_menu( $event ); ?>

		<?php if ( !tribe_community_events_is_venue_edit_screen() ) { ?>
		<tr class="venue">
			<td>
				<label for="VenueVenue" <?php if ( $event && $_POST && empty( $venue_name ) ) echo 'class="error"'; ?>>
					<?php _e( 'Venue Name' , 'tribe-events-community' ); ?>:
				</label>
			</td>
			<td>
				<input type="text" id="VenueVenue" name="venue[Venue]" size="25"  value="<?php esc_attr_e($venue_name); ?>" />
			</td>
		</tr><!-- .venue -->
		<?php } ?>

	</table><!-- #event_venue -->

</div>