<?php
/*

	Announcement Post Type
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

		function announcement_post() {
			$labels = array(
				'name' => __( 'Announcement Items' ),
				'singular_name' => __( 'Announcement Item' ),
				'add_new' => __( 'New Announcement Item' ),
				'add_new_item' => __( 'Add New Announcement Item' ),
				'edit_item' => __( 'Edit Announcement Item' ),
				'new_item' => __( 'New Announcement Item' ),
				'view_item' => __( 'View Announcement Item' ),
				'search_items' => __( 'Search Announcement Items' ),
				'not_found' =>  __( 'No Announcement Items Found' ),
				'not_found_in_trash' => __( 'No Announcement Items found in Trash' ),
			);
			$args = array(
				'labels' => $labels,
				'has_archive' => true,
				'public' => true,
				'hierarchical' => false,
				'exclude_from_search'  => false,
				'menu_icon' => 'dashicons-format-aside',
				'supports' => array(
					'title',
					'editor',
					'excerpt',
					'thumbnail',
					'author'
				)
			);
			register_post_type( 'announcement', $args );
		}
		add_action( 'init', 'announcement_post' );



	// Meta Boxes Options
	// ----

		function announcement_fields(){
			return array(
				'options' => array(
					'name' => 'Announcement Options',
					'slug' => 'options',
					'desc' => false,
					'fields' => array(
						// array('name' => 'featured', 'type' => 'checkbox', 'label'=>'Featured', 'size' => '75','hint' => 'Set as a featured event',),
						array('name' => 'override', 'type' => 'imageid', 'label'=>'Alternative Image', 'size' => '75',),
					),
				),
			);
		}

		function announcement_metabox() {
			//foreach item in array build section
			foreach (announcement_fields() as $key => $value) {
				$id = 'announcement_'.$value['slug'];
				$title = __( $value['name'], 'announcement_textdomain' );
				add_meta_box($id, $title, 'announcement_callback', 'announcement', 'normal', 'low',$value);
			}
		}
		add_action( 'add_meta_boxes', 'announcement_metabox' );


	// Init & Save
	// ----

		function announcement_callback($post, $metabox ){
			$html = wp_nonce_field('announcement_metabox', 'announcement_'.$metabox['args']['slug'].'_nonce',false,false);
			if($metabox['args']['desc'])$html .= "<p class='desc'>".$metabox['args']['desc']."</p>";
			foreach ($metabox['args']['fields'] as $field => $value) {
				$html .= fieldBuilder('announcement_',$metabox['args']['slug'],$value);
			}

			echo $html;
		}

		function announcement_SaveMetaData( $post_id ) {
			if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){return;}

			if(!isset($_POST['post_type'])) return;
			if(($_POST['post_type'] == 'page') && (!current_user_can('edit_page', $post_id))) return;
			if (!current_user_can('edit_post', $post_id)) return;

			foreach (announcement_fields() as $key => $value) {
				$slug = $value['slug'];

				if(!isset($_POST['announcement_'.$value['slug'].'_nonce'])) continue;

				foreach($value['fields'] as $key => $value){
					$data = false;
					$name = 'announcement_'.$slug.'_'.$value['name'];
					$data = validateData($name,$value['type']);
					if($data !== false) update_post_meta($post_id, $name, $data);
				}
			}
		}

		add_action( 'save_post', 'announcement_SaveMetaData' );
