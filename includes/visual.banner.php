<?php

// $ban_image_id = get_post_thumbnail_id(get_the_ID());

$ban_image_id = $meta['homepage_banner_image'][0];

if($ban_image_id){
	$imgClass = "bannerimg";
	$ban_main     = wp_get_attachment_image_src($ban_image_id,'banner-large', true)[0];
	$ban_tablet   = wp_get_attachment_image_src($ban_image_id,'banner-medium', true)[0];
	$ban_mobile   = wp_get_attachment_image_src($ban_image_id,'banner-small', true)[0];

	$largecss  = ".mainvisual".'{background-image:url('.$ban_main.');}';
	$tabletcss = ".mainvisual".'{background-image:url('.$ban_tablet.');}';
	$mobilecss = ".mainvisual".'{background-image:url('.$ban_mobile.');}';

	echo '<style>'.$largecss.'@media (max-width: 1024px) {'.$tabletcss.'}@media (max-width: 600px) {'.$mobilecss.'}</style>';

	$title = get_the_title(get_the_ID());
	$custom_title = get_post_meta(get_the_ID(),'seometa_banner_title',true);
	$custom_intro = get_post_meta(get_the_ID(),'seometa_banner_description',true);
	if($custom_title) $title = htmlspecialchars_decode($custom_title);
	if($custom_intro) $custom_intro = htmlspecialchars_decode($custom_intro);

	$introtext = htmlspecialchars_decode($meta['landing_header_intro'][0]);
}

?>

<?php if($ban_image_id){ ?>
<!-- Begin Template: page.banner.php  -->
<div class="mainvisual banner <?=$imgClass?>">
	<div class="overlay">
		<div class="wrapper relative animate">
			<div class="conwrap vcenter">
				<h1 class="pagetitle"><?=htmlspecialchars_decode($meta['homepage_banner_title'][0])?></h1>
				<p class="intro introtext"><?=htmlspecialchars_decode($meta['homepage_banner_intro'][0])?></p>
				<a class="button" href="<?=$meta['homepage_banner_anchor'][0] ?>"><?=$meta['homepage_banner_button_text'][0] ?></a>
			</div>
		</div>
	</div>
</div>
<!-- End Template: page.banner.php  -->
<?php }else{
	$ban_image_id = false;
} ?>
