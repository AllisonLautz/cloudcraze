<?php
/**
 * @package WordPress
 * @subpackage CloudCraze
 */
update_option('current_page_template','single-thank-you');
?>

<?php include ("includes/page.header.php") ?>

<?php
if($_GET['rid']){
	$rid = $_GET['rid'];

	$postType = get_post_type($rid);

	if($postType == 'resource'){
		$category = get_post_meta($rid, 'resource_options_ga_category',true);
		$action = get_post_meta($rid, 'resource_options_ga_action',true);
		$label = get_post_meta($rid, 'resource_options_ga_label',true);
	}elseif($postType == 'info'){
		$category = get_post_meta($rid, 'landing_sidebar_ga_category',true);
		$action = get_post_meta($rid, 'landing_sidebar_ga_action',true);
		$label = get_post_meta($rid, 'landing_sidebar_ga_label',true);
	}

}else{
	$category = get_post_meta(get_the_ID(), 'thank_options_ga_category',true);
	$action = get_post_meta(get_the_ID(), 'thank_options_ga_action',true);
	$label = get_post_meta(get_the_ID(), 'thank_options_ga_label',true);
}

echo "<script> ga('send', 'event', '".$category."', '".$action."', '".$label."');</script>";
?>

<!-- Begin Template: single-thank-you.php  -->

<div class="content">
	<div class="section full text graylt centered">
		<div class="wrapper">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php if(!$ban_image_id){ ?>
				<h1 class="pagetitle"><?php the_title(); ?></h1>
				<?php }?>
				<?php the_content(__('')); ?>
			<?php endwhile; else: endif; ?>
		</div>  <!-- END .wrapper -->
	</div>  <!-- END .section full text -->
</div>  <!-- END #content -->
<script>
</script>

<?php include ('includes/page.related-content.php'); ?>

<!-- End Template: single-thank-you.php  -->

<?php include ("includes/page.footer.php") ?>
<script>
	var url = window.location.href;
	var referrer =  document.referrer;
	if (referrer.indexOf("go.pardot.com") > 0) {
		var asset = jQuery('.content').find('a.button').attr('href');
		if (asset.length == 0 || asset.indexOf('wp-content') == 0) {
			asset = url;
		} else {
			if (asset.indexOf('cloudcraze.com') == 0) {
				asset = 'https://www.cloudcraze.com' + asset;
			}
		}
		ga('send', 'event', 'Form', 'Submission', asset);
	}
</script>
