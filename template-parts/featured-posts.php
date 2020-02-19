<?php /* blog */
$args = array( 
	'connected_type' => 'blog_post',
	'connected_items' => get_the_ID(),
	'posts_per_page' => 3,
	'post_status'	=>	'publish',
	
);


$query = new WP_Query( $args );

if($query->have_posts()):

	$postType = get_post_type(get_the_ID());

	$name = get_post_type_object($postType);
	$name = $name->labels->name;

	?>

	<div class="section graylt">
		<div class="wrapper animate">
			<h2 class="sectiontitle">Featured posts</h2>
			<div class="posts featured blog row-3 alt">


				<?php while( $query->have_posts() ) : $query->the_post();?>

					<?php
					$crop = meta('main_disable') ? ' crop' : false;
					$img = get_the_post_thumbnail_url(get_the_ID(), 'resource');
					$override = get_post_type($id).'_options_override';

					$id = get_post_meta(get_the_ID(),$override,true);
					if(get_post_thumbnail_id()){
						$featimage = wp_get_attachment_image_src(get_post_thumbnail_id($id),'resource', true)[0];
					}
					else{
						$featimage = get_template_directory_uri().'/img/resource_texture.png';
					}


					?>

					<div class="post blogpost<?=$crop;?>">
						<a href="<?=get_the_permalink(get_the_ID());?>">
							<div class="bgimg" data-src="<?=$featimage;?>"></div>
							<div class="content">
								<p class="label-small"><?=get_the_date();?></p>
								<h3 class="large-light"><?=wp_trim_words(get_the_title(), 6);?></h3>
							</div>
						</a>
						<?=socialShare();?>
					</div>

				<?php endwhile;?>

			</div>
		</div>
	</div>
<?php endif; wp_reset_postdata();?>