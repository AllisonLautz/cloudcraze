<?php

/* ========= register p2p connection types ========= */

function p2p_connections() {
	p2p_register_connection_type( array(
		'name' => 'customers_industries',
		'to' => array('industry'),
		'from' => array('customer'),
		'sortable' => 'any',
		'admin_box' => array(
			'show' => 'any',
			'context' => 'normal', 
			'priority'	=>	'low',
		), 
		'title' => array(
			'to' => __( 'Featured Customer Stories', 'my-textdomain' ),
			'from' => __( 'Related Industries', 'my-textdomain' ),
		),
		'to_labels' => array(
			'singular_name' => __( 'Industry', 'my-textdomain' ),
			'search_items' => __( 'Search industries', 'my-textdomain' ),
			'not_found' => __( 'No industries found.', 'my-textdomain' ),
			'create' => __( 'Add Industries', 'my-textdomain' ),
		),
		'from_labels' => array(
			'singular_name' => __( 'Customer', 'my-textdomain' ),
			'search_items' => __( 'Search customers', 'my-textdomain' ),
			'not_found' => __( 'No customers found.', 'my-textdomain' ),
			'create' => __( 'Add Customers', 'my-textdomain' ),
		),

		
	));



	p2p_register_connection_type( array(
		'name' => 'resources_industries',
		'to' => array('industry'),
		'from' => array('resource'),
		'sortable' => 'any',

		'admin_box' => array(
			'show' => 'any',
			'context' => 'normal', 
			'priority'	=>	'low',
		), 
		'title' => array(
			'to' => __( 'Related Resources', 'my-textdomain' ),
			'from' => __( 'Related Industries', 'my-textdomain' ),
		),
		'to_labels' => array(
			'singular_name' => __( 'Industry', 'my-textdomain' ),
			'search_items' => __( 'Search industries', 'my-textdomain' ),
			'not_found' => __( 'No industries found.', 'my-textdomain' ),
			'create' => __( 'Add Industries', 'my-textdomain' ),
		),
		'from_labels' => array(
			'singular_name' => __( 'Resource', 'my-textdomain' ),
			'search_items' => __( 'Search resources', 'my-textdomain' ),
			'not_found' => __( 'No resources found.', 'my-textdomain' ),
			'create' => __( 'Add Resources', 'my-textdomain' ),
		),
	));

	p2p_register_connection_type( array(
		'name' => 'customers_resources',
		'to' => array('customer'),
		'from' => array('resource', 'post', 'news', 'info'),
		'sortable' => 'any',
		'duplicate_connections' => true,

		'admin_box' => array(
			'show' => 'any',
			'context' => 'normal', 
			'priority'	=>	'low',
		), 
		'title' => array(
			'to' => __( 'Related Resources', 'my-textdomain' ),
			'from' => __( 'Related Customers', 'my-textdomain' ),
		),
		'to_labels' => array(
			'singular_name' => __( 'Customer', 'my-textdomain' ),
			'search_items' => __( 'Search customers', 'my-textdomain' ),
			'not_found' => __( 'No customers found.', 'my-textdomain' ),
			'create' => __( 'Add Customers', 'my-textdomain' ),
		),
		'from_labels' => array(
			'singular_name' => __( 'Resource', 'my-textdomain' ),
			'search_items' => __( 'Search resources', 'my-textdomain' ),
			'not_found' => __( 'No resources found.', 'my-textdomain' ),
			'create' => __( 'Add Resources', 'my-textdomain' ),
		),	
		'fields'	=>	array(
			'link' => array(
				'title' => 'custom link',
				'type' => 'text',
			),
			// 'video' => array(
			// 	'title' => 'video?',
			// 	'type' => 'checkbox',
			// ),
			'override' => array(
				'title' => 'resource type override',
				'type' => 'text',
			),
		),	
	));



	p2p_register_connection_type( array(
		'name' => 'customer_customer',
		'to' => array('customer'),
		'from' => array('customer'),
		'sortable' => 'to',

		'admin_box' => array(
			'show' => 'any',
			'context' => 'normal', 
			'priority'	=>	'low',
		), 
		'title' => array(
			'to' => __( 'Related Customer Stories', 'my-textdomain' ),
		),
		'from_labels' => array(
			'singular_name' => __( 'Customer', 'my-textdomain' ),
			'search_items' => __( 'Search customers', 'my-textdomain' ),
			'not_found' => __( 'No customers found.', 'my-textdomain' ),
			'create' => __( 'Add Customers', 'my-textdomain' ),
		),
	));


	p2p_register_connection_type( array(
		'name' => 'customers_page',
		'to' => array('customer'),
		'from' => array('page'),
		'sortable' => 'any',

		'admin_box' => array(
			'show' => 'any',
			'context' => 'normal', 
			'priority'	=>	'low',
		), 
		'title' => array(
			'to' => __( 'Show Customer on Page', 'my-textdomain' ),
			'from' => __( 'Customer Stories', 'my-textdomain' ),
		),
		'to_labels' => array(
			'singular_name' => __( 'Customer', 'my-textdomain' ),
			'search_items' => __( 'Search customers', 'my-textdomain' ),
			'not_found' => __( 'No customers found.', 'my-textdomain' ),
			'create' => __( 'Add Customers', 'my-textdomain' ),
		),
		'from_labels' => array(
			'singular_name' => __( 'Page', 'my-textdomain' ),
			'search_items' => __( 'Search pages', 'my-textdomain' ),
			'not_found' => __( 'No pages found.', 'my-textdomain' ),
			'create' => __( 'Add Pages', 'my-textdomain' ),
		),
	));


	p2p_register_connection_type( array(
		'name' => 'featured-post',
		'to' => array('page'),
		'from' => array('post'),
		'sortable' => 'any',

		'admin_box' => array(
			'show' => 'any',
			'context' => 'normal', 
			'priority'	=>	'high',
		), 
		'title' => array(
			'to' => __( 'Featured Title Post (optional, overrides title)', 'my-textdomain' ),
			'from' => __( 'News', 'my-textdomain' ),
		),
		'from_labels' => array(
			'singular_name' => __( 'Post', 'my-textdomain' ),
			'search_items' => __( 'Search posts', 'my-textdomain' ),
			'not_found' => __( 'No posts found.', 'my-textdomain' ),
			'create' => __( 'Add Post', 'my-textdomain' ),
		),
		'fields'	=>	array(
			'title' => array(
				'title' => 'Alt Title',
				'type' => 'text',
			),
			'excerpt' => array(
				'title' => 'Alt Excerpt',
				'type' => 'text',
			),
			'button' => array(
				'title' => 'Alt Button Text',
				'type' => 'text',
			),
		),	
	));

	p2p_register_connection_type( array(
		'name' => 'blog_post',
		'to' => array('post'),
		'from' => array('page'),
		'sortable' => 'from',

		'admin_box' => array(
			'show' => 'any',
			'context' => 'normal', 
			'priority'	=>	'high',
		), 
		'title' => array(
			'to' => __( 'Feature on Blog', 'my-textdomain' ),
			'from' => __( 'Featured Posts (up to 3)', 'my-textdomain' ),
		),
		'to_labels' => array(
			'singular_name' => __( 'Item', 'my-textdomain' ),
			'search_items' => __( 'Search items', 'my-textdomain' ),
			'not_found' => __( 'No items found.', 'my-textdomain' ),
			'create' => __( 'Add Items', 'my-textdomain' ),
		),
		'from_labels' => array(
			'singular_name' => __( 'Page', 'my-textdomain' ),
			'search_items' => __( 'Search pages', 'my-textdomain' ),
			'not_found' => __( 'No pages found.', 'my-textdomain' ),
			'create' => __( 'Add Pages', 'my-textdomain' ),
		),
		'fields'	=>	array(
			'title' => array(
				'title' => 'Alt Title',
				'type' => 'text',
			),
			'excerpt' => array(
				'title' => 'Alt Excerpt',
				'type' => 'text',
			),
			'button' => array(
				'title' => 'Alt Button Text',
				'type' => 'text',
			),
		),	
	));


	p2p_register_connection_type( array(
		'name' => 'ctas',
		'to' => array('ctas'),
		'from' => array('page', 'resource', 'events', 'post',),
		'sortable' => 'any',

		'admin_box' => array(
			'show' => 'any',
			'context' => 'normal', 
			'priority'	=>	'low',
		), 
		'title' => array(
			'to' => __( 'Show CTA on Page (Event, Resource ...)', 'my-textdomain' ),
			'from' => __( 'Sitewide CTAs', 'my-textdomain' ),
		),
		'to_labels' => array(
			'singular_name' => __( 'CTA', 'my-textdomain' ),
			'search_items' => __( 'Search ctas', 'my-textdomain' ),
			'not_found' => __( 'No ctas found.', 'my-textdomain' ),
			'create' => __( 'Add CTAs', 'my-textdomain' ),
		),
		'from_labels' => array(
			'singular_name' => __( 'Show on Page', 'my-textdomain' ),
			'search_items' => __( 'Search pages', 'my-textdomain' ),
			'not_found' => __( 'No pages found.', 'my-textdomain' ),
			'create' => __( 'Add Pages', 'my-textdomain' ),
		),

	));




	p2p_register_connection_type( array(
		'name' => 'featured-news',
		'to' => array('page'),
		'from' => array('news'),
		'sortable' => 'any',

		'admin_box' => array(
			'show' => 'any',
			'context' => 'normal', 
			'priority'	=>	'high',
		), 
		'title' => array(
			'to' => __( 'Featured News Item (optional, overrides title)', 'my-textdomain' ),
			'from' => __( 'News', 'my-textdomain' ),
		),
		'from_labels' => array(
			'singular_name' => __( 'News Item', 'my-textdomain' ),
			'search_items' => __( 'Search news items', 'my-textdomain' ),
			'not_found' => __( 'No news items found.', 'my-textdomain' ),
			'create' => __( 'Add News Item', 'my-textdomain' ),
		),
		'fields'	=>	array(
			'title' => array(
				'title' => 'Alt Title',
				'type' => 'text',
			),
			'excerpt' => array(
				'title' => 'Alt Excerpt',
				'type' => 'text',
			),
			'button' => array(
				'title' => 'Alt Button Text',
				'type' => 'text',
			),
		),

	));


	p2p_register_connection_type( array(
		'name' => 'featured-event',
		'to' => array('page'),
		'from' => array('events'),
		'sortable' => 'any',

		'admin_box' => array(
			'show' => 'any',
			'context' => 'normal', 
			'priority'	=>	'high',
		), 
		'title' => array(
			'to' => __( 'Featured News Item (optional, overrides title)', 'my-textdomain' ),
			'from' => __( 'News', 'my-textdomain' ),
		),
		'from_labels' => array(
			'singular_name' => __( 'Event', 'my-textdomain' ),
			'search_items' => __( 'Search events', 'my-textdomain' ),
			'not_found' => __( 'No events found.', 'my-textdomain' ),
			'create' => __( 'Add Event', 'my-textdomain' ),
		),

		'fields'	=>	array(
			'title' => array(
				'title' => 'Alt Title',
				'type' => 'text',
			),
			'excerpt' => array(
				'title' => 'Alt Excerpt',
				'type' => 'text',
			),
			'button' => array(
				'title' => 'Alt Button Text',
				'type' => 'text',
			),
		),
	));


	function restrict_p2p_box_display( $show, $ctype, $post) {
		if ( 'customers_industries' == $ctype->name && 'to' == $ctype->get_direction() ) {
			return ( 'industry' == $post->post_type );
		}
		if ( 'customers_industries' == $ctype->name && 'from' == $ctype->get_direction() ) {
			return ( 'customer' == $post->post_type );
		}
		if ( 'resources_industries' == $ctype->name && 'to' == $ctype->get_direction() ) {
			return ( 'industry' == $post->post_type );
		}
		if ( 'resources_industries' == $ctype->name && 'from' == $ctype->get_direction() ) {
			return ( 'resource' == $post->post_type );
		}
		if ( 'customers_resources' == $ctype->name && 'to' == $ctype->get_direction() ) {
			return ( 'customer' == $post->post_type );
		}
		if ( 'customers_resources' == $ctype->name && 'from' == $ctype->get_direction() ) {
			// return ( 'resource' == $post->post_type );
			// return ( 'news' == $post->post_type );
			return $post->post_type;
		}

		if ( 'customer_customer' == $ctype->name && 'to' == $ctype->get_direction() ) {
			return ( 'customer' == $post->post_type );
		}

		if ( 'customers_page' == $ctype->name && 'from' == $ctype->get_direction() ) {
			return ( 'page-solutions.php' == $post->page_template );
		}


		if ( 'blog_post' == $ctype->name && 'from' == $ctype->get_direction() ) {
			return ( 'page-blog.php' == $post->page_template );
		}


		if ( 'ctas' == $ctype->name && 'to' == $ctype->get_direction() ) {
			return $post->post_type;
		}

		if ( 'ctas' == $ctype->name && 'from' == $ctype->get_direction() ) {
			return $post->post_type;
		}

		if ( 'featured-news' == $ctype->name && 'to' == $ctype->get_direction() ) {
			return ( 'page-news.php' == $post->page_template);
		}

		if ( 'featured-event' == $ctype->name && 'to' == $ctype->get_direction() ) {
			return ( 'page-events.php' == $post->page_template);
		}

		if ( 'featured-post' == $ctype->name && 'to' == $ctype->get_direction() ) {
			return ( 'page-blog.php' == $post->page_template);
		}


	}

	add_filter( 'p2p_admin_box_show', 'restrict_p2p_box_display', 10, 3 );

}
add_action( 'p2p_init', 'p2p_connections' );



