<?php

// ------------------------------------------------------
// Functions for Custom Page
// ------------------------------------------------------
$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;

	function tmp_custom_Fields(){
		$custom = array('false'=>' -- Select Page -- ');
		$tem = get_template_directory().'/templates/';
		if(is_dir($tem)){
			$files = scandir($tem);
			foreach ($files as $key => $value) {
				$t = explode('.', $value);
				if(end($t) != 'php') continue;
				if($t[0] == 'sample') continue;

				$custom[$value] = $t[0];
			}
		}

		return array(
			'options' => array(
				'name' => 'Page Options',
				'slug' => 'options',
				'desc' => false,
				'fields' => array(
					array('name' => 'type', 'type' => 'select', 'options' => $custom, 'label'=>'Select Custom Page', 'value' => ''),
					array('name' => 'class', 'type' => 'text', 'label'=>'Custom classes', 'size' => '75', 'value' => ''),
					array('name' => 'html', 'type' => 'script', 'label'=>'HTML', 'cols' => '75', 'rows' => '4',),
					)
				),
			);
		}


	function tmp_custom_metabox() {
		$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
		$template = get_post_meta( $post_id, '_wp_page_template', true);
		if($template == "page-custom.php"){
			//foreach item in array build section
			foreach (tmp_custom_Fields() as $key => $value) {
				$id = 'tmp_custom_'.$value['slug'];
				$title = __( $value['name'], 'tmp_custom_textdomain' );
				add_meta_box($id, $title, 'tmp_custom_callback', 'page', 'normal', 'high',$value);
			}
		}
	}
	add_action( 'add_meta_boxes', 'tmp_custom_metabox' );

	function tmp_custom_callback($post, $metabox ){
		$html = wp_nonce_field('tmp_custom_metabox', 'tmp_custom_'.$metabox['args']['slug'].'_nonce',false,false);
		if($metabox['args']['desc'])$html .= "<p class='desc'>".$metabox['args']['desc']."</p>";
		foreach ($metabox['args']['fields'] as $field => $value) {
			$html .= fieldBuilder('tmp_custom_',$metabox['args']['slug'],$value);
		}

		echo $html;
	}



	/**
	 * When the post is saved, saves our custom data.
	 *
	 * @param int $post_id The ID of the post being saved.
	 */
	function tmp_custom_SaveMetaData( $post_id ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {return;}

		if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {return;}
		}else {
			if ( ! current_user_can( 'edit_post', $post_id ) ) {return;}
		}

		foreach (tmp_custom_Fields() as $key => $value) {
			$slug = $value['slug'];
			//print_r($value);

			if (isset( $_POST['tmp_custom_'.$value['slug'].'_nonce'] ) ) {

				foreach($value['fields'] as $key => $value){
					$name = 'tmp_custom_'.$slug.'_'.$value['name'];
					if(isset($_POST[$name])){
						$value = esc_html($_POST[$name]);
						update_post_meta($post_id, $name, $value);
					}
				}
			}
		}
	}

	add_action( 'save_post', 'tmp_custom_SaveMetaData' );

