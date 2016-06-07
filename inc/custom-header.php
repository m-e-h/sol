<?php
/**
 * Handles the setup and usage of the WordPress custom headers feature.
 *
 * @package  RCDOC
 */

// Call late so child themes can override.
add_action( 'after_setup_theme', 'abraham_custom_header_setup', 15 );

/**
 * Adds support for the WordPress 'custom-header' theme feature and registers custom headers.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function abraham_custom_header_setup() {

	// Adds support for WordPress' "custom-header" feature.
	add_theme_support(
		'custom-header',
		array(
			'width'                  => 1920,
			'height'                 => 560,
			'flex-width'             => true,
			'flex-height'            => true,
			'default-text-color'     => 'ffffff',
			'header-text'            => true,
			'uploads'                => true,
			'wp-head-callback'       => 'abraham_custom_header_wp_head',
		)
	);
}

/**
 * Callback function for outputting the custom header CSS to `wp_head`.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function abraham_custom_header_wp_head() {
	$style = '';
	if ( display_header_text() ) {
		$hex = get_header_textcolor();
		if ( ! $hex ) {
			return; }

		$style .= ".site-header,.archive-header{color:#{$hex};}";
	}

	global $cptarchives;
	$queried_object = get_queried_object_id();
	$term_image = get_term_meta( $queried_object, 'image', true );
	if ( $term_image ) {
		$bg_image = wp_get_attachment_image_url( $term_image, 'abe-hd' );

	} elseif ( has_post_thumbnail( $cptarchives->get_archive_id() ) ) {
		$bg_image = wp_get_attachment_image_url( get_post_thumbnail_id( $cptarchives->get_archive_id() ), 'abe-hd' );

	} elseif ( has_post_thumbnail() ) {
		$bg_image = wp_get_attachment_image_url( get_post_thumbnail_id(), 'abe-hd' );

	} elseif ( get_header_image() ) {
		$bg_image = get_header_image();
	}
	$style .= ".article-hero{background-image:url({$bg_image});}";
	echo "\n" . '<style type="text/css" id="custom-header-css">' . trim( $style ) . '</style>' . "\n";
}


add_action( 'tha_header_after', 'doc_article_hero' );

function doc_article_hero() {
	if ( is_front_page() ) {
		return; }

	echo '<div id="article-hero" class="article-hero u-1of1 u-bg-center u-bg-no-repeat u-bg-cover u-tinted-image u-bg-fixed u-abs u-left0 u-right0"></div>';
}
