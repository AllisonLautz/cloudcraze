<?php
/*

	News Post Type
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

		function news_post() {
			$labels = array(
				'name' => __( 'News Items' ),
				'singular_name' => __( 'News Item' ),
				'add_new' => __( 'New News Item' ),
				'add_new_item' => __( 'Add New News Item' ),
				'edit_item' => __( 'Edit News Item' ),
				'new_item' => __( 'New News Item' ),
				'view_item' => __( 'View News Item' ),
				'search_items' => __( 'Search News Items' ),
				'not_found' =>  __( 'No News Items Found' ),
				'not_found_in_trash' => __( 'No News Items found in Trash' ),
			);
			$args = array(
				'labels' => $labels,
				'has_archive' => false,
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
			register_post_type( 'news', $args );
		}
		add_action( 'init', 'news_post' );



	// Meta Boxes Options
	// ----

		function news_fields(){
			return array(
				'options' => array(
					'name' => 'News Options',
					'slug' => 'options',
					'desc' => false,
					'fields' => array(
						// array('name' => 'featured', 'type' => 'checkbox', 'label'=>'Featured', 'size' => '75','hint' => 'Set as a featured event',),
						array('name' => 'override', 'type' => 'imageid', 'label'=>'Alternative Image', 'size' => '75',),
						array('name' => 'title', 'type' => 'text', 'label'=>'Announcement Title', 'size' => '75',),
						array('name' => 'description', 'type' => 'textarea', 'label'=>'Announcement Description', 'cols' => '75', 'value' => '', 'rows' => '3',),
						array('name' => 'button', 'type' => 'text', 'label'=>'Announcement Button Text', 'cols' => '75', 'value' => '', 'rows' => '3',),
					),
					// 
				),


			);
		}

		function news_metabox() {
			//foreach item in array build section
			foreach (news_fields() as $key => $value) {
				$id = 'news_'.$value['slug'];
				$title = __( $value['name'], 'news_textdomain' );
				add_meta_box($id, $title, 'news_callback', 'news', 'normal', 'low',$value);
			}
		}
		add_action( 'add_meta_boxes', 'news_metabox' );


	// Init & Save
	// ----

		function news_callback($post, $metabox ){
			$html = wp_nonce_field('news_metabox', 'news_'.$metabox['args']['slug'].'_nonce',false,false);
			if($metabox['args']['desc'])$html .= "<p class='desc'>".$metabox['args']['desc']."</p>";
			foreach ($metabox['args']['fields'] as $field => $value) {
				$html .= fieldBuilder('news_',$metabox['args']['slug'],$value);
			}

			echo $html;
		}

		function news_SaveMetaData( $post_id ) {
			if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){return;}

			if(!isset($_POST['post_type'])) return;
			if(($_POST['post_type'] == 'page') && (!current_user_can('edit_page', $post_id))) return;
			if (!current_user_can('edit_post', $post_id)) return;

			foreach (news_fields() as $key => $value) {
				$slug = $value['slug'];

				if(!isset($_POST['news_'.$value['slug'].'_nonce'])) continue;

				foreach($value['fields'] as $key => $value){
					$data = false;
					$name = 'news_'.$slug.'_'.$value['name'];
					$data = validateData($name,$value['type']);
					if($data !== false) update_post_meta($post_id, $name, $data);
				}
			}
		}

		add_action( 'save_post', 'news_SaveMetaData' );



