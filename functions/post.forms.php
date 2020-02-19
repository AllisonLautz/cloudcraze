<?php
/*

	Forms Post Type
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

		function forms_post() {
			$labels = array(
				'name' => __( 'Forms' ),
				'singular_name' => __( 'Form' ),
				'add_new' => __( 'New Form' ),
				'add_new_item' => __( 'Add New Form' ),
				'edit_item' => __( 'Edit Form' ),
				'new_item' => __( 'New Form' ),
				'view_item' => __( 'View Form' ),
				'search_items' => __( 'Search Forms' ),
				'not_found' =>  __( 'No Forms Found' ),
				'not_found_in_trash' => __( 'No Forms found in Trash' ),
				);
			$args = array(
				'labels' => $labels,
				'menu_position' => 21,
				'has_archive' => false,
				'public' => true,
				'hierarchical' => true,
				'exclude_from_search'  => true,
				'menu_icon' => 'dashicons-clipboard',
				'supports' => array('title')
				);
			register_post_type( 'forms', $args );
		}
		add_action( 'init', 'forms_post' );


	// Meta Boxes Options
	// ----

		function forms_fields(){
			// $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];

			$args = array(
				'posts_per_page' => -1,
				'post_type'      => 'thank-you'
				);
			$items = array('none'=>' -- Select Thank You Page -- ','disable'=>'Use Custom URL');
			$thankyou = get_postsOptions($args,$items);
			// var_dump($post_id);
			return array(
				'options' => array(
					'name' => 'Form Options',
					'slug' => 'options',
					'desc' => false,
					'fields' => array(
						array('name' => 'shortcode', 'type' => 'readonly', 'label'=>'Shortcode', 'valueExc'=>true,'value'=>'[form id=&quot;'.$post_id.'&quot; title=&quot;'.get_the_title($post_id).'&quot;]', 'size' => '75', 'hint'=>'save form to generate shortcode'),
						array('name' => 'formcode', 'type' => 'script', 'label'=>'Form Code', 'cols' => '75', 'rows' => '10'),
						array('name' => 'redirect', 'type' => 'select', 'label'=>'Redirect Page', 'options'=>$thankyou),
						array('name' => 'redirect_custom', 'type' => 'text', 'label'=>'Custom Redirect URL', 'size' => '75', 'value' => '', 'placeholder' => ''),
						array('name' => 'lead_source', 'type' => 'text', 'label'=>'Lead Source', 'size' => '75', 'value' => '', 'placeholder' => ''),
						array('name' => 'ga_category', 'type' => 'text', 'label'=>'GA Event Category', 'size' => '75', 'value' => '', 'placeholder' => ''),
						array('name' => 'ga_action', 'type' => 'text', 'label'=>'GA Event Action', 'size' => '75', 'value' => '', 'placeholder' => ""),
						array('name' => 'ga_label', 'type' => 'text', 'label'=>'GA Event Label', 'size' => '75', 'value' => '', 'placeholder' => ''),

						),
					),
				);
		}

		function forms_metabox() {
			//foreach item in array build section
			foreach (forms_fields() as $key => $value) {
				$id = 'forms_'.$value['slug'];
				$title = __( $value['name'], 'forms_textdomain' );
				add_meta_box($id, $title, 'forms_callback', 'forms', 'normal', 'low',$value);
			}
		}
		add_action( 'add_meta_boxes', 'forms_metabox' );


	// Init & Save
	// ----

		function forms_callback($post, $metabox ){
			$html = wp_nonce_field('forms_metabox', 'forms_'.$metabox['args']['slug'].'_nonce',false,false);
			if($metabox['args']['desc'])$html .= "<p class='desc'>".$metabox['args']['desc']."</p>";
			foreach ($metabox['args']['fields'] as $field => $value) {
				$html .= fieldBuilder('forms_',$metabox['args']['slug'],$value);
			}

			echo $html;
		}

		function forms_SaveMetaData( $post_id ) {
			if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){return;}

			if(!isset($_POST['post_type'])) return;
			if(($_POST['post_type'] == 'page') && (!current_user_can('edit_page', $post_id))) return;
			if (!current_user_can('edit_post', $post_id)) return;

			foreach (forms_fields() as $key => $value) {
				$slug = $value['slug'];

				if(!isset($_POST['forms_'.$value['slug'].'_nonce'])) continue;

				foreach($value['fields'] as $key => $value){
					$data = false;
					$name = 'forms_'.$slug.'_'.$value['name'];
					$data = validateData($name,$value['type']);
					if($data !== false) update_post_meta($post_id, $name, $data);
				}
			}
		}

		add_action( 'save_post', 'forms_SaveMetaData' );
