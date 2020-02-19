<?php
/*

	Locations Post Type
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

		function locations_post() {
			$labels = array(
				'name' => __( 'Locations' ),
				'singular_name' => __( 'Location' ),
				'add_new' => __( 'New Location' ),
				'add_new_item' => __( 'Add New Location' ),
				'edit_item' => __( 'Edit Location' ),
				'new_item' => __( 'New Location' ),
				'view_item' => __( 'View Location' ),
				'search_items' => __( 'Search Locations' ),
				'not_found' =>  __( 'No Locations Found' ),
				'not_found_in_trash' => __( 'No Locations found in Trash' ),
				);
			$args = array(
				'labels' => $labels,
				'has_archive' => 'Locations',
				'public' => true,
				'hierarchical' => false,
				'exclude_from_search'  => false,
				'menu_icon' => 'dashicons-location',
				'supports' => array(
					'title',
					'editor',
					'excerpt',
					'thumbnail',
					)
				);
			register_post_type( 'locations', $args );
		}
		add_action( 'init', 'locations_post' );


	// Meta Boxes Options
	// ----

		function locations_fields(){
			return array(
				'options' => array(
					'name' => 'Location Options',
					'slug' => 'options',
					'desc' => false,
					'fields' => array(
						array('name' => 'coordinates', 'type' => 'text', 'label'=>'Coordinates', 'size' => '75', 'placeholder' => '41.880395, -87.629810'),
						array('name' => 'street', 'type' => 'text', 'label'=>'Street', 'size' => '75', 'placeholder' => '111 Street Dr'),
						array('name' => 'number', 'type' => 'text', 'label'=>'Suite #', 'size' => '75', 'placeholder' => 'St. 1234'),
						array('name' => 'city', 'type' => 'text', 'label'=>'City', 'size' => '75', 'placeholder' => 'Chicago'),
						array('name' => 'state', 'type' => 'text', 'label'=>'State', 'size' => '75', 'placeholder' => 'Il'),
						array('name' => 'zip', 'type' => 'text', 'label'=>'Zip Code', 'size' => '75', 'placeholder' => '12345'),
						array('name' => 'phone', 'type' => 'text', 'label'=>'Phone #', 'size' => '75', 'placeholder' => '123-456-7890'),
						array('name' => 'fax', 'type' => 'text', 'label'=>'Fax', 'size' => '75', 'placeholder' => '123-456-7890'),
						array('name' => 'email', 'type' => 'text', 'label'=>'Email Address', 'size' => '75', 'placeholder' => 'email.address@yourdomain.com'),
						),
					),
				);
		}

		function locations_metabox() {
			//foreach item in array build section
			foreach (locations_fields() as $key => $value) {
				$id = 'locations_'.$value['slug'];
				$title = __( $value['name'], 'locations_textdomain' );
				add_meta_box($id, $title, 'locations_callback', 'Locations', 'normal', 'low',$value);
			}
		}
		add_action( 'add_meta_boxes', 'locations_metabox' );


	// Init & Save
	// ----

		function locations_callback($post, $metabox ){
			$html = wp_nonce_field('locations_metabox', 'locations_'.$metabox['args']['slug'].'_nonce',false,false);
			if($metabox['args']['desc'])$html .= "<p class='desc'>".$metabox['args']['desc']."</p>";
			foreach ($metabox['args']['fields'] as $field => $value) {
				$html .= fieldBuilder('locations_',$metabox['args']['slug'],$value);
			}

			echo $html;
		}

		function locations_SaveMetaData( $post_id ) {
			if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){return;}

			if(!isset($_POST['post_type'])) return;
			if(($_POST['post_type'] == 'page') && (!current_user_can('edit_page', $post_id))) return;
			if (!current_user_can('edit_post', $post_id)) return;

			foreach (locations_fields() as $key => $value) {
				$slug = $value['slug'];

				if(!isset($_POST['locations_'.$value['slug'].'_nonce'])) continue;

				foreach($value['fields'] as $key => $value){
					$data = false;
					$name = 'locations_'.$slug.'_'.$value['name'];
					$data = validateData($name,$value['type']);
					if($data !== false) update_post_meta($post_id, $name, $data);
				}
			}
		}

		add_action( 'save_post', 'locations_SaveMetaData' );
