<?php

/**
 * Header
 * Footer
 * Post Templates
 * Sidebars
 * Menus
 * Home Page
 */

/**
 * Close Installer
 */
function lct_importer_ajax_close_installer() {

	// Allowed to do this?
	if ( is_user_logged_in() && current_user_can( 'manage_options' ) ) {

		$response = array();
		$response['status'] = 'success';

		update_option( 'lct_orao_ajax_installer', 'closed' );

		// Encode response.
		$response_json = json_encode( $response );

		// AJAX phone home.
		header( 'Content-Type: application/json' );
		echo $response_json;

		// Asta la vista.
		exit;
	}

} add_action( 'wp_ajax_lct-ajax-close-installer', 'lct_importer_ajax_close_installer' );

/**
 * Install Header
 */
function lct_importer_ajax_install_header() {

	// Allowed to do this?
	if ( is_user_logged_in() && current_user_can( 'manage_options' ) ) {

		$response = array();
		$response['status'] = 'success';

		$data = array(
			'dslc_hf_for' => 'header',
			'dslc_hf_position' => 'relative',
			'dslc_hf_type' => 'default',
			'dslc_code' => '[dslc_modules_section show_on="desktop tablet phone" type="wrapped" columns_spacing="spacing" bg_color="rgba(154, 154, 154, 0)" bg_image_thumb="disabled" bg_image="" bg_image_repeat="repeat" bg_image_position="left top" bg_image_attachment="scroll" bg_image_size="auto" bg_video="" bg_video_overlay_color="#000000" bg_video_overlay_opacity="0" border_color="rgb(253, 73, 112)" border_width="7" border_style="solid" border="top " margin_h="0" margin_b="0" padding="80" padding_h="0" custom_class="" custom_id="" ] [dslc_modules_area last="no" first="yes" size="6"] [dslc_module last="yes"]YToyODp7czo3OiJjb250ZW50IjtzOjExNToiPGgxPjxhIGhyZWY9XCJodHRwOi8vZGR0aGVtZXNkZW1vLmNvbS9vcmFvXCI+RmFiaWFuIErDtnJnPC9hPjwvaDE+CjxoMj5jcmFmdGluZyBhd2Vzb21uZXNzIG9uZSBwaXhlbCBhdCBhIHRpbWU8L2gyPiI7czoxNzoiY3NzX21hcmdpbl9ib3R0b20iO3M6MjoiMjUiO3M6MTI6ImNzc19oMV9jb2xvciI7czoxMjoicmdiKDAsIDAsIDApIjtzOjE2OiJjc3NfaDFfZm9udF9zaXplIjtzOjI6IjU1IjtzOjE4OiJjc3NfaDFfbGluZV9oZWlnaHQiO3M6MjoiNTUiO3M6MjA6ImNzc19oMV9tYXJnaW5fYm90dG9tIjtzOjI6IjE1IjtzOjEyOiJjc3NfaDJfY29sb3IiO3M6MTg6InJnYigxNTQsIDE1NCwgMTU0KSI7czoxNjoiY3NzX2gyX2ZvbnRfc2l6ZSI7czoyOiIyOCI7czoxODoiY3NzX2gyX2ZvbnRfd2VpZ2h0IjtzOjM6IjMwMCI7czoxODoiY3NzX2gyX2xpbmVfaGVpZ2h0IjtzOjI6IjI3IjtzOjIwOiJjc3NfaDJfbWFyZ2luX2JvdHRvbSI7czoxOiIwIjtzOjE0OiJjc3NfbGlua19jb2xvciI7czoxNToicmdiKDEyLCAxMiwgMTIpIjtzOjIwOiJjc3NfbGlua19jb2xvcl9ob3ZlciI7czoxNToicmdiKDEyLCAxMiwgMTIpIjtzOjk6ImNzc19yZXNfdCI7czo3OiJlbmFibGVkIjtzOjIyOiJjc3NfcmVzX3RfaDFfZm9udF9zaXplIjtzOjI6IjQwIjtzOjI0OiJjc3NfcmVzX3RfaDFfbGluZV9oZWlnaHQiO3M6MjoiNDAiO3M6MjI6ImNzc19yZXNfdF9oMl9mb250X3NpemUiO3M6MjoiMTciO3M6MjQ6ImNzc19yZXNfdF9oMl9saW5lX2hlaWdodCI7czoyOiIxNyI7czoyNjoiY3NzX3Jlc190X2gyX21hcmdpbl9ib3R0b20iO3M6MjoiMTMiO3M6OToiY3NzX3Jlc19wIjtzOjc6ImVuYWJsZWQiO3M6MjM6ImNzc19yZXNfcGhfaDFfZm9udF9zaXplIjtzOjI6IjQwIjtzOjI1OiJjc3NfcmVzX3BoX2gxX2xpbmVfaGVpZ2h0IjtzOjI6IjQwIjtzOjIzOiJjc3NfcmVzX3BoX2gyX2ZvbnRfc2l6ZSI7czoyOiIyMCI7czoyNToiY3NzX3Jlc19waF9oMl9saW5lX2hlaWdodCI7czoyOiIyMCI7czoxODoibW9kdWxlX2luc3RhbmNlX2lkIjtzOjI6IjEwIjtzOjc6InBvc3RfaWQiO3M6MjoiNDAiO3M6MTE6ImRzbGNfbV9zaXplIjtzOjI6IjEyIjtzOjk6Im1vZHVsZV9pZCI7czoxNjoiRFNMQ19UZXh0X1NpbXBsZSI7fQ==[/dslc_module] [dslc_module last="yes"]YToyMDp7czoxMToic2hvd19sYWJlbHMiO3M6NzoiZW5hYmxlZCI7czo3OiJ5b3V0dWJlIjtzOjA6IiI7czo5OiJwaW50ZXJlc3QiO3M6MToiIyI7czo5OiJpbnN0YWdyYW0iO3M6MToiIyI7czoxNzoiY3NzX2JvcmRlcl9yYWRpdXMiO3M6MToiMCI7czoxMjoiY3NzX2JnX2NvbG9yIjtzOjIyOiJyZ2JhKDExOSwgMTU1LCAxODYsIDApIjtzOjE4OiJjc3NfYmdfY29sb3JfaG92ZXIiO3M6MjI6InJnYmEoMTA5LCAxNDIsIDE3MCwgMCkiO3M6ODoiY3NzX3NpemUiO3M6MjoiMjUiO3M6MTQ6ImNzc19pY29uX2NvbG9yIjtzOjE4OiJyZ2IoMTU0LCAxNTQsIDE1NCkiO3M6MjA6ImNzc19pY29uX2NvbG9yX2hvdmVyIjtzOjE4OiJyZ2IoMTU0LCAxNTQsIDE1NCkiO3M6MTg6ImNzc19pY29uX2ZvbnRfc2l6ZSI7czoyOiIxNiI7czoxNToiY3NzX2xhYmVsX2NvbG9yIjtzOjEyOiJyZ2IoMCwgMCwgMCkiO3M6MjE6ImNzc19sYWJlbF9mb250X3dlaWdodCI7czozOiI3MDAiO3M6MjE6ImNzc19sYWJlbF9mb250X2ZhbWlseSI7czo2OiJSb2JvdG8iO3M6MjQ6ImNzc19sYWJlbF90ZXh0X3RyYW5zZm9ybSI7czo5OiJ1cHBlcmNhc2UiO3M6MTg6Im1vZHVsZV9pbnN0YW5jZV9pZCI7czoyOiIxMSI7czo3OiJwb3N0X2lkIjtzOjI6IjQwIjtzOjExOiJkc2xjX21fc2l6ZSI7czoyOiIxMiI7czo5OiJtb2R1bGVfaWQiO3M6MTE6IkRTTENfU29jaWFsIjtzOjE2OiJkc2xjX21fc2l6ZV9sYXN0IjtzOjM6InllcyI7fQ==[/dslc_module] [/dslc_modules_area] [dslc_modules_area last="yes" first="no" size="6"] [dslc_module last="yes"]YTo4OntzOjExOiJjc3Nfc2hvd19vbiI7czoxNToiZGVza3RvcCB0YWJsZXQgIjtzOjY6ImhlaWdodCI7czoyOiIzNCI7czo1OiJzdHlsZSI7czo5OiJpbnZpc2libGUiO3M6MTg6Im1vZHVsZV9pbnN0YW5jZV9pZCI7czoyOiIxMiI7czo3OiJwb3N0X2lkIjtzOjI6IjQwIjtzOjExOiJkc2xjX21fc2l6ZSI7czoyOiIxMiI7czo5OiJtb2R1bGVfaWQiO3M6MTQ6IkRTTENfU2VwYXJhdG9yIjtzOjE2OiJkc2xjX21fc2l6ZV9sYXN0IjtzOjM6InllcyI7fQ==[/dslc_module] [dslc_module last="yes"]YToxMjp7czoyOToiY3NzX3N1Ym5hdl9wYWRkaW5nX2hvcml6b250YWwiO3M6MjoiMjciO3M6MjU6ImNzc19zdWJuYXZfaXRlbV9mb250X3NpemUiO3M6MjoiMTUiO3M6Mjc6ImNzc19zdWJuYXZfaXRlbV9mb250X2ZhbWlseSI7czo2OiJSb2JvdG8iO3M6Mjc6ImNzc19zdWJuYXZfaXRlbV9saW5lX2hlaWdodCI7czoyOiIxNSI7czo5OiJjc3NfcmVzX3QiO3M6NzoiZW5hYmxlZCI7czo5OiJjc3NfcmVzX3AiO3M6NzoiZW5hYmxlZCI7czoxNToiY3NzX3Jlc19wX2FsaWduIjtzOjQ6ImxlZnQiO3M6MTg6Im1vZHVsZV9pbnN0YW5jZV9pZCI7czoyOiIxMyI7czo3OiJwb3N0X2lkIjtzOjI6IjQwIjtzOjExOiJkc2xjX21fc2l6ZSI7czoyOiIxMiI7czo5OiJtb2R1bGVfaWQiO3M6MTU6IkRTTENfTmF2aWdhdGlvbiI7czoxNjoiZHNsY19tX3NpemVfbGFzdCI7czozOiJ5ZXMiO30=[/dslc_module] [/dslc_modules_area] [/dslc_modules_section] ',
		);

		// Create post object.
		$the_post = array(
			'post_title' => 'Header',
			'post_status' => 'publish',
			'post_type' => 'dslc_hf',
		);

		// Insert the post into the database.
		$post_id = wp_insert_post( $the_post );

		// If post added.
		if ( $post_id ) {

			// Go through the custom fields and add them.
			foreach ( $data as $custom_field_id => $custom_field_value ) {
				add_post_meta( $post_id, $custom_field_id, $custom_field_value );
			}
		} else {
			$response['status'] = 'fail';
		}

		// Encode response.
		$response_json = json_encode( $response );

		// AJAX phone home.
		header( 'Content-Type: application/json' );
		echo $response_json;

		// Asta la vista.
		exit;
	}

} add_action( 'wp_ajax_lct-ajax-install-header', 'lct_importer_ajax_install_header' );

/**
 * Install Footer
 */
