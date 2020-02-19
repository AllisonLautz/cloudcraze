
<?php 




$args = array( 
	'post_type'      => 'events',
	// 'orderby'	=> 'date', 
	'meta_key' => 'pardot_form_expire_date', 
	'orderby' => 'meta_value',
	'order'		=> 'ASC',
	'posts_per_page' => -1,
	'post_status'	=>	'publish',
);
$query = new WP_Query( $args );

if($query->have_posts()):
	$found = $query->found_posts; 	?>
	<?php while( $query->have_posts() ) : $query->the_post();?>
		<?php
		$today = date("Y-m-d");
		$date = get_post_meta(get_the_ID(), 'pardot_form_date', true);
		$datexpire = get_post_meta(get_the_ID(), 'pardot_form_expire_date', true);

	endwhile; 
	if(strtotime($today) - strtotime($datexpire) <= 0):?>

	<div class="section white events">
		<div class="wrapper animate">
			<h2 class="sectiontitle center">Events</h2>
			<div class="posts list event flex">

				<?php while( $query->have_posts() ) : $query->the_post();?>


					<?php

					$img = get_the_post_thumbnail_url(get_the_ID(), 'banner-large');

					$id = get_the_ID();
					if(get_post_thumbnail_id()){
						$featimage = wp_get_attachment_image_src(get_post_thumbnail_id($id),'medium_large', true)[0];
					}
					else{
						$featimage = get_template_directory_uri().'/img/resource_texture.png';
					}

					




					echo ' <div class="post events '.$class.'">
					<a class="flex" href="'.get_the_permalink().'">
					<div class="bgimg" style="background-image:url('.$featimage.');"></div>
					<div class="content">
					<p class="label-small">'.$date.'</p>
					<h3 class="large-light">'.trimString(get_the_title(get_the_ID()),70).'</h3>';




					echo '</div>
					</a>';
			// echo '<small style="display:block; margin:0; font-size:.9em;">datexpire: '.$datexpire.', '.strtotime($datexpire).'</small>';
			// echo '<small style="display:block; margin:0; font-size:.9em;">date: '.$date.', '.strtotime($date).'</small>';
			// echo '<small style="display:block; margin:0; font-size:.9em;">today: '.$today.' , '.strtotime($today).'</small>';
			// echo '<small style="display:block; margin:0; font-size:.9em;">'.strtotime($today) - strtotime($datexpire).'</small>';
					echo '</div>';


					endwhile;?>
				</div>
				<div class="buttonwrap">
					<a class="button" href="<?php echo get_post_type_archive_link('events'); ?>">View All Events</a>
				</div>

			</div>
		</div>

		<?php 
	endif;
endif;
wp_reset_postdata();




?>

