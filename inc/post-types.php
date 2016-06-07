<?php
/**
 * Post Types.
 *
 * @package  RCDOC
 */

add_action( 'init', 'sol_register_post_types' );

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
