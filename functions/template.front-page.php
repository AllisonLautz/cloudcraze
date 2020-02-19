<?php

$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];



$template = get_page_template_slug( $post_id );



$all = array($home, $page);


$home_meta_boxes = array(
	// array(
	// 	'id' => 'Title',
	// 	'title' => 'Title',
	// 	'pages' => array('page'),
	// 	'context' => 'normal',
	// 	'priority' => 'high',
	// 	'fields' => array(
	// 		// array(
	// 		// 	'id' => 'homepage_banner_image',
	// 		// 	'type' => 'image',
	// 		// 	'hint' => '', 
	// 		// ),
	// 		array(
	// 			'id' => 'section_title',
	// 			'type' => 'wysiwyg',
	// 			'desc' => 'Use Heading 1 for the heading, Heading 2 for the subheading, and paragraph for everything else.', 
	// 			'settings'	=>	array(
	// 				'media_buttons'	=>	false,
	// 				'textarea_rows'	=>	15,
	// 				'tinymce'       => array(
	// 					'block_formats'	=>	'Paragraph=p;Heading 1=h1;Heading 2=h2;',
	// 					'toolbar1'      => 'formatselect,bold, italic, underline,bullist,numlist,blockquote,alignleft, aligncenter, alignright,link, unlink,fullscreen, wp_adv,',
	// 					'toolbar2'      => 'strikethrough,pastetext,removeformat,outdent,indent,undo,redo,wp_help',
	// 				),
	// 			),
	// 		),

	// 	) // end fields
	// ),


	// array(
	// 	'id' => 'Featured_Announcement',
	// 	'title' => 'Featured Announcement',
	// 	'pages' => array('page'),
	// 	'context' => 'normal',
	// 	'priority' => 'high',
	// 	'fields' => array(
	// 		array(
	// 			'before'	=>	'<div class="section">',
	// 			'id' => 'homepage_announcement_title',
	// 			'type' => 'text',	
	// 			'desc'	=>	'Title',
	// 			'label'	=>	'Dark Blue',
	// 		),

	// 		array(
	// 			'id' => 'homepage_announcement_intro',
	// 			'type' => 'textarea',	
	// 			'desc'	=>	'Text',			
	// 		),

	// 		array(
	// 			'id' => 'homepage_announcement_button_text',
	// 			'type' => 'text',	
	// 			'desc'	=>	'Button Text',			
	// 		),

	// 		array(
	// 			'id' => 'homepage_announcement_anchor',
	// 			'type' => 'text',	
	// 			'desc'	=>	'Link To',	
	// 			'after'	=>	'</div>',		
	// 		),

	// 		array(
	// 			'before'	=>	'<div class="section">',
	// 			'id' => 'homepage_announcement_title2',
	// 			'type' => 'text',	
	// 			'desc'	=>	'Title',
	// 			'label'	=>	'Orange',
	// 		),

	// 		array(
	// 			'id' => 'homepage_announcement_intro2',
	// 			'type' => 'textarea',	
	// 			'desc'	=>	'Text',			
	// 		),

	// 		array(
	// 			'id' => 'homepage_announcement_button_text2',
	// 			'type' => 'text',	
	// 			'desc'	=>	'Button Text',			
	// 		),

	// 		array(
	// 			'id' => 'homepage_announcement_anchor2',
	// 			'type' => 'text',	
	// 			'desc'	=>	'Link To',	
	// 			'after'	=>	'</div>',				
	// 		),


	// 	) // end fields
	// ),

	// array(
	// 	'id' => 'Clients_Overview',
	// 	'title' => 'Clients Overview',
	// 	'pages' => array('page'),
	// 	'context' => 'normal',
	// 	'priority' => 'high',
	// 	'fields' => array(
	// 		array(
	// 			'id' => 'homepage_clients_title',
	// 			'type' => 'text',	
	// 			'desc'	=>	'Title',
	// 		),

	// 		array(
	// 			'id' => 'homepage_clients_intro',
	// 			'type' => 'textarea',	
	// 			'desc'	=>	'Text',			
	// 		),

	// 		array(
	// 			'id' => 'homepage_clients_button_text',
	// 			'type' => 'text',	
	// 			'desc'	=>	'Button Text',			
	// 		),

	// 		array(
	// 			'id' => 'homepage_clients_anchor',
	// 			'type' => 'text',	
	// 			'desc'	=>	'Link To',			
	// 		),

	

	// 	) // end fields
	// ),


	// array(
	// 	'id' => 'Resources_Section',
	// 	'title' => 'Resources Section',
	// 	'pages' => array('page'),
	// 	'context' => 'normal',
	// 	'priority' => 'high',
	// 	'fields' => array(
	// 		array(
	// 			'id' => 'homepage_resource_title',
	// 			'type' => 'text',	
	// 			'desc'	=>	'Title',
	// 		),

	// 		array(
	// 			'id' => 'homepage_resource_intro',
	// 			'type' => 'textarea',	
	// 			'desc'	=>	'Text',			
	// 		),
	// 	) // end fields
	// ),


	// array(
	// 	'id' => 'Video_Slidein',
	// 	'title' => 'Laptop Slide-in Section',
	// 	'pages' => array('page'),
	// 	'context' => 'normal',
	// 	'priority' => 'high',
	// 	'fields' => array(

	// 		array(
	// 			'id' => 'homepage_products_image',
	// 			'type' => 'image',	
	// 			// 'desc'	=>	'Title',
	// 		),


	// 		array(
	// 			'id' => 'homepage_products_title',
	// 			'type' => 'text',	
	// 			'desc'	=>	'Title',
	// 		),

	// 		array(
	// 			'id' => 'homepage_products_intro',
	// 			'type' => 'textarea',	
	// 			'desc'	=>	'Text',			
	// 		),

	// 		array(
	// 			'id' => 'homepage_products_button_text',
	// 			'type' => 'text',	
	// 			'desc'	=>	'Button Text',			
	// 		),

	// 		array(
	// 			'id' => 'homepage_products_anchor',
	// 			'type' => 'text',	
	// 			'desc'	=>	'Link To',			
	// 		),

	// 	) // end fields
	// ),


	// array(
	// 	'id' => 'homepage_cta',
	// 	'title' => 'Call to Action',
	// 	'pages' => array('page'),
	// 	'context' => 'normal',
	// 	'priority' => 'high',
	// 	'fields' => array(

	// 		array(
	// 			'id' => 'homepage_cta_title',
	// 			'type' => 'text',	
	// 			'desc'	=>	'Title',
	// 		),

	// 		array(
	// 			'id' => 'homepage_cta_intro',
	// 			'type' => 'textarea',	
	// 			'desc'	=>	'Text',			
	// 		),

	// 		array(
	// 			'id' => 'homepage_cta_button_text',
	// 			'type' => 'text',	
	// 			'desc'	=>	'Button Text',			
	// 		),

	// 		array(
	// 			'id' => 'homepage_cta_anchor',
	// 			'type' => 'text',	
	// 			'desc'	=>	'Link To',			
	// 		),

	// 	) // end fields
	// ),



	// array(
	// 	'id' => 'homepage_features',
	// 	'title' => 'Features',
	// 	'pages' => array('page'),
	// 	'context' => 'normal',
	// 	'priority' => 'high',
	// 	'fields' => array(

	// 		array(
	// 			'id' => 'homepage_features_title',
	// 			'type' => 'text',	
	// 			'desc'	=>	'Title',
	// 		),

	// 		array(
	// 			'id' => 'homepage_feat_intro',
	// 			'type' => 'textarea',	
	// 			'desc'	=>	'Text',			
	// 		),


	// 		array(
	// 			'id' => 'homepage_feat_icons',
	// 			'type' => 'icons',	
	// 			'desc'	=>	'Icons',			
	// 		),

	// 		array(
	// 			'id' => 'homepage_features_button_text',
	// 			'type' => 'text',	
	// 			'desc'	=>	'Button Text',			
	// 		),

	// 		array(
	// 			'id' => 'homepage_features_anchor',
	// 			'type' => 'text',	
	// 			'desc'	=>	'Link To',			
	// 		),

	// 		/* icons */

	// 	) // end fields
	// ),


	// array(
	// 	'id' => 'homepage_about',
	// 	'title' => 'About Section',
	// 	'pages' => array('page'),
	// 	'context' => 'normal',
	// 	'priority' => 'high',
	// 	'fields' => array(

	// 		array(
	// 			'id' => 'homepage_about_image',
	// 			'type' => 'media',	
	// 			// 'desc'	=>	'Title',
	// 		),

	// 		array(
	// 			'id' => 'homepage_about_title',
	// 			'type' => 'text',	
	// 			'desc'	=>	'Title',
	// 		),

	// 		array(
	// 			'id' => 'homepage_about_intro',
	// 			'type' => 'textarea',	
	// 			'desc'	=>	'Text',			
	// 		),

	// 		array(
	// 			'id' => 'homepage_about_button_text',
	// 			'type' => 'text',	
	// 			'desc'	=>	'Button Text',			
	// 		),

	// 		array(
	// 			'id' => 'homepage_about_anchor',
	// 			'type' => 'text',	
	// 			'desc'	=>	'Link To',			
	// 		),

	// 		array(
	// 			'id' => 'homepage_about_video_text',
	// 			'type' => 'text',	
	// 			'desc'	=>	'Video Button Text',			
	// 		),

	// 		array(
	// 			'id' => 'homepage_about_video_anchor',
	// 			'type' => 'text',	
	// 			'desc'	=>	'Video Button Link To',			
	// 		),

	// 	) // end fields
	// ),

	// array(
	// 	'id' => 'homepage_news_feeds',
	// 	'title' => 'News Feeds Section',
	// 	'pages' => array('page'),
	// 	'context' => 'normal',
	// 	'priority' => 'high',
	// 	'fields' => array(

	// 		array(
	// 			'id' => 'homepage_feeds_news_title',
	// 			'type' => 'text',	
	// 			'desc'	=>	'Title',
	// 		),

	// 		array(
	// 			'id' => 'homepage_feeds_news_intro',
	// 			'type' => 'textarea',	
	// 			'desc'	=>	'Text',			
	// 		),

	// 		array(
	// 			'id' => 'homepage_feeds_news_button_text',
	// 			'type' => 'text',	
	// 			'desc'	=>	'Button Text',			
	// 		),

	// 		array(
	// 			'id' => 'homepage_feeds_news_anchor',
	// 			'type' => 'text',	
	// 			'desc'	=>	'Link To',			
	// 		),

	// 	) // end fields
	// ),


	// array(
	// 	'id' => 'homepage_resource_feeds',
	// 	'title' => 'Resource Feeds Section',
	// 	'pages' => array('page'),
	// 	'context' => 'normal',
	// 	'priority' => 'high',
	// 	'fields' => array(

	// 		array(
	// 			'id' => 'homepage_feeds_resource_title',
	// 			'type' => 'text',	
	// 			'desc'	=>	'Title',
	// 		),

	// 		array(
	// 			'id' => 'homepage_feeds_resource_intro',
	// 			'type' => 'textarea',	
	// 			'desc'	=>	'Text',			
	// 		),

	// 		array(
	// 			'id' => 'homepage_feeds_resource_button_text',
	// 			'type' => 'text',	
	// 			'desc'	=>	'Button Text',			
	// 		),

	// 		array(
	// 			'id' => 'homepage_feeds_resource_anchor',
	// 			'type' => 'text',	
	// 			'desc'	=>	'Link To',			
	// 		),

	// 	) // end fields
	// ),


	// array(
	// 	'id' => 'Maincontent',
	// 	'title' => 'Main Content',
	// 	'pages' => array('page'),
	// 	'context' => 'normal',
	// 	'priority' => 'high',
	// 	'fields' => array(
	// 		array(
	// 			'id'	=>	'section_maincontent',
	// 			// 'id' => 'content',
	// 			'type' => 'wysiwyg',
	// 			'desc' => 'Use Heading 2 for the section headline and paragraph for everything else.', 
	// 			'settings'	=>	array(
	// 				'textarea_rows'	=>	25,
	// 				'tinymce'       => array(
	// 					'block_formats'	=>	'Paragraph=p;Heading 2=h2;',
	// 					'toolbar1'      => 'formatselect,bold, italic, underline,bullist,numlist,blockquote,alignleft, aligncenter, alignright,link, unlink,fullscreen, wp_adv,',
	// 					'toolbar2'      => 'strikethrough,pastetext,removeformat,outdent,indent,undo,redo,wp_help',
	// 				),
	// 			),
	// 		),
	// 	) // end fields
	// ),


	

);

