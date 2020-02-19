<?php
/*

	Teams Post Type
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

		function team_post() {
			$labels = array(
				'name' => __( 'Team Members' ),
				'singular_name' => __( 'Team Member' ),
				'add_new' => __( 'New Team Member' ),
				'add_new_item' => __( 'Add New Team Member' ),
				'edit_item' => __( 'Edit Team Member' ),
				'new_item' => __( 'New Team Member' ),
				'view_item' => __( 'View Team Member' ),
				'search_items' => __( 'Search Team Members' ),
				'not_found' =>  __( 'No Team Members Found' ),
				'not_found_in_trash' => __( 'No Team Members found in Trash' ),
			);
			$args = array(
				'labels' => $labels,
				'has_archive' => false,
				'public' => true,
				'hierarchical' => true,
				'exclude_from_search'  => true,
				'menu_icon' => 'dashicons-groups',
				'supports' => array(
					'title',
					'editor',
					'thumbnail',
				)
			);
			register_post_type( 'team', $args );
		}
		add_action( 'init', 'team_post' );


	// Meta Boxes Options
	// ----

		function team_fields(){
			return array(
				'options' => array(
					'name' => 'Team Options',
					'slug' => 'options',
					'desc' => false,
					'fields' => array(
						// array('name' => 'profile', 'type' => 'imageid', 'label'=>'Profile Picture', 'size' => '75'),
						// ('name' => 'name', 'type' => 'text', 'label'=>'Name', 'size' => '75'),
						array('name' => 'position', 'type' => 'text', 'label'=>'position', 'size' => '75'),
						array('name' => 'email', 'type' => 'text', 'label'=>'Email', 'size' => '75'),
						array('name' => 'phone', 'type' => 'text', 'label'=>'Phone #', 'size' => '75'),
						array('name' => 'linkedin', 'type' => 'text', 'label'=>'LinkedIn', 'size' => '75'),
						array('name' => 'twitter', 'type' => 'text', 'label'=>'Twitter', 'size' => '75'),
						array('name' => 'facebook', 'type' => 'text', 'label'=>'Facebook', 'size' => '75'),
					),
				),
			);
		}

		function team_metabox() {
			//foreach item in array build section
			foreach (team_fields() as $key => $value) {
				$id = 'team_'.$value['slug'];
				$title = __( $value['name'], 'team_textdomain' );
				add_meta_box($id, $title, 'team_callback', 'team', 'normal', 'low',$value);
			}
		}
		add_action( 'add_meta_boxes', 'team_metabox' );


	// Init & Save
	// ----

		function team_callback($post, $metabox ){
			$html = wp_nonce_field('team_metabox', 'team_'.$metabox['args']['slug'].'_nonce',false,false);
			if($metabox['args']['desc'])$html .= "<p class='desc'>".$metabox['args']['desc']."</p>";
			foreach ($metabox['args']['fields'] as $field => $value) {
				$html .= fieldBuilder('team_',$metabox['args']['slug'],$value);
			}

			echo $html;
		}

		function team_SaveMetaData( $post_id ) {
			if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){return;}

			if(!isset($_POST['post_type'])) return;
			if(($_POST['post_type'] == 'page') && (!current_user_can('edit_page', $post_id))) return;
			if (!current_user_can('edit_post', $post_id)) return;

			foreach (team_fields() as $key => $value) {
				$slug = $value['slug'];

				if(!isset($_POST['team_'.$value['slug'].'_nonce'])) continue;

				foreach($value['fields'] as $key => $value){
					$data = false;
					$name = 'team_'.$slug.'_'.$value['name'];
					$data = validateData($name,$value['type']);
					if($data !== false) update_post_meta($post_id, $name, $data);
				}
			}
		}

		add_action( 'save_post', 'team_SaveMetaData' );
