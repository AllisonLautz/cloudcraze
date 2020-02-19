<?php
/*

	Solution Post Type
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

		function solution_post() {
			$labels = array(
				'name' => __( 'Solutions' ),
				'singular_name' => __( 'Solution' ),
				'add_new' => __( 'New Solution' ),
				'add_new_item' => __( 'Add New Solution' ),
				'edit_item' => __( 'Edit Solution' ),
				'new_item' => __( 'New Solution' ),
				'view_item' => __( 'View Solution' ),
				'search_items' => __( 'Search Solutions' ),
				'not_found' =>  __( 'No Solutions Found' ),
				'not_found_in_trash' => __( 'No Solutions found in Trash' ),
			);
			$args = array(
				/*
				
				'exclude_from_search'  => false,
				
			)*/

			// 'labels' => $labels,
			// 'menu_position' => 20,
			// 'has_archive' => false,
			// 'public' => true,
			// 'hierarchical' => true,
			// 'exclude_from_search'  => true,
			// 'menu_icon' => 'dashicons-lightbulb',
			// 'supports' => array('title', 'thumbnail')

			'labels' => $labels,
			'description' => 'Sortable/filterable solutions',
			'public' => false,
			'exclude_from_search' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_nav_menus' => true,
			'show_in_menu' => true,
			'show_in_admin_bar' => true,
			'menu_position' => 20,
			'menu_icon' => 'dashicons-lightbulb',
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array('title','thumbnail'),
			'register_location_meta_box_location_cb' => null,
			'taxonomies' => array(),
			'has_archive' => false,
			'rewrite' => true,
			'query_var' => true,
			'can_export' => true,
			'show_in_rest'  => true,



		);
			register_post_type( 'solution', $args );
		}
		add_action( 'init', 'solution_post' );





/************************************************************
multiple metaboxes
************************************************************/


$meta_boxes = array(
	

	// array(
	// 	$prefix = 'solution_options_',
	// 	'id' => 'main',
	// 	'title' => 'Main Content',
	// 	'pages' => array('solution',), // multiple post types
	// 	'context' => 'normal',
	// 	'priority' => 'low',
	// 	'fields' => array(
	// 		// array(
	// 		// 	'name' => 'Alternate Title',
	// 		// 	'id' => $prefix . 'title',
	// 		// 	'type' => 'text',
	// 		// 	'label'	=>	'Alternate Title (optional)',
	// 		// ),

	// 		array(
	// 			'name' => 'Blurb',
	// 			'id' => $prefix . 'blurb',
	// 			'type' => 'textarea',
	// 			'label'	=>	'Blurb',
	// 		),


	// 		array(
	// 			'name' => 'Main Content',
	// 			'id' => $prefix . 'content',
	// 			'type' => 'wysiwyg',
	// 			'settings'	=>	array(
	// 				// 'media_buttons'	=>	true,
	// 				'wpautop' =>	true,
	// 				// 'textarea_rows' => 10,
	// 				// 'paste_remove_spans'	=>	true,
	// 				// // 'paste_remove_styles'	=>	true,
	// 				// // 'remove_linebreaks'	=>	true,
	// 				// 'editor_class'	=>	$prefix.'_banner_wysiwyg'
	// 				'paste_text_use_dialog'	=>	true,
	// 			),
	// 			'label'	=>	'Main Content',
	// 		),

	
	// 		) // end fields
	// ),

);


// foreach ($meta_boxes as $meta_box) {
// 	$my_box = new custom_metabox($meta_box);
// }







/************************************************************
end multiple metaboxes
class single_solutions_metabox {

	protected $_meta_box;

    // create meta box based on given data
	function __construct($meta_box) {
		$this->_meta_box = $meta_box;
		add_action('admin_menu', array(&$this, 'add'));

		add_action('save_post', array(&$this, 'save'));
	}

    /// Add meta box for multiple post types
	function add() {
		foreach ($this->_meta_box['pages'] as $page) {
			add_meta_box($this->_meta_box['id'], $this->_meta_box['title'], array(&$this, 'show'), $page, $this->_meta_box['context'], $this->_meta_box['priority']);
			$prefix = $this->_meta_box['id'];
		}
	}
    // Callback function to show fields in meta box

	function show() {
		global $post;
		echo '<input type="hidden" name="industry_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
		echo '<div class="industry_options">';

		foreach ($this->_meta_box['fields'] as $field) {
			$meta = get_post_meta($post->ID, $field['id'], true);

			echo '<div class="row">';

			if($field['label']){echo '<div class="label"><label for="', $field['id'], '">', $field['label'], '</label></div>';}


			echo '<div class="input">';
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
										<video autoplay loop class="fullvideo">
											<source src="<?=$image;?>" type="video/mp4" />
											</video>

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
************************************************************/