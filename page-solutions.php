<?php
/**
 * @package WordPress
 * @subpackage CloudCraze
 * Template Name:Template Solutions
 */
update_option('current_page_template','page-solutions');
?>

<?php include ("includes/page.header.php");
@include locate_template('template-parts/section-title.php');


global $count;
$count[] = '';


$myvals = get_post_meta($post->ID, false);
foreach($myvals as $key=>$val){
	// echo $key . ' - ' . $val[0] . '<br>';
}
?>


<!-- Begin Template: page-solutions.php  -->
<?php if(meta('solutions_content')):
// $count .= 1;
array_push($count, 1);
?>
<div class="section solutions content white">
	<div class="wrapper small animate">
		<?=wpautop(meta('solutions_content'));?>
	</div>
</div>


<?php
$logos = get_post_meta($post->ID, 'solutions_logos', true);
$args = array(

	'posts_per_page' => '-1',
	'post_type' => 'solution',
	'orderby' => 'menu_order',
	'order' => 'ASC',

);

$query = new WP_Query( $args );
if( $query->have_posts()):?>
<div class="lightbox">
	<?php while( $query->have_posts() ) : 
	$query->the_post();
	if(get_post_meta($post->ID, 'solution_options_title', true)){
		$title = get_post_meta($post->ID, 'solution_options_blurb', true);
	}
	else{
		$title = get_the_title($post->ID);
	}

	?>
	<div class="modalbox">
		<div class="close"><?=svg('#x',1,0,'close')?></div>
		<div class="title">
			<div class="wrapper small">
				<img class="svg" src="<?=get_the_post_thumbnail_url(get_the_ID(), 'banner-large');?>">
				<h3><?=$title;?></h3>
			</div>
		</div>
		<div class="modalcontent wrapper small">
			<span class="controls prev"><?=svg('#arrow-left',1,0,'arrow')?></span>
			<span class="controls next"><?=svg('#arrow-right',1,0,'arrow')?></span>
			<?=wpautop(get_post_meta( $id, 'solution_options_content', true ));?>
		</div>
	</div>
<?php endwhile;?>

</div>

<?php if($meta['solutions_icons'][0]) :
array_push($count, 1);
//$count .= 1;?>
<div class="section solutions icons graylt">
	<div class="wrapper small animate"><?=wpautop($meta['solutions_icons'][0]);?></div>
	<div class="wrapper row-4 alt animate">
		<?php while( $query->have_posts() ) : 
		$query->the_post();
		if(get_post_meta($post->ID, 'solution_options_title', true)){
			$title = get_post_meta($post->ID, 'solution_options_blurb', true);
		}
		else{
			$title = get_the_title($post->ID);
		}

		?>
		<div class="modal icon">
			<img class="svg" src="<?=get_the_post_thumbnail_url(get_the_ID(), 'banner-large');?>">
			<div class="content">
				<h3><?=$title;?></h3>
				<p><?=get_post_meta($post->ID, 'solution_options_blurb', true);?></p>
			</div>
			<div class="modalbox mobile">
				<div class="close"><?=svg('#x',1,0,'close')?></div>
				<div class="title">
					<div class="wrapper small">
						<img class="svg" src="<?=get_the_post_thumbnail_url(get_the_ID(), 'banner-large');?>">
						<h3><?=$title;?></h3>
					</div>
				</div>
				<div class="modalcontent wrapper small">
					<span class="controls prev"><?=svg('#arrow-left',1,0,'arrow')?></span>
					<span class="controls next"><?=svg('#arrow-right',1,0,'arrow')?></span>
					<?=wpautop(get_post_meta( $id, 'solution_options_content', true ));?>
				</div>
			</div>
		</div>

	<?php endwhile;?>
</div>
</div>
<?php endif; endif; wp_reset_postdata();?>

