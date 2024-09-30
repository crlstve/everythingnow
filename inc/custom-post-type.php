<?php

/**
 * Custom Post Type
 *
 * Register Custom Post Type
 */

// Register Custom Post Type
function everythingnow_register_post_type() {

	$labels = array(
		'name'                  => _x( 'Posts', 'Post Type General Name', 'everythingnow' ),
		'singular_name'         => _x( 'Post', 'Post Type Singular Name', 'everythingnow' ),
		'menu_name'             => __( 'Posts', 'everythingnow' ),
		'name_admin_bar'        => __( 'Post', 'everythingnow' ),
		'archives'              => __( 'Posts', 'everythingnow' ),
		'attributes'            => __( 'Post Attributes', 'everythingnow' ),
		'parent_item_colon'     => __( 'Parent Post:', 'everythingnow' ),
		'all_items'             => __( 'All Posts', 'everythingnow' ),
		'add_new_item'          => __( 'Add New Post', 'everythingnow' ),
		'add_new'               => __( 'Add New', 'everythingnow' ),
		'new_item'              => __( 'New Post', 'everythingnow' ),
		'edit_item'             => __( 'Edit Post', 'everythingnow' ),
		'update_item'           => __( 'Update Post', 'everythingnow' ),
		'view_item'             => __( 'View Post', 'everythingnow' ),
		'view_items'            => __( 'View Posts', 'everythingnow' ),
		'search_items'          => __( 'Search Posts', 'everythingnow' ),
		'not_found'             => __( 'No Posts found', 'everythingnow' ),
		'not_found_in_trash'    => __( 'No Posts found in Trash', 'everythingnow' ),
		'featured_image'        => __( 'Featured Image', 'everythingnow' ),
		'set_featured_image'    => __( 'Set featured image', 'everythingnow' ),
		'remove_featured_image' => __( 'Remove featured image', 'everythingnow' ),
		'use_featured_image'    => __( 'Use as featured image', 'everythingnow' ),
		'insert_into_item'      => __( 'Insert into post', 'everythingnow' ),
		'uploaded_to_this_item' => __( 'Uploaded to this post', 'everythingnow' ),
		'items_list'            => __( 'Posts list', 'everythingnow' ),
		'items_list_navigation' => __( 'Posts list navigation', 'everythingnow' ),
		'filter_items_list'     => __( 'Filter posts list', 'everythingnow' ),
	);
	$args = array(  
		'label'                 => __( 'Post', 'everythingnow' ),
		'description'           => __( 'Post Description', 'everythingnow' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'author', 'comments', 'revisions', 'custom-fields', 'page-attributes' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'rewrite'               => array( 'slug' => 'post' ),
		'query_var'             => true,
		'menu_icon'             => 'dashicons-admin-post',
		'show_in_rest'          => true,
	);

	register_post_type( 'post', $args );

}

add_action( 'init', 'everythingnow_register_post_type' );

?>