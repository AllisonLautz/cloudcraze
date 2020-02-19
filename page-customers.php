<?php
/**
 * @package WordPress
 * @subpackage CloudCraze
 * Template Name:Archive Customers
 */
update_option('current_page_template','page-customers');
?>

<?php include ("includes/page.header.php") ?>


<?php @include locate_template('template-parts/section-title.php'); ?>

<!-- Begin Template: page-customers.php  -->

<div class="section content graylt">
	<div class="wrapper small">
		



		<?php
		$array = array();
		$args = array( 
			'post_type' => array('customer'),
			'order'	=>	'ASC',
			'orderby'        => 'menu_order',
			'posts_per_page' => -1,
			'post_status'	=>	'publish',

		);

		$query = new WP_Query( $args );
		if( $query->have_posts() ):	?>

		<div class="inputwrap">
			<h3 data-text="Filter By Industry">Filter By Industry</h3>
			<?//=svg('#arrow-down',1,0,'arrow')?>
			<ul class="filter">
				<li class="default h3"><span>All Customers</span>
					<li class="default"><span>Industry</span>
						<ul class="industry type">
							<?php 

							while( $query->have_posts() ) : $query->the_post();
								$Ds[] = get_the_ID();
							endwhile;
							wp_reset_postdata();
							$connected = new WP_Query( array(
								'connected_type' => 'customers_industries',
								'connected_items' => $Ds,
								'nopaging' => true
							) );
							
							while ( $connected->have_posts() ) : $connected->the_post();
								$IDs[] = get_the_ID();
							endwhile;

							$arr = array_unique($IDs);
							
							wp_reset_postdata();


							foreach($arr as $key=>$val){
								echo '<li class="'.str_replace(' ', '-', strtolower(get_the_title($val))).'">'.get_the_title($val).'</li>';
							}

							?>
						</ul>
					</li>
				</li>

			</ul>
		</div>
	</div>


	<div class="wrapper">
		<div class="section filter cards customers halfpad nobottom">

			<?php


			while ($query->have_posts()) : $query->the_post();
				global $id;
				$ids[] = $query->post->ID;	

			endwhile;


			$n = count($ids);
			for ($i = 0; $i < $n; $i++) :
				$id = $ids[$i];
				/* this way every 3rd item can have class wide */

				if(get_the_post_thumbnail_url($id, 'large')){
					$img = get_the_post_thumbnail_url($id, 'large');
				}
				else{
					$img = get_template_directory_uri().'/img/resource_texture.png';
				}

				if(get_post_meta($id, 'customer_options_logo', true)){
					$logos = get_post_meta($id, 'customer_options_logo', true);

					foreach($logos as $key=>$val):
						$logo = wp_get_attachment_image_src($val, 'large', true);
					endforeach;		
				}
				else{
					$logo = '';
				}

				echo '<div class="card';
				
				if(is_int($i/9)){
					echo ' wide';
				}

				if (get_post_meta($id, 'customer_options_disable', true) == 'on'){
					echo ' nolink';
				}

				echo p2pBuild('customers_industries', $id);

				$id = $ids[$i];

				echo '">';

				?>
				<div class="logocontainer">
					<img class="customerlogo" src="<?=$logo[0];?>">
				</div>
				<?php if (get_post_meta($id, 'customer_options_disable', true) !== 'on'){
					echo '<a href="'.get_the_permalink($id).'">';
				}?>
				<div class="bgimg" style="background-image:url(<?=$img;?>);"></div>
				<div class="content">
					
					<h3 class="large-light"><?=get_the_title($id);?></h3>
					<p class="readmore">View Customer Story</p>
				</div>
				<?php if (get_post_meta($id, 'customer_options_disable', true) !== 'on'){
					echo '</a>';
				}?>
			</div>



		<?php endfor; ?>

	</div>
</div>

</div>
<?php endif; wp_reset_postdata();?>





<!-- End Template: page-client.php  -->


<?php include ("includes/page.footer.php"); ?>
