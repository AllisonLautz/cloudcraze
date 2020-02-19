
<?php

$ban_image_id = get_post_thumbnail_id(get_the_ID());

if($ban_image_id){
	$imgClass = "bannerimg";
	$ban_main     = wp_get_attachment_image_src($ban_image_id,'banner-large', true)[0];
	$ban_tablet   = wp_get_attachment_image_src($ban_image_id,'banner-medium', true)[0];
	$ban_mobile   = wp_get_attachment_image_src($ban_image_id,'banner-small', true)[0];

	$largecss  = ".mainvisual".'{background-image:url('.$ban_main.');}';
	$tabletcss = ".mainvisual".'{background-image:url('.$ban_tablet.');}';
	$mobilecss = ".mainvisual".'{background-image:url('.$ban_mobile.');}';

	echo '<style>'.$largecss.'@media (max-width: 1024px) {'.$tabletcss.'}@media (max-width: 600px) {'.$mobilecss.'}</style>';

	
	$custom_title = get_post_meta(get_the_ID(),'seometa_banner_title',true);
	$custom_intro = get_post_meta(get_the_ID(),'seometa_banner_description',true);
	if($custom_title) $title = htmlspecialchars_decode($custom_title);
	if($custom_intro) $custom_intro = htmlspecialchars_decode($custom_intro);

	$introtext = htmlspecialchars_decode($meta['landing_header_intro'][0]);
	$smalldesc = get_post_meta(get_the_ID(),'seometa_banner_smalldesc', true);
	$resource_text = htmlspecialchars_decode($meta['resource_options_text'][0]);
	$resource_video = htmlspecialchars_decode($meta['resource_options_video'][0]);
	if($meta['seometa_banner_smalldesc'][0] == 'true') $smalldesc = 'small';

}

if(get_post_meta(get_the_ID(), 'events_noverlay', true)){
	$imgClass .= ' noverlay';
}


if(meta('section_title')){
	$title = meta('section_title');
}
else{
	$title = get_the_title(get_the_ID());
}

?>

<?php if($ban_image_id){ ?>
<!-- Begin Template: page.banner.php  -->
<div class="mainvisual <?=$imgClass?>">
	<div class="wrapper small animate">
		<h1 class="pagetitle"><?=$title ?></h1>
		<?php if($custom_intro) echo '<p class="intro '. $smalldesc.' ">'.$custom_intro.'</p>'; ?>
		<?php if($introtext) echo '<p class="intro introtext">'.$introtext.'</p>'; ?>
		<?php if($resource_text) echo '<p class="intro introtext"><a class="button youtube" href="'.$resource_video.'">'.$resource_text.'</a></p>'; ?>
		
	</div>
</div>
<!-- End Template: page.banner.php  -->
<?php }else{
	$ban_image_id = false;
} ?>

<?php /*if(get_post_meta(get_the_ID(), 'resource_options_text', true)) : echo wpautop(get_post_meta(get_the_ID(), 'resource_options_text', true));*/?>
