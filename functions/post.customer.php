<?php
/*

	Customer Post Type
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

		function customer_post() {
			$labels = array(
				'name' => __( 'Customers' ),
				'singular_name' => __( 'Customer' ),
				'add_new' => __( 'New Customer' ),
				'add_new_item' => __( 'Add New Customer' ),
				'edit_item' => __( 'Edit Customer' ),
				'new_item' => __( 'New Customer' ),
				'view_item' => __( 'View Customer' ),
				'search_items' => __( 'Search Customers' ),
				'not_found' =>  __( 'No Customers Found' ),
				'not_found_in_trash' => __( 'No Customers found in Trash' ),
			);
			$args = array(
				'labels' => $labels,
				'has_archive' => true,
				'public' => true,
				'hierarchical' => true,
				'exclude_from_search'  => false,
				'menu_icon' => 'dashicons-businessman',
				'supports' => array(
					'title',
					// 'editor',
					// 'excerpt',
					'thumbnail',
					// 'author'
				)
			);
			register_post_type( 'customer', $args );
		}
		add_action( 'init', 'customer_post' );





/************************************************************
multiple metaboxes
************************************************************/



$svgOptions = array(
	'none'=>"-- Select Icon --",
	'speed' => 'speed',
	'connectivity' => 'connected',
	'scalability' => 'scalability'
);

$customer_meta_boxes = array(
	// array(
	// 	$prefix = 'customer_options_',
	// 	'id' => 'video',
	// 	'title' => 'Banner',
	// 	'pages' => array('customer',), // multiple post types
	// 	'context' => 'normal',
	// 	'priority' => 'low',
	// 	'fields' => array(
	// 		array(
	// 			'name' => 'Logo',
	// 			'id' => $prefix . 'logo',
	// 			'type' => 'logos',
	// 		),

	// 		array(
	// 			'name' => 'Banner Text',
	// 			'id' => $prefix . 'banner',
	// 			'type' => 'wysiwyg',
	// 			'label'	=>	'Banner Text',
	// 			'settings'	=>	array(
	// 				'media_buttons'	=>	false,
	// 				'wpautop' =>	false,
	// 				'textarea_rows' => 10,
	// 			),
	// 		),
	// 		array(
	// 			'name' => 'Video Link',
	// 			'id' => $prefix . 'video_link',
	// 			'type' => 'text',
	// 			'label' => 'Video Link',
	// 			'desc'	=>	'example: https://www.youtube.com/embed/5f5_GvA4deY',
	// 		),
	// 	) // end fields
	// ),
	
	// array(
	// 	$prefix = 'customer_options_',
	// 	'id' => 'disable',
	// 	'title' => 'Disable Link',
	// 	'pages' => array('customer'), // multiple post types
	// 	'context' => 'side',
	// 	'priority' => 'low',
	// 	'fields' => array(
	// 		array(
	// 			'name' => 'disable',
	// 			'id' => $prefix . 'disable',
	// 			'type' => 'checkbox',
	// 			'desc' => 'disable link on Customers page', 

	// 		),
	// 	) // end fields
	// ),

	// array(
	// 	$prefix = 'resource_options_',
	// 	'id' => 'hide',
	// 	'title' => 'Hide from Resources',
	// 	'pages' => array('resource'), // multiple post types
	// 	'context' => 'side',
	// 	'priority' => 'low',
	// 	'fields' => array(
	// 		array(
	// 			'name' => 'hide',
	// 			'id' => $prefix . 'hide',
	// 			'type' => 'checkbox',
	// 			'desc' => 'hide on Resources page', 

	// 		),
	// 	) // end fields
	// ),


	// array(
	// 	$prefix = 'customer_options_',
	// 	'id' => 'testimonial',
	// 	'title' => 'Testimonial',
	// 	'pages' => array('customer',), // multiple post types
	// 	'context' => 'normal',
	// 	'priority' => 'low',
	// 	'fields' => array(
	// 		array(
	// 			'name' => 'Testimonial',
	// 			'id' => $prefix . 'testimonial',
	// 			'type' => 'wysiwyg',
	// 			'desc' => 'main testimonial as h3, otherwise use paragraph', 
	// 			'settings'	=>	array(
	// 				'media_buttons'	=>	false,
	// 				'wpautop' =>	false,
	// 				'textarea_rows' => 10,
	// 			),
	// 		),
	// 	) // end fields
	// ),
	// array(
	// 	$prefix = 'customer_options_',
	// 	'id' => 'main',
	// 	'title' => 'Main Content',
	// 	'pages' => array('customer',), // multiple post types
	// 	'context' => 'normal',
	// 	'priority' => 'low',
	// 	'fields' => array(
	// 		array(
	// 			'name' => 'Main Content',
	// 			'id' => $prefix . 'content',
	// 			'type' => 'wysiwyg',
	// 			'std' => ''
	// 		),


	// 	) // end fields
	// ),
	
	// array(
	// 	$prefix = 'customer_options_',
	// 	'id' => 'cta',
	// 	'title' => 'CTA',
	// 	'pages' => array('customer',), // multiple post types
	// 	'context' => 'normal',
	// 	'priority' => 'low',
	// 	'fields' => array(
	// 		array(
	// 			'name' => 'CTA',
	// 			'id' => $prefix . 'cta',
	// 			'type' => 'wysiwyg',
	// 			'desc' => 'main cta as h3, otherwise use paragraph', 
	// 			'settings'	=>	array(
	// 				'media_buttons'	=>	false,
	// 				'wpautop' =>	false,
	// 				'textarea_rows' => 10,
	// 			),
	// 		),
	// 	) // end fields
	// ),
);

/*
foreach ($customer_meta_boxes as $customer_meta_box) {
	$my_customer_box = new custom_metabox($customer_meta_box);
}

class custom_metabox_customers {

	protected $_meta_box;

    // create meta box based on given data
	function __construct($meta_box) {
		$this->_meta_box = $meta_box;
		add_action('admin_menu', array(&$this, 'add'));

		add_action('save_post', array(&$this, 'save'));
	}

    /// Add meta box for multiple post types
	function add_customers() {
		
		foreach ($this->_meta_box['pages'] as $page) {
			
			add_meta_box($this->_meta_box['id'], $this->_meta_box['title'], array(&$this, 'show'), $page, $this->_meta_box['context'], $this->_meta_box['priority']);
			

			$prefix = $this->_meta_box['id'];


		}
	}

    // Callback function to show fields in meta box
	







    // Save data from meta box
	function save_customer($post_id) {
		if (!wp_verify_nonce($_POST['customer_nonce'], basename(__FILE__))) {
			return $post_id;
		}
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return $post_id;
		}

		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) {
				return $post_id;
			}
		} elseif (!current_user_can('edit_post', $post_id)) {
			return $post_id;
		}

		foreach ($this->_meta_box['fields'] as $field) {
			$old = get_post_meta($post_id, $field['id'], true);
			$new = $_POST[$field['id']];

			if ($new && $new != $old) {
				update_post_meta($post_id, $field['id'], $new);
			} elseif ('' == $new && $old) {
				delete_post_meta($post_id, $field['id'], $old);
			}
		}
	}




}



/************************************************************
end multiple metaboxes
************************************************************/