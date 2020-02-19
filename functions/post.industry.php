<?php
/*

	Industry Post Type
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

		function industry_post() {
			$labels = array(
				'name' => __( 'Industries' ),
				'singular_name' => __( 'Industry' ),
				'add_new' => __( 'New Industry' ),
				'add_new_item' => __( 'Add New Industry' ),
				'edit_item' => __( 'Edit Industry' ),
				'new_item' => __( 'New Industry' ),
				'view_item' => __( 'View Industry' ),
				'search_items' => __( 'Search Industries' ),
				'not_found' =>  __( 'No Industries Found' ),
				'not_found_in_trash' => __( 'No Industries found in Trash' ),
			);
			$args = array(
				'labels' => $labels,
				'has_archive' => false,
				'public' => true,
				'hierarchical' => false,
				'exclude_from_search'  => false,
				'menu_icon' => 'dashicons-cloud',
				'supports' => array(
					'title',
					// 'editor',
					// 'excerpt',
					'thumbnail',
					// 'author'
				)
			);
			register_post_type( 'industry', $args );
		}
		add_action( 'init', 'industry_post' );





/************************************************************
multiple metaboxes
************************************************************/




// $prefix = 'industry_';
// for($i = 0; $i < 10; $i++);
// $i = 0;







							/************************************************************
							end multiple metaboxes
							************************************************************/