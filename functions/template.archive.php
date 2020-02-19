<?php

// ------------------------------------------------------
// Functions for Archives Templates
// ------------------------------------------------------

$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];

$width_options = array(
	'full' => '1',
	'halves' => '2',
	'thirds' => '3',
	'quarters' => '4',
	'fifths' => '5'
);
$type_options = array(
	'card' => 'Grid Style',
	'post' => 'List Style',
);

$post_types = array(
	'null' => 'Select Post Type',
	'resource' => 'Resources',
	'events' => 'Events',
	'news' => 'News Items',
	'testimonials' => 'Testimonials',
	'team' => 'Team',
	'clients' => 'Clients',
	// 'careers' => 'Careers',
	// 'candidate' => 'Candidate Placements',
);

$dsplycnt = get_post_meta($post_id, 'archive_options_display', true);
if(!$dsplycnt) $dsplycnt = 1;


$archive_fields = array(

	'options' => array(
		'name' => 'Resource Archive Options',
		'slug' => 'options',
		'desc' => '',
		'fields' => array(
			//array('name' => 'display', 'type' => 'checkbox', 'label'=>'Hide Section', 'value' => 'hide'),
			array('name' => 'type', 'type' => 'select', 'options' => $post_types, 'label'=>'Archive Type', 'value' => ''),
			// array('name' => 'tax_type', 'type' => 'text', 'label'=>'Taxonomy Type', 'size' => '75', 'value' => '', 'hint' => 'Specify Custom Taxonomy Type (e.g. resource-types)' ),
			array('name' => 'tax_term', 'type' => 'text', 'label'=>'Taxonomy Term', 'size' => '75', 'value' => '', 'hint' => 'Specify Custom Taxonomy Term (e.g. case-studies). Leave empty to display all items' ),
			// array('name' => 'list', 'type' => 'select', 'options' => $type_options, 'label'=>'Archive Type', 'value' => ''),
			// array('name' => 'images', 'type' => 'checkbox', 'label'=>'Hide Images', 'value' => 'false', 'hint'=>'hides featured images on page'),
			// array('name' => 'class', 'type' => 'select', 'options' => $width_options, 'label'=>'Row', 'size' => '5', 'value' => 'thirds', 'hint'=>'Applies to Grid Style only.'),
			// array('name' => 'read_more', 'type' => 'text', 'label'=>'Button/Link Text', 'size' => '75', 'value' => ''),
			array('name' => 'custom', 'type' => 'text', 'label'=>'Archive Class', 'size' => '75', 'value' => ''),
		)
	),
);





function archive_metabox() {
	global $archive_fields;
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
	$template = get_post_meta( $post_id, '_wp_page_template', true);
	if($template == "page-archive.php"){
			//foreach item in array build section
		foreach ($archive_fields as $key => $value) {
			$id = 'archive_'.$value['slug'];
			$title = __( $value['name'], 'archive_textdomain' );
			add_meta_box($id, $title, 'archive_callback', 'page', 'advanced', 'high', $value);
		}
	}
}
add_action( 'add_meta_boxes', 'archive_metabox' );

function archive_callback($post, $metabox ){
	$html = wp_nonce_field('archive_metabox', 'archive_'.$metabox['args']['slug'].'_nonce',false,false);
	if($metabox['args']['desc'])$html .= "<p class='desc'>".$metabox['args']['desc']."</p>";
	foreach ($metabox['args']['fields'] as $field => $value) {
		$html .= fieldBuilder('archive_',$metabox['args']['slug'],$value);
	}

	echo $html;
}



	/**
	 * When the post is saved, saves our custom data.
	 *
	 * @param int $post_id The ID of the post being saved.
	 */
	function archive_SaveMetaData( $post_id ) {
		global $archive_fields;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {return;}

		if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {return;}
		}else {
			if ( ! current_user_can( 'edit_post', $post_id ) ) {return;}
		}

		foreach ($archive_fields as $key => $value) {
			$slug = $value['slug'];
			//print_r($value);

			if (isset( $_POST['archive_'.$value['slug'].'_nonce'] ) ) {

				foreach($value['fields'] as $key => $value){
					$name = 'archive_'.$slug.'_'.$value['name'];
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

	add_action( 'save_post', 'archive_SaveMetaData' );
