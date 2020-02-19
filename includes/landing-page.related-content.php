		<div class="section related-content full white centered">
			<div class="wrapper animate">
				<?php
				$resource_types = get_the_terms(get_the_ID(),'resource_types');
				$name = $resource_types[0]->slug;

				switch ($name) {
					case 'video-case-study':
					$title = 'Other Customers';
					break;

					default:
					$title = 'Our Customers';
					break;
				}
				?>
				<h2 class="sectiontitle" style="margin:0;">See What CloudCraze Has Done with These Recognized Brands</h2>
				<?php

				$args = array(
					'titlecount'    => 75,
					'class'         => 'clients fourths',
					'rowcnt'		=> false,
					'image'			=> 'resource-grid',
					'postclass'		=> 'card',
					'title' 		=> 'h3',
					'termTags' 		=> true,
					'function' 		=> 'clients',
					'args' 			=> array(
						'posts_per_page' => 4,
						'post_type' => 'clients',
						'tax_query' => array(
							array(
								'taxonomy'=>'client_types',
								'field'=>'slug',
								'terms'=>'clients'
								),
							),
						'meta_query' => array(
							array(
								'key' => 'clients_options_resource',
								'value'   => array('','none',$this_post),
								'compare' => 'NOT IN'
								)
							)
						)
					);
				echo buildLoop($args);
				?>
				<a class="button center" href="/customers/">View More Customers</a>
			</div> <!-- END wrapper -->
		</div> <!-- END section related-content full graylt -->

