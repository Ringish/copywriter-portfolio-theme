<?php

// Register Custom Post Type
function portfolio_post_type() {

	$labels = array(
		'name'                  => _x( 'Projects', 'Post Type General Name', 'copywriter' ),
		'singular_name'         => _x( 'Projetct', 'Post Type Singular Name', 'copywriter' ),
		'menu_name'             => __( 'Portfolio', 'copywriter' ),
		'name_admin_bar'        => __( 'Project', 'copywriter' ),
		'archives'              => __( 'Portfolio Archives', 'copywriter' ),
		'attributes'            => __( 'Project Attributes', 'copywriter' ),
		'parent_item_colon'     => __( 'Parent project:', 'copywriter' ),
		'all_items'             => __( 'All projects', 'copywriter' ),
		'add_new_item'          => __( 'Add New project', 'copywriter' ),
		'add_new'               => __( 'Add New', 'copywriter' ),
		'new_item'              => __( 'New project', 'copywriter' ),
		'edit_item'             => __( 'Edit project', 'copywriter' ),
		'update_item'           => __( 'Update project', 'copywriter' ),
		'view_item'             => __( 'View project', 'copywriter' ),
		'view_items'            => __( 'View projects', 'copywriter' ),
		'search_items'          => __( 'Search project', 'copywriter' ),
		'not_found'             => __( 'Not found', 'copywriter' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'copywriter' ),
		'featured_image'        => __( 'Featured Image', 'copywriter' ),
		'set_featured_image'    => __( 'Set featured image', 'copywriter' ),
		'remove_featured_image' => __( 'Remove featured image', 'copywriter' ),
		'use_featured_image'    => __( 'Use as featured image', 'copywriter' ),
		'insert_into_item'      => __( 'Insert into project', 'copywriter' ),
		'uploaded_to_this_item' => __( 'Uploaded to this project', 'copywriter' ),
		'items_list'            => __( 'Items list', 'copywriter' ),
		'items_list_navigation' => __( 'Items list navigation', 'copywriter' ),
		'filter_items_list'     => __( 'Filter projects list', 'copywriter' ),
	);
	$args = array(
		'label'                 => __( 'Portfolio', 'copywriter' ),
		'description'           => __( 'Portfolio Description', 'copywriter' ),
		'labels'                => $labels,
		'supports'              => array('title','editor','thumbnail'),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_icon'				=> 'dashicons-portfolio',
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'portfolio', $args );

}
add_action( 'init', 'portfolio_post_type', 0 );