<?php

// ------------------------------------------------------
// Functions for Loop & Template parts
// ------------------------------------------------------

function buildTerms($cats,$del){
	$i = 1;
	$c = count($cats);
	$html = "";
	foreach ($cats as $key => $value) {
		// $html .= '<a href="'.get_option('home').'/'.$value->taxonomy.'/'.$value->slug.'/">'.$value->name.'</a>';
		$html .= $value->name;
		if($i != $c) $html .= $del;
		$i++;
	}
	return $html;
}

function getTermsTags($id){
	$terms = wp_get_post_terms($id, 'content_tags');
	$classes ="";
	foreach ($terms as $key => $value) {
		$classes .= " tags-".$value->slug;
	}
	$terms = wp_get_post_terms($id, 'resource_types');
	foreach ($terms as $key => $value) {
		$classes .= " type-".$value->slug;
	}
	return $classes;
}

function getImageBackground($id,$size){
	$override = get_post_type($id).'_options_override';
	$id = get_post_meta(get_the_ID(),$override,true);
	if($id == false) $id  = get_post_thumbnail_id($id);
	if($id == false) return false;
	$featimage = wp_get_attachment_image_src($id,$size, true)[0];
	return '<div class="featimg size_'.$size.'" style="background-image:url('.$featimage.');"></div>';
}