function lct_importer_ajax_install_footer() {

	// Allowed to do this?
	if ( is_user_logged_in() && current_user_can( 'manage_options' ) ) {

		$response = array();
		$response['status'] = 'success';

		$data = array(
			'dslc_hf_for' => 'footer',
			'dslc_hf_position' => 'relative',
			'dslc_hf_type' => 'default',
			'dslc_code' => '[dslc_modules_section show_on="desktop tablet phone" type="wrapped" columns_spacing="spacing" bg_color="rgb(48, 48, 48)" bg_image_thumb="disabled" bg_image="" bg_image_repeat="repeat" bg_image_position="left top" bg_image_attachment="scroll" bg_image_size="auto" bg_video="" bg_video_overlay_color="#000000" bg_video_overlay_opacity="0" border_color="" border_width="0" border_style="solid" border="top right bottom left" margin_h="0" margin_b="0" padding="80" padding_h="0" custom_class="" custom_id="" ] [dslc_modules_area last="yes" first="no" size="12"] [dslc_module last="yes"]YToxMjp7czo3OiJzaWRlYmFyIjtzOjExOiJkc2xjX2Zvb3RlciI7czo3OiJjb2x1bW5zIjtzOjE6IjQiO3M6MjQ6ImNzc193aWRnZXRfbWFyZ2luX2JvdHRvbSI7czoxOiIwIjtzOjIyOiJjc3NfdGl0bGVfYm9yZGVyX2NvbG9yIjtzOjE1OiJyZ2IoNzQsIDc0LCA3NCkiO3M6MTU6ImNzc190aXRsZV9jb2xvciI7czoxODoicmdiKDI1NSwgMjU1LCAyNTUpIjtzOjI4OiJjc3NfdGl0bGVfaW5uZXJfYm9yZGVyX2NvbG9yIjtzOjExOiJ0cmFuc3BhcmVudCI7czoxNDoiY3NzX21haW5fY29sb3IiO3M6MTg6InJnYigxMjksIDEyOSwgMTI5KSI7czoxODoibW9kdWxlX2luc3RhbmNlX2lkIjtzOjI6IjI5IjtzOjc6InBvc3RfaWQiO3M6MjoiNDIiO3M6MTE6ImRzbGNfbV9zaXplIjtzOjI6IjEyIjtzOjk6Im1vZHVsZV9pZCI7czoxMjoiRFNMQ19XaWRnZXRzIjtzOjE2OiJkc2xjX21fc2l6ZV9sYXN0IjtzOjM6InllcyI7fQ==[/dslc_module] [/dslc_modules_area] [/dslc_modules_section] [dslc_modules_section show_on="desktop tablet phone" type="wrapped" columns_spacing="spacing" bg_color="" bg_image_thumb="disabled" bg_image="" bg_image_repeat="repeat" bg_image_position="left top" bg_image_attachment="scroll" bg_image_size="auto" bg_video="" bg_video_overlay_color="#000000" bg_video_overlay_opacity="0" border_color="" border_width="0" border_style="solid" border="top right bottom left" margin_h="0" margin_b="0" padding="31" padding_h="0" custom_class="" custom_id="" ] [dslc_modules_area last="no" first="yes" size="6"] [dslc_module last="yes"]YToxMzp7czo3OiJjb250ZW50IjtzOjMzOiJDb3B5cmlnaHQgwqkgMjAxNSAtIExpdmUgQ29tcG9zZXIiO3M6MTc6ImNzc19tYXJnaW5fYm90dG9tIjtzOjE6IjAiO3M6MTQ6ImNzc19tYWluX2NvbG9yIjtzOjE4OiJyZ2IoMTEzLCAxMTMsIDExMykiO3M6MTg6ImNzc19tYWluX2ZvbnRfc2l6ZSI7czoyOiIxNSI7czoyMDoiY3NzX21haW5fbGluZV9oZWlnaHQiO3M6MjoiMjkiO3M6MjI6ImNzc19tYWluX21hcmdpbl9ib3R0b20iO3M6MToiMCI7czo5OiJjc3NfcmVzX3AiO3M6NzoiZW5hYmxlZCI7czoyNToiY3NzX3Jlc19waF9tYWluX2ZvbnRfc2l6ZSI7czoyOiIxNiI7czoyNToiY3NzX3Jlc19wX21haW5fdGV4dF9hbGlnbiI7czo2OiJjZW50ZXIiO3M6MTg6Im1vZHVsZV9pbnN0YW5jZV9pZCI7czoyOiIzMCI7czo3OiJwb3N0X2lkIjtzOjI6IjQyIjtzOjExOiJkc2xjX21fc2l6ZSI7czoyOiIxMiI7czo5OiJtb2R1bGVfaWQiO3M6MTY6IkRTTENfVGV4dF9TaW1wbGUiO30=[/dslc_module] [/dslc_modules_area] [dslc_modules_area last="yes" first="no" size="6"] [dslc_module last="yes"]YToxMTp7czoxNzoiY3NzX21hcmdpbl9ib3R0b20iO3M6MToiMCI7czoxODoiY3NzX2l0ZW1fZm9udF9zaXplIjtzOjI6IjE1IjtzOjIwOiJjc3NfaXRlbV9mb250X3dlaWdodCI7czozOiI0MDAiO3M6MjA6ImNzc19pdGVtX2xpbmVfaGVpZ2h0IjtzOjI6IjE0IjtzOjk6ImNzc19yZXNfcCI7czo3OiJlbmFibGVkIjtzOjE1OiJjc3NfcmVzX3BfYWxpZ24iO3M6NjoiY2VudGVyIjtzOjE4OiJtb2R1bGVfaW5zdGFuY2VfaWQiO3M6MjoiMzIiO3M6NzoicG9zdF9pZCI7czoyOiI0MiI7czoxMToiZHNsY19tX3NpemUiO3M6MjoiMTIiO3M6OToibW9kdWxlX2lkIjtzOjE1OiJEU0xDX05hdmlnYXRpb24iO3M6MTY6ImRzbGNfbV9zaXplX2xhc3QiO3M6MzoieWVzIjt9[/dslc_module] [/dslc_modules_area] [/dslc_modules_section] ',
		);

		// Create post object.
		$the_post = array(
			'post_title' => 'Footer',
			'post_status' => 'publish',
			'post_type' => 'dslc_hf',
		);

		// Insert the post into the database.
		$post_id = wp_insert_post( $the_post );

		// If post added.
		if ( $post_id ) {

			// Go through the custom fields and add them.
			foreach ( $data as $custom_field_id => $custom_field_value ) {
				add_post_meta( $post_id, $custom_field_id, $custom_field_value );
			}
		} else {
			$response['status'] = 'fail';
		}

		// Encode response.
		$response_json = json_encode( $response );

		// AJAX phone home.
		header( 'Content-Type: application/json' );
		echo $response_json;

		// Asta la vista.
		exit;
	}

} add_action( 'wp_ajax_lct-ajax-install-footer', 'lct_importer_ajax_install_footer' );

/**
 * Install Post Templates
 */
