<?php /**
 * @package WordPress
 * @subpackage CloudCraze
 * Template Name:Archive Events
 */

update_option('current_page_template','archive-events');
include ("includes/page.header.php");

$connected = 'featured-event';
@include locate_template('template-parts/section-title.php');
// @include locate_template('template-parts/upcoming-events.php');


$post_type = 'events';

$today = date("Y-m-d");
$end = date('Y-m-d', strtotime('-1 years'));
$args = array( 
	'post_type'      => 'events',
	'orderby'	=>	'meta_value',
	'order'		=> 'ASC',
	'posts_per_page' =>	-1,
	'paged'	=>	false,
	'post_status'	=>	'publish',
	'meta_query' => array(
		'relation' => 'AND',
		'greater_equal_today' => array(
			'key' => 'pardot_form_expire_date',
			'value' => $today,
			'compare'	=>	'>=',
		),
		'not_empty' => array(
			'key' => 'pardot_form_expire_date',
			'value' => '',
			'compare'	=>	'NOT IN',
		), 
	),
);
$title = 'Upcoming events';
$max = 2;
$excerpt = false;
$color = 'graylt';

@include locate_template('template-parts/section-posts.php');



$args = array(

	'post_type'      => 'events',
	'orderby'	=>	'meta_value',
	'order'		=> 'DEC',
	'posts_per_page' => 8,
	'post_status'	=>	'publish',
	'meta_query' => array(
		'relation' => 'AND',
		'greater_equal_today' => array(
			'key' => 'pardot_form_expire_date',
			'value' => $today,
			'compare'	=>	'<',
		),
		'not_empty' => array(
			'key' => 'pardot_form_expire_date',
			'value' => '',
			'compare'	=>	'NOT IN',
		), 

		'under_year_old' => array(
			'key' => 'pardot_form_expire_date',
			'value' => $end,
			'compare'	=>	'>=',
		), 

	),

);


$title = 'Past events';
$max = 4;
// $alt = 'none';
$loadmore = 8;
$loadmoreText = 'More Past Events';
$class = ' isotope';
$color = 'white';

@include locate_template('template-parts/section-posts.php');
// @include locate_template('template-parts/past-events.php');


?>




<?php include ("includes/page.footer.php") ?>