<?php if($meta['solutions_content_1'][0]):
array_push($count, 1);

 //$count .= 1;?>
 <div class="section solutions content_1">
 	<div class="wrapper small animate">
 		<div class="content">
 			<?=wpautop($meta['solutions_content_1'][0]);?>
 		</div>
 		<div class="svg">
 			<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
 			viewBox="0 0 1102 696" ig_style="enable-background:new 0 0 1102 696;" xml:space="preserve">
 			<style type="text/css">
 			.ig_st0{fill:#D1D3D4;}
 			.ig_st1{fill:#FFFFFF;}
 			.ig_st2{font-family:'SalesforceSans-Light';}
 			.ig_st3{font-size:22.7583px;}
 			.ig_st4{font-size:20.5613px;}
 			.ig_st5{fill:none;ig_stroke:#939598;ig_stroke-width:2;ig_stroke-miterlimit:10;}
 			.ig_st6{fill:#939598;}
 			.ig_st7{fill:none;}
 			.ig_st8{fill:#026CB6;}
 			.ig_st9{font-family:'SalesforceSans-Bold';}
 			.ig_st10{font-size:32.8971px;}
 			.ig_st11{fill:#055994;}
 			.ig_st12{fill:#1F6DB6;}
 			.ig_st13{fill:#00AEEF;}
 			.ig_st14{fill:#0361A1;}
 			.ig_st15{font-size:25.7267px;}
 			.ig_st16{font-size:24.5137px;}
 			.ig_st17{font-size:22.4817px;}
 		</style>
 		<g>
 			<ellipse class="ig_st0" cx="755" cy="159" rx="86.3" ry="86.3"/>
 			<path class="ig_st1" d="M754.8,246.9c-17,0-33.7-5-48.2-14.6c-19.6-12.9-32.9-32.7-37.7-55.7c-9.7-47.4,21-93.9,68.4-103.7
 			c47.5-9.7,93.9,21,103.7,68.4c4.7,23,0.2,46.4-12.8,66c-12.9,19.6-32.7,32.9-55.7,37.7l-0.3-1.5l0.3,1.5
 			C766.7,246.3,760.7,246.9,754.8,246.9z M755,74.2c-5.6,0-11.3,0.6-17,1.7c-45.8,9.4-75.5,54.3-66.1,100.1
 			c4.5,22.2,17.5,41.3,36.4,53.8s41.5,16.9,63.7,12.3l0,0c22.2-4.5,41.3-17.5,53.8-36.4s16.9-41.5,12.3-63.7
 			C829.9,101.9,794.5,74.2,755,74.2z"/>
 		</g>
 		<g>
 			<ellipse transform="matrix(0.9797 -0.2004 0.2004 0.9797 -37.496 151.181)" class="ig_st0" cx="728" cy="260.8" rx="46.4" ry="46.4"/>
 			<path class="ig_st1" d="M727.9,308.7c-9.3,0-18.4-2.7-26.3-7.9c-10.7-7-18-17.8-20.5-30.4c-2.6-12.5-0.1-25.3,7-36
 			c7-10.7,17.8-18,30.4-20.5c12.5-2.6,25.3-0.1,36,7c10.7,7,18,17.8,20.5,30.4c2.5,12.6,0.1,25.3-7,36c-7,10.7-17.8,18-30.4,20.5l0,0
 			C734.4,308.4,731.1,308.7,727.9,308.7z M728.1,215.9c-3,0-6.1,0.3-9.1,0.9c-11.7,2.4-21.8,9.2-28.5,19.2c-6.6,10-8.9,22-6.5,33.7
 			c2.4,11.7,9.2,21.8,19.2,28.5c10,6.6,22,8.9,33.7,6.5l0,0c11.7-2.4,21.8-9.2,28.5-19.2c6.6-10,8.9-22,6.5-33.7s-9.2-21.8-19.2-28.5
 			C745.3,218.5,736.8,215.9,728.1,215.9z"/>
 		</g>
 		<g>

 			<ellipse transform="matrix(0.7071 -0.7071 0.7071 0.7071 149.9028 675.6931)" class="ig_st0" cx="890.6" cy="156.9" rx="73.4" ry="73.4"/>
 			<path class="ig_st1" d="M890.4,231.8c-14.5,0-28.7-4.2-41.1-12.4c-16.7-11-28.1-27.9-32.1-47.5s-0.1-39.6,10.9-56.3
 			s27.9-28.1,47.5-32.1c40.4-8.3,80.1,17.9,88.3,58.3c4,19.6,0.1,39.6-10.9,56.3s-27.9,28.1-47.5,32.1l-0.3-1.5l0.3,1.5
 			C900.5,231.3,895.4,231.8,890.4,231.8z M890.6,85c-4.8,0-9.6,0.5-14.4,1.5c-18.8,3.8-35,14.8-45.6,30.8s-14.3,35.2-10.4,54
 			c3.8,18.8,14.8,35,30.8,45.6c16,10.6,35.2,14.3,54,10.4l0,0c18.8-3.8,35-14.8,45.6-30.8s14.3-35.2,10.4-54
 			C954,108.5,924,85,890.6,85z"/>
 		</g>
 		<g>
 			<text transform="matrix(1 0 0 1 866.308 163.5569)" class="ig_st1 ig_st2 ig_st3">CMS</text>
 		</g>
 		<g>
 			<text transform="matrix(1 0 0 1 716.3168 267.4678)" class="ig_st1 ig_st2 ig_st3">IoT</text>
 		</g>
 		<g>
 			<text transform="matrix(1 0 0 1 723.5356 151.7339)" class="ig_st1 ig_st2 ig_st4">Mobile  </text>
 			<text transform="matrix(1 0 0 1 699.9356 172.3338)" class="ig_st1 ig_st2 ig_st4">Applications</text>
 		</g>
 		<g>
 			<g>
 				<path class="ig_st5" d="M735.1,514.6"/>
 			</g>
 			<path class="ig_st5" d="M961.7,479.2"/>
 			<path class="ig_st5" d="M857.6,574.4"/>
 		</g>
 		<g>
 			<ellipse class="ig_st6" cx="857.6" cy="579.2" rx="95.6" ry="95.6"/>
 			<path class="ig_st1" d="M857.5,676.2c-21.5,0-43.2-7.1-61.2-21.7c-41.5-33.8-47.8-95-14-136.5s95-47.8,136.5-14s47.8,95,14,136.5
 			C913.7,664,885.7,676.2,857.5,676.2z M798.2,652.1c40.2,32.7,99.6,26.7,132.3-13.6c32.7-40.2,26.7-99.6-13.6-132.3
 			c-40.2-32.7-99.6-26.7-132.3,13.6C751.9,560,758,619.4,798.2,652.1L798.2,652.1z"/>
 		</g>
 		<g>
 			<ellipse class="ig_st6" cx="735.1" cy="508" rx="66.4" ry="66.4"/>
 			<path class="ig_st1" d="M735,575.9c-15.1,0-30.2-5-42.8-15.2c-29-23.6-33.4-66.5-9.8-95.5c11.5-14.1,27.7-22.8,45.7-24.7
 			c18-1.9,35.7,3.4,49.8,14.9c29,23.6,33.4,66.5,9.8,95.5C774.3,567.3,754.7,575.9,735,575.9z M694.1,558.3
 			c13.4,10.9,30.3,16,47.6,14.2c17.2-1.8,32.8-10.1,43.7-23.6c22.6-27.8,18.4-68.7-9.4-91.3c-13.4-10.9-30.3-16-47.6-14.2
 			c-17.2,1.8-32.8,10.1-43.7,23.6C662.1,494.7,666.3,535.7,694.1,558.3z"/>
 		</g>
 		<g>

 			<ellipse transform="matrix(0.7071 -0.7071 0.7071 0.7071 -56.821 819.4283)" class="ig_st6" cx="960.7" cy="478.3" rx="73.4" ry="73.4"/>
 			<path class="ig_st1" d="M960.7,553.1c-16.6,0-33.3-5.5-47.2-16.8l0,0c-32-26.1-36.9-73.3-10.8-105.3c12.6-15.5,30.5-25.2,50.4-27.2
 			s39.4,3.8,54.9,16.4c32,26.1,36.9,73.3,10.8,105.3C1004.1,543.7,982.5,553.1,960.7,553.1z M915.4,534
 			c14.9,12.1,33.6,17.7,52.7,15.8c19.1-2,36.3-11.2,48.4-26.1c12.1-14.9,17.7-33.6,15.8-52.7c-2-19.1-11.2-36.3-26.1-48.4
 			c-14.9-12.1-33.6-17.7-52.7-15.8c-19.1,2-36.3,11.2-48.4,26.1c-12.1,14.9-17.7,33.6-15.8,52.7C891.3,504.7,900.6,521.9,915.4,534
 			L915.4,534z"/>
 		</g>
 		<g>
 			<text transform="matrix(1 0 0 1 715.2475 514.6201)" class="ig_st1 ig_st2 ig_st3">ERP</text>
 		</g>
 		<g>
 			<text transform="matrix(1 0 0 1 911.8871 488.3155)" class="ig_st1 ig_st2 ig_st3">Financials</text>
 		</g>
 		<g>
 			<text transform="matrix(1 0 0 1 806.3774 579.173)" class="ig_st1 ig_st2 ig_st3">Supporting </text>
 			<text transform="matrix(1 0 0 1 818.3774 601.973)" class="ig_st1 ig_st2 ig_st3">Systems</text>
 		</g>
 		<rect x="15" y="138.7" class="ig_st7" width="539.7" height="25.1"/>
 		<text transform="matrix(1 0 0 1 15.0004 163.3804)" class="ig_st8 ig_st9 ig_st10">Platform Services</text>
 		<rect x="668.6" y="19.5" class="ig_st7" width="409" height="25.1"/>
 		<text transform="matrix(1 0 0 1 668.6391 44.1426)" class="ig_st8 ig_st9 ig_st10">Customer Extension Points</text>
 		<rect x="668.6" y="392.4" class="ig_st7" width="365.5" height="25.1"/>
 		<text transform="matrix(1 0 0 1 668.6391 417.0967)" class="ig_st8 ig_st9 ig_st10">Back Office</text>
 		<rect x="408.5" y="186.7" transform="matrix(0.9789 -0.2044 0.2044 0.9789 -26.7215 115.502)" class="ig_st0" width="274.5" height="0.8"/>
 		<rect x="550.7" y="97.5" transform="matrix(0.1703 -0.9854 0.9854 0.1703 221.5024 741.6268)" class="ig_st0" width="0.8" height="283.5"/>
 		<rect x="753.7" y="232" transform="matrix(0.8942 -0.4477 0.4477 0.8942 -17.1993 392.0613)" class="ig_st0" width="134.2" height="0.8"/>
 		<rect x="361.6" y="499" transform="matrix(0.9999 -1.171869e-02 1.171869e-02 0.9999 -5.8163 6.1472)" class="ig_st6" width="320.1" height="0.8"/>
 		<rect x="578.3" y="336.6" transform="matrix(0.2698 -0.9629 0.9629 0.2698 -118.6513 967.6416)" class="ig_st6" width="0.8" height="450.9"/>
 		<rect x="777.6" y="465.8" transform="matrix(0.9649 -0.2627 0.2627 0.9649 -92.4081 241.2327)" class="ig_st6" width="156.7" height="0.8"/>
 		<g>

 			<ellipse transform="matrix(0.7071 -0.7071 0.7071 0.7071 -231.2195 352.4372)" class="ig_st11" cx="309.8" cy="455.3" rx="97.6" ry="97.6"/>
 			<path class="ig_st1" d="M309.8,357.7c38.6,0,75.2,23.1,90.5,61.1c20.2,50-4,106.8-54,127c-12,4.8-24.3,7.1-36.5,7.1
 			c-38.6,0-75.2-23.1-90.5-61.1c-20.2-50,4-106.8,54-127C285.2,360,297.6,357.7,309.8,357.7 M309.8,353.7v4V353.7
 			c-13,0-25.8,2.5-38,7.4c-25.2,10.2-44.9,29.5-55.5,54.5s-10.9,52.6-0.7,77.7c7.7,19.1,20.9,35.3,38,46.6c16.7,11.1,36.2,17,56.2,17
 			c13,0,25.8-2.5,38-7.4c25.2-10.2,44.9-29.5,55.5-54.5s10.9-52.6,0.7-77.7c-7.7-19.1-20.9-35.3-38-46.6
 			C349.2,359.5,329.8,353.7,309.8,353.7L309.8,353.7z"/>
 		</g>
 		<ellipse class="ig_st12" cx="142.9" cy="426" rx="124.9" ry="124.9"/>
 		<path class="ig_st1" d="M143.1,301.1c58.1,0,110.1,40.7,122.2,99.9c13.8,67.6-29.7,133.6-97.3,147.4c-8.4,1.7-16.9,2.6-25.2,2.6
 		c-58.1,0-110.1-40.7-122.2-99.9c-13.8-67.6,29.7-133.6,97.3-147.4C126.3,301.9,134.8,301.1,143.1,301.1 M143.1,298.1v3V298.1
 		c-8.6,0-17.3,0.9-25.8,2.6C83.8,307.5,55,327,36.2,355.5s-25.4,62.6-18.6,96.1c5.9,29,21.9,55.3,44.9,73.8
 		c22.7,18.3,51.2,28.4,80.2,28.4c8.6,0,17.3-0.9,25.8-2.6c33.5-6.8,62.3-26.3,81.1-54.8s25.4-62.6,18.6-96.1
 		c-5.9-29-21.9-55.3-44.9-73.8C200.6,308.2,172.1,298.1,143.1,298.1L143.1,298.1z"/>
 		<g>
 			<ellipse class="ig_st13" cx="427.9" cy="360.1" rx="126.7" ry="126.7"/>
 			<path class="ig_st1" d="M427.9,488.3c-17,0-34-3.4-50.1-10.3c-31.5-13.4-55.9-38.3-68.7-70c-12.8-31.8-12.5-66.6,0.9-98.1
 			s38.3-55.9,70-68.7c31.8-12.8,66.6-12.5,98.1,0.9s55.9,38.3,68.7,70c26.5,65.6-5.4,140.4-70.9,166.8
 			C460.4,485.2,444.2,488.3,427.9,488.3z M428,234.8c-15.9,0-31.7,3.1-46.9,9.2c-31,12.5-55.3,36.4-68.4,67.1
 			c-13.1,30.8-13.4,64.8-0.9,95.8l0,0c12.5,31,36.4,55.3,67.1,68.4c30.8,13.1,64.8,13.4,95.8,0.9c64-25.8,95.1-98.9,69.3-162.9
 			c-12.5-31-36.4-55.3-67.1-68.4C461.2,238.1,444.6,234.8,428,234.8z"/>
 		</g>
 		<g>

 			<ellipse transform="matrix(0.7071 -0.7071 0.7071 0.7071 -230.4914 354.2009)" class="ig_st11" cx="312.3" cy="455.3" rx="97.6" ry="97.6"/>
 			<path class="ig_st1" d="M312.5,554.4c-39.2,0-76.4-23.4-92-62c-20.4-50.7,4.1-108.5,54.8-128.9s108.5,4.1,128.9,54.8
 			s-4.1,108.5-54.8,128.9C337.3,552,324.8,554.4,312.5,554.4z M312.2,359.2c-12,0-24.1,2.2-35.8,7c-49.1,19.8-73,75.9-53.1,125
 			c19.8,49.1,75.9,73,125,53.1c49.1-19.8,73-75.9,53.1-125C386.4,382,350.3,359.2,312.2,359.2z"/>
 		</g>
 		<g>
 			<ellipse class="ig_st14" cx="231.7" cy="317.4" rx="109" ry="109"/>
 			<path class="ig_st1" d="M231.8,427.9c-43.8,0-85.3-26.2-102.6-69.2c-11-27.4-10.8-57.4,0.8-84.6s33-48.2,60.4-59.3
 			c56.5-22.8,121,4.6,143.8,61.1s-4.6,121-61.1,143.8C259.5,425.3,245.6,427.9,231.8,427.9z M231.5,209.9c-13.4,0-27,2.5-40.1,7.8
 			c-55,22.2-81.7,85-59.5,139.9c16.9,41.8,57.3,67.3,99.8,67.3c13.4,0,27-2.5,40.1-7.8c55-22.2,81.7-85,59.5-139.9
 			C314.5,235.3,274.1,209.9,231.5,209.9z"/>
 		</g>
 		<g>
 			<text transform="matrix(1 0 0 1 165.4455 324.0235)" class="ig_st1 ig_st2 ig_st3">Logic Services</text>
 		</g>
 		<g>
 			<text transform="matrix(1 0 0 1 391.2548 368.007)" class="ig_st1 ig_st2 ig_st15">Salesforce</text>
 		</g>
 		<g>
 			<text transform="matrix(1 0 0 1 240.9691 471.333)" class="ig_st1 ig_st2 ig_st3">Data Services</text>
 		</g>
 		<g>
 			<text transform="matrix(1 0 0 1 57.8866 453.2825)" class="ig_st1 ig_st2 ig_st16">Data Model</text>
 		</g>
 		<g>
 			<g>
 				<g>
 					<path class="ig_st11" d="M415.3,196.7c-11.3-7.5-24.3-11.4-37.6-11.4c-4.6,0-9.2,0.5-13.9,1.4c-17.9,3.7-33.3,14.1-43.4,29.3
 					s-13.6,33.5-9.9,51.4c6.6,32.4,35.2,54.7,67.1,54.7c4.5,0,9.1-0.5,13.7-1.4c37-7.6,60.9-43.8,53.4-80.8
 					C441,222.2,430.6,206.8,415.3,196.7z"/>
 					<path class="ig_st1" d="M447.6,239.5c-3.8-18.7-14.7-34.8-30.6-45.3s-35-14.2-53.7-10.4s-34.8,14.7-45.3,30.6s-14.2,35-10.4,53.7
 					c3.8,18.7,14.7,34.8,30.6,45.3c11.8,7.8,25.4,11.9,39.2,11.9c4.8,0,9.7-0.5,14.5-1.5c18.7-3.8,34.8-14.7,45.3-30.6
 					S451.4,258.2,447.6,239.5z M377.6,322.3c-31.8,0-60.4-22.4-67.1-54.7c-3.7-17.9-0.1-36.2,9.9-51.4s25.5-25.7,43.4-29.3
 					c4.6-0.9,9.3-1.4,13.9-1.4c13.3,0,26.3,3.9,37.6,11.4c15.3,10.1,25.7,25.5,29.3,43.4c7.6,37-16.4,73.2-53.4,80.8
 					C386.7,321.9,382.1,322.3,377.6,322.3z"/>
 				</g>
 			</g>
 			<g>
 				<text transform="matrix(1 0 0 1 332.9658 260.4346)" class="ig_st1 ig_st2 ig_st17">REST API</text>
 			</g>
 		</g>
 	</svg>

 </div>
</div>
</div>
<?php endif;?>



<?php endif;?>


<?php if($meta['solutions_content_2'][0]):
array_push($count, 1);

if($meta['altstyle']){$class = ' altstyle';}

// $count .= 1;
?>
<div class="section solutions graylt content_2<?=$class;?>">
	<div class="wrapper small animate">
		<?=wpautop($meta['solutions_content_2'][0]);?>
	</div>

	<?php if($meta['solutions_logos_2'][0]):?>
		<div class="full logos animate">

			<?php
			$logos = get_post_meta($post->ID, 'solutions_logos_2', true);

			foreach($logos as $key=>$val):
				$icon = wp_get_attachment_image_src($val, 'thumbnail', true);
				echo '<div class="img"><img src="'.$icon[0].'"></div>';
				$metadata =  wp_get_attachment_metadata($val);
			endforeach;
			?>
		</div> 

	<?php endif;?>
</div>
<?php endif;?>



<?php /* cta */ ?>

<?php if(meta('footer_cta')) : 
array_push($count, 1);

// $count .= 1;

?>
<div class="section solutions footercta">
	<div class="wrapper animate flex">
		<?=meta('footer_cta');?>
	</div>
</div>

<?php endif;?>


<?php /* customers */ ?>




<?php



$fn = 'customers_page';
$intro = '<h2 class="center">Featured Customer Stories</h2>';

if (is_int(array_sum($count)/2)){
	$color = ' white';
}
else{
	$color = '';
}
// include (get_template_directory().'/includes/page.related-customers.php'); 

include(locate_template('includes/page.related-customers.php'));

/*$args = array( 
	'connected_type' => 'customers_page',
	'connected_items' => $post->ID,
	'posts_per_page' => 4,
	'post_status'	=>	'publish',
);


$args_fallback = array( 
	'post_type' => 'customer',
	'order'          => 'ASC',
	'orderby'        => 'menu_order',
	'posts_per_page' => 4,
	'post_status'	=>	'publish',

);
if((new WP_Query($args))->have_posts()){
	$query = new WP_Query( $args );
}
else{
	$query = new WP_Query( $args_fallback );
}


if( $query->have_posts() ):

	?>

	<div class="section solutions customers">
		<?php if($meta['solutions_customers_intro'][0]){
			echo '<div class="wrapper small animate">' . wpautop($meta['solutions_customers_intro'][0]) . '</div>';
		}?>
		<div class="wrapper animate">


			<div class="customers flex">

				<?php while( $query->have_posts() ) : $query->the_post();?>

					<?php

					if(get_the_post_thumbnail_url(get_the_ID(), 'banner-large')){
						$img = get_the_post_thumbnail_url(get_the_ID(), 'banner-large');
					}
					else{
						$img = get_template_directory_uri().'/img/resource_texture.png';
					}

					if(get_post_meta(get_the_ID(), 'customer_options_logo', true)){
						$logos = get_post_meta(get_the_ID(), 'customer_options_logo', true);
						foreach($logos as $key=>$val):
							$logo = wp_get_attachment_image_src($val, 'large', true);
						endforeach;		
					}
					else{
						$logo = '';
					}

					?>
					<div class="card">

						<div class="logo" style="background-image:url(<?=$logo[0];?>);"></div>
						<a href="<?=get_the_permalink(get_the_ID());?>">
							<div class="bgimg" style="background-image:url(<?=$img;?>);"></div>
							<div class="content">
								<h3 class="large-light"><?=get_the_title();?></h3>
								<p class="readmore">View Customer Story</p>
							</div>
						</a>
					</div>

				<?php endwhile;?>
			</div>


			<?php 
			

			if ($meta['solutions_customers_button'][0]){
				echo $meta['solutions_customers_button'][0];
			}?>


		</div>
	</div>

<?php endif;*/?>



<!-- End Template: page-solutions.php  -->


<?php //include (get_template_directory().'/includes/page.related-content.php'); ?>

<?php
$testimonial_order = array('barry-callebaut','mycoke-com','ecolab');
include (get_template_directory().'/includes/testimonial.newslider.php');
?>

<?php include ("includes/page.footer.php") ?>

