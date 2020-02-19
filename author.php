<?php
/**
 * @package WordPress
 * @subpackage CloudCraze
 */

update_option('current_page_template','author');
$pageid = get_option( 'page_for_posts');

?>

<?php include ("includes/page.header.php") ?>

<!-- Begin Template: author.php  -->

<div class="content">
	<div class="wrapper small">
		<div class="section full maincontent">
			<div class="subsection full text">
				<h1 class="pagetitle">Posts by <?php the_author_meta( 'display_name', $aid ); ?></h1>
				<?php
								//crop description length
				$desc = get_the_author_meta( 'description' );
				$descLen = strlen($desc);
				?>
				<div class="exc"><p><?php echo nl2br($desc) ?></p></div>

				<div class="social">
					<?php
					$facebook = get_the_author_meta('facebook'); if($facebook) echo "<a class='facebook' href='".$facebook."' target='_blank'></a>";
					$twitter = get_the_author_meta('twitter'); if($twitter) echo "<a class='twitter' href='".$twitter."' target='_blank'></a>";
					?><a class='rss' href='<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>/feed/' target='_blank'></a><?php
					$linkedin = get_the_author_meta('linkedin'); if($linkedin) echo "<a class='linkedin' href='".$linkedin."' target='_blank'></a>";
					$google = get_the_author_meta('googleplus'); if($google) echo "<a class='google' rel='author' href='".$google."' target='_blank'></a>";
					$website = get_the_author_meta('website'); if($website) echo "<a class='website' href='".$website."' target='_blank'></a>";
					?>
				</div>
			</div>  <!-- END .section full maincontent -->

			
			<div class="postwrap posts full">
				<?php
				$i=1;
				if (have_posts()) : while (have_posts()) : the_post();
					$perma = get_permalink($post->ID);
					?>

					<div class="post post<?=$i?>"><div class='feat'>
						<?php if ( has_post_thumbnail() ) {
							echo "<a href='".$perma."' >";
							the_post_thumbnail('page-width-narrow');
							echo '</a>';
						}?></div>
						<div class="content">
							<h2><a href="<?=$perma ?>" ><?php the_title(); ?></a></h2>
							<p>Written by  <?php the_author_meta( 'display_name', $aid ); ?> | <?php the_date('M d, Y', '', ''); ?></p>
							<p><?php echo get_the_excerpt() ?></p>
							<a class="readmore" href="<?=$perma ?>" >Read More</a>
						</div>
					</div> <!--END post post<?=$i?> -->

					<?php
					$i++;
				endwhile;
			endif;
			?>
			<?php 	global $wp_query;
						$big = 999999999; // need an unlikely integer
						$pagination = paginate_links( array(
							'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
							'format' => '?paged=%#%',
							'current' => max( 1, get_query_var('paged') ),
							'total' => $wp_query->max_num_pages,
							'type' => 'array'
						) );
						if($pagination){
							echo "<div class='section full pagination'>";
							foreach ($pagination as $page) {
								echo $page;
							}
							echo "</div><!-- section full pagination -->";
						}
						?>
					</div>  <!-- END postwrap posts full -->
				</div>  <!-- END .section threequarter -->
				<div class="section onequarter right sidebar">
					<div class="full widgets list">
					</div>  <!-- END .section -->
				</div>  <!-- END .section onequarter -->
			</div>  <!-- END .wrapper -->

		</div>  <!-- END #content -->


		<!-- End Template: author.php  -->

		<?php include ("includes/page.footer.php") ?>
