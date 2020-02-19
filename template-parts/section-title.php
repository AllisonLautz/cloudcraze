<?php

$ban_image_id = get_post_thumbnail_id(get_the_ID());


$alt = meta('main_disable') ? ' alt' : false;

/* if featured post as header */

$featured = [];
$args = array( 
	'connected_type' => $connected,
	'connected_items' => get_the_ID(),
	'posts_per_page' => 1,
	'post_status'	=>	'publish',	
);

$query = new WP_Query( $args );

if($query->have_posts()):
	while( $query->have_posts() ) : $query->the_post();
		array_push($featured, get_the_ID());

		if(get_post_thumbnail_id(get_the_ID())){
			$featimage = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'full', true)[0];
		}
		else{
			$featimage = wp_get_attachment_image_src(get_post_thumbnail_id($ban_image_id),'full', true)[0];
		}



		?>
		<div class="section title mainvisual<?=$alt;?>" data-src="<?=$featimage;?>">
			<div class="wrapper small animate">
				<?php if(	strlen(p2p_get_meta( get_post()->p2p_id, 'title', true )) !== 0	):?>
					<h1><?=p2p_get_meta( get_post()->p2p_id, 'title', true );?></h1>
				<?php else:?>
					<h1><?=get_the_title();?></h1>
				<?php endif;?>

				<?php if(	strlen(p2p_get_meta( get_post()->p2p_id, 'excerpt', true )) !== 0	):?>
					<p><?=p2p_get_meta( get_post()->p2p_id, 'excerpt', true );?></p>
				<?php else:?>
					<p><?=wp_html_excerpt(get_the_excerpt() );?>...</p>
				<?php endif;?>

				<?php if(	strlen(p2p_get_meta( get_post()->p2p_id, 'button', true )) !== 0	):?>
					<a class="button" href="<?=get_the_permalink();?>"><?=p2p_get_meta( get_post()->p2p_id, 'button', true );?></a>
				<?php else:?>
					<a class="button" href="<?=get_the_permalink();?>">Read More</a>
				<?php endif;?>
				
				

			</div>
		</div>

	<?php endwhile; else:





	$vids = get_post_meta($post->ID, 'industry_video', true);
	foreach($vids as $key=>$val):
		$vid = wp_get_attachment_url($val);
	endforeach;

	if(get_post_meta(get_the_ID(), 'events_noverlay', true)){
		$imgClass .= ' noverlay';
	}


	if(get_post_meta(get_the_ID(),'customer_options_banner',true)){
		$title = htmlspecialchars_decode(get_post_meta(get_the_ID(),'customer_options_banner',true));
	}
	elseif(get_post_meta(get_the_ID(),'section_title',true)){
		$title = wpautop(htmlspecialchars_decode(get_post_meta(get_the_ID(),'section_title',true)));
	}
	else{
		$title = '<h1>' . htmlspecialchars_decode(get_the_title()) . '</h1>';
	}



	if($vid){
		echo '<div class="section mainvisual video">
		<video autoplay loop>
		<source src="'.$vid.'" type="video/mp4" />Your browser does not support the video tag. I suggest you upgrade your browser.
		<source src="'.$vid.'" type="video/webm" />Your browser does not support the video tag. I suggest you upgrade your browser.
		</video>
		<div class="poster hidden">'.$imgStyles.'</div>
		<div class="wrapper small animate">
		'.$title .'					
		</div>
		</div>';

	}


	$mainvisual = $ban_image_id ? ' mainvisual' : false;

	if($ban_image_id){

		/* get different image crops based on upload date (before/after SF changes) */
		$arr = wp_get_attachment_metadata($ban_image_id);
			// print_r($arr);
		$metaDate = substr($arr['file'], 0, 7);
		$uploadDate = str_replace('/', '-',  $metaDate);

		$ban_main     = wp_get_attachment_image_src($ban_image_id,'full-screen', true)[0];
		if($uploadDate == date('Y-m')){
			$ban_tablet   = wp_get_attachment_image_src($ban_image_id,'sf-tablet', true)[0];
			$ban_mobile   = wp_get_attachment_image_src($ban_image_id,'sf-mobile', true)[0];

		}
		else{
			$ban_tablet   = wp_get_attachment_image_src($ban_image_id,'banner-large', true)[0];
			$ban_mobile   = wp_get_attachment_image_src($ban_image_id,'banner-small', true)[0];


		}
		


		$largecss  = ".mainvisual".'{background-image:url('.$ban_main.');}';
		$tabletcss = ".mainvisual".'{background-image:url('.$ban_tablet.');}';
		$mobilecss = ".mainvisual".'{background-image:url('.$ban_mobile.');}';

		if($vid){
			$imgStyles = $imgStyles = '<style>@media (max-width: 1024px) {'.$tabletcss.'}@media (max-width: 600px) {'.$mobilecss.'}</style>';
		}

		else{
			$imgStyles = '<style>'.$largecss.'@media (max-width: 1024px) {'.$tabletcss.'}@media (max-width: 600px) {'.$mobilecss.'}</style>';
		}



		
	}

	echo '<div class="section title'.$alt.$mainvisual.'' .$imgClass.'">
	'.$imgStyles.'
	<div class="wrapper small animate">';
	foreach(meta('customer_options_logo') as $key=>$val):
		$logo = wp_get_attachment_image_src($val, 'large', true);
		echo '<img src="'.$logo[0].'">';
		$metadata =  wp_get_attachment_metadata($val);
	endforeach;	
	echo $title;
	if(meta('customer_options_video_link')){
		echo '<a class="youtube cboxElement" href="'.$meta['customer_options_video_link'][0].'?autoplay=1&rel=0"></a>';
	}
	else if(meta('video_link')){
		echo '<a class="youtube cboxElement" href="'.$meta['video_link'][0].'?autoplay=1&rel=0"></a>';
	}
	else if(get_post_type() == 'news'){
		echo '<p>'.get_the_date().'</p>';
	}
	echo '</div>
	</div>';



	

	





endif; wp_reset_postdata();


