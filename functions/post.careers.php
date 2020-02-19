<?php
/*

	Careers Post Type
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

		function careers_post() {
			$labels = array(
				'name' => __( 'Careers' ),
				'singular_name' => __( 'Career' ),
				'add_new' => __( 'New Career' ),
				'add_new_item' => __( 'Add New Career' ),
				'edit_item' => __( 'Edit Career' ),
				'new_item' => __( 'New Career' ),
				'view_item' => __( 'View Career' ),
				'search_items' => __( 'Search Careers' ),
				'not_found' =>  __( 'No Careers Found' ),
				'not_found_in_trash' => __( 'No Careers found in Trash' ),
			);
			$args = array(
				'labels' => $labels,
				'has_archive' => 'Careers',
				'public' => true,
				'hierarchical' => false,
				'exclude_from_search'  => false,
				'menu_icon' => 'dashicons-clipboard',
				'supports' => array(
					'title',
					'editor',
					'excerpt',
					'thumbnail',
				)
			);
			register_post_type( 'careers', $args );
		}
		add_action( 'init', 'careers_post' );


	// Meta Boxes Options
	// ----

		function careers_fields(){

			return array(
				'options' => array(
					'name' => 'Career Options',
					'slug' => 'options',
					'desc' => false,
					'fields' => array(
						array('name' => 'status', 'type' => 'select', 'label'=>'Status', 'options'=>array("Now Hiring"=>"Now Hiring","Accepting Resumes"=>"Accepting Resumes","Filled"=>"Filled")),
						array('name' => 'title', 'type' => 'text', 'label'=>'Title', 'size' => '75'),
						array('name' => 'location', 'type' => 'text', 'label'=>'Location', 'size' => '75'),
					),
				),
			);
		}

		function careers_metabox() {
			//foreach item in array build section
			foreach (careers_fields() as $key => $value) {
				$id = 'careers_'.$value['slug'];
				$title = __( $value['name'], 'careers_textdomain' );
				add_meta_box($id, $title, 'careers_callback', 'Careers', 'normal', 'low',$value);
			}
		}
		add_action( 'add_meta_boxes', 'careers_metabox' );


	// Init & Save
	// ----

		function careers_callback($post, $metabox ){
			$html = wp_nonce_field('careers_metabox', 'careers_'.$metabox['args']['slug'].'_nonce',false,false);
			if($metabox['args']['desc'])$html .= "<p class='desc'>".$metabox['args']['desc']."</p>";
			foreach ($metabox['args']['fields'] as $field => $value) {
				$html .= fieldBuilder('careers_',$metabox['args']['slug'],$value);
			}

			echo $html;
		}

		function careers_SaveMetaData( $post_id ) {
			if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){return;}

			if(!isset($_POST['post_type'])) return;
			if(($_POST['post_type'] == 'page') && (!current_user_can('edit_page', $post_id))) return;
			if (!current_user_can('edit_post', $post_id)) return;

			foreach (careers_fields() as $key => $value) {
				$slug = $value['slug'];

				if(!isset($_POST['careers_'.$value['slug'].'_nonce'])) continue;

				foreach($value['fields'] as $key => $value){
					$data = false;
					$name = 'careers_'.$slug.'_'.$value['name'];
					$data = validateData($name,$value['type']);
					if($data !== false) update_post_meta($post_id, $name, $data);
				}
			}
		}

		add_action( 'save_post', 'careers_SaveMetaData' );
