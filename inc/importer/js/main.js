jQuery(document).ready(function($){

	function initiateImport( progressItem, all ) {

		all = typeof all !== 'undefined' ? all : false;

		funcName = 'lct-ajax-' + progressItem.data('lct-func-name');

		progressItem.show();
		progressItem.find('span').show();

		jQuery.post(

			LCTImporterAjax.ajaxurl,
			{
				action : funcName,
			},
			function( response ) {

				if ( response.status == 'success' ) {
					progressItem.find('strong').show();
				} else {
					alert( 'Something went wrong, please try again.' );
				}

				if ( progressItem.next('.lct-importer-progress-item').length ) {
					initiateImport( progressItem.next('.lct-importer-progress-item'), all );
				} else {
					progressItem.after('<hr><strong>All Finished</strong>');
					progressItem.closest('.lct-importer-row').find('.lct-importer-hook').text('Installed');
					if ( all ) {
						if ( progressItem.closest('.lct-importer-row').next('.lct-importer-row').length ) {
							initiateImport( progressItem.closest('.lct-importer-row').next('.lct-importer-row').find('.lct-importer-progress-item:first-child'), all );
						}
					}
				}

			}

		);

	}

	function initiateImportAll() {

		jQuery('.lct-importer-button').hide();
		initiateImport( jQuery('.lct-importer-row-lc .lct-importer-progress-item:first-child'), true );

	}

	jQuery(document).on( 'click', '.lct-importer-hook:not(.button-disabled)', function(e){

		e.preventDefault();

		var _this = jQuery(this),
		progress = _this.closest('.lct-importer-row').find('.lct-importer-progress'),
		funcName,
		progressItem;

		// Disable button
		_this.addClass('button-disabled').text('Installing...');

		// Initiate Import
		initiateImport( progress.find('.lct-importer-progress-item:first-child'), false );

	});

	jQuery(document).on( 'click', '.lct-importer-all-hook:not(.button-disabled)', function(e){

		e.preventDefault();

		var _this = jQuery(this);

		// Disable button
		_this.addClass('button-disabled').text('Installing...');

		// Initiate Import
		initiateImportAll();

	});

	jQuery(document).on( 'click', '.lct-importer-close-hook', function(e){

		e.preventDefault();		

		jQuery.post(

			LCTImporterAjax.ajaxurl,
			{
				action : 'lct-ajax-close-installer'
			},
			function( response ) {

				if ( response.status == 'success' ) {
					jQuery('.lct-importer').slideUp( 200 );
				}

			}

		);

	});
	

});