function getImage($id,$size,$c,$t){
	if($t) $id  = get_post_thumbnail_id($id);
	$img = wp_get_attachment_image_src($id,$size, true)[0];
	if($t == true) return '<img class="'.$c.' size_'.$size.'" src="'.$img.'">';
	if($t == false) return '<div class="'.$c.' size_'.$size.'" style="background-image:url('.$img.');"></div>';
	}

	function post_team($id,$args){
		$term = wp_get_post_terms($id,$args['label'],array("fields" => "names"));

		$contact = '';

		$email = get_post_meta(get_the_ID(),'team_options_email',true);
		if($email) $contact .= '<a href="mailto:'.$value.'" class="email">'.$email.'</a>';
			$phone = get_post_meta(get_the_ID(),'team_options_phone',true);
			if($phone) $contact .= '<a href="tel:'.$value.'" class="phone">'.$phone.'</a>';
				$linkedin = get_post_meta(get_the_ID(),'team_options_linkedin',true);
				if($linkedin) $contact .= '<a href="'.$value.'" class="linkedin">linkedin</a>';
				$twitter = get_post_meta(get_the_ID(),'team_options_twitter',true);
				if($twitter) $contact .= '<a href="'.$value.'" class="twitter">twitter</a>';
				$facebook = get_post_meta(get_the_ID(),'team_options_facebook',true);
				if($facebook) $contact .= '<a href="'.$value.'" class="facebook">facebook</a>';

				$html = '';

				$html .= getImageBackground($id,'profile');

				if($anchor != false) $html .='<a href="'.$anchor.'" target="'.$args['target'].'">';
				$html .= '<div class="conwrap">';
				$html .= '<h3 class="large-light"><span class="name">'.$args['titletext'].'</span> // <span class="pos">'.get_post_meta( $id, 'team_options_position', true ).'</span></h3>';
				$html .= '</div>';
				$html .= '<div class="hover"><div class="cenwrap"><p class="title">'.get_post_meta(get_the_ID(),'seometa_banner_description',true).'</p><p class="readmore">Read His Full Bio</p></div></div>';
				$html .= '<div class="contentbox"><div class="profilebox">';
				$html .= '<div class="left onethird">'.getImage($id,'profile','profile',true).'<p>'.$contact.'</p></div>';
				$html .= '<div class="right twothird">';
				$html .= '<h3 class="large-light"><span class="name">'.$args['titletext'].'</span> // <span class="pos">'.get_post_meta( $id, 'team_options_position', true ).'</span></h3>';
				$html .= '<div class="lightcon">'.get_the_content().'</div>';
				$html .= '</div></div></div>';
				if($anchor != false) $html .= '</a>';
				$html = '<div class="'.$args['class'].'">'.$html.'</div><!-- end post'.$args['class'].'  -->';

				return $html;
			}


			// function post_solution($id,$args){
			// 	$html = '';
			// 	$html .= '<div class="img modal">'.getImage($id,'modal','modal',true).'</div>';
			// 	$html .= '<div class="modalbox">'.get_post_meta( $id, 'solution_options_content', true ) . '</div>';
			

			// 	return $html;
			// }


			function post_clients($id,$args){
				$term = wp_get_post_terms($id,$args['label'],array("fields" => "names"));
				$anchor = false;

				$html = '';
				if($args['image']){
					$img = getImageBackground($id,'logo');
					if($img != false){ $html .= $img;}
					else{$args['class'] .= ' noimg';}
				}
				$resource = get_post_meta( $id, 'clients_options_resource', true );
				if($resource != false) $anchor = get_permalink($resource);
				if($anchor != false) $args['titletext'] = trimString(get_the_title($resource),75);
				if($resource == false || $resource == 'none') {
					$anchor = get_post_meta( $id, 'clients_options_anchor', true );
					$args['titletext'] =trimString(get_the_title($id),75);
				}
				if($anchor != false){ $html .='<a href="'.$anchor.'" target="'.$args['target'].'">'; $args['class'] .= " anchor";}
				$html .= getImage(get_post_meta( $id, 'clients_options_background', true, false ),'resource-grid','background',false);

	// $html .= '<img class="logo" src="'.get_post_meta( $id, 'clients_options_logo', true ).'">'; // clients_options_logo
				$html .= '<div class="conwrap">';
				if($args['titletext'] == 'Adidas'){
					$html .= '<h3 class="large-light">Adidas at Dreamforce: Create New Sales Opportunities with an eCommerce Community</h3>';
					$html .= '<p class="readmore">View the Schedule</p>';

				}else{
					$html .= '<h3 class="large-light">'.$args['titletext'].'</h3>';
					$html .= '<p class="readmore">View the Case Study</p>';

				}
				$html .= '</div>';
				if($anchor != false) $html .= '</a>';
				$html = '<div class="'.$args['class'].'">'.$html.'</div><!-- end post'.$args['class'].'  -->';

				return $html;
			}

			function post_moreresources($id,$args){

				if($args['postType'] == 'resource'){
					$type = wp_get_post_terms($id, 'resource_types');
					$args['postType'] = $type[0]->name;
				}elseif($args['postType'] == 'post'){
					$args['postType'] = 'Blog Post';
				}

				$html = '';
				$html .='<a href="'.$args['perma'].'" >';
				$html .= '<p class="type">'.$args['postType'].'</p>';
				$html .= '<p class="title">'.$args['titletext'].'</p>';
				if($args['label']) 	$html .= '<div class="label"><span>Resource </span>'.$term[0].'</div>';
				$html .= '</a>';
				$html = '<div class="'.$args['class'].'">'.$html.'</div><!-- end post'.$args['class'].'  -->';

				return $html;
			}
			function post_generic($id,$args){
				$term = wp_get_post_terms($id,$args['label'],array("fields" => "names"));
				$slugs = wp_get_post_terms($id,$args['label'],array("fields" => "slugs"));
				if($term[0]){
					switch ($slugs[0]) {
						case 'video-case-study':$readmore = 'View Video Case Study'; break;
						case 'analyst-report':$readmore = 'Read the Report'; break;
						case 'video-demo':$readmore = 'View the Demo'; break;
						case 'webinar':$readmore = 'View the Webinar'; break;
						case 'video':$readmore = 'View the Video'; break;

						default:$readmore = 'Read the '.$term[0]; break;
					}
				}else{
					$readmore = 'Read More';
					if(is_string($args['readmore'])) $readmore = $args['readmore'];
				}

				$html = '';
				if($args['perma'])		$html .='<a href="'.$args['perma'].'" target="'.$args['target'].'">';
				if($args['altimg']){
					$img = get_post_meta($id,'events_options_alt_img',true);
		//$img = wp_get_attachment_image_src(get_post_thumbnail_id($id),$size, true)[0];
					if($img != false){
						$html .= '<div class="featimg" style="background-image:url('.$img.');"></div>';
					}
					else{$args['class'] .= ' noimg';}
				}
				elseif($args['image']){
		// $img = getImageBackground($id,$args['image']);
					$img = wp_get_attachment_image_src(get_post_thumbnail_id($id),$size, true)[0];
					if($img != false){ $html .= '<div class="featimg" style="background-image:url('.$img.');"></div>';}
						else{$args['class'] .= ' noimg';}
					}

					$html .='<div class="conwrap">';

					if($args['date']){
						$date = get_post_meta($id,'events_options_date',true);
						if($date == false) $date = get_the_date('F j, Y',$id);
						$html .= '<p class="label-small">'.$date.'</p>';
					}






					if($args['title'])		$html .= '<'.$args['title'].' class="title">'.$args['titletext'].'</'.$args['title'].'>';
					if($args['desc']) 		$html .= '<p class="desc">'.trimString(get_the_excerpt($id),$args['desc']).'</p>';
					if($args['perma'] && $args['readmore'])		$html .= '<p class="readmore">'.$readmore.'</p>';

					/* aml */ if($args['alttitle']){
						$alttitle = get_post_meta(get_the_ID(),'news_options_title', true);
						$html .= '<h3 class="alttitle">'.$alttitle.'</h3>';
					}
					/* aml */if($args['altdesc']){
						$altdesc = get_post_meta(get_the_ID(),'news_options_description', true);
						$html .= '<p class="altdesc">'.$altdesc.'</p>';
					};

					/* aml */if($args['btn']){
						$btn = get_post_meta(get_the_ID(),'news_options_button', true);
						$html .= '<p class="button right valign white">'.$btn.'</p>';
					};
					$html .='</div>';
					if($args['label']) 	$html .= '<div class="label">'.$term[0].'</div>';
					if($args['perma'])		$html .= '</a>';
					$html = '<div class="'.$args['class'].'">'.$html.'</div><!-- end post'.$args['class'].'  -->';

					return $html;
				}

				function post_testimonials($id,$args){
					$perma = get_post_meta($id, 'testimonials_options_anchor', true);
	// $html = '<div class="'.$args['class'].'">';
					$quote = trimString(get_post_meta($id,'testimonials_options_quote',true),170);
					if(strlen($quote) > 60){ $qc = "small";}else{$qc = "";}
	// if($perma)		$html .='<a href="'.$perma.'">';
	// $html .= '<div class="conwrap"><div class="content relative">';
	// $html .= '<'.$args['title'].' class="title '.$qc.'">'.$quote.'</'.$args['title'].'>';
	// $html .= '<p class="desc">'.get_post_meta( $id, 'testimonials_options_name', true ).'</p>';
	// $html .= '<p class="desc">'.get_post_meta( $id, 'testimonials_options_position', true ).', <span>'.get_post_meta( $id, 'testimonials_options_company', true ).'</span></p>';
	// $html .= '</div></div>';
	// if($perma)		$html .= '</a>';
	// $html .= '</div><!-- end post'.$args['class'].'  -->';

					$i=1;
					$img = wp_get_attachment_image_src(get_post_thumbnail_id($id),$size, true)[0];
	// $html .= '<div class="slide slide" style="background-image:url('.$img.');"><div class="overlay"><div class="wrapper relative "><div class="text vcenter"><h3>'.$args['title'].'</h3><p>'.$args['subtitle'].'</p><a class="button" href="'.$args['url'].'">View the Case Study</a></div></div></div></div>'."\n";

					$html .= '<div class="slide slide'.$i++.' '.$key.'" style="background-image:url('.$img.');"><div class="overlay"><div class="wrapper relative "><div class="text vcenter"><h3>'.$quote.'</h3><p class="desc"><span class="name">'.get_post_meta( $id, 'testimonials_options_name', true ). ',</span><span class="title">' .get_post_meta( $id, 'testimonials_options_position', true ).'</span><span class="company">'.get_post_meta( $id, 'testimonials_options_company', true ).'</span></p><a class="button" href="'.$perma.'">View the Case Study</a></div></div></div></div>';

					return $html;

				}


				function post_cardgrid($id,$args){

					if($args['postType'] == 'testimonials'){
						$html = post_testimonials($id,$args);
					}else{
						$html = '<div class="'.$args['class'].'">';
						if($args['perma'])		$html .='<a href="'.$args['perma'].'" target="'.$args['target'].'">';
						if($args['image'])		$html .= getImageBackground($id,$args['image']);
						$html .= '<div class="conwrap"><div class="content relative">';
						if($args['title'])		$html .= '<'.$args['title'].' class="title">'.$args['titletext'].'</'.$args['title'].'>';
						$html .= '<div class="hidden">';
						if($args['desc']) 		$html .= '<p class="desc">'.trimString(get_the_excerpt($id),$args['desc']).'</p>';
						if($args['readmore']) 	$html .= '<p class="readmore">'.$args['readmore'].'</p>';
						$html .= '</div></div></div>';
						if($args['perma'])		$html .= '</a>';
						$html .= '</div><!-- end post'.$args['class'].'  -->';
					}

					return $html;
				}

				function buildLoop($args){

	/*

		Builds out A Post or Card Array base on arg options
		----

		- add in more descriptions here.
		- set $args['function'] to over ride default card/post html functions

	*/

		if($args['row'] != false){
			$widthOpt = array('full' => '1','halves' => '2','thirds' => '3','fourths' => '4','fifths' => '5');
			$row = $widthOpt[$args['row']];
			$row = intval($row);
		}

		$i=0;
		if($args['row']) $j=1;

		$query = new WP_Query( $args['args'] );
		$posts = "";
	// The Loop
		if (have_posts()) : while ($query->have_posts()) : $query->the_post();
		// print_r($query->posts[$i]->ID);
			$postId = $query->posts[$i]->ID;
			$postType = get_post_type($postId);

			if(!$args['function']) $args['function'] = $postType;
			$function = 'post_'.$args['function'];

			if(!function_exists($function)) $function = 'post_generic';

			$postArgs = array(
				'title' => 'h3',
				'desc' => false,
				'readmore' => true,
				'class' => $args['postclass'].' '.$args['postclass'].$i.' '.$postType.' '.$postType.$postId,
				'postType' => $postType,
			);

			if(isset($args['readmore'])) $postArgs['readmore'] = $args['readmore'];
			/* aml */ if(isset($args['btn'])) $postArgs['btn'] = $args['btn'];
			/* aml */ if(isset($args['alttitle'])) $postArgs['alttitle'] = $args['alttitle'];
			if(isset($args['altdesc'])) $postArgs['altdesc'] = $args['altdesc'];
			if(isset($args['date'])) $postArgs['date'] = $args['date'];
		// if(isset($args['title'])) $postArgs['title'] = $args['title'];
			if(isset($args['perma'])) $postArgs['perma'] = $args['perma'];
			if(isset($args['label'])) $postArgs['label'] = $args['label'];
			if(isset($args['desc'])) $postArgs['desc'] = $args['desc'];
			if(isset($args['altimg'])) $postArgs['altimg'] = $args['altimg'];
			if(isset($args['postcnt'])) $i = $i+$args['postcnt'];


			if($args['image']) $postArgs['image'] = $args['image'];
			if(!isset($args['perma'])) $postArgs['perma'] = get_permalink($postid);
			if($args['row']){
				$postArgs['class'] .= ' item'.$j;
				if($j == 1) $postArgs['class'] .= ' first';
				if($j == $row) $postArgs['class'] .= ' last';
			}
			if($args['termTags']){
				$postArgs['class'] .= ' '.getTermsTags($postId);
			}
			if($args['titlecount']){
				$postArgs['titletext'] = trimString(get_the_title($postId),$args['titlecount']);
			}else{
				$postArgs['titletext'] = get_the_title($postId);
			}
			$posts .= $function($postId,$postArgs);

			$i++;
			$k++;
			if($args['row']) $j++;
			if($j > $row) $j = 1;

		endwhile;
	endif;
	wp_reset_postdata();

	if($args['nowrap'] == true){
		$html = $posts;
	}else{
		$html = '<div class="'.$args['postclass'].'wrap '.$function.' '.$postType.' '.$args['class'].'">'.$posts.'</div> <!-- end '.$args['postclass'].'wrap '.$args['class'].'-->';
	}

	return $html;
}

