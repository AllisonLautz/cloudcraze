<?php
/*

	Resources Post Type
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

		function form_post() {
			$labels = array(
				'name' => __( 'Resources' ),
				'singular_name' => __( 'Resource' ),
				'add_new' => __( 'New Resource' ),
				'add_new_item' => __( 'Add New Resource' ),
				'edit_item' => __( 'Edit Resource' ),
				'new_item' => __( 'New Resource' ),
				'view_item' => __( 'View Resource' ),
				'search_items' => __( 'Search Resources' ),
				'not_found' =>  __( 'No Resources Found' ),
				'not_found_in_trash' => __( 'No Resources found in Trash' ),
			);
			$args = array(
				'labels' => $labels,
				// 'has_archive' => true,
				'has_archive' => 'resource',
				'public' => true,
				'hierarchical' => false,
				'exclude_from_search'  => false,
				'menu_icon' => 'dashicons-analytics',
				'supports' => array(
					'title',
					'editor',
					'excerpt',
					'thumbnail',
				)
			);
			// register_post_type( 'resource', $args );
		}
		add_action( 'init', 'form_post' );


	// Meta Boxes Options
	// ----

		function form_fields(){

			$args = array(
				'posts_per_page' => -1,
				'post_type'      => 'thank-you'
			);
			$items = array('none'=>' -- Select Thank You Page -- ','disable'=>'Use Custom URL');
			$thankyou = get_postsOptions($args,$items);
			$forms = getFormList();
			return array(
				'sidebar' => array(
					'name' => 'Sidebar Options',
					'slug' => 'sidebar',
					'desc' => false,
					'fields' => array(
						array('name' => 'formheader','type' => 'html', 'before' => '<div class="form">','tag' => 'span'),
						array('name' => 'formheading', 'type' => 'text', 'label'=>'Heading', 'size' => '75'),
						array('name' => 'formblurb', 'type' => 'textarea', 'label'=>'Blurb', 'cols' => '75', 'rows' => '4', 'hint'=>'Indicate bullets by using a dash at the beging of a line (e.g. - bullet text).<br> Use asterisks to indicate bold text and underscroces for italic (e.g. *bold* _italic_).'),
						array('name' => 'download', 'type' => 'file', 'label'=>'Resource Url', 'size' => '75', 'hint' => 'Use for Downloadable assets (pdfs, ppt, doc, etc)'),
						array('name' => 'form', 'type' => 'select', 'label'=>'Form', 'options'=>$forms),
						array('name' => 'redirect', 'type' => 'select', 'label'=>'Redirect Page', 'options'=>$thankyou),
						array('name' => 'redirect_custom', 'type' => 'text', 'label'=>'Custom Redirect URL', 'size' => '75', 'value' => '', 'placeholder' => ''),
						array('name' => 'lead_source', 'type' => 'text', 'label'=>'Lead Source', 'size' => '75', 'value' => get_the_title($post_id), 'placeholder' => ''),
						array('name' => 'submit', 'type' => 'text', 'label'=>'Submit Text', 'size' => '75', 'value' => 'Submit Request', 'placeholder' => ''),
							// array('name' => 'form_custom', 'type' => 'textarea', 'label'=>'Form Script', 'cols' => '75', 'rows' => '4'),
						array('name' => 'ga_category', 'type' => 'text', 'label'=>'GA Event Category', 'size' => '75', 'value' => '', 'placeholder' => ''),
						array('name' => 'ga_action', 'type' => 'text', 'label'=>'GA Event Action', 'size' => '75', 'value' => '', 'placeholder' => ""),
						array('name' => 'ga_label', 'type' => 'text', 'label'=>'GA Event Label', 'size' => '75', 'value' => '', 'placeholder' => ''),

						array('name' => 'image', 'type' => 'image', 'label'=>'Top Image ', 'size' => '60', 'value' => '', 'hint'=>'Displays at top of sidebar.'),
						array('name' => 'image_bottom', 'type' => 'image', 'label'=>'Bottom Image ', 'size' => '60', 'value' => '', 'hint'=>'Displays at bottom of sidebar.'),
					),
				),
			);
		}

		function form_metabox() {
			//foreach item in array build section
			foreach (form_fields() as $key => $value) {
				$id = 'form_'.$value['slug'];
				$title = __( $value['name'], 'form_textdomain' );
				add_meta_box($id, $title, 'form_callback', 'page', 'normal', 'low', $value);
			}
		}
		$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
		$template = get_post_meta( $post_id, '_wp_page_template', true);
		if($template == "page-form.php"){
			add_action( 'add_meta_boxes', 'form_metabox' );
		}


	// Init & Save
	// ----

		function form_callback($post, $metabox ){
			$html = wp_nonce_field('form_metabox', 'form_'.$metabox['args']['slug'].'_nonce',false,false);
			if($metabox['args']['desc'])$html .= "<p class='desc'>".$metabox['args']['desc']."</p>";
			foreach ($metabox['args']['fields'] as $field => $value) {
				$html .= fieldBuilder('form_',$metabox['args']['slug'],$value);
			}

			echo $html;
		}

		function form_SaveMetaData( $post_id ) {
			if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){return;}

			if(!isset($_POST['post_type'])) return;
			if(($_POST['post_type'] == 'page') && (!current_user_can('edit_page', $post_id))) return;
			if (!current_user_can('edit_post', $post_id)) return;

			foreach (form_fields() as $key => $value) {
				$slug = $value['slug'];

				if(!isset($_POST['form_'.$value['slug'].'_nonce'])) continue;

				foreach($value['fields'] as $key => $value){
					$data = false;
					$name = 'form_'.$slug.'_'.$value['name'];
					$data = validateData($name,$value['type']);
					if($data !== false) update_post_meta($post_id, $name, $data);
				}
			}
		}

		add_action( 'save_post', 'form_SaveMetaData' );