function post_ID(){
	Global $post_id;
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
	// echo '<h1 style="margin:200px;">' . $post_id . '</h1>';
	return $post_id;
}


function textareaPlaceholder(){

	global $post_id;
	$content = strip_tags($post->post_content);
	$content = strlen($content) > 160 ? substr($content, 0, 160) . '...' : substr($content, 0, 160);
	$content = get_the_excerpt() ? get_the_excerpt() : $content;
	return $content;

}

// echo post_ID();


function hide_editor() {
	Global $post_id;
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
	$template_file = get_post_meta($post_id, '_wp_page_template', true);
	$show_editor = array(
		// 'page-solutions.php',

	);

	if(! in_array($template_file, $show_editor)){
		
	}

	
	// remove_post_type_support('page', 'comments');
}
// add_action( 'admin_init', 'hide_editor' );


$post_type = get_post_type( $_GET['post'] );

$default = 'default';
$page = 'page.php';
$careers = 'page-careers.php';
$customer = 'page-customers.php';
$home = 'front-page.php';
$solutions = 'page-solutions.php';
$news = 'page-news.php';
$events = 'page-events.php';
$blog = 'page-blog.php';
$team = 'page-team.php';
$dreamforce = 'page-dreamforce.php';
$test = 'page-test.php';
$webinars = 'page-webinars.php';

