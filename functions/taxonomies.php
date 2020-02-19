<?php

// ------------------------------------------------------
// Add Custom Taxonomies
// ------------------------------------------------------



add_action( 'init', 'pagecat_taxonomy' );

function pagecat_taxonomy() {

	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Categories' ),
		'all_items'         => __( 'All Categories' ),
		'parent_item'       => __( 'Parent Category' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item'         => __( 'Edit Category' ),
		'update_item'       => __( 'Update Category' ),
		'add_new_item'      => __( 'Add New Category' ),
		'new_item_name'     => __( 'New Category Name' ),
		'menu_name'         => __( 'Categories' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'page_categories' ),
	);
	register_taxonomy( 'page_categories', array('page','ctas'), $args );
}

add_action( 'init', 'content_taxonomy' );

function content_taxonomy() {

	$labels = array(
		'name'              => _x( 'Content Tags', 'taxonomy general name' ),
		'singular_name'     => _x( 'Content Tag', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Content Tags' ),
		'all_items'         => __( 'All Content Tags' ),
		'parent_item'       => __( 'Parent Content Tag' ),
		'parent_item_colon' => __( 'Parent Content Tag:' ),
		'edit_item'         => __( 'Edit Content Tag' ),
		'update_item'       => __( 'Update Content Tag' ),
		'add_new_item'      => __( 'Add New Content Tag' ),
		'new_item_name'     => __( 'New Content Tag Name' ),
		'menu_name'         => __( 'Content Tags' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'content_tags' ),
	);
	register_taxonomy( 'content_tags', array( 'resource','page', 'ctas','testimonials','team','news', 'announcement', 'clients', ''), $args );
}

add_action( 'init', 'ctaType_taxonomy' );

function ctaType_taxonomy() {

	$labels = array(
		'name'              => _x( 'CTA Types', 'taxonomy general name' ),
		'singular_name'     => _x( 'CTA Type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search CTA Types' ),
		'all_items'         => __( 'All CTA Types' ),
		'parent_item'       => __( 'Parent CTA Type' ),
		'parent_item_colon' => __( 'Parent CTA Type:' ),
		'edit_item'         => __( 'Edit CTA Type' ),
		'update_item'       => __( 'Update CTA Type' ),
		'add_new_item'      => __( 'Add New CTA Type' ),
		'new_item_name'     => __( 'New CTA Type Name' ),
		'menu_name'         => __( 'CTA Types' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'ctaType_tags' ),
	);
	register_taxonomy( 'ctaType_tags', array('ctas',), $args );
}


add_action( 'init', 'resource_taxonomy' );

function resource_taxonomy() {

	$labels = array(
		'name'              => _x( 'Resource Types', 'taxonomy general name' ),
		'singular_name'     => _x( 'Resource Type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Resource Types' ),
		'all_items'         => __( 'All Resource Types' ),
		'parent_item'       => __( 'Parent Resource Type' ),
		'parent_item_colon' => __( 'Parent Resource Type:' ),
		'edit_item'         => __( 'Edit Resource Type' ),
		'update_item'       => __( 'Update Resource Type' ),
		'add_new_item'      => __( 'Add New Resource Type' ),
		'new_item_name'     => __( 'New Resource Type Name' ),
		'menu_name'         => __( 'Resource Types' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'resource_types' ),
	);
	register_taxonomy( 'resource_types', array( 'resource'), $args );
}



add_action( 'init', 'customers_taxonomy' );
function customers_taxonomy() {

	$labels = array(
		'name'              => _x( 'Customer', 'taxonomy general name' ),
		'singular_name'     => _x( 'Customer', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Customer' ),
		'all_items'         => __( 'All Customer' ),
		'parent_item'       => __( 'Parent Customer' ),
		'parent_item_colon' => __( 'Parent Customer:' ),
		'edit_item'         => __( 'Edit Customer' ),
		'update_item'       => __( 'Update Customer' ),
		'add_new_item'      => __( 'Add New Customer' ),
		'new_item_name'     => __( 'New Customer Name' ),
		'menu_name'         => __( 'Customer' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'customers' ),
	);
	register_taxonomy( 'customers', array( 'resource', 'news', '', 'landing_post'), $args );
}


add_action( 'init', 'industry_taxonomy' );
function industry_taxonomy() {

	$labels = array(
		'name'              => _x( 'Industry', 'taxonomy general name' ),
		'singular_name'     => _x( 'Industry', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Industry' ),
		'all_items'         => __( 'All Industry' ),
		'parent_item'       => __( 'Parent Industry' ),
		'parent_item_colon' => __( 'Parent Industry:' ),
		'edit_item'         => __( 'Edit Industry' ),
		'update_item'       => __( 'Update Industry' ),
		'add_new_item'      => __( 'Add New Industry' ),
		'new_item_name'     => __( 'New Industry Name' ),
		'menu_name'         => __( 'Industry' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'industry' ),
	);
	register_taxonomy( 'industry', array( 'customer', 'resource'), $args );
}




add_action( 'init', 'clients_taxonomy' );

function clients_taxonomy() {

	$labels = array(
		'name'              => _x( 'Logos Types', 'taxonomy general name' ),
		'singular_name'     => _x( 'Logos Type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Logos Types' ),
		'all_items'         => __( 'All Logos Types' ),
		'parent_item'       => __( 'Parent Logos Type' ),
		'parent_item_colon' => __( 'Parent Logos Type:' ),
		'edit_item'         => __( 'Edit Logos Type' ),
		'update_item'       => __( 'Update Logos Type' ),
		'add_new_item'      => __( 'Add New Logos Type' ),
		'new_item_name'     => __( 'New Logos Type Name' ),
		'menu_name'         => __( 'Logos Types' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'client_types' ),
	);
	register_taxonomy( 'client_types', array( 'clients'), $args );
}


add_action( 'init', 'events_taxonomy' );

function events_taxonomy() {

	$labels = array(
		'name'              => _x( 'Event Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Event Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Event Categories' ),
		'all_items'         => __( 'All Event Categories' ),
		'parent_item'       => __( 'Parent Event Category' ),
		'parent_item_colon' => __( 'Parent Event Category:' ),
		'edit_item'         => __( 'Edit Event Category' ),
		'update_item'       => __( 'Update Event Category' ),
		'add_new_item'      => __( 'Add New Event Category' ),
		'new_item_name'     => __( 'New Event Category Name' ),
		'menu_name'         => __( 'Event Categories' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'event_types' ),
	);
	register_taxonomy( 'event_types', array( 'events'), $args );
}


add_action( 'init', 'team_taxonomy' );

function team_taxonomy() {

	$labels = array(
		'name'              => _x( 'Team Roles', 'taxonomy general name' ),
		'singular_name'     => _x( 'Team Role', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Team Roles' ),
		'all_items'         => __( 'All Team Roles' ),
		'parent_item'       => __( 'Parent Team Role' ),
		'parent_item_colon' => __( 'Parent Team Role:' ),
		'edit_item'         => __( 'Edit Team Role' ),
		'update_item'       => __( 'Update Team Role' ),
		'add_new_item'      => __( 'Add New Team Role' ),
		'new_item_name'     => __( 'New Team Role Name' ),
		'menu_name'         => __( 'Team Roles' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array('slug' => 'team_roles'),
	);
	register_taxonomy( 'team_roles', array('team'), $args );
}
add_action( 'init', 'team_taxonomy' );

function career_taxonomy() {

	$labels = array(
		'name'              => _x( 'Career Types', 'taxonomy general name' ),
		'singular_name'     => _x( 'Career Type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Career Types' ),
		'all_items'         => __( 'All Career Types' ),
		'parent_item'       => __( 'Parent Career Type' ),
		'parent_item_colon' => __( 'Parent Career Type:' ),
		'edit_item'         => __( 'Edit Career Type' ),
		'update_item'       => __( 'Update Career Type' ),
		'add_new_item'      => __( 'Add New Career Type' ),
		'new_item_name'     => __( 'New Career Type Name' ),
		'menu_name'         => __( 'Career Types' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array('slug' => 'career_types'),
	);
	register_taxonomy( 'career_types', array('careers'), $args );
}
add_action( 'init', 'career_taxonomy' );


/* AML: News Taxonomy */

add_action( 'init', 'news_taxonomy' );

function news_taxonomy() {

	$labels = array(
		'name'              => _x( 'News Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'News Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search News Categories' ),
		'all_items'         => __( 'All News Categories' ),
		'parent_item'       => __( 'Parent News Category' ),
		'parent_item_colon' => __( 'Parent News Category:' ),
		'edit_item'         => __( 'Edit News Category' ),
		'update_item'       => __( 'Update News Category' ),
		'add_new_item'      => __( 'Add New News Category' ),
		'new_item_name'     => __( 'New News Category Name' ),
		'menu_name'         => __( 'News Categories' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'news_types' ),
	);
	register_taxonomy( 'news_types', array( 'news'), $args );
}

/* AML: Announcement Taxonomy */

add_action( 'init', 'announcement_taxonomy' );

function announcement_taxonomy() {

	$labels = array(
		'name'              => _x( 'Announcement Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Announcement Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Announcement Categories' ),
		'all_items'         => __( 'All Announcement Categories' ),
		'parent_item'       => __( 'Parent Announcement Category' ),
		'parent_item_colon' => __( 'Parent Announcement Category:' ),
		'edit_item'         => __( 'Edit Announcement Category' ),
		'update_item'       => __( 'Update Announcement Category' ),
		'add_new_item'      => __( 'Add New Announcement Category' ),
		'new_item_name'     => __( 'New Announcement Category Name' ),
		'menu_name'         => __( 'Announcement Categories' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'announcement_types' ),
	);
	register_taxonomy( 'announcement_types', array( 'announcement'), $args );
}




/* AML: Blog Filter Taxonomy */

add_action( 'init', 'blog_filter_taxonomy' );

function blog_filter_taxonomy() {

	$labels = array(
		'name'              => _x( 'Blog Filter Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Blog Filter Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Blog Filter Categories' ),
		'all_items'         => __( 'All Blog Filter Categories' ),
		'parent_item'       => __( 'Parent Blog Filter Category' ),
		'parent_item_colon' => __( 'Parent Blog Filter Category:' ),
		'edit_item'         => __( 'Edit Blog Filter Category' ),
		'update_item'       => __( 'Update Blog Filter Category' ),
		'add_new_item'      => __( 'Add New Blog Filter Category' ),
		'new_item_name'     => __( 'New Blog Filter Category Name' ),
		'menu_name'         => __( 'Blog Filter Categories' ),
	);

	$args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'blog_filter' ),
	);
	register_taxonomy( 'blog_filter', array( 'post'), $args );
}
