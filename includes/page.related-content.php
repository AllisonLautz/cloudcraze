		<?php 

		$args = array( 
			'connected_type' => $Fn,
			'connected_items' => $post->ID,
			'posts_per_page' => 4,
			'post_status'	=>	'publish',
		);


		$args_fallback = array( 
			'post_type' => 'resource',
			'order'          => 'ASC',
			'orderby'        => 'menu_order',
			'posts_per_page' => 4,
			'post_status'	=>	'publish',

			'tax_query' => array(
				array(
					'taxonomy' => 'industry',
					'field' => 'slug',
					'terms' => get_the_title(),
				),
			)
		);

		if((new WP_Query($args))->have_posts()){
			$query = new WP_Query( $args );
		}
		else{
			$query = new WP_Query( $args_fallback );
		}
		if($query->have_posts()):?>

		<div class="section industry resources<?=$color;?>">
			<div class="wrapper small animate"><h2 class="center">Related resources</h2></div>
			<div class="wrapper">
				<div class="resources flex">


					<?php while( $query->have_posts() ) : $query->the_post();?>

						<?php

						$img = get_the_post_thumbnail_url(get_the_ID(), 'banner-large');
						$industry = str_replace(' ', '-', getTerms('industry'));
						$resource = str_replace(' ', '-', getTerms('resource_types'));
						$override = get_post_type($id).'_options_override';
						$id = get_the_ID();
						if(get_post_thumbnail_id()){
							$featimage = wp_get_attachment_image_src(get_post_thumbnail_id($id),'medium_large', true)[0];
						}
						else{
							$featimage = get_template_directory_uri().'/img/resource_texture.png';
						}


						?>
						<div class="card resource type-<?=strtolower($resource);?> <?='type-'.strtolower($industry);?>">
							<a href="<?=get_the_permalink(get_the_ID());?>">
								<div class="bgimg" style="background-image:url(<?=$featimage;?>);"></div>
								<div class="content">
									<h3 class="large-light"><?=get_the_title();?></h3>
									<?php 

									$terms = get_the_terms(get_the_ID(), 'resource_types');
									foreach ($terms as $term) {
										$output = $term->name;
										if($output == 'Webinar' || $output == 'Video' || $output == 'Video Case Study'){
											$verb = 'View';
										}
										else{
											$verb = 'Read';
										}
									}

									echo '<p class="readmore">'.$verb .' the '.$output.'</p>';								

									?>
								</div>
								<div class="label"><?=getTerms('resource_types');?></div>

							</a>
						</div>

					<?php endwhile;?>

				</div>
			</div>

		</div>
		<?php 
	endif;
	wp_reset_postdata();
	?>