function lct_importer_ajax_install_templates() {

	// Allowed to do this?
	if ( is_user_logged_in() && current_user_can( 'manage_options' ) ) {

		$response = array();
		$response['status'] = 'success';

		$data = array(
			'dslc_template_base' => 'theme',
			'dslc_template_for' => 'post',
			'dslc_template_type' => 'default',
			'dslc_code' => '[dslc_modules_section show_on="desktop tablet phone" type="wrapped" columns_spacing="spacing" bg_color="rgba(230, 230, 230, 0)" bg_image_thumb="disabled" bg_image="" bg_image_repeat="repeat" bg_image_position="left top" bg_image_attachment="scroll" bg_image_size="auto" bg_video="" bg_video_overlay_color="#000000" bg_video_overlay_opacity="0" border_color="rgb(230, 230, 230)" border_width="1" border_style="solid" border="top " margin_h="0" margin_b="0" padding="80" padding_h="0" custom_class="" custom_id="" ] [dslc_modules_area last="no" first="yes" size="8"] [dslc_module last="yes"]YTo2OntzOjE3OiJjc3NfbWFyZ2luX2JvdHRvbSI7czoyOiI0MCI7czoxODoibW9kdWxlX2luc3RhbmNlX2lkIjtzOjI6IjIzIjtzOjc6InBvc3RfaWQiO3M6MjoiNDYiO3M6MTE6ImRzbGNfbV9zaXplIjtzOjI6IjEyIjtzOjk6Im1vZHVsZV9pZCI7czoxNzoiRFNMQ19UUF9UaHVtYm5haWwiO3M6MTY6ImRzbGNfbV9zaXplX2xhc3QiO3M6MzoieWVzIjt9[/dslc_module] [dslc_module last="yes"]YToxNzp7czoxNzoiY3NzX21hcmdpbl9ib3R0b20iO3M6MjoiMjAiO3M6MTM6ImNzc19mb250X3NpemUiO3M6MjoiNDAiO3M6MTU6ImNzc19mb250X3dlaWdodCI7czozOiI3MDAiO3M6MTU6ImNzc19mb250X2ZhbWlseSI7czo2OiJSb2JvdG8iO3M6MTU6ImNzc19saW5lX2hlaWdodCI7czoyOiI1NSI7czo5OiJjc3NfcmVzX3QiO3M6NzoiZW5hYmxlZCI7czoyMzoiY3NzX3Jlc190X21hcmdpbl9ib3R0b20iO3M6MjoiMTYiO3M6MTk6ImNzc19yZXNfdF9mb250X3NpemUiO3M6MjoiMjkiO3M6MjE6ImNzc19yZXNfdF9saW5lX2hlaWdodCI7czoyOiI0NCI7czo5OiJjc3NfcmVzX3AiO3M6NzoiZW5hYmxlZCI7czoyMzoiY3NzX3Jlc19wX21hcmdpbl9ib3R0b20iO3M6MjoiMjAiO3M6MTk6ImNzc19yZXNfcF9mb250X3NpemUiO3M6MjoiMjYiO3M6MjE6ImNzc19yZXNfcF9saW5lX2hlaWdodCI7czoyOiIyOSI7czoxODoibW9kdWxlX2luc3RhbmNlX2lkIjtzOjI6IjI0IjtzOjc6InBvc3RfaWQiO3M6MjoiNDYiO3M6MTE6ImRzbGNfbV9zaXplIjtzOjI6IjEyIjtzOjk6Im1vZHVsZV9pZCI7czoxMzoiRFNMQ19UUF9UaXRsZSI7fQ==[/dslc_module] [dslc_module last="yes"]YToxNjp7czoxMToidHBfZWxlbWVudHMiO3M6MjE6ImRhdGUgYXV0aG9yIGNhdGVnb3J5ICI7czo2OiJtYXJnaW4iO3M6MjoiMTMiO3M6MTc6ImNzc19tYXJnaW5fYm90dG9tIjtzOjI6IjIwIjtzOjI1OiJjc3NfbWFpbl9wYWRkaW5nX3ZlcnRpY2FsIjtzOjE6IjAiO3M6Mjg6ImNzc19tZXRhX2F2YXRhcl9tYXJnaW5fcmlnaHQiO3M6MToiMCI7czoyMDoiY3NzX21ldGFfYXZhdGFyX3NpemUiO3M6MToiMCI7czo1OiJjb2xvciI7czoxNToicmdiKDc3LCA3NywgNzcpIjtzOjk6ImZvbnRfc2l6ZSI7czoyOiIxNCI7czoxNToiY3NzX2ZvbnRfd2VpZ2h0IjtzOjM6IjMwMCI7czoxNToiY3NzX2ZvbnRfZmFtaWx5IjtzOjY6IlJvYm90byI7czoxNToiY3NzX2xpbmVfaGVpZ2h0IjtzOjI6IjE0IjtzOjE4OiJtb2R1bGVfaW5zdGFuY2VfaWQiO3M6MjoiMjUiO3M6NzoicG9zdF9pZCI7czoyOiI0NiI7czoxMToiZHNsY19tX3NpemUiO3M6MjoiMTIiO3M6OToibW9kdWxlX2lkIjtzOjEyOiJEU0xDX1RQX01ldGEiO3M6MTY6ImRzbGNfbV9zaXplX2xhc3QiO3M6MzoieWVzIjt9[/dslc_module] [dslc_module last="yes"]YTo0OntzOjE4OiJtb2R1bGVfaW5zdGFuY2VfaWQiO3M6MjoiMjYiO3M6NzoicG9zdF9pZCI7czoyOiI0NiI7czoxMToiZHNsY19tX3NpemUiO3M6MjoiMTIiO3M6OToibW9kdWxlX2lkIjtzOjE1OiJEU0xDX1RQX0NvbnRlbnQiO30=[/dslc_module] [dslc_module last="yes"]YTozMDp7czoxNzoiY3NzX21hcmdpbl9ib3R0b20iO3M6MjoiNTAiO3M6MTk6ImNzc19jaV9ib3JkZXJfY29sb3IiO3M6MTg6InJnYigyMzAsIDIzMCwgMjMwKSI7czoyMDoiY3NzX2NpX2JvcmRlcl9yYWRpdXMiO3M6MToiMCI7czoxODoiY3NzX2NpX3BhZGRpbmdfdG9wIjtzOjI6IjIwIjtzOjI1OiJjc3NfY2lfcGFkZGluZ19ob3Jpem9udGFsIjtzOjI6IjM1IjtzOjE5OiJjc3NfbV9tYXJnaW5fYm90dG9tIjtzOjI6IjE5IjtzOjIyOiJjc3NfbV9wYWRkaW5nX3ZlcnRpY2FsIjtzOjI6IjI1IjtzOjIwOiJjc3NfaWFfYm9yZGVyX3JhZGl1cyI7czoxOiIwIjtzOjEyOiJjc3NfaWFfY29sb3IiO3M6MTU6InJnYig3NywgNzcsIDc3KSI7czoxNjoiY3NzX2lhX2ZvbnRfc2l6ZSI7czoyOiIxNCI7czoxODoiY3NzX2lhX2ZvbnRfd2VpZ2h0IjtzOjM6IjcwMCI7czoxMjoiY3NzX2lkX2NvbG9yIjtzOjE1OiJyZ2IoNzcsIDc3LCA3NykiO3M6MTY6ImNzc19pZF9mb250X3NpemUiO3M6MjoiMTQiO3M6MTg6ImNzc19pZF9mb250X3dlaWdodCI7czozOiIzMDAiO3M6MTg6ImNzc19pZF9mb250X2ZhbWlseSI7czo2OiJSb2JvdG8iO3M6MTI6ImNzc19pcl9jb2xvciI7czoxNzoicmdiKDI1MywgNzMsIDExMikiO3M6MTY6ImNzc19pcl9mb250X3NpemUiO3M6MjoiMTQiO3M6MTg6ImNzc19pcl9mb250X3dlaWdodCI7czozOiI3MDAiO3M6MTg6ImNzc19pcl9mb250X2ZhbWlseSI7czo2OiJSb2JvdG8iO3M6MTI6ImNzc19jbV9jb2xvciI7czoxODoicmdiKDE1NCwgMTU0LCAxNTQpIjtzOjE3OiJjc3NfY21fbGlua19jb2xvciI7czoxNzoicmdiKDI1MywgNzMsIDExMikiO3M6MTY6ImNzc19jbV9mb250X3NpemUiO3M6MjoiMTYiO3M6MTg6ImNzc19jbV9mb250X3dlaWdodCI7czozOiIzMDAiO3M6MTg6ImNzc19jbV9mb250X2ZhbWlseSI7czo2OiJSb2JvdG8iO3M6MTc6ImNzc19jbV9saW5laGVpZ2h0IjtzOjI6IjI0IjtzOjE4OiJtb2R1bGVfaW5zdGFuY2VfaWQiO3M6MjoiMjciO3M6NzoicG9zdF9pZCI7czoyOiI0NiI7czoxMToiZHNsY19tX3NpemUiO3M6MjoiMTIiO3M6OToibW9kdWxlX2lkIjtzOjE2OiJEU0xDX1RQX0NvbW1lbnRzIjtzOjE2OiJkc2xjX21fc2l6ZV9sYXN0IjtzOjM6InllcyI7fQ==[/dslc_module] [dslc_module last="yes"]YToyNTp7czoyMToiY3NzX2hlYWRpbmdfZm9udF9zaXplIjtzOjI6IjMwIjtzOjIzOiJjc3NfaGVhZGluZ19mb250X2ZhbWlseSI7czo2OiJSb2JvdG8iO3M6MjM6ImNzc19oZWFkaW5nX2xpbmVfaGVpZ2h0IjtzOjI6IjMwIjtzOjE4OiJjc3NfaGVhZGluZ19tYXJnaW4iO3M6MjoiMjkiO3M6MTk6ImNzc19pbnB1dHNfYmdfY29sb3IiO3M6MjI6InJnYmEoMjMwLCAyMzAsIDIzMCwgMCkiO3M6MjM6ImNzc19pbnB1dHNfYm9yZGVyX2NvbG9yIjtzOjE4OiJyZ2IoMjMwLCAyMzAsIDIzMCkiO3M6MjA6ImNzc19pbnB1dHNfZm9udF9zaXplIjtzOjI6IjE0IjtzOjIyOiJjc3NfaW5wdXRzX2ZvbnRfZmFtaWx5IjtzOjY6IlJvYm90byI7czoyMjoiY3NzX2lucHV0c19saW5lX2hlaWdodCI7czoyOiIyMiI7czoyNDoiY3NzX2lucHV0c19tYXJnaW5fYm90dG9tIjtzOjI6IjE3IjtzOjI3OiJjc3NfaW5wdXRzX3BhZGRpbmdfdmVydGljYWwiO3M6MjoiMTciO3M6Mjk6ImNzc19pbnB1dHNfcGFkZGluZ19ob3Jpem9udGFsIjtzOjI6IjIwIjtzOjE5OiJjc3NfYnV0dG9uX2JnX2NvbG9yIjtzOjE3OiJyZ2IoMjUzLCA3MywgMTEyKSI7czoyNToiY3NzX2J1dHRvbl9iZ19jb2xvcl9ob3ZlciI7czoxNzoicmdiKDI1MywgNzMsIDExMikiO3M6MjQ6ImNzc19idXR0b25fYm9yZGVyX3JhZGl1cyI7czoxOiIwIjtzOjIwOiJjc3NfYnV0dG9uX2ZvbnRfc2l6ZSI7czoyOiIxMyI7czoyMjoiY3NzX2J1dHRvbl9mb250X3dlaWdodCI7czozOiI3MDAiO3M6MjI6ImNzc19idXR0b25fZm9udF9mYW1pbHkiO3M6NjoiUm9ib3RvIjtzOjI3OiJjc3NfYnV0dG9uX3BhZGRpbmdfdmVydGljYWwiO3M6MjoiMTQiO3M6Mjk6ImNzc19idXR0b25fcGFkZGluZ19ob3Jpem9udGFsIjtzOjI6IjIwIjtzOjE4OiJtb2R1bGVfaW5zdGFuY2VfaWQiO3M6MjoiMjgiO3M6NzoicG9zdF9pZCI7czoyOiI0NiI7czoxMToiZHNsY19tX3NpemUiO3M6MjoiMTIiO3M6OToibW9kdWxlX2lkIjtzOjIxOiJEU0xDX1RQX0NvbW1lbnRzX0Zvcm0iO3M6MTY6ImRzbGNfbV9zaXplX2xhc3QiO3M6MzoieWVzIjt9[/dslc_module] [/dslc_modules_area] [dslc_modules_area last="yes" first="no" size="4"] [dslc_module last="yes"]YTo1OntzOjE4OiJtb2R1bGVfaW5zdGFuY2VfaWQiO3M6MjoiMjIiO3M6NzoicG9zdF9pZCI7czoyOiI0NiI7czoxMToiZHNsY19tX3NpemUiO3M6MjoiMTIiO3M6OToibW9kdWxlX2lkIjtzOjEyOiJEU0xDX1dpZGdldHMiO3M6MTY6ImRzbGNfbV9zaXplX2xhc3QiO3M6MzoieWVzIjt9[/dslc_module] [/dslc_modules_area] [/dslc_modules_section] ',
		);

		// Create post object.
		$the_post = array(
			'post_title' => 'Blog',
			'post_status' => 'publish',
			'post_type' => 'dslc_templates',
		);

		// Insert the post into the database.
		$post_id = wp_insert_post( $the_post );

		// If post added.
		if ( $post_id ) {

			// Go through the custom fields and add them.
			foreach ( $data as $custom_field_id => $custom_field_value ) {
				add_post_meta( $post_id, $custom_field_id, $custom_field_value );
			}
		} else {
			$response['status'] = 'fail';
		}

		$data = array(
			'dslc_template_base' => 'theme',
			'dslc_template_for' => 'dslc_projects',
			'dslc_template_type' => 'default',
			'dslc_code' => '[dslc_modules_section show_on="desktop tablet phone" type="wrapped" columns_spacing="spacing" bg_color="" bg_image_thumb="disabled" bg_image="" bg_image_repeat="repeat" bg_image_position="left top" bg_image_attachment="scroll" bg_image_size="auto" bg_video="" bg_video_overlay_color="#000000" bg_video_overlay_opacity="0" border_color="rgb(230, 230, 230)" border_width="1" border_style="solid" border="top " margin_h="0" margin_b="0" padding="80" padding_h="0" custom_class="" custom_id="" ] [dslc_modules_area last="yes" first="no" size="12"] [dslc_module last="yes"]YToxMTp7czoxNzoiY3NzX21hcmdpbl9ib3R0b20iO3M6MjoiODAiO3M6OToiY3NzX2NvbG9yIjtzOjEyOiJyZ2IoMCwgMCwgMCkiO3M6MTM6ImNzc19mb250X3NpemUiO3M6MjoiNDAiO3M6MTU6ImNzc19mb250X3dlaWdodCI7czozOiI3MDAiO3M6MTU6ImNzc19mb250X2ZhbWlseSI7czo2OiJSb2JvdG8iO3M6MTQ6ImNzc190ZXh0X2FsaWduIjtzOjY6ImNlbnRlciI7czoxODoibW9kdWxlX2luc3RhbmNlX2lkIjtzOjI6IjE4IjtzOjc6InBvc3RfaWQiO3M6MjoiNDMiO3M6MTE6ImRzbGNfbV9zaXplIjtzOjI6IjEyIjtzOjk6Im1vZHVsZV9pZCI7czoxMzoiRFNMQ19UUF9UaXRsZSI7czoxNjoiZHNsY19tX3NpemVfbGFzdCI7czozOiJ5ZXMiO30=[/dslc_module] [/dslc_modules_area] [dslc_modules_area last="no" first="yes" size="6"] [dslc_module last="yes"]YTo1OntzOjE4OiJtb2R1bGVfaW5zdGFuY2VfaWQiO2k6MTc7czo3OiJwb3N0X2lkIjtzOjI6IjQzIjtzOjExOiJkc2xjX21fc2l6ZSI7czoyOiIxMiI7czo5OiJtb2R1bGVfaWQiO3M6MTc6IkRTTENfVFBfVGh1bWJuYWlsIjtzOjE2OiJkc2xjX21fc2l6ZV9sYXN0IjtzOjM6InllcyI7fQ==[/dslc_module] [/dslc_modules_area] [dslc_modules_area last="yes" first="no" size="6"] [dslc_module last="yes"]YTo0OntzOjE4OiJtb2R1bGVfaW5zdGFuY2VfaWQiO2k6NDQ7czo3OiJwb3N0X2lkIjtzOjI6IjQzIjtzOjExOiJkc2xjX21fc2l6ZSI7czoyOiIxMiI7czo5OiJtb2R1bGVfaWQiO3M6MTU6IkRTTENfVFBfQ29udGVudCI7fQ==[/dslc_module] [/dslc_modules_area] [/dslc_modules_section] ',
		);

		// Create post object.
		$the_post = array(
			'post_title' => 'Project',
			'post_status' => 'publish',
			'post_type' => 'dslc_templates',
		);

		// Insert the post into the database.
		$post_id = wp_insert_post( $the_post );

		// If post added.
		if ( $post_id ) {

			// Go through the custom fields and add them.
			foreach ( $data as $custom_field_id => $custom_field_value ) {
				add_post_meta( $post_id, $custom_field_id, $custom_field_value );
			}
		} else {
			$response['status'] = 'fail';
		}

		// Encode response.
		$response_json = json_encode( $response );

		// AJAX phone home.
		header( 'Content-Type: application/json' );
		echo $response_json;

		// Asta la vista.
		exit;
	}

} add_action( 'wp_ajax_lct-ajax-install-templates', 'lct_importer_ajax_install_templates' );

