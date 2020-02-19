<?php

	// Get Post ID
	// ----

// $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];


/*

if(get_page_template_slug( $post_id ) == null){
	// echo '<h2>i am null. i am null. i am null. i am null. i am null. i am null. i am null. i am null. </h2>';
	// $template = 'page-null.php';
}
else{
	$template = get_post_meta($post_id, '_wp_page_template', true);
}

// echo '<h1>TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST template: '.$template.'</h1>';

switch ($template) {
	case 'page-solutions.php':
	$prefix = 'solutions_';
	break;
	case 'page-test.php':
	$prefix = 'page_test_';
	break;
	case 'page.php':
	$prefix = 'page_';
}

$meta_boxes = array(
	array(
		'id' => 'banner',
		'title' => 'Banner',
		'pages' => array('page',), // multiple post types
		'context' => 'normal',
		'priority' => 'low',
		'template'	=>	array(
			'page-solutions.php', 
			'page-test.php',
			'page-null.php',
		),
		'fields' => array(
			array(
				'name' => 'Banner Text',
				'id' => $prefix . 'banner',
				'type' => 'wysiwyg',
				'settings'	=>	array(
					'media_buttons'	=>	false,
					'wpautop' =>	true,
					'editor_class'	=>	$prefix.'_banner_wysiwyg',
				),
				'label'	=>	'headline as h1, subline as h2', 
			),
		) // end fields
	),

	array(
		'id' => 'main',
		'title' => 'Main Content',
		'pages' => array('page',), // multiple post types
		'context' => 'normal',
		'priority' => 'low',
		'template'	=>	array(
			'page-solutions.php', 
			'page-test.php',
		),
		'fields' => array(
			array(
				'name' => 'Main Content',
				'id' => $prefix . 'content',
				'type' => 'wysiwyg',
				'settings'	=>	array(
					'media_buttons'	=>	true,
					'wpautop' =>	false,
					'editor_class'	=>	$prefix.'_banner_wysiwyg'
				),
			),
		)
	),

	array(
		'id' => 'Icons',
		'title' => 'Icons Section',
		'pages' => array('page',), // multiple post types
		'context' => 'normal',
		'priority' => 'low',
		'template'	=>	array(
			'page-solutions.php', 
		),
		'fields' => array(
			array(
				'name' => 'icons',
				'id' => $prefix . 'icons',
				'type' => 'wysiwyg',
				'settings'	=>	array(
					'media_buttons'	=>	true,
				),
			),

			) // end fields
	),

	
	array(
		'id' => 'content_1',
		'title' => 'Content (next to svg)',
		'pages' => array('page',), // multiple post types
		'context' => 'normal',
		'priority' => 'low',
		'template'	=>	array(
			'page-solutions.php', 
			// 'page-test.php',
		),
		'fields' => array(
			array(
				'name' => 'Content',
				'id' => $prefix . 'content_1',
				'type' => 'wysiwyg',
				'std' => '',
				// 'label'	=>	'Content',
			),

			) // end fields
	),


	
	

	array(
		'id' => 'content_2',
		'title' => 'Content',
		'pages' => array('page',), // multiple post types
		'context' => 'normal',
		'priority' => 'low',
		'template'	=>	array(
			'page-solutions.php', 
			// 'page-test.php',
		),
		'fields' => array(
			array(
				'name' => 'Content',
				'id' => $prefix . 'content_2',
				'type' => 'wysiwyg',
				'std' => '',
				// 'label'	=>	'Content',
			),
			array(
				'name' => 'Alt Style',
				'id' => 'altstyle',
				'type' => 'checkbox',
				'label' => 'Alt style?',
				// 'label'	=>	'Content',
			),


			// array(
			// 	'name' => 'Logos',
			// 	'id' => $prefix . 'logos_2',
			// 	'type' => 'logos',
			// 	'settings'	=>	array(
			// 		'media_buttons'	=>	false,
			// 		'wpautop' =>	true,

			// 	),
			// 	'label'	=>	'Logos',
			// ),
			) // end fields
	),

	array(
		'id' => 'cta',
		'title' => 'CTA',
		'pages' => array('page',), // multiple post types
		'context' => 'normal',
		'priority' => 'low',
		'template'	=>	array(
			'page-solutions.php', 
			// 'page-test.php',
		),
		'fields' => array(
			array(
				'name' => 'CTA',
				'id' => $prefix . 'cta',
				'type' => 'wysiwyg',
				'desc' => 'main cta as h2, otherwise use paragraph', 
				'settings'	=>	array(
					'media_buttons'	=>	false,
					'wpautop' =>	false,
				),
			),
		) // end fields
	),


	array(
		'id' => 'customers',
		'title' => 'Our Customers',
		'pages' => array('page',), // multiple post types
		'context' => 'normal',
		'priority' => 'low',
		'template'	=>	array(
			'page-solutions.php', 
			// 'page-test.php',
		),
		'fields' => array(
			array(
				'name' => 'intro',
				'id' => $prefix . 'customers_intro',
				'type' => 'wysiwyg',
				'settings'	=>	array(
					'media_buttons'	=>	false,
				),
				'label'	=>	'Title/Intro',
			),

			array(
				'name' => 'button',
				'id' => $prefix . 'customers_button',
				'type' => 'wysiwyg',
				'settings'	=>	array(
					'media_buttons'	=>	false,
					'textarea_rows' => 5,
					'wpautop'	=>	false,
				),
				'label'	=>	'Button',
			),



			) // end fields
	),


	array(
		'id' => 'sidebar_html',
		'title' => 'Sidebar HTML',
		'pages' => array('page',), // multiple post types
		'context' => 'normal',
		'priority' => 'low',
		'template'	=>	array(
			'page.php', 
			'page-solutions.php', 
			'default',
		),
		'fields' => array(
			array(
				'name' => 'sidebar',
				'id' => 'sidebar_html',
				'type' => 'textarea',
				'settings'	=>	array(
					'media_buttons'	=>	false,
				),
			),



			) // end fields
	),



	// array(
	// 	$prefix = 'resources',
	// 	'id' => 'resources',
	// 	'title' => 'Related Resources',
	// 	'pages' => array('page',), // multiple post types
	// 	'context' => 'normal',
	// 	'priority' => 'low',
	// 	'template'	=>	array(
	// 		'page-solutions.php', 
	// 	),
	// 	'fields' => array(
	// 		array(
	// 			'label' => 'Title',
	// 			'id' => $prefix . 'title',
	// 			'type' => 'text',
	// 		),
	// 		array(
	// 			'label' => 'Intro Text (optional)',
	// 			'id' => $prefix . 'intro',
	// 			'type' => 'textarea',
	// 		),
	// 		array(
	// 			'label' => 'Button Text (optional)',
	// 			'id' => $prefix . 'button',
	// 			'type' => 'text',
	// 		),
	// 		array(
	// 			'label' => 'Button URL',
	// 			'id' => $prefix . 'url',
	// 			'type' => 'text',
	// 		),


	// 		) // end fields
	// ),
	
);





$template_file = get_post_meta($post_id, '_wp_page_template', true);
foreach ($meta_boxes as $meta_box) {
	if(in_array($template_file, $meta_box['template'])){
		$my_box = new custom_metabox($meta_box);
	}
}


class solutions_metabox {

	protected $_meta_box;

	function __construct($meta_box) {
		$this->_meta_box = $meta_box;
		add_action('admin_menu', array(&$this, 'add'));
		add_action('save_post', array(&$this, 'save'));
	}

	function add() {
		foreach ($this->_meta_box['pages'] as $page) {
			add_meta_box($this->_meta_box['id'], $this->_meta_box['title'], array(&$this, 'show'), $page, $this->_meta_box['context'], $this->_meta_box['priority']);
			$prefix = $this->_meta_box['id'];
		}
	}

	function show() {
		global $post;
		echo '<input type="hidden" name="industry_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
		echo '<div class="industry_options">';

		foreach ($this->_meta_box['fields'] as $field) {
			$meta = get_post_meta($post->ID, $field['id'], true);

			echo '<div class="row">';

			if($field['label']){echo '<div class="label"><label for="', $field['id'], '">', $field['label'], '</label></div>';}


			echo '<div class="input '.$field['type'].'">';
			switch ($field['type']) {
				case 'text':
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%; margin:0 0 5px;" />',
				'<br /><span class="hint">', $field['desc'], '</span>';
				break;
				case 'textarea':
				echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:100%">', $meta ? $meta : $field['std'], '</textarea>',
				'<br /><span class="hint">', $field['desc'], '</span>';
				break;
				case 'select':
				echo '<select name="', $field['id'], '" id="', $field['id'], '">';
				foreach ($field['options'] as $option) {
					echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>', '<br /><span class="hint">', $field['desc'], '</span>';
				}
				echo '</select>';
				break;
				case 'radio':
				foreach ($field['options'] as $option) {
					echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
				}
				break;
				case 'checkbox':
				echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />', '<span class="hint inline">', $field['desc'], '</span>';
				break;
				case 'wysiwyg':
				$content = get_post_meta( $post->ID, $field['id'], true );
				wp_editor( $content, $field['id'], $field['settings']);


				

				echo '<span class="hint">', $field['desc'], '</span>';
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
									<img src="<?php echo $image[0]; ?>">
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
						echo 
						'</div>',
						'</div>';
					}

					echo '</div>';
				}




				function save($post_id) {
					if (!wp_verify_nonce($_POST['industry_nonce'], basename(__FILE__))) {
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
						} elseif ('' == $new && $old) {
							delete_post_meta($post_id, $field['id'], $old);
						}
					}
				}





			}