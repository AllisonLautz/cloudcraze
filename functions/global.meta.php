<?php

// ------------------------------------------------------
// Functions for Page Metas
// ------------------------------------------------------

/*

	change requsts
	------------------------------------------
	- all seo should be empty unless other wise set
	- description two lines
	- move below descript (preview)
	- use perma link not cononical
	- remove robots from post & add to theme options
	- Toggle Advanced Features
	- Add adnvanced features for social - card options, mutlipule sizes
	- Global twitter profile
	- Page level script
	------------------------------------------

*/
	// $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];

	function seometaFields($a=false){
		Global $post_id;
		$perma = get_permalink($post_id);
		$pagetitle = get_the_title($post_id);
		$sitetitle = get_bloginfo('name');
		$twitter_handle = get_option('theme_settings');
		$twitter_handle = $twitter_handle['twitter_handle'];
		$desc = get_the_content_by_id($post_id);
		$desc = trimString($desc,155);

		$seometaFields = array(
			// 'banner' => array(
			// 	'name' => 'Banner Display',
			// 	'slug' => 'banner',
			// 	'priority' => 'high',
			// 	'context'=>'normal',
			// 	// 'desc' => 'Page Banner Overrides',

			// 	'fields' => array(
			// 		// array('name' => 'description', 'type' => 'textarea', 'label'=>'Description', 'cols' => '75', 'value' => '', 'rows' => '3', 'class'	=>	'desc', 'before'	=>	'<hr>'),
			// 		array('name' => 'title', 'type' => 'wysiwyg', 'label'=>'Title', 'size' => '75', 'before'	=>	'<hr>' ),
			// 		array('name' => 'description', 'type' => 'textarea', 'label'=>'Description (move over and remove)', 'cols' => '75', 'value' => '', 'rows' => '3', 'class'	=>	'desc',),
			// 		array('name' => 'smalldesc', 'type' => 'checkbox', 'label'=>'Small Description', 'value' => '', 'hint'=>'decreases size of description text'),

			// 	),
			// ),
			'metas' => array(
				'name' => 'SEO Options',
				'slug' => 'metas',
				'priority' => 'low',
				'context'=>'normal',
				'desc' => 'simple options for seo',
				'fields' => array(
					array('name' => 'preview', 'type' => 'html', 'tag'=>'h4', 'text'=>'Example of Google Search Result'),
					array('name' => 'preview', 'type' => 'html', 'tag'=>'div', 'class'=>'seopreview', 'text'=>'<div class="title"></div><div class="url"></div><div class="desc"></div>'),
					array('name' => 'preview', 'type' => 'html', 'tag'=>'div', 'text'=>'<br>'),
					array('name' => 'title', 'type' => 'text', 'label'=>'Title', 'size' => '75', 'placeholder' => strip_tags($pagetitle) ),
					array('name' => 'description', 'type' => 'textarea', 'label'=>'Description', 'cols' => '75', 'value' => '', 'rows' => '3', 'placeholder' =>strip_tags($desc), 'hint'=>'Remaining Characters: <span class="seometa_metas_char"><span>'),
					array('name' => 'keywords', 'type' => 'text', 'label'=>'Keywords', 'size' => '75', 'value' => '', 'placeholder' => strip_tags($pagetitle)),
					array('name' => 'adavnced', 'type' => 'advanced'),
					array('name' => 'canonical', 'type' => 'text', 'label'=>'Canonical URL', 'size' => '75', 'value' => '', 'placeholder' => $perma),
					array('name' => 'noindex', 'type' => 'checkbox', 'label'=>'NO INDEX', 'value' => '', 'hint'=>'requests that search engines do not index this page.'),
					array('name' => 'nofollow', 'type' => 'checkbox', 'label'=>'NO FOLLOW', 'value' => '', 'hint'=>'Requests that search engines do not follow links to this page.'),
					array('name' => 'search', 'type' => 'checkbox', 'label'=>'Disallow Search', 'value' => '', 'hint'=>'Removes page from internal site search'),
					array('name' => 'sitemap', 'type' => 'checkbox', 'label'=>'Disallow Sitemap', 'value' => '', 'hint'=>'Removes page from internal sitemap (html & xml)'),
					array('name' => 'preview', 'type' => 'seopreview'),
					array('name' => 'closeadavanced','type'=>'html','before'=>'</div>','tag'=>'span')
				),
			),
			'social' => array(
				'name' => 'Social Options',
				'slug' => 'social',
				'priority' => 'low',
				'context'=>'normal',
				'desc' => 'simple options for social',
				'fields' => array(
					array('name' => 'title', 'type' => 'text', 'label'=>'Social Title', 'size' => '75', 'value' => ''),
					array('name' => 'socialimage', 'type' => 'imageid', 'label'=>'Social Image Id', 'size' => '60', 'value' => '', 'imagesize'=>'social', 'hint'=>'image croped to 1024x512'),
					array('name' => 'description', 'type' => 'textarea', 'label'=>'Social Description', 'cols' => '75', 'value' => '', 'rows' => '3'),
					array('name' => 'tweet', 'type' => 'textarea', 'label'=>'Default Tweet', 'cols' => '75', 'value' => '', 'rows' => '3', 'max' => '140'),
					array('name' => 'adavnced', 'type' => 'advanced'),
					array('name' => 'url', 'type' => 'text', 'label'=>'Page URL', 'size' => '75', 'value' => '', 'value' => $perma),
					array('name' => 'twitter', 'type' => 'text', 'label'=>'Twitter Profile', 'size' => '75', 'value' => '', 'value' => $twitter_handle),
					array('name' => 'sitename', 'type' => 'text', 'label'=>'Website Name', 'size' => '75', 'value' => '', 'value'=>$sitetitle),
					array('name'=>'closeadavanced','type'=>'html','before'=>'</div>','tag'=>'span')

				),
			),

		);
if($a != false){
	return $seometaFields[$a];
}else{
	return $seometaFields;
}
}

