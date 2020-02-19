<?php
/*

	Landing Pages Post Type
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

		function landing_post() {
			$labels = array(
				'name' => __( 'Landing Pages' ),
				'singular_name' => __( 'Landing Page' ),
				'add_new' => __( 'New Landing Page' ),
				'add_new_item' => __( 'Add New Landing Page' ),
				'edit_item' => __( 'Edit Landing Page' ),
				'new_item' => __( 'New Landing Page' ),
				'view_item' => __( 'View Landing Page' ),
				'search_items' => __( 'Search Landing Pages' ),
				'not_found' =>  __( 'No Landing Pages Found' ),
				'not_found_in_trash' => __( 'No Landing Pages found in Trash' ),
				);
			$args = array(
				'labels' => $labels,
				// 'has_archive' => true,
				'has_archive' => true,
				'public' => true,
				'hierarchical' => false,
				'exclude_from_search'  => true,
				'menu_icon' => 'dashicons-welcome-add-page',
				'supports' => array(
					'title',
					'editor',
					'thumbnail',
					)
				);
			register_post_type( 'info', $args );
		}
		add_action( 'init', 'landing_post' );


	// Meta Boxes Options
	// ----

		function landing_fields(){
			$args = array(
				'posts_per_page' => -1,
				'post_type'      => 'thank-you'
				);
			$items = array('none'=>' -- Select Thank You Page -- ','disable'=>'Use Custom URL');
			$thankyou = get_postsOptions($args,$items);
			$forms = array('none'=>' -- Select Form -- ','contactus'=>'Contact Us','resource'=>"Resource");

			$forms = getFormList();

			$colors = array('none'=>' -- Select Color -- ','graylt'=>'Light Gray','white'=> 'White', 'gray'=>'Gray', 'black'=>'Black');
			$args = array(
				'posts_per_page' => -1,
				'post_type'      => 'testimonials'
				);
			$items = array('none'=>' -- Select Testimonial -- ','disable'=>'Disbale Testimonial');
			$testimonials = get_postsOptions($args,$items);

			$args = array(
				'posts_per_page' => -1,
				'post_type'      => 'resource'
				);
			$items = array('none'=>' -- Select Resource -- ','disable'=>'Disbale Resource');
			$resources = get_postsOptions($args,$items);

			return array(
				'header' => array(
					'name' => 'Header & Main Visual Options',
					'slug' => 'header',
					'desc' => false,
					'fields' => array(
						// array('name' => 'html', 'type' => 'html', 'tag'=>'p', 'text' => 'Use featured image box to select main visual image'),
						// array('name' => 'disable', 'type' => 'checkbox', 'label'=>'Disable Main Visual', 'size' => '75','hint' => 'Removes main visual from page.',),
						// array('name' => 'intro', 'type' => 'textarea', 'label'=>'Intro Text', 'cols' => '75', 'value' => '', 'rows' => '4','hint'=>'use HTML to format (e.g. <h1>, <p>)'),
						array('name' => 'menu', 'type' => 'checkbox', 'label'=>'Enable Main Menu ', 'size' => '75','hint' => 'Displays main menu',),
						array('name' => 'search', 'type' => 'checkbox', 'label'=>'Enable Search ', 'size' => '75','hint' => 'Displays search',),
						array('name' => 'demobtn', 'type' => 'checkbox', 'label'=>'Enable Request A Demo ', 'size' => '75','hint' => 'Hides "Request a Demo" button',),

						/* AML: landing_header_intro (allows for intro text under the banner on landing pages) */
						array('name' => 'intro', 'type' => 'textarea', 'label'=>'Text', 'cols' => '75', 'value' => '', 'rows' => '4'),
						
						),
					),
				'sidebar' => array(
					'name' => 'Sidebar Options',
					'slug' => 'sidebar',
					'desc' => false,
					'fields' => array(
						array('name' => 'disable', 'type' => 'checkbox', 'label'=>'Disable Sidebar', 'size' => '75','hint' => 'Removes sidebar from page.',),
						array('name' => 'position', 'type' => 'select', 'label'=>'Position', 'options'=>array("right"=>"Right","left"=>"Left"),'hint'=>'Sets sidebar position (left or right)'),
						array('name' => 'type', 'type' => 'select', 'toggle' => true, 'label'=>'Type', 'options'=>array("none"=>" -- Select --","form"=>"Form","download"=>"Button","html"=>"Custom"), 'hint'=>'Select an option to see specific options for sidebar.'),
						array('name' => 'color', 'type'=>'select', 'label'=>'Background', 'options' =>  $colors),

						array('name' => 'formheader','type' => 'html', 'before' => '<div class="toggleoptions landing_sidebar_type"><div class="none active"></div>','tag' => 'span'),
						array('name' => 'formheader','type' => 'html', 'before' => '<div class="form">','tag' => 'span'),
						array('name' => 'formheading', 'type' => 'text', 'label'=>'Heading', 'size' => '75'),
						array('name' => 'formblurb', 'type' => 'textarea', 'label'=>'Blurb', 'cols' => '75', 'rows' => '4', 'hint'=>'Indicate bullets by using a dash at the beging of a line (e.g. - bullet text).<br> Use asterisks to indicate bold text and underscroces for italic (e.g. *bold* _italic_).'),
						array('name' => 'form', 'type' => 'select', 'label'=>'Form', 'options'=>$forms),
						array('name' => 'redirect', 'type' => 'select', 'label'=>'Redirect Page', 'options'=>$thankyou),
						array('name' => 'redirect_custom', 'type' => 'text', 'label'=>'Custom Redirect URL', 'size' => '75', 'value' => '', 'placeholder' => ''),
						array('name' => 'lead_source', 'type' => 'text', 'label'=>'Lead Source', 'size' => '75', 'value' => get_the_title($post_id), 'placeholder' => ''),
						array('name' => 'submit', 'type' => 'text', 'label'=>'Submit Text', 'size' => '75', 'value' => 'Submit Request', 'placeholder' => ''),
							// array('name' => 'form_custom', 'type' => 'textarea', 'label'=>'Form Script', 'cols' => '75', 'rows' => '4'),
						array('name' => 'ga_category', 'type' => 'text', 'label'=>'GA Event Category', 'size' => '75', 'value' => '', 'placeholder' => ''),
						array('name' => 'ga_action', 'type' => 'text', 'label'=>'GA Event Action', 'size' => '75', 'value' => '', 'placeholder' => ""),
						array('name' => 'ga_label', 'type' => 'text', 'label'=>'GA Event Label', 'size' => '75', 'value' => '', 'placeholder' => ''),

						array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="html">','tag' => 'span'),
						array('name' => 'html', 'type' => 'script', 'label'=>'HTML', 'cols' => '75', 'rows' => '4',),

						array('name' => 'downloadheader','type' => 'html', 'before' => '</div><div class="download">','tag' => 'span'),
						array('name' => 'downheading', 'type' => 'text', 'label'=>'Heading', 'size' => '75'),
						array('name' => 'downblurb', 'type' => 'textarea', 'label'=>'Blurb', 'cols' => '75', 'rows' => '4', 'hint'=>'Indicate bullets by using a dash at the beging of a line (e.g. - bullet text).<br> Use asterisks to indicate bold text and underscroces for italic (e.g. *bold* _italic_).'),
						array('name' => 'download', 'type' => 'file', 'label'=>'Resource Url', 'size' => '75', 'hint' => 'Use for Downloadable assets (pdfs, ppt, doc, etc)'),
						array('name' => 'button', 'type' => 'text', 'label'=>'Button Text', 'size' => '75', 'hint'=>''),
						array('name' => 'toggle','type' => 'html', 'before' => '</div></div>', 'after' => '', 'tag' => 'span'),
						array('name' => 'image', 'type' => 'image', 'label'=>'Image ', 'size' => '60', 'value' => '', 'hint'=>'Displays at bottom of sidebar.'),
						),
					),
				'section_1' => array(
					'name' => 'Section 1',
					'slug' => 'section_1',
					'desc' => false,
					'fields' => array(
						array('name' => 'disable', 'type' => 'checkbox', 'label'=>'Disable Section', 'size' => '75','hint' => 'Hides the section from page.',),
						array('name' => 'heading', 'type' => 'text', 'label'=>'Heading', 'size' => '75'),
						array('name' => 'text', 'type' => 'text', 'label'=>'Text', 'size' => '75'),
						array('name' => 'color', 'type'=>'select', 'label'=>'Background', 'options' =>  $colors),
						array('name' => 'type', 'type' => 'select', 'toggle' => true, 'label'=>'Section Type', 'options'=>array("none"=>" -- Select --","testimonials"=>"Testimonials","resources"=>"Resources","image"=>"Image","form"=>"Form","cta"=>"Call to Action","html"=>"Custom"), 'hint'=>'Select an option to see specific otions for section 1.'),

						array('name' => 'formheader','type' => 'html', 'before' => '<div class="toggleoptions landing_section_1_type"><div class="none active"></div>','tag' => 'span'),
						array('name' => 'breaker','type' => 'html', 'before' => '<div class="testimonials">','tag' => 'span'),
						array('name' => 'testimonial_1', 'type' => 'select', 'label'=>'Testimonial 1', 'options'=>$testimonials),
						array('name' => 'testimonial_2', 'type' => 'select', 'label'=>'Testimonial 2', 'options'=>$testimonials),
						array('name' => 'testimonial_3', 'type' => 'select', 'label'=>'Testimonial 3', 'options'=>$testimonials),


						array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="resources">','tag' => 'span'),
						array('name' => 'resources_1', 'type' => 'select', 'label'=>'Resources 1', 'options'=>$resources),
						array('name' => 'resources_2', 'type' => 'select', 'label'=>'Resources 2', 'options'=>$resources),
						array('name' => 'resources_3', 'type' => 'select', 'label'=>'Resources 3', 'options'=>$resources),
						array('name' => 'resources_4', 'type' => 'select', 'label'=>'Resources 4', 'options'=>$resources),
						
						array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="cta">','tag' => 'span'),
						array('name' => 'download', 'type' => 'file', 'label'=>'Resource Url', 'size' => '75', 'hint' => 'Use for Downloadable assets (pdfs, ppt, doc, etc)'),
						array('name' => 'button', 'type' => 'text', 'label'=>'Button Text', 'size' => '75', 'hint'=>''),
						array('name' => 'ga_category', 'type' => 'text', 'label'=>'GA Event Category', 'size' => '75', 'value' => '', 'placeholder' => ''),
						array('name' => 'ga_action', 'type' => 'text', 'label'=>'GA Event Action', 'size' => '75', 'value' => '', 'placeholder' => ""),
						array('name' => 'ga_label', 'type' => 'text', 'label'=>'GA Event Label', 'size' => '75', 'value' => '', 'placeholder' => ''),
						array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="form">','tag' => 'span'),
						array('name' => 'form', 'type' => 'select', 'label'=>'Form', 'options'=>$forms),
						array('name' => 'redirect', 'type' => 'select', 'label'=>'Redirect Page', 'options'=>$thankyou),
						array('name' => 'redirect_custom', 'type' => 'text', 'label'=>'Custom Redirect URL', 'size' => '75', 'value' => '', 'placeholder' => ''),
						array('name' => 'lead_source', 'type' => 'text', 'label'=>'Lead Source', 'size' => '75', 'value' => get_the_title($post_id), 'placeholder' => ''),
						array('name' => 'submit', 'type' => 'text', 'label'=>'Submit Text', 'size' => '75', 'value' => 'Submit Request', 'placeholder' => ''),
							// array('name' => 'form_custom', 'type' => 'textarea', 'label'=>'Form Script', 'cols' => '75', 'rows' => '4'),
						array('name' => 'ga_category', 'type' => 'text', 'label'=>'GA Event Category', 'size' => '75', 'value' => '', 'placeholder' => ''),
						array('name' => 'ga_action', 'type' => 'text', 'label'=>'GA Event Action', 'size' => '75', 'value' => '', 'placeholder' => ""),
						array('name' => 'ga_label', 'type' => 'text', 'label'=>'GA Event Label', 'size' => '75', 'value' => '', 'placeholder' => ''),
						array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="html">','tag' => 'span'),
						array('name' => 'html', 'type' => 'script', 'label'=>'HTML', 'cols' => '75', 'rows' => '4',),
						array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="image">','tag' => 'span'),
						array('name' => 'image', 'type' => 'image', 'label'=>'Image ', 'size' => '60', 'value' => '', 'hint'=>''),
						array('name' => 'toggle','type' => 'html', 'before' => '</div></div>', 'after' => '', 'tag' => 'span'),

						),
),
'section_2' => array(
	'name' => 'Section 2',
	'slug' => 'section_2',
	'desc' => false,
	'fields' => array(
		array('name' => 'disable', 'type' => 'checkbox', 'label'=>'Disable Section', 'size' => '75','hint' => 'Hides the section from page.',),
		array('name' => 'heading', 'type' => 'text', 'label'=>'Heading', 'size' => '75'),
		array('name' => 'text', 'type' => 'text', 'label'=>'Text', 'size' => '75'),
		array('name' => 'color', 'type'=>'select', 'label'=>'Background', 'options' =>  $colors),
		array('name' => 'type', 'type' => 'select', 'toggle' => true, 'label'=>'Section Type', 'options'=>array("none"=>" -- Select --","testimonials"=>"Testimonials","resources"=>"Resources","image"=>"Image","form"=>"Form","cta"=>"Call to Action","html"=>"Custom"), 'hint'=>'Select an option to see specific otions for section 2.'),

		array('name' => 'formheader','type' => 'html', 'before' => '<div class="toggleoptions landing_section_2_type"><div class="none active"></div>','tag' => 'span'),
		array('name' => 'breaker','type' => 'html', 'before' => '<div class="testimonials">','tag' => 'span'),
		array('name' => 'testimonial_1', 'type' => 'select', 'label'=>'Testimonial 1', 'options'=>$testimonials),
		array('name' => 'testimonial_2', 'type' => 'select', 'label'=>'Testimonial 2', 'options'=>$testimonials),
		array('name' => 'testimonial_3', 'type' => 'select', 'label'=>'Testimonial 3', 'options'=>$testimonials),


		array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="resources">','tag' => 'span'),
		array('name' => 'resources_1', 'type' => 'select', 'label'=>'Resources 1', 'options'=>$resources),
		array('name' => 'resources_2', 'type' => 'select', 'label'=>'Resources 2', 'options'=>$resources),
		array('name' => 'resources_3', 'type' => 'select', 'label'=>'Resources 3', 'options'=>$resources),
		array('name' => 'resources_4', 'type' => 'select', 'label'=>'Resources 4', 'options'=>$resources),
		array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="cta">','tag' => 'span'),
		array('name' => 'download', 'type' => 'file', 'label'=>'Resource Url', 'size' => '75', 'hint' => 'Use for Downloadable assets (pdfs, ppt, doc, etc)'),
		array('name' => 'button', 'type' => 'text', 'label'=>'Button Text', 'size' => '75', 'hint'=>''),
		array('name' => 'ga_category', 'type' => 'text', 'label'=>'GA Event Category', 'size' => '75', 'value' => '', 'placeholder' => ''),
		array('name' => 'ga_action', 'type' => 'text', 'label'=>'GA Event Action', 'size' => '75', 'value' => '', 'placeholder' => ""),
		array('name' => 'ga_label', 'type' => 'text', 'label'=>'GA Event Label', 'size' => '75', 'value' => '', 'placeholder' => ''),
		array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="form">','tag' => 'span'),
		array('name' => 'form', 'type' => 'select', 'label'=>'Form', 'options'=>$forms),
		array('name' => 'redirect', 'type' => 'select', 'label'=>'Redirect Page', 'options'=>$thankyou),
		array('name' => 'redirect_custom', 'type' => 'text', 'label'=>'Custom Redirect URL', 'size' => '75', 'value' => '', 'placeholder' => ''),
		array('name' => 'lead_source', 'type' => 'text', 'label'=>'Lead Source', 'size' => '75', 'value' => get_the_title($post_id), 'placeholder' => ''),
		array('name' => 'submit', 'type' => 'text', 'label'=>'Submit Text', 'size' => '75', 'value' => 'Submit Request', 'placeholder' => ''),
							// array('name' => 'form_custom', 'type' => 'textarea', 'label'=>'Form Script', 'cols' => '75', 'rows' => '4'),
		array('name' => 'ga_category', 'type' => 'text', 'label'=>'GA Event Category', 'size' => '75', 'value' => '', 'placeholder' => ''),
		array('name' => 'ga_action', 'type' => 'text', 'label'=>'GA Event Action', 'size' => '75', 'value' => '', 'placeholder' => ""),
		array('name' => 'ga_label', 'type' => 'text', 'label'=>'GA Event Label', 'size' => '75', 'value' => '', 'placeholder' => ''),
		array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="html">','tag' => 'span'),
		array('name' => 'html', 'type' => 'script', 'label'=>'HTML', 'cols' => '75', 'rows' => '4',),
		array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="image">','tag' => 'span'),
		array('name' => 'image', 'type' => 'image', 'label'=>'Image ', 'size' => '60', 'value' => '', 'hint'=>''),
		array('name' => 'toggle','type' => 'html', 'before' => '</div></div>', 'after' => '', 'tag' => 'span'),

		),
),

