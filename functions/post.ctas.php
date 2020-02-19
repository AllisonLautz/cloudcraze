<?php
/*

	Calls to Action Post Type
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

		function ctas_post() {
			$labels = array(
				'name' => __( 'Calls to Action' ),
				'singular_name' => __( 'Call to Action' ),
				'add_new' => __( 'New Call to Action' ),
				'add_new_item' => __( 'Add New Call to Action' ),
				'edit_item' => __( 'Edit Call to Action' ),
				'new_item' => __( 'New Call to Action' ),
				'view_item' => __( 'View Call to Action' ),
				'search_items' => __( 'Search Calls to Action' ),
				'not_found' =>  __( 'No Calls to Action Found' ),
				'not_found_in_trash' => __( 'No Calls to Action found in Trash' ),
			);
			$args = array(
				'labels' => $labels,
				'menu_position' => 20,
				'has_archive' => false,
				'public' => true,
				'hierarchical' => true,
				'exclude_from_search'  => true,
				'menu_icon' => 'dashicons-star-filled',
				'supports' => array('title')
			);
			register_post_type( 'ctas', $args );
		}
		add_action( 'init', 'ctas_post' );


	// Meta Boxes Options
	// ----

	// 	function ctas_fields(){
	// 		return array(
	// 			'options' => array(
	// 				'name' => 'Call to Action Options',
	// 				'slug' => 'options',
	// 				'desc' => false,
	// 				'fields' => array(
	// 					array('name' => 'heading', 'type' => 'text', 'label'=>'Heading', 'size' => '75'),
	// 					array('name' => 'subheading', 'type' => 'text', 'label'=>'Subheading', 'size' => '75'),
	// 					array('name' => 'content', 'type' => 'text', 'label'=>'Text', 'size' => '75'),
	// 					array('name' => 'button', 'type' => 'text', 'label'=>'Button Text', 'size' => '75'),
	// 					array('name' => 'anchor', 'type' => 'text', 'label'=>'Link To', 'size' => '75'),
	// 					array('name' => 'status', 'type' => 'select', 'label'=>'Target', 'options'=>array("default"=>"Default","_blank"=>"New Window/Tab")),
	// 					array('name' => 'class', 'type' => 'text', 'label'=>'Custom Class', 'size' => '75', 'placeholder'=>'advanced options for developers'),
	// 				),
	// 			),
	// 		);
	// 	}

	// 	function ctas_metabox() {
	// 		//foreach item in array build section
	// 		foreach (ctas_fields() as $key => $value) {
	// 			$id = 'ctas_'.$value['slug'];
	// 			$title = __( $value['name'], 'ctas_textdomain' );
	// 			add_meta_box($id, $title, 'ctas_callback', 'ctas', 'normal', 'low',$value);
	// 		}
	// 	}
	// 	add_action( 'add_meta_boxes', 'ctas_metabox' );


	// // Init & Save
	// // ----

	// 	function ctas_callback($post, $metabox ){
	// 		$html = wp_nonce_field('ctas_metabox', 'ctas_'.$metabox['args']['slug'].'_nonce',false,false);
	// 		if($metabox['args']['desc'])$html .= "<p class='desc'>".$metabox['args']['desc']."</p>";
	// 		foreach ($metabox['args']['fields'] as $field => $value) {
	// 			$html .= fieldBuilder('ctas_',$metabox['args']['slug'],$value);
	// 		}

	// 		echo $html;
	// 	}

	// 	function ctas_SaveMetaData( $post_id ) {
	// 		if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){return;}

	// 		if(!isset($_POST['post_type'])) return;
	// 		if(($_POST['post_type'] == 'page') && (!current_user_can('edit_page', $post_id))) return;
	// 		if (!current_user_can('edit_post', $post_id)) return;

	// 		foreach (ctas_fields() as $key => $value) {
	// 			$slug = $value['slug'];

	// 			if(!isset($_POST['ctas_'.$value['slug'].'_nonce'])) continue;

	// 			foreach($value['fields'] as $key => $value){
	// 				$data = false;
	// 				$name = 'ctas_'.$slug.'_'.$value['name'];
	// 				$data = validateData($name,$value['type']);
	// 				if($data !== false) update_post_meta($post_id, $name, $data);
	// 			}
	// 		}
	// 	}

	// 	add_action( 'save_post', 'ctas_SaveMetaData' );
