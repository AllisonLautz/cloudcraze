<?php /**
 * @package WordPress
 * @subpackage CloudCraze
 * Template Name:Archive Webinars
 */

update_option('current_page_template','archive-webinars');
include ("includes/page.header.php");

$connected = 'featured-event';
@include locate_template('template-parts/section-title.php');


$post_type = 'resource';


$today = date("Y-m-d");
$end = date('Y-m-d', strtotime('-1 years'));
$args = array( 
	'post_type'      => 'resource',
	'orderby'	=>	'meta_value',
	'order'		=> 'ASC',
	'posts_per_page' =>	-1,
	'paged'	=>	false,
	'post_status'	=>	'publish',
	'tax_query'	=>	array(
		array(
			'taxonomy' => 'resource_types',
			'field'    => 'slug',
			'terms'    => array('webinar'),
			'operator' => 'IN',
		),
	),
	'meta_query' => array(
		// 'relation' => 'AND',
		'greater_equal_today' => array(
			'key' => 'pardot_form_expire_date',
			'value' => $today,
			'compare'	=>	'>=',
		),
		// 'not_empty' => array(
		// 	'key' => 'pardot_form_expire_date',
		// 	'value' => '',
		// 	'compare'	=>	'NOT IN',
		// ), 
	),
);
$title = 'Upcoming live webinars';
$max = 2;
$excerpt = false;
$color = 'graylt';
$button = 'Register Now';

@include locate_template('template-parts/section-posts.php');



$args = array(

	'post_type'      => 'resource',
	'orderby'	=>	'meta_value',
	'order'		=> 'DEC',
	'posts_per_page' => 8,
	'post_status'	=>	'publish',
	'tax_query'	=>	array(
		array(
			'taxonomy' => 'resource_types',
			'field'    => 'slug',
			'terms'    => array('webinar'),
			'operator' => 'IN',
		),
	),
	'meta_query' => array(
		'relation' => 'OR',
		'greater_equal_today' => array(
			'key' => 'pardot_form_expire_date',
			'value' => $today,
			'compare'	=>	'<',
		),
		'not_empty' => array(
			'key' => 'pardot_form_expire_date',
			'compare'	=>	'NOT EXISTS',
		), 
	),

);


$title = 'On demand webinars';
$max = 4;
$loadmore = 8;
$loadmoreText = 'More Webinars';
$class = ' isotope';
$color = 'white';
$button = 'View the Webinar';

@include locate_template('template-parts/section-posts.php');
// @include locate_template('template-parts/past-events.php');


?>




<?php include ("includes/page.footer.php") ?>