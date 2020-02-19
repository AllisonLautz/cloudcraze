<?php
/**
 * @package WordPress
 * @subpackage CloudCraze
 */

update_option('current_page_template','single-team');
?>

<?php include ("includes/page.header.php") ?>

<!-- Begin Template: single-team.php  -->

<div class="content">
	<div class="wrapper">

		<div class="section onequarter left sidebar">
			<div class="full widgets list">
				<div class="widget widget_text">
					<?php if ( has_post_thumbnail() ) { the_post_thumbnail('profile', array('class' => 'aligncenter'));}?>
				</div>
			</div>  <!-- END .section -->
		</div>  <!-- END .section onequarter -->

		<div class="section twothird right maincontent">
			<div class="subsection full text">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<h1 class="pagetitle"><?php the_title(); ?></h1>
					<?php if($meta['team_options_position'][0]) echo '<p class="contact position">'.$meta['team_options_position'][0].'</p>'; ?>
					<?php if($meta['team_options_email'][0]) echo '<p class="contact email">'.$meta['team_options_email'][0].'</p>'; ?>
					<?php if($meta['team_options_phone'][0]) echo '<p class="contact phone">'.$meta['team_options_phone'][0].'</p>'; ?>

					<?php the_content(__('')); ?>

				<?php endwhile; else: endif; ?>
			</div>  <!-- END .section full maincontent -->
		</div>  <!-- END .section threequarter -->
	</div>  <!-- END .wrapper -->

</div>  <!-- END #content -->

<!-- End Template: single.php  -->

<!-- End Template: single-team.php  -->


<?php include ("includes/page.footer.php") ?>