$all = array($default, $page, $home, $careers, $customer, $solutions, $test, $news, $events, $blog,$dreamforce,);




$meta_boxes = array(
	array(
		'id' => 'Title',
		'title' => 'Title',
		'pages' => array('page','resource', 'events', 'news',),
		'template'	=>	array($home, $solutions, $customer, $news, $events, $blog, $page, $default, $team, $dreamforce,$careers, $webinars),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'id' => 'banner_img',
				'type' => 'media',
				'hint' => '', 
			),
			array(
				'id' => 'section_title',
				'type' => 'wysiwyg',
				'hint' => 'Use Heading 1 for the heading, Heading 2 for the subheading, and paragraph for everything else.', 
				'settings'	=>	array(
					'media_buttons'	=>	false,
					'textarea_rows'	=>	7,
					'tinymce'       => array(
						'block_formats'	=>	'Paragraph=p;Heading 1=h1;Heading 2=h2;',
						'toolbar1'      => 'formatselect,bold, italic, underline,bullist,numlist,blockquote,alignleft, aligncenter, alignright,link, unlink,fullscreen, wp_adv,',
						'toolbar2'      => 'strikethrough,pastetext,removeformat,outdent,indent,undo,redo,wp_help',
					),
				),
			),
		) // end fields
	),

	array(
		'id' => 'Title',
		'title' => 'Title',
		'pages' => array('customer',),
		// 'template'	=>	array($home, $solutions, $customer, $news, $events, $blog, $page, $default, $team, $dreamforce,$careers),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'id' => 'banner_img',
				'type' => 'media',
				'hint' => '', 
			),
			array(
				'id' => 'customer_options_banner',
				'type' => 'wysiwyg',
				'hint' => 'Use Heading 1 for the heading, Heading 2 for the subheading, and paragraph for everything else.', 
				'settings'	=>	array(
					'media_buttons'	=>	false,
					'textarea_rows'	=>	7,
					'tinymce'       => array(
						'block_formats'	=>	'Paragraph=p;Heading 1=h1;Heading 2=h2;',
						'toolbar1'      => 'formatselect,bold, italic, underline,bullist,numlist,blockquote,alignleft, aligncenter, alignright,link, unlink,fullscreen, wp_adv,',
						'toolbar2'      => 'strikethrough,pastetext,removeformat,outdent,indent,undo,redo,wp_help',
					),
				),
			),
		) // end fields
	),

	array(
		'id' => 'Maincontent',
		'title' => 'Main Content',
		'pages' => array('page','resource',),
		'template'	=>	array($default, $page, $dreamforce),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'id'	=>	'section_maincontent',
				// 'id' => 'content',
				'type' => 'wysiwyg',
				'hint' => 'Use Heading 2 for the section headline and paragraph for everything else.', 
				'settings'	=>	array(
					'textarea_rows'	=>	25,
					'tinymce'       => array(
						'block_formats'	=>	'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;',
						'toolbar1'      => 'formatselect,bold, italic, underline,bullist,numlist,blockquote,alignleft, aligncenter, alignright,link, unlink,table,fullscreen, wp_adv,',
						// 'toolbar2'      => 'strikethrough,pastetext,removeformat,outdent,indent,undo,redo,wp_help',

					),
				),
			),
		) // end fields
	),




	array(
		'id' => 'Maincontent',
		'title' => 'Main Content',
		'pages' => array('page'),
		'template'	=>	array($solutions),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'id'	=>	'solutions_content',
				// 'id' => 'content',
				'type' => 'wysiwyg',
				'hint' => 'Use Heading 2 for the section headline and paragraph for everything else.', 
				'settings'	=>	array(
					'textarea_rows'	=>	25,
					'tinymce'       => array(
						'block_formats'	=>	'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;',
						'toolbar1'      => 'formatselect,bold, italic, underline,bullist,numlist,blockquote,alignleft, aligncenter, alignright,link, unlink,table,fullscreen, wp_adv,',
						// 'toolbar2'      => 'strikethrough,pastetext,removeformat,outdent,indent,undo,redo,wp_help',

					),
				),
			),



			
		) // end fields
	),






	array(
		'id' => 'Maincontent_2',
		'title' => 'Main Content 2',
		'pages' => array('page'),
		'template'	=>	array($solutions),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'id'	=>	'solutions_content_2',
				// 'id' => 'content',
				'type' => 'wysiwyg',
				'hint' => 'Use Heading 2 for the section headline and paragraph for everything else.', 
				'settings'	=>	array(
					'textarea_rows'	=>	25,
					'tinymce'       => array(
						'block_formats'	=>	'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;',
						'toolbar1'      => 'formatselect,bold, italic, underline,bullist,numlist,blockquote,alignleft, aligncenter, alignright,link, unlink,table,fullscreen, wp_adv,',
						// 'toolbar2'      => 'strikethrough,pastetext,removeformat,outdent,indent,undo,redo,wp_help',

					),
				),
			),
		) // end fields
	),



	
	array(
		'id' => 'Industry-Content',
		'title' => 'Industry Content',
		'pages' => array('industry'),
		
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'id'	=>	'industry_content',
				'type' => 'wysiwyg',
				'hint' => 'Use Heading 2 for the section headline and paragraph for everything else.', 
				'settings'	=>	array(
					'textarea_rows'	=>	5,
					'tinymce'       => array(
						'block_formats'	=>	'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;',
						'toolbar1'      => 'formatselect,bold, italic, underline,bullist,numlist,blockquote,alignleft, aligncenter, alignright,link, unlink,table,fullscreen, wp_adv,',
						// 'toolbar2'      => 'strikethrough,pastetext,removeformat,outdent,indent,undo,redo,wp_help',

					),
				),
			),
			array(
				'id'	=>	'industry_logos',
				'type' => 'logos',

			),
			// array(
			// 	'id'	=>	'industry_icons_title',
			// 	'type' => 'text',

			// ),
			// array(
			// 	'id'	=>	'industry_icons_desc',
			// 	'type' => 'textarea',

			// ),


			array(
				'id'	=>	'industry_testimonial',
				'type' => 'wysiwyg',
				'hint' => 'Use Heading 2 for the section headline and paragraph for everything else.', 
				'settings'	=>	array(
					'textarea_rows'	=>	7,
					'tinymce'       => array(
						'block_formats'	=>	'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;',
						'toolbar1'      => 'formatselect,bold, italic, underline,bullist,numlist,blockquote,alignleft, aligncenter, alignright,link, unlink,table,fullscreen, wp_adv,',
						// 'toolbar2'      => 'strikethrough,pastetext,removeformat,outdent,indent,undo,redo,wp_help',

					),
				),
			),
		) // end fields
	),






	/* homepage metas */


	array(
		'id' => 'Featured_Announcement',
		'title' => 'Featured Announcement',
		'pages' => array('page',),
		'template'	=>	array($home,),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'before'	=>	'<div class="section">',
				'heading'	=>	'Dark Blue',
				'id' => 'homepage_announcement_title',
				'type' => 'text',	
				'label'	=>	'Title',
			),

			array(
				'id' => 'homepage_announcement_intro',
				'type' => 'textarea',	
				'label'	=>	'Text',			
			),

			array(
				'id' => 'homepage_announcement_button_text',
				'type' => 'text',	
				'label'	=>	'Button Text',			
			),

			array(
				'id' => 'homepage_announcement_anchor',
				'type' => 'text',	
				'label'	=>	'Link To',	
				'after'	=>	'</div>',		
			),

			array(
				'before'	=>	'<div class="section">',
				'heading'	=>	'Orange',
				'id' => 'homepage_announcement_title2',
				'type' => 'text',	
				'label'	=>	'Title',
			),

			array(
				'id' => 'homepage_announcement_intro2',
				'type' => 'textarea',	
				'label'	=>	'Text',			
			),

			array(
				'id' => 'homepage_announcement_button_text2',
				'type' => 'text',	
				'label'	=>	'Button Text',			
			),

			array(
				'id' => 'homepage_announcement_anchor2',
				'type' => 'text',	
				'label'	=>	'Link To',	
				'after'	=>	'</div>',				
			),


		) // end fields
	),

	array(
		'id' => 'Clients_Overview',
		'title' => 'Clients Overview',
		'pages' => array('page'),
		'template'	=>	array($home,),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'id' => 'homepage_clients_title',
				'type' => 'text',	
				'label'	=>	'Title',
			),

			array(
				'id' => 'homepage_clients_intro',
				'type' => 'textarea',	
				'label'	=>	'Text',			
			),

			array(
				'id' => 'homepage_clients_button_text',
				'type' => 'text',	
				'label'	=>	'Button Text',			
			),

			array(
				'id' => 'homepage_clients_anchor',
				'type' => 'text',	
				'label'	=>	'Link To',			
			),


			array(
				'id' => 'homepage_clients_video',
				'type' => 'text',	
				'label'	=>	'Video Link (optional)',			
			),



		) // end fields
	),


	array(
		'id' => 'Resources_Section',
		'title' => 'Resources Section',
		'pages' => array('page'),
		'template'	=>	array($home,),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'id' => 'homepage_resource_title',
				'type' => 'text',	
				'label'	=>	'Title',
			),

			array(
				'id' => 'homepage_resource_intro',
				'type' => 'textarea',	
				'label'	=>	'Text',			
			),
		) // end fields
	),


	array(
		'id' => 'Video_Slidein',
		'title' => 'Laptop Slide-in Section',
		'pages' => array('page'),
		'template'	=>	array($home,),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(

			array(
				'id' => 'homepage_products_image',
				'type' => 'image',	
				// 'label'	=>	'Title',
			),


			array(
				'id' => 'homepage_products_title',
				'type' => 'text',	
				'label'	=>	'Title',
			),

			array(
				'id' => 'homepage_products_intro',
				'type' => 'textarea',	
				'label'	=>	'Text',			
			),

			array(
				'id' => 'homepage_products_button_text',
				'type' => 'text',	
				'label'	=>	'Button Text',			
			),

			array(
				'id' => 'homepage_products_anchor',
				'type' => 'text',	
				'label'	=>	'Link To',			
			),

		) // end fields
	),


	array(
		'id' => 'homepage_cta',
		'title' => 'Call to Action',
		'pages' => array('page'),
		'template'	=>	array($home,),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(

			array(
				'id' => 'homepage_cta_image',
				'type' => 'image',	
			),

			array(
				'id' => 'homepage_cta_title',
				'type' => 'text',	
				'label'	=>	'Title',
			),

			array(
				'id' => 'homepage_cta_intro',
				'type' => 'textarea',	
				'label'	=>	'Text',			
			),

			array(
				'id' => 'homepage_cta_button_text',
				'type' => 'text',	
				'label'	=>	'Button Text',			
			),

			array(
				'id' => 'homepage_cta_anchor',
				'type' => 'text',	
				'label'	=>	'Link To',			
			),



		) // end fields
	),



	array(
		'id' => 'homepage_features',
		'title' => 'Features',
		'pages' => array('page'),
		'template'	=>	array($home,),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(

			array(
				'id' => 'homepage_features_title',
				'type' => 'text',	
				'label'	=>	'Title',
			),

			array(
				'id' => 'homepage_feat_intro',
				'type' => 'textarea',	
				'label'	=>	'Text',			
			),


			array(
				'id' => 'homepage_feat_icons',
				'type' => 'icons',	
				'label'	=>	'Icons',			
			),

			array(
				'id' => 'homepage_features_button_text',
				'type' => 'text',	
				'label'	=>	'Button Text',			
			),

			array(
				'id' => 'homepage_features_anchor',
				'type' => 'text',	
				'label'	=>	'Link To',			
			),

			/* icons */

		) // end fields
	),

	array(
		'id' => 'homepage_news_feeds',
		'title' => 'News Feeds Section',
		'pages' => array('page'),
		'template'	=>	array($home,),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(

			array(
				'id' => 'homepage_feeds_news_title',
				'type' => 'text',	
				'label'	=>	'Title',
			),

			array(
				'id' => 'homepage_feeds_news_intro',
				'type' => 'textarea',	
				'label'	=>	'Text',			
			),

			array(
				'id' => 'homepage_feeds_news_button_text',
				'type' => 'text',	
				'label'	=>	'Button Text',			
			),

			array(
				'id' => 'homepage_feeds_news_anchor',
				'type' => 'text',	
				'label'	=>	'Link To',			
			),

		) // end fields
	),


	array(
		'id' => 'homepage_resource_feeds',
		'title' => 'Resource Feeds Section',
		'pages' => array('page'),
		'template'	=>	array($home,),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(

			array(
				'id' => 'homepage_feeds_resource_title',
				'type' => 'text',	
				'label'	=>	'Title',
			),

			array(
				'id' => 'homepage_feeds_resource_intro',
				'type' => 'textarea',	
				'label'	=>	'Text',			
			),

			array(
				'id' => 'homepage_feeds_resource_button_text',
				'type' => 'text',	
				'label'	=>	'Button Text',			
			),

			array(
				'id' => 'homepage_feeds_resource_anchor',
				'type' => 'text',	
				'label'	=>	'Link To',			
			),

		) // end fields
	),



	/* solutions */

	array(
		'id' => 'solutions_options',
		'title' => 'Solutions Page content',
		'pages' => array('page'),
		'template'	=>	array($solutions,),
		'context' => 'normal',
		'priority' => 'low',
		'fields' => array(

			array(	
				'before'	=>	'<div class="section">',
				'heading'	=>	'Icons Section',
				'after'	=>	'</div>',
				'id' => 'solutions_icons',
				'type' => 'wysiwyg',
				'hint' => 'Use Heading 2 for the section headline and paragraph for everything else.', 
				'settings'	=>	array(
					'textarea_rows'	=>	15,
					'tinymce'       => array(
						'block_formats'	=>	'Paragraph=p;Heading 2=h2;',
						'toolbar1'      => 'formatselect,bold, italic, underline,bullist,numlist,blockquote,alignleft, aligncenter, alignright,link, unlink,fullscreen, wp_adv,',
						'toolbar2'      => 'strikethrough,pastetext,removeformat,outdent,indent,undo,redo,wp_help',
					),
				),
			),

			array(	
				'before'	=>	'<div class="section">',
				'heading'	=>	'Content (next to svg)',
				'after'	=>	'</div>',
				'id' => 'solutions_content_1',
				'type' => 'wysiwyg',
				'hint' => 'Use Heading 2 for the section headline and paragraph for everything else.', 
				'settings'	=>	array(
					'textarea_rows'	=>	15,
					'tinymce'       => array(
						'block_formats'	=>	'Paragraph=p;Heading 2=h2;',
						'toolbar1'      => 'formatselect,bold, italic, underline,bullist,numlist,blockquote,alignleft, aligncenter, alignright,link, unlink,fullscreen, wp_adv,',
						'toolbar2'      => 'strikethrough,pastetext,removeformat,outdent,indent,undo,redo,wp_help',
					),
				),
			),


			array(	
				'before'	=>	'<div class="section">',
				'heading'	=>	'Our Customers (title/intro)',
				'after'	=>	'</div>',
				'id' => 'solutions_customers_intro',
				'type' => 'wysiwyg',
				'hint' => 'Use Heading 2 for the section headline and paragraph for everything else.', 
				'settings'	=>	array(
					'textarea_rows'	=>	7,
					'tinymce'       => array(
						'block_formats'	=>	'Paragraph=p;Heading 2=h2;',
						'toolbar1'      => 'formatselect,bold, italic, underline,bullist,numlist,blockquote,alignleft, aligncenter, alignright,link, unlink,fullscreen, wp_adv,',
						'toolbar2'      => 'strikethrough,pastetext,removeformat,outdent,indent,undo,redo,wp_help',
					),
				),
			),

			array(	
				'before'	=>	'<div class="section">',
				'heading'	=>	'Our Customers (button)',
				'after'	=>	'</div>',
				'id' => 'solutions_customers_button',
				'type' => 'wysiwyg',

				'settings'	=>	array(
					'textarea_rows'	=>	1,
					'tinymce'       => array(
						'block_formats'	=>	'Paragraph=p;',
						'toolbar1'      => 'formatselect,bold, italic, underline,bullist,numlist,blockquote,alignleft, aligncenter, alignright,link, unlink,fullscreen, wp_adv,',
						'toolbar2'      => 'strikethrough,pastetext,removeformat,outdent,indent,undo,redo,wp_help',
					),
				),
			),



		) // end fields
	),


	array(
		'id' => 'Featured_Announcement',
		'title' => 'Featured Announcement',
		'pages' => array('resource',),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'id' => 'featured_announcement_title',
				'type' => 'text',	
				'label'	=>	'Title',
			),

			array(
				'id' => 'featured_announcement_intro',
				'type' => 'textarea',	
				'label'	=>	'Text',			
			),

			array(
				'id' => 'featured_announcement_button_text',
				'type' => 'text',	
				'label'	=>	'Button Text',			
			),

			array(
				'id' => 'featured_announcement_anchor',
				'type' => 'text',	
				'label'	=>	'Link To',	
			),



		) // end fields
	),


	/* dreamforce */

	array(
		'id' => 'dreamforce',
		'title' => 'Dreamforce Video Sections',
		'pages' => array('page',/*'resource',*/ 'events'),
		'template'	=>	$dreamforce,
		'context' => 'normal',
		'priority' => 'low',
		'fields' => array(

			array(
				'before'	=>	'<div class="dreamforce section section-1">',
				'heading'	=>	'Section 1',
				'id' => 'dreamforce_section_1_image',
				'type' => 'image',	
			),
			array(
				'id' => 'dreamforce_section_1_title',
				'type' => 'text',	
				'label'	=>	'Title',
			),

			array(
				'id' => 'dreamforce_section_1_intro',
				'type' => 'textarea',	
				'label'	=>	'Text',			
			),

			array(
				'id' => 'dreamforce_section_1_video',
				'type' => 'text',	
				'label'	=>	'Video Link',		
				'after'	=>	'</div>',				
			),

			// section 2

			array(
				'before'	=>	'<div class="dreamforce section section-2">',
				'heading'	=>	'Section 2',
				'id' => 'dreamforce_section_2_image',
				'type' => 'image',	
			),
			array(
				'id' => 'dreamforce_section_2_title',
				'type' => 'text',	
				'label'	=>	'Title',
			),

			array(
				'id' => 'dreamforce_section_2_intro',
				'type' => 'textarea',	
				'label'	=>	'Text',			
			),

			array(
				'id' => 'dreamforce_section_2_video',
				'type' => 'text',	
				'label'	=>	'Video Link',		
				'after'	=>	'</div>',				
			),

			// section 3

			array(
				'before'	=>	'<div class="dreamforce section section-3">',
				'heading'	=>	'Section 3',
				'id' => 'dreamforce_section_3_image',
				'type' => 'image',	
			),
			array(
				'id' => 'dreamforce_section_3_title',
				'type' => 'text',	
				'label'	=>	'Title',
			),

			array(
				'id' => 'dreamforce_section_3_intro',
				'type' => 'textarea',	
				'label'	=>	'Text',			
			),

			array(
				'id' => 'dreamforce_section_3_video',
				'type' => 'text',	
				'label'	=>	'Video Link',		
				'after'	=>	'</div>',				
			),

			// section 4

			array(
				'before'	=>	'<div class="dreamforce section section-4">',
				'heading'	=>	'Section 4',
				'id' => 'dreamforce_section_4_image',
				'type' => 'image',	
			),
			array(
				'id' => 'dreamforce_section_4_title',
				'type' => 'text',	
				'label'	=>	'Title',
			),

			array(
				'id' => 'dreamforce_section_4_intro',
				'type' => 'textarea',	
				'label'	=>	'Text',			
			),

			array(
				'id' => 'dreamforce_section_4_video',
				'type' => 'text',	
				'label'	=>	'Video Link',		
				'after'	=>	'</div>',				
			),


			// section 5

			array(
				'before'	=>	'<div class="dreamforce section section-5">',
				'heading'	=>	'Section 5',
				'id' => 'dreamforce_section_5_image',
				'type' => 'image',	
			),
			array(
				'id' => 'dreamforce_section_5_title',
				'type' => 'text',	
				'label'	=>	'Title',
			),

			array(
				'id' => 'dreamforce_section_5_intro',
				'type' => 'textarea',	
				'label'	=>	'Text',			
			),
			array(
				'id' => 'dreamforce_section_5_video',
				'type' => 'text',	
				'label'	=>	'Video Link',		
				'after'	=>	'</div>',				
			),

			// section 6

			array(
				'before'	=>	'<div class="dreamforce section section-6">',
				'heading'	=>	'Section 6',
				'id' => 'dreamforce_section_6_image',
				'type' => 'image',	
			),
			array(
				'id' => 'dreamforce_section_6_title',
				'type' => 'text',	
				'label'	=>	'Title',
			),

			array(
				'id' => 'dreamforce_section_6_intro',
				'type' => 'textarea',	
				'label'	=>	'Text',			
			),

			array(
				'id' => 'dreamforce_section_6_video',
				'type' => 'text',	
				'label'	=>	'Video Link',		
				'after'	=>	'</div>',				
			),




		) // end fields
	),


	/* site-wide */


	array(
		'id' => 'pardot',
		'title' => 'Pardot Form',
		'pages' => array('page','resource', 'events', 'news'),
		'template'	=>	$all,
		'context' => 'normal',
		'priority' => 'low',
		'fields' => array(
			array(
				'before'	=>	'<div class="section form">',
				'label'	=>	'Position on page',
				'id' => 'pardot_form_position',
				'type' => 'select',
				'options'	=>	array('Sidebar', 'Bottom',),
			),
			array(
				'label'	=>	'Form Heading',
				'id' => 'pardot_form_heading',
				'type' => 'text',
			),

			array(
				'label'	=>	'Form Intro',
				'id' => 'pardot_form_blurb',
				'type' => 'textarea',
			),

			array(
				'label'	=>	'Pardot URL',
				'id' => 'pardot_form_url',
				'type' => 'text',
				'hint'=>'should start with "https://go.pardot.com"',
			),

			array(
				'label'	=>	'Lead Source',
				'id' => 'pardot_form_lead_source',
				'type' => 'text',
				'after'	=>	'</div>',

			),




			array(
				'before'	=>	'<div class="section pardot events">',
				'heading'	=>	'<strong>Event/Webinar Options</strong>',
				'label'	=>	'Event Date',
				'id' => 'pardot_form_date',
				'type' => 'text',
				'hint'	=>	'<i>example format: January 01, 1970 | 11AM CST</i>',
			),

			// array(
			// 	'label'	=>	'Event Time',
			// 	'id' => 'pardot_form_time',
			// 	'type' => 'text',
			// 	'hint'	=>	'<i>example format: 11AM CST</i>',
			// ),

			array(
				'label'	=>	'Expiration Date',
				'id' => 'pardot_form_expire_date',
				'type' => 'date',
				
			),


			array(
				'label'	=>	'Webinar external link',
				'id' => 'external_link',
				'type' => 'text',
				'placeholder'	=>	'https://www.salesforce.com/url',
				
			),

			
			
			array(
				'label'	=>	'Location Name',
				'id' => 'pardot_form_location_name',
				'type' => 'text',
			),

			array(
				'label'	=>	'Location Address',
				'id' => 'pardot_form_location_address',
				'type' => 'text',
			),

			array(
				'label'	=>	'Map URL',
				'id' => 'pardot_form_map_url',
				'type' => 'text',
				'after'	=>	'</div>',
			),




			array(
				'before'	=>	'<div class="section pardot resource">',
				'heading'	=>	'<strong>Resource Options</strong>',
				'label'	=>	'Downloadable Asset',
				'id' => 'pardot_form_asset',
				'type' => 'text',
				'hint' => 'Use for Downloadable assets (pdfs, ppt, doc, etc)',
				'after'	=>	'</div>',
			),
		) // end fields
	),

	array(
		'id' => 'cta',
		'title' => 'Unique CTA',
		'pages' => array('page','resource'),
		'template'	=>	$all,
		'context' => 'normal',
		'priority' => 'low',
		'fields' => array(
			array(
				'label'	=>	'Position on page',
				'id' => 'cta_position',
				'type' => 'select',
				'options'	=>	array('Please Select', 'Sidebar', 'Bottom',),
			),
			array(

				'id' => 'footer_cta',
				'type' => 'wysiwyg',
				'hint' => 'Use Heading 3 for the section headline and paragraph for everything else.', 
				'settings'	=>	array(
					'textarea_rows'	=>	15,
					'tinymce'       => array(
						'block_formats'	=>	'Paragraph=p;Heading 3=h3;',
						'toolbar1'      => 'formatselect,bold, italic, underline,bullist,numlist,blockquote,alignleft, aligncenter, alignright,link, unlink,fullscreen, wp_adv,',
						'toolbar2'      => 'strikethrough,pastetext,removeformat,outdent,indent,undo,redo,wp_help',
					),
				),
			),


		) // end fields
	),


	array(
		'id' => 'calltoaction',
		'title' => 'CTA',
		'pages' => array('ctas'),

		'context' => 'normal',
		'priority' => 'low',
		'fields' => array(
			array(

				'id' => 'call_to_action',
				'type' => 'wysiwyg',
				'hint' => 'Use Heading 2 for the section headline and paragraph for everything else.', 
				'settings'	=>	array(
					'textarea_rows'	=>	15,
					'tinymce'       => array(
						'block_formats'	=>	'Paragraph=p;Heading 2=h2;',
						'toolbar1'      => 'formatselect,bold, italic, underline,bullist,numlist,blockquote,alignleft, aligncenter, alignright,link, unlink,fullscreen, wp_adv,',
						'toolbar2'      => 'strikethrough,pastetext,removeformat,outdent,indent,undo,redo,wp_help',
					),
				),
			),
		) // end fields
	),

	array(
		$prefix = 'customer_options_',
		'id' => 'disable',
		'title' => 'Disable Link',
		'pages' => array('customer'), // multiple post types
		'context' => 'side',
		'priority' => 'low',
		'fields' => array(
			array(
				'name' => 'disable',
				'id' => $prefix . 'disable',
				'type' => 'checkbox',
				'desc' => 'disable link on Customers page', 

			),
		) // end fields
	),




	array(
		'id' => 'disable_main',
		'title' => 'Mainvisual is an Illustration',
		'pages' => array('news', 'page', 'resource'), // multiple post types
		'template'	=>	array($news),
		'context' => 'side',
		'priority' => 'low',
		'fields' => array(
			array(
				'name' => 'disable',
				'id' => 'main_disable',
				'type' => 'checkbox',
				// 'desc' => 'disable link on Customers page', 

			),
		) // end fields
	),



	array(
		$prefix = 'customer_options_',
		'id' => 'logo',
		'title' => 'Customer Logo',
		'pages' => array('customer'), // multiple post types
		'context' => 'normal',
		'priority' => 'low',
		'fields' => array(
			array(
				'name' => 'logo',
				'id' => 'customer_options_logo',
				'type' => 'logo',
				// 'desc' => 'Customer Logo', 

			),
		) // end fields
	),


	array(
		'id' => 'video-link',
		'title' => 'Video Link (optional)',
		'pages' => array('customer', 'resource'), // multiple post types
		'context' => 'normal',
		'priority' => 'low',
		'fields' => array(
			array(
				'name' => 'video link',
				'id' => 'video_link',
				'type' => 'text',
				'placeholder' => 'https://www.youtube.com/embed/sVqTQqnds20', 

			),
		) // end fields
	),







	array(
		'id' => 'seo_metas',
		'title' => 'SEO Options',
		// 'pages' => array('page'),
		'pages'	=> get_post_types(),
		'template'	=>	$all,
		'context' => 'normal',
		'priority' => 'low',
		'fields' => array(

			array(
				'id' => 'seometa_metas_title',
				'type' => 'text',	
				'label'	=>	'Title',
				'placeholder'	=>	get_the_title(post_ID()),
			),

			array(
				'id' => 'seometa_metas_description',
				'type' => 'textarea',	
				'label'	=>	'Description',
				'placeholder'	=>	textareaPlaceholder(),
			),


			array(
				'id' => 'seometa_metas_keywords',
				'type' => 'text',	
				'label'	=>	'Keywords',
				'placeholder'	=>	get_the_title(post_ID()),
			),

			array(
				'id' => 'seometa_metas_canonical',
				'type' => 'text',	
				'label'	=>	'Canonical URL',
				'placeholder'	=>	get_the_permalink(post_ID()),
			),


			array(
				'id' => 'seometa_metas_noindex',
				'type' => 'checkbox',	
				'label'	=>	'NO INDEX',
				'hint'	=>	'<i>Requests that search engines do not index this page.</i>',
			),

			array(
				'id' => 'seometa_metas_nofollow',
				'type' => 'checkbox',	
				'label'	=>	'NO FOLLOW',
				'hint'	=>	'<i>Requests that search engines do not follow links to this page.</i>',
			),

			array(
				'id' => 'seometa_metas_search',
				'type' => 'checkbox',	
				'label'	=>	'Disallow Search',
				'hint'	=>	'<i>Removes page from internal site search</i>',
			),

			array(
				'id' => 'seometa_metas_sitemap',
				'type' => 'checkbox',	
				'label'	=>	'Disallow Sitemap',
				'hint'	=>	'<i>Removes page from internal sitemap (html & xml)</i>',
			),


		) // end fields
	),

	array(
		'id' => 'social_metas',
		'title' => 'Social Options',
		// 'pages' => array('page'),
		'pages'	=> get_post_types(),
		'template'	=>	$all,
		'context' => 'normal',
		'priority' => 'low',
		'fields' => array(

			array(
				'id' => 'seometa_social_title',
				'type' => 'text',	
				'label'	=>	'Social Title',
				// 'placeholder'	=>	get_the_title(post_ID()),
			),

			array(
				'id' => 'seometa_social_socialimage',
				'type' => 'image',	
				'label'	=>	'Social Image Id',
				// 'placeholder'	=>	textareaPlaceholder(),
			),


			array(
				'id' => 'seometa_social_description',
				'type' => 'textarea',	
				'label'	=>	'Social Description',
				// 'placeholder'	=>	get_the_title(post_ID()),
			),

			array(
				'id' => 'seometa_social_tweet',
				'type' => 'textarea',	
				'label'	=>	'Default Tweet',
				// 'placeholder'	=>	get_the_permalink(post_ID()),
			),


			array(
				'id' => 'seometa_social_url',
				'type' => 'text',	
				'label'	=>	'Page URL',
				'placeholder'	=>	get_the_title(post_ID()),
			),

			array(
				'id' => 'seometa_social_twitter',
				'type' => 'text',	
				'label'	=>	'Twitter Profile',
			),

			array(
				'id' => 'seometa_social_sitename',
				'type' => 'text',	
				'label'	=>	'Website Name',
				'placeholder'	=>	get_bloginfo('name'),
			),




		) // end fields
	),



	array(
		'id' => 'Testimonial',
		'title' => 'Testimonial',
		'pages' => array('customer',),
		// 'template'	=>	array($home, $solutions, $customer, $news, $events, $blog, $page, $default, $team, $dreamforce,$careers),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(

			array(
				'id' => 'customer_options_testimonial',
				'type' => 'wysiwyg',
				'hint' => 'Use Heading 3 for the quote and paragraph for the speaker', 
				'settings'	=>	array(
					'media_buttons'	=>	false,
					'textarea_rows'	=>	7,
					'tinymce'       => array(
						'block_formats'	=>	'Paragraph=p;Heading 3=h3;',
						'toolbar1'      => 'formatselect,bold, italic, underline,bullist,numlist,blockquote,alignleft, aligncenter, alignright,link, unlink,fullscreen, wp_adv,',
						'toolbar2'      => 'strikethrough,pastetext,removeformat,outdent,indent,undo,redo,wp_help',
					),
				),
			),
		) // end fields
	),


);