function seometa_metabox() {
		//foreach item in array build section
	$screens = themeSettings('postTypes');
	$screens[] = 'post';
	$screens[] = 'page';

	foreach (seometaFields(false) as $key => $value) {

		$id = 'seometa_'.$value['slug'];
		$title = __( $value['name'], 'seometa_textdomain' );

		foreach ( $screens as $screen ) {
			if(!in_array($screen, themeSettings('noMeta'))){
					// add_meta_box($id,$title,'seometa_callback',$screen,'advanced',$value['priority'],$value);
				add_meta_box($id,$title,'seometa_callback',$screen,$value['context'],$value['priority'],$value);
			}
		}
	}
}
add_action( 'add_meta_boxes', 'seometa_metabox' );

function seometa_callback($post, $metabox ){
	$html = wp_nonce_field('seometa_metabox', 'seometa_'.$metabox['args']['slug'].'_nonce',false,false);
	if($metabox['args']['desc'])$html .= "<p class='desc'>".$metabox['args']['desc']."</p>";
	foreach ($metabox['args']['fields'] as $field => $value) {
		$html .= fieldBuilder('seometa_',$metabox['args']['slug'],$value);
	}

	echo $html;
}



	/**
	 * When the post is saved, saves our custom data.
	 *
	 * @param int $post_id The ID of the post being saved.
	 */
	function seometa_SaveMetaData( $post_id ) {

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {return;}

		if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {return;}
		}else {
			if ( ! current_user_can( 'edit_post', $post_id ) ) {return;}
		}

		// foreach (seometaFields(false) as $key => $value) {
		// 	$slug = $value['slug'];
		// 	// print_r($value);

		// 	if (isset( $_POST['seometa_'.$value['slug'].'_nonce'] ) ) {
		// 		foreach($value['fields'] as $key => $value){
		// 			$name = 'seometa_'.$slug.'_'.$value['name'];
		// 			if($value['type'] == 'checkbox'){
		// 				if(isset($_POST[$name])){
		// 					update_post_meta($post_id, $name, 'true');
		// 				} else {
		// 					update_post_meta($post_id, $name, 'false');
		// 				}
		// 			}


		// 			elseif($value['type'] == 'radio'){
		// 				if(isset($_POST[$name])){
		// 					update_post_meta($post_id, $name, 'true');
		// 				} else {
		// 					update_post_meta($post_id, $name, 'false');
		// 				}
		// 			}

		// 			elseif(isset($_POST[$name])){
		// 				$value = esc_html($_POST[$name]);
		// 				update_post_meta($post_id, $name, $value);
		// 			}
		// 		}
		// 	}

		// }


		if ( isset($_POST['seometa_metas_title']) ) {        
			update_post_meta($post_id, 'seometa_metas_title', sanitize_text_field($_POST['seometa_metas_title']));      
		}

	}

	add_action( 'save_post', 'seometa_SaveMetaData' );