/**
 * Install Sidebars
 */
function lct_importer_ajax_install_sidebars() {

	// Allowed to do this?
	if ( is_user_logged_in() && current_user_can( 'manage_options' ) ) {

		$response = array();
		$response['status'] = 'success';

		if ( get_option( 'dslc_plugin_options_widgets_m' ) ) {
			$curr_opt_value = get_option( 'dslc_plugin_options_widgets_m' );
			$curr_widgets = $curr_opt_value['sidebars'];
		} else {
			$curr_opt_value = array( 'sidebars' => '' );
		}

		if ( strpos( $curr_opt_value['sidebars'], 'Blog' ) !== false ) { /* nadda */ } else {
			$curr_opt_value['sidebars'] .= 'Blog,Footer,';
			if ( ! update_option( 'dslc_plugin_options_widgets_m', $curr_opt_value ) ) {
				$response['status'] = 'fail';
			}
		}

		// Encode response.
		$response_json = json_encode( $response );

		// AJAX phone home.
		header( 'Content-Type: application/json' );
		echo $response_json;

		// Asta la vista.
		exit;
	}

} add_action( 'wp_ajax_lct-ajax-install-sidebars', 'lct_importer_ajax_install_sidebars' );

/**
 * Install Menus
 */
function lct_importer_ajax_install_menus() {

	// Allowed to do this?
	if ( is_user_logged_in() && current_user_can( 'manage_options' ) ) {

		$response = array();
		$response['status'] = 'success';

		if ( get_option( 'dslc_plugin_options_navigation_m' ) ) {
			$curr_opt_value = get_option( 'dslc_plugin_options_navigation_m' );
			$curr_widgets = $curr_opt_value['menus'];
		} else {
			$curr_opt_value = array( 'menus' => '' );
		}

		if ( strpos( $curr_opt_value['menus'], 'Main' ) !== false ) { /* nadda */ } else {
			$curr_opt_value['menus'] .= 'Main,';
			if ( ! update_option( 'dslc_plugin_options_navigation_m', $curr_opt_value ) ) {
				$response['status'] = 'fail';
			}
		}

		// Check if the menu exists.
		$menu_exists = wp_get_nav_menu_object( 'Main Menu' );

		// If it doesn't exist, let's create it.
		if ( ! $menu_exists ) {
			$menu_id = wp_create_nav_menu( 'Main Menu' );
		}

		// Encode response.
		$response_json = json_encode( $response );

		// AJAX phone home.
		header( 'Content-Type: application/json' );
		echo $response_json;

		// Asta la vista.
		exit;
	}

} add_action( 'wp_ajax_lct-ajax-install-menus', 'lct_importer_ajax_install_menus' );

/**
 * Install Home Pages
 */
