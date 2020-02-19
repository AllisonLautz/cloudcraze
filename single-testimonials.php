<?php
/**
 * @package WordPress
 * @subpackage CloudCraze
 */

update_option('current_page_template','single-resource');
?>

<?php include ("includes/page.header.php") ?>
<?php include ("includes/page.banner.php") ?>

<!-- Begin Template: single-resource.php  -->

<div class="content">
	<div class="wrapper">
		<div class="section twothird left maincontent">
			<div class="subsection full text">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php if(!$ban_image_id){ ?>
						<h1 class="pagetitle"><?php the_title(); ?></h1>
						<?php }?>

						<?php the_content(__('')); ?>

					<?php endwhile; else: endif; ?>
				</div>  <!-- END .section full maincontent -->
			</div>  <!-- END .section threequarter -->

			<div class="section onequarter right sidebar">
				<div class="full widgets list">

				</div>  <!-- END .section -->
			</div>  <!-- END .section onequarter -->
		</div>  <!-- END .wrapper -->

	</div>  <!-- END #content -->

	<!-- End Template: single-resource.php  -->


	<?php include ("includes/page.footer.php") ?>
