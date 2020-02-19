<style>
.mainvisual{background-image:url(https://s3-us-west-2.amazonaws.com/cloudcraze-ws/cloudcraze_homepage_fnl.jpg);}
@media (max-width: 1024px) {.mainvisual{background-image:url(https://s3-us-west-2.amazonaws.com/cloudcraze-ws/cloudcraze_homepage_fnl-medium.jpg);}}
@media (max-width: 600px) {.mainvisual{background-image:url(https://s3-us-west-2.amazonaws.com/cloudcraze-ws/cloudcraze_homepage_fnl-small.jpg);}}
</style>

<div class="mainvisual">
	<video class="fullvideo" poster="https://s3-us-west-2.amazonaws.com/cloudcraze-ws/cloudcraze_homepage_fnl.jpg" autoplay="autoplay" loop="no">
		<source src="https://s3-us-west-2.amazonaws.com/cloudcraze-ws/cloudcraze_homepage_fnl.webm" type="video/webm">
			<source src="https://s3-us-west-2.amazonaws.com/cloudcraze-ws/cloudcraze_homepage_fnl.mp4" type="video/mp4">
			</video>
			<div class="overlay">
				<div class="wrapper relative animate">
					<?php 

					if(meta('section_title')):
						echo wpautop(meta('section_title'));
						
						else: ?>

						<h1 class="pagetitle"><?=htmlspecialchars_decode($meta['homepage_banner_title'][0])?></h1>
						<h2><?=htmlspecialchars_decode($meta['homepage_banner_intro'][0])?></h2>
						<a class="button" href="<?=$meta['homepage_banner_anchor'][0] ?>"><?=$meta['homepage_banner_button_text'][0] ?></a>
						
					<?php endif;?>
				</div>
			</div>
		</div>