function lct_importer_ajax_install_home_page() {

	// Allowed to do this?
	if ( is_user_logged_in() && current_user_can( 'manage_options' ) ) {

		$response = array();
		$response['status'] = 'success';

		$menu = wp_get_nav_menu_object( 'Main Menu' );
		$menu = $menu->term_id;

		$datas = array(
			array(
				'post_title' => 'Home',
				'dslc_code' => '[dslc_modules_section show_on="desktop tablet phone" type="wrapped" columns_spacing="spacing" bg_color="" bg_image_thumb="disabled" bg_image="" bg_image_repeat="repeat" bg_image_position="left top" bg_image_attachment="scroll" bg_image_size="auto" bg_video="" bg_video_overlay_color="#000000" bg_video_overlay_opacity="0" border_color="rgb(230, 230, 230)" border_width="1" border_style="solid" border="top bottom " margin_h="0" margin_b="0" padding="80" padding_h="0" custom_class="" custom_id="" ] [dslc_modules_area last="yes" first="no" size="12"] [dslc_module last="yes"]YTo1OntzOjE4OiJtb2R1bGVfaW5zdGFuY2VfaWQiO3M6MToiMiI7czo3OiJwb3N0X2lkIjtzOjI6IjExIjtzOjExOiJkc2xjX21fc2l6ZSI7czoyOiIxMiI7czo5OiJtb2R1bGVfaWQiO3M6MTM6IkRTTENfUHJvamVjdHMiO3M6MTY6ImRzbGNfbV9zaXplX2xhc3QiO3M6MzoieWVzIjt9[/dslc_module] [/dslc_modules_area] [/dslc_modules_section] [dslc_modules_section show_on="desktop tablet phone" type="wrapped" columns_spacing="spacing" bg_color="" bg_image_thumb="disabled" bg_image="" bg_image_repeat="repeat" bg_image_position="left top" bg_image_attachment="scroll" bg_image_size="auto" bg_video="" bg_video_overlay_color="#000000" bg_video_overlay_opacity="0" border_color="" border_width="0" border_style="solid" border="top right bottom left" margin_h="0" margin_b="0" padding="80" padding_h="0" custom_class="" custom_id="" ] [dslc_modules_area last="yes" first="no" size="12"] [dslc_module last="yes"]YToyNDp7czo3OiJjb250ZW50IjtzOjYwOiI8aDI+RnJvbSBUaGUgSm91cm5hbDwvaDI+CjxoMz5yYW1ibGluZ3Mgb24gcmFuZG9tIHN0dWZmPC9oMz4iO3M6MTc6ImNzc19tYXJnaW5fYm90dG9tIjtzOjI6IjUwIjtzOjEyOiJjc3NfaDFfY29sb3IiO3M6MTI6InJnYigwLCAwLCAwKSI7czoxNjoiY3NzX2gxX2ZvbnRfc2l6ZSI7czoyOiI1NSI7czoxODoiY3NzX2gxX2ZvbnRfd2VpZ2h0IjtzOjM6IjcwMCI7czoxODoiY3NzX2gxX2ZvbnRfZmFtaWx5IjtzOjY6IlJvYm90byI7czoxODoiY3NzX2gxX2xpbmVfaGVpZ2h0IjtzOjI6IjU1IjtzOjEyOiJjc3NfaDJfY29sb3IiO3M6MTI6InJnYigwLCAwLCAwKSI7czoxNjoiY3NzX2gyX2ZvbnRfc2l6ZSI7czoyOiI0MCI7czoxODoiY3NzX2gyX2ZvbnRfd2VpZ2h0IjtzOjM6IjcwMCI7czoxODoiY3NzX2gyX2ZvbnRfZmFtaWx5IjtzOjY6IlJvYm90byI7czoxODoiY3NzX2gyX2xpbmVfaGVpZ2h0IjtzOjI6IjQwIjtzOjIwOiJjc3NfaDJfbWFyZ2luX2JvdHRvbSI7czoyOiIxNiI7czoxMjoiY3NzX2gzX2NvbG9yIjtzOjE4OiJyZ2IoMTU0LCAxNTQsIDE1NCkiO3M6MTY6ImNzc19oM19mb250X3NpemUiO3M6MjoiMjIiO3M6MTg6ImNzc19oM19mb250X3dlaWdodCI7czozOiIzMDAiO3M6MTg6ImNzc19oM19mb250X2ZhbWlseSI7czo2OiJSb2JvdG8iO3M6MTg6ImNzc19oM19saW5lX2hlaWdodCI7czoyOiIyMiI7czoyMDoiY3NzX2gzX21hcmdpbl9ib3R0b20iO3M6MToiMCI7czoxODoibW9kdWxlX2luc3RhbmNlX2lkIjtzOjE6IjkiO3M6NzoicG9zdF9pZCI7czoyOiIxMSI7czoxMToiZHNsY19tX3NpemUiO3M6MjoiMTIiO3M6OToibW9kdWxlX2lkIjtzOjE2OiJEU0xDX1RleHRfU2ltcGxlIjtzOjE2OiJkc2xjX21fc2l6ZV9sYXN0IjtzOjM6InllcyI7fQ==[/dslc_module] [dslc_module last="yes"]YTozOTp7czoxMToib3JpZW50YXRpb24iO3M6MTA6Imhvcml6b250YWwiO3M6NzoiY29sdW1ucyI7czoxOiI2IjtzOjEzOiJwb3N0X2VsZW1lbnRzIjtzOjMxOiJ0aHVtYm5haWwgdGl0bGUgZXhjZXJwdCBidXR0b24gIjtzOjIwOiJjc3Nfc2VwX2JvcmRlcl9jb2xvciI7czoxODoicmdiKDIzMCwgMjMwLCAyMzApIjtzOjE0OiJjc3Nfc2VwX2hlaWdodCI7czoyOiIyNSI7czoxMzoiY3NzX3NlcF9zdHlsZSI7czo0OiJub25lIjtzOjI3OiJjc3NfdGh1bWJfYm9yZGVyX3JhZGl1c190b3AiO3M6MToiMCI7czoxODoidGh1bWJfbWFyZ2luX3JpZ2h0IjtzOjI6IjMwIjtzOjE5OiJ0aHVtYl9yZXNpemVfaGVpZ2h0IjtzOjM6IjUwMCI7czoyNToidGh1bWJfcmVzaXplX3dpZHRoX21hbnVhbCI7czozOiI1MDAiO3M6MTE6InRodW1iX3dpZHRoIjtzOjI6IjE0IjtzOjIxOiJjc3NfbWFpbl9ib3JkZXJfY29sb3IiO3M6MTg6InJnYigyMzAsIDIzMCwgMjMwKSI7czoyMDoiY3NzX21haW5fYm9yZGVyX3RyYmwiO3M6MjI6InRvcCByaWdodCBib3R0b20gbGVmdCAiO3M6Mjk6ImNzc19tYWluX2JvcmRlcl9yYWRpdXNfYm90dG9tIjtzOjE6IjAiO3M6MjU6ImNzc19tYWluX3BhZGRpbmdfdmVydGljYWwiO3M6MjoiMzAiO3M6MTk6ImNzc19tYWluX3RleHRfYWxpZ24iO3M6NDoibGVmdCI7czoxNToidGl0bGVfZm9udF9zaXplIjtzOjI6IjIwIjtzOjIxOiJjc3NfdGl0bGVfZm9udF93ZWlnaHQiO3M6MzoiNzAwIjtzOjIxOiJjc3NfdGl0bGVfZm9udF9mYW1pbHkiO3M6NjoiUm9ib3RvIjtzOjE3OiJ0aXRsZV9saW5lX2hlaWdodCI7czoyOiIzMCI7czoxMjoidGl0bGVfbWFyZ2luIjtzOjI6IjE1IjtzOjE3OiJjc3NfZXhjZXJwdF9jb2xvciI7czoxODoicmdiKDE1NCwgMTU0LCAxNTQpIjtzOjIxOiJjc3NfZXhjZXJwdF9mb250X3NpemUiO3M6MjoiMTYiO3M6MjM6ImNzc19leGNlcnB0X2ZvbnRfd2VpZ2h0IjtzOjM6IjMwMCI7czoyMzoiY3NzX2V4Y2VycHRfZm9udF9mYW1pbHkiO3M6NjoiUm9ib3RvIjtzOjE0OiJleGNlcnB0X21hcmdpbiI7czoyOiIxNSI7czoxNDoiZXhjZXJwdF9sZW5ndGgiO3M6MzoiMTAwIjtzOjExOiJidXR0b25fdGV4dCI7czoxMjoiUkVBRCBBUlRJQ0xFIjtzOjE5OiJjc3NfYnV0dG9uX2JnX2NvbG9yIjtzOjE3OiJyZ2IoMjUzLCA3MywgMTEyKSI7czoyNToiY3NzX2J1dHRvbl9iZ19jb2xvcl9ob3ZlciI7czoxNzoicmdiKDI1MywgNzMsIDExMikiO3M6MjQ6ImNzc19idXR0b25fYm9yZGVyX3JhZGl1cyI7czoxOiIwIjtzOjIyOiJjc3NfYnV0dG9uX2ZvbnRfd2VpZ2h0IjtzOjM6IjcwMCI7czoyMjoiY3NzX2J1dHRvbl9mb250X2ZhbWlseSI7czo2OiJSb2JvdG8iO3M6Mjk6ImNzc19idXR0b25fcGFkZGluZ19ob3Jpem9udGFsIjtzOjI6IjIwIjtzOjE4OiJtb2R1bGVfaW5zdGFuY2VfaWQiO3M6MToiNiI7czo3OiJwb3N0X2lkIjtzOjI6IjExIjtzOjExOiJkc2xjX21fc2l6ZSI7czoyOiIxMiI7czo5OiJtb2R1bGVfaWQiO3M6OToiRFNMQ19CbG9nIjtzOjE2OiJkc2xjX21fc2l6ZV9sYXN0IjtzOjM6InllcyI7fQ==[/dslc_module] [/dslc_modules_area] [/dslc_modules_section] ',
			),
			array(
				'post_title' => 'Home Variation #2',
				'dslc_code' => '[dslc_modules_section show_on="desktop tablet phone" type="full" columns_spacing="nospacing" bg_color="" bg_image_thumb="disabled" bg_image="" bg_image_repeat="repeat" bg_image_position="left top" bg_image_attachment="scroll" bg_image_size="auto" bg_video="" bg_video_overlay_color="#000000" bg_video_overlay_opacity="0" border_color="rgb(230, 230, 230)" border_width="1" border_style="solid" border="" margin_h="0" margin_b="0" padding="0" padding_h="0" custom_class="" custom_id="" ] [dslc_modules_area last="yes" first="no" size="12"] [dslc_module last="yes"]YTo5OntzOjY6ImFtb3VudCI7czoxOiI0IjtzOjc6ImNvbHVtbnMiO3M6MToiMyI7czoxNzoic2VwYXJhdG9yX2VuYWJsZWQiO3M6ODoiZGlzYWJsZWQiO3M6MjA6ImNzc19tYWluX2JvcmRlcl90cmJsIjtzOjEyOiJib3R0b20gbGVmdCAiO3M6MTg6Im1vZHVsZV9pbnN0YW5jZV9pZCI7czoxOiIyIjtzOjc6InBvc3RfaWQiO3M6MjoiNTYiO3M6MTE6ImRzbGNfbV9zaXplIjtzOjI6IjEyIjtzOjk6Im1vZHVsZV9pZCI7czoxMzoiRFNMQ19Qcm9qZWN0cyI7czoxNjoiZHNsY19tX3NpemVfbGFzdCI7czozOiJ5ZXMiO30=[/dslc_module] [/dslc_modules_area] [/dslc_modules_section] [dslc_modules_section show_on="desktop tablet phone" type="wrapped" columns_spacing="spacing" bg_color="" bg_image_thumb="disabled" bg_image="" bg_image_repeat="repeat" bg_image_position="left top" bg_image_attachment="scroll" bg_image_size="auto" bg_video="" bg_video_overlay_color="#000000" bg_video_overlay_opacity="0" border_color="" border_width="0" border_style="solid" border="top right bottom left" margin_h="0" margin_b="0" padding="80" padding_h="0" custom_class="" custom_id="" ] [dslc_modules_area last="yes" first="no" size="12"] [dslc_module last="yes"]YToyNDp7czo3OiJjb250ZW50IjtzOjYwOiI8aDI+RnJvbSBUaGUgSm91cm5hbDwvaDI+CjxoMz5yYW1ibGluZ3Mgb24gcmFuZG9tIHN0dWZmPC9oMz4iO3M6MTc6ImNzc19tYXJnaW5fYm90dG9tIjtzOjI6IjUwIjtzOjEyOiJjc3NfaDFfY29sb3IiO3M6MTI6InJnYigwLCAwLCAwKSI7czoxNjoiY3NzX2gxX2ZvbnRfc2l6ZSI7czoyOiI1NSI7czoxODoiY3NzX2gxX2ZvbnRfd2VpZ2h0IjtzOjM6IjcwMCI7czoxODoiY3NzX2gxX2ZvbnRfZmFtaWx5IjtzOjY6IlJvYm90byI7czoxODoiY3NzX2gxX2xpbmVfaGVpZ2h0IjtzOjI6IjU1IjtzOjEyOiJjc3NfaDJfY29sb3IiO3M6MTI6InJnYigwLCAwLCAwKSI7czoxNjoiY3NzX2gyX2ZvbnRfc2l6ZSI7czoyOiI0MCI7czoxODoiY3NzX2gyX2ZvbnRfd2VpZ2h0IjtzOjM6IjcwMCI7czoxODoiY3NzX2gyX2ZvbnRfZmFtaWx5IjtzOjY6IlJvYm90byI7czoxODoiY3NzX2gyX2xpbmVfaGVpZ2h0IjtzOjI6IjQwIjtzOjIwOiJjc3NfaDJfbWFyZ2luX2JvdHRvbSI7czoyOiIxNiI7czoxMjoiY3NzX2gzX2NvbG9yIjtzOjE4OiJyZ2IoMTU0LCAxNTQsIDE1NCkiO3M6MTY6ImNzc19oM19mb250X3NpemUiO3M6MjoiMjIiO3M6MTg6ImNzc19oM19mb250X3dlaWdodCI7czozOiIzMDAiO3M6MTg6ImNzc19oM19mb250X2ZhbWlseSI7czo2OiJSb2JvdG8iO3M6MTg6ImNzc19oM19saW5lX2hlaWdodCI7czoyOiIyMiI7czoyMDoiY3NzX2gzX21hcmdpbl9ib3R0b20iO3M6MToiMCI7czoxODoibW9kdWxlX2luc3RhbmNlX2lkIjtzOjE6IjkiO3M6NzoicG9zdF9pZCI7czoyOiIxMSI7czoxMToiZHNsY19tX3NpemUiO3M6MjoiMTIiO3M6OToibW9kdWxlX2lkIjtzOjE2OiJEU0xDX1RleHRfU2ltcGxlIjtzOjE2OiJkc2xjX21fc2l6ZV9sYXN0IjtzOjM6InllcyI7fQ==[/dslc_module] [dslc_module last="yes"]YTo3OntzOjEzOiJwb3N0X2VsZW1lbnRzIjtzOjIxOiJ0aXRsZSBleGNlcnB0IGJ1dHRvbiAiO3M6MTU6InRpdGxlX2ZvbnRfc2l6ZSI7czoyOiIyMyI7czoxNzoidGl0bGVfbGluZV9oZWlnaHQiO3M6MjoiMzEiO3M6MTg6Im1vZHVsZV9pbnN0YW5jZV9pZCI7czoxOiI2IjtzOjc6InBvc3RfaWQiO3M6MjoiNTYiO3M6MTE6ImRzbGNfbV9zaXplIjtzOjI6IjEyIjtzOjk6Im1vZHVsZV9pZCI7czo5OiJEU0xDX0Jsb2ciO30=[/dslc_module] [/dslc_modules_area] [/dslc_modules_section] ',
			),
			array(
				'post_title' => 'Home Variation #3',
				'dslc_code' => '[dslc_modules_section show_on="desktop tablet phone" type="full" columns_spacing="spacing" bg_color="" bg_image_thumb="disabled" bg_image="" bg_image_repeat="repeat" bg_image_position="left top" bg_image_attachment="scroll" bg_image_size="auto" bg_video="" bg_video_overlay_color="#000000" bg_video_overlay_opacity="0" border_color="rgb(230, 230, 230)" border_width="1" border_style="solid" border="top bottom " margin_h="0" margin_b="0" padding="80" padding_h="4" custom_class="" custom_id="" ] [dslc_modules_area last="yes" first="no" size="12"] [dslc_module last="yes"]YToxMTp7czoxMToib3JpZW50YXRpb24iO3M6MTA6Imhvcml6b250YWwiO3M6NjoiYW1vdW50IjtzOjI6IjEyIjtzOjE3OiJjYXJvdXNlbF9lbGVtZW50cyI7czo3OiJhcnJvd3MgIjtzOjExOiJ0aHVtYl93aWR0aCI7czoyOiI0MCI7czoyMDoiY3NzX21haW5fYm9yZGVyX3RyYmwiO3M6MjI6InRvcCByaWdodCBib3R0b20gbGVmdCAiO3M6MjU6ImNzc19tYWluX3BhZGRpbmdfdmVydGljYWwiO3M6MjoiMjciO3M6MTg6Im1vZHVsZV9pbnN0YW5jZV9pZCI7czoxOiIyIjtzOjc6InBvc3RfaWQiO3M6MjoiNjAiO3M6MTE6ImRzbGNfbV9zaXplIjtzOjI6IjEyIjtzOjk6Im1vZHVsZV9pZCI7czoxMzoiRFNMQ19Qcm9qZWN0cyI7czoxNjoiZHNsY19tX3NpemVfbGFzdCI7czozOiJ5ZXMiO30=[/dslc_module] [/dslc_modules_area] [/dslc_modules_section] [dslc_modules_section show_on="desktop tablet phone" type="wrapped" columns_spacing="spacing" bg_color="" bg_image_thumb="disabled" bg_image="" bg_image_repeat="repeat" bg_image_position="left top" bg_image_attachment="scroll" bg_image_size="auto" bg_video="" bg_video_overlay_color="#000000" bg_video_overlay_opacity="0" border_color="" border_width="0" border_style="solid" border="top right bottom left" margin_h="0" margin_b="0" padding="80" padding_h="0" custom_class="" custom_id="" ] [dslc_modules_area last="yes" first="no" size="12"] [dslc_module last="yes"]YToxNDp7czoxMToib3JpZW50YXRpb24iO3M6ODoidmVydGljYWwiO3M6NjoiYW1vdW50IjtzOjE6IjYiO3M6NzoiY29sdW1ucyI7czoxOiI0IjtzOjg6ImVsZW1lbnRzIjtzOjEzOiJtYWluX2hlYWRpbmcgIjtzOjEzOiJwb3N0X2VsZW1lbnRzIjtzOjEzOiJ0aXRsZSBidXR0b24gIjtzOjE3OiJjYXJvdXNlbF9lbGVtZW50cyI7czo3OiJhcnJvd3MgIjtzOjE0OiJjc3Nfc2VwX2hlaWdodCI7czoyOiIxNCI7czoxMToidGh1bWJfd2lkdGgiO3M6MzoiMTAwIjtzOjE1OiJ0aXRsZV9mb250X3NpemUiO3M6MjoiMTkiO3M6MTg6Im1haW5faGVhZGluZ190aXRsZSI7czoxNToiUmVjZW50IEFydGljbGVzIjtzOjE4OiJtb2R1bGVfaW5zdGFuY2VfaWQiO3M6MToiNiI7czo3OiJwb3N0X2lkIjtzOjI6IjYwIjtzOjExOiJkc2xjX21fc2l6ZSI7czoyOiIxMiI7czo5OiJtb2R1bGVfaWQiO3M6OToiRFNMQ19CbG9nIjt9[/dslc_module] [/dslc_modules_area] [/dslc_modules_section] ',
			),
		);

		$count = 0;

		foreach ( $datas as $data ) {

			$count++;

			// Create post object.
			$the_post = array(
				'post_title' => $data['post_title'],
				'post_status' => 'publish',
				'post_type' => 'page',
			);

			if ( $count > 1 ) {
				$the_post['post_parent'] = $parent_id;
			}

			// Insert the post into the database.
			$post_id = wp_insert_post( $the_post );

			if ( 1 == $count ) {
				$parent_id = $post_id;
			}

			// If post added.
			if ( $post_id ) {

				// Add LC code.
				add_post_meta( $post_id, 'dslc_code', $data['dslc_code'] );

				// Set as front page.
				if ( 1 == $count ) {
					update_option( 'page_on_front', $post_id );
					update_option( 'show_on_front', 'page' );
				}

				// Add to Menu.
				if ( 1 == $count ) {
					$menu_parent = wp_update_nav_menu_item( $menu, 0, array(
						'menu-item-title' => $data['post_title'],
						'menu-item-object' => 'page',
						'menu-item-object-id' => $post_id,
						'menu-item-type' => 'post_type',
						'menu-item-status' => 'publish',
						'menu-item-parent-id' => 0,
					));
				} else {
					wp_update_nav_menu_item( $menu, 0, array(
						'menu-item-title' => $data['post_title'],
						'menu-item-object' => 'page',
						'menu-item-object-id' => $post_id,
						'menu-item-type' => 'post_type',
						'menu-item-status' => 'publish',
						'menu-item-parent-id' => $menu_parent,
					));
				}
			} else {
				$response['status'] = 'fail';
			}
		}

		// Encode response.
		$response_json = json_encode( $response );

		// AJAX phone home.
		header( 'Content-Type: application/json' );
		echo $response_json;

		// Asta la vista.
		exit;
	}

} add_action( 'wp_ajax_lct-ajax-install-home-page', 'lct_importer_ajax_install_home_page' );

