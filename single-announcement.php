<?php
	/**
	 * @package WordPress
	 * @subpackage CloudCraze
	 */

	update_option('current_page_template','single');
	?>

	<?php include ("includes/page.header.php") ?>
	<?php include ("includes/page.banner.php") ?>

	<!-- Begin Template: single.php  -->
	<?php $postType = get_post_type(get_the_ID());?>
	<div class="content">

		<div class="section full maincontent">
			<div class="wrapper small">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php if(!$ban_image_id){ ?>
					<h1 class="pagetitle"><?php the_title(); ?></h1>
					<?php }?>
					<?php if($postType == 'announcement') {?><p><?php the_date('M d, Y', '', ''); ?></p><?php } ?>
					<?php the_content(__('')); ?>

					<div class="social_share">
						<?php
						$summary = get_the_excerpt();
						$summary = urlencode ( $summary );
						$title = get_the_title();
						$title = urlencode ( $title );
						$source = get_bloginfo('name');
						$source = urlencode ( $source );
						$permalink = get_permalink();
						?>
						<div class="socialshare">
							<div class="label">Share this Article: </div><!-- end label -->
							<a class='facebook' href='https://www.facebook.com/sharer/sharer.php?u=<?=$permalink ?>' target='_blank' alt="Share on Facebook"><?=svg('#'.'Facebook',1,0,0);?></a>
							<a class='twitter' href='https://twitter.com/intent/tweet?source=webclient&amp;text=<?php the_title(); ?> <?php the_permalink() ?>' target='_blank'><?=svg('#'.'Twitter',1,0,0);?></a>
							<a class='linkedin' href='http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink() ?>&amp;title=<?=$title?>&amp;summary=<?=$summary?>&amp;source=<?=$source?>' target='_blank'><?=svg('#'.'LinkedIn',1,0,0);?></a>
						</div>
					</div>

				<?php endwhile; else: endif; ?>
			</div>  <!-- END .section full maincontent -->
		</div>  <!-- END .wrapper -->

		<?php if($meta['events_options_form'][0] && $meta['events_options_form'][0] != 'none'){ ?>
		<div class="section full centered">
			<div class="wrapper">
				<?php if($meta['events_options_formheading'][0]){ ?><h2 class="sectiontitle"><?=$meta['events_options_formheading'][0]?></h2><?php } ?>
				<?php if($meta['events_options_formblurb'][0]){ ?><p class="intro"><?php echo htmlspecialchars_decode($meta['events_options_formblurb'][0]);?></p><?php } ?>
				<div class="formwrap">
					<?php
					$args = array();
					if($meta['events_options_redirect'][0]) $args['redirect'] = $meta['events_options_redirect'][0];
					if($meta['events_options_source'][0]) $args['lead_source'] = $meta['events_options_source'][0];
					?>
					<?=getForm($meta['events_options_form'][0],$args)?>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<?php } ?>

		<div class="section related-content full white centered">
			<div class="wrapper">
				<?php
				$postType = get_post_type(get_the_ID());

				$name = get_post_type_object($postType);
				$name = $name->labels->name;
				?>
				<h2 class="sectiontitle">More <?=$name?></h2>
				<?php

				$args = array(
					'titlecount'    => 40,
					'class'         => 'fourths',
					'image'		    => 'thumb',
					'desc' 			=> false,
					'postclass'		=> 'post',
					'date' 			=> true,
					'args' 			=> array(
						'post__not_in' => array(get_the_ID()),
						'posts_per_page' => 4,
						'post_type' => 'announcement',
						)
					);
				echo buildLoop($args);
				?>
				<a class="button center" href="<?php echo get_post_type_archive_link($postType); ?>">View All <?=$name?></a>
			</div> <!-- END wrapper -->
		</div> <!-- END section related-content full graylt -->

	</div>  <!-- END #content -->


	<!-- End Template: single.php  -->


	<?php include ("includes/page.footer.php") ?>