'section_3' => array(
	'name' => 'Section 3',
	'slug' => 'section_3',
	'desc' => false,
	'fields' => array(
		array('name' => 'disable', 'type' => 'checkbox', 'label'=>'Disable Section', 'size' => '75','hint' => 'Hides the section from page.',),
		array('name' => 'heading', 'type' => 'text', 'label'=>'Heading', 'size' => '75'),
		array('name' => 'text', 'type' => 'text', 'label'=>'Text', 'size' => '75'),
		array('name' => 'color', 'type'=>'select', 'label'=>'Background', 'options' =>  $colors),
		array('name' => 'type', 'type' => 'select', 'toggle' => true, 'label'=>'Section Type', 'options'=>array("none"=>" -- Select --","testimonials"=>"Testimonials","resources"=>"Resources","image"=>"Image","form"=>"Form","cta"=>"Call to Action","html"=>"Custom"), 'hint'=>'Select an option to see specific otions for section 3.'),

		array('name' => 'formheader','type' => 'html', 'before' => '<div class="toggleoptions landing_section_3_type"><div class="none active"></div>','tag' => 'span'),
		array('name' => 'breaker','type' => 'html', 'before' => '<div class="testimonials">','tag' => 'span'),
		array('name' => 'testimonial_1', 'type' => 'select', 'label'=>'Testimonial 1', 'options'=>$testimonials),
		array('name' => 'testimonial_2', 'type' => 'select', 'label'=>'Testimonial 2', 'options'=>$testimonials),
		array('name' => 'testimonial_3', 'type' => 'select', 'label'=>'Testimonial 3', 'options'=>$testimonials),


		array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="resources">','tag' => 'span'),
		array('name' => 'resources_1', 'type' => 'select', 'label'=>'Resources 1', 'options'=>$resources),
		array('name' => 'resources_2', 'type' => 'select', 'label'=>'Resources 2', 'options'=>$resources),
		array('name' => 'resources_3', 'type' => 'select', 'label'=>'Resources 3', 'options'=>$resources),
		array('name' => 'resources_4', 'type' => 'select', 'label'=>'Resources 4', 'options'=>$resources),
		array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="cta">','tag' => 'span'),
		array('name' => 'download', 'type' => 'file', 'label'=>'Resource Url', 'size' => '75', 'hint' => 'Use for Downloadable assets (pdfs, ppt, doc, etc)'),
		array('name' => 'button', 'type' => 'text', 'label'=>'Button Text', 'size' => '75', 'hint'=>''),
		array('name' => 'ga_category', 'type' => 'text', 'label'=>'GA Event Category', 'size' => '75', 'value' => '', 'placeholder' => ''),
		array('name' => 'ga_action', 'type' => 'text', 'label'=>'GA Event Action', 'size' => '75', 'value' => '', 'placeholder' => ""),
		array('name' => 'ga_label', 'type' => 'text', 'label'=>'GA Event Label', 'size' => '75', 'value' => '', 'placeholder' => ''),
		array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="form">','tag' => 'span'),
		array('name' => 'form', 'type' => 'select', 'label'=>'Form', 'options'=>$forms),
		array('name' => 'redirect', 'type' => 'select', 'label'=>'Redirect Page', 'options'=>$thankyou),
		array('name' => 'redirect_custom', 'type' => 'text', 'label'=>'Custom Redirect URL', 'size' => '75', 'value' => '', 'placeholder' => ''),
		array('name' => 'lead_source', 'type' => 'text', 'label'=>'Lead Source', 'size' => '75', 'value' => get_the_title($post_id), 'placeholder' => ''),
		array('name' => 'submit', 'type' => 'text', 'label'=>'Submit Text', 'size' => '75', 'value' => 'Submit Request', 'placeholder' => ''),
							// array('name' => 'form_custom', 'type' => 'textarea', 'label'=>'Form Script', 'cols' => '75', 'rows' => '4'),
		array('name' => 'ga_category', 'type' => 'text', 'label'=>'GA Event Category', 'size' => '75', 'value' => '', 'placeholder' => ''),
		array('name' => 'ga_action', 'type' => 'text', 'label'=>'GA Event Action', 'size' => '75', 'value' => '', 'placeholder' => ""),
		array('name' => 'ga_label', 'type' => 'text', 'label'=>'GA Event Label', 'size' => '75', 'value' => '', 'placeholder' => ''),
		array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="html">','tag' => 'span'),
		array('name' => 'html', 'type' => 'script', 'label'=>'HTML', 'cols' => '75', 'rows' => '4',),
		array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="image">','tag' => 'span'),
		array('name' => 'image', 'type' => 'image', 'label'=>'Image ', 'size' => '60', 'value' => '', 'hint'=>''),
		array('name' => 'toggle','type' => 'html', 'before' => '</div></div>', 'after' => '', 'tag' => 'span'),

		),
),
'section_4' => array(
	'name' => 'Section 4',
	'slug' => 'section_4',
	'desc' => false,
	'fields' => array(
		array('name' => 'disable', 'type' => 'checkbox', 'label'=>'Disable Section', 'size' => '75','hint' => 'Hides the section from page.',),
		array('name' => 'heading', 'type' => 'text', 'label'=>'Heading', 'size' => '75'),
		array('name' => 'text', 'type' => 'text', 'label'=>'Text', 'size' => '75'),
		// array('name' => 'type', 'type' => 'select', 'toggle' => true, 'label'=>'Section Type', 'options'=>array("none"=>" -- Select --","resources"=>"Resources","image"=>"Image","form"=>"Form","cta"=>"Call to Action","html"=>"Custom"), 'hint'=>'Select an option to see specific options for section 4.'),
		array('name' => 'color', 'type'=>'select', 'label'=>'Background', 'options' =>  $colors),
		array('name' => 'type', 'type' => 'select', 'toggle' => true, 'label'=>'Section Type', 'options'=>array("none"=>" -- Select --","testimonials"=>"Testimonials","resources"=>"Resources","image"=>"Image","form"=>"Form","cta"=>"Call to Action","html"=>"Custom"), 'hint'=>'Select an option to see specific otions for section 4.'),

		array('name' => 'formheader','type' => 'html', 'before' => '<div class="toggleoptions landing_section_4_type"><div class="none active"></div>','tag' => 'span'),
		array('name' => 'breaker','type' => 'html', 'before' => '<div class="testimonials">','tag' => 'span'),
		array('name' => 'testimonial_1', 'type' => 'select', 'label'=>'Testimonial 1', 'options'=>$testimonials),
		array('name' => 'testimonial_2', 'type' => 'select', 'label'=>'Testimonial 2', 'options'=>$testimonials),
		array('name' => 'testimonial_3', 'type' => 'select', 'label'=>'Testimonial 3', 'options'=>$testimonials),


		array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="resources">','tag' => 'span'),
		array('name' => 'resources_1', 'type' => 'select', 'label'=>'Resources 1', 'options'=>$resources),
		array('name' => 'resources_2', 'type' => 'select', 'label'=>'Resources 2', 'options'=>$resources),
		array('name' => 'resources_3', 'type' => 'select', 'label'=>'Resources 3', 'options'=>$resources),
		array('name' => 'resources_4', 'type' => 'select', 'label'=>'Resources 4', 'options'=>$resources),


		array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="cta">','tag' => 'span'),
		array('name' => 'download', 'type' => 'file', 'label'=>'Resource Url', 'size' => '75', 'hint' => 'Use for Downloadable assets (pdfs, ppt, doc, etc)'),
		array('name' => 'button', 'type' => 'text', 'label'=>'Button Text', 'size' => '75', 'hint'=>''),
		array('name' => 'ga_category', 'type' => 'text', 'label'=>'GA Event Category', 'size' => '75', 'value' => '', 'placeholder' => ''),
		array('name' => 'ga_action', 'type' => 'text', 'label'=>'GA Event Action', 'size' => '75', 'value' => '', 'placeholder' => ""),
		array('name' => 'ga_label', 'type' => 'text', 'label'=>'GA Event Label', 'size' => '75', 'value' => '', 'placeholder' => ''),
		array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="form">','tag' => 'span'),
		array('name' => 'form', 'type' => 'select', 'label'=>'Form', 'options'=>$forms),
		array('name' => 'redirect', 'type' => 'select', 'label'=>'Redirect Page', 'options'=>$thankyou),
		array('name' => 'redirect_custom', 'type' => 'text', 'label'=>'Custom Redirect URL', 'size' => '75', 'value' => '', 'placeholder' => ''),
		array('name' => 'lead_source', 'type' => 'text', 'label'=>'Lead Source', 'size' => '75', 'value' => get_the_title($post_id), 'placeholder' => ''),
		array('name' => 'submit', 'type' => 'text', 'label'=>'Submit Text', 'size' => '75', 'value' => 'Submit Request', 'placeholder' => ''),
							// array('name' => 'form_custom', 'type' => 'textarea', 'label'=>'Form Script', 'cols' => '75', 'rows' => '4'),
		array('name' => 'ga_category', 'type' => 'text', 'label'=>'GA Event Category', 'size' => '75', 'value' => '', 'placeholder' => ''),
		array('name' => 'ga_action', 'type' => 'text', 'label'=>'GA Event Action', 'size' => '75', 'value' => '', 'placeholder' => ""),
		array('name' => 'ga_label', 'type' => 'text', 'label'=>'GA Event Label', 'size' => '75', 'value' => '', 'placeholder' => ''),
		array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="html">','tag' => 'span'),
		array('name' => 'html', 'type' => 'script', 'label'=>'HTML', 'cols' => '75', 'rows' => '4',),
		array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="image">','tag' => 'span'),
		array('name' => 'image', 'type' => 'image', 'label'=>'Image ', 'size' => '60', 'value' => '', 'hint'=>''),
		array('name' => 'toggle','type' => 'html', 'before' => '</div></div>', 'after' => '', 'tag' => 'span'),

		),
),
'section_5' => array(
	'name' => 'Section 5',
	'slug' => 'section_5',
	'desc' => false,
	'fields' => array(
		array('name' => 'disable', 'type' => 'checkbox', 'label'=>'Disable Section', 'size' => '75','hint' => 'Hides the section from page.',),
		array('name' => 'heading', 'type' => 'text', 'label'=>'Heading', 'size' => '75'),
		array('name' => 'text', 'type' => 'text', 'label'=>'Text', 'size' => '75'),
		array('name' => 'color', 'type'=>'select', 'label'=>'Background', 'options' =>  $colors),
		array('name' => 'color', 'type'=>'select', 'label'=>'Background', 'options' =>  $colors),
		array('name' => 'type', 'type' => 'select', 'toggle' => true, 'label'=>'Section Type', 'options'=>array("none"=>" -- Select --","testimonials"=>"Testimonials","resources"=>"Resources","image"=>"Image","form"=>"Form","cta"=>"Call to Action","html"=>"Custom"), 'hint'=>'Select an option to see specific otions for section 5.'),

		array('name' => 'formheader','type' => 'html', 'before' => '<div class="toggleoptions landing_section_5_type"><div class="none active"></div>','tag' => 'span'),
		array('name' => 'breaker','type' => 'html', 'before' => '<div class="testimonials">','tag' => 'span'),
		array('name' => 'testimonial_1', 'type' => 'select', 'label'=>'Testimonial 1', 'options'=>$testimonials),
		array('name' => 'testimonial_2', 'type' => 'select', 'label'=>'Testimonial 2', 'options'=>$testimonials),
		array('name' => 'testimonial_3', 'type' => 'select', 'label'=>'Testimonial 3', 'options'=>$testimonials),


		array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="resources">','tag' => 'span'),
		array('name' => 'resources_1', 'type' => 'select', 'label'=>'Resources 1', 'options'=>$resources),
		array('name' => 'resources_2', 'type' => 'select', 'label'=>'Resources 2', 'options'=>$resources),
		array('name' => 'resources_3', 'type' => 'select', 'label'=>'Resources 3', 'options'=>$resources),
		array('name' => 'resources_4', 'type' => 'select', 'label'=>'Resources 4', 'options'=>$resources),

		array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="cta">','tag' => 'span'),
		array('name' => 'download', 'type' => 'file', 'label'=>'Resource Url', 'size' => '75', 'hint' => 'Use for Downloadable assets (pdfs, ppt, doc, etc)'),
		array('name' => 'button', 'type' => 'text', 'label'=>'Button Text', 'size' => '75', 'hint'=>''),
		array('name' => 'ga_category', 'type' => 'text', 'label'=>'GA Event Category', 'size' => '75', 'value' => '', 'placeholder' => ''),
		array('name' => 'ga_action', 'type' => 'text', 'label'=>'GA Event Action', 'size' => '75', 'value' => '', 'placeholder' => ""),
		array('name' => 'ga_label', 'type' => 'text', 'label'=>'GA Event Label', 'size' => '75', 'value' => '', 'placeholder' => ''),
		array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="form">','tag' => 'span'),
		array('name' => 'form', 'type' => 'select', 'label'=>'Form', 'options'=>$forms),
		array('name' => 'redirect', 'type' => 'select', 'label'=>'Redirect Page', 'options'=>$thankyou),
		array('name' => 'redirect_custom', 'type' => 'text', 'label'=>'Custom Redirect URL', 'size' => '75', 'value' => '', 'placeholder' => ''),
		array('name' => 'lead_source', 'type' => 'text', 'label'=>'Lead Source', 'size' => '75', 'value' => get_the_title($post_id), 'placeholder' => ''),
		array('name' => 'submit', 'type' => 'text', 'label'=>'Submit Text', 'size' => '75', 'value' => 'Submit Request', 'placeholder' => ''),
							// array('name' => 'form_custom', 'type' => 'textarea', 'label'=>'Form Script', 'cols' => '75', 'rows' => '4'),
		array('name' => 'ga_category', 'type' => 'text', 'label'=>'GA Event Category', 'size' => '75', 'value' => '', 'placeholder' => ''),
		array('name' => 'ga_action', 'type' => 'text', 'label'=>'GA Event Action', 'size' => '75', 'value' => '', 'placeholder' => ""),
		array('name' => 'ga_label', 'type' => 'text', 'label'=>'GA Event Label', 'size' => '75', 'value' => '', 'placeholder' => ''),
		array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="html">','tag' => 'span'),
		array('name' => 'html', 'type' => 'script', 'label'=>'HTML', 'cols' => '75', 'rows' => '4',),
		array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="image">','tag' => 'span'),
		array('name' => 'image', 'type' => 'image', 'label'=>'Image ', 'size' => '60', 'value' => '', 'hint'=>''),
		array('name' => 'toggle','type' => 'html', 'before' => '</div></div>', 'after' => '', 'tag' => 'span'),

		),
),
'section_6' => array(
	'name' => 'Section 6',
	'slug' => 'section_6',
	'desc' => false,
	'fields' => array(
		array('name' => 'disable', 'type' => 'checkbox', 'label'=>'Disable Section', 'size' => '75','hint' => 'Hides the section from page.',),
		array('name' => 'heading', 'type' => 'text', 'label'=>'Heading', 'size' => '75'),
		array('name' => 'text', 'type' => 'text', 'label'=>'Text', 'size' => '75'),
		array('name' => 'color', 'type'=>'select', 'label'=>'Background', 'options' =>  $colors),
		array('name' => 'type', 'type' => 'select', 'toggle' => true, 'label'=>'Section Type', 'options'=>array("none"=>" -- Select --","testimonials"=>"Testimonials","resources"=>"Resources","image"=>"Image","form"=>"Form","cta"=>"Call to Action","html"=>"Custom"), 'hint'=>'Select an option to see specific otions for section 6.'),

		array('name' => 'formheader','type' => 'html', 'before' => '<div class="toggleoptions landing_section_6_type"><div class="none active"></div>','tag' => 'span'),
		array('name' => 'breaker','type' => 'html', 'before' => '<div class="testimonials">','tag' => 'span'),
		array('name' => 'testimonial_1', 'type' => 'select', 'label'=>'Testimonial 1', 'options'=>$testimonials),
		array('name' => 'testimonial_2', 'type' => 'select', 'label'=>'Testimonial 2', 'options'=>$testimonials),
		array('name' => 'testimonial_3', 'type' => 'select', 'label'=>'Testimonial 3', 'options'=>$testimonials),


		array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="resources">','tag' => 'span'),
		array('name' => 'resources_1', 'type' => 'select', 'label'=>'Resources 1', 'options'=>$resources),
		array('name' => 'resources_2', 'type' => 'select', 'label'=>'Resources 2', 'options'=>$resources),
		array('name' => 'resources_3', 'type' => 'select', 'label'=>'Resources 3', 'options'=>$resources),
		array('name' => 'resources_4', 'type' => 'select', 'label'=>'Resources 4', 'options'=>$resources),
		array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="cta">','tag' => 'span'),
		array('name' => 'download', 'type' => 'file', 'label'=>'Resource Url', 'size' => '75', 'hint' => 'Use for Downloadable assets (pdfs, ppt, doc, etc)'),
		array('name' => 'button', 'type' => 'text', 'label'=>'Button Text', 'size' => '75', 'hint'=>''),
		array('name' => 'ga_category', 'type' => 'text', 'label'=>'GA Event Category', 'size' => '75', 'value' => '', 'placeholder' => ''),
		array('name' => 'ga_action', 'type' => 'text', 'label'=>'GA Event Action', 'size' => '75', 'value' => '', 'placeholder' => ""),
		array('name' => 'ga_label', 'type' => 'text', 'label'=>'GA Event Label', 'size' => '75', 'value' => '', 'placeholder' => ''),
		array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="form">','tag' => 'span'),
		array('name' => 'form', 'type' => 'select', 'label'=>'Form', 'options'=>$forms),
		array('name' => 'redirect', 'type' => 'select', 'label'=>'Redirect Page', 'options'=>$thankyou),
		array('name' => 'redirect_custom', 'type' => 'text', 'label'=>'Custom Redirect URL', 'size' => '75', 'value' => '', 'placeholder' => ''),
		array('name' => 'lead_source', 'type' => 'text', 'label'=>'Lead Source', 'size' => '75', 'value' => get_the_title($post_id), 'placeholder' => ''),
		array('name' => 'submit', 'type' => 'text', 'label'=>'Submit Text', 'size' => '75', 'value' => 'Submit Request', 'placeholder' => ''),
							// array('name' => 'form_custom', 'type' => 'textarea', 'label'=>'Form Script', 'cols' => '75', 'rows' => '4'),
		array('name' => 'ga_category', 'type' => 'text', 'label'=>'GA Event Category', 'size' => '75', 'value' => '', 'placeholder' => ''),
		array('name' => 'ga_action', 'type' => 'text', 'label'=>'GA Event Action', 'size' => '75', 'value' => '', 'placeholder' => ""),
		array('name' => 'ga_label', 'type' => 'text', 'label'=>'GA Event Label', 'size' => '75', 'value' => '', 'placeholder' => ''),
		array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="html">','tag' => 'span'),
		array('name' => 'html', 'type' => 'script', 'label'=>'HTML', 'cols' => '75', 'rows' => '4',),
		array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="image">','tag' => 'span'),
		array('name' => 'image', 'type' => 'image', 'label'=>'Image ', 'size' => '60', 'value' => '', 'hint'=>''),
		array('name' => 'toggle','type' => 'html', 'before' => '</div></div>', 'after' => '', 'tag' => 'span'),

		),
),

