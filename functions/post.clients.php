<?php
/*

	Logos Post Type
	====

		-Get Post ID
		-Post Type Definitions
		-Meta Boxes Options
		-Init & Save

*/
	// Get Post ID
	// ----

		// // $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];

	// Post Type Definitions
	// ----

		function clients_post() {
			$labels = array(
				'name' => __( 'Logos' ),
				'singular_name' => __( 'Logo' ),
				'add_new' => __( 'New Logo' ),
				'add_new_item' => __( 'Add New Logo' ),
				'edit_item' => __( 'Edit Logo' ),
				'new_item' => __( 'New Logo' ),
				'view_item' => __( 'View Logo' ),
				'search_items' => __( 'Search Logos' ),
				'not_found' =>  __( 'No Logos Found' ),
				'not_found_in_trash' => __( 'No Logos found in Trash' ),
			);
			$args = array(
				'labels' => $labels,
				'has_archive' => false,
				'public' => true,
				'hierarchical' => true,
				'exclude_from_search'  => true,
				'menu_icon' => 'dashicons-format-gallery',
				'supports' => array(
					'title',
					'thumbnail',
				)
			);
			register_post_type( 'clients', $args );
		}
		// add_action( 'init', 'clients_post' );


	// Meta Boxes Options
	// ----

		function clients_fields(){

			$args = array(
				'posts_per_page' => -1,
				'post_type'      => 'resource'
			);

			$resource = get_postsOptions($args,array('none'=>' -- Select Resource -- '));

			return array(
				'options' => array(
					'name' => 'Logo Options',
					'slug' => 'options',
					'desc' => false,
					'fields' => array(
						array('name' => 'featured', 'type' => 'checkbox','label'=>'Featured', 'size' => '75','hint' => 'Add to Homepage Logo Grid'),
						array('name' => 'background', 'type' => 'imageid', 'label'=>'Logo Background', 'size' => '75'),
						array('name' => 'resource', 'type' => 'select', 'label'=>'Link to Resource', 'options'=>$resource, 'hint'=>'If Resource is selected it will be used instead of url'),
						array('name' => 'anchor', 'type' => 'text', 'label'=>'Link to Url', 'size' => '75',),

					),
				),
			);
		}

		function clients_metabox() {
			//foreach item in array build section
			foreach (clients_fields() as $key => $value) {
				$id = 'clients_'.$value['slug'];
				$title = __( $value['name'], 'clients_textdomain' );
				add_meta_box($id, $title, 'clients_callback', 'clients', 'normal', 'low',$value);
			}
		}
		add_action( 'add_meta_boxes', 'clients_metabox' );


	// Init & Save
	// ----

		function clients_callback($post, $metabox ){
			$html = wp_nonce_field('clients_metabox', 'clients_'.$metabox['args']['slug'].'_nonce',false,false);
			if($metabox['args']['desc'])$html .= "<p class='desc'>".$metabox['args']['desc']."</p>";
			foreach ($metabox['args']['fields'] as $field => $value) {
				$html .= fieldBuilder('clients_',$metabox['args']['slug'],$value);
			}

			echo $html;
		}

		function clients_SaveMetaData( $post_id ) {
			if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){return;}

			if(!isset($_POST['post_type'])) return;
			if(($_POST['post_type'] == 'page') && (!current_user_can('edit_page', $post_id))) return;
			if (!current_user_can('edit_post', $post_id)) return;

			foreach (clients_fields() as $key => $value) {
				$slug = $value['slug'];

				if(!isset($_POST['clients_'.$value['slug'].'_nonce'])) continue;

				foreach($value['fields'] as $key => $value){
					$data = false;
					$name = 'clients_'.$slug.'_'.$value['name'];
					$data = validateData($name,$value['type']);

					if($data !== false) update_post_meta($post_id, $name, $data);
				}
			}
		}

		add_action( 'save_post', 'clients_SaveMetaData' );