// // echo '<h1 style="margin-left:200px">'.$post_id.'</h1>';
// $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
// $template_file = get_post_meta($post_id, '_wp_page_template', true);

// foreach ($meta_boxes as $meta_box) {
// 	// print_r($meta_box['pages']);
// 	$post_type = get_post_type( $_GET['post'] );


// 	if(!($template_file) && $meta_box['pages']){ 
// 		/* if it's a post type, not a page */
// 		$my_box = new custom_metabox($meta_box);
// 	}

// 	else{
// 		foreach($meta_box['pages'] as $k => $v){
// 			if($k == 'page'){
// 				$my_box = new custom_metabox($meta_box);
// 			}
// 		}
// 		/*elseif(in_array('page', $meta_box['pages']) && in_array($template_file, $meta_box['template'])){ 
// 			/* if it's a page w/declared template */
// 		// echo '<h1 style="margin-left:200px">'.$template.'</h1>';
// 		/*$my_box = new custom_metabox($meta_box);
// 	}*/
// }

// }





$template_file = get_post_meta($post_id, '_wp_page_template', true);

global $post_type;
$post_type = get_post_type( $_GET['post'] );



$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$page = strpos($actual_link, 'post_type=page');

if($page){
	// echo '<h1 style="background:olive; margin:200px">page!</h1>';
	$template_file = 'default';
}



