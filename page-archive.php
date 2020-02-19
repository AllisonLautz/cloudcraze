<?php
	/**
	 * @package WordPress
	 * @subpackage CloudCraze
	 */
	update_option('current_page_template','page-archive');
	?>

	<?php include ("includes/page.header.php") ?>

	<!-- Begin Template: page-resource.php  -->

	<div class="content">
		<?php
		function buildOptions($term,$default){
			$types = get_terms($term);
			$options = "<option value='false'>".$default."</option>";
			array('none' => $defualt);
			foreach ($types as $value) {
				$options .= "<option value='".$value->slug."'>".$value->name."</option>";
			}
			return $options;
		}
		?>
		<div class="section full centered search_resource graylt">
			<div class="wrapper">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php the_content(__('')); ?>
				<?php endwhile; else: endif; ?>

				<?php

				$taxes = array('resource'=>'resource_types','events'=>'event_types','team'=>'team_roles');

				$taxQuery = array();
				if($meta['archive_options_tax_term'][0] != false){
					$ex = explode(',', $meta['archive_options_tax_term'][0]);

					$taxQuery = array(
						array(
							'taxonomy'=>$taxes[$meta['archive_options_type'][0]],
							'field'=>'slug',
							'terms'=>$ex
						),
					);
				}

				$args = array(
					'titlecount'    => 100,
					'class'         => 'cards archivegallery resource',
					'rowcnt'		=> false,
					'image'			=> 'resource-grid',
					'postclass'		=> 'card',
					'title' 		=> 'h3',
					'termTags' 		=> true,
					'function' 		=> 'resource',
					'label' 	    => $taxes[$meta['archive_options_type'][0]],
					'args' 			=> array(
						'posts_per_page' => '-1',
						'post_type' => $meta['archive_options_type'][0],
						'tax_query' => $taxQuery,
					)
				);

				echo buildLoop($args);
				?>
			</div> <!-- END wrapper -->
		</div>  <!-- END .section full search -->


	</div>  <!-- END #content -->

	<!-- End Template: page-resource.php  -->


	<?php include ("includes/page.footer.php") ?>