/**
 * Install Blog Pages
 */
function lct_importer_ajax_install_blog_pages() {

	// Allowed to do this?
	if ( is_user_logged_in() && current_user_can( 'manage_options' ) ) {

		$response = array();
		$response['status'] = 'success';

		$menu = wp_get_nav_menu_object( 'Main Menu' );
		$menu = $menu->term_id;

		$locations = get_theme_mod( 'nav_menu_locations' );
		$locations['dslc_main'] = $menu;
		set_theme_mod( 'nav_menu_locations', $locations );

		$datas = array(
			array(
				'post_title' => 'Blog',
				'dslc_code' => '[dslc_modules_section show_on="desktop tablet phone" type="wrapped" columns_spacing="spacing" bg_color="" bg_image_thumb="disabled" bg_image="" bg_image_repeat="repeat" bg_image_position="left top" bg_image_attachment="scroll" bg_image_size="auto" bg_video="" bg_video_overlay_color="#000000" bg_video_overlay_opacity="0" border_color="rgb(230, 230, 230)" border_width="1" border_style="solid" border="top " margin_h="0" margin_b="0" padding="80" padding_h="0" custom_class="" custom_id="" ] [dslc_modules_area last="no" first="yes" size="8"] [dslc_module last="yes"]YToxOTp7czoxMToib3JpZW50YXRpb24iO3M6ODoidmVydGljYWwiO3M6MTU6InBhZ2luYXRpb25fdHlwZSI7czo4OiJudW1iZXJlZCI7czo3OiJjb2x1bW5zIjtzOjI6IjEyIjtzOjEzOiJwb3N0X2VsZW1lbnRzIjtzOjM2OiJ0aHVtYm5haWwgdGl0bGUgbWV0YSBleGNlcnB0IGJ1dHRvbiAiO3M6MjU6InRodW1iX3Jlc2l6ZV93aWR0aF9tYW51YWwiO3M6NDoiMTAwMCI7czoxMToidGh1bWJfd2lkdGgiO3M6MzoiMTAwIjtzOjI1OiJjc3NfbWFpbl9wYWRkaW5nX3ZlcnRpY2FsIjtzOjI6IjM3IjtzOjI3OiJjc3NfbWFpbl9wYWRkaW5nX2hvcml6b250YWwiO3M6MjoiNDMiO3M6MTU6InRpdGxlX2ZvbnRfc2l6ZSI7czoyOiIzMCI7czoxNzoidGl0bGVfbGluZV9oZWlnaHQiO3M6MjoiNDEiO3M6OToiY3NzX3Jlc19wIjtzOjc6ImVuYWJsZWQiO3M6MjU6ImNzc19yZXNfcF90aXRsZV9mb250X3NpemUiO3M6MjoiMjIiO3M6Mjc6ImNzc19yZXNfcF90aXRsZV9saW5lX2hlaWdodCI7czoyOiIzMSI7czoyNzoiY3NzX3Jlc19wX2V4Y2VycHRfZm9udF9zaXplIjtzOjI6IjE1IjtzOjI5OiJjc3NfcmVzX3BfZXhjZXJwdF9saW5lX2hlaWdodCI7czoyOiIyNSI7czoxODoibW9kdWxlX2luc3RhbmNlX2lkIjtzOjI6IjM1IjtzOjc6InBvc3RfaWQiO3M6MjoiMTQiO3M6MTE6ImRzbGNfbV9zaXplIjtzOjI6IjEyIjtzOjk6Im1vZHVsZV9pZCI7czo5OiJEU0xDX0Jsb2ciO30=[/dslc_module] [/dslc_modules_area] [dslc_modules_area last="yes" first="no" size="4"] [dslc_module last="yes"]YTo1OntzOjE4OiJtb2R1bGVfaW5zdGFuY2VfaWQiO2k6MzY7czo3OiJwb3N0X2lkIjtzOjI6IjQ0IjtzOjExOiJkc2xjX21fc2l6ZSI7czoyOiIxMiI7czo5OiJtb2R1bGVfaWQiO3M6MTI6IkRTTENfV2lkZ2V0cyI7czoxNjoiZHNsY19tX3NpemVfbGFzdCI7czozOiJ5ZXMiO30=[/dslc_module] [/dslc_modules_area] [/dslc_modules_section] ',
			),
			array(
				'post_title' => 'Blog Version 2',
				'dslc_code' => '[dslc_modules_section show_on="desktop tablet phone" type="wrapped" columns_spacing="spacing" bg_color="" bg_image_thumb="disabled" bg_image="" bg_image_repeat="repeat" bg_image_position="left top" bg_image_attachment="scroll" bg_image_size="auto" bg_video="" bg_video_overlay_color="#000000" bg_video_overlay_opacity="0" border_color="rgb(230, 230, 230)" border_width="1" border_style="solid" border="top " margin_h="0" margin_b="0" padding="80" padding_h="0" custom_class="" custom_id="" ] [dslc_modules_area last="no" first="yes" size="8"] [dslc_module last="yes"]YTo2OntzOjE1OiJwYWdpbmF0aW9uX3R5cGUiO3M6ODoibnVtYmVyZWQiO3M6NzoiY29sdW1ucyI7czoyOiIxMiI7czoxODoibW9kdWxlX2luc3RhbmNlX2lkIjtzOjI6IjIwIjtzOjc6InBvc3RfaWQiO3M6MjoiMTYiO3M6MTE6ImRzbGNfbV9zaXplIjtzOjI6IjEyIjtzOjk6Im1vZHVsZV9pZCI7czo5OiJEU0xDX0Jsb2ciO30=[/dslc_module] [/dslc_modules_area] [dslc_modules_area last="yes" first="no" size="4"] [dslc_module last="yes"]YTo1OntzOjE4OiJtb2R1bGVfaW5zdGFuY2VfaWQiO3M6MjoiMjEiO3M6NzoicG9zdF9pZCI7czoyOiI0NCI7czoxMToiZHNsY19tX3NpemUiO3M6MjoiMTIiO3M6OToibW9kdWxlX2lkIjtzOjEyOiJEU0xDX1dpZGdldHMiO3M6MTY6ImRzbGNfbV9zaXplX2xhc3QiO3M6MzoieWVzIjt9[/dslc_module] [/dslc_modules_area] [/dslc_modules_section] ',
			),
			array(
				'post_title' => 'Blog Version 3',
				'dslc_code' => '[dslc_modules_section show_on="desktop tablet phone" type="wrapped" columns_spacing="spacing" bg_color="" bg_image_thumb="disabled" bg_image="" bg_image_repeat="repeat" bg_image_position="left top" bg_image_attachment="scroll" bg_image_size="auto" bg_video="" bg_video_overlay_color="#000000" bg_video_overlay_opacity="0" border_color="rgb(230, 230, 230)" border_width="1" border_style="solid" border="top " margin_h="0" margin_b="0" padding="80" padding_h="0" custom_class="" custom_id="" ] [dslc_modules_area last="yes" first="no" size="12"] [dslc_module last="yes"]YTo3OntzOjE1OiJwYWdpbmF0aW9uX3R5cGUiO3M6ODoibnVtYmVyZWQiO3M6NzoiY29sdW1ucyI7czoyOiIxMiI7czoxMzoicG9zdF9lbGVtZW50cyI7czozNjoidGh1bWJuYWlsIHRpdGxlIG1ldGEgZXhjZXJwdCBidXR0b24gIjtzOjE4OiJtb2R1bGVfaW5zdGFuY2VfaWQiO3M6MjoiMzciO3M6NzoicG9zdF9pZCI7czoyOiIxOCI7czoxMToiZHNsY19tX3NpemUiO3M6MjoiMTIiO3M6OToibW9kdWxlX2lkIjtzOjk6IkRTTENfQmxvZyI7fQ==[/dslc_module] [/dslc_modules_area] [/dslc_modules_section] ',
			),
		);

		$count = 0;

		foreach ( $datas as $data ) {

			$count++;

			// Create post object.
			$the_post = array(
				'post_title' => $data['post_title'],
				'post_status' => 'publish',
				'post_type' => 'page',
			);

			if ( $count > 1 ) {
				$the_post['post_parent'] = $parent_id;
			}

			// Insert the post into the database.
			$post_id = wp_insert_post( $the_post );

			if ( 1 == $count ) {
				$parent_id = $post_id;
			}

			// If post added.
			if ( $post_id ) {

				add_post_meta( $post_id, 'dslc_code', $data['dslc_code'] );

				if ( 1 == $count ) {
					$menu_parent = wp_update_nav_menu_item( $menu, 0, array(
						'menu-item-title' => $data['post_title'],
						'menu-item-object' => 'page',
						'menu-item-object-id' => $post_id,
						'menu-item-type' => 'post_type',
						'menu-item-status' => 'publish',
						'menu-item-parent-id' => 0,
					));
				} else {
					wp_update_nav_menu_item( $menu, 0, array(
						'menu-item-title' => $data['post_title'],
						'menu-item-object' => 'page',
						'menu-item-object-id' => $post_id,
						'menu-item-type' => 'post_type',
						'menu-item-status' => 'publish',
						'menu-item-parent-id' => $menu_parent,
					));
				}
			} else {
				$response['status'] = 'fail';
			}
		}

		// Encode response.
		$response_json = json_encode( $response );

		// AJAX phone home.
		header( 'Content-Type: application/json' );
		echo $response_json;

		// Asta la vista.
		exit;
	}

} add_action( 'wp_ajax_lct-ajax-install-blog-pages', 'lct_importer_ajax_install_blog_pages' );

