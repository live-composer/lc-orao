<?php

/**
 * Content Width 
 * ( WP requires it and LC uses is to figure out the wrapper width )
 */

if ( ! isset( $content_width ) )
	$content_width = 1140;

/**
 * Basic Theme Setup
 */

if ( ! function_exists( 'lct_theme_setup' ) ) {

	function lct_theme_setup() {

		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );

		// Enable Post Thumbnails ( Featured Image )
		add_theme_support( 'post-thumbnails' );

		// Title tag support
		add_theme_support( 'title-tag' );

		// Enable support for HTML5 markup.
		add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form' ) );

	}

} add_action( 'after_setup_theme', 'lct_theme_setup' );

/**
 * Load Scripts
 */

function lct_load_scripts() {

	// CSS
	wp_enqueue_style( 'main-style', get_stylesheet_uri(), array(), '1.0' );

	// JavaScript
	wp_enqueue_script( 'jquery' );
	
} add_action( 'wp_enqueue_scripts', 'lct_load_scripts' );

/**
 * Include Files
 */

include get_template_directory() . '/live-composer/init.php';
include get_template_directory() . '/inc/importer/init.php';