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

		function resource_post() {
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
				'hierarchical' => true,
				'exclude_from_search'  => false,
				'menu_icon' => 'dashicons-analytics',
				'supports' => array(
					'title',
					// 'editor',
					'excerpt',
					'thumbnail',
				)
			);
			register_post_type( 'resource', $args );
		}
		add_action( 'init', 'resource_post' );


	// Meta Boxes Options
	// ----

// 		function resource_fields(){

// 			$args = array(
// 				'posts_per_page' => -1,
// 				'post_type'      => 'thank-you'
// 			);
// 			$items = array('none'=>' -- Select Thank You Page -- ','disable'=>'Use Custom URL');
// 			$thankyou = get_postsOptions($args,$items);
// 			$forms = getFormList();
// 			return array(
// 				'options' => array(
// 					'name' => 'Resource Options',
// 					'slug' => 'options',
// 					'desc' => false,
// 					'fields' => array(
// 						array('name' => 'featured', 'type' => 'select', 'label'=>'Display on Homepage', 'options'=>array("none"=>"None","grid"=>"Resource Grid")),
// 						array('name' => 'override', 'type' => 'imageid', 'label'=>'Override Card Image', 'size' => '75'),
// 						// array('name' => 'disable', 'type' => 'checkbox', 'label'=>'Disable Main Visual', 'size' => '75','hint' => 'Removes main visual from page.',),
// 						// array('name' => 'header', 'type' => 'text', 'label'=>'Custom Title', 'size' => '75'),
// 						array('name' => 'text', 'type' => 'text', 'label'=>'Button Text', 'size' => '75'),
// 						array('name' => 'anchor', 'type' => 'text', 'label'=>'URL', 'size' => '75'),
// 						array('name' => 'video', 'type' => 'text', 'label'=>'Video URL', 'size' => '75'),
// 						array('name' => 'start', 'type' => 'text', 'label'=>'Start Time', 'size' => '75', 'hint'=>'Time in seconds.'),
// 						array('name' => 'target', 'type' => 'checkbox', 'label'=>'Open in _Blank', 'size' => '75','hint' => 'Open the Link in a _blank tab',),
// 						array('name' => 'disable', 'type' => 'checkbox', 'label'=>'Disable Related Resources', 'size' => '75','hint' => 'Removes resoruces slider.',),

// 					),
// 				),
// 				'sidebar' => array(
// 					'name' => 'Sidebar Options',
// 					'slug' => 'sidebar',
// 					'desc' => false,
// 					'fields' => array(
// 						array('name' => 'disable', 'type' => 'checkbox', 'label'=>'Disable Sidebar', 'size' => '75','hint' => 'Removes sidebar from page.',),
// 						array('name' => 'position', 'type' => 'select', 'label'=>'Position', 'options'=>array("right"=>"Right","left"=>"Left"),'hint'=>'Sets sidebar position (left or right)'),
// 						array('name' => 'type', 'type' => 'select', 'toggle' => true, 'label'=>'Type', 'options'=>array("none"=>" -- Select --","resources"=>"Tagged Resources","form"=>"Pardot Form",/*"form"=>"Form",*/"download"=>"Button","html"=>"Custom"), 'hint'=>'Select an option to see specific otions for sidebar.'),





// 						array('name' => 'formheader','type' => 'html', 'before' => '<div class="toggleoptions resource_sidebar_type"><div class="none active"></div>','tag' => 'span'),
// 						array('name' => 'formheader','type' => 'html', 'before' => '<div class="form">','tag' => 'span'),
// 						array('name' => 'formheading', 'type' => 'text', 'label'=>'Heading', 'size' => '75'),
// 						array('name' => 'formblurb', 'type' => 'textarea', 'label'=>'Blurb', 'cols' => '75', 'rows' => '4',),
// 						// array('name' => 'res_download', 'type' => 'file', 'label'=>'Resource Url', 'size' => '75', 'hint' => 'Use for Downloadable assets (pdfs, ppt, doc, etc)'),
// 						/* new */ array('name' => 'pardoturl', 'type' => 'text', 'label'=>'Pardot URL', 'size' => '75', 'hint'=>'should start with "https://go.pardot.com"'),
// 						array('name' => 'lead_source', 'type' => 'text', 'label'=>'Lead Source', 'size' => '75', 'value' => get_the_title($post_id), 'placeholder' => ''),
// 						array('name' => 'download_form', 'type' => 'file', 'label'=>'Resource Url', 'size' => '75', 'hint' => 'Use for Downloadable assets (pdfs, ppt, doc, etc)'),
// 						// array('name' => 'form', 'type' => 'select', 'label'=>'Form', 'options'=>$forms),
// 						array('name' => 'redirect', 'type' => 'select', 'label'=>'Redirect Page', 'options'=>$thankyou),
// 						// array('name' => 'redirect_custom', 'type' => 'text', 'label'=>'Custom Redirect URL', 'size' => '75', 'value' => '', 'placeholder' => ''),
// 						// array('name' => 'lead_source', 'type' => 'text', 'label'=>'Lead Source', 'size' => '75', 'value' => get_the_title($post_id), 'placeholder' => ''),
// 						// array('name' => 'submit', 'type' => 'text', 'label'=>'Submit Text', 'size' => '75', 'value' => 'Submit Request', 'placeholder' => ''),

