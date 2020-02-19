<?php

// ------------------------------------------------------
// Functions for Archives Templates
// ------------------------------------------------------

// $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];

$dsplycnt = get_post_meta($post_id, 'career_options_display', true);
if(!$dsplycnt) $dsplycnt = 1;

$career_fields = array(

	'options' => array(
		'name' => 'Open Poistion Options',
		'slug' => 'options',
		'desc' => '',
		'fields' => array(
			array('name' => 'display', 'type' => 'text', 'label'=>'# of Positions', 'size' => '10', 'value' => $dsplycnt, 'hint'=>'Save Page to Update - Sections removed from end.'),
		)
	),
);

$i = 1;
while ($i <= $dsplycnt) {
	# code...

	$career_fields['section_'.$i] = array(
		'name' => 'Open Position List '.$i,
		'slug' => 'section_'.$i,
		'desc' => '',
		'fields' => array(
			array('name' => 'title', 'type' => 'text', 'label'=>'Position Title', 'size' => '75', 'value' => ''),
			array('name' => 'text', 'type' => 'textarea', 'label'=>'Position Intro', 'rows' => '5', 'cols' => '74', 'value' => ''),
			array('name' => 'type', 'type' => 'select', 'options' => 'tax', 'tax' => 'career_types', 'label'=>'Position Type', 'size' => '75', 'value' => ''),
			array('name' => 'custom', 'type' => 'text', 'label'=>'Position Class', 'size' => '75', 'value' => ''),
		)
	);
	$i++;
}

	function career_metabox() {
		global $career_fields;
		$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
		$template = get_post_meta( $post_id, '_wp_page_template', true);
		if($template == "page-career.php"){
			//foreach item in array build section
			foreach ($career_fields as $key => $value) {
				$id = 'career_'.$value['slug'];
				$title = __( $value['name'], 'career_textdomain' );
				add_meta_box($id, $title, 'career_callback', 'page', 'advanced', 'high', $value);
			}
		}
	}
	add_action( 'add_meta_boxes', 'career_metabox' );

	function career_callback($post, $metabox ){
		$html = wp_nonce_field('career_metabox', 'career_'.$metabox['args']['slug'].'_nonce',false,false);
		if($metabox['args']['desc'])$html .= "<p class='desc'>".$metabox['args']['desc']."</p>";
		foreach ($metabox['args']['fields'] as $field => $value) {
			$html .= fieldBuilder('career_',$metabox['args']['slug'],$value);
		}

		echo $html;
	}



	/**
	 * When the post is saved, saves our custom data.
	 *
	 * @param int $post_id The ID of the post being saved.
	 */
	function career_SaveMetaData( $post_id ) {
		global $career_fields;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {return;}

		if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {return;}
		}else {
			if ( ! current_user_can( 'edit_post', $post_id ) ) {return;}
		}

		foreach ($career_fields as $key => $value) {
			$slug = $value['slug'];
			//print_r($value);

			if (isset( $_POST['career_'.$value['slug'].'_nonce'] ) ) {

				foreach($value['fields'] as $key => $value){
					$name = 'career_'.$slug.'_'.$value['name'];
					if($value['type'] == 'checkbox'){
						if(isset($_POST[$name])){
							update_post_meta($post_id, $name, 'true');
						} else {
							update_post_meta($post_id, $name, 'false');
						}
					}elseif(isset($_POST[$name])){
						$value = esc_html($_POST[$name]);
						update_post_meta($post_id, $name, $value);
					}
				}
			}
		}
	}

	add_action( 'save_post', 'career_SaveMetaData' );
