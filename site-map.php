<?php
/**
 * @package WordPress
 * @subpackage CloudCraze
 * Template Name:Site Map
 */

update_option('current_page_template','sitemap');
?>

<?php include ("includes/page.header.php") ?>

<!-- Begin Template: site-map.php  -->

<div class="content graylt">
	<div class="wrapper">


		<div class="section threequarter left maincontent">
			<h1>Site Map</h1>
			<ul class="sitemap">
				<?php wp_list_pages(

					array(
						'depth'        => 0,
						'show_date'    => '',
						'date_format'  => get_option( 'date_format' ),
						'child_of'     => 0,
						'exclude'      => '',
						'title_li'     => __( '' ),
						'echo'         => 1,
						'authors'      => '',
						'sort_column'  => 'menu_order, post_title',
						'link_before'  => '',
						'link_after'   => '',
						'item_spacing' => 'preserve',
						'walker'       => '',
					)
				);
				?>

			</ul>



			<?php 

			$args = array( 
				'post_type' => array('customer','events','industry', 'news', 'post','resource','solution','team','testimonials'),
				'labels'	=>	array('Customers','Events','Industries', 'News', 'Posts','Resources','Solutions','Team Members','Testimonials'),
				'order'	=>	'ASC',
				'orderby'        => 'title',
				'posts_per_page' => -1,
				'post_status'	=>	'publish',


			);

			$query = new WP_Query( $args );
			if( $query->have_posts() ){
				for($i = 0; $i < count($args['post_type']) -1 ; $i++){
					$types = $args['post_type'][$i];
					$labels = $args['labels'][$i];
					$li = '<ul class="posttype"><li>'.$labels . '<ul>';
					echo $li;
					while( $query->have_posts() ){
						$query->the_post();
						$filter = array_search(get_post_type(), $args['post_type']); // find position of post type in above array

						if($filter == $i){ // display only posts of that type
							echo '<li><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>';
						}

					}
					echo '</ul></li></ul>';
				}
				wp_reset_postdata();
			}?>




		</div>  <!-- END .section threequarter -->
		<div class="section onequarter right sidebar">
			<div class="full searchtool">
				<h2>Search Website:</h2>
				<form class="search" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
					<div class="fieldwrap input"><label>Search</label><input type="text" value="" name="s" id="s" placeholder="Search for..." /></div>
					<div class="fieldwrap submit"><input type="submit" value="search"></div>
				</form>
			</div>  <!-- END .section -->
		</div>  <!-- END .section onequarter -->

	</div>  <!-- END .wrapper -->

</div>  <!-- END #content -->

<!-- End Template: site-map.php  -->

<?php include ("includes/page.footer.php") ?>
