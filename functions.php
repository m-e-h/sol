<?php
/**
 * Theme includes.
 *
 * @package Solucion
 */

add_action( 'after_setup_theme', 'sol_setup' );

$sol_inc = trailingslashit( get_stylesheet_directory() ) . 'inc/';
// Theme specific includes.
require_once $sol_inc . 'post-types.php';
require_once $sol_inc . 'custom-header.php';


/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function sol_setup() {
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'd2d2d2',
		)
	);

	add_filter( 'theme_mod_primary_color', 'sol_primary_color' );
	add_filter( 'theme_mod_secondary_color', 'sol_secondary_color' );
	add_filter( 'abe_add_non_hierarchy_cpts', 'sol_arch_cpts' );
	add_filter( 'arch_add_post_types', 'sol_arch_cpts' );
}
/**
 * Theme Colors.
 */
function sol_primary_color( $hex ) {
	return $hex ? $hex : 'cc0000';
}
function sol_secondary_color( $hex ) {
	return $hex ? $hex : '222222';
}

function sol_arch_cpts() {
	$cpts = array( 'eng_sol', 'staff_exec' );
	return $cpts;
}

function mf_add_zoninator_post_types() {
	add_post_type_support( 'cpt_archive', 'zoninator_zones' );
}
add_action('zoninator_pre_init', 'mf_add_zoninator_post_types');
