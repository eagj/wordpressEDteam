<?php
function custom_post_type() {
  $labels = array(
    'name' => _x( 'Post Types', 'Post Type General Name', 'mawt' ),
    'singular_name' => _x( 'Post Type', 'Post Type Singular Name', 'mawt' ),
    'menu_name' => __( 'Post Types', 'mawt' ),
    'name_admin_bar' => __( 'Post Type', 'mawt' ),
    'archives' => __( 'Item Archives', 'mawt' ),
    'attributes' => __( 'Item Attributes', 'mawt' ),
    'parent_item_colon' => __( 'Parent Item:', 'mawt' ),
    'all_items' => __( 'All Items', 'mawt' ),
    'add_new_item' => __( 'Add New Item', 'mawt' ),
    'add_new' => __( 'Add New', 'mawt' ),
    'new_item' => __( 'New Item', 'mawt' ),
    'edit_item' => __( 'Edit Item', 'mawt' ),
    'update_item' => __( 'Update Item', 'mawt' ),
    'view_item' => __( 'View Item', 'mawt' ),
    'view_items' => __( 'View Items', 'mawt' ),
    'search_items' => __( 'Search Item', 'mawt' ),
    'not_found' => __( 'Not found', 'mawt' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'mawt' ),
    'featured_image' => __( 'Featured Image', 'mawt' ),
    'set_featured_image' => __( 'Set featured image', 'mawt' ),
    'remove_featured_image' => __( 'Remove featured image', 'mawt' ),
    'use_featured_image' => __( 'Use as featured image', 'mawt' ),
    'insert_into_item' => __( 'Insert into item', 'mawt' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'mawt' ),
    'items_list' => __( 'Items list', 'mawt' ),
    'items_list_navigation' => __( 'Items list navigation', 'mawt' ),
    'filter_items_list' => __( 'Filter items list', 'mawt' ),
  );

  $args = array(
    'label' => __( 'Post Type', 'mawt' ),
    'description' => __( 'Post Type Description', 'mawt' ),
    'labels' => $labels,
    // las taxonomías que soportará
    'taxonomies' => array( 'category', 'post_tag' ),
    // Todo lo que soporta este post type
		'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields' ),
		//hierarchical true se comporta como página, false como entrada
		'hierarchical' => false,
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    //El icono que tendrá https://developer.wordpress.org/resource/dashicons
    'menu_icon' => 'dashicons-admin-site',
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'capability_type' => 'page',
  );

  register_post_type( 'a_post_type', $args );
}

add_action( 'init', 'custom_post_type', 0 );
?>