function buildItems($ids,$args){

			/*

			Builds out A Post or Card Array base on arg options & ids
			----

			- add in more descriptions here.
			- set $args['function'] to over ride default card/post html functions

	*/
			if($args['row'] != false){
		// $widthOpt = array('full' => '1','halves' => '2','thirds' => '3','fourths' => '4','fifths' => '5');
				$widthOpt = array(
					'1' => 'full',
					'2' => 'halves',
					'3' => 'thirds',
					'4' => 'fourths',
					'5' => 'fifths'
				);
				$row = $widthOpt[$args['row']];
				$row = intval($row);
			}

			$i=0;
			if($args['row']) $j=1;

			$query = new WP_Query( $args['args'] );
			$posts = "";
	// The Loop
			foreach ($ids as $postId) {

				$postType = get_post_type($postId);

				if(!$args['function']) $args['function'] = $postType;
				$function = 'post_'.$args['function'];

				if(!function_exists($function)) $function = 'post_generic';

				$postArgs = array(
					'title' => 'h3',
					'desc' => false,
					'readmore' => true,
					'perma' => true,
					'class' => $args['postclass'].' '.$args['postclass'].$i.' '.$postType.' '.$postType.$postId,
					'postType' => $postType,
				);
		// var_dump($postArgs);

				if(isset($args['readmore'])) $postArgs['readmore'] = $args['readmore'];
				if(isset($args['date'])) $postArgs['date'] = $args['date'];
				if(isset($args['title'])) $postArgs['title'] = $args['title'];
				if(isset($args['perma'])) $postArgs['perma'] = $args['perma'];
				if(isset($args['label'])) $postArgs['label'] = $args['label'];
				if(isset($args['desc'])) $postArgs['desc'] = $args['desc'];

				if($args['image']) $postArgs['image'] = $args['image'];
				if(!isset($args['perma'])) $postArgs['perma'] = get_permalink($postId);
				if($args['row']){
					$postArgs['class'] .= ' item'.$j;
					if($j == 1) $postArgs['class'] .= ' first';
					if($j == $row) $postArgs['class'] .= ' last';
				}
				if($args['titlecount']){
					$postArgs['titletext'] = trimString(get_the_title($postId),$args['titlecount']);
				}else{
					$postArgs['titletext'] = get_the_title($postId);
				}

				$posts .= $function($postId,$postArgs);

				$i++;
				$k++;
				if($args['row']) $j++;
				if($j > $args['row']) $j = 1;

			}

			if($args['nowrap'] == true){
				$html = $posts;
			}else{	$html = '<div class="'.$args['postclass'].'wrap '.$postType.' '.$args['class'].'">'.$posts.'</div> <!-- end '.$args['postclass'].'wrap '.$args['class'].'-->';}
			// $html = $posts;


			return $html;
		}





		function p2pBuild($type, $args){

			$connected = new WP_Query( array(
				'connected_type' => $type,
				'connected_items' => $args,
				'nopaging' => true
			) );
			while ( $connected->have_posts() ) : $connected->the_post();
				$IDs[] = get_the_ID();


			endwhile;
			wp_reset_postdata();


			$class = '';
			
			for($j = 0; $j < count($IDs); $j++){
				$d = $IDs[$j];
				$class .= ' ' . str_replace(' ', '-', strtolower(get_the_title($d)));
			}
			return $class;
		}