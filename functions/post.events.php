<?php
/*

	Events Post Type
	====

		-Get Post ID
		-Post Type Definitions
		-Meta Boxes Options
		-Init & Save

*/
	// Get Post ID
	// ----

		// $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];

	// Post Type Definitions
	// ----

		function events_post() {
			$labels = array(
				'name' => __( 'Events' ),
				'singular_name' => __( 'Event' ),
				'add_new' => __( 'New Event' ),
				'add_new_item' => __( 'Add New Event' ),
				'edit_item' => __( 'Edit Event' ),
				'new_item' => __( 'New Event' ),
				'view_item' => __( 'View Event' ),
				'search_items' => __( 'Search Events' ),
				'not_found' =>  __( 'No Events Found' ),
				'not_found_in_trash' => __( 'No Events found in Trash' ),
			);
			$args = array(
				'labels' => $labels,
				'has_archive' => false,
				'public' => true,
				'hierarchical' => false,
				'exclude_from_search'  => false,
				'menu_icon' => 'dashicons-calendar-alt',
				'supports' => array(
					'title',
					'editor',
					'excerpt',
					'thumbnail',
				)
			);
			register_post_type( 'events', $args );
		}
		add_action( 'init', 'events_post' );

