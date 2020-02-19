<?php
$pageid = $post->ID;
$contag = array(get_the_terms($post->ID,'content_tags')[0]->slug);
$conCat = array(get_the_terms($post->ID,'page_categories')[0]->slug);
$sdbr = array();

	if(isset($meta['sidebar_sidebar_type'][0])) $sdbr['type'] = $meta['sidebar_sidebar_type'][0];
	if(isset($meta['sidebar_sidebar_consultants'][0])) $sdbr['consultants'] = $meta['sidebar_sidebar_consultants'][0];
	if(isset($meta['sidebar_sidebar_menu'][0])) $sdbr['menu'] = $meta['sidebar_sidebar_menu'][0];
	if(isset($meta['sidebar_sidebar_form'][0])) $sdbr['form'] = $meta['sidebar_sidebar_form'][0];
	if(isset($meta['sidebar_sidebar_html'][0])) $sdbr['html'] = $meta['sidebar_sidebar_html'][0];
	if(isset($meta['sidebar_calltoactions_cta_tagged'][0])) $sdbr['tagged'] = $meta['sidebar_calltoactions_cta_tagged'][0];
	if(isset($meta['sidebar_calltoactions_cta_cat'][0])) $sdbr['cat'] = $meta['sidebar_calltoactions_cta_cat'][0];
	if(isset($meta['sidebar_calltoactions_cta_count'][0])) $sdbr['count'] = $meta['sidebar_calltoactions_cta_count'][0];

	function consulantsCTA($type){
		$args = array(
			'posts_per_page' => -1,
			'post_type'      => 'team',
			'tax_query'      => array(
				array('taxonomy'=>'content_tags','field'=>'slug','terms'=>$type),
			)
		);
		$i=0;
		$card = false;
		$query = new WP_Query( $args );
		//print_r($query);

		// The Loop
		if (have_posts()) : while ($query->have_posts()) : $query->the_post();
			$postId = $query->posts[$i]->ID;

			$position = get_post_meta($postId, 'team_title', true );
			$perma = get_permalink($postId);

			if(has_post_thumbnail($postId)){
				$image_id = get_post_thumbnail_id($postId);
				$featimage = wp_get_attachment_image_src($image_id,'profile', true)[0];
			}

			$card .= '<a href="'.$perma.'" ><div class="conwrap">';
			$card .= '<img class="profile" src="'.$featimage.'" alt="'.get_the_title().'"/>';
			$card .= '<h3 class="name">'.get_the_title().'</h3>';
			$card .= '<p class="position">'.$position.'</p>';
			$card .= '</div></a>';

			$i++;
		endwhile;
		endif;
		wp_reset_postdata();

		$html = false;
		global $opt;
		if($card){
			$html = '<div class="widget widget_consultants">';
			$html .= '<h2 class="title">Featured Workforce Consultants:</h2>'.$card;
			// $html .= '<p class="info">Contact Them:<br> '.$opt['contact_number'].'<br> '.$opt['contact_email'].'</p>';
			$html .= '</div>';
		}

		return $html;

	}

	function sidebarCTA($id,$pageid){
		$cta = array(
			'id' => $id,
			'toggle' => get_post_meta($pageid, 'sidebar_page_ctas_cta_'.$id.'_toggle', true),
			'title' => get_post_meta($pageid, 'sidebar_page_ctas_cta_'.$id.'_text', true),
			'button_text' => get_post_meta($pageid, 'sidebar_page_ctas_cta_'.$id.'_desc', true),
			'url' => get_post_meta($pageid, 'sidebar_page_ctas_cta_'.$id.'_url', true),
			'class' => 'widget widget_cta',
		);
		$c = 0;
 		foreach ($cta as $t) {
			if($t != 'false' && $t != false) $c++;
		}
		if($c < 3) return false;
		if($cta['toggle'] != 'true') return false;

		return $cta;
	}

	$cta1 = sidebarCTA(1,$pageid);
	$cta2 = sidebarCTA(2,$pageid);

	if($cta1) {echo ctaBuilder($cta1);}
	if($cta2) {echo ctaBuilder($cta2);}

	if($sdbr['tagged'] != 'true') echo getTaggedCTAs($contag,'content_tags',$sdbr['count'],true);
	if($sdbr['cat'] != 'true') echo getTaggedCTAs($conCat,'page_categories',$sdbr['count'],true);

	$consultants = consulantsCTA($contag);
	if($consultants) echo $consultants;

	$pagecat = get_the_terms($post->ID,'page_categories')[0]->slug;
	if(has_nav_menu($pagecat) && $sdbr['menu'] != 'true'){
		echo '<div class=" widget widget_menu categorymenu"><div class="widgetwrap">';
		wp_nav_menu(array('menu' => $pagecat));
		echo '</div></div>';

	}

	if($meta['sidebar_sidebar_type'][0] == 'html'){
		echo $meta['sidebar_sidebar_html'][0];
	}elseif($meta['sidebar_sidebar_type'][0] == 'form'){
		echo do_shortcode('[contact-form-7 id="'.$meta['sidebar_sidebar_form'][0].'"]');
	}

?>