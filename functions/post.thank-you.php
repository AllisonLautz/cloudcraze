<?php
/*

	Landing Pages Post Type
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

		function thank_post() {
			$labels = array(
				'name' => __( 'Thank You Pages' ),
				'singular_name' => __( 'Thank You Page' ),
				'add_new' => __( 'New Thank You Page' ),
				'add_new_item' => __( 'Add New Thank You Page' ),
				'edit_item' => __( 'Edit Thank You Page' ),
				'new_item' => __( 'New Thank You Page' ),
				'view_item' => __( 'View Thank You Page' ),
				'search_items' => __( 'Search Thank You Pages' ),
				'not_found' =>  __( 'No Thank You Pages Found' ),
				'not_found_in_trash' => __( 'No Thank You Pages found in Trash' ),
			);
			$args = array(
				'labels' => $labels,
				// 'has_archive' => true,
				'has_archive' => true,
				'public' => true,
				'hierarchical' => false,
				'exclude_from_search'  => true,
		        'menu_icon' => 'dashicons-thumbs-up',
				'supports' => array(
					'title',
					'editor',
					'thumbnail',
				)
			);
			register_post_type( 'thank-you', $args );
		}
		add_action( 'init', 'thank_post' );


	// Meta Boxes Options
	// ----

		function thank_fields(){

			 return array(
				'options' => array(
					'name' => 'Page Options',
					'slug' => 'options',
					'desc' => false,
					'fields' => array(
						array('name' => 'ga_category', 'type' => 'text', 'label'=>'GA Event Category', 'size' => '75', 'value' => '', 'placeholder' => ''),
						array('name' => 'ga_action', 'type' => 'text', 'label'=>'GA Event Action', 'size' => '75', 'value' => '', 'placeholder' => ""),
						array('name' => 'ga_label', 'type' => 'text', 'label'=>'GA Event Label', 'size' => '75', 'value' => '', 'placeholder' => ''),
					),
				),
			);
		}

		function thank_metabox() {
			//foreach item in array build section
			foreach (thank_fields() as $key => $value) {
				$id = 'thank_'.$value['slug'];
				$title = __( $value['name'], 'thank_textdomain' );
				add_meta_box($id, $title, 'thank_callback', 'thank-you', 'normal', 'low',$value);
			}
		}
		add_action( 'add_meta_boxes', 'thank_metabox' );


	// Init & Save
	// ----

		function thank_callback($post, $metabox ){
			$html = wp_nonce_field('thank_metabox', 'thank_'.$metabox['args']['slug'].'_nonce',false,false);
			if($metabox['args']['desc'])$html .= "<p class='desc'>".$metabox['args']['desc']."</p>";
			foreach ($metabox['args']['fields'] as $field => $value) {
				$html .= fieldBuilder('thank_',$metabox['args']['slug'],$value);
			}

			echo $html;
		}

		function thank_SaveMetaData( $post_id ) {
			if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){return;}

			if(!isset($_POST['post_type'])) return;
			if(($_POST['post_type'] == 'page') && (!current_user_can('edit_page', $post_id))) return;
			if (!current_user_can('edit_post', $post_id)) return;

			foreach (thank_fields() as $key => $value) {
				$slug = $value['slug'];

				if(!isset($_POST['thank_'.$value['slug'].'_nonce'])) continue;

				foreach($value['fields'] as $key => $value){
					$data = false;
					$name = 'thank_'.$slug.'_'.$value['name'];
					$data = validateData($name,$value['type']);
					if($data !== false) update_post_meta($post_id, $name, $data);
				}
			}
		}

		add_action( 'save_post', 'thank_SaveMetaData' );
