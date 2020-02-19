<?php

$testimonials = array(
	'mycoke-com' => array(
		'url' => '/resource/mycoke-com/',
		'image' => '/wp-content/uploads/2016/09/shutterstock_368526575.jpg',
		'title' => '&quot;We realize businesses are ordering more online every day,<br> so we&apos;re excited to offer a new online ordering solution with CloudCraze on Salesforce.&quot;',
		'subtitle' => 'Marta Dalton, <br>Coca-Cola',
		),
	'barry-callebaut' => array(
		'url' => '/resource/barry-callebaut/',
		'image' => '/wp-content/uploads/2016/09/shutterstock_244357675.jpg',
		'title' => '&quot;We have been able to increase [first-time-right orders] by 300 percent.&quot;',
		'subtitle' => 'Steven VanDamme<br> Barry Callebaut',
		),
	'ecolab' => array(
		'url' => 'resource/ecolab/',
		'image' => '/wp-content/uploads/2016/09/shutterstock_179023418.jpg',
		'title' => '&quot;A benefit of having CloudCraze on Salesforce... is that it’s fast to deploy.&quot;',
		'subtitle' => 'Lori Jarchow <br> Ecolab',
		),
	);

function getSlides($order){
	global $testimonials;
	if($order != false){
		$slides = array();
		foreach ($order as $value) {
			$slides[$value] = $testimonials[$value];
		}
	}else{
		$slides = $testimonials;
	}

	return $slides;

}

function buildSlider($order){
	$slides = getSlides($order);

	$html = "";
	$i=1;
	foreach ($slides as $key => $value) {

		$html .= '<div class="slide slide'.$i.' '.$key.'" style="background-image:url('.$value['image'].');"><div class="overlay"><div class="wrapper relative "><div class="text vcenter"><h3>'.$value['title'].'</h3><p>'.$value['subtitle'].'</p><a class="button" href="'.$value['url'].'">View the Case Study</a></div></div></div></div>'."\n";

		$i++;
	}

	$args = ' data-cycle-fx="scrollHorz" data-cycle-pause-on-hover="true" data-cycle-speed="2000" data-cycle-timeout="0" data-cycle-slides="> div.slide" data-cycle-prev=".arrow.prev" data-cycle-next=".arrow.next" data-cycle-log="false"';

	return '<div class="testimonialslider section centered nopadding animate"><div class="controls"><div class="wrapper"><div class="arrow prev">'.svg('#arrow-left',1,'arrw',0).'</div><div class="arrow next">'.svg('#arrow-right',1,'arrw',0).'</div></div></div><div class="slideshow  cycle-slideshow" '.$args.'>'."\n".$html."\n".'</div></div><!-- END testimonialslider '.$cl.'-->';

}

if(!isset($testimonial_order)) $testimonial_order = false;
echo buildSlider($testimonial_order);
?>