'section_7' => array(
	'name' => 'Section 7',
	'slug' => 'section_7',
	'desc' => false,
	'fields' => array(
		array('name' => 'disable', 'type' => 'checkbox', 'label'=>'Disable Section', 'size' => '75','hint' => 'Hides the section from page.',),
		array('name' => 'heading', 'type' => 'text', 'label'=>'Heading', 'size' => '75'),
		array('name' => 'text', 'type' => 'text', 'label'=>'Text', 'size' => '75'),
		array('name' => 'color', 'type'=>'select', 'label'=>'Background', 'options' =>  $colors),
		array('name' => 'type', 'type' => 'select', 'toggle' => true, 'label'=>'Section Type', 'options'=>array("none"=>" -- Select --","testimonials"=>"Testimonials","resources"=>"Resources","image"=>"Image","form"=>"Form","cta"=>"Call to Action","html"=>"Custom"), 'hint'=>'Select an option to see specific otions for section 7.'),

		array('name' => 'formheader','type' => 'html', 'before' => '<div class="toggleoptions landing_section_7_type"><div class="none active"></div>','tag' => 'span'),
		array('name' => 'breaker','type' => 'html', 'before' => '<div class="testimonials">','tag' => 'span'),
		array('name' => 'testimonial_1', 'type' => 'select', 'label'=>'Testimonial 1', 'options'=>$testimonials),
		array('name' => 'testimonial_2', 'type' => 'select', 'label'=>'Testimonial 2', 'options'=>$testimonials),
		array('name' => 'testimonial_3', 'type' => 'select', 'label'=>'Testimonial 3', 'options'=>$testimonials),


		array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="resources">','tag' => 'span'),
		array('name' => 'resources_1', 'type' => 'select', 'label'=>'Resources 1', 'options'=>$resources),
		array('name' => 'resources_2', 'type' => 'select', 'label'=>'Resources 2', 'options'=>$resources),
		array('name' => 'resources_3', 'type' => 'select', 'label'=>'Resources 3', 'options'=>$resources),
		array('name' => 'resources_4', 'type' => 'select', 'label'=>'Resources 4', 'options'=>$resources),
		array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="cta">','tag' => 'span'),
		array('name' => 'download', 'type' => 'file', 'label'=>'Resource Url', 'size' => '75', 'hint' => 'Use for Downloadable assets (pdfs, ppt, doc, etc)'),
		array('name' => 'button', 'type' => 'text', 'label'=>'Button Text', 'size' => '75', 'hint'=>''),
		array('name' => 'ga_category', 'type' => 'text', 'label'=>'GA Event Category', 'size' => '75', 'value' => '', 'placeholder' => ''),
		array('name' => 'ga_action', 'type' => 'text', 'label'=>'GA Event Action', 'size' => '75', 'value' => '', 'placeholder' => ""),
		array('name' => 'ga_label', 'type' => 'text', 'label'=>'GA Event Label', 'size' => '75', 'value' => '', 'placeholder' => ''),
		array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="form">','tag' => 'span'),
		array('name' => 'form', 'type' => 'select', 'label'=>'Form', 'options'=>$forms),
		array('name' => 'redirect', 'type' => 'select', 'label'=>'Redirect Page', 'options'=>$thankyou),
		array('name' => 'redirect_custom', 'type' => 'text', 'label'=>'Custom Redirect URL', 'size' => '75', 'value' => '', 'placeholder' => ''),
		array('name' => 'lead_source', 'type' => 'text', 'label'=>'Lead Source', 'size' => '75', 'value' => get_the_title($post_id), 'placeholder' => ''),
		array('name' => 'submit', 'type' => 'text', 'label'=>'Submit Text', 'size' => '75', 'value' => 'Submit Request', 'placeholder' => ''),
							// array('name' => 'form_custom', 'type' => 'textarea', 'label'=>'Form Script', 'cols' => '75', 'rows' => '4'),
		array('name' => 'ga_category', 'type' => 'text', 'label'=>'GA Event Category', 'size' => '75', 'value' => '', 'placeholder' => ''),
		array('name' => 'ga_action', 'type' => 'text', 'label'=>'GA Event Action', 'size' => '75', 'value' => '', 'placeholder' => ""),
		array('name' => 'ga_label', 'type' => 'text', 'label'=>'GA Event Label', 'size' => '75', 'value' => '', 'placeholder' => ''),
		array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="html">','tag' => 'span'),
		array('name' => 'html', 'type' => 'script', 'label'=>'HTML', 'cols' => '75', 'rows' => '4',),
		array('name' => 'breaker','type' => 'html', 'before' => '</div><div class="image">','tag' => 'span'),
		array('name' => 'image', 'type' => 'image', 'label'=>'Image ', 'size' => '60', 'value' => '', 'hint'=>''),
		array('name' => 'toggle','type' => 'html', 'before' => '</div></div>', 'after' => '', 'tag' => 'span'),

		),
),

