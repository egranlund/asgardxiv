(function($) {
	$(document).ready( function() {
		$( '.cptchpr_help_box' ).mouseover( function() {
			$( this ).children().css( 'display', 'block' );
		});
		$( '.cptchpr_help_box' ).mouseout( function() {
			$( this ).children().css( 'display', 'none' );
		});
		/* add notice about changing in the settings page */
		$( '#cptchpr_settings_form input' ).bind( "change click select", function() {
			if ( $( this ).attr( 'type' ) != 'submit' ) {
				$( '.updated.fade' ).css( 'display', 'none' );
				$( '#cptchpr_settings_notice' ).css( 'display', 'block' );
			};
		});
	});
})(jQuery);