<?php /**
 * @package WordPress
 * @subpackage CloudCraze
 * Template Name:Archive News
 */

update_option('current_page_template','news');
include ("includes/page.header.php");


// $connected = 'featured-news';
@include locate_template('template-parts/section-title.php');

@include locate_template('template-parts/latest-news.php');


$post_type = 'news';
$excerpt = false;

$args = array( 
	'post_type'      => 'news',
	'orderby'	=>	'date',
	'order'		=> 'DEC',
	'posts_per_page' => -1,
	'post_status'	=>	'publish',
	'offset'	=>	3,
);




$title = 'More news';
$chars = 200;
$max = 1;
$class = ' isotope';
$loadmore = 10;
$loadmoreText = 'Load More News';
$color = 'white';
$share = true;

@include locate_template('template-parts/section-posts.php');
wp_reset_postdata();


?>




<?php include ("includes/page.footer.php") ?>