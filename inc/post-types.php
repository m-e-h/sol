<?php
/**
 * Post Types.
 *
 * @package  RCDOC
 */

add_action( 'init', 'sol_register_post_types' );
add_filter( 'hybrid_get_theme_layout', 'sol_landing_layout' );
add_filter( 'register_post_type_args', 'cpt_archive_labels', 10, 2 );

/**
 * Register post_types.
 *
 * @since  0.1.0
 * @access public
 */
function sol_register_post_types() {

	register_post_type(
        'eng_sol',
    	array(
    		'label'                 => __( 'Engineering Solutions', 'sol' ),
    		'labels'                => array(
        		'name'                  => _x( 'Engineering Solutions', 'Post Type General Name', 'sol' ),
        		'singular_name'         => _x( 'Engineering Solutions', 'Post Type Singular Name', 'sol' ),
        		'menu_name'             => __( 'Engineering Solutions', 'sol' ),
        		'name_admin_bar'        => __( 'Engineering Solutions', 'sol' ),
        		'archives'              => __( 'Engineering Archives', 'sol' ),
    	    ),
    		'supports'              => array(
				'title',
				'editor',
				'author',
				'thumbnail',
				'excerpt',
				'page-attributes',
				'theme-layouts',
				'archive',
				'arch-post'
			),
    		'taxonomies'            => array(
				'category',
				'post_tag'
			),
    		'hierarchical'          => true,
    		'public'                => true,
    		'show_ui'               => true,
    		'show_in_menu'          => true,
    		'menu_position'         => 5,
    		'menu_icon'             => 'dashicons-networking',
    		'show_in_admin_bar'     => true,
    		'show_in_nav_menus'     => true,
    		'can_export'            => true,
    		'has_archive'           => true,
    		'exclude_from_search'   => false,
    		'publicly_queryable'    => true,
    		'capability_type'       => 'page',
	    )
    );

	register_post_type(
		'staff_exec',
		array(
			'label'                 => __( 'Staffing and Executive', 'sol' ),
			'labels'                => array(
	    		'name'                  => _x( 'Staffing and Executive', 'sol' ),
	    		'singular_name'         => _x( 'Staffing and Executive', 'sol' ),
	    		'menu_name'             => __( 'Staffing and Executive', 'sol' ),
	    		'name_admin_bar'        => __( 'Staffing and Executive', 'sol' ),
	    		'archives'              => __( 'Staffing and Executive Archives', 'sol' ),
		    ),
			'supports'              => array(
				'title',
				'editor',
				'author',
				'thumbnail',
				'excerpt',
				'page-attributes',
				'theme-layouts',
				'archive',
				'arch-post'
			),
    		'taxonomies'            => array(
				'category',
				'post_tag'
			),
			'hierarchical'          => true,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-id-alt',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		)
	);
}



function sol_landing_layout( $layout ) {
	$archive_layout = '';
	if ( is_post_type_archive() ) {
		global $cptarchives;
		$archive_layout = hybrid_get_post_layout( $cptarchives->get_archive_id() );
	}
	return $archive_layout && 'default' !== $archive_layout ? $archive_layout : $layout;
}
function cpt_archive_labels( $args, $type ) {
	$cpt_archive_labels = array(
		'name'               => _x( 'Landing Pages', 'post type general name', 'cpt-archives' ),
		'singular_name'      => _x( 'Landing Page', 'post type singular name', 'cpt-archives' ),
		'menu_name'          => _x( 'Landing Pages', 'admin menu', 'cpt-archives' ),
		'name_admin_bar'     => _x( 'Landing Page', 'add new on admin bar', 'cpt-archives' ),
		'add_new'            => _x( 'Add New', 'cpt_archive', 'cpt-archives' ),
		'add_new_item'       => __( 'Add New Landing Page', 'cpt-archives' ),
		'new_item'           => __( 'New Landing Page', 'cpt-archives' ),
		'edit_item'          => __( 'Edit Landing Page', 'cpt-archives' ),
		'view_item'          => __( 'View Landing Page', 'cpt-archives' ),
		'all_items'          => __( 'All Landing Pages', 'cpt-archives' ),
		'search_items'       => __( 'Search Landing Pages', 'cpt-archives' ),
		'parent_item_colon'  => __( 'Parent Landing Pages:', 'cpt-archives' ),
		'not_found'          => __( 'No landing pages found.', 'cpt-archives' ),
		'not_found_in_trash' => __( 'No landing pages found in Trash.', 'cpt-archives' ),
	);
	if ( 'cpt_archive' === $type ) {
		$args['labels']   = $cpt_archive_labels;
		$args['supports'] = array(
			'author',
			'thumbnail',
			'theme-layouts',
			'custom-header',
		);
	}
	return $args;
}