/**
 * Install Portfolio Pages
 */
function lct_importer_ajax_install_portfolio_pages() {

	// Allowed to do this?
	if ( is_user_logged_in() && current_user_can( 'manage_options' ) ) {

		$response = array();
		$response['status'] = 'success';

		$menu = wp_get_nav_menu_object( 'Main Menu' );
		$menu = $menu->term_id;

		$datas = array(
			array(
				'post_title' => 'Projects',
				'dslc_code' => '[dslc_modules_section show_on="desktop tablet phone" type="wrapped" columns_spacing="spacing" bg_color="rgba(230, 230, 230, 0)" bg_image_thumb="disabled" bg_image="" bg_image_repeat="repeat" bg_image_position="left top" bg_image_attachment="scroll" bg_image_size="auto" bg_video="" bg_video_overlay_color="#000000" bg_video_overlay_opacity="0" border_color="rgb(230, 230, 230)" border_width="1" border_style="solid" border="top " margin_h="0" margin_b="0" padding="80" padding_h="0" custom_class="" custom_id="" ] [dslc_modules_area last="yes" first="no" size="12"] [dslc_module last="yes"]YToxMzp7czoxNToicGFnaW5hdGlvbl90eXBlIjtzOjg6Im51bWJlcmVkIjtzOjIxOiJjc3NfcGFnX2l0ZW1fYmdfY29sb3IiO3M6MTY6InJnYmEoMCwgMCwgMCwgMCkiO3M6Mjg6ImNzc19wYWdfaXRlbV9iZ19jb2xvcl9hY3RpdmUiO3M6MTc6InJnYigyNTMsIDczLCAxMTIpIjtzOjI1OiJjc3NfcGFnX2l0ZW1fYm9yZGVyX2NvbG9yIjtzOjE4OiJyZ2IoMjMwLCAyMzAsIDIzMCkiO3M6MzI6ImNzc19wYWdfaXRlbV9ib3JkZXJfY29sb3JfYWN0aXZlIjtzOjE3OiJyZ2IoMjUzLCA3MywgMTEyKSI7czoyNjoiY3NzX3BhZ19pdGVtX2JvcmRlcl9yYWRpdXMiO3M6MToiMCI7czoyMjoiY3NzX3BhZ19pdGVtX2ZvbnRfc2l6ZSI7czoyOiIxMyI7czoyNDoiY3NzX3BhZ19pdGVtX2ZvbnRfZmFtaWx5IjtzOjY6IlJvYm90byI7czozMToiY3NzX3BhZ19pdGVtX3BhZGRpbmdfaG9yaXpvbnRhbCI7czoyOiIxNiI7czoxODoibW9kdWxlX2luc3RhbmNlX2lkIjtzOjI6IjE1IjtzOjc6InBvc3RfaWQiO3M6MjoiMzgiO3M6MTE6ImRzbGNfbV9zaXplIjtzOjI6IjEyIjtzOjk6Im1vZHVsZV9pZCI7czoxMzoiRFNMQ19Qcm9qZWN0cyI7fQ==[/dslc_module] [/dslc_modules_area] [/dslc_modules_section] ',
			),
			array(
				'post_title' => 'Projects Version 2',
				'dslc_code' => '[dslc_modules_section show_on="desktop tablet phone" type="full" columns_spacing="nospacing" bg_color="" bg_image_thumb="disabled" bg_image="" bg_image_repeat="repeat" bg_image_position="left top" bg_image_attachment="scroll" bg_image_size="auto" bg_video="" bg_video_overlay_color="#000000" bg_video_overlay_opacity="0" border_color="rgb(230, 230, 230)" border_width="1" border_style="solid" border="" margin_h="0" margin_b="0" padding="0" padding_h="0" custom_class="" custom_id="" ] [dslc_modules_area last="yes" first="no" size="12"] [dslc_module last="yes"]YTo4OntzOjY6ImFtb3VudCI7czoxOiI4IjtzOjc6ImNvbHVtbnMiO3M6MToiMyI7czoxNzoic2VwYXJhdG9yX2VuYWJsZWQiO3M6ODoiZGlzYWJsZWQiO3M6MjA6ImNzc19tYWluX2JvcmRlcl90cmJsIjtzOjEyOiJib3R0b20gbGVmdCAiO3M6MTg6Im1vZHVsZV9pbnN0YW5jZV9pZCI7czoyOiIzMyI7czo3OiJwb3N0X2lkIjtzOjI6IjYzIjtzOjExOiJkc2xjX21fc2l6ZSI7czoyOiIxMiI7czo5OiJtb2R1bGVfaWQiO3M6MTM6IkRTTENfUHJvamVjdHMiO30=[/dslc_module] [/dslc_modules_area] [/dslc_modules_section] ',
			),
			array(
				'post_title' => 'Projects Version 3',
				'dslc_code' => '[dslc_modules_section show_on="desktop tablet phone" type="wrapped" columns_spacing="spacing" bg_color="" bg_image_thumb="disabled" bg_image="" bg_image_repeat="repeat" bg_image_position="left top" bg_image_attachment="scroll" bg_image_size="auto" bg_video="" bg_video_overlay_color="#000000" bg_video_overlay_opacity="0" border_color="rgb(241, 241, 241)" border_width="1" border_style="solid" border="top " margin_h="0" margin_b="0" padding="80" padding_h="0" custom_class="" custom_id="" ] [dslc_modules_area last="yes" first="no" size="12"] [dslc_module last="yes"]YToxMTp7czoxMToib3JpZW50YXRpb24iO3M6MTA6Imhvcml6b250YWwiO3M6MTU6InBhZ2luYXRpb25fdHlwZSI7czo4OiJudW1iZXJlZCI7czo3OiJjb2x1bW5zIjtzOjE6IjYiO3M6MTE6InRodW1iX3dpZHRoIjtzOjI6IjQwIjtzOjIwOiJjc3NfbWFpbl9ib3JkZXJfdHJibCI7czoyMjoidG9wIHJpZ2h0IGJvdHRvbSBsZWZ0ICI7czoyNToiY3NzX21haW5fcGFkZGluZ192ZXJ0aWNhbCI7czoyOiIyNiI7czoxODoibW9kdWxlX2luc3RhbmNlX2lkIjtzOjI6IjM0IjtzOjc6InBvc3RfaWQiO3M6MjoiNjUiO3M6MTE6ImRzbGNfbV9zaXplIjtzOjI6IjEyIjtzOjk6Im1vZHVsZV9pZCI7czoxMzoiRFNMQ19Qcm9qZWN0cyI7czoxNjoiZHNsY19tX3NpemVfbGFzdCI7czozOiJ5ZXMiO30=[/dslc_module] [/dslc_modules_area] [/dslc_modules_section] ',
			),
		);

		$count = 0;

		foreach ( $datas as $data ) {

			$count++;

			// Create post object.
			$the_post = array(
				'post_title' => $data['post_title'],
				'post_status' => 'publish',
				'post_type' => 'page',
			);

			if ( $count > 1 ) {
				$the_post['post_parent'] = $parent_id;
			}

			// Insert the post into the database.
			$post_id = wp_insert_post( $the_post );

			if ( 1 == $count ) {
				$parent_id = $post_id;
			}

			// If post added.
			if ( $post_id ) {

				add_post_meta( $post_id, 'dslc_code', $data['dslc_code'] );

				if ( 1 == $count ) {
					$menu_parent = wp_update_nav_menu_item( $menu, 0, array(
						'menu-item-title' => $data['post_title'],
						'menu-item-object' => 'page',
						'menu-item-object-id' => $post_id,
						'menu-item-type' => 'post_type',
						'menu-item-status' => 'publish',
						'menu-item-parent-id' => 0,
					));
				} else {
					wp_update_nav_menu_item( $menu, 0, array(
						'menu-item-title' => $data['post_title'],
						'menu-item-object' => 'page',
						'menu-item-object-id' => $post_id,
						'menu-item-type' => 'post_type',
						'menu-item-status' => 'publish',
						'menu-item-parent-id' => $menu_parent,
					));
				}
			} else {
				$response['status'] = 'fail';
			}
		}

		// Encode response.
		$response_json = json_encode( $response );

		// AJAX phone home.
		header( 'Content-Type: application/json' );
		echo $response_json;

		// Asta la vista.
		exit;
	}

} add_action( 'wp_ajax_lct-ajax-install-portfolio-pages', 'lct_importer_ajax_install_portfolio_pages' );

/**
 * Install Blog Posts
 */
function lct_importer_ajax_install_blog_posts() {

	// Allowed to do this?
	if ( is_user_logged_in() && current_user_can( 'manage_options' ) ) {

		$response = array();
		$response['status'] = 'success';

		$post_excerpt = 'Curabitur congue dolor sed massa feugiat, sit amet tempor orci convallis. Donec lacus magna, semper eget nisl sed, posuere pellentesque tellus. Cras mauris tellus, ultricies quis hendrerit imperdiet, faucibus non nulla.';
		$post_content = 'Mauris vehicula efficitur mi, vel sollicitudin lectus vulputate a. Phasellus vulputate nunc libero, eu faucibus sem bibendum in. Aenean mollis quis diam sed cursus. Integer tristique rhoncus sapien vitae semper. Mauris euismod venenatis sem vitae congue.

Duis ullamcorper diam eget porttitor sagittis. Mauris porttitor magna in interdum vestibulum. Integer nec cursus neque. Mauris eu nibh rhoncus, laoreet sapien id, tincidunt turpis. Etiam mattis dapibus laoreet. Vestibulum bibendum tortor vel felis commodo ultrices. In in elit vitae eros suscipit commodo ut tristique erat. Vestibulum vehicula turpis id quam euismod vulputate.

Quisque lacinia, purus non porta malesuada, lectus tortor iaculis odio, nec laoreet massa dui sit amet elit. Sed tempus bibendum nisi eget vehicula. Maecenas quis leo eu augue faucibus aliquam.

Quisque sed pharetra odio, eu consectetur dui. Etiam scelerisque sagittis nunc, a scelerisque lorem. Fusce commodo tempus diam sed hendrerit. In ullamcorper odio eu pretium consectetur.';

		$url = get_template_directory_uri() . '/inc/importer/images/placeholder.jpg';
		$tmp = download_url( $url );
		$post_id = 0;
		$desc = 'Placeholder';
		$file_array = array();

		// Set variables for storage
		// fix file filename for query strings.
		preg_match( '/[^\?]+\.(jpg|jpe|jpeg|gif|png)/i', $url, $matches );
		$file_array['name'] = basename( $matches[0] );
		$file_array['tmp_name'] = $tmp;

		// If error storing temporarily, unlink.
		if ( is_wp_error( $tmp ) ) {
			@unlink( $file_array['tmp_name'] );
			$file_array['tmp_name'] = '';
		}

		// Do the validation and storage stuff.
		$id = media_handle_sideload( $file_array, $post_id, $desc );

		// If error storing permanently, unlink.
		if ( is_wp_error( $id ) ) {
			@unlink( $file_array['tmp_name'] );
			return $id;
		}

		for ( $i = 1; $i < 16; $i++ ) {

			$date = $i;
			if ( $i < 10 ) {
				$date = '0' . $i;
			}

			// Create post object.
			$the_post = array(
				'post_title' => 'Blog Post #' . $i,
				'post_status' => 'publish',
				'post_type' => 'post',
				'post_content' => $post_content,
				'post_excerpt' => $post_excerpt,
				'post_date' => date( '2015-04-01 ' . $date . ':00:00' ),
			);

			// Insert the post into the database.
			$post_id = wp_insert_post( $the_post );

			if ( $post_id && $id ) {
				add_post_meta( $post_id, '_thumbnail_id', $id, true );
			}

			if ( $i < 6 ) {
				wp_set_post_terms( $post_id, 'featured', 'post_tag' );
			}
		}

		// Encode response.
		$response_json = json_encode( $response );

		// AJAX phone home.
		header( 'Content-Type: application/json' );
		echo $response_json;

		// Asta la vista.
		exit;
	}

} add_action( 'wp_ajax_lct-ajax-install-blog-posts', 'lct_importer_ajax_install_blog_posts' );

