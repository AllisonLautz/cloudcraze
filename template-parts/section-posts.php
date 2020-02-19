<?php




$featured = [];
if($max !== false){
	$max = 'row-'.$max;
}

if($alt !== 'none'){
	$alt = 'alt';
}
else{
	$alt = false;
}
if($class){
	$class = $class;
}
if(!$chars){$chars = 20;}



$query = new WP_Query( $args );

if( $query->have_posts() ):

	$found = $query->found_posts;


	?>




	<main>
		<div class="section maincontent <?=$color;?> <?=strtolower($post_type);?>">
			<div class="wrapper">
				<h2 class="title sectiontitle"><?=$title;?></h2>
				<?php if($before):?>
					<?=$before;?>
				<?php endif;?>

				<div class="row">
					<div class="posts <?=$max;?> <?=$class;?> <?=$alt;?> flex-2">

						<?php while( $query->have_posts() ) : $query->the_post(); 
							$crop = meta('main_disable') ? ' crop' : false;
							$img = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'banner-medium', true)[0];
							$form_time = meta('pardot_form_time') ? '<p class="label-small webinar-time">'.meta('pardot_form_time').'</p>' : false;

							if(	strlen(p2p_get_meta( get_post()->p2p_id, 'title', true )) !== 0	){
								$the_title = p2p_get_meta( get_post()->p2p_id, 'title', true );

							}
							else{
								$the_title = get_the_title();
							}


							if($max == 'row-4' ){
								$the_title = wp_trim_words($the_title, 9);
							}


							if($excerpt !== false){

								if(	strlen(p2p_get_meta( get_post()->p2p_id, 'excerpt', true )) !== 0	){
									$excerpt = '<p>' . wp_trim_words(p2p_get_meta( get_post()->p2p_id, 'excerpt', true ), $chars) . '...</p>';
								}
								else{
									$excerpt = '<p>' . wp_trim_words(get_the_excerpt(), $chars ) . '...</p>';
								}
							}
							else{
								$excerpt = false;
								array_push($featured, get_the_ID());
							}

							if(! $button){
								if(	strlen(p2p_get_meta( get_post()->p2p_id, 'button', true )) !== 0	){
									$button = p2p_get_meta( get_post()->p2p_id, 'button', true );
								}
								else{
									$button = 'Read More';
								}
							}


							if($post_type == 'event'){$output .= 'animate ';}
							array_push($featured, get_the_ID());

							$img = get_the_post_thumbnail_url(get_the_ID(), 'page-width');
							$override = get_post_type($id).'_options_override';

							$id = get_post_meta(get_the_ID(),$override,true);
							if(get_post_thumbnail_id()){
								$featimage = wp_get_attachment_image_src(get_post_thumbnail_id($id),'resource', true)[0];
							}
							else{
								$featimage = get_template_directory_uri().'/img/resource_texture.png';
							}


							?>


							<article class="post<?=$crop;?> <?=taxes('slug');?>">

								<?php if (strtolower($post_type) == 'blog'):?>
									<a href="<?=get_the_permalink(get_the_ID());?>">
										<div class="bgimg" data-src="<?=$featimage;?>"></div>
									</a>


									<div class="content">
										<?php if(meta('pardot_form_date')):?>
											<h3><?=meta('pardot_form_date');?></h3>
											<?php elseif($post_type == 'news'):?>
												<h3><?=get_the_date();?></h3>
											<?php endif;?>
											<h3><a href="<?=get_the_permalink(); ?>"><?=$the_title;?></a></h3>
											<p>Written by <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="Posts By <?php the_author_meta( 'display_name' ); ?>" ><?php the_author_meta( 'display_name' ); ?></a> | <?=get_the_date();?></p>

											<a class="a" href="<?=get_the_permalink();?>">
												<?=$excerpt;?>
												<p class="button"><?=$button;?></p>
											</a> 
										</div>

										<?php else:?>

											<?php $link = meta('external_link') ? meta('external_link') : get_the_permalink();?>

											<a href="<?=$link;?>">
												<div class="bgimg" data-src="<?=$featimage;?>"></div>
												<div class="content">
													<?php if(meta('pardot_form_date')):?>
														<p class="label-small"><?=meta('pardot_form_date');?></p>
														<?php elseif($post_type == 'news'):?>
															<p class="label-small"><?=get_the_date();?></p>
														<?php endif;?>
														<h3><?=$the_title?></h3>

														<?=$excerpt;?>
														<p class="button" href="<?=get_the_permalink();?>"><?=$button;?></p>


													</div>
												</a>

											<?php endif;?>


											<?php if($share):?>
												<?=socialShare();?>
											<?php endif;?>

										</article>


									<?php endwhile;?>
								</div>
								<?php if ($ctas){
									echo $ctas;
								}?>
							</div>
							<?php if ($loadmore != false && $found > $loadmore){?>


								<div class="halftop center pagination">
									<a class="loadmore button" href=""><?=$loadmoreText;?></a>
								</div>
							<?php }?>
						</div>


					</div>


				</main>


			<?php endif;?>
			<?php wp_reset_postdata();