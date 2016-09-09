<?php
	
	if ( ! defined( 'DS_LIVE_COMPOSER_VER' ) ) {

		function lct_requirement_notification_scripts() {

			wp_enqueue_style( 'lct-importer-style', get_template_directory_uri() . '/inc/importer/css/main.css', array(), '1.0' );

		} add_action( 'admin_enqueue_scripts', 'lct_requirement_notification_scripts' );

		function lct_requirement_notification() {

			?>

			<div class="lct-requirement-notification">
				
				<div class="lct-requirement-notification-inner">

					<p><a target="_blank" href="https://wordpress.org/plugins/live-composer-page-builder/">Live Composer</a> plugin is <strong>required</strong> and has to be active for this theme to function. </p>


				</div><!-- .lct-importer-inner -->

			</div>

			<?php

		} add_action( 'admin_notices', 'lct_requirement_notification' );

	} elseif ( defined( 'DS_LIVE_COMPOSER_VER' ) && get_option( 'lct_orao_ajax_installer', 'open' ) != 'closed' ) {

		include get_template_directory() . '/inc/importer/ajax.php';

		function lct_importer_scripts() {

			wp_enqueue_style( 'lct-importer-style', get_template_directory_uri() . '/inc/importer/css/main.css', array(), '1.0' );
			wp_enqueue_script( 'lct-importer-js', get_template_directory_uri() . '/inc/importer/js/main.js', array(), '1.0' );			
			wp_localize_script( 'lct-importer-js', 'LCTImporterAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );


		} add_action( 'admin_enqueue_scripts', 'lct_importer_scripts' );

		function lct_importer_notification() {

			?>

			<div class="lct-importer">
				
				<div class="lct-importer-inner">

					<h2>Installer</h2>

					<div class="lct-importer-row lct-importer-row-lc">
						<div class="lct-importer-title">Live Composer Data <small>( required )</small></div>
						<div class="lct-importer-descr"><strong>This is required</strong>.<br> It will set up the header, footer, post templates, register menus and sidebars.</div>
						<div class="lct-importer-button">
							<a href="#" class="button button-primary lct-importer-hook">Install</a>
						</div><!-- .lct-importer-button -->
						<div class="lct-importer-progress">
							<div class="lct-importer-progress-item" data-lct-func-name="install-header"><span>Installing Header...</span> <strong>done</strong></div>
							<div class="lct-importer-progress-item" data-lct-func-name="install-footer"><span>Installing Footer...</span> <strong>done</strong></div>
							<div class="lct-importer-progress-item" data-lct-func-name="install-templates"><span>Installing Post Templates...</span> <strong>done</strong></div>
							<div class="lct-importer-progress-item" data-lct-func-name="install-menus"><span>Installing Menus...</span> <strong>done</strong></div>
							<div class="lct-importer-progress-item" data-lct-func-name="install-sidebars"><span>Installing Sidebars...</span> <strong>done</strong></div>
						</div><!-- .lct-importer-progress -->
					</div><!-- .lct-importer-row -->

					<div class="lct-importer-row lct-importer-row-pages">
						<div class="lct-importer-title">Pages</div>
						<div class="lct-importer-descr"><strong>This is required</strong>.<br> It will set up the variations of the home pages, blog pages and the project pages.</div>
						<div class="lct-importer-button">
							<a href="#" class="button button-primary lct-importer-hook">Install</a>
						</div><!-- .lct-importer-button -->
						<div class="lct-importer-progress">
							<div class="lct-importer-progress-item" data-lct-func-name="install-home-page"><span>Installing Home Page...</span> <strong>done</strong></div>
							<div class="lct-importer-progress-item" data-lct-func-name="install-blog-pages"><span>Installing Blog Pages...</span> <strong>done</strong></div>
							<div class="lct-importer-progress-item" data-lct-func-name="install-portfolio-pages"><span>Installing Portfolio Pages...</span> <strong>done</strong></div>
							<div class="lct-importer-progress-item" data-lct-func-name="install-category"><span>Installing Category and Search...</span> <strong>done</strong></div>
							<div class="lct-importer-progress-item" data-lct-func-name="install-404"><span>Installing 404...</span> <strong>done</strong></div>
						</div><!-- .lct-importer-progress -->
					</div><!-- .lct-importer-row -->

					<div class="lct-importer-row lct-importer-row-posts">
						<div class="lct-importer-title">Posts</small></div>
						<div class="lct-importer-descr">Import blog posts and projects. If you are have a brand new WordPress install you can use this to populate the installation with some temporary posts, but if you already have some posts, you don't need to do this.</div>
						<div class="lct-importer-button">
							<a href="#" class="button button-primary lct-importer-hook">Install</a>
						</div><!-- .lct-importer-button -->
						<div class="lct-importer-progress">
							<div class="lct-importer-progress-item" data-lct-func-name="install-blog-posts"><span>Installing Blog Posts...</span> <strong>done</strong></div>
							<div class="lct-importer-progress-item" data-lct-func-name="install-projects"><span>Installing Projects...</span> <strong>done</strong></div>
						</div><!-- .lct-importer-progress -->
					</div><!-- .lct-importer-row -->

					<div class="lct-importer-all" style="clear:both;">
						<div class="lct-importer-button-all">
							<a href="#" class="button button-primary lct-importer-all-hook">Install Everything</a> <a href="#" class="button button-secondary lct-importer-close-hook">Hide Installer</a>
						</div><!-- .lct-importer-button -->
					</div><!-- .lct-importer-all -->

				</div><!-- .lct-importer-inner -->

			</div>

			<?php

		} add_action( 'admin_notices', 'lct_importer_notification' );

	}