'footer' => array(
	'name' => 'Footer Options',
	'slug' => 'footer',
	'desc' => false,
	'fields' => array(
						// array('name' => 'disable', 'type' => 'checkbox', 'label'=>'Disable Footer CTA', 'size' => '75','hint' => 'Hides the footer cta.',),
						// array('name' => 'footerheading', 'type' => 'text', 'label'=>'CTA Text', 'size' => '75'),
						// array('name' => 'footerbutton', 'type' => 'text', 'label'=>'CTA Button Text', 'size' => '75'),
		array('name' => 'footer-menu', 'type' => 'checkbox', 'label'=>'Enable Footer Menu', 'size' => '75','hint' => 'Displays footer menu',),
		array('name' => 'footer-widgets', 'type' => 'checkbox', 'label'=>'Enable Footer Widgets', 'size' => '75','hint' => 'Displays footer widgets',),
		array('name' => 'formscript', 'type' => 'script', 'label'=>'Custom Page Scripts', 'cols' => '75', 'rows' => '4', 'hint'=>"Scripts loaded at bottom of page (no included by default wrappers e.g. <script></script><style></style>)"),
		),
	),
);
}

function landing_metabox() {
			//foreach item in array build section
	foreach (landing_fields() as $key => $value) {
		$id = 'landing_'.$value['slug'];
		$title = __( $value['name'], 'landing_textdomain' );
		add_meta_box($id, $title, 'landing_callback', 'info', 'normal', 'low',$value);
	}
}
add_action( 'add_meta_boxes', 'landing_metabox' );


	// Init & Save
	// ----

function landing_callback($post, $metabox ){
	$html = wp_nonce_field('landing_metabox', 'landing_'.$metabox['args']['slug'].'_nonce',false,false);
	if($metabox['args']['desc'])$html .= "<p class='desc'>".$metabox['args']['desc']."</p>";
	foreach ($metabox['args']['fields'] as $field => $value) {
		$html .= fieldBuilder('landing_',$metabox['args']['slug'],$value);
	}

	echo $html;
}

function landing_SaveMetaData( $post_id ) {
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){return;}

	if(!isset($_POST['post_type'])) return;
	if(($_POST['post_type'] == 'page') && (!current_user_can('edit_page', $post_id))) return;
	if (!current_user_can('edit_post', $post_id)) return;

	foreach (landing_fields() as $key => $value) {
		$slug = $value['slug'];

		if(!isset($_POST['landing_'.$value['slug'].'_nonce'])) continue;

		foreach($value['fields'] as $key => $value){
			$data = false;
			$name = 'landing_'.$slug.'_'.$value['name'];
			$data = validateData($name,$value['type']);
			if($data !== false) update_post_meta($post_id, $name, $data);
		}
	}
}

add_action( 'save_post', 'landing_SaveMetaData' );