// echo '<h1 style="background:yellow; margin:200px">'.$template_file.'</h1>';
// echo '<h1 style="background:lightblue; margin:200px">'.$post_type.'</h1>';

foreach ($meta_boxes as $meta_box) {

	


	if(!($template_file) && $meta_box['pages']){ 
		/* if it's a post type, not a page */
		$my_box = new custom_metabox($meta_box);
	}
	elseif(in_array('page', $meta_box['pages']) && in_array($template_file, $meta_box['template'])){ 
		/* if it's a page w/declared template */
		$my_box = new custom_metabox($meta_box);
	}

}




class custom_metabox {

	protected $_meta_box;

	function __construct($meta_box) {
		$this->_meta_box = $meta_box;
		add_action('admin_menu', array(&$this, 'add'));
		add_action('save_post', array(&$this, 'save'));
	}

	function add() {
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
			$post_type = get_post_type( $_GET['post'] );
			$meta = get_post_meta($post->ID, $field['id'], true);

			$placeholder = $field['placeholder'] ? : '';
			if($field['before']){echo $field['before'];}
			if($field['heading']){echo '<div class="row heading '.$post_type.'"><h2 class="heading">'.$field['heading'].'</h2><i class="fold"></i></div>';}
			echo '<div class="row '.$field['type'].' '.$post_type.'">';
			if($field['label']){echo '<div class="label"><label for="', $field['id'], '">', $field['label'], '</label></div>';}


			echo '<div class="input '.$field['type'].'">';
			switch ($field['type']) {
				case 'text':
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" placeholder="'.$placeholder.'" value="', esc_textarea($meta ? $meta : $field['std']), '" size="30" />';
				if($field['hint']){
					echo '<br /><span class="hint">', $field['hint'], '</span>';
				}
				break;

				case 'date':
				echo '<input type="date" name="', $field['id'], '" id="', $field['id'], '" value="', esc_textarea($meta ? $meta : $field['std']), '" size="30" />';
				if($field['hint']){
					echo '<br /><span class="hint">', $field['hint'], '</span>';
				}
				break;

				case 'hidden':
				echo '<input type="hidden" name="', $field['id'], '" id="', $field['id'], '" value="', esc_textarea($meta ? $meta : $field['std']), '" size="30" />';
				if($field['hint']){
					echo '<br /><span class="hint">', $field['hint'], '</span>';
				}
				break;

				case 'textarea':
				echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:100%" placeholder="'.$placeholder.'">', esc_textarea($meta ? $meta : $field['std']), '</textarea>';
				if($field['hint']){
					echo '<br /><span class="hint">', $field['hint'], '</span>';
				}
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


				case 'other':
				echo $field['other'];
				if($field['hint']){
					echo '<span class="hint">', $field['hint'], '</span>';
				}
				break;


				case 'image':
				if($field['btntxt']){
					$btntxt = $field['btntxt'];
				}
				else{
					$btntxt = 'Add '.$field['type'];
				}
				$ids = get_post_meta($post->ID, $field['id'], true);
				?>
				<a class="<?=$field['type'];?> add button" data-uploader-title="<?=$btntxt;?>" data-uploader-button-text="<?=$btntxt;?>" data-fieldID="<?=$field['id'];?>"><?=$btntxt;?></a>
				<div class="imagehere">
					<?php 
					if ($ids) : foreach ($ids as $key => $value) : $image = wp_get_attachment_image_src($value, 'full'); ?>
						<div class="index index[<?=$key;?>]" data-fieldID="<?=$field['id'];?>">						
							<img src="<?=$image[0];?>">
							<div class="controls">
								<a class="change" data-id="<?=$field['id'];?>"></a>
								<a class="remove" data-id="<?=$field['id'];?>"></a>
							</div>
							<input class="imageIDhere" type="text" name="<?=$field['id'];?>[<?=$key;?>]" value="<?=$value;?>">

						</div>




						<?php

					endforeach;?>

				<?php endif;?>


				<span style="width:100%;"><?=$field['hint'];?></span>
			</div>
			<?php break;



			case 'video':
			if($field['btntxt']){
				$btntxt = $field['btntxt'];
			}
			else{
				$btntxt = 'Add '.$field['type'];
			}
			$ids = get_post_meta($post->ID, $field['id'], true);
			?>
			<a class="<?=$field['type'];?> add button" data-uploader-title="<?=$btntxt;?>" data-uploader-button-text="<?=$btntxt;?>" data-fieldID="<?=$field['id'];?>"><?=$btntxt;?></a>
			<div class="imagehere">
				<?php 
				if ($ids) : foreach ($ids as $key => $value) : $image = wp_get_attachment_image_src($value, 'full'); ?>
					<div class="index index[<?=$key;?>]" data-fieldID="<?=$field['id'];?>">


						<video autoplay loop class="fullvideo">
							<source src="<?=wp_get_attachment_url($value);?>" type="video/mp4" />
							</video>
							<div class="videocontrols">
								<a class="playpause" data-id="<?=$field['id'];?>"></a>
							</div>

							<div class="controls">
								<a class="change" data-id="<?=$field['id'];?>"></a>
								<a class="remove" data-id="<?=$field['id'];?>"></a>
							</div>
							<input class="imageIDhere" type="text" name="<?=$field['id'];?>[<?=$key;?>]" value="<?=$value;?>">

						</div>




						<?php

					endforeach;?>

				<?php endif;?>


				<span style="width:100%;"><?=$field['hint'];?></span>
			</div>
			<?php break;



			case 'media' || 'icons' || 'logos' || 'dforce':
			if($field['btntxt']){
				$btntxt = $field['btntxt'];
			}
			else{
				$btntxt = 'Add '.$field['type'];
			}
			$ids = get_post_meta($post->ID, $field['id'], true);

			// $myvals = get_post_meta($post->ID, false);
			// foreach($myvals as $key=>$val){
			// 	echo $key . ' - ' . $val[0] . '<br>';
			// }

			?>
			<a class="<?=$field['type'];?> add button" data-uploader-title="<?=$btntxt;?>" data-uploader-button-text="<?=$btntxt;?>" data-fieldID="<?=$field['id'];?>"><?=$btntxt;?></a>
			<div class="imagehere">
				<?php 
				if ($ids) : foreach ($ids as $key => $value) : $image = wp_get_attachment_image_src($value, 'full'); ?>
					<div class="index index[<?=$key;?>]" data-fieldID="<?=$field['id'];?>">

						<?php if ($field['type'] == 'video'):?>
							<video autoplay loop class="fullvideo">
								<source src="<?=wp_get_attachment_url($value);?>" type="video/mp4" />
								</video>
								<div class="videocontrols">
									<a class="playpause" data-id="<?=$field['id'];?>"></a>
								</div>
								<?php else:?>
									<img src="<?=$image[0];?>" style="background-color:rgba(0,0,0,.1);">
								<?php endif;?>
								<div class="controls">
									<a class="change" data-id="<?=$field['id'];?>"></a>
									<a class="remove" data-id="<?=$field['id'];?>"></a>
								</div>

								<input class="imageIDhere" type="text" name="<?=$field['id'];?>[<?=$key;?>]" value="<?=$value;?>">
							</div>




						<?php endforeach; endif;?>


						<span class="hint" style="width:100%;"><?=$field['desc'];?></span>
					</div>
					<?php break;




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