/**
 * Install Projects
 */
function lct_importer_ajax_install_projects() {

	// Allowed to do this?
	if ( is_user_logged_in() && current_user_can( 'manage_options' ) ) {

		$response = array();
		$response['status'] = 'success';

		$post_excerpt = 'Curabitur congue dolor sed massa feugiat, sit amet tempor orci convallis.';
		$post_content = 'Mauris vehicula efficitur mi, vel sollicitudin lectus vulputate a. Phasellus vulputate nunc libero, eu faucibus sem bibendum in. Aenean mollis quis diam sed cursus. Integer tristique rhoncus sapien vitae semper. Mauris euismod venenatis sem vitae congue.

Duis ullamcorper diam eget porttitor sagittis. Mauris porttitor magna in interdum vestibulum. Integer nec cursus neque. Mauris eu nibh rhoncus, laoreet sapien id, tincidunt turpis. Etiam mattis dapibus laoreet. Vestibulum bibendum tortor vel felis commodo ultrices. In in elit vitae eros suscipit commodo ut tristique erat. Vestibulum vehicula turpis id quam euismod vulputate.

Quisque lacinia, purus non porta malesuada, lectus tortor iaculis odio, nec laoreet massa dui sit amet elit. Sed tempus bibendum nisi eget vehicula. Maecenas quis leo eu augue faucibus aliquam.

Quisque sed pharetra odio, eu consectetur dui. Etiam scelerisque sagittis nunc, a scelerisque lorem. Fusce commodo tempus diam sed hendrerit. In ullamcorper odio eu pretium consectetur.';

		$url = get_template_directory_uri() . '/inc/importer/images/placeholder.jpg';
		$tmp = download_url( $url );
		$post_id = 0;
		$desc = 'Placeholder';
		$file_array = array();

		// Set variables for storage
		// fix file filename for query strings.
		preg_match( '/[^\?]+\.(jpg|jpe|jpeg|gif|png)/i', $url, $matches );
		$file_array['name'] = basename( $matches[0] );
		$file_array['tmp_name'] = $tmp;

		// If error storing temporarily, unlink.
		if ( is_wp_error( $tmp ) ) {
			@unlink( $file_array['tmp_name'] );
			$file_array['tmp_name'] = '';
		}

		// Do the validation and storage stuff.
		$id = media_handle_sideload( $file_array, $post_id, $desc );

		// If error storing permanently, unlink.
		if ( is_wp_error( $id ) ) {
			@unlink( $file_array['tmp_name'] );
			return $id;
		}

		for ( $i = 1; $i < 16; $i++ ) {

			$date = $i;
			if ( $i < 10 ) {
				$date = '0' . $i;
			}

			// Create post object.
			$the_post = array(
				'post_title' => 'Project #' . $i,
				'post_status' => 'publish',
				'post_type' => 'dslc_projects',
				'post_content' => $post_content,
				'post_excerpt' => $post_excerpt,
				'post_date' => date( '2015-04-01 ' . $date . ':00:00' ),
			);

			// Insert the post into the database.
			$post_id = wp_insert_post( $the_post );

			if ( $post_id && $id ) {
				add_post_meta( $post_id, '_thumbnail_id', $id, true );
			}
		}

		// Encode response.
		$response_json = json_encode( $response );

		// AJAX phone home.
		header( 'Content-Type: application/json' );
		echo $response_json;

		// Asta la vista.
		exit;
	}

} add_action( 'wp_ajax_lct-ajax-install-projects', 'lct_importer_ajax_install_projects' );

/**
 * VERSION 1.0.1 BELLOW
 */

/**
 * Install Category
 */
function lct_importer_ajax_install_category() {

	// Allowed to do this?
	if ( is_user_logged_in() && current_user_can( 'manage_options' ) ) {

		$response = array();
		$response['status'] = 'success';

		$data = array(
			'dslc_code' => '[dslc_modules_section show_on="desktop tablet phone" type="wrapped" columns_spacing="spacing" bg_color="" bg_image_thumb="disabled" bg_image="" bg_image_repeat="repeat" bg_image_position="left top" bg_image_attachment="scroll" bg_image_size="auto" bg_video="" bg_video_overlay_color="#000000" bg_video_overlay_opacity="0" border_color="rgb(230, 230, 230)" border_width="1" border_style="solid" border="top " margin_h="0" margin_b="0" padding="80" padding_h="0" custom_class="" custom_id="" ] [dslc_modules_area last="no" first="yes" size="8"] [dslc_module last="yes"]YTo2OntzOjc6ImNvbHVtbnMiO3M6MjoiMTIiO3M6MTg6Im1vZHVsZV9pbnN0YW5jZV9pZCI7czoyOiIyMCI7czo3OiJwb3N0X2lkIjtzOjI6IjQ0IjtzOjExOiJkc2xjX21fc2l6ZSI7czoyOiIxMiI7czo5OiJtb2R1bGVfaWQiO3M6OToiRFNMQ19CbG9nIjtzOjE2OiJkc2xjX21fc2l6ZV9sYXN0IjtzOjM6InllcyI7fQ==[/dslc_module] [/dslc_modules_area] [dslc_modules_area last="yes" first="no" size="4"] [dslc_module last="yes"]YTo1OntzOjE4OiJtb2R1bGVfaW5zdGFuY2VfaWQiO3M6MjoiMjEiO3M6NzoicG9zdF9pZCI7czoyOiI0NCI7czoxMToiZHNsY19tX3NpemUiO3M6MjoiMTIiO3M6OToibW9kdWxlX2lkIjtzOjEyOiJEU0xDX1dpZGdldHMiO3M6MTY6ImRzbGNfbV9zaXplX2xhc3QiO3M6MzoieWVzIjt9[/dslc_module] [/dslc_modules_area] [/dslc_modules_section] ',
		);

		// Create post object.
		$the_post = array(
			'post_title' => 'Archives and Search',
			'post_status' => 'publish',
			'post_type' => 'page',
		);

		// Insert the post into the database.
		$post_id = wp_insert_post( $the_post );

		// If post added.
		if ( $post_id ) {

			if ( get_option( 'dslc_plugin_options_archives' ) ) {
				$curr_opt_value = get_option( 'dslc_plugin_options_archives' );
				$curr_opt_value['post'] = $post_id;
				$curr_opt_value['search_results'] = $post_id;
				$curr_opt_value['author'] = $post_id;
			} else {
				$curr_opt_value = array( 'post' => $post_id, 'search_results' => $post_id, 'author' => $post_id );
			}

			update_option( 'dslc_plugin_options_archives', $curr_opt_value );

			// Go through the custom fields and add them.
			foreach ( $data as $custom_field_id => $custom_field_value ) {
				add_post_meta( $post_id, $custom_field_id, $custom_field_value );
			}
		} else {
			$response['status'] = 'fail';
		}

		// Encode response.
		$response_json = json_encode( $response );

		// AJAX phone home.
		header( 'Content-Type: application/json' );
		echo $response_json;

		// Asta la vista.
		exit;
	}

} add_action( 'wp_ajax_lct-ajax-install-category', 'lct_importer_ajax_install_category' );

/**
 * Install 404
 */
function lct_importer_ajax_install_404() {

	// Allowed to do this?
	if ( is_user_logged_in() && current_user_can( 'manage_options' ) ) {

		$response = array();
		$response['status'] = 'success';

		$data = array(
			'dslc_code' => '[dslc_modules_section show_on="desktop tablet phone" type="wrapped" columns_spacing="spacing" bg_color="" bg_image_thumb="disabled" bg_image="" bg_image_repeat="repeat" bg_image_position="left top" bg_image_attachment="scroll" bg_image_size="auto" bg_video="" bg_video_overlay_color="#000000" bg_video_overlay_opacity="0" border_color="rgb(218, 218, 218)" border_width="1" border_style="solid" border="top " margin_h="0" margin_b="0" padding="80" padding_h="0" custom_class="" custom_id="" ] [dslc_modules_area last="yes" first="no" size="12"] [dslc_module last="yes"]YToxMTp7czo3OiJjb250ZW50IjtzOjg1OiI8aDI+NDA0IC0gUGFnZSBOb3QgRm91bmQ8L2gyPgpXaG9vcHMuIFdlIGNvdWxkblwndCBmaW5kIHRoZSBwYWdlIHlvdVwncmUgbG9va2luZyBmb3IuIjtzOjE4OiJjc3NfbWFpbl9mb250X3NpemUiO3M6MjoiMjAiO3M6MTk6ImNzc19tYWluX3RleHRfYWxpZ24iO3M6NjoiY2VudGVyIjtzOjE2OiJjc3NfaDJfZm9udF9zaXplIjtzOjI6IjQwIjtzOjE4OiJjc3NfaDJfbGluZV9oZWlnaHQiO3M6MjoiNDAiO3M6MjA6ImNzc19oMl9tYXJnaW5fYm90dG9tIjtzOjI6IjE5IjtzOjE3OiJjc3NfaDJfdGV4dF9hbGlnbiI7czo2OiJjZW50ZXIiO3M6MTg6Im1vZHVsZV9pbnN0YW5jZV9pZCI7czoyOiI0MiI7czo3OiJwb3N0X2lkIjtzOjI6Ijg1IjtzOjExOiJkc2xjX21fc2l6ZSI7czoyOiIxMiI7czo5OiJtb2R1bGVfaWQiO3M6MTY6IkRTTENfVGV4dF9TaW1wbGUiO30=[/dslc_module] [/dslc_modules_area] [/dslc_modules_section] ',
		);

		// Create post object.
		$the_post = array(
			'post_title' => '404',
			'post_status' => 'publish',
			'post_type' => 'page',
		);

		// Insert the post into the database.
		$post_id = wp_insert_post( $the_post );

		// If post added.
		if ( $post_id ) {

			if ( get_option( 'dslc_plugin_options_archives' ) ) {
				$curr_opt_value = get_option( 'dslc_plugin_options_archives' );
				$curr_opt_value['404_page'] = $post_id;
			} else {
				$curr_opt_value = array( '404_page' => $post_id );
			}

			update_option( 'dslc_plugin_options_archives', $curr_opt_value );

			// Go through the custom fields and add them.
			foreach ( $data as $custom_field_id => $custom_field_value ) {
				add_post_meta( $post_id, $custom_field_id, $custom_field_value );
			}
		} else {
			$response['status'] = 'fail';
		}

		// Encode response.
		$response_json = json_encode( $response );

		// AJAX phone home.
		header( 'Content-Type: application/json' );
		echo $response_json;

		// Asta la vista.
		exit;
	}

} add_action( 'wp_ajax_lct-ajax-install-404', 'lct_importer_ajax_install_404' );