// 						// array('name' => 'ga_category', 'type' => 'text', 'label'=>'GA Event Category', 'size' => '75', 'value' => '', 'placeholder' => ''),
// 						// array('name' => 'ga_action', 'type' => 'text', 'label'=>'GA Event Action', 'size' => '75', 'value' => '', 'placeholder' => ""),
// 						// array('name' => 'ga_label', 'type' => 'text', 'label'=>'GA Event Label', 'size' => '75', 'value' => '', 'placeholder' => ''),
// 						array('name' => 'htmlheader','type' => 'html', 'before' => '</div><div class="html">','tag' => 'span'),
// 						array('name' => 'html', 'type' => 'script', 'label'=>'HTML', 'cols' => '75', 'rows' => '4',),

// 						array('name' => 'htmlheader','type' => 'html', 'before' => '</div><div class="resources">','tag' => 'span'),
// 						array('name' => 'resourceheading', 'type' => 'text', 'label'=>'Resources Heading', 'size' => '75'),


// 						array('name' => 'downloadheader','type' => 'html', 'before' => '</div><div class="download">','tag' => 'span'),
// 						array('name' => 'downheading', 'type' => 'text', 'label'=>'Heading', 'size' => '75'),
// 						array('name' => 'downblurb', 'type' => 'textarea', 'label'=>'Blurb', 'cols' => '75', 'rows' => '4', 'hint'=>'Indicate bullets by using a dash at the beging of a line (e.g. - bullet text).<br> Use asterisks to indicate bold text and underscroces for italic (e.g. *bold* _italic_).'),
// 						array('name' => 'download', 'type' => 'file', 'label'=>'Resource Url', 'size' => '75', 'hint' => 'Use for Downloadable assets (pdfs, ppt, doc, etc)'),
// 						array('name' => 'button', 'type' => 'text', 'label'=>'Button Text', 'size' => '75', 'hint'=>''),
// 							// array('name' => 'ga_category', 'type' => 'text', 'label'=>'GA Event Category', 'size' => '75', 'value' => '', 'placeholder' => ''),
// 							// array('name' => 'ga_action', 'type' => 'text', 'label'=>'GA Event Action', 'size' => '75', 'value' => '', 'placeholder' => ""),
// 							// array('name' => 'ga_label', 'type' => 'text', 'label'=>'GA Event Label', 'size' => '75', 'value' => '', 'placeholder' => ''),
// 						array('name' => 'toggle','type' => 'html', 'before' => '</div></div>', 'after' => '', 'tag' => 'span'),
// 						array('name' => 'image', 'type' => 'image', 'label'=>'Top Image ', 'size' => '60', 'value' => '', 'hint'=>'Displays at top of sidebar.'),
// 						array('name' => 'image_bottom', 'type' => 'image', 'label'=>'Bottom Image ', 'size' => '60', 'value' => '', 'hint'=>'Displays at bottom of sidebar.'),
// 					),
// ),
// );
// }

// function resource_metabox() {
// 			//foreach item in array build section
// 	foreach (resource_fields() as $key => $value) {
// 		$id = 'resource_'.$value['slug'];
// 		$title = __( $value['name'], 'resource_textdomain' );
// 		add_meta_box($id, $title, 'resource_callback', 'resource', 'normal', 'low', $value);
// 	}
// }
// add_action( 'add_meta_boxes', 'resource_metabox' );


// 	// Init & Save
// 	// ----

// function resource_callback($post, $metabox ){
// 	$html = wp_nonce_field('resource_metabox', 'resource_'.$metabox['args']['slug'].'_nonce',false,false);
// 	if($metabox['args']['desc'])$html .= "<p class='desc'>".$metabox['args']['desc']."</p>";
// 	foreach ($metabox['args']['fields'] as $field => $value) {
// 		$html .= fieldBuilder('resource_',$metabox['args']['slug'],$value);
// 	}

// 	echo $html;
// }

// function resource_SaveMetaData( $post_id ) {
// 	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){return;}

// 	if(!isset($_POST['post_type'])) return;
// 	if(($_POST['post_type'] == 'page') && (!current_user_can('edit_page', $post_id))) return;
// 	if (!current_user_can('edit_post', $post_id)) return;

// 	foreach (resource_fields() as $key => $value) {
// 		$slug = $value['slug'];

// 		if(!isset($_POST['resource_'.$value['slug'].'_nonce'])) continue;

// 		foreach($value['fields'] as $key => $value){
// 			$data = false;
// 			$name = 'resource_'.$slug.'_'.$value['name'];
// 			$data = validateData($name,$value['type']);
// 			if($data !== false) update_post_meta($post_id, $name, $data);
// 		}
// 	}
// }

// add_action( 'save_post', 'resource_SaveMetaData' );
