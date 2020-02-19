<div class="section cards customers<?=$color;?>">
	<div class="wrapper animate">
		<?php 
		if($intro){
			echo $intro;
		}
		else{
			echo '
			<div class="content center">
			<h2 class="sectiontitle">Related customer stories</h2>
			<p class="intro">CloudCraze powers commerce solutions for a growing list of the world’s most recognizable brands.</p>
			</div>';
		}?>
	</div>
	<div class="wrapper animate">
		<div class="row customers cards">		

			<?php 




			$args = array( 
				'connected_type' => $fn,
				'connected_items' => $post->ID,
				'posts_per_page' => 4,
				'post_status'	=>	'publish',
			);


		// $args_fallback = array( 
		// 	'post_type' => 'customer',
		// 	'order'          => 'ASC',
		// 	'orderby'        => 'menu_order',
		// 	'posts_per_page' => 4,
		// 	'post_status'	=>	'publish',

		// 	'tax_query' => array(
		// 		array(
		// 			'taxonomy' => 'industry',
		// 			'field' => 'slug',
		// 			'terms' => get_the_title(),
		// 		),
		// 	)
		// );

		// if((new WP_Query($args))->have_posts()){
			$query = new WP_Query( $args );
		// }
		// else{
		// 	$query = new WP_Query( $args_fallback );
		// }
			if($query->have_posts()):
				$found = $query->found_posts; 

				?>

				



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



					if(get_post_meta(get_the_ID(), 'customer_options_logo', true)){
						$logos = get_post_meta(get_the_ID(), 'customer_options_logo', true);
						foreach($logos as $key=>$val):
							$logo = wp_get_attachment_image_src($val, 'large', true);
						endforeach;		
					}
					else{
						$logo = '';
					}



					echo '<div class="card';					
					if (get_post_meta($id, 'customer_options_disable', true) == 'on'){
						echo ' nolink';
					}
					echo '">';
					?>

					<div class="logocontainer">
						<img class="customerlogo" src="<?=$logo[0];?>">
					</div>
					<?php if (get_post_meta($id, 'customer_options_disable', true) !== 'on'){
						echo '<a href="'.get_the_permalink(get_the_ID()).'">';
					}?>
					<div class="bgimg" style="background-image:url(<?=$featimage;?>);"></div>
					<div class="content">
						<h3 class="large-light"><?=get_the_title();?></h3>
						<p class="readmore">View Customer Story</p>
					</div>
					<?php if (get_post_meta($id, 'customer_options_disable', true) !== 'on'){
						echo '</a>';
					}?>
				</div>

			<?php endwhile;?>

			<?php 
		endif;
		wp_reset_postdata();

		if(4 - $found > 0){
			$n = 4 - $found;
			// echo $n;
			$args2 = array( 
				'post_type' => 'customer',
				'order'          => 'ASC',
				'orderby'        => 'menu_order',
				'posts_per_page' => $n,
				'post__not_in'	=>	array(get_the_ID()),
				'post_status'	=>	'publish',

				// 'tax_query' => array(
				// 	array(
				// 		'taxonomy' => 'industry',
				// 		'field' => 'slug',
				// 		'terms' => get_the_title(),
				// 	),
				// )
			);
			$query_fallback = new WP_Query( $args2 );
		// }
		// else{
		// 	$query = new WP_Query( $args_fallback );
		// }
			if($query_fallback->have_posts()):


				?>




				<?php while( $query_fallback->have_posts() ) : $query_fallback->the_post();?>

					<?php

					$img = get_the_post_thumbnail_url(get_the_ID(), 'banner-large');

					$id = get_the_ID();
					if(get_post_thumbnail_id()){
						$featimage = wp_get_attachment_image_src(get_post_thumbnail_id($id),'medium_large', true)[0];
					}
					else{
						$featimage = get_template_directory_uri().'/img/resource_texture.png';
					}



					if(get_post_meta(get_the_ID(), 'customer_options_logo', true)){
						$logos = get_post_meta(get_the_ID(), 'customer_options_logo', true);
						foreach($logos as $key=>$val):
							$logo = wp_get_attachment_image_src($val, 'large', true);
						endforeach;		
					}
					else{
						$logo = '';
					}



					echo '<div class="card';					
					if (get_post_meta($id, 'customer_options_disable', true) == 'on'){
						echo ' nolink';
					}
					echo '">';
					?>

					<div class="logo" style="background-image:url(<?=$logo[0];?>);"></div>
					<?php if (get_post_meta($id, 'customer_options_disable', true) !== 'on'){
						echo '<a href="'.get_the_permalink(get_the_ID()).'">';
					}?>
					<div class="bgimg" style="background-image:url(<?=$featimage;?>);"></div>
					<div class="content">
						<h3 class="large-light"><?=get_the_title();?></h3>
						<p class="readmore">View Customer Story</p>
					</div>
					<?php if (get_post_meta($id, 'customer_options_disable', true) !== 'on'){
						echo '</a>';
					}?>
				</div>

			<?php endwhile;?>


		</div>
		<?php 
	endif;

	wp_reset_postdata();
}

?>

</div>
</div>
</div>