// echo '<h1 style="margin-left:200px">'.$post_id.'</h1>';

/*

$template_file = get_post_meta($post_id, '_wp_page_template', true);
foreach ($home_meta_boxes as $meta_box) {

	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
	$template = get_page_template_slug($post_id);
	if($template == 'front-page.php'):
		$my_box = new custom_metabox($meta_box);
	endif;
	
}



class home_custom_metabox {

	protected $_meta_box;

	function __construct($meta_box) {
		$this->_meta_box = $meta_box;
		add_action('admin_menu', array(&$this, 'add'));
		add_action('save_post', array(&$this, 'save'));
	}

	function home_add() {
		foreach ($this->_meta_box['pages'] as $page) {
			if($this->_meta_box['hint']) : $mb_title = $this->_meta_box['title'] .' <span class="hint">'. $this->_meta_box['hint'] .'</span>'; else: $mb_title = $this->_meta_box['title']; endif;
			add_meta_box($this->_meta_box['id'], $mb_title, array(&$this, 'show'), $page, $this->_meta_box['context'], $this->_meta_box['priority']);
		}
	}

	function show() {
		global $post;
		echo '<input type="hidden" name="custom_meta_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
		echo '<div class="custom_meta_options">';

		foreach ($this->_meta_box['fields'] as $field) {
			$meta = get_post_meta($post->ID, $field['id'], true);

			if($field['before']){echo $field['before'];}
			echo '<div class="row '.$field['type'].'">';
			if($field['label']){echo '<div class="label"><label for="', $field['id'], '">', $field['label'], '</label></div>';}


			echo '<div class="input '.$field['type'].'">';
			switch ($field['type']) {
				case 'text':
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', esc_textarea($meta ? $meta : $field['std']), '" size="30" />',
				'<br /><span class="hint">', $field['hint'], '</span>';
				break;

				case 'hidden':
				echo '<input type="hidden" name="', $field['id'], '" id="', $field['id'], '" value="', esc_textarea($meta ? $meta : $field['std']), '" size="30" />',
				'<br /><span class="hint">', $field['hint'], '</span>';
				break;

				case 'textarea':
				echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:100%">', esc_textarea($meta ? $meta : $field['std']), '</textarea>',
				'<br /><span class="hint">', $field['hint'], '</span>';
				break;
				case 'select':
				echo '<select name="', $field['id'], '" id="', $field['id'], '">';
				foreach ($field['options'] as $option) {
					echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>', '<br /><span class="hint">', $field['hint'], '</span>';
				}
				echo '</select>';
				break;
				case 'radio':
				foreach ($field['options'] as $option) {
					echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
				}
				break;
				case 'checkbox':
				echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />', '<label>', $field['hint'], '</label>';
				break;
				case 'wysiwyg':
				$content = get_post_meta( $post->ID, $field['id'], true );
				wp_editor( $content, $field['id'], $field['settings']);
				echo '<span class="hint">', $field['hint'], '</span>';
				break;


				case 'media' || 'video' || 'logos' || 'icons':
				?>
				<a class="<?=$field['type'];?>-add button" id="<?=$field['type'];?>-add" data-uploader-title="Add <?=$field['type'];?>" data-uploader-button-text="Add <?=$field['type'];?>" data-id="<?=$field['id'];?>">Add <?=$field['type'];?></a>

				<ul class="<?=$field['type'];?>-metabox-list metabox-list" id="<?=$field['type'];?>-metabox-list">
					<?php 

					$ids = get_post_meta($post->ID, $field['id'], true);
					$i = -1;
					if ($ids) : foreach ($ids as $key => $value) : 

						if($field['type'] == 'video'){
							$image =  wp_get_attachment_url($value);
						}
						else{

							$image = wp_get_attachment_image_src($value, 'large');
						}


						$i++;

						?>

						<li class="index index<?=$i;?>" id="index<?=$i;?>">
							<input type="hidden" name="<?=$field['id']?>[<?php echo $i; ?>]" value="<?php echo $value; ?>">
							<?php if ($field['type'] == 'icons'):?>
								<div class="slide image-preview <?=$field['type']?>">
									<img src="<?php echo $image[0]; ?>" style="background-color:#eee;">
								<?php else:?>
									<div class="slide image-preview <?=$field['type']?>" style="background-image:url(<?php echo $image[0]; ?>);">
									<?php endif;?>

									<a class="change-image" data-id="<?=$field['id'];?>"></a>
									<a class="remove-image" data-id="<?=$field['id'];?>"></a>
									<?php if ($field['type'] == 'video'):?>
										<video autoplay loop class="fullvideo"><source src="<?=$image;?>" type="video/mp4" /></video>
										<?php endif; ?>

										<?php if ($field['type'] == 'logos'):?>
											<ul class="collapse wrapper">
												<li class="title">
													<label>Title</label>
													<input type="text" name="solutions_logo_title[<?php echo $key; ?>]" id="solutions_logo_title[<?php echo $key; ?>]" value="<?=$solutions_logo_title[$key];?>">

												</li>
												<li>
													<label>Description</label>
													<textarea name="solutions_logo_desc[<?php echo $key; ?>]" id="solutions_logo_desc[<?php echo $key; ?>]"><?=$solutions_logo_desc[$key];?></textarea>
												</li>
												<li>
													<label>Button Text</label>
													<input type="text" name="solutions_logo_btn[<?php echo $key; ?>]" id="solutions_logo_btn[<?php echo $key; ?>]" value="<?=$solutions_logo_btn[$key];?>">
												</li>
												<li>
													<label>Button URL</label>
													<input type="text" name="solutions_logo_url[<?php echo $key; ?>]" id="solutions_logo_url[<?php echo $key; ?>]" value="<?=$solutions_logo_url[$key];?>">
												</li>
											</ul>
										<?php endif;?>
									</div>
								</li>

							<?php endforeach; endif;
							echo '</ul>';

							echo '<span class="hint">', $field['desc'], '</span>';
							break;







						}
						if($field['after']){echo $field['after'];}

						echo 
						'</div>
						</div>';
					}
					echo '</div>';


				}



				function save($post_id) {
					if (!wp_verify_nonce($_POST['custom_meta_nonce'], basename(__FILE__))) {
						return $post_id;
					}

					if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
						return $post_id;
					}




					if ('page' == $_POST['post_type']) {
						if (!current_user_can('edit_page', $post_id)) {
							return $post_id;
						}
					} elseif (!current_user_can('edit_post', $post_id)) {
						return $post_id;
					}

					foreach ($this->_meta_box['fields'] as $field) {
						$old = get_post_meta($post_id, $field['id'], true);
						$new = $_POST[$field['id']];

						if ($new && $new != $old) {
							update_post_meta($post_id, $field['id'], $new);
						}

						elseif ('' == $new && $old) {
							delete_post_meta($post_id, $field['id'], $old);
						}
					}
				}


			}




*/