<?php
/*

	Testimonials Post Type
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

		function testimonials_post() {
			$labels = array(
				'name' => __( 'Testimonials' ),
				'singular_name' => __( 'Testimonial' ),
				'add_new' => __( 'New Testimonial' ),
				'add_new_item' => __( 'Add New Testimonial' ),
				'edit_item' => __( 'Edit Testimonial' ),
				'new_item' => __( 'New Testimonial' ),
				'view_item' => __( 'View Testimonial' ),
				'search_items' => __( 'Search Testimonials' ),
				'not_found' =>  __( 'No Testimonials Found' ),
				'not_found_in_trash' => __( 'No Testimonials found in Trash' ),
				);
			$args = array(
				'labels' => $labels,
				'has_archive' => 'Testimonials',
				'public' => true,
				'hierarchical' => false,
				'exclude_from_search'  => false,
				'menu_icon' => 'dashicons-format-chat',
				'supports' => array(
					'title',
					// 'editor',
					// 'excerpt',
					'thumbnail',
					)
				);
			register_post_type( 'testimonials', $args );
		}
		add_action( 'init', 'testimonials_post' );


	// Meta Boxes Options
	// ----

		function testimonials_fields(){
			return array(
				'options' => array(
					'name' => 'Testimonial Options',
					'slug' => 'options',
					'desc' => false,
					'fields' => array(
						array('name' => 'featured', 'type' => 'checkbox', 'label'=>'Featured', 'size' => '75','hint' => 'Set as a featured testimonial.',),
						array('name' => 'name', 'type' => 'text', 'label'=>'Name', 'size' => '75', ),
						array('name' => 'position', 'type' => 'text', 'label'=>'Position', 'size' => '75', ),
						array('name' => 'company', 'type' => 'text', 'label'=>'Company', 'size' => '75', ),
						array('name' => 'anchor', 'type' => 'text', 'label'=>'Link To', 'size' => '75', ),
						array('name' => 'quote', 'type' => 'textarea', 'label'=>'Quote', 'cols' => '75', 'rows' => '4' ),
						)
					)
				);
		}

		function testimonials_metabox() {
			//foreach item in array build section
			foreach (testimonials_fields() as $key => $value) {
				$id = 'testimonials_'.$value['slug'];
				$title = __( $value['name'], 'testimonials_textdomain' );
				add_meta_box($id, $title, 'testimonials_callback', 'Testimonials', 'normal', 'low',$value);
			}
		}
		add_action( 'add_meta_boxes', 'testimonials_metabox' );


	// Init & Save
	// ----

		function testimonials_callback($post, $metabox ){
			$html = wp_nonce_field('testimonials_metabox', 'testimonials_'.$metabox['args']['slug'].'_nonce',false,false);
			if($metabox['args']['desc'])$html .= "<p class='desc'>".$metabox['args']['desc']."</p>";
			foreach ($metabox['args']['fields'] as $field => $value) {
				$html .= fieldBuilder('testimonials_',$metabox['args']['slug'],$value);
			}

			echo $html;
		}

		function testimonials_SaveMetaData( $post_id ) {
			if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){return;}

			if(!isset($_POST['post_type'])) return;
			if(($_POST['post_type'] == 'page') && (!current_user_can('edit_page', $post_id))) return;
			if (!current_user_can('edit_post', $post_id)) return;

			foreach (testimonials_fields() as $key => $value) {
				$slug = $value['slug'];

				if(!isset($_POST['testimonials_'.$value['slug'].'_nonce'])) continue;

				foreach($value['fields'] as $key => $value){
					$data = false;
					$name = 'testimonials_'.$slug.'_'.$value['name'];
					$data = validateData($name,$value['type']);
					if($data !== false) update_post_meta($post_id, $name, $data);
				}
			}
		}

		add_action( 'save_post', 'testimonials_SaveMetaData' );
