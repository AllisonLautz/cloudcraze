<?php
/**
 * @package WordPress
 * @subpackage CloudCraze
 * Template Name:Page Careers
 */
update_option('current_page_template','page-careers');
include ("includes/page.header.php");
@include locate_template('template-parts/section-title.php');
?>


<!-- Begin Template: page-careers.php  -->

<div class="content">
	<div class="wrapper small">
		<div class="section full text">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php if(!$ban_image_id){ ?>
				<h1 class="pagetitle"><?php the_title(); ?></h1>
				<?php }?>
				<?php the_content(__('')); ?>
			<?php endwhile; else: endif; ?>
		</div>  <!-- END .section full text -->

		<div class="jv-careersite" data-careersite="cloudcraze"></div>

		<script src="https://d137jyf8bmrjar.cloudfront.net/__assets__/scripts/careersite/public/iframe.js"></script>
	</div>  <!-- END .wrapper -->
</div>  <!-- END #content -->

<?php include ("includes/page.footer.php") ?>