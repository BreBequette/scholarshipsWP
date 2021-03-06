jQuery( document ).ready( function() {
	jQuery(document.body).on( 'click', '.jb-admin-notice.is-dismissible .notice-dismiss', function() {
		var notice_key = jQuery(this).parents('.jb-admin-notice').data('key');

		wp.ajax.send( 'jb_dismiss_notice', {
			data: {
				key: notice_key,
				nonce: jb_admin_data.nonce
			},
			success: function( data ) {
				return true;
			},
			error: function( data ) {
				return false;
			}
		});
	});
});