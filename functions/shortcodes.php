<?php
// ------------------------------------------------------
// Add Custom Short Codes
// ------------------------------------------------------

// [div class="section full" close="true" wrapper="true"]
function div_shortcode( $atts ) {
	$a = shortcode_atts( array(
		'class' => 'section',
		'close' => false,
		'wrapper' => false
	), $atts );

	$div = '<div class="'.$a['class'].'">';
	if($a['wrapper'] ==  true) $div = $div.'<div class="wrapper">';
	if($a['close'] ==  true) $div = '</div>'.$div;
	return $div;
}
add_shortcode( 'div', 'div_shortcode' );

// [end count="1" comment="section"]
function end_shortcode( $atts ) {
	$a = shortcode_atts( array(
		'count' => 1,
	), $atts );

	$end ="";
	$i = 1;
	while ($i <= $a['count']) {
		$end .= '</div>';
		$i++;
	}
	if($a['comment'] ==  true) $end = $end.'<!-- '.$a['comment'].' -->';
	return $end;
}
add_shortcode( 'end', 'end_shortcode' );

// [span class="color"]
function span_shortcode( $atts ) {
	$a = shortcode_atts( array(
		'class' => 'section',
		'close' => false,
		'wrapper' => false
	), $atts );

	$span = '<span class="'.$a['class'].'">';
	return $span;
}
add_shortcode( 'span', 'span_shortcode' );

// [/span]
function end_span_shortcode( $atts ) {

	return '</span>';
}
add_shortcode( 'end span', 'end_span_shortcode' );

// [col width="onethird" align="left" mutli="true"]
function col_shortcode( $atts ) {
	$a = shortcode_atts( array(
		'align' => 'left',
		'width' => 'half',
		'multi' => false
	), $atts );

	$col = '<div class="colwrap '.$a['align'].' '.$a['width'].'">';
	if($a['mulit'] ==  true) $col = '</div>'.$col;
	return $col;
}
add_shortcode( 'col', 'col_shortcode' );


function iframe_shortcode( $atts ) {
	$a = shortcode_atts( array(
		'url' => false,
		'height' => '350',
		'width' => 'onethird'
	), $atts );
	return '<div class="iframe '.$a['width'].' "><iframe src="'.$a['url'].'" width="100%" height="'.$a['height'].'"  frameborder="0" allowfullscreen style="border:0"></iframe></div>';
}
add_shortcode( 'iframe', 'iframe_shortcode' );

function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// [svgicon icon="strategy" ]
function svgiconshortcode( $atts ) {
	$a = shortcode_atts( array(
		'class' => 'aligncenter',
		'icon' => false,
		'href' => '#',
		'caption' => false
	), $atts );

	if($a['icon']){
		$icon = get_stylesheet_directory().'/img/service_'.$a['icon'].'.svg';
		$svg = file_get_contents($icon, null, null);
	}

	$r = '<div class="svgwrap serviceicon '.$a['class'].'">';
	$r .= '<a href="'.$a['href'].'">'.$svg.'</a>';
	$r .= '</div>';
	if($a['caption']) $r .= '<h3 class="icontitle"><a href="'.$a['href'].'">'.$a['caption'].'</a></h3>';
	return $r;
}
add_shortcode( 'svgicon', 'svgiconshortcode' );

// [svg src="http://www.sampleurl.com/wp-content/uploads/process-graphic.svg" ]
function svgshortcode( $atts ) {
	$a = shortcode_atts( array(
		'class' => 'aligncenter',
		'src' => false
	), $atts );

	return '<div class="svgwrap '.$a['class'].'">'.file_get_contents($a['src' ]).'</div>';
}
add_shortcode( 'svg', 'svgshortcode' );

// [callout align="right" size="onethird" color="bluemd"]
function calloutshortcode( $atts ) {
	$a = shortcode_atts( array(
		'size' => 'onethird',
		'align' => 'right',
		'color' => ''
	), $atts );

	return "<div class='callout ".$a['size' ]." ".$a['align']." ".$a['color']."'>";
}
add_shortcode( 'callout', 'calloutshortcode' );

// [cta id="value" color="value" align="value" size="value"]
function ctaShortCode( $atts ) {
	$a = shortcode_atts( array(
		'id' => false,
		'color' => 'blue',
		'size' => 'half',
		'align' => 'left',
	), $atts );

	if($a['id'] != false){
		$cta = buildCTA($a['id'], $a['color'], $a['align'], $a['size'], 'incopycta');
	}else{
		$cta = "";
	}

	return $cta;
}
add_shortcode( 'cta', 'ctaShortCode' );

//[wrap] .. [/wrap]
function wrap_shortcode( $atts ) {
	return '<div class="pagewrap">';
}
add_shortcode( 'wrap', 'wrap_shortcode' );

// resource shorcodes
// ---

function resourceOption($what){
	// $id = $_GET['rid'];
	$id = get_the_ID();
	if($what == 'title'){
		return  get_the_title($id);
	}elseif($what == 'type'){
		$tag = array(get_the_terms($id,'resource_types'));
		// return $tag[0];
		$tag = $id;
		// print_r($tag);
		return $tag;
	}else{
		$meta = get_post_meta($id);
		return $meta[$what][0];
	}
}

	// [resource_name ]
function thnk_name() {
	$name = resourceOption('title');
		// $span = 'Resource Name Here';
	return $name;
}
add_shortcode( 'resource_name', 'thnk_name' );

	// [resource_type ]
function thnk_type() {
	$type = resourceOption('type');
		// $span = 'Resource Name Here';
	return $type;
}
add_shortcode( 'resource_type', 'thnk_type' );

	// [resource_button ]
function thnk_button() {
	$type = resourceOption('type');
	$url = resourceOption('resource_sidebar_res_download');
	if($url == false) $url = "#";
	$bttn = '<a href="'.$url.'" class="button" target="_blank">Download Your '.ucwords($type).'</a>';
	return $bttn;
}
add_shortcode( 'resource_button', 'thnk_button' );